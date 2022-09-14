@extends('layouts.app', ['activePage' => 'manage-semester', 'title' => 'Enrollment Pre-registration Module', 'navName' => 'Semester Management', 'activeButton' => 'semesters'])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card striped-tabled-with-hover">
                    <div class="card-header ">
                        <h4 class="card-title">Semesters List</h4>
                        <p class="card-category">{{ __('Lists of semesters') }}</p>
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
    </div>
</div>
@endsection