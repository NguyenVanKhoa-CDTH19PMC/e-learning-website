<?php

namespace App\Http\Controllers;

use App\Http\Controllers\User\Classroom\ClassroomController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Classroom;
use App\Models\JoinedUsers;
use App\Models\Posts;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function index()
    {
       

       
        
        return view('user.index');
    }

    

}






