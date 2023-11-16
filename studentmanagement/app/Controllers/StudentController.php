<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Announcements;

class StudentController extends BaseController
{
    public function index()
    {
        $Announcements = new Announcements();

        $data = [
            "announcements" => $Announcements->findall() ?? []
        ];
        //   var_dump($data);
        return view("Student/home", $data);
    }


    public function ViewAnnouncement($id)
    {
        // $id = $this->request->getPost("ID");
        $Announcements = new Announcements();
        $query = $Announcements->find($id);

        $data = [
            'Announcement' => $query
        ];

        //var_dump($data);

        return view('student/announcementdoc', $data);

    }
}

