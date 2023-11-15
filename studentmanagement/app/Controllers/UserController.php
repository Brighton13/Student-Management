<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

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

    public function EnrollStudent()
    {
        if ($this->request->is("get")) {
            return view("user/enroll");
        }

        $validation = \Config\Services::validation();

        // $rules = [
        //     "Name" => "required|alpha_space",
        //     "Age" => "required|integer",
        //     "Email" => "required|valid_email",
        //     "Address" => "required",
        //     'Phone' => 'required|max_length[15]',
        //     "Grade" => "required|integer",
        //     'password' => 'required|min_length[8]|',
        //     'confirm_password' => 'required|matches[password]',
        // ];


        $name = $this->request->getPost('Name', true);
        $email = $this->request->getPost('Email', true);
        $Age = $this->request->getPost('Age', true);
        $Address = $this->request->getPost('Address', true);
        $Phone = $this->request->getPost('Phone', true);
        $Grade = $this->request->getPost('Grade', true);
        $password = $this->request->getPost('Password', true);
        $confirm_password = $this->request->getPost('ConfirmPassword', true);

        // Generate Student ID
        $currentYear = date('Y');
        $currentMonth = date('m');
        $studentID = $currentYear . $currentMonth . $Grade;

        $data = [
            "UserID" => $studentID,
            "Name" => $name,
            "Age" => $Age,
            "Email" => $email,
            "Address" => $Address,
            'Phone' => $Phone,
            "Grade" => $Grade,
            'password' => 'test1234',  // You might want to use hashed passwords in a real scenario
            'confirm_password' => 'test1234',
            'Role' => "Student",
        ];

        $Student = new User();

        $query = $Student->insert($data);

        if ($query === false) {
            return redirect()->to("user/enroll")->with("error", "Student Enrollment Failed");
        }

        return redirect()->to("user/studentDetails")->with("success", "Student Enrollment Was Successful");
    }
}





