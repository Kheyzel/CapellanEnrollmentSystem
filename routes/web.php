<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Dashbaord
Route::group(['prefix' => 'dashboard','middleware' => 'auth'], function()
{
    Route::get('', 'DashboardController@index')->name('dashboard');
});

//Student Registration
Route::group(['prefix' => 'StudentRegistration','middleware' => 'auth'], function()
{
    Route::get('/index', 'StudentRegistrationController@index')->name('studentRegistration.index');
});

//StudentRecord
Route::group(['prefix' => 'student-record','middleware' => 'auth'], function()
{
    Route::get('', 'StudentRecordController@index')->name('student_record.index');
    Route::get('/show/{id}', 'StudentRecordController@show')->name('student_record.show');
    Route::get('/edit/{id}', 'StudentRecordController@edit')->name('student_record.edit');
    Route::put('/update/{id}', 'StudentRecordController@update')->name('student_record.update');  

//StudentsTable grade 11
    Route::get('/allStudents', 'StudentRecordController@allstudents')->name('allStudents'); 
    Route::get('/IA-automotive', 'StudentRecordController@IA_AS')->name('IA-AS');
    Route::get('/IA-Electrical-Installation-and-Maintenance', 'StudentRecordController@IA_EIM')->name('IA_EIM');
    Route::get('/IA-Electronic-Products-Assembly-and-Servicing', 'StudentRecordController@IA_EPAS')->name('IA_EPAS');
    Route::get('/ICT-Computer-System-Servicing-NC-II', 'StudentRecordController@ICT_CSS')->name('ICT_CSS');
    Route::get('/ICT-Programming', 'StudentRecordController@ICT_P')->name('ICT_P');
    Route::get('/HE-Housekeeping-NC-II-Front-Office-Services-NC-II', 'StudentRecordController@HE_H_FOS')->name('HE_H_FOS');
    Route::get('/HE-Food-and-Beverage-Services-NC-II-Bread-and-Pastry-Production-NC-II', 'StudentRecordController@HE_FBS_BPP')->name('HE_FBS_BPP');

//StudentsTable grade 12
    Route::get('/IA-automotive-g12', 'StudentRecordController@IA_AS_12')->name('IA-AS_12');
    Route::get('/IA-Electrical-Installation-and-Maintenance-g12', 'StudentRecordController@IA_EIM_12')->name('IA_EIM_12');
    Route::get('/IA-Electronic-Products-Assembly-and-Servicing-g12', 'StudentRecordController@IA_EPAS_12')->name('IA_EPAS_12');
    Route::get('/ICT-Computer-System-Servicing-NC-II-g12', 'StudentRecordController@ICT_CSS_12')->name('ICT_CSS_12');
    Route::get('/ICT-Programming-g12', 'StudentRecordController@ICT_P_12')->name('ICT_P_12');
    Route::get('/HE-Housekeeping-NC-II-Front-Office-Services-NC-II-g12', 'StudentRecordController@HE_H_FOS_12')->name('HE_H_FOS_12');
    Route::get('/HE-Food-and-Beverage-Services-NC-II-Bread-and-Pastry-Production-NC-II-g12', 'StudentRecordController@HE_FBS_BPP_12')->name('HE_FBS_BPP_12');
    });




    //Enrollment

    Route::group(['prefix' => 'enrollment','middleware' => 'auth'], function()
{
    Route::get('', 'EnrollmentController@index')->name('enrollment.index');
    Route::get('/g11/index', 'EnrollmentController@g11index')->name('enrollment.g11index');
    Route::get('/g12/index', 'EnrollmentController@g12index')->name('enrollment.g12index');
    Route::get('', 'EnrollmentController@index')->name('enrollment.index');
    Route::get('/create/{id}', 'EnrollmentController@create')->name('enrollment.create');
    Route::post('/store/{id}', 'EnrollmentController@store')->name('enrollment.store');
    Route::post('/store_trans/{id}', 'EnrollmentController@store_transferee')->name('enrollment.store_transferee');
    Route::delete('/deleteStudent/{id}', 'EnrollmentController@destroy')->name('enrollment.destroy');
});

