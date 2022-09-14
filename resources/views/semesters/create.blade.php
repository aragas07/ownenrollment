@extends('layouts.app', ['activePage' => 'add-semester', 'title' => 'Enrollment Pre-registration Module', 'navName' => 'Semester Management', 'activeButton' => 'semesters'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="card">
                        <div class="card-header">
                            Enrollment Pre-registration
                        </div>
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
                                    <div class="col text-center">
                                        <button type="submit" class="btn btn-primary ">Open Pre-registration</button>
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