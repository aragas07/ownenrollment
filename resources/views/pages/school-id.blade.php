@extends('layouts.app', ['activePage' => 'school-id', 'title' => 'Assign School ID - DOrSU', 'navName' => 'Asign School ID', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            <h4 class="card-title">Assign School ID</h4>
                            <p class="card-category">{{ __('Lists of students waiting for their School ID') }}</p>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th>School ID</th>
                                    <th>Name</th>
                                    <th>Course</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Not Available</td>
                                        <td>Dakota Rice</td>
                                        <td>BSIT</td>
                                        <td>New</td>
                                        <td>Applying</td>
                                    </tr>
                                    <tr>
                                        <td>Not Available</td>
                                        <td>Minerva Hooper</td>
                                        <td>BSEEd</td>
                                        <td>New</td>
                                        <td>Applying</td>
                                    </tr>
                                    <tr>
                                        <td>Not Available</td>
                                        <td>Jarvis Automata</td>
                                        <td>BSIT</td>
                                        <td>New</td>
                                        <td>Applying</td>
                                    </tr>
                                    <tr>
                                        <td>Not Available</td>
                                        <td>Bruce Stark</td>
                                        <td>BSEEd</td>
                                        <td>New</td>
                                        <td>Applying</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection