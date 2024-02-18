<?php

namespace App\Controllers;

use App\Libraries\Hash;
use App\Models\Logindetails;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\TeacherGrade;


//use CodeIgniter\Validation\Validation;

class Home extends BaseController
{
    public function __construct()
    {

        helper(["url", "form"]);
    }

    public function index()
    {
        return view("login");
    }

    public function login()
    {
        $validation = \Config\Services::validation();
        if ($this->request->is('post')) {

            $rules = [
                'identity' => 'required',
                'password' => 'required|min_length[8]'
            ];

            if ($this->validate($rules)) {

                $userid = $this->request->getPost('identity');
                $password = $this->request->getPost('password');

                $data = [
                    'identity' => $userid,
                    'password' => Hash::encrypt($password)
                ];

                $user = new Logindetails();
                $Student = new Student();
                $Teacher = new Teacher();

                $query = $user->where('identity', $userid)->first();
                $checkstudent = $Student->where('identity', $userid)->first();
                $checkTeacher = $Teacher->where('identity', $userid)->first();


                if ($query) {
                    if ($checkstudent && $query->identity === $checkstudent->identity) {
                        $this->sessionValues($checkstudent);
                    } else if ($checkTeacher && $query->identity === $checkTeacher->identity) {
                        $this->sessionValues($checkTeacher);
                    } else {
                        // Handle the case when neither student nor teacher is found
                        // Perhaps show an error message or redirect to an error page
                    }
                }

                if ($query && password_verify($password, $query->password)) {

                    if ($query->Role == "Admin") {
                        return redirect()->to("Admin")->with('success', 'Login was successful');
                    } else if ($query->Role == 'User') {
                        return redirect()->to("User")->with('success', 'Login was successful');
                    } else if ($query->Role == 'Student') {
                        return redirect()->to("Student")->with('success', 'Login was successful');
                    }

                } else {
                    return redirect()->to('/')->with('error', 'Login failed');
                }

            } else {
                return view('login', ['validation' => $validation]);
            }

        }
        return view('login');


    }


    public function sessionValues($user)
    {
        if ($user && ($user->Role == 'User' || $user->Role == 'Admin')) {

            $teachergrade = new TeacherGrade();
            $find = $teachergrade->where('teacher_id', $user->identity)->first();
            if ($find) {
                $data = [
                    'identity' => $user->identity,
                    'Name' => $user->Name,
                    'Age' => $user->Age,
                    'Address' => $user->Address,
                    'Phone' => $user->Phone,
                    'Email' => $user->Email,
                    'Role' => $user->Role,
                    'IsLoggedIn' => true,
                    'grade_id' => $find->grade_id
                ];
                session()->set($data);

            } else {
                $data = [
                    'identity' => $user->identity,
                    'Name' => $user->Name,
                    'Age' => $user->Age,
                    'Address' => $user->Address,
                    'Phone' => $user->Phone,
                    'Email' => $user->Email,
                    'Role' => $user->Role,
                    'IsLoggedIn' => true,
                ];
                session()->set($data);

            }

        } else {
            $data = [
                'identity' => $user->identity,
                'Name' => $user->Name,
                'Age' => $user->Age,
                'Address' => $user->Address,
                'Phone' => $user->Phone,
                'Email' => $user->Email,
                'Role' => $user->Role,
                'IsLoggedIn' => true,
            ];
            session()->set($data);

        }


    }


    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }
}
