@extends('layouts.app', ['activePage' => 'assign-employees', 'title' => 'Enrollment Pre-registration Module', 'navName' => 'Employee Management', 'activeButton' => 'programhead'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mb-3">
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
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script type="text/javascript">
        $(document).ready(function() {
            // Javascript method's body can be found in assets/js/demos.js
            demo.initDashboardPageCharts();
            //demo.showNotification();
        });
    </script>
@endpush