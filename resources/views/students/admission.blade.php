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
                    <h4 class="modal-title" id="incomingStudentName">Files submitted by <span id="full_name" style="font-weight: 600;"></span></h4>
                </div>
                <div class="modal-body">
                    <div class="row">                       
                        <div class="col-sm-12">
                            <div class="form-check">
                                <input type="hidden" id="reqIdHidden" name="reqIdHidden">
                                <input type="checkbox" class="form-check-input" id="student_profile" name="student_profile">
                                <label class="form-check-label" for="student_profile">Student's Profile Form</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="suast_result" name="suast_result">
                                <label class="form-check-label" for="suast_result">SUAST Examination Result</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="form_138" name="form_138">
                                <label class="form-check-label" for="form_138">Form 138-A /HS report card</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="als_pept" name="als_pept">
                                <label class="form-check-label" for="als_pept">Certification from the school division superintendent (for ALS & PEPT passer only)</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="good_moral" name="good_moral">
                                <label class="form-check-label" for="good_moral">Certificate of Good Moral Character</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="nso_auth" name="nso_auth">
                                <label class="form-check-label" for="nso_auth">Certified NSO/PSA birth certificate</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="marriage_contract" name="marriage_contract">
                                <label class="form-check-label" for="marriage_contract">Marriage contract (for married female only)</label>
                            </div>                            
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="id_picture" name="id_picture">
                                <label class="form-check-label" for="id_picture">3 pcs. 2x2 ID picture</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="long_b_env" name="long_b_env">
                                <label class="form-check-label" for="long_b_env">Long brown envelope</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="win_env_stamp" name="win_env_stamp">
                                <label class="form-check-label" for="win_env_stamp">1 window envelope with mailing stamp</label>
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
                    <button type="submit" class="btn btn-primary">Save Only</button>
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
    
<script>
$(document).ready(function(){

    //yajra datatables
    $('#ajax-crud-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ url('ajaxIndex') }}",
        
        columns: [
        { data: 'school_id', name: 'school_id' },
        { data: 'fullname', name: 'fullname' },
        { data: 'description', name: 'program.description' },        
        { data: 'campus', name: 'campus' },
        { data: 'action', name: 'action', orderable: false },
        ],
        order: [[2, 'asc']]
    });

    //check specific students requirements submitted
    $('body').on('click', '#checkRequirements', function (){
        let requirementsUrl = $(this).data('url');
        $.get(requirementsUrl, function(data){
            $('#exampleModal').modal('show');

            $('#full_name').text(data[0].first_name + ' ' + data[0].middle_name + ' ' + data[0].last_name);
            $('#reqIdHidden').val(data[0].id);
            if(data[0].student_profile == 'on'){
                $('#student_profile').prop('checked', true);
            } else {
                $('#student_profile').prop('checked', false);
            }

            if(data[0].suast_result == 'on'){
                $('#suast_result').prop('checked', true);
            } else {
                $('#suast_result').prop('checked', false);
            }

            if(data[0].form_138 == 'on'){
                $('#form_138').prop('checked', true);
            } else {
                $('#form_138').prop('checked', false);
            }

            if(data[0].als_pept == 'on'){
                $('#als_pept').prop('checked', true);
            } else {
                $('#als_pept').prop('checked', false);
            }

            if(data[0].good_moral == 'on'){
                $('#good_moral').prop('checked', true);
            } else {
                $('#good_moral').prop('checked', false);
            }

            if(data[0].nso_auth == 'on'){
                $('#nso_auth').prop('checked', true);
            } else {
                $('#nso_auth').prop('checked', false);
            }

            if(data[0].marriage_contract == 'on'){
                $('#marriage_contract').prop('checked', true);
            } else {
                $('#marriage_contract').prop('checked', false);
            }

            if(data[0].id_picture == 'on'){
                $('#id_picture').prop('checked', true);
            } else {
                $('#id_picture').prop('checked', false);
            }

            if(data[0].long_b_env == 'on'){
                $('#long_b_env').prop('checked', true);
            } else {
                $('#long_b_env').prop('checked', false);
            }

            if(data[0].win_env_stamp == 'on'){
                $('#win_env_stamp').prop('checked', true);
            } else {
                $('#win_env_stamp').prop('checked', false);
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
});
</script>
    
@endsection