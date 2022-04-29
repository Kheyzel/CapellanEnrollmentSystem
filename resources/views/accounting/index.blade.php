@extends('layouts.app')



@section('dataTablesCSS')
    <!-- Data Tables -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
@endsection
@section('breadcrumb')

    <div class="col-12 ">
        <div class="d-flex align-items-center justify-content-between mx-5 mt-2">

            <h4>Accounting</h4>

        </div>
    </div>
@endsection

@section('content')

    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5>All Students</h5>
            </div>
            <div class="card-body">
                <table class="table table-hover borderless table-borderless" id="myTable">
                    <thead>
                        <tr>
                            <th>Action</th>
                            <th scope="col">Name</th>
                            <th scope="col">Grade</th>
                            <th scope="col">Strand</th>
                            <th scope="col">Student Number</th>
                            <th scope="col">Contact Number</th>
                            <th scope="col">E-mail Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td><a href="{{ route('accounting.show', $student->id) }}">view</a> </td>
                                <td>{{ $student->last_name }}, {{ $student->first_name }} {{ $student->middle_name }}
                                    {{ $student->suffix }}</td>
                                <td>{{ $student->yearlevel->yearlevel }}</td>
                                <td>{{ $student->course->course }}</td>
                                <td>{{ $student->student_num }}</td>
                                <td>{{ $student->contact_num }}</td>
                                <td>{{ $student->email_ad }}</td>
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
