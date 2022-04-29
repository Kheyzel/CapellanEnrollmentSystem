@extends('layouts.app')

@section('breadcrumb')
    <div class="col-12 ">
        <div class="d-flex align-items-center justify-content-between mx-5 mt-2">
            <h4>Payment</h4>          
            {{-- <div>
                <a class = "btn btn-sm btn-primary" href="{{route('registerStudent.index')}}">Register Student</a>
                <a class = "btn btn-sm btn-primary" href="{{route('registerStudent.import')}}">Import Student</a>
            </div> --}}
        </div>
    </div>
@endsection

    <!-- Data Tables -->
    @section('dataTablesCSS')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
    @endsection

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5>Enrollment for Grade 11</h5>
            </div>
            <div class="card-body">
                <table class="table table-hover borderless table-borderless" id = "example">
                    <thead>
                        <tr>
                            <th>Action</th>
                            <th>Status</th>
                            <th>Name</th>
                            <th>Grade</th>
                            <th>Strand</th>
                            <th>Contact Number</th>
                            <th>Email Address</th>
                        </tr>
                    </thead>
                    <tbody>
                         @foreach ($students as $student)
                        <tr>      
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn btn-secondary" data-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-three-dots-vertical">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                                <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                              </svg>
                                        </i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="{{route('enrollment.create', $student->id)}}">Confirm Enrollment</a>
                                        {{-- <a class="dropdown-item" href="#">Delete Student</a> --}}
                                        {{-- <form action="{{ route('enrollment.destroy', $student->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to delete this entry?')">Delete Student</button>
                                        </form> --}}
                                        {{-- <button type="button" class="dropdown-item" data-toggle="modal" data-target="#modal-delete">Delete Student</button> --}}
                                        <button type="button" class="dropdown-item student-delete" data-toggle="modal" 
                                                data-target=".delete" data-uid="{{ $student->id }}">Delete
                                                Student</button>
                                    </div>                                        
                                </div>
                            </td>  
                            <td>{{$student->enroll_status}}</td>
                            <td>{{$student->last_name}}, {{$student->first_name}} {{$student->middle_name}} {{$student->suffix}}</td>
                            <td>{{$student->yearlevel->yearlevel}}</td>
                            <td>{{$student->course->course}}</td>
                            <td>{{$student->contact_num}}</td>
                            <td>{{$student->email_ad}}</td>
                        </tr>
                         @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>

        @if ($students == null)
        @else
            <!-

        <!-- Delete Modal -->
    <div class="modal fade  delete" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="modal-delete" aria-hidden="true">
        <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
            <div class="modal-content bg-gradient-light">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-notification">NOTICE</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="py-3 text-center">
                        <i class="ni ni-fat-remove ni-3x"></i>
                        <h4 class="heading mt-4">Are you sure you want to delete this student?</h4>
                       
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link text-dark ml-auto" data-dismiss="modal">Close</button>
                    <form method="POST" id="delete">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-white">Delete Student</button>
                            </form>


                    {{-- <a class="dropdown-item" href="#">Delete Student</a> --}}
                                        {{-- <form action="{{ route('enrollment.destroy', $student->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to delete this entry?')">Delete Student</button>
                                        </form> --}}
                    
                </div>
            </div>
        </div>
    </div>

    @endif
    </div>

   
    

@endsection
@section('dataTablesJS')
<!-- script -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script>
    $(document).ready(function() {
    $('#example').DataTable();
} );

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('.student-delete').each(function() {
                $(this).click(function(event) {
                    $('#delete').attr("action", "/enrollment/deleteStudent/" + $(this).data('uid') +
                        "");

                });
            });
        });
    </script>
</script>
@endsection