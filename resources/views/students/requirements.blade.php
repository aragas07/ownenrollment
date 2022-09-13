@extends('layouts.app', ['activePage' => 'students', 'title' => 'Students List - DOrSU', 'navName' => 'Students', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">

                        </div>
                        <div class="card-body">
                            <div class="col-sm-12">
                                @if($student->is_accepted==1)
                                <button type="button" class="btn btn-primary btn-lg btn-block" disabled>Accept</button>
                                @else
                                <a class="btn btn-primary btn-lg btn-block" href="accept/{{ $student->id }}" role="button">Accept</a>
                                @endif
                            </div>
                        </div>
                        <div class="card-footer">

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header ">
                            <h4 class="card-title">Files Submitted by <span id="first_name">{{ $student->first_name }}</span> <span id="last_name">{{ $student->middle_name }}</span> <span id="last_name">{{ $student->last_name }}</span></h4>
                            <p class="card-category">{{ __('Editable through if else') }}</p>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <div class="row">
                                <div class="col-sm-12">                                    
                                    <div class="row px-4">
                                        <form action="/checkFiles" method="post" style="width: 100%">
                                        @csrf
                                        <div class="col-sm-12">
                                            <input type="hidden" value="{{ $student->id }}" id="modal_student_id" name="id">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="form-check">
                                                        @if($student->form_138 == 'on')
                                                        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="form_138" checked>
                                                        <label class="form-check-label" for="exampleCheck1">Form 138</label>
                                                        @else
                                                        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="form_138" value="">
                                                        <label class="form-check-label" for="exampleCheck1">Form 138</label>
                                                        @endif
                                                    </div>
                                                    <div class="form-check">
                                                        @if($student->good_moral == 'on')
                                                        <input type="checkbox" class="form-check-input" id="exampleCheck2" name="good_moral" checked>
                                                        <label class="form-check-label" for="exampleCheck2">Good Moral Certificate</label>
                                                        @else
                                                        <input type="checkbox" class="form-check-input" id="exampleCheck2" name="good_moral" value="">
                                                        <label class="form-check-label" for="exampleCheck2">Good Moral Certificate</label>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-check">
                                                        @if($student->nso_auth == 'on')
                                                        <input type="checkbox" class="form-check-input" id="exampleCheck3" name="nso_auth" checked>
                                                        <label class="form-check-label" for="exampleCheck3">NSO Authentication</label>
                                                        @else
                                                        <input type="checkbox" class="form-check-input" id="exampleCheck3" name="nso_auth" value="">
                                                        <label class="form-check-label" for="exampleCheck3">NSO Authentication</label>
                                                        @endif
                                                    </div>
                                                    <div class="form-check">
                                                        @if($student->marriage_contract == 'on')
                                                        <input type="checkbox" class="form-check-input" id="exampleCheck4" name="marriage_contract" checked>
                                                        <label class="form-check-label" for="exampleCheck4">Marriage Contract</label>
                                                        @else
                                                        <input type="checkbox" class="form-check-input" id="exampleCheck4" name="marriage_contract" value="">
                                                        <label class="form-check-label" for="exampleCheck4">Marriage Contract</label>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-check">
                                                        @if($student->transcript_records == 'on')
                                                        <input type="checkbox" class="form-check-input" id="exampleCheck5" name="transcript_records" checked>
                                                        <label class="form-check-label" for="exampleCheck5">Transcript of Records</label>
                                                        @else
                                                        <input type="checkbox" class="form-check-input" id="exampleCheck5" name="transcript_records" value="">
                                                        <label class="form-check-label" for="exampleCheck5">Transcript of Records</label>
                                                        @endif
                                                    </div>
                                                    <div class="form-check">
                                                        @if($student->transfer_creds == 'on')
                                                        <input type="checkbox" class="form-check-input" id="exampleCheck6" name="transfer_creds" checked>
                                                        <label class="form-check-label" for="exampleCheck6">Transfer Credentials</label>
                                                        @else
                                                        <input type="checkbox" class="form-check-input" id="exampleCheck6" name="transfer_creds" value="off">
                                                        <label class="form-check-label" for="exampleCheck6">Transfer Credentials</label>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-check">
                                                        @if($student->clearance == 'on')
                                                        <input type="checkbox" class="form-check-input" id="exampleCheck7" name="clearance" checked>
                                                        <label class="form-check-label" for="exampleCheck7">Clearance</label>
                                                        @else
                                                        <input type="checkbox" class="form-check-input" id="exampleCheck7" name="clearance" value="">
                                                        <label class="form-check-label" for="exampleCheck7">Clearance</label>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="mb-3">
                                                        <label for="remarks">Remarks</label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1" name="remarks" rows="5" style="height:100%;">{{ $student->remarks }}</textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </form>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
@endsection