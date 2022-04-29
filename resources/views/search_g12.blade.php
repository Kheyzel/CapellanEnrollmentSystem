@extends('reports.registrarReport.yearlyStudentsReport.index')

@section('dataTablesCSS')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
@endsection

@section('studentsTable_g12')



    <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5>Grade 12 Students </h5>
        <p class = "btn btn-success btn-md mr-3">S.Y. {{$school_year}}</p>
    </div>
    <div class="card-body">
        <table class="table table-hover borderless table-borderless" id = "example">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Strand</th>
                    <th scope="col">Student Number</th>
                    <th scope="col">Contact Number</th>
                    <th scope="col">E-mail Address</th>
                    <th>Year Enrolled</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)    
                <tr>
                    
                    <td>{{$student->last_name}}, {{$student->first_name}} {{$student->middle_name}} {{$student->suffix}}</td>
                    <td>{{$student->course->course}}</td>
                    <td>{{$student->student_num}}</td>
                    <td>{{$student->contact_num}}</td>
                    <td>{{$student->email_ad}}</td>
                    <td>{{$student->school_year}}</td>
                    
                </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
</div>

 


@endsection


@section('dataTablesJS')
    <!-- script -->

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>

    <script>
        jQuery(document).ready(function($) {
            $('#example').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    {
                extend: 'excelHtml5',
                title: 'CIT San Pablo - Grade 12 Students List (S.Y. {{ $student->school_year }})'
            },
            {
                extend: 'pdfHtml5',
                title: 'CIT San Pablo - Grade 12 Students List (S.Y. {{ $student->school_year }})'
            },
            {
                extend: 'csvHtml5',
                title: 'CIT San Pablo - Grade 12 Students List (S.Y. {{ $student->school_year }})'
            },
            {
                 extend: 'copy',
                 title: 'CIT San Pablo - Grade 12 Students List (S.Y. {{ $student->school_year }})'
            },
            {
                 extend: 'print',
                 title: 'CIT San Pablo - Grade 12 Students List (S.Y. {{ $student->school_year }})'
             }
                ],
            });

        });
    </script>
@endsection



