@extends('layouts.app')

<style>
    * {
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
        position: relative;
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

        margin: auto -350px 35px auto;
    }


    .content .content-wrapper h4 {
        text-align: center;
        padding-top: 10px;
        margin-bottom: 10px;
        color: #061783;
    }

    .content .content-wrapper .student-name {
        text-align: start;
        padding-left: 60px;
        margin-top: 30px;

    }

    .content .content-wrapper .student-name p {
        margin-bottom: 5px;

    }

    .content .content-wrapper .student-grade {
        text-align: start;
        padding-left: 60px;
        margin-bottom: 20px;

    }

    .content .content-wrapper .student-grade p {
        margin-bottom: 5px;

    }

    .content .content-wrapper .student-info-left {
        text-align: start;
        padding-left: 60px;
        margin-bottom: 20px;
        /* background-color: #ffdf00; */



    }

    .content .content-wrapper .student-info-left p {
        margin-bottom: 10px;
        font-size: .85rem;

    }

    /* .content .content-wrapper .student-info-left hr {
       color: black;
        margin: 5px;
        margin-right: 20px;
    } */

    table,
    th,
    td {
        border: 1px solid black;
        margin: auto;
    }

    th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: center;
        background-color: #76817d;
        color: white;
    }

    .content .content-wrapper .table {
        /* background-color: blue; */
        /* border-collapse: collapse; */
        width: 100%;
    }

    .header .header-wrapper .academic-year {
        margin: auto 30px 15px auto;
    }

    hr {
        margin: 0 20px 0 20px;

    }



    .content .content-wrapper .content-table {
        border-collapse: collapse;
        margin: 30px auto;
        font-size: 0.9em;
        min-width: 400px;
        border-radius: 5px 5px 0 0;
        overflow: hidden;
        /* box-shadow: 0 0 20px rgba(0, 0, 0, 0.15); */
        border: black;
    }

    .content .content-wrapper .content-table thead tr {
        background-color: #009879;
        color: #ffffff;
        text-align: center;
        font-weight: bold;
    }

    .content-table th,
    .content-table td {
        padding: 8px 15px;
    }

    .content-table tbody tr {
        border-bottom: 1px solid #dddddd;
    }

    /* .footer {
        position: relative;
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: red;
        color: white;
        text-align: center;
     } */


    .footer {
        position: absolute;
        bottom: 0;
        width: 100%;
        height: 9.5rem;
        /* Footer height */
    }

    .footer .enrollment-sign-right {
        margin-top: -68px;
        margin-left: 420px;
        text-align: start;
        padding-left: 20px;
        margin-bottom: 20px;


    }

    .footer .enrollment-sign-right .signature {

        padding-left: 30px;

        width: 60%;
        border: 0px;
        border-bottom: 1px solid black;
        height: 20px;
        margin-bottom: 10px;
        margin-left: 80px;


    }

    .footer .enrollment-sign-right .signature-title {
        font-size: 0.8rem;
        font-style: italic;
        font-weight: bold;
        margin-left: -15px;
    }

    .footer .enrollment-sign-right .signature-title p span {
        margin-left: 75px;
    }

    .footer .reg-note {
        margin: 10px auto 0 20px;
        padding-bottom: 0px;
    }

    .footer .reg-note p {
        font-style: italic;
        font-size: 0.9rem;
    }

    /* .content-table tbody tr:nth-of-type(even) {
        background-color: #f3f3f3;
      }
      
      .content-table tbody tr:last-of-type {
        border-bottom: 2px solid royalblue;
      } */

</style>

@section('breadcrumb')
    <div class="col-12 ">
        <div class="d-flex align-items-center justify-content-between mx-5 mt-2">
            <h4>Statement of Account</h4>
            <a id="button" class="btn btn-md btn-success" onclick="generatepdf()">Download</a>
        </div>
    </div>
@endsection


