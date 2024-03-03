<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Hash;
use App\Models\Announcements;
use App\Models\Grade;
use App\Models\Logindetails;
use App\Models\StudentPersonal;
use App\Models\StudentParents;
use App\Models\StudentMedical;
use App\Models\StudentEnroll;
use App\Models\Subject;
use App\Models\TeacherPersonal;
use App\Models\TeacherContact;
use App\Models\TeacherQualification;
use App\Models\TeacherGrade;

class AdminController extends BaseController
{
    public function __construct()
    {
        helper(["url", "form"]);

        ['filter' => 'Auth'];
        if (session()->get('Role') !== 'Admin') {

            echo 'Access denied';
            exit();
        }

    }

    public function GetAllTeachers(){

        $teacher = new TeacherPersonal;
        $data = [
            "teachers" => $teacher->findall() ?? []
        ];

        return view('admin/Teachers',$data);
    }
    public function AllStudents(){
        return view('admin/students');
    }

  /*  public function Announcement()
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

                    return redirect()->to('Admin')->with('success', 'Announcement Posted');
                } else {
                    return redirect()->to('Admin')->with('error', 'Announcement  was not posted');
                }

            }
        }

        return view('admin/createannouncement');

    }*/


    public function index()
    {
        return view("admin/dashboard");
    }

    protected function EmployeeIDGenerator()
    {
        $currentyear = date('Y') - 2000;
        $currentday = date('d');
        $randomNumber = mt_rand(100, 999);
        $employeeid = $currentyear . $currentday . $randomNumber;

        return $employeeid;
    }
    

