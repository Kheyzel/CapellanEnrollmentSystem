@extends('layouts.app')


@section('breadcrumb')
    <div class="d-flex align-items-center ml-4 mx-5">
        <h4>Registrar Reports</h4>
    </div>
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col col-lg-4 col-md-6 col-sm-12 d-flex justify-content-around">
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
            </div>

            <div class="col col-lg-4 col-md-6 col-sm-12 d-flex justify-content-around">
                <div class="card text-center border border-primary" style="width: 30rem;">
                    <img src="{{ asset('../img/document3.png')}}" class="card-img-top" alt="docu-img" style = "height:20rem">
                    <div class="card-body">
                        <h5 class="card-title text-center">Students' Document Report</h5>
                        <a href="{{ route('DocumentOfStudent.index') }}" class="btn btn-primary">View Report</a>
                    </div>
                </div>
            </div>

            <div class="col col-lg-4 col-md-6 col-sm-12 d-flex justify-content-around">
                <div class="card text-center border border-primary" style="width: 30rem;">
                    <img src="{{ asset('../img/docu4.png')}}" class="card-img-top" alt="docu-img" style = "height:20rem">
                    <div class="card-body">
                        <h5 class="card-title text-center">Yearly Students' Report</h5>
                        <a href="{{ route('YearlyStudentReport.index') }}" class="btn btn-primary">View Report</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- <a class="btn btn-primary text-white" href="{{ route('ListOfStudents.index') }}">Students List Report</a>
        <a class="btn btn-primary text-white" href="{{ route('ContactDetailsOfStudents.index') }}">Students Contact
            Report</a>
        <a class="btn btn-primary text-white" href="{{ route('DocumentOfStudent.index') }}">Students Document Report</a> --}}
    </div>

@endsection
