@extends('layouts.app')


@section('breadcrumb')
    <div class="col-12 ">
        <div class="d-flex align-items-center justify-content-between mx-5 mt-2">
            <h4>Student Profile</h4>
        </div>
    </div>
@endsection

@section('content')


    <div class="container-fluid">


        <div class="row">
            <div class="col-lg-4">
                <div class="profile-card-4 z-depth-3">
                    <div class="card">
                        <div class="card-body text-center  rounded-top m-1">
                            

                            {{-- <div>
                                    <img src="{{$student->path}}"  width="250px" height= "230px"; style = "margin-bottom: 20px;" />
                            </div> --}}

                            @if (!empty($student->path))
                
                    <div>
                        <img src="{{$student->path}}" id="category-img-tag" width="250px" height= "230px"; style = "margin-bottom: 20px;" />
                    </div>
             
                @else
               
                    <div>
                        <img src="{{asset('../img/profile.png')}}" id="category-img-tag" style = "margin-bottom: 20px; width:250px; height:230px" />
                    </div>
            

                @endif


                            <h5 class="mb-1 mt-3">{{ $student->last_name }}, {{ $student->first_name }}
                                {{ $student->middle_name }} {{ $student->suffix }}</h5>
                            <h6 class="">{{ $student->email_ad }}</h6>
                        </div>
                        <div class="
                                px-3 pb-3">
                            <ul class="list-group shadow-none">

                                <li class="list-group-item">
                                    <div class="list-icon text-center">
                                        <strong class="text-primary">Grade </strong>
                                    </div>
                                    <div class="list-details text-center">
                                        <span>Grade{{ $student->yearlevel->yearlevel }}</span>
                                    </div>
                                </li>

                                <li class="list-group-item">
                                    <div class="list-icon text-center">
                                        <strong class="text-primary">Strand/Course </strong>
                                    </div>
                                    <div class="list-details text-center">
                                        <span>{{ $student->course->course }}</span>
                                    </div>
                                </li>

                              
                               <li class="list-group-item">
                                <div class="list-icon text-center">
                                    <strong class="text-primary">Student Number </strong>
                                </div>
                                <div class="list-details text-center">
                                    <span>{{ $student->student_num }}</span>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="list-icon text-center">
                                    <strong class="text-primary">Dropout Date</strong>
                                </div>
                                <div class="list-details text-center">
                                    <span>{{ $student->drop_date }}</span>
                                </div>
                            </li>

                            <li class="list-group-item">
                                <div class="list-icon text-center">
                                    <strong class="text-primary">Reason for Dropout</strong>
                                </div>
                                <div class="list-details text-center">
                                    <span>{{ $student->drop_reason }}</span>
                                </div>
                            </li>

                        

                               
                                
                              



                            </ul>

                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-8">

                <div class="card z-depth-3">
                    <div class="card-body">
                        <ul class="nav nav-pills nav-pills-primary nav-justified">
                            <li class="nav-item">
                                <a href="javascript:void();" data-target="#bacisInfo" data-toggle="pill"
                                    class="nav-link active show"><i class="icon-user"></i> <span
                                        class="hidden-xs">Basic Info</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void();" data-target="#guardianInfo" data-toggle="pill"
                                    class="nav-link"><i class="icon-envelope-open"></i> <span
                                        class="hidden-xs">Guardian/Parents Info</span></a>
                            </li>
                        </ul>
                        <div class="tab-content p-3">
                            <div class="tab-pane active show" id="bacisInfo">

                                <div class="row border">
                                    <div class="col-12">
                                        <h5 class="mb-4 text-center mt-4 font-weight-bold bg-secondary p-2">
                                            STUDENT'S PERSONAL INFORMATION
                                        </h5>
                                    </div>
                                    <div class="col-3">
                                        <strong>
                                            <p>Learners Referencef Number (LRN)</p>
                                        </strong>
                                        <strong>
                                            <p class="p-2">Last Name</p>
                                        </strong>
                                        <strong>
                                            <p class="p-2">First Name</p>
                                        </strong>
                                        <strong>
                                            <p class="p-2">Middle Name</p>
                                        </strong>

                                    </div>
                                    <div class="col-9">
                                        <p class="border p-2">{{ $student->lrn }}</p>
                                        <p class="border p-2">{{ $student->last_name }}</p>
                                        <p class="border p-2">{{ $student->first_name }}</p>
                                        <p class="border p-2">{{ $student->middle_name }}</p>
                                    </div>

                                    <div class="col-12">
                                        <h5 class="mb-4 text-center mt-4 font-weight-bold bg-secondary p-2">OTHER INFORMATION</h5>
                                        <div class="d-flex">
                                            <div class="col-6 pl-5">

                                                <p> <strong class="mr-3">Age: </strong> 22
                                                <p> <strong class="mr-3">Sex: </strong> {{ $student->sex }}
                                                <p> <strong class="mr-3">Birthday: </strong>
                                                    {{ $student->b_date }}
                                                <p> <strong class="mr-3">Contact Number: </strong>
                                                    {{ $student->contact_num }}

                                                <p> <strong class="mr-3">Address: </strong>
                                                    {{ $student->house_num }}
                                                    {{ $student->brgy }}, {{ $student->city }},
                                                    {{ $student->province }}
                                                <p> <strong class="mr-3">Religion: </strong>
                                                    {{ $student->religion }}
                                                <p> <strong class="mr-3">Mother Tounge: </strong>
                                                    {{ $student->m_tongue }}
                                                <p> <strong class="mr-3">PSA Number: </strong>
                                                    {{ $student->psa_num }}
                                            </div>
                                            <div class="col-6 pl-5">

                                                {{-- <hr> --}}
                                                <p> <strong class="mr-3">Previous School: </strong>
                                                    {{ $student->prev_school }} - ({{ $student->school_type }})
                                                <p> <strong class="mr-3">Previous School Address: </strong>
                                                    {{ $student->prev_school_ad }}
                                                <p> <strong class="mr-3">Year of Completion: </strong>
                                                    {{ $student->l_year_completion }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/row-->
                            </div>

                            <div class="tab-pane" id="guardianInfo">
                                <div class="tab-pane active show" id="bacisInfo">
                                    <div class="row border">
                                        <div class="col-12">
                                            <h4 class=" mb-4 text-center mt-4 font-weight-bold">
                                                Parents' Information
                                            </h4>
                                        </div>
                                        {{-- <div class="col-6 pl-4">
                                            <h5 class="mb-3 font-weight-bold">FATHER'S INFO</h5>
                                            <p class="ml-4"> <strong class="mr-3">Name:
                                                </strong>
                                                {{ $student->f_fullname }}
                                            <p class="ml-4"> <strong class="mr-3">Occupation:
                                                </strong>
                                                {{ $student->f_occu }}
                                            <p class="ml-4"> <strong class="mr-3">Educational
                                                    Attainment: </strong>
                                                {{ $student->f_educ }}

                                        </div>
                                        <div class="col-6 pl-4">
                                            <h5 class="mb-3 font-weight-bold">MOTHER'S INFO</h5>
                                            <p class="ml-4"> <strong class="mr-3">Name:
                                                </strong>
                                                {{ $student->m_fullname }}
                                            <p class="ml-4"> <strong class="mr-3">Occupation:
                                                </strong>
                                                {{ $student->m_occu }}
                                            <p class="ml-4"> <strong class="mr-3">Educational
                                                    Attainment: </strong>
                                                {{ $student->m_educ }}

                                        </div> --}}
                                        <div class="col-12">
                                            <table class="table table-borderless">
                                                <thead class="thead-light" >
                                                  <tr>
                                                    <th scope="col" style="color: black">FATHER'S INFO</th>
                                                    <th scope="col" style="color: black">MOTHER'S INFO</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  <tr>
                                                    <td scope="row" style="color: black"> <strong> Name:&emsp;</strong> {{ $student->f_fullname }}</td>
                                                    <td style="color: black"><strong> Name:&emsp;</strong>  {{ $student->m_fullname }}</td>
                                                  </tr>
                                                  <tr>
                                                    <td scope="row" style="color: black"> <strong> Occupation:&emsp;</strong> {{ $student->f_occu }}</td>
                                                    <td style="color: black"><strong> Occupation:&emsp;</strong>  {{ $student->m_occu }}</td>
                                                  </tr>
                                                  <tr>
                                                    <td scope="row" style="color: black"> <strong> Educational Attainment:&emsp;</strong> {{ $student->f_educ }}</td>
                                                    <td style="color: black"><strong> Educational Attainment:&emsp;</strong>  {{ $student->m_educ }}</td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                        </div>
                                        <div class="col-12">
                                            <h4 class=" mb-4 text-center mt-4 font-weight-bold">
                                                Guardian's Information
                                            </h4>
                                        </div>
                                        <div class="col-12">
                                            <table class="table table-borderless">
                                                <thead class="thead-light" >
                                                  <tr>
                                                    <th  class="text-center" scope="col" style="color: black">GUARDIAN'S INFO</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  <tr>
                                                    <td class="pl-5" scope="row" style="color: black"> <strong> Name:&emsp;</strong> {{ $student->g_fullname }}</td>
                                                  </tr>
                                                  <tr>
                                                    <td class="pl-5" scope="row" style="color: black"> <strong> Occupation:&emsp;</strong> {{ $student->g_occu }}</td>
                                                  </tr>
                                                  <tr>
                                                    <td class="pl-5" scope="row" style="color: black"> <strong> Educational Attainment:&emsp;</strong> {{ $student->g_educ }}</td>
                                                  </tr>
                                                  <tr>
                                                    <td class="pl-5" scope="row" style="color: black"> <strong> Contact Number:&emsp;</strong> {{ $student->pg_contact_num }}</td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                        </div>

                                       
                                    </div>

                                </div>



                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
           function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload").change(function() {
    readURL(this);
});
    </script>

@endsection
