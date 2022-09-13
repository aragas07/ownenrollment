@extends('layouts.app', ['activePage' => 'students', 'title' => 'Students List - DOrSU', 'navName' => 'Students', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            <h4 class="card-title">Incoming Students List</h4>
                            <p class="card-category">{{ __('Editable through if else') }}</p>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped" id="incomingStudents">
                                <thead>
                                    <th>Name</th>
                                    <th>Course(1st Priority)</th>
                                    <th>Course(2nd Priority)</th>
                                    <th>Course(3rd Priority)</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </thead>
                                <tbody>
                                    @foreach ($incoming_students as $incoming_student)
                                        <tr>
                                            <td class="stud-name td-name">{{ $incoming_student->first_name }} {{ $incoming_student->middle_name }} {{ $incoming_student->last_name }}</td>
                                            <td>{{ $incoming_student->course_prio }}</td>
                                            <td>{{ $incoming_student->course_second_prio }}</td>
                                            <td>{{ $incoming_student->course_third_prio }}</td>
                                            <td>{{ $incoming_student->is_accepted }}</td>
                                            @if ($incoming_student->is_accepted == NULL)
                                                <td>{{ __('Ongoing') }}</td>
                                            @else
                                                <td>{{ __('Accepted') }}</td>
                                            @endif
                                            <td>
                                            <a class="btn btn-primary btn-sm mx-1" href="incoming-students/{{ $incoming_student->id }}" role="button">View</a> 
                                            <a class="btn btn-primary btn-sm mx-1" href="requirements/{{ $incoming_student->id }}" role="button">Requirements</a> 
                                                <!-- <button type="button" class="btn btn-primary btn-sm btnCheck" id="show-user" data-toggle="modal" data-target="#exampleModal" onclick="checkModal({{ $incoming_student->id }})">
                                                    Requirements
                                                </button> -->
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex float-right pr-4">
                                {{ $incoming_students->appends(['sort' => 'incoming_students'])->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            <h4 class="card-title">Accepted Students List</h4>
                            <p class="card-category">{{ __('Editable through if else') }}</p>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped" id="incomingStudents">
                                <thead>
                                    <th>Name</th>
                                    <th>Course(1st Priority)</th>
                                    <th>Course(2nd Priority)</th>
                                    <th>Course(3rd Priority)</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </thead>
                                <tbody>
                                    @foreach ($accepted_students as $accepted_student)
                                        <tr>
                                            <td class="stud-name td-name">{{ $accepted_student->first_name }} {{ $accepted_student->middle_name }} {{ $accepted_student->last_name }}</td>
                                            <td>{{ $accepted_student->course_prio }}</td>
                                            <td>{{ $accepted_student->course_second_prio }}</td>
                                            <td>{{ $accepted_student->course_third_prio }}</td>
                                            <td>{{ $accepted_student->is_accepted }}</td>
                                            @if ($accepted_student->is_accepted == NULL)
                                                <td>{{ __('Ongoing') }}</td>
                                            @else
                                                <td>{{ __('Accepted') }}</td>
                                            @endif
                                            <td>
                                            <a class="btn btn-primary btn-sm mx-1" href="incoming-students/{{ $accepted_student->id }}" role="button">View</a> 
                                            <a class="btn btn-primary btn-sm mx-1" href="requirements/{{ $accepted_student->id }}" role="button">Requirements</a>
                                            <a class="btn btn-primary btn-sm mx-1" href="assignID/{{ $accepted_student->id }}" role="button">Assign School ID</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex float-right pr-4">
                                {{ $incoming_students->appends(['sort' => 'incoming_students'])->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            <h4 class="card-title">Advised Students List</h4>
                            <p class="card-category">{{ __('Editable through if else') }}</p>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped" id="incomingStudents">
                                <thead>
                                    <th>Name</th>
                                    <th>Course(1st Priority)</th>
                                    <th>Course(2nd Priority)</th>
                                    <th>Course(3rd Priority)</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </thead>
                                <tbody>
                                    @foreach ($advised_students as $advised_student)
                                        <tr>
                                            <td class="stud-name td-name">{{ $advised_student->first_name }} {{ $advised_student->middle_name }} {{ $advised_student->last_name }}</td>
                                            <td>{{ $advised_student->course_prio }}</td>
                                            <td>{{ $advised_student->course_second_prio }}</td>
                                            <td>{{ $advised_student->course_third_prio }}</td>
                                            <td>{{ $advised_student->is_accepted }}</td>
                                            @if ($advised_student->is_accepted == NULL)
                                                <td>{{ __('Ongoing') }}</td>
                                            @else
                                                <td>{{ __('Accepted') }}</td>
                                            @endif
                                            <td>
                                            <a class="btn btn-primary btn-sm mx-1" href="incoming-students/{{ $advised_student->id }}" role="button">View</a> 
                                            <a class="btn btn-primary btn-sm mx-1" href="requirements/{{ $advised_student->id }}" role="button">Requirements</a> 
                                                <!-- <button type="button" class="btn btn-primary btn-sm btnCheck" id="show-user" data-toggle="modal" data-target="#exampleModal" onclick="checkModal({{ $incoming_student->id }})">
                                                    Requirements
                                                </button> -->
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex float-right pr-4">
                                {{ $incoming_students->appends(['sort' => 'incoming_students'])->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            <h4 class="card-title">Old Students List</h4>
                            <p class="card-category">{{ __('Editable through if else') }}</p>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th>School ID</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                </thead>
                                <tbody>
                                    @foreach ($students as $student)
                                        <tr>
                                            @if ($student->school_id == NULL)
                                                <td>{{ __('Not yet advised') }}</td>
                                            @else
                                                <td>{{ $student->school_id }}</td>
                                            @endif
                                            <td>{{ $student->first_name }} {{ $student->middle_name }} {{ $student->last_name }}</td>
                                        
                                            <td>
                                            <a class="btn btn-primary btn-sm mx-1" href="students/{{ $student->id }}" role="button">View</a> 
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                                                Modal
                                            </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex float-right pr-4">
                                {{ $students->appends(['sort' => 'students'])->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal New -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="checkModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="incomingStudentName">Files Submitted by <span id="first_name"></span> <span id="last_name"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <form action="/checkFiles" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <input type="hidden" value="" id="modal_student_id" name="id">
                            <div class="form-check">
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
                            <div class="mb-3">
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="remarks" placeholder="Remarks"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-6">
                                    <button type="button" class="btn btn-primary btn-lg btn-block">Accept</button>
                                </div>
                                <div class="col-sm-6">
                                    <button type="button" class="btn btn-primary btn-lg btn-block">Advice</button>
                                </div>
                            </div>
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
    
@endsection