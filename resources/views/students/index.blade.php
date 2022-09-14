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
                            <table class="table table-hover table-striped">
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
                                    <!--@foreach ($incoming_students as $incoming_student)
                                        <tr>
                                            <td>{{ $incoming_student->first_name }} {{ $incoming_student->middle_name }} {{ $incoming_student->last_name }}</td>
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
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                                                Modal
                                            </button>
                                            </td>
                                        </tr>
                                    @endforeach -->
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
                                    <th>Course</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Actions</th>
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
                                            @if ($student->acronyms == NULL)
                                                <td>{{ $student->acronyms }}</td>
                                            @else
                                                <td>{{ $student->acronyms }}</td>
                                            @endif
                                            <td>{{ $student->application_status }}</td>
                                            @if ($student->student_status == NULL)
                                                <td>{{ __('Ongoing') }}</td>
                                            @else
                                                <td>{{ $student->student_status }}</td>
                                            @endif
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
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="incomingStudentName">Files Submitted</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <form action="">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Form 138</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck2">
                                <label class="form-check-label" for="exampleCheck2">Good Moral Certificate</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck3">
                                <label class="form-check-label" for="exampleCheck3">NSO Authentication</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck4">
                                <label class="form-check-label" for="exampleCheck4">Marriage Contract</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck5">
                                <label class="form-check-label" for="exampleCheck5">Transcript of Records</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck6">
                                <label class="form-check-label" for="exampleCheck6">Transfer Credentials</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck7">
                                <label class="form-check-label" for="exampleCheck7">Clearance</label>
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control" id="exampleFormControlTextarea1" height="200px"></textarea>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Submit</button>
            </div>
            </div>
        </div>
    </div>
@endsection