@section('content')

    <body>
        <div class="container" id="container">
            <div class="header">
                <div class="header-wrapper">
                    <div class="logo">
                        <img src="{{ asset('../img/capellan-logo.png') }}" alt="Logo" />
                    </div>
                    <div class="header-text">
                        <p>Republic of the Philippines</p>
                        <p>CAPELLAN INSTITUTE OF TECHNOLOGY</p>
                        <p><strong>SAN PABLO CITY BRANCH</strong></p>
                    </div>
                    <div class="reg-copy" style="padding-top: 15px; padding-bottom: 15px">
                        <h3><strong>Statement of Account</strong></h3>
                    </div>
                    <div class="academic-year">
                        <p style="margin: 0;"><strong>Academic Year {{ $school_year->school_year }}</strong></p>
                        <p style="font-size: 12px; margin:0;"><strong>Transaction No.:</strong>  {{ $year }}{{ $school_id }}{{ $ActivityLog_id }}</p>
                    </div>
                </div>
            </div>

            <div class="content">
                <div class="content-wrapper">
                    <hr />
                    <!-- <div class="head">
                  <h4>STATEMENT OF ACCOUNT</h4>
                </div> -->
                    <div class="student-name">
                        <p><strong>Name of Student: </strong> {{ $student->last_name }}, {{ $student->first_name }}
                            {{ $student->middle_name }} {{ $student->suffix }}</p>
                    </div>
                    <div class="student-grade">
                        <p><strong>Grade Level / Strand: </strong>11 - {{ $student->course->course }}</p>
                    </div>


                    <table class="content-table" style="width: 90%">
                        <thead>
                            <tr>
                                <th colspan="3">SUMMARY OF TRANSACTIONS</th>
                            </tr>
                            <tr>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Payment Method</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($std_payment as $payment)
                                <tr>
                                    <td>Php {{ $payment->payment_amount }}.00</td>
                                    <td>{{ \Carbon\Carbon::parse($payment->created_at)->format('F d, Y') }}
                                    </td>
                                    <td>{{ $payment->payment_method }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="3" style="text-align: end; font-weight: bold;">Paid in Total:
                                    Php {{ $std_total_paid }}.00</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="student-info-left">
                        <p>
                            <strong>Mode of Payment: </strong>
                            @foreach ($std_payment as $payment)
                                {{ $payment->mode_of_payment }}
                            @endforeach
                        </p>
                        <p>
                            <strong>Tuition Fee: </strong>
                            Php {{ $tuition_fee }}.00
                        </p>
                        <p>
                            <strong>Tuition Fee Discount: </strong>
                            Php {{ $discount }}.00
                        </p>

                        <p>
                            <strong>Miscellaneous Fee: </strong>
                            Php {{ $total_miscellaneous_fee }}.00
                        </p>
                        <hr style="width:90%; text-align:center; margin-left:0; margin-bottom: 10px;" />
                        <p style="margin-bottom: 20px;">
                            <strong>Total Tuition Fee: </strong>
                            Php {{ $total_tuition_fee }}.00
                        </p>
                        <p style="font-size: .85rem; font-weight: 900;">
                            Remaining Balance:
                            Php {{ $balance }}.00
                        </p>
                    </div>
                    
                    <!-- <div class="table">
                          <table style="width:80%">
                              <tr>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Payment Method</th>
                              </tr>
                              <tr>
                                <td>January</td>
                                <td>$100</td>
                                <td>February</td>
                              </tr>
                              <tr>
                                <td>February</td>
                                <td>$80</td>
                                <td>$80</td>
                              </tr>
                            </table>
                      </div> -->

                      

                </div>

            </div>

            <div class="footer">
                <div class="enrollment-sign-right">
                    <div class="signature">
                    </div>
                    <div class="signature-title">
                        <p> <span> Issued By Cashier (Signature over Printed Name)</span></p>
                        <!-- <p>(Signature over Printed Name of the Student)</p> -->
                    </div>
                </div>
                <div class="reg-note">
                    <p><strong>STUDENT'S TRANSACTIONS COPY: </strong> This is to certify that the information stated above
                        was all valid and has been acknowledged by the Office of Capellan Institute of Technology San Pablo.
                    </p>
                </div>
            </div>
        </div>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"
                integrity="sha512-YcsIPGdhPK4P/uRW6/sruonlYj+Q7UHWeKfTAkBW+g83NKM+jMJFJ4iAPfSnVp7BKD4dKMHmVSvICUbE/V1sSw=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script type="text/javascript">
            function generatepdf() {
                var element = document.getElementById('container');
                var opt = {
                    margin: 0,
                    filename: '{{ $student->last_name }}, {{ $student->first_name }} StatementOfAccount',
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
