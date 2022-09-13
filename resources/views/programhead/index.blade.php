@extends('layouts.app', ['activePage' => 'manage-advisers', 'title' => 'Enrollment Pre-registration Module', 'navName' => 'Program Head Management', 'activeButton' => 'advisers'])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Assign Adviser
                    </div>
                    <div class="card-body">
                        <form action="/program-head" method="post">
                            @csrf
                            <div class="form-row mb-3">
                                <div class="col-sm-4">
                                    <select class="form-select form-control" aria-label="semester" id="employee_id" name="employee_id">
                                        <option selected>Choose Employee</option>
                                        @foreach ($employees as $employee)
                                        <option value="{{ $employee->id }}">{{ $employee->first_name }} {{ $employee->last_name }}</option>
                                        @endforeach
                                    </select> 
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-select form-control" aria-label="semester" id="academic_year" name="academic_year">
                                        <option selected>School Year</option>
                                        @for($i = -1; $i < 3; $i++)
                                        <option value="{{ date('Y') + $i }}-{{ date('Y') + $i + 1 }}">{{ date('Y') + $i }}-{{ date('Y') + $i + 1 }}</option>
                                        @endfor
                                    </select> 
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-select form-control" aria-label="semester" id="semester" name="semester">
                                        <option selected>Semester</option>
                                        <option value="First Semester">First Semester</option>
                                        <option value="Second Semester">Second Semester</option>
                                        <option value="Summer Semester">Summer Semester</option>
                                        <option value="Late Semester">Late Semester</option>
                                    </select>  
                                </div>
                                <div class="col-sm-2">
                                    <button type="submit" class="btn btn-primary ">Assign Adviser</button>
                                </div>
                            </div>
                        </form> 
                    </div>
                </div>
                <div class="card striped-tabled-with-hover">
                    <div class="card-header ">
                        <h4 class="card-title"></h4>
                        <p class="card-category">{{ __('Lists of Advisers') }}</p>
                    </div>
                    <div class="card-body table-full-width table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>Employee ID</th>
                                <th>Full Name</th>
                                <th>Assigned By</th>
                                <th>Date Started</th>
                                <th>Date Ended</th>
                            </thead>
                            <tbody>
                                @foreach ($advisers as $advisers)
                                    <tr>
                                        <td>{{ $advisers->first_name }} {{ $advisers->last_name }}</td>
                                        <td>{{ $advisers->email }}</td>
                                        <td>{{ $advisers->assigned_by }}</td>
                                        <td>{{ $advisers->date_started }}</td>
                                        <td>{{ $advisers->date_ended }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection