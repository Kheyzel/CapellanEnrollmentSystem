@extends('layouts.app')

@section('breadcrumb')
    <div class="d-flex align-items-center ml-4 mx-5">
        <h4>Student Registration</h4>
    </div>
@endsection

@section('content')

<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col col-lg-4 col-md-6 col-sm-12 d-flex justify-content-around">
            <div class="card text-center border border-primary" style="width: 30rem;">
                <img src="{{ asset('../img/register.png')}}" class="card-img-top" alt="school-img" style = "height:20rem">
                <div class="card-body">
                    <h5 class="card-title text-center">Register a Student</h5>
                    {{-- <h4 class="text-primary text-center pb-2">{{ $school_year->school_year }}</h4> --}}
                    <a class="btn btn-primary text-white" href="{{route('registerStudent.index')}}">Registration Form</a>
                </div>
            </div>
        </div>

        <div class="col col-lg-4 col-md-6 col-sm-12 d-flex justify-content-around">
            <div class="card text-center border border-primary" style="width: 30rem;">
                <img src="{{ asset('../img/import.png')}}" class="card-img-top" alt="school-img" style = "height:20rem">
                <div class="card-body">
                    <h5 class="card-title text-center">Import Students</h5>
                    {{-- <h4 class="text-primary text-center pb-2">{{ $school_year->school_year }}</h4> --}}
                    <a class="btn btn-primary text-white" href="{{route('registerStudent.import')}}">Import Excel</a>
                </div>
            </div>
        </div>

        {{-- <div class="col col-lg-4 col-md-6 col-sm-12 d-flex justify-content-around">
            <div class="card text-center border border-primary" style="width: 30rem;">
                <img src="{{ asset('../img/document1.png')}}" class="card-img-top" alt="docu-img" style = "height:20rem">
                <div class="card-body">
                    <h5 class="card-title text-center">Students' List Report</h5>
                    <a href="{{ route('ListOfStudents.index') }}" class="btn btn-primary">View Report</a>
                </div>
            </div>
        </div>

        <div class="col col-lg-4 col-md-6 col-sm-12 d-flex justify-content-around">
            <div class="card text-center border border-primary" style="width: 30rem;">
                <img src="{{ asset('../img/document2.png')}}" class="card-img-top" alt="docu-img" style = "height:20rem">
                <div class="card-body">
                    <h5 class="card-title text-center">Students' Contact Report</h5>
                    <a href="{{ route('ContactDetailsOfStudents.index') }}" class="btn btn-primary">View Report</a>
                </div>
            </div>
        </div> --}}
    </div>
</div>


@endsection