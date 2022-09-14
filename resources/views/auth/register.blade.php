@extends('layouts.temp', ['activePage' => 'register', 'title' => 'DOrSU'])

@section('content')
<div class="full-page register-page section-image" data-color="orange"
    data-image="{{ asset('light-bootstrap/img/dorsu-background.jpg') }}">
    <div class="content">
        <div class="container">
            <div class="card card-register card-plain text-center">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-md-5 ml-auto">
                            <div class="media">
                                <div class="media-left">
                                    <div class="icon">
                                        <i class="nc-icon nc-circle-09"></i>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h4>{{ __('Create an Acount') }}</h4>
                                    <p>{{ __('Here you can write a feature description for your dashboard, let the users know what is the value that you give them.') }}
                                    </p>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-left">
                                    <div class="icon">
                                        <i class="nc-icon nc-preferences-circle-rotate"></i>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h4>{{ __('Awesome Performances') }}</h4>
                                    <p>{{ __('Here you can write a feature description for your dashboard, let the users know what is the value that you give them.') }}
                                    </p>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-left">
                                    <div class="icon">
                                        <i class="nc-icon nc-planet"></i>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h4>{{ __('Global Support') }}</h4>
                                    <p>{{ __('Here you can write a feature description for your dashboard, let the users know what is the value that you give them.') }}
                                    </p>
                                </div>
                            </div>
                            <form action="{{route('stud_csv')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="file" required name="uploadedfile" id="">
                                <input type="submit" value="Submit"> 
                            </form>
                        </div>
                        <div class="col-md-3"></div>
                        <div class="col-md-4 mr-auto">
                            <form id="form">
                                @csrf
                                <div class="card card-plain p-3">
                                    <div class="content">
                                        <div class="form-group">
                                            <input type="text" name="username" id="username" class="form-control"
                                                placeholder="{{ __('Username') }}" value="{{ old('username') }}"
                                                required autofocus>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="name" id="name" class="form-control"
                                                placeholder="{{ __('Name') }}" value="{{ old('name') }}" required
                                                autofocus>
                                        </div>

                                        <div class="form-group"> {{-- is-invalid make border red --}}
                                            <input type="email" name="email" value="{{ old('email') }}"
                                                placeholder="Enter email" class="form-control" required>
                                        </div>

                                        <div class="form-group"> {{-- is-invalid make border red --}}
                                            <select class="custom-select" id="intitute_id" name="institute_id">
                                                <option selected>Choose...</option>
                                                <option value="1">Institute of Computing and Engineering</option>
                                                <option value="2">Institute of Business and Public Affairs</option>
                                                <option value="3">Institure of Education and Teacher Training</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control" required
                                                placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password_confirmation"
                                                placeholder="Password Confirmation" class="form-control" required
                                                autofocus>
                                        </div>
                                        <div class="form-group d-flex justify-content-center">
                                            <div class="form-check rounded col-md-10 text-left">
                                                <label class="form-check-label text-white d-flex align-items-center">
                                                    <input class="form-check-input" name="agree" type="checkbox"
                                                        required>
                                                    <span class="form-check-sign"></span>
                                                    <b>{{ __('Agree with terms and conditions') }}</b>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="footer text-center">
                                            <button type="submit"
                                                class="btn btn-fill btn-neutral btn-wd">{{ __('Create Free Account') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col">
                            @foreach ($errors->all() as $error)
                            <div class="alert alert-warning alert-dismissible fade show">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close"> &times;</a>
                                {{ $error }}
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(function() {
    $("#form").submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr("action"),
            method: 'POST',
            data: new FormData(this),
            contentType: false,
            cache: false,
            dataType: 'json',
            processData: false,
            success: function(result) {
                console.log(result);
            },
            error: function(xhr, status, error) {
                var err = eval("(" + xhr.responseText + ")");
                console.log(err.Message);
            }
        })
    })
})
</script>
@endsection