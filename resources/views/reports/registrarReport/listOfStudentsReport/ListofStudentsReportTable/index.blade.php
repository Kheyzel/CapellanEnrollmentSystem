@extends('reports.registrarReport.listOfStudentsReport.index')

@section('dataTablesCSS')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
@endsection

@section('ListofStudentsReportTable')

            <div class="card">
                <div class="card-header">
                    <h5>{{$yearcourse}}</h5>
                </div>
                <div class="card-body">
                    <table class="table table-hover borderless table-borderless" id = "example">
                        <thead>
                            <tr>
                               
                                <th scope="col">Student Name</th>
                                <th scope="col">Gender</th>
                           
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($students as $student)
                            <tr>
                                <td>{{$student->last_name}}, {{$student->first_name}} {{$student->middle_name}} {{$student->suffix}}</td>
                                <td>{{$student->sex}}</td>
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
                title: 'CIT San Pablo - General Students` List'
            },
            {
                extend: 'pdfHtml5',
                title: 'CIT San Pablo - General Students` List'
            },
            {
                extend: 'csvHtml5',
                title: 'CIT San Pablo - General Students` List'
            },
            {
                 extend: 'copy',
                 title: 'CIT San Pablo - General Students` List'
            },
            {
                 extend: 'print',
                 title: 'CIT San Pablo - General Students` List'
             }
                ],
            });

        });
    </script>
@endsection
