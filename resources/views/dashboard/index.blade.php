@extends('layouts.app')


@section('breadcrumb')
    <div class="d-flex align-items-center ml-4 mx-5">
        <h4>Dashboard</h4>
    </div>
@endsection

@section('content')
    {{-- <div class="container-fluid">
        <div class="card">
            <h1>Dashboard Content</h1>
            <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid placeat alias doloremque quisquam sint aliquam architecto odio sapiente deserunt repellat, fugiat voluptatibus? Omnis est nam eius, aliquam unde nobis fugiat, optio impedit, porro at dolores quisquam corporis ipsum consequatur deserunt delectus excepturi reiciendis doloribus commodi? Eaque blanditiis temporibus unde commodi. Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit vitae qui molestiae ipsa necessitatibus quibusdam, alias ut sapiente corrupti, omnis sequi, beatae id nisi fugit architecto. Ipsam aliquam deserunt nisi repellat, provident cumque, odit corporis non, natus illo tempore. Fugiat omnis consequatur sint veritatis? Aut iusto ducimus culpa consectetur blanditiis!</h3>
        </div>
    </div> --}}
    <div class="container">




        <div class="row">
            <div class="col-md-4">
                <div class="card mb-3 rounded-pill">
                    <div class="row no-gutters">
                        <div class="col-md-4 d-flex align-items-center justify-content-center">
                            <h1 class="text-primary " style="font-size: 4rem"><strong>
                                    {{ $Unofficially_enrolled }}</strong>
                            </h1>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title m-0 text-center">Unofficially Enrolled Students</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-md-4">
                <div class="card mb-3 rounded-pill">
                    <div class="row no-gutters">
                        <div class="col-md-4 d-flex align-items-center justify-content-center">

                            <h3 class="text-primary " style="font-size: 4rem"><strong> {{ $student_cnt }}</strong></h3>
                        </div>
                        <div class="col-md-8 d-flex align-items-center">
                            <div class="card-body ">

                                <h5 class="card-title m-0 text-center">Enrolled Students</h5>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card mb-3 rounded-pill">
                    <div class="row no-gutters">
                        <div class="col-md-4 d-flex align-items-center justify-content-center">

                            <h4 class="text-primary text-center py-4 pl-3 mx-0 my-2"> {{ $school_year->school_year }}</h4>
                        </div>
                        <div class="col-md-8 d-flex align-items-center">
                            <div class="card-body">
                                <h5 class="card-title m-0 text-center">Active School Year</h5>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

   
        <div class="row justify-content-center pt-5">
            <div class="col-12 px-5">
                <table class="table table-bordered" style="background-color: white;">
                    <thead>
                        <tr class="bg-primary">
                            <th class="h1 text-center " colspan="4" scope="col">Grade 11</th>
                        </tr>
                    </thead>
                    <thead>
                        <tr class="text-center bg-warning">
                            <th scope="col">Strand</th>
                            <th scope="col">Male</th>
                            <th scope="col">Female</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <th scope="row">Industrial Arts(IA)-Automotive Servicing</th>
                                <td>{{ $IAAS11M}}</td>
                                <td>{{ $IAAS11F}}</td>
                                <td>{{ $IAAS11T}}</td>
                            </tr>

                            <tr>
                                <th scope="row">Industrial Arts(IA)-Electrical Installation and Maintenance</th>
                                <td>{{ $IAEIM11M}}</td>
                                <td>{{ $IAEIM11F}}</td>
                                <td>{{ $IAEIM11T}}</td>
                            </tr>

                            <tr>
                                <th scope="row">Industrial Arts(IA)-Electronic Products Assembly and Servicing</th>
                                <td>{{ $IAEPAS11M}}</td>
                                <td>{{ $IAEPAS11F}}</td>
                                <td>{{ $IAEPAS11T}}</td>
                            </tr>

                            <tr>
                                <th scope="row">Information and Communication Technology (ICT)-Computer System Servicing NC II</th>
                                <td>{{ $ICTCSS11M}}</td>
                                <td>{{ $ICTCSS11F}}</td>
                                <td>{{ $ICTCSS11T}}</td>
                            </tr>

                            <tr>
                                <th scope="row">Information and Communication Technology (ICT)-Programming</th>
                                <td>{{ $ICTP11M}}</td>
                                <td>{{ $ICTP11F}}</td>
                                <td>{{ $ICTP11T}}</td>
                            </tr>

                            <tr>
                                <th scope="row">Home Economics (HE)-Housekeeping NC II/Front Office Services NC II</th>
                                <td>{{ $HEHFOS11M}}</td>
                                <td>{{ $HEHFOS11F}}</td>
                                <td>{{ $HEHFOS11T}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Home Economics (HE)-Food and Beverage Services NC II/Bread and Pastry Production NC II</th>
                                <td>{{ $HEHFBS11M}}</td>
                                <td>{{ $HEHFBS11F}}</td>
                                <td>{{ $HEHFBS11T}}</td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row justify-content-center pt-5">
            <div class="col-12 px-5">
                <table class="table table-bordered" style="background-color: white;">
                    <thead>
                        <tr class="bg-primary">
                            <th class="h1 text-center" colspan="4" scope="col">Grade 12</th>
                        </tr>
                    </thead>
                    <thead>
                        <tr class="text-center bg-warning">
                            <th scope="col">Strand</th>
                            <th scope="col">Male</th>
                            <th scope="col">Female</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <th scope="row">Industrial Arts(IA)-Automotive Servicing</th>
                                <td>{{ $IAAS12M}}</td>
                                <td>{{ $IAAS12F}}</td>
                                <td>{{ $IAAS12T}}</td>
                            </tr>

                            <tr>
                                <th scope="row">Industrial Arts(IA)-Electrical Installation and Maintenance</th>
                                <td>{{ $IAEIM12M}}</td>
                                <td>{{ $IAEIM12F}}</td>
                                <td>{{ $IAEIM12T}}</td>
                            </tr>

                            <tr>
                                <th scope="row">Industrial Arts(IA)-Electronic Products Assembly and Servicing</th>
                                <td>{{ $IAEPAS12M}}</td>
                                <td>{{ $IAEPAS12F}}</td>
                                <td>{{ $IAEPAS12T}}</td>
                            </tr>

                            <tr>
                                <th scope="row">Information and Communication Technology (ICT)-Computer System Servicing NC II</th>
                                <td>{{ $ICTCSS12M}}</td>
                                <td>{{ $ICTCSS12F}}</td>
                                <td>{{ $ICTCSS12T}}</td>
                            </tr>

                            <tr>
                                <th scope="row">Information and Communication Technology (ICT)-Programming</th>
                                <td>{{ $ICTP12M}}</td>
                                <td>{{ $ICTP12F}}</td>
                                <td>{{ $ICTP12T}}</td>
                            </tr>

                            <tr>
                                <th scope="row">Home Economics (HE)-Housekeeping NC II/Front Office Services NC II</th>
                                <td>{{ $HEHFOS12M}}</td>
                                <td>{{ $HEHFOS12F}}</td>
                                <td>{{ $HEHFOS12T}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Home Economics (HE)-Food and Beverage Services NC II/Bread and Pastry Production NC II</th>
                                <td>{{ $HEHFBS12M}}</td>
                                <td>{{ $HEHFBS12F}}</td>
                                <td>{{ $HEHFBS12T}}</td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>



    </div>

@endsection