//Accounting
Route::group(['prefix' => 'accounting','middleware' => 'auth'], function()
{
    Route::get('/', 'AccountingController@index')->name('accounting.index');
    Route::get('/show/{id}', 'AccountingController@show')->name('accounting.show');
});


//Register Student
Route::group(['prefix' => 'RegisterStudent','middleware' => 'auth'], function()
{
    
    Route::get('/create', 'RegisterStudentController@create')->name('registerStudent.index');
    Route::post('/store', 'RegisterStudentController@store')->name('registerStudent.store');
    
    Route::get('/import', 'RegisterStudentController@import')->name('registerStudent.import');

    
});

//System Maintenance
Route::group(['prefix' => 'SystemMaintenance','middleware' => 'auth'], function()
{
    Route::get('/index', 'SystemMaintenanceController@index')->name('systemMaintenace.index');
    Route::post('/store', 'SystemMaintenanceController@store')->name('systemMaintenace.store');

});
//registrar maintenance
Route::group(['prefix' => 'RegistrarMaintenance','middleware' => 'auth'], function()
{
    Route::get('/index', 'RegistrarMaintenanceController@index')->name('registrarMaintenance.index');
});
//accounting maintenance
Route::group(['prefix' => 'AccountingMaintenance','middleware' => 'auth'], function()
{
    Route::get('/index', 'AccountingMaintenanceController@index')->name('accountingMaintenance.index');
});

//Miscellaneous controller - system maintenance
Route::group(['prefix' => 'Miscellaneous','middleware' => 'auth'], function()
{
    Route::post('/store', 'MiscellaneousController@store')->name('miscellaneous.store');
    Route::delete('/delete/{id}', 'MiscellaneousController@delete')->name('miscellaneous.delete');

});

//SchoolYear controller - system maintenance
Route::group(['prefix' => 'SchoolYear','middleware' => 'auth'], function()
{
   
    Route::put('/update/{id}', 'SchoolYearController@update')->name('schoolyear.update');

});

//Printables
Route::group(['prefix' => 'print','middleware' => 'auth'], function()
{
    Route::get('/enrollmentForm/{id}', 'PrintablesController@enrollmentForm')->name('enrollmentForm.print');
    Route::get('/RegistrationPaymentSlip/{id}', 'PrintablesController@paymentSlip')->name('paymentSlip.print');
    Route::get('/RegistrationPaymentSlip-grade12/{id}', 'PrintablesController@paymentSlipG12')->name('paymentSlipG12.print');
    Route::get('/TuitionPaymentSlip/{id}', 'PrintablesController@TuitionPaymentSlip')->name('TuitionPaymentSlip.print');
    Route::get('/TuitionPaymentSlip-grade12/{id}', 'PrintablesController@TuitionPaymentSlipG12')->name('TuitionPaymentSlipG12.print');
    Route::get('/StatementOfAccount/{id}', 'PrintablesController@StatementOfAccount')->name('StatementOfAccount.print');
    Route::get('/StatementOfAccount-grade12/{id}', 'PrintablesController@StatementOfAccountG12')->name('StatementOfAccountG12.print');
});

//Add Tuition Payment
Route::group(['prefix' => 'RegisterStudent','middleware' => 'auth'], function()
{ 
    Route::post('/store/{id}', 'AddTuitionPaymentController@store')->name('addTuitionPayment.store');
});

// Document
Route::group(['prefix' => 'Document-','middleware' => 'auth'], function()
{ 
    Route::post('/store/{id}', 'DocumentController@store')->name('document.store');
    Route::post('/update/{id}', 'DocumentController@update')->name('document.update');
    Route::get('/download/{id}/{Document}', 'DocumentController@download')->name('document.download');
});

// g11 Completer
Route::group(['prefix' => 'G11Completer','middleware' => 'auth'], function()
{ 
    Route::get('/store/{id}', 'G11CompleterController@store')->name('g11completer.store');
});

