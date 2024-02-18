<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Hash;
use App\Models\Announcements;
use App\Models\Grade;
use App\Models\Logindetails;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\TeacherGrade;

class AdminController extends BaseController
{
    public function __construct()
    {
        helper(["url", "form"]);

        ['filter' => 'Auth'];
        if (session()->get('Role') !== 'Admin') {

            echo 'Access denined';
            exit();
        }

    }

    public function Announcement()
    {

        if ($this->request->is("post")) {
            $validation = \Config\Services::validation();
            $rules = [
                "description" => "required",
                'file' => 'uploaded[file]|max_size[file,1024]|ext_in[file,pdf,doc,docx]'
            ];

            if ($this->validate($rules)) {

                $file = $this->request->getFile('file');

                if ($file->isvalid() && !$file->hasMoved()) {

                    $file->move('./announcements');
                }

                $fileName = $file->getName();
                $data = [
                    'Title' => $this->request->getPost('description'),
                    'File' => $fileName,
                ];

                $announcement = new Announcements();

                $query = $announcement->insert($data);

                if ($query) {

                    return redirect()->to('Admin')->with('success', 'Announcement Posted');
                } else {
                    return redirect()->to('Admin')->with('error', 'Announcement  was not posted');
                }

            }
        }

        return view('admin/createannouncement');

    }
    public function index()
    {

        $teachers = new Teacher();
        $announcements = new Announcements();
        $Subjects = new Subject();



        $data = [
            "teachers" => $teachers->findall(),
            "announcements" => $announcements->findall(),
            "Subjects" => $Subjects->findAll(),
        ];
        return view("admin/dashboard", $data);
    }
    protected function EmployeeIDGenerator()
    {
        $currentyear = date('Y') - 2000;
        $currentday = date('d');
        $randomNumber = mt_rand(100, 999);
        $employeeid = $currentyear . $currentday . $randomNumber;

        return $employeeid;
    }


    public function HireTeacher()
    {
        $validation = \Config\Services::validation();

        if ($this->request->is('post')) {

            $rules = [
                "Name" => "required",
                "Age" => "required",
                "Email" => "required",
                "Address" => "required",
                'Phone' => 'required|max_length[15]',
                'identity' => 'is_unique[teachers.identity]'

            ];

            if ($this->Validate($rules)) {
                $name = $this->request->getPost('Name');
                $identity = $this->request->getPost('identity');
                $email = $this->request->getPost('Email');
                $Age = $this->request->getPost('Age');
                $Address = $this->request->getPost('Address');
                $Phone = $this->request->getPost('Phone');
                $gender = $this->request->getPost('Gender');


                $data = [
                    "identity" => $identity,
                    "Name" => $name,
                    "Age" => $Age,
                    "Email" => $email,
                    "Address" => $Address,
                    'Phone' => $Phone,
                    'Password' => Hash::encrypt('test1234'),  // You might want to use hashed passwords in a real scenario
                    'ConfirmPassword' => Hash::encrypt('test1234'),
                    'Role' => 'User',
                    'Gender' => $gender
                ];

                var_dump($data);

                $teacher = new Teacher();

                $teacher->insert($data);


                $logindetails = new Logindetails();

                $logindata = [
                    "identity" => $identity,
                    'password' => Hash::encrypt('test1234'),
                    'Role' => 'User'
                ];

                $logindetails->insert($logindata);


                return redirect()->to('Admin')->with('success', 'Teacher was registered successfully');

            } else {
                return redirect()->to('Admin')->with('error', 'Teacher was not registerd successfully');
            }
        }

        $data1 = [
            'validation' => $validation,
            'identity' => $this->EmployeeIDGenerator(),
        ];
        //var_dump($data1);
        return view('admin/hire', $data1);
    }

    public function ViewAnnouncement($id)
    {
        // $id = $this->request->getPost("ID");
        $Announcements = new Announcements();
        $query = $Announcements->find($id);

        $data = [
            'Announcement' => $query
        ];

        //var_dump($data);

        return view('admin/announcement', $data);

    }

    public function classAlloc($userid)
    {
        $grade = $this->request->getPost('grade_id');

        $teacher = new Teacher();
        $teachergrade = new TeacherGrade();

        // Fetch the teacher record by user ID
        $findTeacher = $teacher->where('identity', $userid)->first();

        // Check if the teacher record is found
        if ($findTeacher) {
            // Update the allocated_grade field in the teacher table
            try {
                // Update the allocated_grade field in the teacher table


                // Insert a new record into the teacher_grade table
                $teachergradedata = [
                    'teacher_id' => $findTeacher->identity,
                    'grade_id' => $grade
                ];
                $teachergrade->insert($teachergradedata);

                // Redirect with success message
                return redirect()->to('Admin')->with('success', 'Responsibility Assigned');
            } catch (\Exception $e) {
                // Log or display the error
                log_message('error', 'Error updating allocated_grade: ' . $e->getMessage());

                // Redirect with an error message
                return redirect()->to('Admin')->with('error', 'Failed to update allocated_grade');
            }


        } else {
            // Redirect with an error message if the teacher record is not found
            return redirect()->to('Admin')->with('error', 'Teacher not found');
        }
    }


    public function allocation()
    {
        if ($this->request->is('get')) {
            $Teacher = new Teacher();
            $grade = new Grade();
            $teachergrade = new TeacherGrade();

            $teachergrades = $teachergrade->findAll();
            $teachers = $Teacher->findAll();
            $Grade = $grade->findAll();

            $teachersNotAllocated = [];

            // Iterate through each teacher
            foreach ($teachers as $teacher) {
                $isAllocated = false;

                // Check if the teacher ID is in the teacher_grade table
                foreach ($teachergrades as $grade) {
                    if ($teacher->identity === $grade->teacher_id) {
                        $isAllocated = true;
                        break;
                    }
                }

                // If the teacher is not allocated, add to the array
                if (!$isAllocated) {
                    $teachersNotAllocated[] = $teacher;
                }
            }

            // Pass the array of non-allocated teachers to the view
            $data = [
                'teachers' => $teachersNotAllocated,
                'grades' => $Grade
            ];

            return view('admin/classallocation', $data);
        }
    }


    public function subjects()
    {
        $subjects = new Subject();

        $data = [
            'Subjects' => $subjects->findAll()
        ];

        return view('admin/subjects', $data);
    }



    public function AddSubject()
    {
        $grade = new Grade();
        $grades = $grade->findAll();
        if ($this->request->is('get')) {
            $data = [

                'Grades' => $grades
            ];

            return view('admin/createsubject', $data);
        }

        $validation = \Config\Services::validation();
        $rule = [
            'Name' => 'required',
            'SubjectCode' => 'required'
        ];

        if ($this->validate($rule)) {
            $name = $this->request->getPost('Name');
            $SubjectCode = $this->request->getPost('SubjectCode');
            $grade = $this->request->getPost('grade_id');

            $data = [
                'Name' => $name,
                'SubjectCode' => $SubjectCode,
                'grade_id' => $grade
            ];



            $subject = new Subject();

            $query = $subject->insert($data);



            if ($query) {
                //  var_dump($grade);

                return redirect()->to('Admin/subjects')->with('success', 'A subject was add');
            } else {
                $message = "Something went wrong";
                return view('admin/subjects', ['error' => $message]);
            }
        }
        $data = [
            'validation' => $validation,
            'Grades' => $grades

        ];


        return view('admin/createsubject', $data);
    }


}

