@extends('incomingstudents.create', ['title'=>'Search'])
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card" style="min-height: 500px">
                <div class="card-header pb-0">
                    <form id="searchform" class="input-group">
                        <span class="input-group-text">SEARCH</span>
                        <input type="text" id="search" class="form-control" placeholder="Put your ticket number">
                    </form>
                </div>
                <div class="card-body">
                    <div id="search-container" class="row">
                        <h3 id="stud-name" class="ml-2"></h3>
                        <div class="col-12">
                            <div class="progressbar">
                                <div class="progress" id="progress"></div>
                                <div class="progress-step progress-step-active" data-title="Accepted"></div>
                                <div class="progress-step" data-title="Advised"></div>
                            </div>
                            <div class="message-cont">
                                <label class="title">Message</label>
                                <div class="control">
                                    <p id="message"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--<button class="btn btn-outline-primary viewbtn">Update</button>-->
                </div>
            </div>
        </div>
    </div>
</div>

<div hidden class="loading-div">
    <i class="fa fa-spinner fa-spin" style="font-size:70px; color: white"></i>
</div>
<script>
$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    $("#search").keyup(function() {
        $.ajax({
            url: 'searchTicket',
            type: 'POST',
            data: {
                search: $(this).val()
            },
            dataType: 'JSON',
            success: function(data) {
                remove();
                if ($.isEmptyObject(data)) {
                    $("#stud-name").text("");
                    $("#message").text("");
                } else {
                    $("#stud-name").text(data.first_name.charAt(0).toUpperCase() + data
                        .first_name.slice(1) + " " + data.middle_name.toUpperCase()
                        .charAt(0) + ". " + data.last_name.charAt(0).toUpperCase() +
                        data.last_name.slice(1));
                    console.log(data.is_accepted);
                    if (data.is_accepted == 1) {
                        updateProgressbar(1);
                        if (data.is_advised == 1) {
                            updateProgressbar(2);
                        }
                    }
                    $("#message").text(data.remarks);
                }
            }
        })
    })

    function updateProgressbar(index) {
        $(".progress-step").eq(index).addClass(" progress-step-active");
        $(".progress-step").eq(index - 1).addClass(" progress-step-check");
        const progressActive = $(".progress-step-active"),
            progressSteps = $(".progress-step");
        $("#progress").width(((progressActive.length - 1) / (progressSteps.length - 1)) * 100 + "%");
    }

    function remove() {
        $(".progress-step").each(function(e) {
            $(this).attr('class', 'progress-step');
        })
        $(".progress-step").eq(0).addClass(" progress-step-active");
        const progressActive = $(".progress-step-active"),
            progressSteps = $(".progress-step");
        $("#progress").width(((progressActive.length - 1) / (progressSteps.length - 1)) * 100 + "%");
    }
})
</script>
@endsection