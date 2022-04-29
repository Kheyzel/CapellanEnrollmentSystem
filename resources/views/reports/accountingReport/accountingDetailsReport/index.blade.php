@extends('reports.accountingReport.index')


@section('dataTablesCSS')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
@endsection

@section('accountingDetailsReport')

    <div class="card">
        <div class="card-header">
            <h5>{{ $yearcourse }}</h5>
        </div>
        <div class="card-body">
            <table class="table table-hover borderless table-borderless" id="example">
                <thead>
                    <tr>

                        <th scope="col">Student Name</th>
                        <th scope="col">Grade & Strand</th>
                        <th scope="col">Paid in Total</th>
                        <th scope="col">Remaining Balance</th>

                    </tr>
                </thead>
                <tbody>



                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->last_name }}, {{ $student->first_name }} {{ $student->middle_name }}
                                {{ $student->suffix }}</td>
                            <td>{{ $student->yearlevel->yearlevel }} - {{ $student->course->course }}</td>

                            <td>
                                @foreach ($student->Tuitionpayment->where('student_id', $student->id) as $item)

                                    <!-- Use the first loop to show only one data -->
                                    @if ($loop->first)
                                        {{ $item->where('student_id', $student->id)->where('yearlevel_payment', $student->yearlevel->id)->sum('payment_amount') }}
                                    @endif

                                @endforeach
                            </td>

                            <td>


                                @foreach ($student->Tuitionpayment->where('student_id', $student->id) as $item)


                                    <!-- Use the first loop to show only one data -->
                                    @if ($loop->first)

                                    <!-- get back from tution to student model -->
                                        @if ($item->student->yearlevel_id === 1)

                                            @if ($item->discount_type == 'Transferee')
                                                {{-- <h1>{{$tuition_fee->where('student_id', $student->id)->sum('amount')}}</h1> --}}
                                                {{ $tuition_fee->where('student_id', $student->id)->sum('amount') -
                                                    $item->where('student_id', $student->id)->where('yearlevel_payment', $student->yearlevel->id)->sum('payment_amount') -
                                                    $item->where('student_id', $student->id)->where('yearlevel_payment', $student->yearlevel->id)->distinct()->sum('discount')}}
                                            @else
                                                {{ 19400 -
                                                    $item->where('student_id', $student->id)->where('yearlevel_payment', $student->yearlevel->id)->sum('payment_amount') -
                                                    $item->where('student_id', $student->id)->where('yearlevel_payment', $student->yearlevel->id)->distinct()->sum('discount') +
                                                    $miscellaneous_fee->where('year_level', $student->yearlevel_id)->where('school_year', $student->school_year)->sum('amount') }}

                                            @endif
                                        @else

                                            @if ($item->discount_type == 'Transferee')
                                                {{ $tuition_fee->where('student_id', $student->id)->sum('amount') -
                                                    $item->where('student_id', $student->id)->where('yearlevel_payment', $student->yearlevel->id)->sum('payment_amount') -
                                                    $item->where('student_id', $student->id)->where('yearlevel_payment', $student->yearlevel->id)->distinct()->sum('discount')}}
                                            @else
                                                {{ 19400 -
                                                    $item->where('student_id', $student->id)->where('yearlevel_payment', $student->yearlevel->id)->sum('payment_amount') -
                                                    $item->where('student_id', $student->id)->where('yearlevel_payment', $student->yearlevel->id)->distinct()->sum('discount') +
                                                    $miscellaneous_fee->where('year_level', $student->yearlevel_id)->where('school_year', $student->school_year_g12)->sum('amount') }}

                                            @endif

                                        @endif


                                    @endif
                                @endforeach

                            </td>
                            {{-- {{$miscellaneous_fee->where('year_level',$student->yearlevel_id)->sum('amount');}} --}}
                            {{-- <h1>{{$miscellaneous_fee->where('year_level',$student->yearlevel_id)->sum('amount')}}</h1> --}}




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
                buttons: [{
                        extend: 'excelHtml5',
                        title: 'Capellan Institute of Technology - San Pablo'
                    },
                    {
                        extend: 'pdfHtml5',
                        title: 'Capellan Institute of Technology - San Pablo'
                    },
                    {
                        extend: 'csvHtml5',
                        title: 'Capellan Institute of Technology - San Pablo'
                    },
                    {
                        extend: 'copy',
                        title: 'Capellan Institute of Technology - San Pablo'
                    },
                    {
                        extend: 'print',
                        title: 'Capellan Institute of Technology - San Pablo'
                    }
                ],
            });

        });
    </script>
@endsection
