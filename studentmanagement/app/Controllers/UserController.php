<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Subject;
use App\Models\User;
use App\Libraries\Hash;

class UserController extends BaseController
{

    public function __construct()
    {
        helper(["url", "form"]);
    }

    public function index()
    {
        return view("user/dashboard");
    }

    protected function StudentIDgenerator()
    {

        //  $firstrand = mt_rand(23, 23);
        $secondrand = mt_rand(100000, 23200002);
        //  $randomNumber = mt_rand(1, 999);
        $studentid = $secondrand;

        return $studentid;

    }

    public function EnrollStudent()
    {


        if ($this->request->is("get")) {
            $data = [
                'studentid' => $this->StudentIDgenerator()
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
            'studentid' => 'required'
        ];

        if ($this->Validate($rules)) {
            $name = $this->request->getPost('Name');
            $email = $this->request->getPost('Email');
            $Age = $this->request->getPost('Age');
            $Address = $this->request->getPost('Address');
            $Phone = $this->request->getPost('Phone');
            $Grade = $this->request->getPost('Grade');
            $studentid = $this->request->getPost('studentid');

            $data = [
                "studentid" => '23' . $this->StudentIDgenerator(),
                "Name" => $name,
                "Age" => $Age,
                "Email" => $email,
                "Address" => $Address,
                'Phone' => $Phone,
                "Grade" => $Grade,
                'Password' => Hash::encrypt('test1234'),  // You might want to use hashed passwords in a real scenario
                'ConfirmPassword' => Hash::encrypt('test1234'),
                'Role' => "Student",
            ];

            $Student = new User();

            $query = $Student->insert($data);

            if ($query === false) {
                return redirect()->to("user/enroll")->with("error", "Student Enrollment Failed");
            }
            var_dump($data);
            // return redirect()->to("user/studentDetails")->with("success", "Student Enrollment Was Successful");
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

}





