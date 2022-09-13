@extends('layouts/temp', ['activePage' => 'login', 'title' => 'DOrSU'])
@section('content')
<div class="cont">
    <img src="{{asset('light-bootstrap/img/sideimage.png')}}" class="cont-img">
    <div class="login w-30per justify">
        <div class="cont-login col-md-11">
            <form class="form" id="myform" method="POST">
                @csrf
                <p class="text-mobile size">Welcome, Tatenian</p>
                <div class="form-group row">
                    <i class="fa fa-envelope left-icon"></i>
                    <input type="text" placeholder="Username"
                        class="col inp inp-text @error('username') is-invalid @enderror" name="username"
                        value="{{ old('username') }}" required autocomplete="username" autofocus>
                    @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group row">
                    <i class="fa fa-lock left-icon"></i>
                    <input type="password" placeholder="password"
                        class="col inp inp-text @error('password') is-invalid @enderror" name="password"
                        value="{{ old('password') }}" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="row justify-content-between">
                    <button type="submit" class="btn-log">Log in</button>
                    @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                    @endif
                </div>
            </form>
        </div>
    </div>
    <svg height="100%" width="width" xmlns="http://www.w3.org/2000/svg">
        <ellipse id="svgelem" cx="7" cy="0" rx="35%" ry="100%" stroke-width="4" fill="blue" />
    </svg>
</div>
</div>
<div class="body">
    <h1>DOrSU CORE VALUES</h1>
    <div class="row in-m">
        <div class="card-core col-md-2">
            <img src="light-bootstrap/img/praying.png">
            <div class="flabel">
                <h5>God-centered and Humane</h5>
            </div>
        </div>
        <div class="card-core col-md-2">
            <img src="light-bootstrap/img/critical thinking.jpg">
            <div class="flabel">
                <h5>Critical thinking and Creativity</h5>
            </div>
        </div>
        <div class="card-core col-md-2">
            <img src="light-bootstrap/img/discipline and competence.jpg">
            <div class="flabel">
                <h5>Discipline and Competence</h5>
            </div>
        </div>
        <div class="card-core col-md-2">
            <img src="light-bootstrap/img/cac.png">
            <div class="flabel">
                <h5>Commitment and Collaboration</h5>
            </div>
        </div>
        <div class="card-core col-md-2">
            <img src="light-bootstrap/img/sustain.jpg">
            <div class="flabel">
                <h5>Resilience and Sustainability</h5>
            </div>
        </div>
    </div>
    <section class="gray p-5">
        <div class="ndfHFb-c4YZDc-aTv5jf-NziyQe-Bz112c"></div>
        <video width="50%" controls>
            <source src="bootstrap/light-bootstrap/img/virtualspacetutorial.mp4" type="video/mp4">
        </video>
    </section>
    <h1>RESOURCES</h1>
    <section class="resource p-5 text-center">
    </section>
</div>
<script>
$(function() {
    let b = 1;
    $(".m-search").click(function() {
        if (b == 1) {
            $("#search").css({
                'width': 200,
                'visibility': 'visible'
            });
            $(this).css({
                'color': 'black'
            });
        } else {
            $("#search").css({
                'width': 0,
                'visibility': 'hidden'
            });
            $(this).css({
                'color': 'white'
            });
        }
        b = -b;
    })

    $("#myform").on('submit', function(e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var name = $("input[name=username]").val();
        var password = $("input[name=password]").val();
        $.ajax({
            type: 'post',
            url: "{{ route('userlogin') }}",
            data: {
                username: name,
                password: password
            },
            success: function(data) {
                
                if (data.success) {
                    location.href = "{{ route('choose')}}"
                } else {
                    swal({
                        text: data.error,
                        icon: "error",
                        button: "Ok",
                    });
                }
            },
            error: function(xhr, status, error) {
                alert(xhr.responseText + " error");
            }
        });
    })
})
</script>
@endsection