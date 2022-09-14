@extends('layouts.app', ['activePage' => 'students', 'title' => 'Students List - DOrSU', 'navName' => 'Students', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card striped-tabled-with-hover">
                        <div class="card-header ">
                            <h4 class="card-title">Incoming Students List</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover table-full-width table-striped" style="width:100%" id="ajax-crud-datatable">
                                <thead>
                                    <tr>
                                        <th width="80px">Id</th>
                                        <th>Name</th>
                                        <th>Course</th>
                                        <th>Campus</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal for view student -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="checkModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <form action="/checkFiles" method="post">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title" id="incomingStudentName">Files Submitted by <span id="full_name"></span></h4>
                </div>
                <div class="modal-body">
                    <div class="row">                       
                        <div class="col-sm-12">
                            <div class="form-check">
                                <input type="hidden" id="reqIdHidden" name="reqIdHidden">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="form_138">
                                <label class="form-check-label" for="exampleCheck1">Form 138</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck2" name="good_moral">
                                <label class="form-check-label" for="exampleCheck2">Good Moral Certificate</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck3" name="nso_auth">
                                <label class="form-check-label" for="exampleCheck3">NSO Authentication</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck4" name="marriage_contract">
                                <label class="form-check-label" for="exampleCheck4">Marriage Contract</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck5" name="transcript_records">
                                <label class="form-check-label" for="exampleCheck5">Transcript of Records</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck6" name="transfer_creds">
                                <label class="form-check-label" for="exampleCheck6">Transfer Credentials</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck7" name="clearance">
                                <label class="form-check-label" for="exampleCheck7">Clearance</label>
                            </div>
                            <div class="form-check mb-3">
                                <textarea class="form-control" id="remarksId" rows="4" name="remarks" placeholder="Remarks"></textarea>
                            </div>
                            <button type="button" class="btn btn-primary btn-lg btn-block" id="acceptStudent">Accept</button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            </div>
        </div>
    </div>

    <!-- Modal for viewing requirements -->
    <div class="modal fade" id="viewStudentModal" tabindex="-1" role="dialog" aria-labelledby="viewStudent" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="card-title">Incoming Student Profile</h4>
                </div>
                <div class="modal-body">
                    <form class="mx-3">
                        <div class="row">
                            <div class="col-md-12 form-group py-0">
                                <label for="name">Learner Reference Number</label>
                                <input type="text" class="form-control" id="lrn" aria-describedby="emailHelp" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 form-group py-0">
                                <label for="name">First Name</label>
                                <input type="text" class="form-control" id="firstname" aria-describedby="emailHelp" disabled>
                            </div>
                            <div class="col-md-4 form-group py-0">
                                <label for="name">Middle Name</label>
                                <input type="text" class="form-control" id="middlename" aria-describedby="emailHelp" disabled>
                            </div>
                            <div class="col-md-4 form-group py-0">
                                <label for="name">Last Name</label>
                                <input type="text" class="form-control" id="lastname" aria-describedby="emailHelp" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 form-group py-0">
                                <label for="name">Birthdate</label>
                                <input type="email" class="form-control" id="birthdate" aria-describedby="emailHelp" disabled>
                            </div>
                            <div class="col-md-3 form-group py-0">
                                <label for="name">Age</label>
                                <input type="email" class="form-control" id="age" aria-describedby="emailHelp" disabled>
                            </div>
                            <div class="col-md-3 form-group py-0">
                                <label for="name">Sex</label>
                                <input type="email" class="form-control" id="sex" aria-describedby="emailHelp" disabled>
                            </div>
                            <div class="col-md-3 form-group py-0">
                                <label for="name">Civil Status</label>
                                <input type="email" class="form-control" id="civil_status" aria-describedby="emailHelp" disabled>
                            </div>
                        </div>                                
                        <div class="row">
                            <div class="col-md-5 form-group py-0">
                                <label for="name">Spouse Name</label>
                                <input type="email" class="form-control" id="spouse_name" aria-describedby="emailHelp" disabled>
                            </div>
                            <div class="col-md-5 form-group py-0">
                                <label for="name">Occupation</label>
                                <input type="email" class="form-control" id="spouse_occ" aria-describedby="emailHelp" disabled>
                            </div>
                            <div class="col-md-2 form-group py-0">
                                <label for="name">No. of Children</label>
                                <input type="email" class="form-control" id="child_number" aria-describedby="emailHelp" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group py-0">
                                <label for="name">Resident Address</label>
                                <input type="email" class="form-control" id="r_address" aria-describedby="emailHelp" disabled>
                            </div>
                            <div class="col-md-6 form-group py-0">
                                <label for="name">Current Address</label>
                                <input type="email" class="form-control" id="c_address" aria-describedby="emailHelp" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 form-group py-0">
                                <label for="name">Email</label>
                                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" disabled>
                            </div>
                            <div class="col-md-4 form-group py-0">
                                <label for="name">Facebook Account</label>
                                <input type="email" class="form-control" id="fb_acc" aria-describedby="emailHelp" disabled>
                            </div>
                            <div class="col-md-4 form-group py-0">
                                <label for="name">Contact Number</label>
                                <input type="email" class="form-control" id="contact_no" aria-describedby="emailHelp" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 form-group py-0">
                                <label for="name">Ethnic Group</label>
                                <input type="email" class="form-control" id="eth_group" aria-describedby="emailHelp" disabled>
                            </div>
                            <div class="col-md-4 form-group py-0">
                                <label for="name">Religion</label>
                                <input type="email" class="form-control" id="religion" aria-describedby="emailHelp" disabled>
                            </div>
                            <div class="col-md-4 form-group py-0">
                                <label for="name">Languages</label>
                                <input type="email" class="form-control" id="languages" aria-describedby="emailHelp" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 form-group py-0">
                                <label for="name">Employment</label>
                                <input type="email" class="form-control" id="employment" aria-describedby="emailHelp" disabled>
                            </div>
                            <div class="col-md-8 form-group py-0">
                                <label for="name">Employer</label>
                                <input type="email" class="form-control" id="employer" aria-describedby="emailHelp" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group py-0">
                                <label for="name">Father's Name</label>
                                <input type="email" class="form-control" id="fathers_name" aria-describedby="emailHelp" disabled>
                            </div>
                            <div class="col-md-6 form-group py-0">
                                <label for="name">Contact Number</label>
                                <input type="email" class="form-control" id="fcon_no" aria-describedby="emailHelp" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 form-group py-0">
                                <label for="name">Address</label>
                                <input type="email" class="form-control" id="fadd" aria-describedby="emailHelp" disabled>
                            </div>
                            <div class="col-md-4 form-group py-0">
                                <label for="name">Occupation</label>
                                <input type="email" class="form-control" id="focc" aria-describedby="emailHelp" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group py-0">
                                <label for="name">Mother's Name</label>
                                <input type="email" class="form-control" id="mothers_name" aria-describedby="emailHelp" disabled>
                            </div>
                            <div class="col-md-6 form-group py-0">
                                <label for="name">Contact Number</label>
                                <input type="email" class="form-control" id="mcon_no" aria-describedby="emailHelp" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 form-group py-0">
                                <label for="name">Address</label>
                                <input type="email" class="form-control" id="madd" aria-describedby="emailHelp" disabled>
                            </div>
                            <div class="col-md-4 form-group py-0">
                                <label for="name">Occupation</label>
                                <input type="email" class="form-control" id="mocc" aria-describedby="emailHelp" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 form-group py-0">
                                <label for="name">Parents Living Together?</label>
                                <input type="email" class="form-control" id="plivetog" aria-describedby="emailHelp" disabled>
                            </div>
                            <div class="col-md-4 form-group py-0">
                                <label for="name">Family Monthy Income</label>
                                <input type="email" class="form-control" id="fmincome" aria-describedby="emailHelp" disabled>
                            </div>
                            <div class="col-md-4 form-group py-0">
                                <label for="name">No. of Siblings</label>
                                <input type="email" class="form-control" id="no_siblings" aria-describedby="emailHelp" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 form-group py-0">
                                <label for="name">No. of Working Siblings</label>
                                <input type="email" class="form-control" id="wsiblings" aria-describedby="emailHelp" disabled>
                            </div>
                            <div class="col-md-4 form-group py-0">
                                <label for="name">No. of College Siblings</label>
                                <input type="email" class="form-control" id="csiblings" aria-describedby="emailHelp" disabled>
                            </div>
                            <div class="col-md-4 form-group py-0">
                                <label for="name">No. of High School Siblings</label>
                                <input type="email" class="form-control" id="hssiblings" aria-describedby="emailHelp" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group py-0">
                                <label for="name">Guardians Name</label>
                                <input type="email" class="form-control" id="gname" aria-describedby="emailHelp" disabled>
                            </div>
                            <div class="col-md-6 form-group py-0">
                                <label for="name">Contact Number</label>
                                <input type="email" class="form-control" id="gcon_no" aria-describedby="emailHelp" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 form-group py-0">
                                <label for="name">General Ability</label>
                                <input type="email" class="form-control" id="gen_ability" aria-describedby="emailHelp" disabled>
                            </div>
                            <div class="col-md-4 form-group py-0">
                                <label for="name">Spatial Aptitude</label>
                                <input type="email" class="form-control" id="spa_apt" aria-describedby="emailHelp" disabled>
                            </div>
                            <div class="col-md-4 form-group py-0">
                                <label for="name">Verbal Aptitude</label>
                                <input type="email" class="form-control" id="ver_apt" aria-describedby="emailHelp" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 form-group py-0">
                                <label for="name">Perceptual Aptitude</label>
                                <input type="email" class="form-control" id="per_apt" aria-describedby="emailHelp" disabled>
                            </div>
                            <div class="col-md-4 form-group py-0">
                                <label for="name">Numerical Aptitude</label>
                                <input type="email" class="form-control" id="num_apt" aria-describedby="emailHelp" disabled>
                            </div>
                            <div class="col-md-4 form-group py-0">
                                <label for="name">Manual Dexterity</label>
                                <input type="email" class="form-control" id="man_dex" aria-describedby="emailHelp" disabled>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal for advising -->
    <div class="modal fade" id="adviseModal" tabindex="-1" role="dialog" aria-labelledby="checkModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="incomingStudentName">Files Submitted by <span id="full_name2"></span></h5>
                    <input type="hidden" id="reqIdHidden2" name="reqIdHidden">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <form action="/checkFiles" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <!-- <div class="col-sm-6">
                            <div class="card" style="width: 100%;">
                                <img class="card-img-top" style="height:8em" src="{{ asset('light-bootstrap/img/sidebar-5.jpg') }}" alt="Card image cap">
                                <div class="card-body">
                                    <p class="card-title">SCAST Result</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card" style="width: 100%;">
                                <img class="card-img-top" style="height:8em" src="{{ asset('light-bootstrap/img/sidebar-5.jpg') }}" alt="Card image cap">
                                <div class="card-body">
                                    <p class="card-title">Form 137</p>
                                </div>
                            </div>                            
                        </div> -->
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-primary btn-lg btn-block" id="adviseStudent">Advise</button>
                        </div>
                    </div>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div> -->
            </form>
            </div>
        </div>
    </div>

    <!-- Modal for Endorsement to another course -->
    <div class="modal fade" id="endorseModal" tabindex="-1" role="dialog" aria-labelledby="endorseModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="incomingStudentName">Course Priority of <span id="full_name3"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">    
                        <div class="col-sm-12">
                            <form action="/endorse" method="post">
                                <div class="form-check mb-3">
                                    <input type="hidden" id="endIdHidden" name="endIdHidden">
                                    <label for="">1st Priority: <span id="coursePrio" style="font-weight: 600;"></span></label>
                                    <select class="custom-select col-sm-12" id="courseSelect" name="courseSelect">
                                        <option>Endorse to a course</option>
                                    </select>
                                </div>
                                <div class="form-check mb-3">
                                    <label for="">2nd Priority: <span id="coursePrio2" style="font-weight: 600;"></span></label>
                                    <select class="custom-select col-sm-12" id="courseSelect2" name="courseSelect2">
                                        <option>Endorse to a course</option>
                                    </select>
                                </div>
                                <div class="form-check mb-3">
                                    <label for="">3rd Priority: <span id="coursePrio3" style="font-weight: 600;"></span></label>
                                    <select class="custom-select col-sm-12" id="courseSelect3" name="courseSelect3">
                                        <option>Endorse to a course</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block" id="endorseStudent">Endorse</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div> -->
            </div>
        </div>
    </div>


    <script>
    $(document).ready(function(){

        //yajra datatables
        $('#ajax-crud-datatable').DataTable({
            processing: true,
            serverSide: false,
            ajax: "{{ url('ajaxIndex') }}",
            
            columns: [
            { data: 'school_id', name: 'school_id' },
            { data: 'fullname', name: 'fullname' },
            { data: 'description', name: 'program.description' },        
            { data: 'campus', name: 'campus' },
            { data: 'action', name: 'action', orderable: false },
            ],
            order: [[0, 'asc']]
        });

        //check specific students requirements submitted
        $('body').on('click', '#checkRequirements', function (){
            let requirementsUrl = $(this).data('url');
            $.get(requirementsUrl, function(data){
                $('#exampleModal').modal('show');

                $('#full_name').text(data[0].first_name + ' ' + data[0].middle_name + ' ' + data[0].last_name);
                $('#reqIdHidden').val(data[0].id);
                if(data[0].form_138 == 'on'){
                    $('#exampleCheck1').prop('checked', true);
                } else {
                    $('#exampleCheck1').prop('checked', false);
                }

                if(data[0].good_moral == 'on'){
                    $('#exampleCheck2').prop('checked', true);
                } else {
                    $('#exampleCheck2').prop('checked', false);
                }

                if(data[0].nso_auth == 'on'){
                    $('#exampleCheck3').prop('checked', true);
                } else {
                    $('#exampleCheck3').prop('checked', false);
                }

                if(data[0].marriage_contract == 'on'){
                    $('#exampleCheck4').prop('checked', true);
                } else {
                    $('#exampleCheck4').prop('checked', false);
                }

                if(data[0].transcript_records == 'on'){
                    $('#exampleCheck5').prop('checked', true);
                } else {
                    $('#exampleCheck5').prop('checked', false);
                }

                if(data[0].transfer_creds == 'on'){
                    $('#exampleCheck6').prop('checked', true);
                } else {
                    $('#exampleCheck6').prop('checked', false);
                }

                if(data[0].clearance == 'on'){
                    $('#exampleCheck7').prop('checked', true);
                } else {
                    $('#exampleCheck7').prop('checked', false);
                }

                $('#remarksId').val(data[0].remarks);

            });
        });

        //view specific student
        $('body').on('click', '#viewStudent', function (){
            let viewStudentUrl = $(this).data('url');
            $.get(viewStudentUrl, function(data){
                $('#viewStudentModal').modal('show');
                $('#lrn').val(data.lrn);
                $('#firstname').val(data.first_name);
                $('#middlename').val(data.middle_name);
                $('#lastname').val(data.last_name);
                $('#birthdate').val(data.birthdate);
                $('#age').val(data.age);
                $('#sex').val(data.sex);                
                $('#civil_status').val(data.civil_status);
                $('#spouse_name').val(data.spouse_name);
                $('#spouse_occ').val(data.spouse_occupation);
                $('#child_number').val(data.child_number);
                $('#r_address').val(data.r_address);
                $('#c_address').val(data.c_address);
                $('#email').val(data.email);
                $('#fb_acc').val(data.fb_account);
                $('#contact_no').val(data.contact_number);                
                $('#eth_group').val(data.ethnic_group);
                $('#religion').val(data.religion);
                $('#languages').val(data.languages);
                $('#employment').val(data.is_working);
                $('#employer').val(data.working_for);
                $('#fathers_name').val(data.fathers_name);
                $('#fcon_no').val(data.fathers_contact_number);
                $('#fadd').val(data.fathers_address);
                $('#focc').val(data.fathers_employment);
                $('#mothers_name').val(data.mothers_name);
                $('#mcon_no').val(data.mothers_contact_number);
                $('#madd').val(data.mothers_address);
                $('#mocc').val(data.mothers_employment);
                $('#plivetog').val(data.parents_are);                
                $('#fmincome').val(data.family_monthly_income);
                $('#no_siblings').val(data.siblings);
                $('#wsiblings').val(data.working_siblings);
                $('#csiblings').val(data.college_siblings);
                $('#hssiblings').val(data.hs_siblings);                
                $('#gname').val(data.guardian);
                $('#gcon_no').val(data.guardians_number);
                $('#gen_ability').val(data.gen_ability);
                $('#spa_apt').val(data.spatial_apt);
                $('#ver_apt').val(data.verbal_apt);                
                $('#per_apt').val(data.perceptual_apt);
                $('#num_apt').val(data.numerical_apt);
                $('#man_dex').val(data.manual_dex);
            });
        });

        //post for accepted
        $("#acceptStudent").click(function(event){
            event.preventDefault();
            let id = $("#reqIdHidden").val();
            let _token   = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "/accept",
                type:"POST",
                data:{
                id:id,
                _token: _token
                },
                success:function(response){
                console.log(response);
                if(response) {
                    alert('Successfully Accepted.')
                    $("#acceptStudent")[0].prop('disabled', true);
                }
                },
                error: function(error) {
                console.log(error);
                    alert('Error');
                }
            });
        });

        //post for advise
        $("#adviseStudent").click(function(event){
            event.preventDefault();
            let id = $("#reqIdHidden").val();
            let _token   = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "/advise",
                type:"POST",
                data:{
                id:id,
                _token: _token
                },
                success:function(response){
                console.log(response);
                if(response) {
                    alert('Successfully Advised.');
                    location.reload();
                    // $("#acceptStudent")[0].prop('disabled', true);
                }
                },
                error: function(error) {
                console.log(error);
                    alert('Error');
                }
            });
        });

        //View for adviseModal 
        $('body').on('click', '#viewAdvisee', function (){
            let viewAdviseeUrl = $(this).data('url');
            $.get(viewAdviseeUrl, function(data){
                $('#adviseModal').modal('show');
                //console.log(data);
                $('#full_name2').text(data[0].first_name + ' ' + data[0].middle_name + ' ' + data[0].last_name);
                $('#reqIdHidden2').val(data[0].id);

                if(data[0].form_138 == 'on'){
                    $('#exampleCheck1').prop('checked', true);
                } else {
                    $('#exampleCheck1').prop('checked', false);
                }

                if(data[0].good_moral == 'on'){
                    $('#exampleCheck2').prop('checked', true);
                } else {
                    $('#exampleCheck2').prop('checked', false);
                }

                if(data[0].nso_auth == 'on'){
                    $('#exampleCheck3').prop('checked', true);
                } else {
                    $('#exampleCheck3').prop('checked', false);
                }

                if(data[0].marriage_contract == 'on'){
                    $('#exampleCheck4').prop('checked', true);
                } else {
                    $('#exampleCheck4').prop('checked', false);
                }

                if(data[0].transcript_records == 'on'){
                    $('#exampleCheck5').prop('checked', true);
                } else {
                    $('#exampleCheck5').prop('checked', false);
                }

                if(data[0].transfer_creds == 'on'){
                    $('#exampleCheck6').prop('checked', true);
                } else {
                    $('#exampleCheck6').prop('checked', false);
                }

                if(data[0].clearance == 'on'){
                    $('#exampleCheck7').prop('checked', true);
                } else {
                    $('#exampleCheck7').prop('checked', false);
                }

                $('#remarksId').val(data[0].remarks);

            });
        });

        //View for endorseModal 
        $('body').on('click', '#viewEndorse', function (){
            let viewEndorseUrl = $(this).data('url');
            $.get(viewEndorseUrl, function(data){
                $('#endorseModal').modal('show');
                //console.log(data);
                $('#full_name3').text(data[0].first_name + ' ' + data[0].middle_name + ' ' + data[0].last_name);
                $('#endIdHidden').val(data[0].id);

                $.get('/programList', function(item){
                    let coursePrio = item.filter(item => item.id === data[0].course_prio).map(item => item.description);
                    let coursePrio2 = item.filter(item => item.id === data[0].course_second_prio).map(item => item.description);
                    let coursePrio3 = item.filter(item => item.id === data[0].course_third_prio).map(item => item.description);

                    $('#coursePrio').text(coursePrio.toString());
                    $('#coursePrio2').text(coursePrio2.toString());
                    $('#coursePrio3').text(coursePrio3.toString());

                    console.log(coursePrio.toString());
                    for(let key in item){
                        $('#courseSelect').append('<option value="' + item[key].id + '">' + item[key].description + '</option>');
                        $('#courseSelect2').append('<option value="' + item[key].id + '">' + item[key].description + '</option>');
                        $('#courseSelect3').append('<option value="' + item[key].id + '">' + item[key].description + '</option>');
                        //console.log(key + ' - ' + item[key].description);
                    }
                });
            });
        });

        //Endorse for other course
        $("#endorseStudent").click(function(event){
            event.preventDefault();
            let id = $("#endIdHidden").val();
            let courseSelect = $('#courseSelect option:selected').val();
            let courseSelect2 = $('#courseSelect2 option:selected').val();
            let courseSelect3 = $('#courseSelect3 option:selected').val();
            let _token   = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "/endorse",
                type:"POST",
                data:{
                id: id,
                courseSelect: courseSelect,
                courseSelect2: courseSelect2,
                courseSelect3: courseSelect3,
                _token: _token
                },
                success:function(response){
                console.log(response);
                if(response) {
                    alert('Successfully endorsed to other course.')
                    
                    location.reload();
                    // $("#endorseStudent")[0].prop('disabled', true);
                }
                },
                error: function(error) {
                console.log(error);
                    alert('Error, please select three courses.');
                }
            });
        });
    });
    </script>
@endsection