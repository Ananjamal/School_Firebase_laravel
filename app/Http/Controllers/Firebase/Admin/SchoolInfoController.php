<?php

namespace App\Http\Controllers\Firebase\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kreait\Firebase\Contract\Database;

class SchoolInfoController extends Controller
{
    protected $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function index(){
        $school = $this->database->getReference('school')->getValue();

        return view('firebase.admin.school.main',compact('school'));
    }

}
