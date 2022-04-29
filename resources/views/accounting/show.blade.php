@extends('layouts.app')


@section('breadcrumb')
    <div class="col-12 ">
        <div class="d-flex align-items-center justify-content-between mx-5 mt-2">
            <h4>Students Transaction</h4>
        </div>
    </div>
@endsection
@section('content')


    @if ($student->yearlevel->yearlevel == '12' && $student->enroll_status == 'Enrolled')
        <div class="container-fluid">

            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between mx-4">
                    <h4 class="mb-0">Tuition Payment Transaction Grade 12</h4>
                    <div>
                        

                        @if ($balance_g12 > 0)
                        <button type="button" class="btn btn-primary btn-md" data-toggle="modal"
                        data-target="#exampleModalCenter">
                        Add Payment
                    </button> <span class="mr-3"></span>

                        @else
                        
                        <button class="btn btn-md btn-success px-5 " disabled> Fully Paid </button><span
                                class="mr-3"></span>
                        @endif

                        <a class="btn btn-primary btn-md" href="{{ route('StatementOfAccountG12.print', $student->id) }}">
                            Download Statement of Account
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="student-info border border-dark">
                        <h3 class="text-center bg-secondary p-2 mb-3">Student Information</h3>
                        <div class="ml-4">
                            <p><strong>Name: </strong> {{ $student->last_name }}, {{ $student->first_name }}
                                {{ $student->middle_name }} {{ $student->suffix }}</p>
                            <p><strong>Learners Reference Number (LRN): </strong> {{ $student->lrn }}</p>
                            
                            <p><strong>Grade Level: </strong> {{ $student->yearlevel->yearlevel }}</p>
                            <p><strong>Course: </strong> {{ $student->course->course }}</p>
                        </div>
                    </div>
                    <div class="summary-transaction mt-3">
                        <h3 class="text-center mt-5 bg-secondary p-2 mb-3">Summary Transaction</h3>
                        <div class="row">
                            <div class="col-6">
                                <p class="ml-4 mt-3"><strong>Mode of Payment: </strong>
                                    @foreach ($std_payment_g12 as $payment)
                                        {{ $payment->mode_of_payment }}
                                    @endforeach
                                </p>
                            </div>
                        </div>


                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Payment Method</th>
                                    <th scope="col">Reference Number</th>
                                </tr>
                            </thead>
                            <tbody>


                                @foreach ($std_payment_g12 as $payment)
                                    <tr>
                                        <td>Php {{ $payment->payment_amount }}.00</td>
                                        <td>{{ \Carbon\Carbon::parse($payment->created_at)->format('F d, Y') }}
                                        </td>
                                        <td>{{ $payment->payment_method }}</td>
                                        <td>{{ $payment->ref_num }}</td>
                                    </tr>
                                @endforeach


                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td class="d-flex justify-content-end">
                                        <h5 class="mr-5 mt-2"><strong>Paid in Total: </strong>
                                           Php {{ $std_total_paid_g12 }}.00
                                        </h5>

                                    </td>
                                </tr>
                                <p></p>
                            </tfoot>
                        </table>
                        <div class="ml-4 mt-5">


                            <p class="mr-5"><strong>Tuition Fee: </strong>Php {{ $tuition_fee_g12 }}.00</p>
                            <p><strong>Tuition Fee Discount: </strong>Php {{ $discount_g12 }}.00</p>
                            <p class="mr-5"><strong>Miscellaneous Fee:
                                </strong>Php {{ $total_miscellaneous_fee_g12 }}.00</p>
                            <hr>
                            <p><strong>Total Tuition Fee: </strong>
                                Php {{ $total_tuition_fee_g12 }}.00
                            </p>


                            <br>
                            <p class="h5"><strong>REMAINING BALANCE: </strong>
                                Php {{ $balance_g12 }}.00
                            </p>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    @endif



    <div class="container-fluid">

        @if (Session::has('Fileadded'))
            <div class="row ">
                <div class="col-12">
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">NOTICE! </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    {{ Session::get('Fileadded') }}
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if (!@empty($no_g11_record))
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between mx-4">
                    <h4 class="mb-0">Tuition Payment Transaction</h4>
                    <div class="d-flex justify-content-end">
                        @if ($balance > 0)
                            <button type="button" class="btn btn-primary btn-md" data-toggle="modal"
                                data-target="#exampleModalCenter">
                                Add Payment
                            </button> <span class="mr-3"></span>

                        @else
                            <button class="btn btn-md btn-success px-5 " disabled> Fully Paid </button><span
                                class="mr-3"></span>
                        @endif
                        

                        <a class="btn btn-primary btn-md" href="{{ route('StatementOfAccount.print', $student->id) }}">
                                Download Statement of Account
                            </a>
                    </div>
                    
                </div>
                <div class="card-body">
                    <div class="student-info border border-dark">
                        <h3 class="text-center bg-secondary p-2 mb-3">Student Information</h3>
                        <div class="ml-4">
                            <p><strong>Name: </strong> {{ $student->last_name }}, {{ $student->first_name }}
                                {{ $student->middle_name }} {{ $student->suffix }}</p>
                            <p><strong>Learners Reference Number (LRN): </strong> {{ $student->lrn }}</p>
                            
                            {{-- <p><strong>Grade Level: </strong> {{ $student->yearlevel->yearlevel }}</p> --}}
                            <p><strong>Grade Level: </strong> 11 </p>
                            <p><strong>Course: </strong> {{ $student->course->course }}</p>
                        </div>
                    </div>
                    <div class="summary-transaction mt-3">
                        <h3 class="text-center mt-5 bg-secondary p-2 mb-3">Summary Transaction</h3>
                        <div class="row">
                            <div class="col-6">
                                <p class="ml-4 mt-3"><strong>Mode of Payment: </strong>
                                    @foreach ($std_payment as $payment)
                                        {{ $payment->mode_of_payment }}
                                    @endforeach
                                </p>
                            </div>
                            {{-- <div class="col-6 text-right">
                                <div>
                                    @if ($balance > 0)
                                        <button type="button" class="btn btn-primary btn-md mr-5" data-toggle="modal"
                                            data-target="#exampleModalCenter">
                                            Add Payment
                                        </button> <span class="mr-5"></span>

                                    @else
                                        <h5 class="btn btn-md btn-success px-5 mr-5"> Fully Paid </h5><span
                                            class="mr-5"></span>
                                    @endif
                                </div>
                            </div> --}}
                        </div>



                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Payment Method</th>
                                    <th scope="col">Reference Number</th>
                                </tr>
                            </thead>
                            <tbody>


                                @foreach ($std_payment as $payment)
                                    <tr>
                                        <td>Php {{ $payment->payment_amount }}.00</td>
                                        <td>{{ \Carbon\Carbon::parse($payment->created_at)->format('F d, Y') }}
                                        </td>
                                        <td>{{ $payment->payment_method }}</td>
                                        <td>{{ $payment->ref_num }}</td>
                                    </tr>
                                @endforeach


                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td class="d-flex justify-content-end">
                                        <h5 class="mr-5 mt-2"><strong>Paid in Total: </strong>
                                           Php {{ $std_total_paid }}.00
                                        </h5>

                                    </td>
                                </tr>
                                <p></p>
                            </tfoot>
                        </table>
                        <div class="ml-4 mt-3">


                            <p class="mr-5"><strong>Tuition Fee: </strong>Php {{ $tuition_fee }}.00</p>
                            <p><strong>Tuition Fee Discount: </strong>Php {{ $discount }}.00</p>
                            <p class="mr-5"><strong>Miscellaneous Fee: </strong>Php {{ $total_miscellaneous_fee }}.00
                            </p>
                            <hr>
                            <p><strong>Total Tuition Fee: </strong>
                                Php {{ $total_tuition_fee }}.00
                            </p>

                            <br>
                            <p class="h5"><strong>REMAINING BALANCE: </strong>
                                Php {{ $balance }}.00
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        @endif


    </div>

    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Payment </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="student-info">
                        <h5 class="text-center bg-secondary p-2 mb-3">Student Information</h5>
                        <div class="ml-4">
                            <p><strong>Name: </strong> {{ $student->last_name }}, {{ $student->first_name }}
                                {{ $student->middle_name }} {{ $student->suffix }}</p>
                            <p><strong>Learners Reference Number (LRN): </strong> {{ $student->lrn }}</p>
                            
                            <p><strong>Grade Level: </strong> {{ $student->yearlevel->yearlevel }}</p>
                            <p><strong>Course: </strong> {{ $student->course->course }}</p>
                        </div>


                        <hr>
                        <h5 class="text-center bg-secondary p-2 my-3">Payment</h5>
                        <div class="ml-4">
                            <form action="{{ route('addTuitionPayment.store', $student->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <input type="number" class="form-control" name="student_id" placeholder="student_id"
                                        hidden value={{ $student->id }}>
                                </div>

                                <div class="form-group">
                                    <input type="number" class="form-control" name="discount" placeholder="discount"
                                        value="0" hidden>
                                </div>

                                <div class="form-group">
                                    <label for="payment_amount"><span class="text-danger h5">*</span> Payment Amount</label>
                                    <input type="number" class="form-control" name="payment_amount" placeholder="Amount"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="payment_amount"><span class="text-danger h5">*</span> Payment Method</label>
                                    <input type="text" class="form-control" name="payment_method"
                                        placeholder="Input payment method here (e.g. Cash, Gcash, etc.)" required>
                                </div>
                                <div class="form-group">
                                    <label for="payment_amount">Reference/Transaction Number <i>(If not paid in
                                            cash)</i></label>
                                    <input type="text" class="form-control" name="ref_num"
                                        placeholder="Input reference number">
                                </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#myModal").modal('show');
        });
    </script>

@endsection
