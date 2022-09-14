@extends('layouts.app', ['activePage' => 'manage-employee', 'title' => 'Enrollment Pre-registration Module', 'navName' => 'Employee Management', 'activeButton' => 'employees'])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card striped-tabled-with-hover">
                    <div class="card-header ">
                        <h4 class="card-title">Employees</h4>
                        <p class="card-category">{{ __('Lists of employees') }}</p>
                    </div>
                    <div class="card-body table-full-width table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Employed by</th>
                                <th>Started</th>
                                <th>Status</th>
                            </thead>
                            <tbody>
                                @foreach ($employees as $employee)
                                    <tr>
                                        <td>{{ $employee->id }} - {{ $employee->first_name }} {{ $employee->last_name }}</td>
                                        <td>{{ $employee->email }}</td>
                                        <td>{{ $employee->employed_by }}</td>
                                        <td>{{ $employee->date_started }}</td>
                                        <td>{{ $employee->date_ended }}</td>
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