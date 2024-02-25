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
    
        if (!$this->request->is('post')) {
            // If it's not a POST request, show the login page
            return view('login', ['validation' => $validation]);
        }
    
        // Define validation rules
        $rules = [
            'identity' => 'required',
            'password' => 'required|min_length[5]'
        ];
    
        // Validate input data
        if (!$this->validate($rules)) {
            return redirect()->to('/')->with('error', 'Invalid credentials');
        }
    
        // Get user input
        $userid = $this->request->getPost('identity');
        $password = $this->request->getPost('password');


        $logindetails = new Logindetails();

        $user = $logindetails->where('identity', $userid)->first();
        

        // Check if user exists
        if (!$user) {
        return redirect()->to('/')->with('error', 'User not found');
        }

        // Verify password
        if (!password_verify($password, $user->Password)) {
        return redirect()->to('/')->with('error', 'Invalid password');
        }
         // Update the IsLoggedIn field in the database (optional)
        $db = db_connect();
        $updateData = [
              'IsLoggedIn' => true
        ];
        $db->table('logindetails')->where('Identity', $userid)->update($updateData);

        // Call the stored procedure for user session data
        $sp = 'CALL sp_AuthenticateUser(?)';
        $query = $db->query($sp, array($userid));
        $result = $query->getRow();
    
        if (!$result) {
            return redirect()->to('/')->with('error', 'User not found');
        }
    
        // Fetch user data
        $firstName = $result->FirstName;
        $lastName = $result->LastName;
        $identity = $result->Identity;
        $role = $result->Role;
        $IsloggedIn = true; // Set IsLoggedIn to true
        

    
        // Store user data in session
        $sessiondata = [
            'FirstName' => $firstName,
            'LastName' => $lastName,
            'Identity' => $identity,
            'Role' => $role,
            'IsLoggedIn' => $IsloggedIn
        ];
    
        session()->set($sessiondata);
    
        // Redirect users based on their role
        switch ($role) {
            case "Admin":
                return redirect()->to("Admin")->with('success', 'Login was successful');
            case "User":
                return redirect()->to("User")->with('success', 'Login was successful');
            case "Student":
                return redirect()->to("student")->with('success', 'Login was successful');
            default:
                return redirect()->to('/')->with('error', 'Invalid role');
        }
    }
    
    


    

    public function logout()
    {
        // Get the user's identity from the session
        $identity = session('Identity');
    
        // Update the IsLoggedIn field in the database to false for the logged-out user
        $db = db_connect();
        $updateData = [
            'IsLoggedIn' => false
        ];
        $db->table('logindetails')->where('Identity', $identity)->update($updateData);
    
        // Destroy the session
        session()->destroy();
    
        // Redirect to the login page
        return redirect()->to('/');
    }
    
}
