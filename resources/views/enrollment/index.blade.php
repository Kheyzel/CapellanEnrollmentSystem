@extends('layouts.app')

@section('breadcrumb')
    <div class="col-12 ">
        <div class="d-flex align-items-center justify-content-between mx-5 mt-2">
            <h4>Payment</h4>          
            {{-- <div>
                <a class = "btn btn-sm btn-primary" href="{{route('registerStudent.index')}}">Register Student</a>
                <a class = "btn btn-sm btn-primary" href="{{route('registerStudent.import')}}">Import Student</a>
            </div> --}}
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5>Registered Students</h5>
            </div>
            <div class="card-body">
                <table class="table table-hover borderless table-borderless">
                    <thead>
                        <tr>
                            <th>Action</th>
                            <th>Status</th>
                            <th>Name</th>
                            <th>Grade</th>
                            <th>Strand</th>
                        </tr>
                    </thead>
                    <tbody>
                         @foreach ($students as $student)
                        <tr>      
                            <td>
                                <a class = "btn btn-sm btn-warning" href="{{route('enrollment.create', $student->id)}}">Comfirm Enrollment</a>
                            </td>  
                            <td>{{$student->enroll_status}}</td>
                            <td>{{$student->last_name}}, {{$student->first_name}} {{$student->middle_name}} {{$student->suffix}}</td>
                            <td>{{$student->yearlevel->yearlevel}}</td>
                            <td>{{$student->course->course}}</td>
                        </tr>
                         @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5>Grade 11 Completers</h5>
            </div>
            <div class="card-body">
                <table class="table table-hover borderless table-borderless">
                    <thead>
                        <tr>
                            <th>Action</th>
                            <th>Status</th>
                            <th>Name</th>
                            <th>Grade</th>
                            <th>Strand</th>
                        </tr>
                    </thead>
                    <tbody>
                         @foreach ($g11Completers as $g11Completer)
                         @if ($g11Completer->student->enroll_status == 'Unenrolled for Grade 12')
                         <tr>
                            <td>
                                <a class = "btn btn-sm btn-warning" href="{{route('enrollment.create', $g11Completer->student->id)}}">Comfirm Enrollment</a>
                            </td>
                            
                            <td>{{$g11Completer->student->enroll_status}}</td>
                            <td>{{$g11Completer->student->last_name}}, {{$g11Completer->student->first_name}} {{$g11Completer->student->middle_name}} {{$g11Completer->student->suffix_name}}</td>
                            <td>{{$g11Completer->student->yearlevel->yearlevel}}</td>
                            <td>{{$g11Completer->student->course->course}}</td>
                        </tr>
                         @endif
                        
                         @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection