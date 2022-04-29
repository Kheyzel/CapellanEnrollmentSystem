@extends('layouts.app')


@section('breadcrumb')
    <div class="col-12 ">
        <div class="d-flex align-items-center justify-content-between mx-5 mt-2">
            <h4>Student Profile</h4>
        </div>
    </div>
@endsection

@section('content')

    <div class="container-fluid">

        @if (Session::has('swal'))
            {{ session()->get('message') }}
            {{-- <body onload="ok()"> --}}
        @endif


        <div class="row">
            <div class="col-lg-4">
                <div class="profile-card-4 z-depth-3">
                    <div class="card">
                        <div class="card-body text-center  rounded-top m-1">
                            {{-- <div>
                                    <img src="{{$student->path}}"  width="250px" height= "230px"; style = "margin-bottom: 20px;" />
                            </div> --}}


                            @if (!empty($student->image))
                                <div>
                                    {{-- <img src="{{ $student->path }}" id="category-img-tag" width="250px" height="230px" ;
                                        style="margin-bottom: 20px;" /> --}}
                                        <img alt="image" src="{{ url('storage/student/' . $student->image) }}" 
                                        width="250px" height="230px" style="margin-bottom: 20px;">
                                </div>
                            @else
                                <div>
                                    <img src="{{ asset('../img/profile.png') }}" id="category-img-tag"
                                        style="margin-bottom: 20px; width:250px; height:230px" />
                                </div>
                            @endif




                            <h5 class="mb-1 mt-3">{{ $student->last_name }}, {{ $student->first_name }}
                                {{ $student->middle_name }} {{ $student->suffix }}</h5>
                            <h6 class="">{{ $student->email_ad }}</h6>
                        </div>
                        <div class="
                                px-3 pb-3">
                            <ul class="list-group shadow-none">

                                <li class="list-group-item">
                                    <div class="list-icon text-center">
                                        <strong class="text-primary">Grade </strong>
                                    </div>
                                    <div class="list-details text-center">
                                        <span>Grade {{ $student->yearlevel->yearlevel }}</span>
                                    </div>
                                </li>

                                <li class="list-group-item">
                                    <div class="list-icon text-center">
                                        <strong class="text-primary">Strand</strong>
                                    </div>
                                    <div class="list-details text-center">
                                        <span>{{ $student->course->course }}</span>
                                    </div>
                                </li>

                                @if ($student->student_num !== null)
                                    <li class="list-group-item">
                                        <div class="list-icon text-center">
                                            <strong class="text-primary">Student Number </strong>
                                        </div>
                                        <div class="list-details text-center">
                                            <span>{{ $student->student_num }}</span>
                                        </div>
                                    </li>
                                @else
                                    <li class="list-group-item">
                                        <div class="list-icon text-center">
                                            <strong class="text-primary">Student Number </strong>
                                        </div>
                                        <div class="list-details text-center">
                                            <span class="text-danger"><strong> <i> Please assign a student number to this
                                                        student.</i></strong></span>
                                        </div>
                                    </li>
                                @endif







                            </ul>

                        </div>

                    </div>
                    <div class="card">
                        <h6 class="text-center mt-3 font-weight-bold" style="margin-bottom: 0">ACTIONS</h6>
                        <div class="card-body text-center  rounded-top mx-1 mb-0 pt-1">
                            
                            @if (empty($isCompleteG11))
                                <li class="list-group-item">

                                    <div class=" text-center mb-2">
                                        <strong>

                                            @if ($balance > 0)
                                                <button type="button" class="btn btn-outline-primary btn-sm"
                                                    onclick="warning()">Complete Grade
                                                    11</button>
                                            @else
                                                <button type="button" class="btn btn-outline-primary btn-sm"
                                                    data-toggle="modal" data-target="#exampleModalCenter">Complete Grade
                                                    11</button>
                                            @endif

                                        </strong>
                                    </div>
                                    {{-- </li> --}}
                            @endif

                            @if ($student->yearlevel->yearlevel == 12)
                                {{-- <li class="list-group-item"> --}}
                                <div class=" text-center mb-2">
                                    <strong>

                                        @if ($balance > 0)
                                            <button type="button" class="btn btn-outline-primary btn-sm"
                                                onclick="warning()">Graduate
                                            </button>
                                        @else
                                            <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal"
                                                data-target="#graduateModal">Graduate
                                            </button>
                                        @endif

                                    </strong>
                                </div>
                                {{-- </li> --}}
                            @endif
                            {{-- <li class="list-group-item"> --}}
                            <div class=" text-center mb-2">
                                <strong>
                                    <a class="btn btn-outline-primary btn-sm"
                                        href="{{ route('enrollmentForm.print', $student->id) }}">Download Enrollment
                                        Form</a></strong>
                            </div>
                            {{-- </li>
                                <li class="list-group-item"> --}}
                            <div class=" text-center mb-2">
                                <strong>
                                    <a class="btn btn-outline-primary btn-sm"
                                        href="{{ route('student_record.edit', $student->id) }}">Update Student
                                        Record</a></strong>
                            </div>
                            {{-- </li>
                                <li class="list-group-item"> --}}
                            <div class=" text-center mb-2">
                                <strong>
                                    <a class="btn btn-outline-danger btn-sm" data-toggle="modal"
                                        data-target="#dropModal">Drop this Student</a></strong>
                            </div>
                            </li>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">

                <div class="card z-depth-3">
                    <div class="card-body">
                        <ul class="nav nav-pills nav-pills-primary nav-justified">
                            <li class="nav-item">
                                <a href="javascript:void();" data-target="#bacisInfo" data-toggle="pill"
                                    class="nav-link active show"><i class="icon-user"></i> <span
                                        class="hidden-xs">Basic Info</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void();" data-target="#guardianInfo" data-toggle="pill"
                                    class="nav-link"><i class="icon-envelope-open"></i> <span
                                        class="hidden-xs">Guardian/Parents Info</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void();" data-target="#credentialsInfo" data-toggle="pill"
                                    class="nav-link"><i class="icon-note"></i> <span
                                        class="hidden-xs">Credentials</span></a>
                            </li>
                        </ul>
                        <div class="tab-content p-3">
                            <div class="tab-pane active show" id="bacisInfo">


                                <div class="row border">
                                    {{-- <div class="col-12">
                                        <h4 class=" text-center mt-4 font-weight-bold">
                                            Student's Information
                                        </h4>
                                    </div> --}}

                                    <div class="col-12">
                                        <h5 class="mb-4 text-center mt-4 font-weight-bold bg-secondary p-2">STUDENT'S
                                            PERSONAL INFORMATION</h5>
                                    </div>

                                    <div class="col-12">
                                        <p class="pl-5 mb-2"><strong>Full Name:
                                                &emsp;</strong>{{ $student->last_name }}, {{ $student->first_name }}
                                            {{ $student->middle_name }} {{ $student->suffix }}</p>
                                    </div>
                                    <div class="col-12">
                                        <p class="pl-5 pt-2 mb-2"><strong>Learner's Reference Number (LRN):
                                                &emsp;</strong>{{ $student->lrn }}</p>
                                    </div>
                                    <div class="col-12">
                                        <p class="pl-5 pt-2 mb-2"><strong>Sex: &emsp;</strong>{{ $student->sex }}</p>
                                    </div>
                                    <div class="col-12">
                                        <p class="pl-5 pt-2 mb-2"><strong>Birthdate:
                                                &emsp;</strong>{{ \Carbon\Carbon::parse($student->b_date)->format('F d, Y') }}
                                        </p>
                                    </div>
                                    {{-- <div class="col-12">
                                        <p class="pl-5 pt-2 mb-2"><strong>Age: &emsp;</strong>{{ \Carbon\Carbon::parse($student->b_date)->diff(\Carbon\Carbon::now())->format('%y') }}</p>
                                    </div> --}}
                                    <div class="col-12">
                                        <p class="pl-5 pt-2 mb-2"><strong>Contact Number:
                                                &emsp;</strong>{{ $student->contact_num }}</p>
                                    </div>
                                    <div class="col-12">
                                        <p class="pl-5 pt-2 mb-2"><strong>Address:
                                                &emsp;</strong>{{ $student->house_num }}
                                            {{ $student->brgy }}, {{ $student->city }},
                                            {{ $student->province }}</p>
                                    </div>
                                    <div class="col-12">
                                        <p class="pl-5 pt-2 mb-2"><strong>Religion:
                                                &emsp;</strong>{{ $student->religion }}</p>
                                    </div>
                                    <div class="col-12">
                                        <p class="pl-5 pt-2 mb-2"><strong>Mother Tongue:
                                                &emsp;</strong>{{ $student->m_tongue }}</p>
                                    </div>
                                    <div class="col-12">
                                        <p class="pl-5 pt-2 mb-2"><strong>PSA Number:
                                                &emsp;</strong>{{ $student->psa_num }}</p>
                                    </div>





                                    {{-- <div class="col-3">
                                        <strong>
                                            <p>Learners Reference Number (LRN)</p>
                                        </strong>
                                        <strong>
                                            <p class="p-2">Last Name</p>
                                        </strong>
                                        <strong>
                                            <p class="p-2">First Name</p>
                                        </strong>
                                        <strong>
                                            <p class="p-2">Middle Name</p>
                                        </strong>

                                    </div>
                                    <div class="col-9">
                                        <p class="border p-2">{{ $student->lrn }}</p>
                                        <p class="border p-2">{{ $student->last_name }}</p>
                                        <p class="border p-2">{{ $student->first_name }}</p>
                                        <p class="border p-2">{{ $student->middle_name }}</p>
                                    </div> --}}

                                    <div class="col-12">
                                        {{-- <hr class="px-5 mx-5"> --}}
                                        <h5 class="mb-4 text-center mt-4 font-weight-bold bg-secondary p-2">OTHER
                                            INFORMATION</h5>

                                    </div>
                                    <div class="col-12">
                                        <p class="pl-5 pt-2 mb-2"><strong>Previous School:
                                                &emsp;</strong>{{ $student->prev_school }} -
                                            ({{ $student->school_type }})</p>
                                    </div>
                                    <div class="col-12">
                                        <p class="pl-5 pt-2 mb-2"><strong>Previous School Address:
                                                &emsp;</strong>{{ $student->prev_school_ad }}</p>
                                    </div>
                                    <div class="col-12">
                                        <p class="pl-5 pt-2 mb-5"><strong>Year of Completion:
                                                &emsp;</strong>{{ $student->l_year_completion }}</p>
                                    </div>
                                    {{-- <p> <strong class="mr-3">Previous School: </strong>
                                                    {{ $student->prev_school }} - ({{ $student->school_type }})
                                                <p> <strong class="mr-3">Previous School Address: </strong>
                                                    {{ $student->prev_school_ad }}
                                                <p> <strong class="mr-3">Year of Completion: </strong>
                                                    {{ $student->l_year_completion }} --}}
                                    {{-- </div> --}}
                                    {{-- </div> --}}

                                </div>
                                <!--/row-->

                            </div>

                            <div class="tab-pane" id="guardianInfo">
                                <div class="tab-pane active show" id="bacisInfo">
                                    <div class="row border">
                                        <div class="col-12">
                                            <h4 class=" mb-4 text-center mt-4 font-weight-bold">
                                                Parents' Information
                                            </h4>
                                        </div>
                                        {{-- <div class="col-6 pl-4">
                                            <h5 class="mb-3 font-weight-bold">FATHER'S INFO</h5>
                                            <p class="ml-4"> <strong class="mr-3">Name:
                                                </strong>
                                                {{ $student->f_fullname }}
                                            <p class="ml-4"> <strong class="mr-3">Occupation:
                                                </strong>
                                                {{ $student->f_occu }}
                                            <p class="ml-4"> <strong class="mr-3">Educational
                                                    Attainment: </strong>
                                                {{ $student->f_educ }}

                                        </div>
                                        <div class="col-6 pl-4">
                                            <h5 class="mb-3 font-weight-bold">MOTHER'S INFO</h5>
                                            <p class="ml-4"> <strong class="mr-3">Name:
                                                </strong>
                                                {{ $student->m_fullname }}
                                            <p class="ml-4"> <strong class="mr-3">Occupation:
                                                </strong>
                                                {{ $student->m_occu }}
                                            <p class="ml-4"> <strong class="mr-3">Educational
                                                    Attainment: </strong>
                                                {{ $student->m_educ }}

                                        </div> --}}
                                        <div class="col-12">
                                            <table class="table table-borderless">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th scope="col" style="color: black">FATHER'S INFO</th>
                                                        <th scope="col" style="color: black">MOTHER'S INFO</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td scope="row" style="color: black"> <strong> Name:&emsp;</strong>
                                                            {{ $student->f_fullname }}</td>
                                                        <td style="color: black"><strong> Name:&emsp;</strong>
                                                            {{ $student->m_fullname }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td scope="row" style="color: black"> <strong>
                                                                Occupation:&emsp;</strong> {{ $student->f_occu }}</td>
                                                        <td style="color: black"><strong> Occupation:&emsp;</strong>
                                                            {{ $student->m_occu }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td scope="row" style="color: black"> <strong> Educational
                                                                Attainment:&emsp;</strong> {{ $student->f_educ }}</td>
                                                        <td style="color: black"><strong> Educational
                                                                Attainment:&emsp;</strong> {{ $student->m_educ }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-12">
                                            <h4 class=" mb-4 text-center mt-4 font-weight-bold">
                                                Guardian's Information
                                            </h4>
                                        </div>
                                        <div class="col-12">
                                            <table class="table table-borderless">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th class="text-center" scope="col" style="color: black">
                                                            GUARDIAN'S INFO</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="pl-5" scope="row" style="color: black">
                                                            <strong> Name:&emsp;</strong> {{ $student->g_fullname }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pl-5" scope="row" style="color: black">
                                                            <strong> Occupation:&emsp;</strong> {{ $student->g_occu }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pl-5" scope="row" style="color: black">
                                                            <strong> Educational Attainment:&emsp;</strong>
                                                            {{ $student->g_educ }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pl-5" scope="row" style="color: black">
                                                            <strong> Contact Number:&emsp;</strong>
                                                            {{ $student->pg_contact_num }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>


                                    </div>

                                </div>



                            </div>

                            <div class="tab-pane" id="credentialsInfo">
                                <div class="tab-pane active show" id="bacisInfo">
                                    <div class="row border">

                                        <div class="col-12">
                                            <h5 class="mb-4 text-center mt-4 font-weight-bold bg-secondary p-2">
                                                Credentials' Information</h5>
                                        </div>

                                        <div class="col-12">
                                            {{-- <h5 class="mb-3 text-center mt-4">Credentials Info</h5> --}}





                                            <div class="col-12 pl-5">

                                                <p> <strong class="mr-3">Form 137:
                                                        @if (!empty($student->document->Form137))
                                                            <span class="text-success"> Submitted</span>

                                                            @if ($student->document->Form137_Document != null)
                                                                <p class="mr-0 mb-0 font-italic font-weight-light">
                                                                    Document:
                                                                    <a
                                                                        href="{{ route('document.download', [$student->document->id, $student->document->Form137_Document]) }}">{{ $student->document->Form137_Document }}</a>
                                                                </p>
                                                            @endif
                                                        @else
                                                            <span class="text-danger">Not Submitted</span>
                                                        @endif
                                                    </strong></p>
                                                <p> <strong class="mr-3">Form 138:
                                                        @if (!empty($student->document->Form138))
                                                            <span class="text-success"> Submitted</span>

                                                            @if ($student->document->Form138_Document != null)
                                                                <p class="mr-0 mb-0 font-italic font-weight-light">
                                                                    Document:
                                                                    <a
                                                                        href="{{ route('document.download', [$student->document->id, $student->document->Form138_Document]) }}">{{ $student->document->Form138_Document }}</a>
                                                                </p>
                                                            @endif
                                                        @else
                                                            <span class="text-danger">Not Submitted</span>
                                                        @endif
                                                    </strong></p>
                                                <p> <strong class="mr-3">PSA (Xerox Copy):
                                                        @if (!empty($student->document->PSA))
                                                            <span class="text-success"> Submitted</span>

                                                            @if ($student->document->PSA_Document != null)
                                                                <p class="mr-0 mb-0 font-italic font-weight-light">
                                                                    Document:
                                                                    <a
                                                                        href="{{ route('document.download', [$student->document->id, $student->document->PSA_Document]) }}">{{ $student->document->PSA_Document }}</a>
                                                                </p>
                                                            @endif
                                                        @else
                                                            <span class="text-danger">Not Submitted</span>
                                                        @endif

                                                    </strong></p>
                                                <p> <strong class="mr-3">Good Moral (Original Copy):
                                                        @if (!empty($student->document->GoodMoral))
                                                            <span class="text-success"> Submitted</span>

                                                            @if ($student->document->GoodMoral_Document != null)
                                                                <p class="mr-0 mb-0 font-italic font-weight-light">
                                                                    Document:
                                                                    <a
                                                                        href="{{ route('document.download', [$student->document->id, $student->document->GoodMoral_Document]) }}">{{ $student->document->GoodMoral_Document }}</a>
                                                                </p>
                                                            @endif
                                                        @else
                                                            <span class="text-danger">Not Submitted</span>
                                                        @endif
                                                    </strong></p>
                                                <p> <strong class="mr-3">Certificate of Completion:
                                                        @if (!empty($student->document->COC))
                                                            <span class="text-success"> Submitted</span>

                                                            @if ($student->document->COC_Document != null)
                                                                <p class="mr-0 mb-0 font-italic font-weight-light">
                                                                    Document:
                                                                    <a
                                                                        href="{{ route('document.download', [$student->document->id, $student->document->COC_Document]) }}">{{ $student->document->COC_Document }}</a>
                                                                </p>
                                                            @endif
                                                        @else
                                                            <span class="text-danger">Not Submitted</span>
                                                        @endif
                                                    </strong></p>
                                            </div>


                                        </div>


                                        <div class="col-12">
                                            @if (!empty($student->document->student_id))
                                                @if (empty($student->document->Form137 && $student->document->Form138 && $student->document->PSA && $student->document->GoodMoral && $student->document->COC))
                                                    <button type="button" data-toggle="modal" data-target="#updateModal"
                                                        class="btn btn-sm btn-outline-primary"
                                                        style="margin-bottom: 10px; float:right;">Submit Document (Update)
                                                    </button>
                                                @endif
                                            @else
                                                <button type="button" data-toggle="modal" data-target="#storeModal"
                                                    class="btn btn-sm btn-outline-primary"
                                                    style="margin-bottom:10px; float:right;">Submit Document
                                                </button>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal Store-->
    <div class="modal fade" id="storeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">REQUIREMENTS / DOCUMENTS</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <p class="h5 mb-3 "> <strong> Select the following documents that the student
                            submitted. </strong>
                    </p>
                    <form action="{{ route('document.store', $student->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="row mb-5">
                            <div class="col-12 p-2 pl-4">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-check mt-2">
                                            <input class="form-check-input" type="checkbox" value="submitted"
                                                id="flexCheckDefault" name="form137">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Form 137
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="file" name="form137file">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 p-2 pl-4">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-check mt-2">
                                            <input class="form-check-input" type="checkbox" value="submitted"
                                                id="flexCheckChecked" name="form138">
                                            <label class="form-check-label" for="flexCheckChecked">
                                                Form 138
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="file" name="form138file">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 p-2 pl-4">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-check mt-2">
                                            <input class="form-check-input" type="checkbox" value="submitted"
                                                id="flexCheckChecked" name="PSA">
                                            <label class="form-check-label" for="flexCheckChecked">
                                                PSA (Xerox Copy)
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="file" name="PSAfile">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 p-2 pl-4">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-check mt-2">
                                            <input class="form-check-input" type="checkbox" value="submitted"
                                                id="flexCheckChecked" name="goodmoral">
                                            <label class="form-check-label" for="flexCheckChecked">
                                                Good Moral (Original Copy)
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="file" name="goodmoralfile">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 p-2 pl-4">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-check mt-2">
                                            <input class="form-check-input" type="checkbox" value="submitted"
                                                id="flexCheckChecked" name="COC">
                                            <label class="form-check-label" for="flexCheckChecked">
                                                Certificate of Completion
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="file" name="COCfile">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col text-center pt-5">
                            <button type="button" class="btn btn-danger mt-4" data-dismiss="modal"> Cancel</button>
                            <button type="submit" class="btn btn-primary mt-4 mr-2">Submit</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>

    <!-- Modal update-->
    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">REQUIREMENTS / DOCUMENTS</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <p class="h5 mb-3 "> <strong> Select the following documents that the student
                            submitted. </strong>
                    </p>
                    <form action="{{ route('document.update', $student->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="row mb-5">
                            @if (!empty($student->document->Form137))
                            @else
                                <div class="col-12 p-2 pl-4">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-check mt-2">
                                                <input class="form-check-input" type="checkbox" value="submitted"
                                                    id="flexCheckDefault" name="form137">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Form 137
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="file" name="form137file">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if (!empty($student->document->Form138))
                            @else
                                <div class="col-12 p-2 pl-4">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-check mt-2">
                                                <input class="form-check-input" type="checkbox" value="submitted"
                                                    id="flexCheckChecked" name="form138">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Form 138
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="file" name="form138file">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if (!empty($student->document->PSA))
                            @else
                                <div class="col-12 p-2 pl-4">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-check mt-2">
                                                <input class="form-check-input" type="checkbox" value="submitted"
                                                    id="flexCheckChecked" name="PSA">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    PSA (Xerox Copy)
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="file" name="PSAfile">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if (!empty($student->document->GoodMoral))
                            @else
                                <div class="col-12 p-2 pl-4">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-check mt-2">
                                                <input class="form-check-input" type="checkbox" value="submitted"
                                                    id="flexCheckChecked" name="goodmoral">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Good Moral (Original Copy)
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="file" name="goodmoralfile">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if (!empty($student->document->COC))
                            @else
                                <div class="col-12 p-2 pl-4">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-check mt-2">
                                                <input class="form-check-input" type="checkbox" value="submitted"
                                                    id="flexCheckChecked" name="COC">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Certificate of Completion
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="file" name="COCfile">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                        </div>
                        <div class="col text-center pt-5">
                            <button type="button" class="btn btn-danger mt-4" data-dismiss="modal"> Cancel</button>
                            <button type="submit" class="btn btn-primary mt-4 mr-2">Submit</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>


    <!-- graduateModal  -->
    <div class="modal fade" id="graduateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">

                    <h4 class="text-center mb-3">Please click 'Proceed' if this student meets all the needed requirements
                        for graduation.</h4>
                    <div class="card">
                        <div class="card-body text-center  rounded-top m-1">
                            <h5 class="mb-1 mt-3">{{ $student->last_name }}, {{ $student->first_name }}
                                {{ $student->middle_name }} {{ $student->suffix }}</h5>
                            <h6 class="">{{ $student->email_ad }}</h6>
                        </div>
                        <div class="
                                px-3 pb-3">
                            <ul class="list-group shadow-none">

                                <li class="list-group-item">
                                    <div class="list-icon text-center">
                                        <strong class="text-primary">Grade </strong>
                                    </div>
                                    <div class="list-details text-center">
                                        <span>Grade{{ $student->yearlevel->yearlevel }}</span>
                                    </div>
                                </li>

                                <li class="list-group-item">
                                    <div class="list-icon text-center">
                                        <strong class="text-primary">Strand/Course </strong>
                                    </div>
                                    <div class="list-details text-center">
                                        <span>{{ $student->course->course }}</span>
                                    </div>
                                </li>

                                <li class="list-group-item">
                                    <div class="list-icon text-center">
                                        <strong class="text-primary">Student Number </strong>
                                    </div>
                                    <div class="list-details text-center">
                                        <span>{{ $student->student_num }}</span>
                                    </div>
                                </li>

                            </ul>

                        </div>

                    </div>
                </div>

                <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ route('graduate.store', $student->id) }}">Proceed</a>
                </div>


            </div>
        </div>
    </div>

    <!-- Modal Complete Grade 11-->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">

                    <h4 class="text-center mb-3">Click 'Proceed' if this student passed Grade 11.</h4>
                    <div class="card">
                        <div class="card-body text-center  rounded-top m-1">
                            <h5 class="mb-1 mt-3">{{ $student->last_name }}, {{ $student->first_name }}
                                {{ $student->middle_name }} {{ $student->suffix }}</h5>
                            <h6 class="">{{ $student->email_ad }}</h6>
                        </div>
                        <div class="
                                px-3 pb-3">
                            <ul class="list-group shadow-none">

                                <li class="list-group-item">
                                    <div class="list-icon text-center">
                                        <strong class="text-primary">Grade </strong>
                                    </div>
                                    <div class="list-details text-center">
                                        <span>Grade{{ $student->yearlevel->yearlevel }}</span>
                                    </div>
                                </li>

                                <li class="list-group-item">
                                    <div class="list-icon text-center">
                                        <strong class="text-primary">Strand</strong>
                                    </div>
                                    <div class="list-details text-center">
                                        <span>{{ $student->course->course }}</span>
                                    </div>
                                </li>

                                <li class="list-group-item">
                                    <div class="list-icon text-center">
                                        <strong class="text-primary">Student Number </strong>
                                    </div>
                                    <div class="list-details text-center">
                                        <span>{{ $student->student_num }}</span>
                                    </div>
                                </li>

                            </ul>

                        </div>

                    </div>
                </div>

                <div class="modal-footer d-flex justify-content-center">
                    <a class="btn btn-primary" href="{{ route('g11completer.store', $student->id) }}">Proceed</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>


            </div>
        </div>
    </div>

    <!-- Drop Modal  -->
    <div class="modal fade" id="dropModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">

                    <h4 class="text-center mb-3">Are you sure you want to drop this student?</h4>
                    <div class="card">
                        <div class="card-body text-center  rounded-top m-1">
                            <h5 class="mb-1 mt-3">{{ $student->last_name }}, {{ $student->first_name }}
                                {{ $student->middle_name }} {{ $student->suffix }}</h5>
                            <h6 class="">{{ $student->email_ad }}</h6>
                        </div>
                        <div class="
                             px-3 pb-3">
                            <ul class="list-group shadow-none">

                                <li class="list-group-item">
                                    <div class="list-icon text-center">
                                        <strong class="text-primary">Grade </strong>
                                    </div>
                                    <div class="list-details text-center">
                                        <span>Grade{{ $student->yearlevel->yearlevel }}</span>
                                    </div>
                                </li>

                                <li class="list-group-item">
                                    <div class="list-icon text-center">
                                        <strong class="text-primary">Strand/Course </strong>
                                    </div>
                                    <div class="list-details text-center">
                                        <span>{{ $student->course->course }}</span>
                                    </div>
                                </li>

                                <li class="list-group-item">
                                    <div class="list-icon text-center">
                                        <strong class="text-primary">Student Number </strong>
                                    </div>
                                    <div class="list-details text-center">
                                        <span>{{ $student->student_num }}</span>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="list-icon text-center">
                                        <strong class="text-danger"><span class="text-danger">*</span> Please Choose Reason for Dropout </strong>
                                    </div>
                                    <br>


                                    <form action="{{route('dropout.store')}}" method="POST">
                                        @csrf
                                    
                                    <input type="text" value = "{{$student->id}}" name = "id" hidden>
                                    <select class="form-control" id="select1" name="reason" required>
                                        {{-- <option>Select Grade Level</option> --}}
                                        {{-- <option selected disabled>Choose Reason</option> --}}
                                        <option selected value="Armed Conflict">Armed Conflict</option>
                                        <option value="Calamitties/Disasters">Calamitties/Disasters</option>
                                        <option value="Child Labor, workChild Labor, work">Child Labor, work</option>
                                        <option value="Transferred to School Abroad">Transferred to School Abroad</option>
                                        <option value="Transferred to International School">Transferred to International School</option>
                                        <option value="Acceleration (No Longer attending class)">Acceleration (No Longer attending class)</option>
                                        <option value="Physical conditions of classroom">Physical conditions of classroom</option>
                                        <option value="Peer Influences">Peer Influences</option>
                                        <option value="Distance between home and school">Distance between home and school</option>
                                        <option value="Family problems/feuds">Family problems/feuds</option>
                                        <option value="Illness">Illness</option>
                                        <option value="Overage">Overage</option>
                                        <option value="Death">Death</option>    
                                        <option value="Drug Abuse">Drug Abuse</option>
                                        <option value="Poor academic performance">Poor academic performance</option>
                                        <option value="Lack of interest/Distractions">Lack of interest/Distractions</option>
                                        <option value="Had totake care of siblings">Had totake care of siblings</option>
                                        <option value="Early marriage/pregnancy">Early marriage/pregnancy</option>
                                        <option value="Parent's attitude toward schooling">Parent's attitude toward schooling</option>
                                    </select>
                                </li>

                            </ul>
                        </div>
                    

                    </div>
                </div>

                <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type = "submit" class="btn btn-danger">Drop</button>
                </div>
            </form>


            </div>
        </div>
    </div>


    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload").change(function() {
            readURL(this);
        });
    </script>

    <script>
        function ok() {
            Swal.fire({
                icon: 'success',
                title: 'Student Passed!',
                showConfirmButton: true,
            })
        }

        function warning() {
            Swal.fire({
                title: 'NOTICE',
                text: 'Please settle the payment first.',
                icon: 'warning',
            })
        }
    </script>




@endsection
