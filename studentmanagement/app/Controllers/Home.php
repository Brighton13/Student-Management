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
                $password = $this->request->getPost('password');
    
                // Call the stored procedure to authenticate the user
                $db = db_connect();
                $sp = 'CALL sp_AuthenticateUser(?, ?)';
                $query = $db->query($sp, array($userid, $password));
    
                $result = $query->getRow();

            var_dump($result);
    
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
                        'Role' => $role
                    ];
                    session()->set($sessiondata);
    
                    // Redirect users based on their role
                    if ($role == "Admin") {
                        return redirect()->to("admin")->with('success', 'Login was successful');
                    } else if ($role == 'User') {
                        return redirect()->to("user")->with('success', 'Login was successful');
                    } else if ($role == 'student') {
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
    



  /*  public function sessionValues($user)
 {
    if ($user && ($user->Role == 'User' || $user->Role == 'Admin')) {

        // Assuming the stored procedure returns the user's information in a result set
        // and the user's information includes identity, Name, Age, Address, Phone, Email, Role
        $identity = $user->identity;

        // Call the stored procedure to get additional user information
        $db = db_connect();
        $sp = 'CALL GetUserAdditionalInfo(?)'; // Replace with the name of your stored procedure
        $result = $db->query($sp, array($identity));

        // Check if the stored procedure returned a result set
        if ($result->getNumRows() > 0) {
            $row = $result->getRow();
            $name = $row->Name;
            $age = $row->Age;
            $address = $row->Address;
            $phone = $row->Phone;
            $email = $row->Email;
            $role = $row->Role;

            // Set session data
            $data = [
                'identity' => $identity,
                'Name' => $name,
                'Age' => $age,
                'Address' => $address,
                'Phone' => $phone,
                'Email' => $email,
                'Role' => $role,
                'IsLoggedIn' => true,
            ];
            session()->set($data);
        }

    } else {
        // Set session data without additional info
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
            }*/



    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }
}
