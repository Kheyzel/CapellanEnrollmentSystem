@extends('layouts.app')

@section('breadcrumb')
    <div class="col-12 ">
        <div class="d-flex align-items-center justify-content-between mx-5 mt-2">
            <h4>Payment</h4>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        @if (Session::has('Fileadded'))
            {{-- <div class="row">
                        <div class="col-12">
                            <div class="alert alert-danger" role="alert">
                               <p class="text-center">{{ Session::get('Fileadded') }}</p> 
                               <p class="text-center">Please repeat the process. Thank you.</p>
                              </div>
                          
                        </div>
                    </div> --}}

            <div class="alert alert-danger alert-dismissable">
                <a class="panel-close close" data-dismiss="alert">×</a>
                <p class="text-center">
                    <strong> {{ Session::get('Fileadded') }} </strong> <br> Please repeat the process. Thank you.
                </p>
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between mx-5">
                    <h4 class="mb-0">Enrollment Payment</h4>
                    @if ($student->transferee != 'Yes')
                        <div>
                            <select class="custom-select custom-select-sm" id="inputGroupSelect01">
                                <option selected disabled> Choose Payment Option</option>
                                <option value="fullpayment">Fullpayment</option>
                                <option value="installment">Installment</option>
                            </select>
                        </div>
                    @endif
                </div>
            </div>

            <div class="card-body">
                @if ($student->transferee === 'No')

                    @if ($student->school_type === 'Public')

                        {{-- fullpayment --}}
                        <div class="fullpayment box">
                            <div class="ml-5">
                                <h3 class="text-center">Student Information</h3>
                                <p class=" font-weight-bold">Student Name :
                                    <span class="text-primary">
                                        {{ $student->last_name }}, {{ $student->first_name }}
                                        {{ $student->middle_name }}
                                    </span>
                                </p>
                                <p class=" font-weight-bold">Grade/Course:
                                    <span class="text-primary">
                                        {{ $student->yearlevel->yearlevel }} - {{ $student->course->course }}
                                    </span>
                                </p>
                                <p class=" font-weight-bold">Learners Reference Number (LRN):
                                    <span class="text-primary">
                                        {{ $student->lrn }}
                                    </span>
                                </p>
                                <p class=" font-weight-bold">Previous School Type:
                                    <span class="text-primary">
                                        {{ $student->school_type }}
                                    </span>
                                </p>

                                <p class=" font-weight-bold">Discount Type:
                                    <span class="text-primary">
                                        Public-School Graduates: Voucher Recipient
                                    </span>
                                </p>
                                <br>

                                <div class="border border-dark p-3 mr-5">
                                    <div class="p-3">
                                        <h3 class=" text-center">Payment Summary</h3>
                                        <p class=" font-weight-bold m-0 p-1">Tuition Fee:
                                            <span class="text-primary">
                                                Php 19400.00
                                            </span>
                                        </p>
                                        <p class=" font-weight-bold m-0 p-1">Miscellaneous Fee:
                                            <span class="text-primary">
                                                Php {{ $total_miscellaneous_fee }}.00
                                            </span>
                                        </p>
                                        <p class=" font-weight-bold m-0 p-1">Discount Amount:
                                            <span class="text-primary">
                                                Php {{ $discount }}.00
                                            </span>
                                        </p>

                                        <hr style="border-color: white">

                                        <p class=" font-weight-bold m-0 p-1">Discounted Tuition Fee:
                                            <span class="text-primary">
                                                &nbsp;Php 1900.00
                                            </span>
                                        </p>

                                        <div class="row">
                                            <div class="col-12">
                                                <p class=" font-weight-bold m-0 p-1 h4 d-flex justify-content-end">Total
                                                    Tuition Fee: 
                                                    <span class="text-primary">
                                                        &nbsp;Php {{ $total_tuition_fee }}.00
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>


                                    <form action="{{ route('enrollment.store', $student->id) }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('POST')
                                        <div class="form-group">
                                            <input type="number" class="form-control" name="student_id"
                                                placeholder="student_id" hidden value={{ $student->id }}>
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control" name="mode_of_payment"
                                                placeholder="mode_of_payment" value="Fullpayment" hidden>
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control" name="discount_type"
                                                placeholder="discount_type" value=" Public School Voucher" hidden>
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control" name="discount"
                                                placeholder="discount" value="{{ $discount }}" hidden>
                                        </div>

                                        <div class="form-group">
                                            <input type="number" class="form-control" name="payment_amount"
                                                placeholder="Amount" value="{{ 1900 + $total_miscellaneous_fee }}"
                                                hidden>
                                        </div>
                                        <hr class="pb-3">
                                        <div class="row mt-3">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="payment_amount"> <strong> Payment Method
                                                            <i class="text-danger">*required</i></strong></label>
                                                    <input type="text" class="form-control" name="payment_method"
                                                        placeholder="Input payment method here (e.g. Cash, Gcash, etc.)"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="payment_amount"> <strong> Reference/Transaction Number
                                                            <i>(If
                                                                not
                                                                paid in cash)</i> </strong></label>
                                                    <input type="text" class="form-control" name="ref_num"
                                                        placeholder="Input reference number">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12 d-flex justify-content-center p-4">
                                                <a class="btn btn-danger mr-3">Cancel</a>
                                                <button class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                </div>
                                </form>
                            </div>
                        </div>

                        {{-- installment --}}
                        <div class="installment box">
                            <form action="{{ route('enrollment.store', $student->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div class="ml-5">
                                    <h3 class="text-center">Student Information</h3>
                                    <p class=" font-weight-bold">Student Name :
                                        <span class="text-primary">
                                            {{ $student->last_name }}, {{ $student->first_name }}
                                            {{ $student->middle_name }}
                                        </span>
                                    </p>
                                    <p class=" font-weight-bold">Grade/Course:
                                        <span class="text-primary">
                                            {{ $student->yearlevel->yearlevel }} - {{ $student->course->course }}
                                        </span>
                                    </p>
                                    <p class=" font-weight-bold">Learners Reference Number (LRN):
                                        <span class="text-primary">
                                            {{ $student->lrn }}
                                        </span>
                                    </p>
                                    <p class=" font-weight-bold">Previous School Type:
                                        <span class="text-primary">
                                            {{ $student->school_type }}
                                        </span>
                                    </p>

                                    <p class=" font-weight-bold">Discount Type:
                                        <span class="text-primary">
                                            Public-School Graduates: Voucher Recipient
                                        </span>
                                    </p>
                                    <br>
                                    <div class="border border-dark p-3 mr-5">
                                        <div class="p-3">
                                            <h3 class=" text-center">Payment Summary</h3>


                                            <p class=" font-weight-bold m-0 p-1">Tuition Fee: <span class="text-primary">
                                                    Php 19400.00</span>
                                            </p>
                                            <p class=" font-weight-bold m-0 p-1">Miscellaneous Fee: <span
                                                    class="text-primary">
                                                   Php {{ $total_miscellaneous_fee }}.00</span>
                                            </p>
                                            <p class=" font-weight-bold m-0 p-1">Discount Amount:<span
                                                    class="text-primary">
                                                    Php {{ $discount }}.00
                                                </span></p>
                                            <hr style="border-color: white">
                                            <p class=" font-weight-bold m-0 p-1">Discounted Tuition Fee:<span
                                                    class="text-primary">&nbsp;Php 1900.00</span>
                                            </p>

                                            <div class="row">
                                                <div class="col-12">
                                                    <p class=" font-weight-bold m-0 p-1 h4 d-flex justify-content-end">Total
                                                        Tuition Fee: <span class="text-primary">
                                                            &nbsp;Php {{ $total_tuition_fee }}.00</span></p>

                                                </div>
                                            </div>

                                        </div>


                                        <hr>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="d-flex justify-content-center">
                                                    <div class="form-group">
                                                        <label class=" font-weight-bold h5"> ENTER PAYMENT AMOUNT
                                                            <i class="text-danger">*required</i></label>
                                                        <input type="number" class="form-control form-control-sm"
                                                            name="payment_amount" placeholder="Amount" required>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="payment_amount"> <strong> Payment Method <i
                                                                class="text-danger">*required</i>
                                                        </strong></label>
                                                    <input type="text" class="form-control" name="payment_method"
                                                        placeholder="Input payment method here (e.g. Cash, Gcash, etc.)"
                                                        required>
                                                </div>
                                            </div>


                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="payment_amount"> <strong> Reference/Transaction Number
                                                            <i>(If
                                                                not
                                                                paid in cash)</i> </strong></label>
                                                    <input type="text" class="form-control" name="ref_num"
                                                        placeholder="Input reference number">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    {{-- <div class="d-flex justify-content-center"> --}}

                                    {{-- <div class="py-3 px-5"> --}}
                                    <div class="form-group">
                                        <input type="number" class="form-control" name="student_id"
                                            placeholder="student_id" hidden value={{ $student->id }}>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" name="mode_of_payment"
                                            placeholder="mode_of_payment" value="Installment" hidden>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" name="discount_type"
                                            placeholder="discount_type" value=" Public School Voucher" hidden>
                                    </div>

                                    <div class="form-group">
                                        <input type="number" class="form-control" name="discount" placeholder="discount"
                                            value="{{ $discount }}" hidden>
                                    </div>









                                    {{-- </div> --}}
                                    <div class="col-12 container d-flex justify-content-end ">
                                        <button class="btn btn-primary mt-4 mr-5">Submit</button>
                                    </div>
                            </form>
                        </div>


                        {{-- payment of private --}}
                    @elseif($student->school_type === 'Private')

                        {{-- fullpayment --}}
                        <div class="fullpayment box">
                            <div class="ml-5">
                                <h3 class="text-center">Student Information</h3>
                                <p class=" font-weight-bold">Student Name :
                                    <span class="text-primary">
                                        {{ $student->last_name }}, {{ $student->first_name }}
                                        {{ $student->middle_name }}
                                    </span>
                                </p>
                                <p class=" font-weight-bold">Grade/Course:
                                    <span class="text-primary">
                                        {{ $student->yearlevel->yearlevel }} - {{ $student->course->course }}
                                    </span>
                                </p>
                                <p class=" font-weight-bold">Learners Reference Number (LRN):
                                    <span class="text-primary">
                                        {{ $student->lrn }}
                                    </span>
                                </p>
                                <p class=" font-weight-bold">Previous School Type:
                                    <span class="text-primary">
                                        {{ $student->school_type }}
                                    </span>
                                </p>

                                <p class=" font-weight-bold">Discount Type:
                                    <span class="text-primary">
                                        Private-School Graduates: ESC Voucher Recipient
                                    </span>
                                </p>
                                <br>

                                <div class="border border-dark p-3 mr-5">
                                    <div class="p-3">
                                        <h3 class=" text-center">Payment Summary</h3>
                                        <p class=" font-weight-bold m-0 p-1">Tuition Fee:
                                            <span class="text-primary">
                                                Php 19400.00
                                            </span>
                                        </p>
                                        <p class=" font-weight-bold m-0 p-1">Miscellaneous Fee:
                                            <span class="text-primary">
                                               Php {{ $total_miscellaneous_fee }}.00
                                            </span>
                                        </p>
                                        <p class=" font-weight-bold m-0 p-1">Discount Amount:
                                            <span class="text-primary">
                                               Php {{ $discount }}.00
                                            </span>
                                        </p>

                                        <hr style="border-color: white">

                                        <p class=" font-weight-bold m-0 p-1">Discounted Tuition Fee:
                                            <span class="text-primary">
                                                &nbsp;Php 5400.00
                                            </span>
                                        </p>

                                        <div class="row">
                                            <div class="col-12">
                                                <p class=" font-weight-bold m-0 p-1 h4 d-flex justify-content-end">Total
                                                    Tuition Fee:
                                                    <span class="text-primary">
                                                        &nbsp;Php {{ $total_tuition_fee }}.00
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>


                                    <form action="{{ route('enrollment.store', $student->id) }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('POST')
                                        <div class="form-group">
                                            <input type="number" class="form-control" name="student_id"
                                                placeholder="student_id" hidden value={{ $student->id }}>
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control" name="mode_of_payment"
                                                placeholder="mode_of_payment" value="Fullpayment" hidden>
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control" name="discount_type"
                                                placeholder="discount_type" value="ESC Voucher" hidden>
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control" name="discount"
                                                placeholder="discount" value="{{ $discount }}" hidden>
                                        </div>

                                        <div class="form-group">
                                            <input type="number" class="form-control" name="payment_amount"
                                                placeholder="Amount" value="{{ 5400 + $total_miscellaneous_fee }}"
                                                hidden>
                                        </div>
                                        <hr class="pb-3">
                                        <div class="row mt-3">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="payment_amount"> <strong> Payment Method
                                                            <i class="text-danger">*required</i></strong></label>
                                                    <input type="text" class="form-control" name="payment_method"
                                                        placeholder="Input payment method here (e.g. Cash, Gcash, etc.)"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="payment_amount"> <strong> Reference/Transaction Number
                                                            <i>(If
                                                                not
                                                                paid in cash)</i> </strong></label>
                                                    <input type="text" class="form-control" name="ref_num"
                                                        placeholder="Input reference number">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12 d-flex justify-content-center p-4">
                                                <a class="btn btn-danger mr-3">Cancel</a>
                                                <button class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- installment --}}
                        <div class="installment box">
                            <form action="{{ route('enrollment.store', $student->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div class="ml-5">
                                    <h3 class="text-center">Student Information</h3>
                                    <p class=" font-weight-bold">Student Name : <span class="text-primary">
                                            {{ $student->last_name }}, {{ $student->first_name }}
                                            {{ $student->middle_name }}</span></p>
                                    <p class=" font-weight-bold">Grade/Course: <span class="text-primary">
                                            {{ $student->yearlevel->yearlevel }} -
                                            {{ $student->course->course }}</span></p>
                                    <p class=" font-weight-bold">Learners Reference Number (LRN): <span
                                            class="text-primary">
                                            {{ $student->lrn }}</span></p>
                                    <p class=" font-weight-bold">Previous School Type: <span class="text-primary">
                                            {{ $student->school_type }} </span></p>

                                    <p class=" font-weight-bold">Discount Type: <span class="text-primary">
                                            Private-School Graduates: ESC Voucher Recipient </span> </p>
                                    <br>
                                    <div class="border border-dark p-3 mr-5">
                                        <h3 class=" text-center">Payment Summary</h3>

                                        <p class=" font-weight-bold mb-1">Discount Amount: <span class="text-primary">
                                                Php {{ $discount }}.00</span></p>


                                        <p class=" font-weight-bold pb-3">Tuition Fee: <span class="text-primary">
                                                Php 19400.00</span>
                                        </p>
                                        <p class=" font-weight-bold mb-1">Discounted Tuition Fee:<span
                                                class="text-primary">
                                                &nbsp;Php 5400.00</span>
                                        </p>
                                        <p class=" font-weight-bold">Miscellaneous Fee: <span class="text-primary">
                                               Php {{ $total_miscellaneous_fee }}.00</span>
                                        </p>


                                        <p class=" font-weight-bold">Total Tuition Fee: <span class="text-primary">
                                            &nbsp;Php {{ $total_tuition_fee }}.00</span>
                                        </p>
                                        <hr>
                                        <div class="row">

                                            <div class="col-12">
                                                <div class="d-flex justify-content-center">
                                                    <div class="form-group">
                                                        <label class=" font-weight-bold h5"> ENTER PAYMENT AMOUNT
                                                            <i class="text-danger">*required</i>
                                                        </label>
                                                        <input type="number" class="form-control form-control-sm"
                                                            name="payment_amount" placeholder="Amount" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="payment_amount"> <strong> Payment Method <i
                                                                class="text_danger">*required</i>
                                                        </strong></label>
                                                    <input type="text" class="form-control" name="payment_method"
                                                        placeholder="Input payment method here (e.g. Cash, Gcash, etc.)"
                                                        required>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="payment_amount"> <strong> Reference/Transaction Number
                                                            <i>(If
                                                                not
                                                                paid in cash)</i> </strong></label>
                                                    <input type="text" class="form-control" name="ref_num"
                                                        placeholder="Input reference number">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="d-flex justify-content-center"> --}}


                                    <div class="form-group">
                                        <input type="number" class="form-control" name="student_id"
                                            placeholder="student_id" hidden value={{ $student->id }}>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" name="mode_of_payment"
                                            placeholder="mode_of_payment" value="Installment" hidden>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" name="discount_type"
                                            placeholder="discount_type" value=" ESC Voucher" hidden>
                                    </div>

                                    <div class="form-group">
                                        <input type="number" class="form-control" name="discount" placeholder="discount"
                                            value="14000" hidden>
                                    </div>

                                    <div class="col-12 container d-flex justify-content-end ">
                                        <button class="btn btn-primary mt-4 mr-5">Submit</button>
                                    </div>
                            </form>
                        </div>


                        {{-- payment of ALS --}}
                    @elseif($student->school_type === 'ALS')

                        {{-- fullpament --}}
                        <div class="fullpayment box">
                            <div class="ml-5">
                                <h3 class="text-center">Student Information</h3>
                                <p class=" font-weight-bold">Student Name :
                                    <span class="text-primary">
                                        {{ $student->last_name }}, {{ $student->first_name }}
                                        {{ $student->middle_name }}
                                    </span>
                                </p>
                                <p class=" font-weight-bold">Grade/Course:
                                    <span class="text-primary">
                                        {{ $student->yearlevel->yearlevel }} - {{ $student->course->course }}
                                    </span>
                                </p>
                                <p class=" font-weight-bold">Learners Reference Number (LRN):

                                    <span class="text-primary">
                                        {{ $student->lrn }}
                                    </span>
                                </p>

                                <p class=" font-weight-bold">Previous School Type:
                                    <span class="text-primary">
                                        {{ $student->school_type }}
                                    </span>
                                </p>

                                <p class=" font-weight-bold">Discount Type:
                                    <span class="text-primary">
                                        ALS Graduates: OVAP Voucher Recipient
                                    </span>
                                </p>
                                <br>

                                <div class="border border-dark p-3 mr-5">
                                    <div class="p-3">
                                        <h3 class=" text-center">Payment Summary</h3>
                                        <p class=" font-weight-bold m-0 p-1">Tuition Fee:
                                            <span class="text-primary">
                                                Php 19400.00
                                            </span>
                                        </p>
                                        <p class=" font-weight-bold m-0 p-1">Miscellaneous Fee:
                                            <span class="text-primary">
                                                Php {{ $total_miscellaneous_fee }}.00
                                            </span>
                                        </p>
                                        <p class=" font-weight-bold m-0 p-1">Discount Amount:
                                            <span class="text-primary">
                                                Php {{ $discount }}.00
                                            </span>
                                        </p>

                                        <hr style="border-color: white">

                                        <p class=" font-weight-bold m-0 p-1">Discounted Tuition Fee:
                                            <span class="text-primary">
                                                &nbsp;Php 1900.00
                                            </span>
                                        </p>

                                        <div class="row">
                                            <div class="col-12">
                                                <p class=" font-weight-bold m-0 p-1 h4 d-flex justify-content-end">Total
                                                    Tuition Fee:
                                                    <span class="text-primary">
                                                        &nbsp;Php {{ $total_tuition_fee }}.00
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>


                                    <form action="{{ route('enrollment.store', $student->id) }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('POST')
                                        <div class="form-group">
                                            <input type="number" class="form-control" name="student_id"
                                                placeholder="student_id" hidden value={{ $student->id }}>
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control" name="mode_of_payment"
                                                placeholder="mode_of_payment" value="Fullpayment" hidden>
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control" name="discount_type"
                                                placeholder="discount_type" value="OVAP Voucher Recipient" hidden>
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control" name="discount"
                                                placeholder="discount" value="{{ $discount }}" hidden>
                                        </div>

                                        <div class="form-group">
                                            <input type="number" class="form-control" name="payment_amount"
                                                placeholder="Amount" value="{{ 1900 + $total_miscellaneous_fee }}"
                                                hidden>
                                        </div>
                                        <hr class="pb-3">
                                        <div class="row mt-3">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="payment_amount"> <strong> Payment Method
                                                            <i class="text-danger">*required</i></strong></label>
                                                    <input type="text" class="form-control" name="payment_method"
                                                        placeholder="Input payment method here (e.g. Cash, Gcash, etc.)"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="payment_amount"> <strong> Reference/Transaction Number
                                                            <i>(If
                                                                not
                                                                paid in cash)</i> </strong></label>
                                                    <input type="text" class="form-control" name="ref_num"
                                                        placeholder="Input reference number">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12 d-flex justify-content-center p-4">
                                                <a class="btn btn-danger mr-3">Cancel</a>
                                                <button class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                </div>
                                </form>
                            </div>
                        </div>
                        {{-- installment --}}
                        <div class="installment box">
                            <form action="{{ route('enrollment.store', $student->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div class="ml-5">

                                    <h3 class="text-center">Student Information</h3>
                                    <p class=" font-weight-bold">Student Name : <span class="text-primary">
                                            {{ $student->last_name }}, {{ $student->first_name }}
                                            {{ $student->middle_name }}</span></p>
                                    <p class=" font-weight-bold">Grade/Course: <span class="text-primary">
                                            {{ $student->yearlevel->yearlevel }} -
                                            {{ $student->course->course }}</span></p>
                                    <p class=" font-weight-bold">Learners Reference Number (LRN): <span
                                            class="text-primary">
                                            {{ $student->lrn }}</span></p>
                                    <p class=" font-weight-bold">Previous School Type: <span class="text-primary">
                                            {{ $student->school_type }} </span></p>

                                    <p class=" font-weight-bold">Discount Type: <span class="text-primary">
                                            ALS Graduates: OVAP Voucher Recipient </span> </p>
                                    <br>
                                    <div class="border border-dark p-3 mr-5">
                                        <h3 class=" text-center">Payment Summary</h3>

                                        <p class=" font-weight-bold mb-1">Discount Amount:<span class="text-primary">
                                            &nbsp;Php {{ $discount }}.00
                                            </span></p>


                                        <p class=" font-weight-bold pb-3">Tuition Fee: <span class="text-primary">
                                                Php 19400.00</span>
                                        </p>
                                        <p class=" font-weight-bold mb-1">Discounted Tuition Fee:<span
                                                class="text-primary">
                                                &nbsp;Php 1900.00</span>
                                        </p>
                                        <p class=" font-weight-bold">Miscellaneous Fee: <span class="text-primary">
                                               Php {{ $total_miscellaneous_fee }}.00</span>
                                        </p>

                                        <hr style="border-color: white">

                                        <p class=" font-weight-bold">Total Tuition Fee: <span class="text-primary">
                                            &nbsp;Php {{ $total_tuition_fee }}.00</span>
                                        </p>
                                        <hr>

                                        <div class="row">
                                            <div class="col-6">
                                                <div class="d-flex justify-content-center">

                                                    <div class="form-group" style="width: 33vw;">
                                                        <label class=" font-weight-bold h5"> ENTER PAYMENT AMOUNT
                                                            <i class="text-danger">*required</i>
                                                        </label>
                                                        <input type="number" class="form-control form-control-sm"
                                                            name="payment_amount" placeholder="Amount" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <hr>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="payment_amount"> <strong> Payment Method <i
                                                                class="text-danger">*required</i>
                                                        </strong></label>
                                                    <input type="text" class="form-control" name="payment_method"
                                                        placeholder="Input payment method here (e.g. Cash, Gcash, etc.)"
                                                        required>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="payment_amount"> <strong> Reference/Transaction Number
                                                            <i>(If
                                                                not
                                                                paid in cash)</i> </strong></label>
                                                    <input type="text" class="form-control" name="ref_num"
                                                        placeholder="Input reference number">
                                                </div>
                                            </div>
                                        </div>

                                    </div>



                                    <div class="form-group">
                                        <input type="number" class="form-control" name="student_id"
                                            placeholder="student_id" hidden value={{ $student->id }}>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="mode_of_payment"
                                            placeholder="mode_of_payment" value="Installment" hidden>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" name="discount_type"
                                            placeholder="discount_type" value=" OVAP Voucher" hidden>
                                    </div>

                                    <div class="form-group">
                                        <input type="number" class="form-control" name="discount" placeholder="discount"
                                            value="17500" hidden>
                                    </div>

                                    <div class="col-12 container d-flex justify-content-end ">
                                        <button class="btn btn-primary mt-4 mr-5">Submit</button>
                                    </div>
                            </form>
                        </div>

                    @else
                    @endif

                @else
                    <div class="ml-5">
                        <h3 class="text-center text-primary mb-5">Student Information</h3>
                        <div class="mb-5">
                            <p style="font-size: 16px;"> <strong>Student Name :</strong>
                                {{ $student->last_name }}, {{ $student->first_name }}
                                {{ $student->middle_name }}
                            </p>

                            <p style="font-size: 16px;"> <strong>Grade/Course: :</strong>

                                {{ $student->yearlevel->yearlevel }} - {{ $student->course->course }}
                            </p>

                            <p style="font-size: 16px;"> <strong>Learners Reference Number (LRN):</strong>

                                {{ $student->lrn }}
                            </p>
                        </div>

                        <form action="{{ route('enrollment.store_transferee', $student->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="border border-dark p-3 mr-5">
                                <h3 class=" text-center mb-5 text-primary">Payment Summary</h3>


                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">

                                            <label class=" font-weight-bold h5">Enter Total Tuition Fee <i
                                                    class="font-weight-light" style="font-size:16px;"> (Note:
                                                    Please include the
                                                    miscellaneous in computation, if
                                                    there are any.)</i> <span class="text-primary">
                                            </label>
                                            <div class="row">
                                                <div class="col-6">
                                                    <input type="number" class="form-control form-control-sm"
                                                        name="tuition" placeholder="Total Tuition Fee Amount"></span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class=" font-weight-bold h5">Enter Payment Amount
                                                <i>(*required)</i>
                                            </label>
                                            <input type="number" class="form-control form-control-sm" name="payment_amount"
                                                placeholder="Payment Amount" required>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input type="number" class="form-control" name="student_id"
                                                placeholder="student_id" value={{ $student->id }} hidden>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="mode_of_payment"
                                                placeholder="mode_of_payment" value="Installment" hidden>
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control" name="discount_type"
                                                placeholder="discount_type" value="Transferee" hidden>
                                        </div>

                                        <div class="form-group">
                                            <input type="number" class="form-control" name="discount"
                                                placeholder="discount" value="0" hidden>
                                        </div>

                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-6">

                                                <div class="form-group">
                                                    <label for="payment_amount"> <strong> Payment Method
                                                            <i>*required</i>
                                                        </strong></label>
                                                    <input type="text" class="form-control" name="payment_method"
                                                        placeholder="Input payment method here (e.g. Cash, Gcash, etc.)"
                                                        required>
                                                </div>

                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="payment_amount"> <strong> Reference/Transaction
                                                            Number
                                                            <i>(If
                                                                not
                                                                paid
                                                                in
                                                                cash)</i> </strong></label>
                                                    <input type="text" class="form-control" name="ref_num"
                                                        placeholder="Input reference number">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 container d-flex justify-content-end ">
                                    <button class="btn btn-primary mt-4 mr-5">Submit</button>
                                </div>

                        </form>

                    </div>
                @endif
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $("select").change(function() {
                $(this).find("option:selected").each(function() {
                    var optionValue = $(this).attr("value");
                    if (optionValue) {
                        $(".box").not("." + optionValue).hide();
                        $("." + optionValue).show();
                    } else {
                        $(".box").hide();
                    }
                });
            }).change();
        });
    </script>
@endsection
