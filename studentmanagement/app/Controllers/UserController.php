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







