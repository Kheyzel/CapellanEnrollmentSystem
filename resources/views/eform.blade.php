<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CIT San Pablo Registration Form</title>
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="shortcut icon" href="{{ asset('../img/capellan-logo.png') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
</head>

<body>

    @if (Session::has('ok'))

        <body onload="ok()">
    @endif

    <div class="outer-container">
        <div class="container">
            <img src="{{ asset('../img/capellan-logo.png') }}" alt="logo" />
            <div class="title mb-3">CIT San Pablo - Student Registration Form</div>
            <div class="content">
                <form method="POST" action="{{ route('registerStudent.store_eform') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="d-flex flex-column align-items-center ">
                                <div id="my_camera"></div>
                                <div>
                                    <input type=button class="btn btn-sm btn-primary" value="Capture"
                                        onClick="take_snapshot()">
                                </div>
                            </div>
                            <input type="hidden" name="image" class="image-tag">
                        </div>

                        <div class="col-md-6">
                            <div class="d-flex flex-column align-items-center ">
                                
                            <div class="d-flex justify-content-center align-items-center mx-0" style="margin-top: 20px" id="results" style = "width: 350px"></div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mt-5 mx-3 mb-3">
                                <label class="mb-2 h5 font-weight-bold" for="first_name">
                                    <span class="text-danger">*</span>First Name
                                </label>
                                <input type="text" class="form-control" name="first_name" required />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mt-5 mx-3 mb-3">
                                <label class="mb-2 h5 font-weight-bold" for="last_name">
                                    <span class="text-danger">*</span>Last Name
                                </label>
                                <input type="text" class="form-control" name="last_name" required />
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group m-3">
                                <label class="mb-2 h5 font-weight-bold" for="middle_name">
                                    Middle Name
                                </label>
                                <input type="text" class="form-control" name="middle_name" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group m-3">
                                <label class="mb-2 h5 font-weight-bold" for="suffix">
                                    Extension Name
                                </label>
                                <input type="text" class="form-control" name="suffix" />
                            </div>
                        </div>

                        <div class="col-4">
                            <label class="mt-3 ms-3 h5 font-weight-bold" for="sex">
                                <span class="text-danger">*</span>Sex
                            </label>
                            <select class="form-select ms-3" aria-label="Default select example" name="sex" required>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <div class="form-group m-3">
                                <label class="mb-2 h5 font-weight-bold" for="b_date">
                                    <span class="text-danger">*</span>Birthdate
                                </label>
                                <input type="date" class="form-control" name="b_date" required />
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group m-3">
                                <label class="mb-2 h5 font-weight-bold" for="contact_num">
                                    <span class="text-danger">*</span>Contact Number
                                </label>
                                <input type="text" class="form-control" name="contact_num" required />
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group m-3">
                                <label class="mb-2 h5 font-weight-bold" for="email_ad">
                                    <span class="text-danger">*</span>Email Address
                                </label>
                                <input type="text" class="form-control" name="email_ad" required />
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group m-3">
                                <label class="mb-2 h5 font-weight-bold" for="m_tongue">
                                    <span class="text-danger">*</span>Mother Tongue
                                </label>
                                <input type="text" class="form-control" name="m_tongue" required />
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group m-3">
                                <label class="mb-2 h5 font-weight-bold" for="religion">
                                    <span class="text-danger">*</span>Religion
                                </label>
                                <input type="text" class="form-control" name="religion" required />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group m-3">
                                <label class="mb-2 h5 font-weight-bold" for="psa_num">
                                    PSA Number
                                </label>
                                <input type="text" class="form-control" name="psa_num" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group m-3">
                                <label class="mb-2 h5 font-weight-bold" for="lrn">
                                    <span class="text-danger">*</span>Learner's Reference Number (LRN)
                                </label>
                                <input type="text" class="form-control" name="lrn" maxlength="12" minlength="12"
                                    required />
                            </div>
                        </div>
                        <div class="col-3">
                            <label class="mt-3 ms-3 h5 font-weight-bold" for="yearlevel">
                                <span class="text-danger">*</span>Grade Level
                            </label>
                            <select class="form-select ms-3" aria-label="Default select example" name="yearlevel"
                                required>
                                <!-- <option selected>Open this select menu</option> -->
                                <option value="1">11</option>
                                <option value="2">12</option>
                            </select>
                        </div>
                        <div class="col-8">
                            <label class="mt-3 ms-3 h5 font-weight-bold" for="course">
                                <span class="text-danger">*</span>Strand/Course
                            </label>
                            <select class="form-select ms-3" aria-label="Default select example" name="course" required>
                                <!-- <option selected>Open this select menu</option> -->
                                <option value="1">Industrial Arts(IA)-Automotive Servicing</option>
                                <option value="2">Industrial Arts(IA)-Electrical Installation and Maintenance</option>
                                <option value="3">Industrial Arts(IA)-Electronic Products Assembly and Servicing
                                </option>
                                <option value="4">Information and Communication Technology (ICT)-Computer System
                                    Servicing NC II</option>
                                <option value="5">Information and Communication Technology (ICT)-Programming</option>
                                <option value="6">Home Economics (HE)-Housekeeping NC II/Front Office Services NC II
                                </option>
                                <option value="7">Home Economics (HE)-Food and Beverage Services NC II/Bread and Pastry
                                    Production NC II</option>
                            </select>
                        </div>

                        <div class="col-12">
                            <div class="sub-title text-center mt-5">
                                Address
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group m-3">
                                <label class="mb-2 h5 font-weight-bold" for="house_num">
                                    <span class="text-danger">*</span>House No./Street/Purok
                                </label>
                                <input type="text" class="form-control" name="house_num" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group m-3">
                                <label class="mb-2 h5 font-weight-bold" for="city">
                                    <span class="text-danger">*</span>City/Municipality
                                </label>
                                <input type="text" class="form-control" name="city" required />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group m-3">
                                <label class="mb-2 h5 font-weight-bold" for="brgy">
                                    <span class="text-danger">*</span>Brgy./Barrio
                                </label>
                                <input type="text" class="form-control" name="brgy" required />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group m-3">
                                <label class="mb-2 h5 font-weight-bold" for="province">
                                    <span class="text-danger">*</span>Province
                                </label>
                                <input type="text" class="form-control" name="province" required />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="sub-title text-center mt-5">
                                Parent/Guardian's Information
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group m-3">
                                <label class="mb-2 h5 font-weight-bold" for="m_fullname">
                                    Mother's Maiden Full Name
                                </label>
                                <input type="text" class="form-control" name="m_fullname" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group m-3">
                                <label class="mb-2 h5 font-weight-bold" for="m_occu">
                                    Mother's Occupation
                                </label>
                                <input type="text" class="form-control" name="m_occu" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group m-3">
                                <label class="mb-2 h5 font-weight-bold" for="m_educ">
                                    Mother's Educational Attainment
                                </label>
                                <input type="text" class="form-control" name="m_educ" />
                            </div>
                        </div>
                        <div class="col-6">

                        </div>
                        <div class="col-6">
                            <div class="form-group m-3">
                                <label class="mb-2 h5 font-weight-bold" for="f_fullname">
                                    Father's Full Name
                                </label>
                                <input type="text" class="form-control" name="f_fullname" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group m-3">
                                <label class="mb-2 h5 font-weight-bold" for="f_occu">
                                    Father's Occupation
                                </label>
                                <input type="text" class="form-control" name="f_occu" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group m-3">
                                <label class="mb-2 h5 font-weight-bold" for="f_educ">
                                    Father's Educational Attainment
                                </label>
                                <input type="text" class="form-control" name="f_educ" />
                            </div>
                        </div>
                        <div class="col-6">

                        </div>
                        <div class="col-6">
                            <div class="form-group m-3">
                                <label class="mb-2 h5 font-weight-bold" for="g_fullname">
                                    <span class="text-danger">*</span>Guardian's Full Name
                                </label>
                                <input type="text" class="form-control" name="g_fullname" required />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group m-3">
                                <label class="mb-2 h5 font-weight-bold" for="g_occu">
                                    <span class="text-danger">*</span>Guardian's Occupation
                                </label>
                                <input type="text" class="form-control" name="g_occu" required />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group m-3">
                                <label class="mb-2 h5 font-weight-bold" for="g_educ">
                                    <span class="text-danger">*</span>Guardian's Educational Attainment
                                </label>
                                <input type="text" class="form-control" name="g_educ" required />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group m-3">
                                <label class="mb-2 h5 font-weight-bold" for="pg_contact_num">
                                    <span class="text-danger">*</span>Parent/Guardian's Contact Number
                                </label>
                                <input type="text" class="form-control" name="pg_contact_num" required />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="sub-title text-center mt-5">
                                Previous School Information
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group m-3">
                                <label class="mb-2 h5 font-weight-bold" for="prev_school">
                                    <span class="text-danger">*</span>School Name
                                </label>
                                <input type="text" class="form-control" name="prev_school" required />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group m-3">
                                <label class="mb-2 h5 font-weight-bold" for="prev_school_ad">
                                    <span class="text-danger">*</span>School Address
                                </label>
                                <input type="text" class="form-control" name="prev_school_ad" required />
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="mt-3 ms-3 h5 font-weight-bold" for="school_type">
                                <span class="text-danger">*</span>School Type
                            </label>
                            <select class="form-select ms-3" aria-label="Default select example" name="school_type"
                                required>
                                <option value="Public">Public</option>
                                <option value="Private">Private</option>
                                <option value="ALS">ALS</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="mt-3 ms-3 h5 font-weight-bold" for="transferee">
                                <span class="text-danger">*</span>Are you a Transferee?
                            </label>
                            <select class="form-select ms-3" aria-label="Default select example" name="transferee"
                                required>
                                <option value="No">No</option>
                                <option value="Yes">Yes</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <div class="form-group m-3">
                                <label class="mb-2 h5 font-weight-bold" for="l_year_completion">
                                    <span class="text-danger">*</span>Year of Completion
                                </label>
                                <input type="text" class="form-control" name="l_year_completion" required />
                            </div>
                        </div>

                        <div>
                            <div class="text-end p-3 mt-3 me-5">
                                <button type="reset" class="btn btn-outline-danger me-2">Clear Form</button>
                                <button type="submit" class="btn btn-outline-primary">Submit Form</button>
                            </div>

                        </div>


                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function ok() {
            Swal.fire({
                icon: 'success',
                title: 'Student Registered Successfully!',
                showConfirmButton: true,
            })
        }
    </script>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
</script> --}}

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



    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <!-- Configure a few settings and attach camera -->
    <script language="JavaScript">
        Webcam.set({
            width: 350,
            height: 300,
            image_format: 'jpeg',
            jpeg_quality: 90
        });
        Webcam.attach('#my_camera');

        function take_snapshot() {
            Webcam.snap(function(data_uri) {
                $(".image-tag").val(data_uri);
                document.getElementById('results').innerHTML = '<img style = "width:300px; height:auto;" src="' + data_uri + '"/>';
            });
        }
    </script>

</body>

</html>
