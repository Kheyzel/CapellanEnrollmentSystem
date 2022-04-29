<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap"
        rel="stylesheet">


    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {}

        .border {
            margin: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #container {
            width: 8.5in;
            height: 11in;
            /* background-color: #c7e0f2; */
        }

        .header .header-wrapper {
            display: flex;
        }

        .header .header-wrapper .logo {
            margin-left: 20px;
        }

        .header .header-wrapper .logo img {
            width: 70px;
            height: auto;
            padding: 15px 0 15px 15px;
        }

        .header .header-wrapper .header-text {
            margin: auto 10px auto 20px;
        }

        .header .header-wrapper .header-text p {
            margin-bottom: 2px;
            font-size: .85rem;
        }

        .header .header-wrapper .header-text .school-name {
            color: #061783;
            font-family: 'Libre Baskerville', serif;
            font-weight: 900;
            font-size: 1.20rem;
        }

        .header .header-wrapper .academic-year {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: end;
            padding-bottom: 10px;
        }

        .header .header-wrapper .academic-year #certified {
            color: #ffdf00;
            margin: 0;
        }

        hr {
            margin: 0 20px 0 20px;
        }

        .header h3 {
            text-align: center;
            margin-top: 20px;
            margin-bottom: 30px;
            color: #061783;
        }

        /* .content .content-wrapper .picture-box {
            width: 1in;
            height: 1in;
            border: solid 1px rgb(0, 0, 0);
            margin-left: 675px;
            margin-top: -55px;
            position: absolute;
        } */

        .content .content-wrapper .student-name_enrollment-date {
            display: flex;
        }

        .content .content-wrapper .left {
            width: 50%;
            padding-left: 30px;
            padding-right: 20px;
        }

        .content .content-wrapper .right {
            width: 40%;
        }

        .student-container {
            display: flex;
            line-height: 28px;
        }

        .student-container .left {
            width: 50%;
            padding-left: 30px;
            padding-right: 20px;
        }

        .student-container .right {
            width: 50%;
        }

        /* asdasdasdasdasd */

        .content .content-wrapper .student-info-left {
            text-align: start;
            padding-left: 20px;
            margin-bottom: 20px;
        }

        .content .content-wrapper .student-info-left .student-address {
            text-align: start;
            padding-left: 0;
            padding-bottom: 35px;
            margin-bottom: 0px;
        }

        .content .content-wrapper .student-info-left p {
            margin-bottom: 5px;
        }

        .content .content-wrapper .student-info-right {
            margin-top: -160px;
            margin-left: 450px;
            text-align: start;
            padding-left: 20px;
            margin-bottom: 20px;
        }

        .content .content-wrapper .student-info-right p {
            margin-bottom: 5px;
        }

        .content .content-wrapper .pg-info-content p {
            margin-bottom: 5px;
            padding-left: 20px;
        }

        .content .content-wrapper .school-info-content p {
            margin-bottom: 5px;
            padding-left: 20px;
        }

        .content .content-wrapper .docu-info {
            border: 1px solid black;
            margin: 20px;
            padding: 5px;
        }

        .content .content-wrapper .docu-info-content {
            margin-top: 3px;
            font-style: italic;
            font-size: .90rem;
            padding-left: 5px;
        }

        .content .content-wrapper .docu-info-content-left {
            font-style: italic;
            font-size: .90rem;
            padding-left: 35px;
        }

        .content .content-wrapper .docu-info-content-right {
            font-style: italic;
            font-size: .90rem;
            padding-left: 485px;
            margin-top: -40px;
        }

        .content .content-wrapper .enrollment-sign-left {
            margin-top: -10px;
            text-align: start;
            padding-left: 20px;
            margin-bottom: 20px;
        }

        .content .content-wrapper .enrollment-sign-left .signature {
            width: 30%;
            border: 0px;
            border-bottom: 1px solid black;
            height: 30px;
            margin-bottom: 10px;
            margin-left: 15px;
        }

        .content .content-wrapper .enrollment-sign-left .signature-title {
            font-size: 0.8rem;
            font-style: italic;
            font-weight: bold;
        }

        .content .content-wrapper .enrollment-sign-right {
            margin-top: -68px;
            margin-left: 420px;
            text-align: start;
            padding-left: 20px;
            margin-bottom: 20px;
        }

        .content .content-wrapper .enrollment-sign-right .signature {
            padding-left: 30px;
            width: 60%;
            border: 0px;
            border-bottom: 1px solid black;
            height: 20px;
            margin-bottom: 10px;
            margin-left: 80px;
        }

        .content .content-wrapper .enrollment-sign-right .signature-title {
            font-size: 0.8rem;
            font-style: italic;
            font-weight: bold;
            margin-left: -15px;
        }

        .content .content-wrapper .enrollment-sign-right .signature-title p span {
            margin-left: 105px;
        }

        .content .content-wrapper .reg-note {
            margin: -10px 20px 20px 20px;
            padding-bottom: 0px;
        }

        .content .content-wrapper .reg-note p {
            font-style: italic;
            font-size: 0.8rem;

            
        }

    </style>
