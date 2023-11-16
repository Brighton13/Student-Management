<?php

namespace App\Controllers;

use App\Libraries\Hash;
use App\Models\User;


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
                'StudentID' => [
                    'rules' => ['required'],
                    'errors' => ['The Identity Number is Required'],
                ],
                'Password' => 'required|min_length[8]'
            ];

            if ($this->validate($rules)) {

                $userid = $this->request->getPost('StudentID');
                $password = $this->request->getPost('Password');

                $data = [
                    'StudentID' => $userid,
                    'Password' => Hash::encrypt($password)
                ];

                $user = new User();
                $query = $user->where('StudentID', $userid)->first();

                // Assuming you have a sessionValues method defined
                $this->sessionValues($query);

                if ($query && password_verify($password, $query->Password)) {

                    if ($query->role == "Admin") {
                        return redirect()->to("Admin")->with('success', 'Login was successful');
                    } else if ($query->role == 'User') {
                        return redirect()->to("User")->with('success', 'Login was successful');
                    } else if ($query->role == 'Student') {
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
        if ($user) {
            $data = [
                'StudentID' => $user->StudentID,
                'Name' => $user->Name,
                'Age' => $user->Age,
                'Grade' => $user->Grade,
                'Address' => $user->Address,
                'Phone' => $user->Phone,
                'Email' => $user->Email,
                'Role' => $user->Role,
                'IsLoggedIn' => true
            ];
            session()->set($data);
        }

        return redirect()->to('login')->with('error', 'User does not exist');

    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }
}
