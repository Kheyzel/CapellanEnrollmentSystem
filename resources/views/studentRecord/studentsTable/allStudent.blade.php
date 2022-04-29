@extends('studentRecord.index')

    <!-- Data Tables -->
@section('dataTablesCSS')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
@endsection
@section('studentsTable')

<div class="card">
    <div class="card-header">
        <h5>All Students</h5>
    </div>
    <div class="card-body">
        <table class="table table-hover borderless table-borderless" id = "example">
            <thead>
                <tr>
                    <th>Action</th>
                    <th scope="col">Name</th>
                    <th scope="col">Grade</th>
                    <th scope="col">Strand</th>
                    <th scope="col">Student Number</th>
                    <th scope="col">Contact Number</th>
                    <th scope="col">E-mail Address</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)    
                <tr>
                    <td><a href="{{route('student_record.show', $student->id)}}">view</a> </td>
                    <td>{{$student->last_name}}, {{$student->first_name}} {{$student->middle_name}} {{$student->suffix}}</td>
                    <td>{{$student->yearlevel->yearlevel}}</td>
                    <td>{{$student->course->course}}</td>
                    <td>{{$student->student_num}}</td>
                    <td>{{$student->contact_num}}</td>
                    <td>{{$student->email_ad}}</td>
                    
                </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
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
</script>
@endsection