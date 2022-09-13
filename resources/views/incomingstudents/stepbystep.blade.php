@extends('incomingstudents.create', ['activePage'=>'stepbystep','title'=>'Register'])
@section('content')

<div class="col-lg-10" id="forms">
    <div class="progressbar">
        <div class="progress" id="progress"></div>
        <div class="progress-step progress-step-active" data-title="Give consent"></div>
        <div class="progress-step" data-title="Identify yourself"></div>
        <div class="progress-step" data-title="Fill up Forms"></div>
        <div class="progress-step" data-title="Get ticket number Download/Print/Sign"></div>
        <div class="progress-step" data-title="Upload Documents"></div>
        <div class="progress-step" data-title="Confirm"></div>
    </div>
</div>
@include('incomingstudents.extensions.consent')
@include('incomingstudents.extensions.identify')
@include('incomingstudents.extensions.studentform')
@stack('js')
<script>
$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })

    $("input[name='type']").each(function(i) {
        $(this).click(function() {
            $("input[name='type']").each(function(index) {
                $(this).prop('checked', false);
            })
            $(this).prop('checked', true);
        })
    })

    $.ajax({
        url: "{{ route('getnum') }}",
        type: 'post',
        data: {
            num: ''
        },
        success: function(data) {
            if (data.number != null) {
                for (var i = 0; i < data.number; i++) {
                    showHide(i);
                }
            }
            if (data.type.trim() == 'new') {
                $("#newstudform").attr('hidden', false);
            } else if (data.type.trim() == 'old') {
                $("#oldstud").attr('hidden', false);
            }
        }
    })
    var forms = document.querySelectorAll('.needs-validation')
    Array.prototype.slice.call(forms)
        .forEach(function(form) {
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                    b = false;
                }
                form.classList.add('was-validated')
            }, false)
        })

    let stepNum = 0,
        b = true;
    $(".btn-primary").each(function(index) {
        $(this).click(function() {
            b = true;
            if (index == 2) {
                sttype = 196;
                stgctc = 147;
                showHide(1);
            } else if (index == 3) {
                sttype = 297;
                stgctc = 237;
                showHide(1);
                //showHide(2);
                //showHide(3);
                $("#course-sec").attr('hidden', true);
            } else if (index == 5) {
                // printgctc();
            } else if (index == 6) {
                // print();
            } else {
                if (index == 8) {}
                showHide(index)
            }
            //let num = index + 1;
            let stype = " " + $(this).val();
            let num = 1;
            //let stype = 0;
            alert($("input[name='type']:checked").val());
            $.ajax({
                url: "stop/" + num + "/" + stype,
                type: 'post',
                data: {
                    sam: 'sample'
                },
                success: function(data) {
                    if (data.type.trim() == 'new') {
                        console.log("smaple");
                        $("#newstudform").attr('hidden', false);
                    } else if (data.type.trim() == 'old') {
                        $("#oldstud").attr('hidden', false);
                    }
                }
            })
        })
    })

    let num = 1,
        stype = 0;
    $.ajax({
        url: "stop/" + num + "/" + stype,
        type: 'post',
        data: {
            sam: 'sample'
        },
        success: function(data) {
            if (data.type.trim() == 'new') {
                $("#newstudform").attr('hidden', false);
            } else if (data.type.trim() == 'old') {
                $("#oldstud").attr('hidden', false);
            }
        }
    })

    function showHide(index) {
        if (b) stepNum++;
        $(".hdn-div").eq(index).removeClass("fadeInDown").addClass("fadeInUp");
        window.setTimeout(function() {
            $(".hdn-div").eq(index).attr("hidden", true);
        }, 1000);
        window.setTimeout(function() {
            $(".hdn-div").eq(index + 1).attr("hidden", false);
        }, 1000);
        updateProgressbar(stepNum);
    }

    function updateProgressbar(index) {
        $(".progress-step").eq(index).addClass(" progress-step-active");
        $(".progress-step").eq(index - 1).addClass(" progress-step-check");
        const progressActive = $(".progress-step-active"),
            progressSteps = $(".progress-step");
        $("#progress").width(((progressActive.length - 1) / (progressSteps.length - 1)) * 100 + "%");
    }

    $("#insertstud").on('submit', function(event) {
        event.preventDefault();
        let asses = '',
            bothers = '';
        $('input[name="selfassesment"]:checked').each(function() {
            asses += $(this).val() + ", ";
        })
        $('input[name="bothers"]:checked').each(function() {
            if ($(this).attr('id') == 'healthprob') {
                bothers += "Health problems: " + $("#health-text").val() + ", ";
            } else if ($(this).attr('id') == 'otherspecify') {
                bothers += "Others: " + $("#specify-text").val() + ", ";
            } else {
                bothers += $(this).val() + ", ";
            }
        })
        $("#selfasses").val(asses);
        $("#bother").val(bothers);
        if ($("#customFile").val() == '') {
            $("#image-invalid").style('display', 'block');
        } else {
            if (b) {
                $.ajax({
                    url: $(this).attr("action"),
                    method: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    dataType: 'json',
                    processData: false,
                    success: function(result) {
                        if (result != 'error') {
                            load();
                            $("#ticketnum").html("TAKE NOTE, THIS IS YOUR TICKET CODE:  " +
                                result);
                            showHide(2);
                            b = false;
                            showHide(3);
                        }
                    }
                })
            }
        }
    })
})
</script>

<script src="{{ asset('js/enroll.js') }}"></script>
@endsection