// graduate
Route::group(['prefix' => 'graduate','middleware' => 'auth'], function()

{     
    Route::get('/', 'GraduateController@index')->name('graduate.index');
    Route::get('/store/{id}', 'GraduateController@store')->name('graduate.store');
    Route::get('/show/{id}', 'GraduateController@show')->name('graduate.show');
});

// dropouts
Route::group(['prefix' => 'dropout','middleware' => 'auth'], function()

{     
    Route::get('/', 'DropoutController@index')->name('dropout.index');
    Route::post('/store', 'DropoutController@store')->name('dropout.store');
    Route::get('/show/{id}', 'DropoutController@show')->name('dropout.show');
});


//Reports
Route::group(['prefix' => 'reports','middleware' => 'auth'], function()
{
    Route::get('/', 'RegistrarReportController@index')->name('registrarReport.index');
});


//Reports
Route::group(['prefix' => 'reports/registrarReport','middleware' => 'auth'], function()
{

    //listofstudentreporttable
    Route::get('/listOfStudentsReport', 'ListOfStudentsController@index')->name('ListOfStudents.index');
    Route::post('/listOfStudentsReport', 'ListOfStudentsController@show')->name('ListOfStudents.show');

    //contactdetailsofstudentreport
    Route::get('/studentsContactDetailsReport', 'ContactDetailsOfStudentsController@index')->name('ContactDetailsOfStudents.index');
    Route::post('/studentsContactDetailsReport', 'ContactDetailsOfStudentsController@show')->name('ContactDetailsOfStudents.show');
    
    //documentofstudentreport
    Route::get('/studentsDocumentReport', 'DocumentsOfStudentsController@index')->name('DocumentOfStudent.index');
    Route::post('/studentsDocumentReport', 'DocumentsOfStudentsController@show')->name('DocumentOfStudent.show');
});


Route::group(['prefix' => 'reports/accountingReport','middleware' => 'auth'], function()
{

    //accountingreport
    Route::get('/listOfStudentsReport', 'AccountingReportController@index')->name('accountingReport.index');
    Route::post('/listOfStudentsReport', 'AccountingReportController@show')->name('accountingReport.show');
});

Route::group(['prefix' => 'importStudent','middleware' => 'auth'], function()
{

    //Import Student
    
    Route::post('/import', 'StudentImportController@import')->name('importStudent.import');
});


// Auth Register
Route::group(['prefix' => 'registerUser','middleware' => 'auth'], function()

{     
    Route::get('/', 'RegisterUserController@index')->name('registerUser.index');
});

// Logs
Route::group(['prefix' => 'Logs','middleware' => 'auth'], function()

{     
    Route::get('/', 'LogsController@index')->name('Logs.index');
    // Route::get('/clearLogs', 'LogsController@clearlog')->name('Logs.clearlog');
});



//E-form Home
Route::get('/', function () {
    return view('eform');
})->name('eform');
Route::post('/store_eform', 'RegisterStudentController@store_eform')->name('registerStudent.store_eform');



// use Spatie\Activitylog\Models\Activity;
//  Route::get('/Logs', function () {

//     $ActivityLogs = Activity::all(); 

//  return view('Logs.index',compact('ActivityLogs'));
//  })->name('Logs.index')->middleware('auth');


 Route::group(['prefix' => 'reports','middleware' => 'auth'], function()
{
    Route::get('/', 'RegistrarReportController@index')->name('registrarReport.index');
});




Route::group(['prefix' => 'yearlyStudentsReport','middleware' => 'auth'], function()
{
    Route::get('/', 'YearlyStudentReportController@index')->name('YearlyStudentReport.index');
    Route::post('/Students_g11', 'YearlyStudentReportController@search')->name('YearlyStudentReport.search'); 
    Route::post('/Students_g13', 'YearlyStudentReportController@search_g12')->name('YearlyStudentReport.search_g12');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

