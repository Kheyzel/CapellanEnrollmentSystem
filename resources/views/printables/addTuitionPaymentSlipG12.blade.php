@extends('layouts.app')

<style>

    /* #button {
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
      
    } */
    #button-back {
        background-color: #e70000;
        /* Green */
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
    }
    *{
        margin: 0;
        padding: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
       
    }
    .container {
        background: white;
        color: black !important;
        /* margin-top: 10px; */
        width: 8.5in;
        height: 13.97in;
        /* border: solid 1px black; */
        /* background-color: #c7e0f2; */
    }

    #container {
        /* width: 8.5in;
        height: 10.8in; */
      
        /* background-color: #c7e0f2; */
    }

    .header .header-wrapper {
        display: flex;
    }

    .header .header-wrapper .logo {
        margin-left: 20px;
    }

    .header .header-wrapper .logo img {
        width: 80px;
        height: auto;
        padding: 15px;
    }

    .header .header-wrapper .header-text {
        margin: auto 0 auto 20px;
    }

    .header .header-wrapper .header-text p {
        margin-bottom: 2px;
    }

    .header .header-wrapper .reg-copy {
        color: #ffdf00;

        margin: auto -390px 35px auto;
    }

    .header .header-wrapper .academic-year {
        margin: auto 30px 15px auto;
    }

    hr {
        margin: 0 20px 0 20px;
        
    }

    .content .content-wrapper h5 {
        text-align: center;
        padding-top: 10px;
        margin-bottom: 10px;
        color: #061783;
    }

    .content .content-wrapper .student-name {
        text-align: start;
        padding-left: 20px;

    }

    .content .content-wrapper .student-name p {
        margin-bottom: 5px;

    }

    .content .content-wrapper .student-info-left {
        text-align: start;
        padding-left: 20px;
        margin-bottom: 20px;

    }

    .content .content-wrapper .student-info-left p {
        margin-bottom: 5px;

    }

    .content .content-wrapper .student-info-right {
        margin-top: -65px;
        margin-left: 450px;
        text-align: start;
        padding-left: 20px;
        margin-bottom: 20px;

    }

    .content .content-wrapper .student-info-right p {
        margin-bottom: 5px;

    }

    .content .content-wrapper .payment-summary-reg-content p {
        margin-bottom: 5px;
        padding-left: 20px;
    }

    .content .content-wrapper .enrollment-sign-left {
        margin-top: 30px;
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
        margin: -20px auto 0 20px;
        padding-bottom: 0px;
    }

    .content .content-wrapper .reg-note p {
        font-style: italic;
        font-size: 0.9rem;
    }

    .dashed-hr {

        border: none;
        border: 1px dashed black;
     
        color: #fff;
        background-color: #fff;
        height: 1px;
        width: 100%;
        padding: none;
        margin-left: 0;
        margin-top: 10px;

    }


    /* STUDENT COPY */

    .header-student-copy .header-wrapper {
        display: flex;
        margin-top: 5px;
    }

    .header-student-copy .header-wrapper .logo {
        margin-left: 20px;
    }

    .header-student-copy .header-wrapper .logo img {
        width: 50px;
        height: auto;
        padding: 15px;
    }

    .header-student-copy .header-wrapper .header-text {
        margin: auto 0 auto 20px;
    }

    .header-student-copy .header-wrapper .header-text p {
        margin-bottom: 2px;
    }

    .header-student-copy .header-wrapper .reg-copy {
        color: #ffdf00;

        margin: auto -390px 35px auto;
    }

    .header-student-copy .header-wrapper .academic-year {
        margin: auto 30px 15px auto;
    }

    hr {
        margin: 0 20px 0 20px;
    }

    .content-student-copy .content-wrapper h3 {
        text-align: center;
        padding-top: 10px;
        margin-bottom: 10px;
        color: #061783;
    }

    .content-student-copy .content-wrapper .student-name {
        text-align: start;
        padding-left: 20px;

    }

    .content-student-copy .content-wrapper .student-name p {
        margin-bottom: 5px;

    }

    .content-student-copy .content-wrapper .student-info-left {
        text-align: start;
        padding-left: 20px;
        margin-bottom: 20px;

    }

    .content-student-copy .content-wrapper .student-info-left p {
        margin-bottom: 5px;

    }

    .content-student-copy .content-wrapper .student-info-right {
        margin-top: -65px;
        margin-left: 450px;
        text-align: start;
        padding-left: 20px;
        margin-bottom: 20px;

    }

    .content-student-copy .content-wrapper .student-info-right p {
        margin-bottom: 5px;

    }

    .content-student-copy .content-wrapper .payment-summary-reg-content p {
        margin-bottom: 5px;
        padding-left: 20px;
    }

    .content-student-copy .content-wrapper .enrollment-sign-left {
        margin-top: 40px;
        text-align: start;
        padding-left: 20px;
        margin-bottom: 20px;
    }

    .content-student-copy .content-wrapper .enrollment-sign-left .signature {
        width: 30%;
        border: 0px;
        border-bottom: 1px solid black;
        height: 30px;
        margin-bottom: 10px;
        margin-left: 15px;

    }

    .content-student-copy .content-wrapper .enrollment-sign-left .signature-title {
        font-size: 0.8rem;
        font-style: italic;
        font-weight: bold;
    }

    .content-student-copy .content-wrapper .enrollment-sign-right {
        margin-top: -68px;
        margin-left: 420px;
        text-align: start;
        padding-left: 20px;
        margin-bottom: 20px;


    }

    .content-student-copy .content-wrapper .enrollment-sign-right .signature {

        padding-left: 30px;

        width: 60%;
        border: 0px;
        border-bottom: 1px solid black;
        height: 20px;
        margin-bottom: 10px;
        margin-left: 80px;


    }

    .content-student-copy .content-wrapper .enrollment-sign-right .signature-title {
        font-size: 0.8rem;
        font-style: italic;
        font-weight: bold;
        margin-left: -15px;
    }

    .content-student-copy .content-wrapper .enrollment-sign-right .signature-title p span {
        margin-left: 105px;
    }

    .content-student-copy .content-wrapper .reg-note {
        margin: 10px auto 0 20px;
        padding-bottom: 0px;
    }

    .content-student-copy .content-wrapper .reg-note p {
        font-style: italic;
        font-size: 0.9rem;
    }

