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
                'password' => 'required|min_length[5]'
            ];
    
            if ($this->validate($rules)) {
                $userid = $this->request->getPost('identity');
                $Password = $this-> request->getPost('password');
              //  $password = $this->request->getPost('password');
    
                // Call the stored procedure to authenticate the user
                $db = db_connect();
                $sp = 'CALL sp_AuthenticateUser(?, ?)';
                $query = $db->query($sp, array($userid,$Password));
    
                $result = $query->getRow();

//                var_dump($result);
           
    
          if ($result) {
                    // Fetch user data
                    $firstName = $result->FirstName;
                    $lastName = $result->LastName;
                    $identity = $result->Identity;
                    $role = $result->Role;
    
                    // Store user data in session
                    $sessiondata = [
                        'FirstName' => $firstName,
                        'LastName' => $lastName,
                        'Identity' => $identity,
                        'Role' => $role,
                        'IsLoggedIn'=>true
                    ];
                    session()->set($sessiondata);
    
                    // Redirect users based on their role
                    if ($role == "Admin") {
                        return redirect()->to("Admin")->with('success', 'Login was successful');
                    } else 
                    if ($role == 'User') {
                        return redirect()->to("User")->with('success', 'Login was successful');
                    } else
                    if ($role == 'Student') {
                        return redirect()->to("student")->with('success', 'Login was successful');
                    }
                }                
                else {
                    return redirect()->to('/')->with('error', 'Invalid credentials');
                }
            }else {
                // Validation failed, show login page with errors
                return view('login', ['validation' => $validation]);
            }
        
        // If it's not a POST request, show login page
        return view('login');
    }}
    


    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
