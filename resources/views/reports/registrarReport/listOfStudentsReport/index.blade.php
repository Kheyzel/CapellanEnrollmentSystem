@extends('layouts.app')


@section('breadcrumb')
    <div class="d-flex align-items-center ml-4 mx-5">
        <h4>Students' List Report</h4>
    </div>
@endsection

@section('dataTablesCSS')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
@endsection

@section('content')

    <div class="container">
        <div class="card">
            <div class="p-2 mr-3">
                <form method="POST" action="{{ route('ListOfStudents.show') }}">
                    @csrf

                    <div class="row">
                        <div class="col-6">
                        </div>
                        <div class="col-6">
                            <div class="d-flex">
                                
                                <select class="form-control mr-3" id="select1" name="year_id">
                                    <option disabled selected>Select Year to Show</option>
                                    <option value = "0">All</option>
                                    @foreach ($yearlevels as $yearlevel)
                                        <option value="{{ $yearlevel->id }}">Grade {{$yearlevel->yearlevel}}</option>
                                    @endforeach
                                </select>
                                

                                <select class="form-control mr-3" id="select1" name="course_id">
                                    <option disabled selected>Select Strand to Show</option>
                                    <option value = "0">All</option>
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->course }}</option>
                                    @endforeach
                                </select>

                                <button type="submit" class="btn btn-primary btn-sm text-white"> Search </button>
                            </div>
                        </div>

                    </div>
                </form>
               
            </div>
        </div>

        <div class="container-fluid">
            @yield('ListofStudentsReportTable')
        </div>
    </div>

@endsection

@section('dataTablesJS')
    <!-- script -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endsection