    public function EnrollStudent()
    {     
        $validation = \Config\Services::validation();
          $data = [
                'Identity' => $this->StudentIDgenerator(),
                'validation' => $validation,
            ];
    
        if ($this->request->is("post")) {
            $rules = [
                // 'Identity' => 'required|is_unique[student_personal_information.StudentId]',
                // 'FirstName' => 'required',
                // 'LastName' => 'required',
                // 'DOB' => 'required|valid_date', // Changed 'date' to 'valid_date'
                // 'Gender' => 'required|in_list[male,female]', // Changed 'in' to 'in_list'
                // 'Nationality' => 'required',
                // 'Address' => 'required',
                // 'PhoneNumber' => 'required',
                // 'Relationship' => 'required', // Added max length for Relationship
                // 'Grade' => 'required', // Changed 'in' to 'in_list'
                // 'GradeTeacher' => 'required',
            ];
    
            if ($this->request->getPost('Email') !== null) { // Changed !empty to !== null
                $rules['Email'] = 'valid_email'; // Changed 'email' to 'valid_email'
            }
    
            if ($this->request->getPost('PhoneTwo') !== null) { // Changed !empty to !== null
                $rules['PhoneTwo'] = 'max_length[15]';
            }
    
            if ($this->validate($rules)) {
                // Retrieve POST data
                $identity = $this->request->getPost('Identity');
                $firstName = $this->request->getPost('FirstName');
                $lastName = $this->request->getPost('LastName');
                $ParentFirstName = $this->request->getPost('p_FirstName');
                $ParentLastName = $this->request->getPost('p_LastName');
                $DOB = $this->request->getPost('DOB');
                $gender = $this->request->getPost('Gender');
                $Nationality = $this->request->getPost('Nationality');
                $address = $this->request->getPost('Address');
                $PhoneOne = $this->request->getPost('PhoneNumber');
                $Email = $this->request->getPost('Email');
                $Condition1 = $this->request->getPost('Condition1');
                $Condition2 = $this->request->getPost('Condition2');
                $Condition3 = $this->request->getPost('Condition3');       
                $Condition4 = $this->request->getPost('Condition4');
                $Emergency1 = $this->request->getPost('Emergency1');
                $Emergency2 = $this->request->getPost('Emergency2');
                $Relationship = $this->request->getPost('Relationship');
                $grade = $this->request->getPost('Grade');
                $GradeTeacher = $this->request->getPost('GradeTeacher');
                $enrollmentDate = date('Y-m-d'); 
                $Password = Hash::encrypt('Zam@24');
                $Role = 'Student';
                $age = date('Y') - date('Y', strtotime($DOB));
    
                // Insert student personal information
               
                $existingStudent = (new StudentPersonal())->where('StudentId', $identity)->first();
                if ($existingStudent===null) { 
                    
                    
                    $data1 = [
                    'StudentId' =>  $identity ,
                    'FirstName' =>   $firstName , 
                    'LastName' =>  $lastName , 
                    'DateOfBirth' =>  $DOB,
                    'Gender' =>  $gender, 
                    'Nationality' => $Nationality , 
                    'Address' => $address,   
                ];
                $Student = new StudentPersonal();
                $query1 = $Student->insert($data1);

                    $data3 = [
                        'StudentId' =>  $identity ,
                        'Condition1' => $Condition1,
                        'Condition2' => $Condition2 ,
                        'Condition3' => $Condition3 ,
                        'Condition4' => $Condition4,
                        'EmergencyContact1' => $Emergency1,
                        'EmergencyContact2' => $Emergency2 
                    ];
                    $studentMed = new StudentMedical();
                    $query2 = $studentMed->insert($data3);
        
                    // Insert student guardian or parent information
                    $data4 = [
                   'studentId' => $identity,
                        'Relationship' => $Relationship,
                        'EmailAddress' => $Email,
                        'PhoneNumber' => $PhoneOne, 
                        'FirstName' => $ParentFirstName,
                        'LastName' => $ParentLastName,
                    ];
                    $studentparent = new StudentParents();
                    $query3 = $studentparent->insert($data4);
        
                    // Insert enrollment details
                    $data5 = [
                       'StudentId' => $identity,
                        'GradeId' => $grade,	
                        'TeacherId' => $GradeTeacher, 
                        'EnrollmentDate' => $enrollmentDate
                    ];
                    $enrollment = new StudentEnroll();
                    $query4 = $enrollment->insert($data5);
        
                    // Insert login details
                    $logindata = [
                        "Identity" => $identity,
                        'Password' => $Password,
                        'Role' => $Role,
                        'IsLoggedIn' => false
                    ];
                    $logindetails = new Logindetails();
                    $query5 = $logindetails->insert($logindata);
    
                     
                    return redirect()->to('Admin')->with('success', 'Student was registered successfully');   
                } else {  
                  
                    
                    //return var_dump($r);
                   return redirect()->to('Admin')->with('error', 'Failed to Enroll student');  
                  } 
            }  
    
                }
                // Insert student medical information
               $Grades= new Grade();
               $Teachers = new TeacherPersonal(); 
              /// $teachers = $Teachers->where('grade_id', '1')->findAll();
               $r=$this->GetGradeTeacher(2);

            
            $data = [
                'Grades'=> $Grades->findAll(),
                'Teachers'=>$Teachers->findAll(),
                'validation' => $validation,
                'identity' => $this->StudentIDgenerator()
               
            ];
        
           // var_dump($teachers);
          return view('admin/enroll', $data);
    }



    public function GetGradeTeacher()
    {
        if ($this->request->isAJAX()) {
            $selectedGrade = $this->request->getPost('selectedGrade');
            $action = $this->request->getPost('action');
             var_dump($selectedGrade);
            // Check if the action is 'get_teacher'
            if ($action == 'get_teacher') {
                // Load the TeacherPersonal model
                $Teacher = new TeacherPersonal();
        
                // Retrieve teachers based on the selected grade
                $teachers = $Teacher->where('grade_id', $selectedGrade)->findAll();
                
                // Send JSON response with the retrieved teachers
                return $this->response->setJSON($teachers);
            }
        }
    }
    
    
    
    
    
 
 protected function StudentIDgenerator()
 {
     $currentyear = date('Y') - 2000;
     $currentmonth = date('m');
     $randomNumber = mt_rand(1000, 9999);
     $studentid = $currentyear . $currentmonth . $randomNumber;

     return $studentid;

 }

