@extends('layouts.app')


@section('breadcrumb')
    <div class="d-flex align-items-center ml-4 mx-5">
        <h4>Registration</h4>
    </div>
@endsection

@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-primary text-warning">
                        <h4 class="text-center">STUDENT REGISTRATION FORM</h4>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" action="{{route('registerStudent.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <h4 class="text-center mb-3 font-weight-bold">Student Information</h4>
                            </div>
                            
                        <div class="row">
                            <div class="col-md-3 mx-auto">
                                <div>
                                    <img src="{{asset('../img/profile.png')}}" id="category-img-tag" width="250px" height= "230px"; style = "margin-bottom: 20px;" />
                                    <div id="results" name="image"></div>
                                </div>
                       
                                 <input id="cat_image" type="file"class="form-control" name="image">
                            </div>
                        </div>
                        <br> <br>

                            <div class="row">
                                

                                <div class="col-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label " for="text-input"><span class="text-danger">*</span> Last Name</label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" name="last_name"
                                                placeholder="Last Name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label " for="text-input"><span class="text-danger">*</span>First Name</label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" name="first_name"
                                                placeholder="First Name" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label " for="text-input">Middle Name</label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" name="middle_name"
                                                placeholder="Middle Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label " for="text-input">Extension Name</label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" name="suffix"
                                                placeholder="Extension Name">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group row">                                 
                                            <label class="col-md-3 col-form-label " for="select1"><span class="text-danger">*</span>Sex</label>
                                            <div class="col-md-9">
                                                <select class="form-control" id="select1" name="sex" required>
                                                    <option value = "Male">Male</option>
                                                    <option value = "Female">Female</option>
                                                    
                                                </select>
                                            </div>                                      
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label " for="text-input"><span class="text-danger">*</span>Birthday</label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="date" name="b_date" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label " for="text-input"><span class="text-danger">*</span>Contact Number</label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" name="contact_num"
                                                placeholder="Contact Number" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label " for="email-input"><span class="text-danger">*</span>Email Address</label>
                                        <div class="col-md-9">
                                            <input class="form-control" id="email-input" type="email" name="email_ad"
                                                placeholder="Enter Email" autocomplete="email" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label " for="text-input"><span class="text-danger">*</span>Mother Tongue</label>
                                        <div class="col-md-9">
                                            <input class="form-control" id="text-input" type="text" name="m_tongue"
                                                placeholder="Mother Tounge" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label " for="text-input"><span class="text-danger">*</span>Religion</label>
                                        <div class="col-md-9">
                                            <input class="form-control" id="text-input" type="text" name="religion"
                                                placeholder="Religion" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label " for="text-input">PSA Number</label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" name="psa_num"
                                                placeholder="PSA Number">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label " for="text-input"><span class="text-danger">*</span>Learner's Reference Number (LRN)</label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" name="lrn" maxlength="12" minlength="12"
                                                placeholder="Learner's Reference Number (LRN)" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label " for="select1"><span class="text-danger">*</span>Course & Strand</label>
                                        <div class="col-md-9">
                                            <select class="form-control" id="select1" name="course" required>
                                                <option disabled></option>
                                                @foreach ($course as $c)
                                                <option value = "{{$c->id}}">{{$c->course}}</option>
                                                @endforeach    
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label " for="select1"><span class="text-danger">*</span>Grade Level</label>
                                        <div class="col-md-9">
                                            <select class="form-control" id="select1" name="yearlevel" required>
                                                {{-- <option>Select Grade Level</option> --}}
                                                <option value="1">Grade 11</option>
                                                <option value="2">Grade 12</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br> <hr> <br>

                            <div>
                                <h4 class="text-center mb-3 font-weight-bold">Address</h4>
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label" for="text-input"><span class="text-danger">*</span>House Number</label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" name="house_num"
                                                placeholder="House Number" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label" for="text-input"><span class="text-danger">*</span>City</label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" name="city" placeholder="City" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label" for="text-input"><span class="text-danger">*</span>Barangay</label>
                                        <div class="col-md-9">
                                            <input class="form-control" id="text-input" type="text" name="brgy"
                                                placeholder="Barangay" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label" for="text-input"><span class="text-danger">*</span>Province</label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" name="province"
                                                placeholder="Province" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            

                            <br> <hr> <br>

                            <div>
                                <h4 class="text-center mb-3 font-weight-bold">Parents/Guardian Information</h4>
                            </div> <br>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label" for="text-input">Mother's Fullname</label>
                                        <div class="col-md-9">
                                            <input class="form-control" id="text-input" type="text" name="m_fullname"
                                                placeholder="Mother's Fullname">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label" for="text-input">Mother's Occupation</label>
                                        <div class="col-md-9">
                                            <input class="form-control" id="text-input" type="text" name="m_occu"
                                                placeholder="Mother's Occupation">
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
                                                placeholder="Mother's Educational Attainment">
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
                                                placeholder="Father's Fullname">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label" for="text-input">Father's Occupation</label>
                                        <div class="col-md-9">
                                            <input class="form-control" id="text-input" type="text" name="f_occu"
                                                placeholder="Father's Occupation">
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
                                                placeholder="Father's Educational Attainment">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label" for="text-input"><span class="text-danger">*</span>Guardian's Fullname</label>
                                        <div class="col-md-9">
                                            <input class="form-control" id="text-input" type="text" name="g_fullname"
                                                placeholder="Guardian's Fullname" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label" for="text-input"><span class="text-danger">*</span>Guardian's
                                            Occupation</label>
                                        <div class="col-md-9">
                                            <input class="form-control" id="text-input" type="text" name="g_occu"
                                                placeholder="Guardian's Occupation" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label" for="text-input"><span class="text-danger">*</span>Educational
                                            Attainment</label>
                                        <div class="col-md-9">
                                            <input class="form-control" id="text-input" type="text" name="g_educ"
                                                placeholder="Guardian's Educational Attainment" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label" for="text-input"><span class="text-danger">*</span>Parent/Guardian's Contact
                                            Number</label>
                                        <div class="col-md-9">
                                            <input class="form-control" id="text-input" type="text" name="pg_contact_num"
                                                placeholder="Parent/Guardian's Contact Number" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br> <hr> <br>
                            <div>
                                <h4 class="text-center mb-3 font-weight-bold">Previous School Information</h4>
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label" for="text-input"><span class="text-danger">*</span>School Name</label>
                                        <div class="col-md-9">
                                            <input class="form-control" id="text-input" type="text" name="prev_school"
                                                placeholder="School Name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label" for="text-input"><span class="text-danger">*</span>School Address</label>
                                        <div class="col-md-9">
                                            <input class="form-control" id="text-input" type="text" name="prev_school_ad"
                                                placeholder="School Address" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label" for="select1"><span class="text-danger">*</span>School Type</label>
                                        <div class="col-md-9">
                                            <select class="form-control" id="select1" name="school_type" required>
                                                <option value = "Public">Public</option>
                                                <option value = "Private">Private</option>
                                                <option value = "ALS">ALS</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label" for="select1"><span class="text-danger">*</span>Are you a Transferee?</label>
                                        <div class="col-md-9">
                                            <select class="form-control" id="select1" name="transferee" required>
                                                <option value = "Yes">Yes</option>
                                                <option value = "No">No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label" for="text-input"><span class="text-danger">*</span>Year of Completion</label>
                                        <div class="col-md-9">
                                            <input class="form-control" id="text-input" type="text" name="l_year_completion"
                                                placeholder="Year of Completion" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <div class="d-flex justify-content-center">
                                    <button type="reset" class="btn btn-md btn-danger mr-3">Clear Form</button>
                                    <button class="btn btn-md btn-primary mr-3" type="submit"> Submit</button>
                                    
                                </div>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>

    </div>

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
