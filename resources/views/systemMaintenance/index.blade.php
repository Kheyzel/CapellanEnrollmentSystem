@extends('layouts.app')


@section('breadcrumb')
    <div class="col-12 ">
        <div class="d-flex align-items-center justify-content-between mx-5 mt-2">
            <h4>System Maintenance</h4>
        </div>
    </div>
@endsection

@section('content')

    {{-- <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5>School Year</h5>
            </div>
            <div class="card-body">
                <h1 class="text-danger text-center">Active School Year</h1>
                <h2 class="text-success text-center">{{ $school_year->school_year }}</h2>
                <div class="row">
                    <div class="col text-center mt-3">
                        <button type="button" class="btn btn-primary text-center" data-toggle="modal"
                            data-target="#editSchoolYear">
                            Edit School Year
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="row">
        <div class="col col-lg-4 col-md-6 col-sm-12 d-flex justify-content-around">
            <div class="card text-center" style="width: 18rem;">
                <img src="{{ asset('../img/schoolyr.png')}}" class="card-img-top" alt="school-img">
                <div class="card-body">
                    <h5 class="card-title text-center">Active School Year</h5>
                    <h4 class="text-primary text-center pb-2">{{ $school_year->school_year }}</h4>
                    <a class="btn btn-primary text-white" data-toggle="modal"
                    data-target="#editSchoolYear">Edit School Year</a>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5>Tuition</h5>
            </div>
            <div class="card-body">
                <table class="table table-hover borderless table-borderless" id="myTable">

                </table>
            </div>
        </div>
    </div> --}}

    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between pr-5">
                    <h5>Miscellaneous</h5>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                        Add Miscellaneous
                    </button>
                </div>
            </div>
            <div class="card-body">
                {{-- <img src="{{ asset('../img/miscellanous.png')}}" class="card-img-top text-center" style="width: 200px" alt="school-img"> --}}
                <table class="table table-hover borderless table-borderless" id="myTable">
                    <tr>
                        <th>Description</th>
                        <th>Amount</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($miscellaneousfee as $fee)
                        <tr>
                            <td>
                                {{ $fee->description }}
                            </td>
                            <td>
                                {{ $fee->amount }}
                            </td>
                            <td>

                                <form action="{{ route('miscellaneous.delete', $fee->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip"
                                        title="Delete">Delete</button>
                                </form>

                            </td>
                        </tr>

                    @endforeach
                </table>
            </div>
        </div>
    </div>



    <!-- Modal for miscellaneous store-->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Miscellaneous Fee</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="{{ route('miscellaneous.store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="text-input">Description</label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="description" placeholder="Description">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="text-input">Amount</label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="amount" placeholder="Amount">
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for edit active school year-->
    <div class="modal fade" id="editSchoolYear" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit School Year</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <form action="{{ route('schoolyear.update', $school_year->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label" for="text-input">New School Year</label>
                                <div class="col-md-8">
                                    <input class="form-control" type="text" name="school_year"
                                        placeholder="Enter School Year">
                                </div>
                            </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="swal-overlay" tabindex="-1"> 
        <div class="swal-modal" role="dialog" aria-modal="true">
            <div class="swal-text" style="">Your imaginary file is safe!</div>
            <div class="swal-footer">
                <div class="swal-button-container">

                    <button class="swal-button swal-button--confirm">OK</button>

                    <div class="swal-button__loader">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>

                </div>
            </div>
        </div>
    </div>--}}
@endsection
