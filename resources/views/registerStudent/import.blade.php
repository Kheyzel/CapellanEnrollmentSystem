@extends('layouts.app')


@section('breadcrumb')
    <div class="d-flex align-items-center ml-4 mx-5">
        <h4>Registration</h4>
    </div>
@endsection

@section('content')

    <div class="container-fluid">

        <div class="card">
            <div class="card-header">
                <h5>Import Student</h5>
            </div>
            <div class="section-body">

                {{-- @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if (session()->has('failures'))

                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <p>Excel file imported successfully</p>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="card-body">
                    <form action="{{ route('importStudent.import') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label class="h3 col-md-3 col-form-label " for="text-input"><span class="text-danger">*</span>
                                Import Excel</label>
                            <div class="col-md-9 center-block">
                                <input class="form-control" type="file" name="student_excel" placeholder="Import Excel"
                                    required>
                            </div>
                        </div>

                        <button class="btn btn-md btn-primary mr-3" type="submit"> Import</button>

                    </form>


                </div> --}}





                <div class="card border-primary mx-auto my-4" style="max-width: 50rem;">
                    <div class="card-header bg-secondary h4 ml-0"><span class="text-danger">*</span>Import Excel</div>
                    <div class="card-body text-info">
                      
                        @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
    
                    @if (session()->has('failures'))
    
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <p>Excel file imported successfully</p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
    
                    <div class="card-body">
                        <form action="{{ route('importStudent.import') }}" method="post" enctype="multipart/form-data">
                            @csrf
    
                            <div class="form-group">
                                <div class="col-md-9 center-block">
                                    <input class="form-control" type="file" name="student_excel" placeholder="Import Excel" accept=".xls,.xlsx"
                                        required>
                                </div>
                            </div>
    
                            {{-- <button class="btn btn-md btn-primary mr-3" type="submit"> Import</button> --}}
    
                        
    
    
                    </div>

                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-md btn-primary mr-3" type="submit"> Import</button>
                    </div>
                </form>
                </div>



                @if (session()->has('failures'))

                <div class="card" id="border-blue">
                    {{-- <div class="card-header">
                        <h4 class="text-center">Failed to Import Students</h4>
                    </div> --}}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 d-flex justify-content-center">
                                <div class="col-9">
                                    <h5 class="text-center pb-2 text-danger font-weight-bold">Failed to Import Students</h5>
    
                                    <table class="table table-danger">
                                        <tr>
                                            <th>Row</th>
                                            <th>Students</th>
                                            <th>Errors</th>
                                        </tr>
    
                                        @foreach (session()->get('failures') as $validation)
                                            <tr>
                                                <td>{{ $validation->row() }}</td>
                                                <td>Students with LRN {{ $validation->values()[$validation->attribute()] }}
                                                </td>
                                                <td>
                                                    Student is already registered
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
    
    
            @endif


            </div>

        </div>

       
    </div>
@endsection
