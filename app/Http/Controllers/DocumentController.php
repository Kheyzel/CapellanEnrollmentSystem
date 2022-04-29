<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Model\Document;
use App\Model\Student;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    public function store(Request $request, $id){

        $request->validate([
            'form137file','form138file','PSAfile','goodmoralfile','COCfile'
          ]);

        $student = Student::findOrfail($id);
        $document = new Document;   
        $document->student_id = $id;
        $document->Form137= $request->form137;
        $document->Form138= $request->form138;
        $document->PSA = $request->PSA;  
        $document->Goodmoral = $request->goodmoral;
        $document->COC = $request->COC;


        if ($request->file('form137file') != null) {

            $form137_filepath = $request->file('form137file');
            $form137_fileName = $form137_filepath->getClientOriginalName();
            $form137_path = $request->file('form137file')->storeAs('document', $form137_fileName, 'public');


        $document->Form137_Path = $form137_path;
        $document->Form137_Document = $form137_fileName;
        
        }

        if ($request->file('form138file') != null) {

            $form138_filepath = $request->file('form138file');
            $form138_fileName = $form138_filepath->getClientOriginalName();
            $form138_path = $request->file('form138file')->storeAs('document', $form138_fileName, 'public');

         $document->Form138_Path = $form138_path;
         $document->Form138_Document = $form138_fileName;
         
        }

        if ($request->file('PSAfile') != null) {

            $PSA_filepath = $request->file('PSAfile');
            $PSA_fileName = $PSA_filepath->getClientOriginalName();
            $PSA_path = $request->file('PSAfile')->storeAs('document', $PSA_fileName, 'public');

        $document->PSA_Path = $PSA_path;
        $document->PSA_Document = $PSA_fileName;
         
        }

        if ($request->file('goodmoralfile') != null) {

            $goodmoral_filepath = $request->file('goodmoralfile');
            $goodmoral_fileName = $goodmoral_filepath->getClientOriginalName();
            $goodmoral_path = $request->file('goodmoralfile')->storeAs('document', $goodmoral_fileName, 'public');

        $document->Goodmoral_Path = $goodmoral_path;
        $document->Goodmoral_Document = $goodmoral_fileName;
        
        }


        if ($request->file('COCfile') != null) {
            $COC_filepath = $request->file('COCfile');
            $COC_fileName = $COC_filepath->getClientOriginalName();
            $COC_path = $request->file('COCfile')->storeAs('document', $COC_fileName, 'public');

        $document->COC_Path = $COC_filepath;
        $document->COC_Document = $COC_fileName;
        
        }
        $document->save();

        //logs
        activity('Student Record Logs')
        ->causedBy(Auth::user())
        ->performedOn($student)
        ->createdAt(now())
        ->log('Modified list of submitted documents');

        return redirect()->route('student_record.show',$id);
    }

    public function update(Request $request, $id){

        // $student = Student::with('document')->findOrfail($id);
        // $student->document->update($request->all());

        // $request->validate([
        //     'form137file','form138file','PSAfile','goodmoralfile','COCfile'
        //   ]);

        $student = Student::findOrfail($id);
        $document = Document::where('student_id', $id);   
        $document->student_id =  $id;

        if ($request->form137 != null) {

            
            if ($request->form137file != null) {
                $form137_filepath = $request->file('form137file');
                $form137_fileName = $form137_filepath->getClientOriginalName();
                $form137_path = $request->file('form137file')->storeAs('document', $form137_fileName, 'public');
    
                $document->update([
                    'Form137_Path'=> $form137_path ,'Form137_Document'=> $form137_fileName,'Form137'=> $request->form137
                ]);
            }
            
            $document->update([
                'Form137'=> $request->form137
            ]);


            
        }

        if ($request->form138 != null) {


            if ($request->form138file != null) {

                $form138_filepath = $request->file('form138file');
                $form138_fileName = $form138_filepath->getClientOriginalName();
                $form138_path = $request->file('form138file')->storeAs('document', $form138_fileName, 'public');
    
                $document->update([ 
                    'Form138_Path'=> $form138_path ,'Form138_Document'=> $form138_fileName,'Form138'=> $request->form138
                ]);
            }

            $document->update([
                'Form138'=> $request->form138
            ]);

        }

        if ($request->PSA != null) {

            if ($request->PSAfile != null) {

                $PSA_filepath = $request->file('PSAfile');
                $PSA_fileName = $PSA_filepath->getClientOriginalName();
                $PSA_path = $request->file('PSAfile')->storeAs('document', $PSA_fileName, 'public');  
    
                $document->update([
                    'PSA_Path'=> $PSA_path ,'PSA_Document'=> $PSA_fileName,'PSA'=> $request->PSA
                ]);

            }

            $document->update([
                'PSA'=> $request->PSA
            ]);

        }

        if ($request->goodmoral != null) {

            if ($request->goodmoralfile != null) {

                $goodmoral_filepath = $request->file('goodmoralfile');
                $goodmoral_fileName = $goodmoral_filepath->getClientOriginalName();
                $goodmoral_path = $request->file('goodmoralfile')->storeAs('document', $goodmoral_fileName, 'public');
    
                $document->update([
                    'Goodmoral_Path'=> $goodmoral_path ,'Goodmoral_Document'=>  $goodmoral_fileName,'Goodmoral'=> $request->goodmoral
                ]);

            }

            $document->update([
                'Goodmoral'=> $request->goodmoral
            ]);

        }


        if ($request->COC != null) {

            if ($request->COCfile != null) {

                $COC_filepath = $request->file('COCfile');
                $COC_fileName = $COC_filepath->getClientOriginalName();
                $COC_path = $request->file('COCfile')->storeAs('document', $COC_fileName, 'public');
    
                $document->update([
                    'COC_Path'=> $COC_filepath ,'COC_Document'=>  $COC_fileName,'COC'=> $request->COC
                ]);
            }

            $document->update([
                'COC'=> $request->COC
            ]);

        }
        //logs
        activity('Student Record Logs')
        ->causedBy(Auth::user())
        ->performedOn($student)
        ->createdAt(now())
        ->log('Modified the list of submitted documents');

        return redirect()->route('student_record.show',$id);

    }

     public function download($id, $Document){

        //  $student = Student::findOrfail($id);
         $download = Document::find($id);


         if ($Document == $download->Form137_Document){
                    //logs
            // activity('Student Record Logs')
            // ->causedBy(Auth::user())
            // ->performedOn($student)
            // ->createdAt(now())
            // ->log('Downloaded the Form 137 from submitted documents');
            
            return storage::download('public/'.$download->Form137_Path, $download->Form137_Document);

         
         }
         if ($Document == $download->Form138_Document){
            return storage::download('public/'.$download->Form138_Path, $download->Form138_Document);
         }
         if ($Document == $download->PSA_Document){
            return storage::download('public/'.$download->PSA_Path, $download->PSA_Document);
         }

         if ($Document == $download->GoodMoral_Document){
            return storage::download('public/'.$download->GoodMoral_Path, $download->GoodMoral_Document);
         }

         if ($Document == $download->COC_Document){
            return storage::download('public/'.$download->COC_Path, $download->COC_Document);
         }
         
     }

    // public function download($document_path, $document_file){
    //     // $download = Document::find($id);
    //     return storage::download('public/'.$document_path, $document_file);
    // }

}