 public function HireTeacher()
{
    $validation = \Config\Services::validation();

    if ($this->request->is('post')) {

        $rules = [
            'Identity' => 'is_unique[teacher_personal_information.identity, logindetails.Identity]',
            'DateOfBirth' => "required",
            'FirstName' => "required",
            'LastName' => "required",
            'Nationality' => "required",
            'Gender' => "required",
            'Email' => "required",
            'HomeAddress' => "required",
            'PhoneOne' => 'required|max_length[15]',
            'grade' => 'required'
        ];
       
       

        // Check if PhoneTwo is provided, and if so, add validation rules for it
        if (!empty($this->request->getPost('PhoneTwo'))) {
            $rules['PhoneTwo'] = 'max_length[15]';
        }

        if ($this->validate($rules)) {
            $identity = $this->request->getPost('Identity');
            $DOB = $this->request->getPost('DateOfBirth');
            $firstName = $this->request->getPost('FirstName');
            $lastName = $this->request->getPost('LastName');
            $nationality = $this->request->getPost('Nationality');
            $gender = $this->request->getPost('Gender');
            $Email = $this->request->getPost('Email');
            $address = $this->request->getPost('HomeAddress');
            $PhoneOne = $this->request->getPost('PhoneOne');
            $file1 = $this->request->getFile('Document1');
            $file2 = $this->request->getFile('Document2');
            $Password = Hash::encrypt('Zam@24');
            $Role = 'User';
            $age = date('Y') - date('Y', strtotime($DOB));
            $grade=$this->request->getPost('grade');

            
            // Upload files
            $fileName1 = '';
            $fileName2 = '';

            if (!empty($file1)) {
                $fileName1 = $file1->getName();

                $file1->move('TeacherQualifications',$fileName1);
                
            } else {
                session()->setFlashdata('error', 'Error uploading Document1');
                return redirect()->back()->withInput();
            }

            if (!empty($file2)) {
                $fileName2 = $file2->getName();

                $file2->move('TeacherQualifications',$fileName2);
                
            } else {
                session()->setFlashdata('error', 'Error uploading Document2');
                return redirect()->back()->withInput();
            }
            // Insert data into the database
            $teacherPersonalInformation = new TeacherPersonal();
            $data1 = [
                'Identity' => $identity,
                'DateOfBirth' => $DOB,
                'FirstName' => $firstName,
                'LastName' => $lastName,
                'Nationality' => $nationality,
                'Gender' => $gender,
                'Age' => $age,
                'HomeAddress' => $address,
            ];
            $teacherPersonalInformation->insert($data1);

            $teacherContact = new TeacherContact();
            $data2 = [
                'TeacherId' => $identity,
                'PhoneOne' => $PhoneOne,
                'PhoneTwo' => $this->request->getPost('PhoneTwo'),
                'Email' => $Email,
            ];
            $teacherContact->insert($data2);

            $teacherGrade= new TeacherGrade();
            $data23=[
                'teacher_id'=>$identity,
                'grade_id' =>$grade
            ];
            $teacherGrade->insert($data23);

            $teacherQualification = new TeacherQualification();
            $data3 = [
                'TeacherId' => $identity,
                'QualificationDocument1' => $fileName1,
                'QualificationDocument2' => $fileName2
            ];
            $teacherQualification->insert($data3);

            $logindata = new Logindetails();
            $logindatum = [
                'Identity' => $identity,
                'Password' => $Password,
                'Role' => $Role,
                'IsloggedIn' => false,
            ];
            $logindata->insert($logindatum);

            return redirect()->to('Admin')->with('success', 'Teacher was registered successfully');
        } else {
            return redirect()->to('Admin')->with('error', 'Teacher was not registered successfully');
        }
    }
    $Grades= new Grade();
    $data = [
        'Grades' =>$Grades->findAll(),
        'validation' => $validation,
        'identity' => $this->EmployeeIDGenerator(),
    ];

    return view('admin/hire', $data);
}




//  public function HireTeacher()
//  {
//      $validation = \Config\Services::validation();
 
//      if ($this->request->is('post')) {
 
//          $rules = [
//              'Identity' => 'is_unique[teacher_personal_information.identity, logindetails.Identity]',
//              'DateOfBirth' => "required",
//              'FirstName' => "required",
//              'LastName' => "required",
//              'Nationality' => "required",
//              'Gender' => "required",
//              'Email' => "required",
//              'HomeAddress' => "required",
//              'PhoneOne' => 'required|max_length[15]',
//              'PhoneTwo' => 'max_length[15]',
//              'Document1' => 'required',
             
//          ];
 
//          if ($this->validate($rules)) { // Corrected to `$this->validate` from `$this->Validate`

//              $identity = $this->request->getPost('Identity');
//              $DOB = $this->request->getPost('DateOfBirth');
//              $firstName = $this->request->getPost('FirstName');
//              $lastName = $this->request->getPost('LastName');
//              $nationality = $this->request->getPost('Nationality');
//              $gender = $this->request->getPost('Gender');
//              $Email = $this->request->getPost('Email');
//              $address = $this->request->getPost('HomeAddress');
//              $PhoneOne = $this->request->getPost('PhoneOne');
//              $PhoneTwo = $this->request->getPost('PhoneTwo');
//              $file1 = $this->request->getFile('Document1');
//              $file2= $this->request->getFile('Document2'); 
//              $Password = Hash::encrypt('Zam@24');
//              $Role = 'User';
//              $age = date('Y') - date('Y', strtotime($DOB));



//              if ($file1 !== null && $file1->isValid() && !$file1->hasMoved()) {
//                 $file1->move('./TeacherQualifications');
//                 $fileName1 = $file1->getName();
//             } else {
//                 // Handle error, log it, or return a response indicating the issue
//                 echo "Error uploading Document1";
//             }
            
//             if ($file2 !== null && $file2->isValid() && !$file2->hasMoved()) {
//                 $file2->move('./TeacherQualifications');
//                 $fileName2 = $file2->getName();
//             } else {
//                 // Handle error, log it, or return a response indicating the issue
//                 echo "Error uploading Document2";
//             }
              

//             $teacherPersonalInfromation=new TeacherPersonal();
//             $data1=[
//              'Identity' => $identity,
//              'DateOfBirth' => $DOB,
//              'FirstName' => $firstName,
//              'LastName' => $lastName,
//              'Nationality' => $nationality,
//              'Gender' => $gender,
//              'Age' => $age,
//              'HomeAddress' => $address   
//             ];
//             $teacherPersonalInfromation->insert($data1);



//             $teacherContact=new TeacherContact();
//             $data2=[
//                 'TeacherId'=> $identity,
//                 'PhoneOne' => $PhoneOne,
//                 'PhoneTwo' => $PhoneTwo,
//                 'Email'=>$Email

//             ];
//             $teacherContact -> insert($data2);

//             $teacherQualification = new TeacherQualification();
//             $data3 =[
//                 'TeacherId' =>$identity,
//                 'QualificationDocument1'=>$file1,
//                 'QualificationDocument2' => $file2

//             ];
//             $teacherQualification-> insert($data3);

//             $logindata= new Logindetails();
//             $logindatum=[
//                 'Identity' =>$identity,
//                 'Password' =>$Password,
//                 'Role' =>$Role,
//                 'IsloggedIn'=> 'false'
//             ];
//             $logindata->insert($logindatum);



//             //  $db = db_connect();
//             //  $sp1 ='CALL sp_AddTeacher_Information(?,?,?,?,?,?,?)';
//             //  $sp2 ='CALL sp_AddLoginDetails(?,?,?)';
//             //  $sp3 ='CALL sp_AddTeacherContact_Information(?,?,?,?)';
//             //  $sp4 ='CALL sp_TeacherQualificationInformation(?,?,?)';
            
             
//             //  //insert Teacher personal information
//             //  $db->query($sp1, array($identity,$firstName,$lastName,$gender, $nationality,$address,$DOB));

//             //  //login details
//             //  $db->query($sp2, array($identity,$Password,$Role));

//             //  //Insert Teacher contact information
//             //  $db->query($sp3, array($PhoneOne,$PhoneTwo,$Email,$identity));
 
//             //  $db->query($sp4, array($identity,$fileName1, $fileName2));
      
 
 
//              return redirect()->to('Admin')->with('success', 'Teacher was registered successfully');
//          } else {
//              return redirect()->to('Admin')->with('error', 'Teacher was not registered successfully');
//          }
//      }
 
//      $data1 = [
//          'validation' => $validation,
//          'identity' => $this->EmployeeIDGenerator(),
//      ];
 
//      return view('admin/hire', $data1);
//  }


 
/*
    public function ViewAnnouncement($id)
    {
        // $id = $this->request->getPost("ID");
        $Announcements = new Announcements();
        $query = $Announcements->find($id);

        $data = [
            'Announcement' => $query
        ];

        //var_dump($data);

        return view('admin/announcement', $data);

    }

    public function classAlloc($userid)
    {
        $grade = $this->request->getPost('grade_id');

        $teacher = new Teacher();
        $teachergrade = new TeacherGrade();

        // Fetch the teacher record by user ID
        $findTeacher = $teacher->where('identity', $userid)->first();

        // Check if the teacher record is found
        if ($findTeacher) {
            // Update the allocated_grade field in the teacher table
            try {
                // Update the allocated_grade field in the teacher table


                // Insert a new record into the teacher_grade table
                $teachergradedata = [
                    'teacher_id' => $findTeacher->identity,
                    'grade_id' => $grade
                ];
                $teachergrade->insert($teachergradedata);

                // Redirect with success message
                return redirect()->to('Admin')->with('success', 'Responsibility Assigned');
            } catch (\Exception $e) {
                // Log or display the error
                log_message('error', 'Error updating allocated_grade: ' . $e->getMessage());

                // Redirect with an error message
                return redirect()->to('Admin')->with('error', 'Failed to update allocated_grade');
            }


        } else {
            // Redirect with an error message if the teacher record is not found
            return redirect()->to('Admin')->with('error', 'Teacher not found');
        }
    }


    public function allocation()
    {
        if ($this->request->is('get')) {
            $Teacher = new Teacher();
            $grade = new Grade();
            $teachergrade = new TeacherGrade();

            $teachergrades = $teachergrade->findAll();
            $teachers = $Teacher->findAll();
            $Grade = $grade->findAll();

            $teachersNotAllocated = [];

            // Iterate through each teacher
            foreach ($teachers as $teacher) {
                $isAllocated = false;

                // Check if the teacher ID is in the teacher_grade table
                foreach ($teachergrades as $grade) {
                    if ($teacher->identity === $grade->teacher_id) {
                        $isAllocated = true;
                        break;
                    }
                }

                // If the teacher is not allocated, add to the array
                if (!$isAllocated) {
                    $teachersNotAllocated[] = $teacher;
                }
            }

            // Pass the array of non-allocated teachers to the view
            $data = [
                'teachers' => $teachersNotAllocated,
                'grades' => $Grade
            ];

            return view('admin/classallocation', $data);
        }
    }


    public function subjects()
    {
        $subjects = new Subject();

        $data = [
            'Subjects' => $subjects->findAll()
        ];

        return view('admin/subjects', $data);
    }



    public function AddSubject()
    {
        $grade = new Grade();
        $grades = $grade->findAll();
        if ($this->request->is('get')) {
            $data = [

                'Grades' => $grades
            ];

            return view('admin/createsubject', $data);
        }

        $validation = \Config\Services::validation();
        $rule = [
            'Name' => 'required',
            'SubjectCode' => 'required'
        ];

        if ($this->validate($rule)) {
            $name = $this->request->getPost('Name');
            $SubjectCode = $this->request->getPost('SubjectCode');
            $grade = $this->request->getPost('grade_id');

            $data = [
                'Name' => $name,
                'SubjectCode' => $SubjectCode,
                'grade_id' => $grade
            ];



            $subject = new Subject();

            $query = $subject->insert($data);



            if ($query) {
                //  var_dump($grade);

                return redirect()->to('Admin/subjects')->with('success', 'A subject was add');
            } else {
                $message = "Something went wrong";
                return view('admin/subjects', ['error' => $message]);
            }
        }
        $data = [
            'validation' => $validation,
            'Grades' => $grades

        ];


        return view('admin/createsubject', $data);
    }
*/

}

