@extends('layouts.app')


@section('breadcrumb')
    <div class="d-flex align-items-center ml-4 mx-5">
        <h4>Yearly Students' Reports</h4>
    </div>
@endsection

@section('content')
    <div class="container">

 
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5>Search Grade 11 </h5>
                                    <div>
                                        <form method="POST" action="{{ route('YearlyStudentReport.search') }}">
                                            @csrf

                                            <div class="d-flex">

                                                <select class="form-control mr-3" id="select1" name="school_year"
                                                    style="width:150px;">
                                                    <option>School Year</option>
                                                    @foreach ($allSchoolYear as $SchoolYear)
                                                        <option value="{{ $SchoolYear->school_year }}">
                                                            {{ $SchoolYear->school_year }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                                <button type="submit" class="btn btn-primary btn-sm text-white"> Search
                                                </button>
                                            </div>

                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5>Search Grade 12 </h5>
                                    <div>
                                        <form method="POST" action="{{ route('YearlyStudentReport.search_g12') }}">
                                            @csrf

                                            <div class="d-flex">

                                                <select class="form-control mr-3" id="select1" name="school_year"
                                                    style="width:150px;">
                                                    <option>School Year</option>
                                                    @foreach ($allSchoolYear_g12 as $SchoolYear)
                                                        <option value="{{ $SchoolYear->school_year_g12 }}">
                                                            {{ $SchoolYear->school_year_g12 }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                                <button type="submit" class="btn btn-primary btn-sm text-white"> Search
                                                </button>
                                            </div>

                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                   
                </div>

      




        <div class="container-fluid">
            @yield('studentsTable')
        </div>


        <div class="container-fluid">
            @yield('studentsTable_g12')
        </div>

        {{-- {{route('YearlyStudentReport.search',$schoolYear->school_year)}} --}}


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
