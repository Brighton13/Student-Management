<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Announcements;
use App\Models\Grade;
use App\Models\Result;
use App\Models\Student;
use App\Models\TeacherGrade;
use App\Models\Subject;
use App\Models\Logindetails;
use App\Libraries\Hash;

class UserController extends BaseController
{

    public function __construct()
    {
        helper(["url", "form"]);
    }

    public function index()
    {
        $announcements = new Announcements();
        $data = [
            'announcements' => $announcements->findAll(),
        ];
        return view("user/dashboard", $data);
    }

    protected function StudentIDgenerator()
    {
        $currentyear = date('Y') - 2000;
        $currentmonth = date('m');
        $randomNumber = mt_rand(1000, 9999);
        $studentid = $currentyear . $currentmonth . $randomNumber;

        return $studentid;

    }

    public function EnrollStudent()
    {

        if ($this->request->is("get")) {

            $grade = new Grade();

            $grades = $grade->findAll();

            $data = [
                'identity' => $this->StudentIDgenerator(),
                'Grades' => $grades
            ];

            return view("user/enroll", $data);
        }

        $validation = \Config\Services::validation();

        $rules = [
            "Name" => "required",
            "Age" => "required",
            "Email" => "required|valid_email",
            "Address" => "required",
            'Phone' => 'required|max_length[15]',
            "Grade" => "required",
            'identity' => 'is_unique[students.identity]'
        ];

        if ($this->Validate($rules)) {
            $name = $this->request->getPost('Name');
            $email = $this->request->getPost('Email');
            $Age = $this->request->getPost('Age');
            $Address = $this->request->getPost('Address');
            $Phone = $this->request->getPost('Phone');
            $Grade = $this->request->getPost('Grade');
            $identity = $this->request->getPost('identity');
            $gender = $this->request->getPost('Gender');

            $data = [
                "identity" => $identity,
                "Name" => $name,
                "Age" => $Age,
                "Email" => $email,
                "Address" => $Address,
                'Phone' => $Phone,
                "grade_id" => $Grade,
                'Password' => Hash::encrypt('test1234'),  // You might want to use hashed passwords in a real scenario
                'ConfirmPassword' => Hash::encrypt('test1234'),
                'Role' => "Student",
                "Gender" => $gender
            ];

            $Student = new Student();

            $query = $Student->insert($data);


            $logindetails = new Logindetails();

            $logindata = [
                "identity" => $identity,
                'password' => Hash::encrypt('test1234'),
                'Role' => 'Student'
            ];

            $logindetails->insert($logindata);

            if ($query === false) {
                return redirect()->to("user/enroll")->with("error", "Student Enrollment Failed");
            }
            // var_dump($data);
            return redirect()->to("user/studentdetails")->with("success", "Student Enrollment Was Successful");
        } else {
            return view('user/enroll', ['validation' => $validation]);
        }

    }

    public function createSubject()
    {
        if ($this->request->getPost() === 'post') {
            $validation = \Config\Services::validation();
            $rules = [
                'Name' => 'required',
                'SubjectCode' => 'required'

            ];

            if ($this->Validate($rules)) {
                $data = [
                    'Name' => $this->request->getPost('Name'),
                    'SubjectCode' => $this->request->getPost('SubjectCode'),
                ];

                $subject = new Subject();
                $query = $subject->insert($data);

                if (!$query) {
                    return redirect()->to('user/subject')->with('error', 'Subject Creation Failed');
                } else {
                    return redirect()->to('user/subject')->with('success', 'Subject Created Successfully');
                }

            }

            return view('user/subject', ['validation' => $validation]);
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

                    return redirect()->to('User')->with('success', 'Announcement Posted');
                } else {
                    return redirect()->to('User')->with('error', 'Announcement  was not posted');
                }

            }
        }

        return view('announcements');

    }

    public function viewClasspupils()
    {
        $students = new Student();

        $sessionvalues = session()->get('grade_id');

        // var_dump($sessionvalues);

        $query = $students->where('grade_id', $sessionvalues)->findAll();

        $data = [
            'students' => $query
        ];
        return view('user/gradepupils', $data);

    }

    public function EnterResults($userid)
    {
        $studentModel = new Student();
        $subjectModel = new Subject();

        // Retrieve student and subjects again for the view
        $student = $studentModel->where('identity', $userid)->first();
        $subjects = $subjectModel->findAll();

        $data = [
            'student' => $student,
            'subjects' => $subjects
        ];

        return view('user/enterresults', $data);
    }


    public function EnterRResults()
    {
        // var_dump($this->request->getPost());

        if ($this->request->is('post')) {
            $validation = \Config\Services::validation();

            $student = new Student();
            $subject = new Subject();
            $Results = new Result();

            // Assuming you have already validated the form data using $validation

            $studentid = $this->request->getPost('student_id');
            $student = $student->where('identity', $studentid)->first();
            $subjects = $subject->findAll();
            //var_dump($studentid);
            foreach ($subjects as $subject) {
                if ($subject->grade_id === $student->grade_id) {
                    $score = $this->request->getPost('Score_' . $subject->ID);
                    //  echo "Subject ID: {$subject->ID}, Score: {$score}<br>";

                    $data = [
                        'student_id' => $studentid,
                        'subject_id' => $subject->ID,
                        'score' => $score
                    ];

                    $Results->insert($data);

                    return redirect()->to('User/results')->with('success', 'Results Recorded successfully.');
                }
            }


        }
    }

}







