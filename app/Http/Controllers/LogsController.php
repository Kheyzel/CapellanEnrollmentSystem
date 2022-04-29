<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use App\Model\Student;
//use Activity;
// use Spatie\Activitylog\Models\Activity as ActivityModel;

class LogsController extends Controller
{
    public function index(){

        $ActivityLogs = Activity::all(); 
        return view('Logs.index',compact('ActivityLogs'));

    }

    // public function clearlog(){
    //     Activity::cleanLog();
    //     Activity::log('Logs cleared By : '.Auth::user()->name);
    //     \Session::flash('success', 'Logs deleted successfully');
    // }
}
