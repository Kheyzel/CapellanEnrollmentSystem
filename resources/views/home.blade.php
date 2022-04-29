<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CIT San Pablo Registration Form</title>
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="icon" href="/image/capellan-logo.png" type="image/x-icon">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <div class="outer-container">
      <div class="container">
        <img src="{{asset('../img/capellan-logo.png')}}" alt="logo" />
        <div class="title mb-3">CIT San Pablo - Student Registration Form</div>
        <div class="content">
          <form>

            <div class="row">
              <div class="col-6">
                <div class="form-group mt-5 mx-3 mb-3">
                  <label class="mb-2 h5 font-weight-bold" for="first_name">
                    *First Name
                  </label>
                  <input
                    type="text"
                    class="form-control"
                    id="first_name"
                    required
                  />
                </div>
              </div>
              <div class="col-6">
                <div class="form-group mt-5 mx-3 mb-3">
                  <label class="mb-2 h5 font-weight-bold" for="last_name">
                    *Last Name
                  </label>
                  <input
                    type="text"
                    class="form-control"
                    id="last_name"
                    required
                  />
                </div>
              </div>

              <div class="col-6">
                <div class="form-group m-3">
                  <label class="mb-2 h5 font-weight-bold" for="middle_name">
                    Middle Name
                  </label>
                  <input type="text" class="form-control" id="middle_name" />
                </div>
              </div>
              <div class="col-6">
                <div class="form-group m-3">
                  <label class="mb-2 h5 font-weight-bold" for="suffix">
                    Extension Name
                  </label>
                  <input type="text" class="form-control" id="suffix" />
                </div>
              </div>

              <div class="col-4">
                <label class="mt-3 ms-3 h5 font-weight-bold" for="sex">
                  Sex
                </label>
                <select class="form-select ms-3" aria-label="Default select example">
                  <!-- <option selected>Open this select menu</option> -->
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
              </div>
              <div class="col-4">
                <div class="form-group m-3">
                  <label class="mb-2 h5 font-weight-bold" for="b_date">
                    Birthdate
                  </label>
                  <input type="date" class="form-control" id="b_date" />
                </div>
              </div>
              <div class="col-4">
                <div class="form-group m-3">
                  <label class="mb-2 h5 font-weight-bold" for="contact_num">
                    Contact Number
                  </label>
                  <input type="text" class="form-control" id="contact_num" />
                </div>
              </div>
              <div class="col-4">
                <div class="form-group m-3">
                  <label class="mb-2 h5 font-weight-bold" for="email_ad">
                    Email Address
                  </label>
                  <input type="text" class="form-control" id="email_ad" />
                </div>
              </div>
              <div class="col-4">
                <div class="form-group m-3">
                  <label class="mb-2 h5 font-weight-bold" for="m_tongue">
                    Mother Tongue
                  </label>
                  <input type="text" class="form-control" id="m_tongue" />
                </div>
              </div>
              <div class="col-4">
                <div class="form-group m-3">
                  <label class="mb-2 h5 font-weight-bold" for="religion">
                    Religion
                  </label>
                  <input type="text" class="form-control" id="religion" />
                </div>
              </div>
              <div class="col-6">
                <div class="form-group m-3">
                  <label class="mb-2 h5 font-weight-bold" for="psa_num">
                    PSA Number
                  </label>
                  <input type="text" class="form-control" id="psa_num" />
                </div>
              </div>
              <div class="col-6">
                <div class="form-group m-3">
                  <label class="mb-2 h5 font-weight-bold" for="lrn">
                    Learner's Reference Number (LRN)
                  </label>
                  <input type="text" class="form-control" id="lrn" />
                </div>
              </div>
              <div class="col-3">
                <label class="mt-3 ms-3 h5 font-weight-bold" for="yearlevel">
                  Grade Level
                </label>
                <select class="form-select ms-3" aria-label="Default select example">
                  <!-- <option selected>Open this select menu</option> -->
                  <option value="11">11</option>
                  <option value="12">12</option>
                </select>
              </div>
              <div class="col-8">
                <label class="mt-3 ms-3 h5 font-weight-bold" for="course">
                  Strand/Course
                </label>
                <select class="form-select ms-3" aria-label="Default select example">
                  <!-- <option selected>Open this select menu</option> -->
                  <option value="1">Industrial Arts(IA)-Automotive Servicing</option>
                  <option value="2">Industrial Arts(IA)-Electrical Installation and Maintenance</option>
                  <option value="3">Industrial Arts(IA)-Electronic Products Assembly and Servicing</option>
                  <option value="4">Information and Communication Technology (ICT)-Computer System Servicing NC II</option>
                  <option value="5">Information and Communication Technology (ICT)-Programming</option>
                  <option value="6">Home Economics (HE)-Housekeeping NC II/Front Office Services NC II</option>
                  <option value="7">Home Economics (HE)-Food and Beverage Services NC II/Bread and Pastry Production NC II</option>
                </select>
              </div>

              <div class="col-12">
                <div class="sub-title text-center mt-5">
                  Address
                </div>
              </div>
              <div class="col-6">
                <div class="form-group m-3">
                  <label class="mb-2 h5 font-weight-bold" for="house_num">
                    House No./Street/Purok
                  </label>
                  <input type="text" class="form-control" id="house_num" />
                </div>
              </div>
              <div class="col-6">
                <div class="form-group m-3">
                  <label class="mb-2 h5 font-weight-bold" for="city">
                    City/Municipality
                  </label>
                  <input type="text" class="form-control" id="city" />
                </div>
              </div>
              <div class="col-6">
                <div class="form-group m-3">
                  <label class="mb-2 h5 font-weight-bold" for="brgy">
                    Brgy./Barrio
                  </label>
                  <input type="text" class="form-control" id="brgy" />
                </div>
              </div>
              <div class="col-6">
                <div class="form-group m-3">
                  <label class="mb-2 h5 font-weight-bold" for="province">
                    Province
                  </label>
                  <input type="text" class="form-control" id="province" />
                </div>
              </div>
              <div class="col-12">
                <div class="sub-title text-center mt-5">
                  Parent/Guardian's Information
                </div>
              </div>
              <div class="col-6">
                <div class="form-group m-3">
                  <label class="mb-2 h5 font-weight-bold" for="m_fullname">
                    Mother's Maiden Full Name
                  </label>
                  <input type="text" class="form-control" id="m_fullname" />
                </div>
              </div>
              <div class="col-6">
                <div class="form-group m-3">
                  <label class="mb-2 h5 font-weight-bold" for="m_occu">
                    Mother's Occupation
                  </label>
                  <input type="text" class="form-control" id="m_occu" />
                </div>
              </div>
              <div class="col-6">
                <div class="form-group m-3">
                  <label class="mb-2 h5 font-weight-bold" for="m_educ">
                    Mother's Educational Attainment
                  </label>
                  <input type="text" class="form-control" id="m_educ" />
                </div>
              </div>
              <div class="col-6">

              </div>
              <div class="col-6">
                <div class="form-group m-3">
                  <label class="mb-2 h5 font-weight-bold" for="f_fullname">
                    Father's Full Name
                  </label>
                  <input type="text" class="form-control" id="f_fullname" />
                </div>
              </div>
              <div class="col-6">
                <div class="form-group m-3">
                  <label class="mb-2 h5 font-weight-bold" for="f_occu">
                    Father's Occupation
                  </label>
                  <input type="text" class="form-control" id="f_occu" />
                </div>
              </div>
              <div class="col-6">
                <div class="form-group m-3">
                  <label class="mb-2 h5 font-weight-bold" for="f_educ">
                    Father's Educational Attainment
                  </label>
                  <input type="text" class="form-control" id="f_educ" />
                </div>
              </div>
              <div class="col-6">

              </div>
              <div class="col-6">
                <div class="form-group m-3">
                  <label class="mb-2 h5 font-weight-bold" for="g_fullname">
                    Guardian's Full Name
                  </label>
                  <input type="text" class="form-control" id="g_fullname" />
                </div>
              </div>
              <div class="col-6">
                <div class="form-group m-3">
                  <label class="mb-2 h5 font-weight-bold" for="g_occu">
                    Guardian's Occupation
                  </label>
                  <input type="text" class="form-control" id="g_occu" />
                </div>
              </div>
              <div class="col-6">
                <div class="form-group m-3">
                  <label class="mb-2 h5 font-weight-bold" for="g_educ">
                    Guardian's Educational Attainment
                  </label>
                  <input type="text" class="form-control" id="g_educ" />
                </div>
              </div>
              <div class="col-6">
                <div class="form-group m-3">
                  <label class="mb-2 h5 font-weight-bold" for="pg_contact_num">
                    Parent/Guardian's Contact Number
                  </label>
                  <input type="text" class="form-control" id="pg_contact_num" />
                </div>
              </div>
              <div class="col-12">
                <div class="sub-title text-center mt-5">
                  Previous School Information
                </div>
              </div>
              <div class="col-6">
                <div class="form-group m-3">
                  <label class="mb-2 h5 font-weight-bold" for="prev_school">
                    School Name
                  </label>
                  <input type="text" class="form-control" id="prev_school" />
                </div>
              </div>
              <div class="col-6">
                <div class="form-group m-3">
                  <label class="mb-2 h5 font-weight-bold" for="prev_school_ad">
                    School Address
                  </label>
                  <input type="text" class="form-control" id="prev_school_ad" />
                </div>
              </div>
              <div class="col-3">
                <label class="mt-3 ms-3 h5 font-weight-bold" for="school_type">
                  School Type
                </label>
                <select class="form-select ms-3" aria-label="Default select example">
                  <option value="Public">Public</option>
                  <option value="Private">Private</option>
                  <option value="ALS">ALS</option>
                </select>
              </div>
              <div class="col-3">
                <div class="form-group m-3">
                  <label class="mb-2 h5 font-weight-bold" for="l_year_completion">
                    Year of Completion
                  </label>
                  <input type="text" class="form-control" id="l_year_completion" />
                </div>
              </div>
              <div class="col-9">

              </div>
              <div class="col-6">

              </div>
              <div class="col-6">
                <div class="text-end">
                  <button type="reset" class="btn btn-outline-danger me-2">Clear Form</button>
                  <button type="button" class="btn btn-outline-primary">Submit</button>
                </div>
                
              </div>
              
              


              
            </div>




          </form>
        </div>
      </div>
    </div>
  </body>
</html>
