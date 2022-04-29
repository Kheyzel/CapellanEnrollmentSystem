@extends('layouts.app')


@section('dataTablesCSS')
    <!-- Data Tables -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
@endsection

@section('breadcrumb')
    <div class="col-12 ">
        <div class="d-flex align-items-center justify-content-between mx-5 mt-2">

            <h4>Graduated Students Record</h4>
            
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5>Alumni</h5>
            </div>
            <div class="card-body">
                <table class="table table-hover borderless table-borderless" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">Action</th> 
                            <th scope="col">Name</th>   
                            <th scope="col">Course</th>   
                            <th scope="col">Status</th>
                            <th scope="col">Year Graduated</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($grd_students as $grd_student)
                        <tr>
                        <td><a href="{{ route('graduate.show', $grd_student->id) }}">View Info</a> </td>
                        <td>{{ $grd_student->last_name }}, {{ $grd_student->first_name }} {{ $grd_student->middle_name }}
                            {{ $grd_student->suffix }}</td>
                        <td>{{ $grd_student->course->course}}</td>
                        <td>{{$grd_student->enroll_status}}</td>
                        <td>{{$grd_student->graduates->year_graduated}}</td>
                    </tr>
                        @endforeach
                     

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
@endsection

<!-- script -->
@section('dataTablesJS')
    <!-- script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- <script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap4.min.js"></script> --}}
    <script src="{{asset('../js/DataTablesBS4.js')}}"></script>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

@endsection
