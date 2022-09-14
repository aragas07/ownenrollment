@extends('layouts.app', ['activePage' => 'manage-employee', 'title' => 'Enrollment Pre-registration Module', 'navName' => 'Employee Management', 'activeButton' => 'employees'])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
<<<<<<< HEAD
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
=======
                <div class="card strpied-tabled-with-hover">
                    <div class="card-header ">
                        <h4 class="card-title">Employee List</h4>
                        <div class="pull-right" style="margin-top: -2em;">
                            <button type="button" class="btn btn-primary" id="addStaff" data-bs-toggle="modal" data-bs-target="#addStaffModal">
                                Add Staff
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-striped" style="width:100%" id="employees-datatable">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
>>>>>>> 4902ee9d50166865fed8abff13e702c06e03287b
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<<<<<<< HEAD
=======

<!-- Modal for Adding Staff -->
<div class="modal fade" id="addStaffModal" tabindex="-1" role="dialog" aria-labelledby="addStaffLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Designation</h4>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <form action="/semesters" method="post">
                            @csrf
                            <div class="form-row mb-3">
                                <div class="col">
                                    <label for="schoolYear">School Year</label>
                                    <select class="form-select form-control" aria-label="semester" id="school_year" name="school_year">
                                        <option selected>Choose---</option>
                                        @for($i = -1; $i < 3; $i++)
                                        <option value="{{ date('Y') + $i }}-{{ date('Y') + $i + 1 }}">{{ date('Y') + $i }}-{{ date('Y') + $i + 1 }}</option>
                                        @endfor
                                    </select> 
                                </div>
                                <div class="col">
                                    <label for="semester">School Semester</label>
                                    <select class="form-select form-control" aria-label="semester" id="semester" name="semester">
                                        <option selected>Choose---</option>
                                        <option value="First Semester">First Semester</option>
                                        <option value="Second Semester">Second Semester</option>
                                        <option value="Summer Semester">Summer Semester</option>
                                        <option value="Late Semester">Late Semester</option>
                                    </select>  
                                </div>
                            </div>
                            <div class="form-row mb-3">
                                <div class="col">
                                    <label for="users_name">Employee Name</label>
                                    <select class="form-select form-control" aria-label="users_name" id="users_name" name="users_name">
                                        <option selected>Choose---</option>
                                    </select> 
                                </div>
                                <div class="col">
                                    <label for="semester">Designation</label>
                                    <select class="form-select form-control" aria-label="designation" id="designation" name="designation">
                                        <option selected>Choose---</option>
                                        <option value="admission-staff">Admission Staff</option>
                                        <option value="adviser">Adviser</option>
                                        <option value="program-head">Program Head</option>
                                        <option value="admission-head">Admission Head</option>
                                    </select>  
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add Staff</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        //yajra datatables
        $('#employees-datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('getEmployees') }}",
            
            columns: [
            { data: 'employeeid', name: 'employees.id' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email'},
            { data: 'action', name: 'action', orderable: false },
            ],
            order: [[2, 'asc']]
        });

        $('#addStaff').click(function(){
            $('#addStaffModal').modal('show');
            
            //Get users list
            $.get('/getUsers', function(data){
                console.log(data);
                $('#users_name').find('option').remove().end();
                $.each(data, function(i, datum){
                    $('#users_name').append('<option value="'+ datum.id +'">' + datum.name + '</option>');
                });
            });
        });

        
    });
</script>

>>>>>>> 4902ee9d50166865fed8abff13e702c06e03287b
@endsection