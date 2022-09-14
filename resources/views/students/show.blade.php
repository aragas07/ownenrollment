@extends('layouts.app', ['activePage' => 'students', 'title' => 'Students List - DOrSU', 'navName' => 'Students', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            <h4 class="card-title">Student Profile</h4>
                            <p class="card-category">{{ __('Editable through if else') }}</p>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <form class="mx-3">
                                <div class="row">
                                    <div class="col-md-4 form-group py-0">
                                        <label for="name">First Name</label>
                                        <input type="email" class="form-control" id="name" aria-describedby="emailHelp" value="{{ $student->first_name }}" disabled>
                                    </div>
                                    <div class="col-md-4 form-group py-0">
                                        <label for="name">Middle Name</label>
                                        <input type="email" class="form-control" id="name" aria-describedby="emailHelp" value="{{ $student->middle_name }}" disabled>
                                    </div>
                                    <div class="col-md-4 form-group py-0">
                                        <label for="name">Last Name</label>
                                        <input type="email" class="form-control" id="name" aria-describedby="emailHelp" value="{{ $student->last_name }}" disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 form-group py-0">
                                        <label for="name">First Name</label>
                                        <input type="email" class="form-control" id="name" aria-describedby="emailHelp" value="{{ $student->first_name }}" disabled>
                                    </div>
                                    <div class="col-md-4 form-group py-0">
                                        <label for="name">Middle Name</label>
                                        <input type="email" class="form-control" id="name" aria-describedby="emailHelp" value="{{ $student->middle_name }}" disabled>
                                    </div>
                                    <div class="col-md-4 form-group py-0">
                                        <label for="name">Last Name</label>
                                        <input type="email" class="form-control" id="name" aria-describedby="emailHelp" value="{{ $student->last_name }}" disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary">Submit</button>   
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