</head>

<body>
    <div class="border">
        <div class="border-line" style = "border: 1px solid black;">
            <div id="container">
            <div class="header">
                <div class="header-wrapper">
                    <div class="logo">
                        <img src="{{asset('../img/capellan-logo.png')}}" alt="Logo">
                    </div>
                    <div class="header-text">
                        <!-- <p>Republic of the Philippines</p> -->
                        <p class="school-name"> CAPELLAN INSTITUTE OF TECHNOLOGY</p>
                        <P><strong>San Pablo Branch</strong></P>
                        <P><strong>San Pablo City, Laguna</strong></P>
                    </div>
                    <div class="academic-year">
                        
                        <h3 id="certified"><strong>CERTIFIED TRUE COPY</strong></h3>
                        <p><strong>Academic Year {{ $school_year->school_year }}</strong> </p>
                        <p style="font-size: 12px;"><strong>O.R. No.:</strong>{{ $school_id }}{{ $ActivityLogs->id }}</p>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="content-wrapper">
                    <hr>
                    <div class="header">
                        <h3>STUDENT ENROLLMENT FORM</h3>
                    </div>

                    <!-- <div class="student-name_enrollment-date">
                    <div class="left">
                        <p><strong>Name of Student: </strong> Nugoy, Kheyzel Malabanan</p>
                    </div>
                    <div class="right">
                        <p><strong>Date of Enrollment: </strong>mm/dd/yy</p>
                    </div>
                </div> -->

                    <div class="student-container">
                        <div class="left">
                            <p><strong>Name of Student: </strong>{{ $student->last_name }}, {{ $student->first_name }}
                                {{ $student->middle_name }} {{ $student->suffix }} </p>
                            <p><strong>LRN: </strong>{{ $student->lrn }}</p>
                            <p><strong>Selected Program/Track: </strong>{{ $student->course->course }}</p>
                            <p><strong>Incoming Grade Level: </strong>{{ $student->yearlevel->yearlevel }}</p>
                            <p><strong>Birthdate: </strong>{{ \Carbon\Carbon::parse($student->b_date)->format('F d, Y') }}</p>
                        </div>
                        <div class="right">
                            <p><strong>Sex: </strong>{{ $student->sex }}</p>
                            <p><strong>Religion: </strong> {{ $student->religion }}</p>
                            <p><strong>Mother Tongue.: </strong>{{ $student->m_tongue }}</p>
                            <p><strong>Contact Number: </strong>{{ $student->contact_num }}</p>
                            <p><strong>Email Address: </strong>{{ $student->email_ad }}</p>
                        </div>
                    </div>

                    <p style="padding-left: 30px;"><strong>Complete Address: </strong>{{ $student->house_num }} {{ $student->brgy }},
                        {{ $student->city }}, {{ $student->province }} </p>



                    <div class="header">
                        <h3>PARENTS' INFORMATION</h3>
                    </div>
                    <div class="student-container">
                        <div class="left">
                            <p><strong>Mother's Maiden Full Name: </strong> {{ $student->m_fullname }}</p>
                            <p><strong>Mother's Educational Attainment: </strong> {{ $student->m_educ }}
                            </p>
                            <p><strong>Mother's Occupation: </strong>{{ $student->m_occu }}</p>
                            <br>
                            <p><strong>Father's Full Name: </strong>{{ $student->f_fullname }}</p>
                            <p><strong>Father's Educational Attainment: </strong>{{ $student->f_educ }}</p>
                            <p><strong>Father's Occupation: </strong>{{ $student->f_occu }}</p>

                        </div>

                        <div class="right">
                            <p><strong>Guardian's Full Name: </strong>{{ $student->g_fullname }}</p>
                            <p><strong>Guardian's Educational Attainment: </strong>{{ $student->g_educ }}
                            </p>
                            <p><strong>Guardian's Occupation: </strong>{{ $student->g_occu }}</p>
                            <br>
                            <p><strong>Parent's/Guardian's Contact Number: </strong>{{ $student->pg_contact_num }}
                            </p>
                        </div>
                    </div>

                    <div class="header">
                        <h3>PREVIOUS SCHOOL INFORMATION</h3>
                    </div>

                    <div class="student-container">
                        <div class="left">
                            {{-- <p><strong>Type of Student: </strong>  {{ $student->std_type }} </p> --}}
                            <p><strong>Last Year of Completion: </strong>{{ $student->l_year_completion }}</p>
                            <p><strong>Previous School Attended: </strong>{{ $student->prev_school }}</p>

                        </div>

                        <div class="right">
                            <p><strong>Previous School Type: </strong> {{ $student->school_type }}</p>
                            <p><strong>Previous School Address: </strong>{{ $student->prev_school_ad }}</p>
                        </div>
                    </div>
                    <div class="school-info-content">


                    </div>

                    <div class="docu-info">
                        <div class="docu-info-content">
                            <div class="p">The applicant must also submit the following admission
                                requirements (*Note: Disregard if already submitted.):</div>
                        </div>
                        <div class="docu-info-content-left">
                            <ul>
                                <li class="p">Form 137</li>
                                <li class="p">PSA Photocopy</li>
                                <li class="p">Certificate of Completion</li>
                            </ul>
                        </div>
                        <div class="docu-info-content-right">
                            <ul>
                                <li class="p">Form 138</li>
                                <li class="p">Certificate of Good Moral (Original Copy)</li>
                            </ul>
                        </div>
                    </div>
                    <div class="reg-note">
                        <p><strong>I/We hereby certify that all information written in this enrollment form is true and
                                accurate. If accepted as student of Capellan Institute of Technology San Pablo, we/I
                                shall abide with the school rules/policies. </strong></p>
                    </div>
                    <div class="enrollment-sign-left">
                        <div class="signature">

                        </div>
                        <div class="signature-title">
                            <p>Signature over Printed Name of the Student</p>
                        </div>
                    </div>
                    <div class="enrollment-sign-right">
                        <div class="signature">

                        </div>
                        <div class="signature-title">
                            <p> <span> Issued By (Signature over Printed Name)</span></p>
                            <!-- <p>(Signature over Printed Name of the Student)</p> -->
                        </div>
                    </div>

                </div>
            </div>
            </div>
        </div>
    </div>
    <div class="button" style="display: flex; justify-content: center; margin-bottom: 30px;">
        <button id="button" onclick="generatepdf()" style = " center; padding: 12px; background-color: green; border-radius: 5px;">Download</button>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"
        integrity="sha512-YcsIPGdhPK4P/uRW6/sruonlYj+Q7UHWeKfTAkBW+g83NKM+jMJFJ4iAPfSnVp7BKD4dKMHmVSvICUbE/V1sSw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        function generatepdf() {
            var element = document.getElementById('container');
            var opt = {
                margin: 0,
                filename: '{{ $student->last_name }}-{{ $student->first_name }}-EnrollmentForm',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 2
                },
                jsPDF: {
                    unit: 'in',
                    format: 'legal',
                    orientation: 'portrait'
                }
            };
            html2pdf().set(opt).from(element).save();
        };
    </script>
</body>

</html>
