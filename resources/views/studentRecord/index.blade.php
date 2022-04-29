@extends('layouts.app')


@section('breadcrumb')
    <div class="col-12 ">
        <div class="d-flex align-items-center justify-content-between mx-5 mt-2">

            <h4>Students Record</h4>

            <div class="dropdown" style="margin-right: 100px;">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                    data-toggle="dropdown" aria-expanded="false">
                    Select Year & Strand
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="{{route('student_record.index')}}">All Students</a>
                    <strong class="ml-2">Grade 11</strong>
                    <a class="dropdown-item" href="{{route('IA-AS')}}">(IA)-Automotive Servicing</a>
                    <a class="dropdown-item" href="{{route('IA_EIM')}}">(IA)-Electrical Installation and Maintenance</a>
                    <a class="dropdown-item" href="{{route('IA_EPAS')}}">(IA)-Electronic Products Assembly and Servicing</a>
                    <a class="dropdown-item" href="{{route('ICT_CSS')}}">(ICT)-Computer System Servicing NC II</a>
                    <a class="dropdown-item" href="{{route('ICT_P')}}">(ICT)-Programming</a>
                    <a class="dropdown-item" href="{{route('HE_H_FOS')}}">(HE)-Housekeeping NC II/Front Office Services NC II</a>
                    <a class="dropdown-item" href="{{route('HE_FBS_BPP')}}">(HE)-Food and Beverage Services NC II/Bread and Pastry Production NC II
                        II</a>
                    <strong class="ml-2">Grade 12</strong>
                    <a class="dropdown-item" href="{{route('IA-AS_12')}}">(IA)-Automotive Servicing</a>
                    <a class="dropdown-item" href="{{route('IA_EIM_12')}}">(IA)-Electrical Installation and Maintenance</a>
                    <a class="dropdown-item" href="{{route('IA_EPAS_12')}}">(IA)-Electronic Products Assembly and Servicing</a>
                    <a class="dropdown-item" href="{{route('ICT_CSS_12')}}">(ICT)-Computer System Servicing NC II</a>
                    <a class="dropdown-item" href="{{route('ICT_P_12')}}">(ICT)-Programming</a>
                    <a class="dropdown-item" href="{{route('HE_H_FOS_12')}}">(HE)-Housekeeping NC II/Front Office Services NC II</a>
                    <a class="dropdown-item" href="{{route('HE_FBS_BPP_12')}}">(HE)-Food and Beverage Services NC II/Bread and Pastry Production NC II
                        II</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        @yield('studentsTable')
    </div>
@endsection
