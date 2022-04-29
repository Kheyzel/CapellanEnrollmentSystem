@extends('layouts.app')


@section('breadcrumb')
    <div class="col-12 ">
        <div class="d-flex align-items-center justify-content-between mx-5 mt-2">
            <h4>Edit Student</h4>
        </div>
    </div>
@endsection

@section('content')

<div class="container-fluid">

    <div class="container bootstrap snippets bootdey">
        <h3 class="bg-primary text-center text-warning p-2 mx-5">Update Student Profile</h3>
        <hr>
        <form class="form-horizontal" action ="{{route('student_record.update', $student->id)}}" role="form" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <!-- left column -->
                {{-- <div class="col-md-3">
                    <div>
                        <img src="{{$student->path}}" id="category-img-tag" width="250px" height= "230px"; style = "margin-bottom: 20px;" />
                        <div id="results" name="image"></div>
                    </div>
           
                     <input id="cat_image" type="file"class="form-control" name="image">
                </div> --}}


                @if (!empty($student->path))
                <div class="col-md-3">
                    <div>
                        <img src="{{$student->path}}" id="category-img-tag" width="250px" height= "230px"; style = "margin-bottom: 20px;" />
                        <div id="results" name="image"></div>
                    </div>
           
                     <input id="cat_image" type="file"class="form-control" name="image">
                </div>
                @else
                <div class="col-md-3">
                    <div>
                        <img src="{{asset('../img/profile.png')}}" id="category-img-tag" style = "margin-bottom: 20px; width:250px; height:230px" />
                        <div id="results" name="image"></div>
                    </div>
           
                     <input id="cat_image" type="file"class="form-control" name="image">
                </div>

                @endif

                <!-- edit form column -->
                <div class="col-md-9 personal-info">
                    <div class="row">
                        <div class="col-12 d-flex align-items-end">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="text-input" autocomplete="off"><strong> Student
                                        Number</strong></label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" name="student_num" value="{{ $student->student_num }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="alert alert-info alert-dismissable">
                    <a class="panel-close close" data-dismiss="alert">×</a>
                    <i class="fa fa-coffee"></i>
                    This is an <strong>.alert</strong>. Use this to show important messages to the user.
                </div> --}}
                    {{-- <h3>Personal info</h3> --}}


                    <div>
                        <h4 class="text-center mb-3 font-weight-bold">Student Information</h4>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="text-input">Last Name</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" name="last_name"
                                        value="{{ $student->last_name }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="text-input">First Name</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" name="first_name"
                                        value="{{ $student->first_name }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="text-input">Middle Name</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" name="middle_name"
                                        value="{{ $student->middle_name }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="text-input">Extension Name</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" name="suffix"
                                        value="{{ $student->suffix }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="select1">Sex</label>
                                <div class="col-md-9">
                                    
                                    <select class="form-control" id="select1" name="sex">
                                        <option value="Male"{{ $student->sex== 'Male' ? 'selected' : '' }}>Male</option>
                                        <option value="Female"{{ $student->sex== 'Female' ? 'selected' : '' }}>Female</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="text-input">Birthday</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="date" name="b_date"
                                        value="{{ $student->b_date }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="text-input">Contact Number</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" name="contact_num"
                                        value="{{ $student->contact_num }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="email-input">Email Address</label>
                                <div class="col-md-9">
                                    <input class="form-control" id="email-input" type="email" name="email_ad"
                                        value="{{ $student->email_ad }}" autocomplete="email">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="text-input">Mother Tounge</label>
                                <div class="col-md-9">
                                    <input class="form-control" id="text-input" type="text" name="m_tongue"
                                        value="{{ $student->m_tongue }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="text-input">Religion</label>
                                <div class="col-md-9">
                                    <input class="form-control" id="text-input" type="text" name="religion"
                                        value="{{ $student->religion }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="text-input">PSA Number</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" name="psa_num"
                                        value="{{ $student->psa_num }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="text-input">Learner's Reference Number
                                    (LRN)</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" name="lrn" maxlength="12" minlength="12"
                                        value="{{ $student->lrn }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="select1">Course & Strand</label>
                                <div class="col-md-9">
                                    {{-- <select class="form-control" id="select1" name="course_id"
                                        value="{{ $student->course_id }}">
                                        <option disabled></option>
                                        @foreach ($course as $c)
                                            <option value="{{ $c->id }}">{{ $c->course }}</option>
                                        @endforeach
                                    </select> --}}

                                    <select class="form-control" id="select1" name="course_id">
                                        <option value="1"{{ $student->course->course == 'Industrial Arts(IA)-Automotive Servicing' ? 'selected' : '' }}>Industrial Arts(IA)-Automotive Servicing</option>
                                        <option value="2"{{ $student->course->course== 'Industrial Arts(IA)-Electrical Installation and Maintenance' ? 'selected' : '' }}>Industrial Arts(IA)-Electrical Installation and Maintenance</option>
                                        <option value="3"{{ $student->course->course == 'Industrial Arts(IA)-Electronic Products Assembly and Servicing' ? 'selected' : '' }}>Industrial Arts(IA)-Electronic Products Assembly and Servicing</option>
                                        <option value="4"{{ $student->course->course == 'Information and Communication Technology (ICT)-Computer System Servicing NC II' ? 'selected' : '' }}>Information and Communication Technology (ICT)-Computer System Servicing NC II</option>
                                        <option value="5"{{ $student->course->course == 'Information and Communication Technology (ICT)-Programming' ? 'selected' : '' }}>Information and Communication Technology (ICT)-Programming</option>
                                        <option value="6"{{ $student->course->course == 'Home Economics (HE)-Housekeeping NC II/Front Office Services NC II' ? 'selected' : '' }}>Home Economics (HE)-Housekeeping NC II/Front Office Services NC II</option>
                                        <option value="7"{{ $student->course->course == 'Home Economics (HE)-Food and Beverage Services NC II/Bread and Pastry Production NC II' ? 'selected' : '' }}>Home Economics (HE)-Food and Beverage Services NC II/Bread and Pastry Production NC II</option>
                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="select1">Grade Level</label>
                                <div class="col-md-9">
                                    <select class="form-control" id="select1" name="yearlevel_id">
                                        <option value="1"{{ $student->yearlevel->yearlevel== 11 ? 'selected' : '' }}>Grade 11</option>
                                        <option value="2"{{ $student->yearlevel->yearlevel== 12 ? 'selected' : '' }}>Grade 12</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div>
                        <h5 class="text-center mb-3">Address</h5>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="text-input">House Number</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" name="house_num"
                                        value="{{ $student->house_num }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="text-input">City</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" name="city" value="{{ $student->city }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="text-input">Barangay</label>
                                <div class="col-md-9">
                                    <input class="form-control" id="text-input" type="text" name="brgy"
                                        value="{{ $student->brgy }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="text-input">Province</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" name="province"
                                        value="{{ $student->province }}">
                                </div>
                            </div>
                        </div>
                    </div>



                    <hr>

                    <div>
                        <h5 class="text-center mb-3">Parents/Guardian Information</h5>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="text-input">Mother's Fullname</label>
                                <div class="col-md-9">
                                    <input class="form-control" id="text-input" type="text" name="m_fullname"
                                        value="{{ $student->m_fullname }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="text-input">Mother's Occupation</label>
                                <div class="col-md-9">
                                    <input class="form-control" id="text-input" type="text" name="m_occu"
                                        value="{{ $student->m_occu }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="text-input">Educational
                                    Attainment</label>
                                <div class="col-md-9">
                                    <input class="form-control" id="text-input" type="text" name="m_educ"
                                        value="{{ $student->m_educ }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">

                        </div>
                    </div>


                    <div class="row">
                        <div class="col-6">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="text-input">Father's Fullname</label>
                                <div class="col-md-9">
                                    <input class="form-control" id="text-input" type="text" name="f_fullname"
                                        value="{{ $student->f_fullname }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="text-input">Father's Occupation</label>
                                <div class="col-md-9">
                                    <input class="form-control" id="text-input" type="text" name="f_occu"
                                        value="{{ $student->f_occu }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="text-input">Educational
                                    Attainment</label>
                                <div class="col-md-9">
                                    <input class="form-control" id="text-input" type="text" name="f_educ"
                                        value="{{ $student->f_educ }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="text-input">Guardian's Fullname</label>
                                <div class="col-md-9">
                                    <input class="form-control" id="text-input" type="text" name="g_fullname"
                                        value="{{ $student->g_fullname }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="text-input">Guardian's
                                    Occupation</label>
                                <div class="col-md-9">
                                    <input class="form-control" id="text-input" type="text" name="g_occu"
                                        value="{{ $student->g_occu }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="text-input">Educational
                                    Attainment</label>
                                <div class="col-md-9">
                                    <input class="form-control" id="text-input" type="text" name="g_educ"
                                        value="{{ $student->g_educ }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="text-input">Parent/Guardian's Contact
                                    Num</label>
                                <div class="col-md-9">
                                    <input class="form-control" id="text-input" type="text" name="pg_contact_num"
                                        value="{{ $student->pg_contact_num }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div>
                        <h5 class="text-center mb-3">Previous School Information</h5>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="text-input">School Name</label>
                                <div class="col-md-9">
                                    <input class="form-control" id="text-input" type="text" name="prev_school"
                                        value="{{ $student->prev_school }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="text-input">School Address</label>
                                <div class="col-md-9">
                                    <input class="form-control" id="text-input" type="text" name="prev_school_ad"
                                        value="{{ $student->prev_school_ad }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="select1">School Type</label>
                                <div class="col-md-9">
                                    {{-- <select class="form-control" id="select1" name="school_type"
                                        value="{{ $student->school_type }}">
                                        <option value="Public">Public</option>
                                        <option value="Private">Private</option>
                                        <option value="ALS">ALS</option>

                                    </select> --}}


                                    <select class="form-control" id="select1" name="school_type">
                                        <option value="Public"{{ $student->school_type == 'Public' ? 'selected' : '' }}>Public</option>
                                        <option value="Private"{{ $student->school_type == 'Private' ? 'selected' : '' }}>Private</option>
                                        <option value="ALS"{{ $student->school_type == 'ALS' ? 'selected' : '' }}>ALS</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="text-input">Year of Completion</label>
                                <div class="col-md-9">
                                    <input class="form-control" id="text-input" type="text" name="l_year_completion"
                                        value="{{ $student->l_year_completion }}">
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card-footer">
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('student_record.show', $student->id) }}"
                                class="btn btn-md btn-danger mr-3">Cancel</a>
                            <button class="btn btn-md btn-primary" type="submit"> Submit</button>

                        </div>
                    </div>
        </form>
    </div>
    </div>
    </div>
</div>
    <hr>

    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#category-img-tag').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#cat_image").change(function() {
        readURL(this);
    });
</script>
@endsection