</style>
@section('breadcrumb')
    <div class="col-12 ">
        <div class="d-flex align-items-center justify-content-between mx-5 mt-2">
            <h4>Payment Slip</h4>
            <a id="button" class = "btn btn-md btn-success" onclick="generatepdf()">Download</a>
        </div>
    </div>
@endsection

@section('content')
<body>
    <div id ="container" class = "container">
        <div class="header">
            <div class="header-wrapper">
                <div class="logo">
                    <img src="{{asset('../img/capellan-logo.png')}}" alt="Logo">
                </div>
                <div class="header-text">
                    <p>Republic of the Philippines</p>
                    <p>CAPELLAN INSTITUTE OF TECHNOLOGY</p>
                    <P><strong>SAN PABLO CITY BRANCH</strong></P>
                </div>
                <div class="reg-copy" style="padding-top: 15px; padding-bottom:15px">
                    <h4><strong>REGISTRAR COPY</strong></h4>
                </div>
                <div class="academic-year">
                    <p style="margin: 0;"><strong>Academic Year {{ $school_year->school_year }}</strong> </p>
                    <p style="font-size: 12px; margin:0;"><strong>Reference No.:</strong>  {{ $year }}{{ $school_id }}{{ $ActivityLog_id }}</p>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="content-wrapper">
                <hr>
                <div class="head">
                    <h5>TUITION PAYMENT SLIP</h5>
                </div>
                <div class="student-name">
                    <p><strong>Name of Student: </strong> {{$student->last_name}}, {{$student->first_name}} {{$student->middle_name}} {{$student->suffix}}</p>
                </div>
                <div class="student-info-left">
                    <!-- <p><strong>LRN: </strong> 1245-812-54631</p> -->
                    <p><strong>Grade Level / Track: </strong>{{$student->yearlevel->yearlevel}} / {{$student->course->course}}</p>
                    {{-- <p><strong>Mode of Payment: </strong>
                        {{$std_payment->mode_of_payment}}
                    </p>
                    <p><strong>Discount Amount: </strong> 
                        {{$std_payment->discount}} --}}
                </div>

                {{-- <div class="student-info-right">
                    <p><strong>Discount Type: </strong>
                        {{$std_payment->discount_type}}</p>
                </div> --}}
                {{-- <div class="payment-summary-reg">
                    <h5>Payment Summary</h5>
                </div> --}}
                <div class="payment-summary-reg-content">
                    <p><strong>TOTAL PAYMENT: </strong> 
                        Php {{$std_payment->payment_amount}}.00
                       
                    <p><strong>DATE: </strong>{{Carbon\Carbon::now()->format('F d, Y')}}</p>
                    <p><strong>REMAINING BALANCE: </strong>Php {{$balance}}.00</p>
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
                <div class="reg-note">
                    <p><strong>REGISTRAR COPY: </strong> THIS SERVES AS AN OFFICIAL RECEIPT.</p>
                </div>
            </div>
        </div>
        <hr class="dashed-hr">

    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"
        integrity="sha512-YcsIPGdhPK4P/uRW6/sruonlYj+Q7UHWeKfTAkBW+g83NKM+jMJFJ4iAPfSnVp7BKD4dKMHmVSvICUbE/V1sSw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        function generatepdf() {
            var element = document.getElementById('container');
            var opt = {
                margin: 0,
                filename: '{{$student->last_name}}-{{$student->first_name}}-TuitionSlip',
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
@endsection