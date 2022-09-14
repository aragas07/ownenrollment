@extends('layouts.alumni', ['title' => 'Alumni', 'active'=>'Personal Information'])
@section('content')
<div class="content-wrapper">
    <div class="main-container">
        <div class="container-xl p-3">
            <div class="row justify-content-between align-items-center">
                <div class="col flex-shrink-0 mb-3 mb-md-0">
                    <h1 class="display-5 mb-0">Personal Info</h1>
                </div>
                <div class="col">
                  <button class="btn btn-default float-right" id="edit" style="padding: 5px 25px">Edit</button>
                </div>
            </div>
        </div>
        @foreach($user as $data)
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane">
                    <form action="database/auth.php" method="post" enctype="multipart/form-data">
                      <div class="col-12 row">
                        <div class="col-3">
                          <img src="img/businessperson.png" alt="" class="col-12">
                            <button id="custom-btn" class="btn btn-default col-12 mb-2 mt-2" type="button">CHOOSE IMAGE</button>
                            <input type="file" name="file" accept="image/x-png,image/gif,image/jpeg" hidden id="default-btn">
                        </div>
                        <div class="col-9">
                            <div class="form-group row">
                              <label class="col-sm-2 col-form-label">First name</label>
                              <div class="col-sm-10">
                                <input class="form-control form-control-sm" disabled type="text" value="{{ $data->first_name }}" name="fname">
                              </div>    
                            </div>
                            <div class="form-group row">
                              <label class="col-sm-2 col-form-label">Middle name</label>
                              <div class="col-sm-10">
                                <input class="form-control form-control-sm" disabled type="text" value="{{ $data->middle_name }}" name="mname">
                              </div>    
                            </div>
                            <div class="form-group row">
                              <label class="col-sm-2 col-form-label">Last name</label>
                              <div class="col-sm-10">
                                <input class="form-control form-control-sm" disabled type="text" value="{{ $data->last_name }}" name="lname">
                              </div>    
                            </div>
                            <div class="form-group row">
                              <label class="col-sm-2 col-form-label">Birth</label>
                              <div class="col-sm-10">
                                <input class="form-control form-control-sm" disabled type="date" value="{{ $data->birthdate }}" name="birth">
                              </div>    
                            </div>
                        </div>
                      </div>
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Gender</label>
                          <div class="col-sm-4">
                            <select name="gender" disabled class="form-control form-control-sm">
                              <option value="1">Male</option>
                              <option @if($data->sex == 0) selected @endif value="0">Female</option>
                            </select>
                          </div>    
                          <label class="col-sm-2 col-form-label">Marital Status</label>
                          <div class="col-sm-4">
                            <select name="status" class="form-control form-control-sm" disabled value="">
                              <option value="Single">Single</option>
                              <option @if($data->civil_status == 'Married') selected @endif value="Married">Married</option>
                              <option @if($data->civil_status == 'Separated') selected @endif value="Separated">Separated</option>
                            </select>
                          </div>    
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Citizen</label>
                          <div class="col-sm-4">
                            <input class="form-control form-control-sm" type="text" disabled value="{{$data->citizenship}}" name="citizen">
                          </div>    
                          <label class="col-sm-2 col-form-label">Zipcode</label>
                          <div class="col-sm-4">
                            <input class="form-control form-control-sm" type="text" disabled value="{{$data->zipcode}}" name="zipcode">
                          </div>    
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Religion</label>
                          <div class="col-sm-10">
                            <input class="form-control form-control-sm" type="text" disabled value="{{$data->religion}}" name="religion">
                          </div>    
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Address</label>
                          <div class="col-sm-10">
                            <input class="form-control form-control-sm" type="text" disabled value="{{$data->c_address}}" name="presaddress">
                          </div>    
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Spouse</label>
                          <div class="col-sm-10">
                            <input class="form-control form-control-sm" type="text" disabled value="{{$data->spouse_name}}" name="spouse">
                          </div>    
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Contact #</label>
                          <div class="col-sm-10">
                            <input class="form-control form-control-sm" type="text" disabled value="{{$data->contact_number}}" name="contact">
                          </div>    
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Facebook</label>
                          <div class="col-sm-10">
                            <input class="form-control form-control-sm" type="text" disabled value="{{$data->fb_account}}" name="facebook">
                          </div>    
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Twitter</label>
                          <div class="col-sm-10">
                            <input class="form-control form-control-sm" type="text" disabled value="{{$data->twitter}}" name="twitter">
                          </div>    
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Instagram</label>
                          <div class="col-sm-10">
                            <input class="form-control form-control-sm" type="text" disabled value="{{$data->instagram}}" name="instagram">
                          </div>    
                        </div>
                      <input type="hidden" name="id" value="">
                      <input type="submit" value="Submit" class="btn btn-default" name="upd-pro" id="upd-pro" disabled>
                    </form>
                    <!-- /.post -->
                  </div>
                </div>
              </div><!-- /.card-body -->
            </div>
          </div>
        @endforeach
    </div>
</div>
<script>
  $(function(){
    $("#edit").click(function(){
      $("input").attr('disabled',!$("input").attr('disabled'));
      $("select").attr('disabled',!$("select").attr('disabled'));
    })
  })
</script>
@endsection