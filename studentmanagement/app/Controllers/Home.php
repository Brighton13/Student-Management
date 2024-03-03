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
    // Load validation service
    $validation = \Config\Services::validation();

    // Check if it's a POST request
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
    $userIdentity = $this->request->getPost('identity');
    $password = $this->request->getPost('password');

    // Retrieve user from the database
    $loginDetailsModel = new Logindetails();
    $user = $loginDetailsModel->where('Identity', $userIdentity)->first();

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
    $db->table('logindetails')->where('Identity', $userIdentity)->update($updateData);

    // Call the stored procedure for user session data
    $sp = 'CALL sp_AuthenticateUser(?)';
    $query = $db->query($sp, [$userIdentity]);
    $result = $query->getRow();

    // Check if the stored procedure returned valid user data
    if (!$result) {
        return redirect()->to('/')->with('error', 'Failed to authenticate user');
    }

    // Fetch user data
    $firstName = $result->FirstName;
    $lastName = $result->LastName;
    $userIdentity = $result->Identity;
    $role = $result->Role;

    // Store user data in session
    $sessionData = [
        'FirstName' => $firstName,
        'LastName' => $lastName,
        'Identity' => $userIdentity,
        'Role' => $role,
        'IsLoggedIn' => true
    ];

    session()->set($sessionData);

    // Redirect users based on their role
    switch ($role) {
        case 'Admin':
            return redirect()->to('Admin')->with('success', 'Login was successful');
        case 'User':
            return redirect()->to('User')->with('success', 'Login was successful');
        case 'Student':
            return redirect()->to('Student')->with('success', 'Login was successful');
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
