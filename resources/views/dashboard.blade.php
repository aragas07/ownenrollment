@extends('layouts.app', ['activePage' => 'dashboard', 'title' => 'Enrollment Pre-registration Module', 'navName' => 'Dashboard Controls', 'activeButton' => 'dashboard'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card striped-tabled-with-hover">
                        <div class="card-header ">
                            <h4 class="card-title">School Year & Semester</h4>
                            <p class="card-category">{{ __('Current opened semester') }}</p>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th>School Year</th>
                                    <th>Semester</th>
                                    <th>Opened at</th>
                                    <th>Opened by</th>
                                    <th>Status</th>
                                </thead>
                                <tbody>
                                    @foreach ($semesters as $semester)
                                        <tr>
                                            <td>{{ $semester->school_year }}</td>
                                            <td>{{ $semester->semester }}</td>
                                            <td>{{ $semester->created_at }}</td>
                                            <td>{{ $semester->email }}</td>
                                            <td>{{ $semester->closed_at }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body" id="admissionCountEnrollee">
                            {{ $counted }} enrollees
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small stretched-link text-end" href="#">View Details</a>
                            <div class="small"><i class="nc-icon nc-stre-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body" id="admissionCountEnrollee">
                            {{ $incoming }} incoming first year
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small stretched-link text-end" href="#">View Details</a>
                            <div class="small"><i class="nc-icon nc-stre-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body" id="admissionCountEnrollee">
                            {{ $transferees }} transferees
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small stretched-link text-end" href="#">View Details</a>
                            <div class="small"><i class="nc-icon nc-stre-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body" id="admissionCountEnrollee">
                            {{ $returning }} returning
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small stretched-link text-end" href="#">View Details</a>
                            <div class="small"><i class="nc-icon nc-stre-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body" id="admissionCountEnrollee">
                            {{ $countAccepted }} accepted by program
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small stretched-link text-end" href="#">View Details</a>
                            <div class="small"><i class="nc-icon nc-stre-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body" id="admissionCountEnrollee">
                            {{ $transferredTo }} transferred to
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small stretched-link text-end" href="#">View Details</a>
                            <div class="small"><i class="nc-icon nc-stre-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body" id="admissionCountEnrollee">
                        {{ $hasSchoolID }} given ID No.
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small stretched-link text-end" href="#">View Details</a>
                            <div class="small"><i class="nc-icon nc-stre-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body" id="admissionCountEnrollee">
                            {{ $countAdvised }} advised
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small stretched-link text-end" href="#">View Details</a>
                            <div class="small"><i class="nc-icon nc-stre-right"></i></div>
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
            demo.initDashboardPageCharts();
        });
    </script>
@endpush