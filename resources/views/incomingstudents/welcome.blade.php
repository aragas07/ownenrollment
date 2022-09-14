@extends('incomingstudents.create', ['activePage'=>'stepbystep','title'=>'Register'])
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-header">
                        <img src="{{asset('img/dorsu.png')}}" class="col-12">
                    </div>
                    <div class="card-body">
                        <form>
                            <p class="text-center">Davao Oriental State University Automated Enrolling System</p>
                            <div class="d-grid gap-2">
                                <div class="col-12 mb-3">
                                    <a href="search" class="btn btn-primary col-12">Track Your Ticket</a>
                                </div>
                                <div class="col-12">
                                    <a href="enroll" class="btn btn-primary col-12">Enroll</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        
    </script>
@endsection