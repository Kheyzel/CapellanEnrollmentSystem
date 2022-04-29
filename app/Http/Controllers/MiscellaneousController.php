<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Miscellaneousfee;
use App\Model\SchoolYear;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Auth;

class MiscellaneousController extends Controller
{
    public function store(Request $request){

        $miscellaneousfee = new Miscellaneousfee;
        $miscellaneousfee->year_level = $request->year_level;
        $miscellaneousfee->description = $request->description;
        $miscellaneousfee->amount = $request->amount;
        $school_year = SchoolYear::first();
        $miscellaneousfee->school_year = $school_year->school_year;
        $miscellaneousfee->save();
        //logs
        activity('Accounting Logs')
        ->causedBy(Auth::user())
        ->createdAt(now())
        ->log('Modified miscellaneous list');

        return redirect()->route('accountingMaintenance.index');

    }

    public function delete($id){
        $miscellaneousfee = Miscellaneousfee::findorfail($id);
        $miscellaneousfee->delete();
        //logs
        activity('Accounting Logs')
        ->causedBy(Auth::user())
        ->createdAt(now())
        ->log('Modified miscellaneous list');

        return redirect()->route('accountingMaintenance.index');
    }


}
