@extends('layouts.alumni', ['title' => 'Alumni Consent'])
@section('content')
    <div class="consent-cont">
        <div class="card col-lg-10" id="about">
            <div class="card-body">
                <img src="img/intro-page.jpg" style="width: 100%">
                <div class="justify-content-between pt-3">
                    <button type="button" class="btn btn-primary" id="fbpage">DOrSU Page Alumni</button>
                    <button type="button" class="btn btn-primary" id="login">LOGIN</button>
                    <button type="button" class="btn btn-primary" id="fbnews">DOrSU News</button>
                </div>
            </div>
        </div>
        <div class="card col-lg-10" hidden id="consent">
            <div class="card-body">
                <img src="img/consent.jpg" style="width: 100%;">
                <div class="justify-content-between pt-3">
                    <button type="button" class="btn btn-default" id="disagree">I do not agree for giving my
                        consent</button>
                    <button type="button" class="btn btn-primary" id="agree">I agree</button>
                </div>
            </div>
        </div>
    </div>
<script>
$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })

    $("#disagree").click(function() {});
    $("#fbpage").click(function() {
        window.open("https://www.facebook.com/dorsualumni");
    });
    $("#fbnews").click(function() {
        window.open("https://www.facebook.com/groups/226578527812498");
    });

    $("#agree").click(function() {
        // window.location.href = 'acceptConsent';
        $.ajax({
            url: "{{ route('acceptConsent') }}",
            type: 'post',
            success: function(data) {
                console.log(data);
                if (data) {
                    window.location.href = 'alumni';
                }
            }
        })
    });
    $("#login").click(function() {
        $("#about").addClass("fadeInUp");
        setTimeout(function() {
            $("#about").prop('hidden', true);
            $("#consent").prop('hidden', false).addClass("fadeInDown");
        }, 500);
    })
});
</script>
@endsection