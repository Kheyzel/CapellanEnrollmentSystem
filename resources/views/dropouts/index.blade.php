@extends('layouts.app')


@section('dataTablesCSS')
    <!-- Data Tables -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
@endsection

@section('breadcrumb')
    <div class="col-12 ">
        <div class="d-flex align-items-center justify-content-between mx-5 mt-2">

            <h4>Dropout List</h4>
            
        </div>
    </div>
@endsection

@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5>Dropouts</h5>
        </div>
        <div class="card-body">
            <table class="table table-hover borderless table-borderless" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">Action</th>  
                        <th scope="col">Name</th>   
                        <th scope="col">Course</th>
                        <th scope="col">Reason for Dropout</th>
                        <th scope="col">Dropout Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dropout_students as $dropout_student)
                    <tr>
                    <td><a href="{{ route('dropout.show', $dropout_student->id) }}">View Info</a> </td>
                    <td>{{ $dropout_student->last_name }}, {{ $dropout_student->first_name }} {{ $dropout_student->middle_name }}
                        {{ $dropout_student->suffix }}</td>
                    <td>{{ $dropout_student->yearlevel->yearlevel}}-{{ $dropout_student->course->course}}</td>
                    
                    <td>{{$dropout_student->drop_reason}}</td>
                    <td>{{$dropout_student->drop_date}}</td>
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