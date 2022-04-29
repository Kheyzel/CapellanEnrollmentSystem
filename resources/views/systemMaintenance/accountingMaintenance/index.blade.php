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
                <div class="d-flex justify-content-between pr-5">
                    <h5>Miscellaneous</h5>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                        Add Miscellaneous
                    </button>
                </div>
            </div>
            <div class="card-body">
                
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
    </div> --}}


    <div class="container-fluid">
        <div class="card">
            <div class="card-horizontal" style="display: flex; flex: 1 1 auto;">
                <div class="img-square-wrapper d-flex align-items-center">
                    <img class="" src="{{ asset('../img/miscellanous.png') }}" alt="Card image cap"
                        width="300px">
                </div>
                <div class="card-body">
                    <h4 class="card-title">Miscellaneous</h4>
                    {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                    <table class="table table-hover borderless table-borderless" id="myTable">
                        <tr>
                            <th>Grade Level</th>
                            <th>Description</th>
                            <th>Amount</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($miscellaneousfee as $fee)
                        @if ($fee->year_level == 1)
                        <tr>
                            <td>
                                Grade 11
                            </td>
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
                    @endif

                        @endforeach
                    </table>

                    <hr>

                    <table class="table table-hover borderless table-borderless" id="myTable">
                        <tr>
                            <th>Grade Level</th>
                            <th>Description</th>
                            <th>Amount</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($miscellaneousfee as $fee)
                            @if ($fee->year_level == 2)
                                <tr>
                                    <td>
                                        Grade 12
                                    </td>
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
                            @endif
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <div class="text-right" style="padding-right: 20px">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                        Add Miscellaneous
                    </button>
                </div>
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
                            <label class="col-md-3 col-form-label" for="text-input"><span class="text-danger">*</span> Grade Level</label>
                            <div class="col-md-9">
                                <select class="form-control" id="select1" name="year_level" required>
                                    <option selected disabled></option>
                                    <option value="1">Grade 11</option>
                                    <option value="2">Grade 12</option>

                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="text-input"><span class="text-danger">*</span>Description</label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="description" placeholder="Description" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="text-input"><span class="text-danger">*</span>Amount</label>
                            <div class="col-md-9">
                                <input class="form-control" type="number" name="amount" placeholder="Amount" required>
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

@endsection
