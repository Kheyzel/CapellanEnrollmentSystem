@extends('layouts.app')


@section('breadcrumb')
    <div class="col-12 ">
        <div class="d-flex align-items-center justify-content-between mx-5 mt-2">
            <h4>System Maintenance</h4>
        </div>
    </div>
@endsection

@section('content')

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

@endsection
