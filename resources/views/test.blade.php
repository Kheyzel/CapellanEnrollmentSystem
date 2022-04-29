@extends('layouts.app')


@section('breadcrumb')
    <div class="d-flex align-items-center ml-4 mx-5">
        <h4>Test</h4>
    </div>
@endsection

@section('content')

    <div class="container">
      <div class="dropdown" style="margin-right: 100px;">
        <form method="POST" action="{{route('YearlyStudentReport.search')}}">
            @csrf

            <div class="row">
                <div class="col-6">
                </div>
                <div class="col-6">
                    <div class="d-flex">
                        
                        <select class="form-control mr-3" id="select1" name="school_year">
                            <option value = "0">All</option>
                            @foreach ($allSchoolYear as $SchoolYear)
                                <option value="{{ $SchoolYear->school_year }}">{{$SchoolYear->school_year}}</option>
                            @endforeach
                        </select>

                        <select class="form-control mr-3" id="select1" name="grade">
                            <option value = "0">All</option>
                                <option value="1">Grade 11</option>
                                <option value="2">Grade 12</option>
                        </select>

                        <button type="submit" class="btn btn-primary btn-sm text-white"> Search </button>
                    </div>
                </div>

            </div>
        </form>
            </div>

        <div class="container-fluid">
            @yield('studentsTable')
        </div>

        {{-- {{route('YearlyStudentReport.search',$schoolYear->school_year)}} --}}


    </div>

@endsection
