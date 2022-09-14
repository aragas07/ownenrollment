<<<<<<< HEAD
@extends('layouts.app')

@section('content')
    <!-- <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
=======
@extends('layouts.app', ['activePage' => 'students', 'title' => 'Students List - DOrSU', 'navName' => 'Students', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card striped-tabled-with-hover">
>>>>>>> 4902ee9d50166865fed8abff13e702c06e03287b
                        <div class="card-header ">
                            <h4 class="card-title">Incoming Student Profile</h4>
                            <p class="card-category">{{ __('Editable through if else') }}</p>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <form class="mx-3">
                                <div class="row">
                                    <div class="col-md-4 form-group py-0">
                                        <label for="name">First Name</label>
                                        <input type="email" class="form-control" id="name" aria-describedby="emailHelp" value="{{ $incoming_student->first_name }}" disabled>
                                    </div>
                                    <div class="col-md-4 form-group py-0">
                                        <label for="name">Middle Name</label>
                                        <input type="email" class="form-control" id="name" aria-describedby="emailHelp" value="{{ $incoming_student->middle_name }}" disabled>
                                    </div>
                                    <div class="col-md-4 form-group py-0">
                                        <label for="name">Last Name</label>
                                        <input type="email" class="form-control" id="name" aria-describedby="emailHelp" value="{{ $incoming_student->last_name }}" disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 form-group py-0">
                                        <label for="name">Birthdate</label>
                                        <input type="email" class="form-control" id="name" aria-describedby="emailHelp" value="{{ $incoming_student->birthdate }}" disabled>
                                    </div>
                                    <div class="col-md-3 form-group py-0">
                                        <label for="name">Age</label>
                                        <input type="email" class="form-control" id="name" aria-describedby="emailHelp" value="{{ $incoming_student->age }}" disabled>
                                    </div>
                                    <div class="col-md-3 form-group py-0">
                                        <label for="name">Sex</label>
                                        <input type="email" class="form-control" id="name" aria-describedby="emailHelp" value="{{ $incoming_student->sex }}" disabled>
                                    </div>
                                    <div class="col-md-3 form-group py-0">
                                        <label for="name">Civil Status</label>
                                        <input type="email" class="form-control" id="name" aria-describedby="emailHelp" value="{{ $incoming_student->civil_status }}" disabled>
                                    </div>
                                </div>                                
                                <div class="row">
                                    <div class="col-md-5 form-group py-0">
                                        <label for="name">Spouse Name</label>
                                        <input type="email" class="form-control" id="name" aria-describedby="emailHelp" value="{{ $incoming_student->spouse_name }}" disabled>
                                    </div>
                                    <div class="col-md-5 form-group py-0">
                                        <label for="name">Occupation</label>
                                        <input type="email" class="form-control" id="name" aria-describedby="emailHelp" value="{{ $incoming_student->spouse_occupation }}" disabled>
                                    </div>
                                    <div class="col-md-2 form-group py-0">
                                        <label for="name">No. of Children</label>
                                        <input type="email" class="form-control" id="name" aria-describedby="emailHelp" value="{{ $incoming_student->child_number }}" disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group py-0">
                                        <label for="name">Resident Address</label>
                                        <input type="email" class="form-control" id="name" aria-describedby="emailHelp" value="{{ $incoming_student->spouse_occupation }}" disabled>
                                    </div>
                                    <div class="col-md-6 form-group py-0">
                                        <label for="name">Current Address</label>
                                        <input type="email" class="form-control" id="name" aria-describedby="emailHelp" value="{{ $incoming_student->child_number }}" disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 form-group py-0">
                                        <label for="name">Email</label>
                                        <input type="email" class="form-control" id="name" aria-describedby="emailHelp" value="{{ $incoming_student->spouse_occupation }}" disabled>
                                    </div>
                                    <div class="col-md-4 form-group py-0">
                                        <label for="name">Facebook Account</label>
                                        <input type="email" class="form-control" id="name" aria-describedby="emailHelp" value="{{ $incoming_student->spouse_occupation }}" disabled>
                                    </div>
                                    <div class="col-md-4 form-group py-0">
                                        <label for="name">Contact Number</label>
                                        <input type="email" class="form-control" id="name" aria-describedby="emailHelp" value="{{ $incoming_student->child_number }}" disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 form-group py-0">
                                        <label for="name">Ethnic Group</label>
                                        <input type="email" class="form-control" id="name" aria-describedby="emailHelp" value="{{ $incoming_student->spouse_occupation }}" disabled>
                                    </div>
                                    <div class="col-md-4 form-group py-0">
                                        <label for="name">Religion</label>
                                        <input type="email" class="form-control" id="name" aria-describedby="emailHelp" value="{{ $incoming_student->spouse_occupation }}" disabled>
                                    </div>
                                    <div class="col-md-4 form-group py-0">
                                        <label for="name">Languages</label>
                                        <input type="email" class="form-control" id="name" aria-describedby="emailHelp" value="{{ $incoming_student->child_number }}" disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 form-group py-0">
                                        <label for="name">Employment</label>
                                        <input type="email" class="form-control" id="name" aria-describedby="emailHelp" value="{{ $incoming_student->spouse_occupation }}" disabled>
                                    </div>
                                    <div class="col-md-8 form-group py-0">
                                        <label for="name">Employer</label>
                                        <input type="email" class="form-control" id="name" aria-describedby="emailHelp" value="{{ $incoming_student->spouse_occupation }}" disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group py-0">
                                        <label for="name">Father's Name</label>
                                        <input type="email" class="form-control" id="name" aria-describedby="emailHelp" value="{{ $incoming_student->spouse_occupation }}" disabled>
                                    </div>
                                    <div class="col-md-6 form-group py-0">
                                        <label for="name">Contact Number</label>
                                        <input type="email" class="form-control" id="name" aria-describedby="emailHelp" value="{{ $incoming_student->spouse_occupation }}" disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 form-group py-0">
                                        <label for="name">Address</label>
                                        <input type="email" class="form-control" id="name" aria-describedby="emailHelp" value="{{ $incoming_student->spouse_occupation }}" disabled>
                                    </div>
                                    <div class="col-md-4 form-group py-0">
                                        <label for="name">Occupation</label>
                                        <input type="email" class="form-control" id="name" aria-describedby="emailHelp" value="{{ $incoming_student->spouse_occupation }}" disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group py-0">
                                        <label for="name">Mother's Name</label>
                                        <input type="email" class="form-control" id="name" aria-describedby="emailHelp" value="{{ $incoming_student->spouse_occupation }}" disabled>
                                    </div>
                                    <div class="col-md-6 form-group py-0">
                                        <label for="name">Contact Number</label>
                                        <input type="email" class="form-control" id="name" aria-describedby="emailHelp" value="{{ $incoming_student->spouse_occupation }}" disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 form-group py-0">
                                        <label for="name">Address</label>
                                        <input type="email" class="form-control" id="name" aria-describedby="emailHelp" value="{{ $incoming_student->spouse_occupation }}" disabled>
                                    </div>
                                    <div class="col-md-4 form-group py-0">
                                        <label for="name">Occupation</label>
                                        <input type="email" class="form-control" id="name" aria-describedby="emailHelp" value="{{ $incoming_student->spouse_occupation }}" disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 form-group py-0">
                                        <label for="name">Parents Living Together?</label>
                                        <input type="email" class="form-control" id="name" aria-describedby="emailHelp" value="{{ $incoming_student->spouse_occupation }}" disabled>
                                    </div>
                                    <div class="col-md-4 form-group py-0">
                                        <label for="name">Family Monthy Income</label>
                                        <input type="email" class="form-control" id="name" aria-describedby="emailHelp" value="{{ $incoming_student->spouse_occupation }}" disabled>
                                    </div>
                                    <div class="col-md-4 form-group py-0">
                                        <label for="name">No. of Siblings</label>
                                        <input type="email" class="form-control" id="name" aria-describedby="emailHelp" value="{{ $incoming_student->spouse_occupation }}" disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 form-group py-0">
                                        <label for="name">No. of Working Siblings</label>
                                        <input type="email" class="form-control" id="name" aria-describedby="emailHelp" value="{{ $incoming_student->spouse_occupation }}" disabled>
                                    </div>
                                    <div class="col-md-4 form-group py-0">
                                        <label for="name">No. of College Siblings</label>
                                        <input type="email" class="form-control" id="name" aria-describedby="emailHelp" value="{{ $incoming_student->spouse_occupation }}" disabled>
                                    </div>
                                    <div class="col-md-4 form-group py-0">
                                        <label for="name">No. of High School Siblings</label>
                                        <input type="email" class="form-control" id="name" aria-describedby="emailHelp" value="{{ $incoming_student->spouse_occupation }}" disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group py-0">
                                        <label for="name">Guardians Name</label>
                                        <input type="email" class="form-control" id="name" aria-describedby="emailHelp" value="{{ $incoming_student->spouse_occupation }}" disabled>
                                    </div>
                                    <div class="col-md-6 form-group py-0">
                                        <label for="name">Contact Number</label>
                                        <input type="email" class="form-control" id="name" aria-describedby="emailHelp" value="{{ $incoming_student->spouse_occupation }}" disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 form-group py-0">
                                        <label for="name">General Ability</label>
                                        <input type="email" class="form-control" id="name" aria-describedby="emailHelp" value="{{ $incoming_student->spouse_occupation }}" disabled>
                                    </div>
                                    <div class="col-md-4 form-group py-0">
                                        <label for="name">Spatial Aptitude</label>
                                        <input type="email" class="form-control" id="name" aria-describedby="emailHelp" value="{{ $incoming_student->spouse_occupation }}" disabled>
                                    </div>
                                    <div class="col-md-4 form-group py-0">
                                        <label for="name">Verbal Aptitude</label>
                                        <input type="email" class="form-control" id="name" aria-describedby="emailHelp" value="{{ $incoming_student->spouse_occupation }}" disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 form-group py-0">
                                        <label for="name">Perceptual Aptitude</label>
                                        <input type="email" class="form-control" id="name" aria-describedby="emailHelp" value="{{ $incoming_student->spouse_occupation }}" disabled>
                                    </div>
                                    <div class="col-md-4 form-group py-0">
                                        <label for="name">Numerical Aptitude</label>
                                        <input type="email" class="form-control" id="name" aria-describedby="emailHelp" value="{{ $incoming_student->spouse_occupation }}" disabled>
                                    </div>
                                    <div class="col-md-4 form-group py-0">
                                        <label for="name">Manual Dexterity</label>
                                        <input type="email" class="form-control" id="name" aria-describedby="emailHelp" value="{{ $incoming_student->spouse_occupation }}" disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 form-group py-0">
                                        <label for="name">Good Moral</label>
                                        <br>
                                        <img src="..." class="img-fluid" alt="Responsive image">
                                    </div>
                                    <div class="col-md-3 form-group py-0">
                                        <label for="name">NSO Authentication</label>
                                        <br>
                                        <img src="..." class="img-fluid" alt="Responsive image">
                                    </div>
                                    <div class="col-md-3 form-group py-0">
                                        <label for="name">Marriage Contract</label>
                                        <br>
                                        <img src="..." class="img-fluid" alt="Responsive image">
                                    </div>
                                    <div class="col-md-3 form-group py-0">
                                        <label for="name">Transcript of Records</label>
                                        <br>
                                        <img src="..." class="img-fluid" alt="Responsive image">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 form-group py-0">
                                        <label for="name">Transfer Credentials</label>
                                        <br>
                                        <img src="..." class="img-fluid" alt="Responsive image">
                                    </div>
                                    <div class="col-md-4 form-group py-0">
                                        <label for="name">Clearance</label>
                                        <br>
                                        <img src="..." class="img-fluid" alt="Responsive image">
                                    </div>
                                    <div class="col-md-4 form-group py-0">
                                        <label for="name">Last Semester Grades</label>
                                        <br>
                                        <img src="..." class="img-fluid" alt="Responsive image">
                                    </div>   
                                </div>
                                <div class="row">
                                    <div class="col-md-4 form-group py-0">
                                        <label for="name">First Course Chosen</label>
                                        <input type="email" class="form-control" id="name" aria-describedby="emailHelp" value="{{ $incoming_student->spouse_occupation }}" disabled>
                                    </div>
                                    <div class="col-md-4 form-group py-0">
                                        <label for="name">Second Course Chosen</label>
                                        <input type="email" class="form-control" id="name" aria-describedby="emailHelp" value="{{ $incoming_student->spouse_occupation }}" disabled>
                                    </div>
                                    <div class="col-md-4 form-group py-0">
                                        <label for="name">Third Course Chosen</label>
                                        <input type="email" class="form-control" id="name" aria-describedby="emailHelp" value="{{ $incoming_student->spouse_occupation }}" disabled>
                                    </div>   
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary">Submit</button>   
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<<<<<<< HEAD
    </div> -->
=======
    </div>
>>>>>>> 4902ee9d50166865fed8abff13e702c06e03287b
@endsection