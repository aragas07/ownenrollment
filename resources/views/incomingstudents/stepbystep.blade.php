@extends('incomingstudents.create', ['activePage'=>'stepbystep','title'=>'Register'])
@section('content')

<div class="col-lg-10" id="forms">
    <div class="progressbar">
        <div class="progress" id="progress"></div>
        <div class="progress-step progress-step-active" data-title="Give consent"></div>
        <div class="progress-step" data-title="Identify yourself"></div>
        <div class="progress-step" data-title="Fill up Forms"></div>
        <div class="progress-step" data-title="Upload Documents"></div>
        <div class="progress-step" data-title="Tracking number"></div>
        <!-- <div class="progress-step" data-title="Complete"></div> -->
    </div>
</div>
<div style="display: none">
    <canvas id="first_page"></canvas>
    <canvas id="second_page"></canvas>
    <canvas id="pdf_renderer"></canvas>
</div>

@include('incomingstudents.extensions.consent')
@include('incomingstudents.extensions.identify')
@include('incomingstudents.extensions.studentform')
@include('incomingstudents.extensions.postregistration')
@include('incomingstudents.extensions.ticketnumber')
<!-- @include('incomingstudents.extensions.uploadrequirements') -->
<!-- <div hidden class="hdn-div col-lg-8 fadeInDown">
    <div class="row justify-content-between">
        <div class="col-lg-12">
            <div class="card p-4 text-center">
                <img src="img/success.gif" class="conf-img"
                    style="border: none; max-height:250px; max-width: 250px; margin: auto;">
                <h3>You've completed the Davao Oriental State University online registration process successfully.</h3>
                <a href="welcome" class="btn btn-success">Okay</a>
            </div>
        </div>
    </div>
</div> -->

<div hidden class="loading-div">
    <i class="fa fa-spinner fa-spin" style="font-size:70px; color: white"></i>
</div>
@stack('js')
<script>
$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })

    $(".forconfirm").click(function() {
        setTimeout(() => {
            $(".conf-img").attr('src', 'img/success.gif');
        }, 1000);
    })

    var myState = {
            pdf: null,
            currentPage: 1,
            zoom: 1
        },
        first = document.getElementById("first_page"),
        second = document.getElementById("second_page"),
        ctx = first.getContext('2d'),
        secondctx = second.getContext('2d'),
        convert = document.getElementById("convert"),
        firststate = {
            pdf: null,
            currentPage: 1,
            zoom: 1
        },
        secondstate = {
            pdf: null,
            currentPage: 2,
            zoom: 1
        }

    pdfjsLib.getDocument('public/pdffile/Admissions-Profile-Form.pdf').then((pdf) => {
        myState.pdf = pdf;
        render();
    });

    pdfjsLib.getDocument('public/pdffile/gctc.pdf').then((pdf) => {
        firststate.pdf = pdf;
        secondstate.pdf = pdf;
        rendergctc();
    });

    function rendergctc() {
        firststate.pdf.getPage(firststate.currentPage).then((page) => {
            var viewport = page.getViewport(firststate.zoom);

            first.width = viewport.width;
            first.height = viewport.height;

            page.render({
                canvasContext: ctx,
                viewport: viewport
            });
        });
        secondstate.pdf.getPage(secondstate.currentPage).then((page) => {


            var viewport = page.getViewport(secondstate.zoom);

            second.width = viewport.width;
            second.height = viewport.height;

            page.render({
                canvasContext: secondctx,
                viewport: viewport
            });
        });
    }
    

    function render() {
        myState.pdf.getPage(myState.currentPage).then((page) => {

            var canvas = document.getElementById("pdf_renderer");
            var ctx = canvas.getContext('2d');

            var viewport = page.getViewport(myState.zoom);

            canvas.width = viewport.width;
            canvas.height = viewport.height;

            page.render({
                canvasContext: ctx,
                viewport: viewport
            });
        });
    }

    $(".b-welcome").click(function(){
        viewForm(0,'');
        window.location.href = 'welcome';
    })

    var sttype = 102,
        stgctc = 47,
        fname = "",
        sex = 502,
        gctcsex = 75,
        cstatus = 145,
        pwd = 293,
        siparent = 293,
        wstudent = 293,
        wstudentgctc = 293,
        pob = $("input[name=place-add]").val(),
        img = document.getElementById("pro-image"),
        faname = "",
        moname = "",
        raddress = "",
        caddress = "",
        fawork = "",
        mowork = "",
        pwdtext = "",
        parenttext = "",
        emptext = "";


    function load() {
        var canvas = document.getElementById("pdf_renderer"),
            ctx = canvas.getContext("2d");
        birth = $("input[name=bd]").val();
        pob = $("#place-add").val();
        img = document.getElementById("pro-image");
        raddress = $("input[name=res-state]").val().toUpperCase() + ", " + $("input[name=res-city]").val()
            .toUpperCase() + ", " + $("input[name=res-add]").val().toUpperCase();
        caddress = $("input[name=cur-state]").val().toUpperCase() + ", " + $("input[name=cur-city]").val()
            .toUpperCase() + ", " + $("input[name=cur-add]").val().toUpperCase();
        fawork = $("input[name='fa-work']:checked").val();
        mowork = $("input[name='mo-work']:checked").val();
        pwdtext = $("#pwd-text").val();
        parenttext = $("#parent-text").val();
        emptext = $("#emp-text").val();
        if ($('input[name="selfassesment"]:checked').val() == 'No') wstudent = 220;
        if ($("#mosuffix").val() == '') moname = $("#molname").val().toUpperCase() + ", " + $("#mofname").val()
            .toUpperCase() + " " + $("#momname").val().toUpperCase();
        else moname = $("#molname").val().toUpperCase() + ", " + $("#mofname").val().toUpperCase() + " " + $(
            "#mosuffix").val().toUpperCase() + " " + $("#momname").val().toUpperCase();
        if ($("#fasuffix").val() == '') faname = $("#falname").val().toUpperCase() + ", " + $("#fafname").val()
            .toUpperCase() + " " + $("#famname").val().toUpperCase();
        else faname = $("#falname").val().toUpperCase() + ", " + $("#fafname").val().toUpperCase() + " " + $(
            "#fasuffix").val().toUpperCase() + " " + $("#famname").val().toUpperCase();
        if (fawork == 'ofw') fawork = $("#faofw").val();
        else if (fawork == 'other') fawork = $("#faother").val();
        if (mowork == 'ofw') mowork = $("#moofw").val();
        else if (mowork == 'other') mowork = $("#moother").val();
        if ($("#suffix").val() != '')
            fname = $("#lname").val().toUpperCase() + ", " + $("#fname").val().toUpperCase() + " " + $(
                "#suffix").val().toUpperCase() + " " + $("#mname").val().toUpperCase();
        else
            fname = $("#lname").val().toUpperCase() + ", " + $("#fname").val().toUpperCase() + " " + $("#mname")
            .val().toUpperCase();
        ctx.drawImage(img, 448, 140, 107, 124);
        if ($("#gender").val() == 'Female') {
            sex = 559;
            gctcsex = 183;
        }
        if ($("#status").val() == 'Married') {
            cstatus = 221;
        } else if ($("#status").val() == 'Widowed') {
            cstatus = 297;
        } else if ($("#status").val() == 'Separated') {
            cstatus = 411;
        }
        if ($("input[name='pwd']:checked").val() == 'yes') {
            pwd = 257;
        }
        if ($("input[name='sparent']:checked").val() == 'yes') {
            siparent = 257;
        }
        if ($("input[name='wstudent']:checked").val() == 1) {
            wstudent = 257;
        }
        ctx.fillStyle = "#000";
        ctx.font = "11px Arial";
        ctx.fillText("✔", sttype, 245);
        ctx.fillText($("#campus").val(), 95, 258);
        ctx.fillText($("select[name=firstcourse]").val().toUpperCase(), 93, 284);
        ctx.fillText($("select[name=secondcourse]").val().toUpperCase(), 93, 298);
        ctx.fillText($("select[name=thirdcourse]").val().toUpperCase(), 93, 311);
        ctx.fillText(fname, 55, 353);
        ctx.fillText(birth, 181, 370);
        ctx.fillText("✔", sex, 372);
        ctx.fillText(pob.toUpperCase(), 117, 383);
        ctx.fillText("✔", cstatus, 418);
        ctx.fillText($("input[name=citizenship]").val().toUpperCase(), 523, 418);
        ctx.fillText($("input[name=height]").val(), 110, 431);
        ctx.fillText($("input[name=weight]").val(), 223, 431);
        ctx.fillText($("input[name=religion]").val().toUpperCase(), 311, 431);
        ctx.fillText($("select[name=ethnic]").val().toUpperCase(), 518, 431);
        ctx.fillText($("input[name=email]").val(), 127, 444);
        ctx.fillText($("#phone").val(), 433, 444);
        ctx.fillText(raddress, 143, 457);
        ctx.fillText($("input[name=res-zip]").val(), 517, 457);
        ctx.fillText($("#spouse").val().toUpperCase(), 181, 484);
        ctx.fillText($("#occupation").val().toUpperCase(), 404, 484);
        ctx.fillText($("#children").val(), 557, 484);
        ctx.fillText(faname, 125, 497);
        ctx.fillText(fawork.toUpperCase(), 364, 497);
        console.log("proceed");
        ctx.fillText($("input[name=facontact]").val(), 505, 497);
        ctx.fillText(moname, 129, 510);
        ctx.fillText(mowork.toUpperCase(), 353, 510);
        ctx.fillText($("input[name=mocontact]").val(), 497, 510);
        ctx.fillText($("#guardian").val().toUpperCase(), 228, 524);
        ctx.fillText($("input[name=gcontact]").val(), 492, 524);
        ctx.fillText($("input[name=gaddress]").val().toUpperCase(), 101, 537);
        ctx.fillText($("#elemschool").val().toUpperCase(), 109, 563);
        ctx.fillText($("#elemyear").val(), 527, 563);
        ctx.fillText($("#secschool").val().toUpperCase(), 142, 576);
        ctx.fillText($("#strand").val().toUpperCase(), 371, 576);
        ctx.fillText($("#secyear").val(), 523, 576);
        ctx.fillText($("input[name=vocschool]").val().toUpperCase(), 107, 590);
        ctx.fillText($("input[name=voccourse]").val().toUpperCase(), 371, 590);
        ctx.fillText($("input[name=vocyear]").val(), 523, 590);
        ctx.fillText("N/A", 94, 603);
        ctx.fillText("None", 310, 603);
        ctx.fillText("none", 460, 603);
        ctx.fillText("returning", 167, 630);
        ctx.fillText("yearreturn", 361, 630);
        ctx.fillText("2010", 543, 630);
        ctx.fillText("✔", pwd, 655);
        ctx.fillText(pwdtext, 483, 656);
        ctx.fillText("✔", siparent, 670);
        ctx.fillText(parenttext, 491, 669);
        ctx.fillText("✔", wstudent, 684);
        ctx.fillText(emptext, 453, 682);
    }
    var x = 0,
        y = 0;
    $("input[name=optradio2]").each(function(ind) {
        $(this).click(function() {
            y = $(".parents_are").eq(ind - 1).val();
            x = $(".parents_are").eq(ind - 1).attr('name');
        })
    })

    function loadgctc() {
        console.log("Example");
        var first = document.getElementById("first_page"),
            firstctx = first.getContext('2d'),
            second = document.getElementById("second_page"),
            secondctx = second.getContext('2d');
        firstctx.fillStyle = "#000";
        firstctx.font = "11px Arial";
        secondctx.fillStyle = "#000";
        secondctx.font = "11px Arial";
        var birth = $("input[name=bd]").val();
        img = document.getElementById("pro-image");
        firstctx.drawImage(img, 412, 176, 142, 142);
        firstctx.fillText("✔", stgctc, 207);
        firstctx.fillText(fname, 70, 255);
        firstctx.fillText($("input[name=gctccourse]").val() + " " + $("input[name=gctcyear]").val(), 114, 271);
        firstctx.fillText("✔", 112, 287);
        //firstctx.fillText("✔", 256, 287);
        firstctx.fillText(birth, 105, 302);
        firstctx.fillText($("#age").val(), 63, 318);
        firstctx.fillText("✔", gctcsex, 335);
        firstctx.fillText($("#status").val().toUpperCase(), 101, 350);
        firstctx.fillText($("#spouse").val().toUpperCase(), 180, 382);
        firstctx.fillText($("#occupation").val().toUpperCase(), 415, 382);
        firstctx.fillText($("#children").val(), 557, 382);
        firstctx.fillText(raddress, 139, 398);
        firstctx.fillText(caddress, 259, 414);
        firstctx.fillText($("#email").val(), 117, 430);
        firstctx.fillText($("#fbacc").val(), 307, 430);
        firstctx.fillText($("#phone").val(), 498, 430);
        firstctx.fillText($("#ethnic").val().toUpperCase(), 136, 445);
        firstctx.fillText($("#religion").val().toUpperCase(), 259, 445);
        firstctx.fillText($("#language").val().toUpperCase(), 464, 445);
        firstctx.fillText("✔", wstudentgctc, 462);
        firstctx.fillText($("#whomwork").val().toUpperCase(), 297, 477);
        firstctx.fillText(faname, 113, 525);
        firstctx.fillText($("input[name='facontact']").val(), 122, 541);
        firstctx.fillText($("input[name='faaddress']").val().toUpperCase(), 334, 541);
        firstctx.fillText(moname, 118, 556);
        firstctx.fillText($("input[name='mocontact']").val(), 122, 572);
        firstctx.fillText($("input[name='moaddress']").val().toUpperCase(), 334, 572);
        if (x > 0) {
            firstctx.fillText("✔", x, y);
            console.log("Parents are: " + x);
        }
        firstctx.fillText("income", 217, 620);
        firstctx.fillText($("input[name=siblings]").val(), 150, 636);
        firstctx.fillText($("input[name=wsiblings]").val(), 277, 636);
        firstctx.fillText($("input[name=csiblings]").val(), 411, 636);
        firstctx.fillText($("input[name=hsiblings]").val(), 563, 636);
        firstctx.fillText($("#guardian").val(), 204, 652);
        firstctx.fillText($("input[name=gcontact]").val(), 461, 652);
        firstctx.fillText($("input[name=genability]").val(), 129, 699);
        firstctx.fillText($("input[name=verbal]").val(), 311, 699);
        firstctx.fillText($("input[name=numerical]").val(), 511, 699);
        firstctx.fillText($("input[name=spatial]").val(), 134, 715);
        firstctx.fillText($("input[name=perceptual]").val(), 327, 715);
        firstctx.fillText($("input[name=manual]").val(), 500, 715);
        firstctx.fillText($("input[name=hobbies]").val(), 197, 763);
        firstctx.fillText($("input[name=motto]").val(), 397, 763);
        firstctx.fillText($("input[name=talent]").val(), 148, 779);
        firstctx.fillText($("input[name=interest]").val(), 445, 779);
        firstctx.fillText($("#elemschool").val(), 135, 826);
        firstctx.fillText($("#elemyear").val(), 453, 826);
        firstctx.fillText($("#secschool").val(), 130, 842);
        firstctx.fillText($("#secyear").val(), 453, 842);
        firstctx.fillText($("#vocschool").val(), 132, 858);
        firstctx.fillText($("#voccourse").val(), 327, 858);
        firstctx.fillText($("#vocyear").val(), 490, 858);
        firstctx.fillText($("#lastschool").val(), 220, 874);
        firstctx.fillText($("#coursetaken").val(), 415, 874);
        firstctx.fillText($("#lastattend").val(), 557, 874);
        secondctx.fillText($("#honors").val(), 164, 74);
        var isScholar = 193;
        if ($("input[name=scholar]:checked").val() == "No") {
            isScholar = 244;
        }
        secondctx.fillText("✔", isScholar, 88);
        secondctx.fillText($("#scholar-text").val(), 457, 88);
        secondctx.fillText($("#qcourse").val(), 317, 103);
        var influence = 255;
        if ($("input[name=decide]:checked").val() == "No") {
            influence = 306;
        }
        secondctx.fillText("✔", influence, 120);
        secondctx.fillText($("#influenced").val(), 490, 120);
        secondctx.fillText($("#qenroll").val(), 255, 136);
        secondctx.fillText($("#qambition").val(), 230, 152);
        secondctx.fillText($("input[name=expectschool]").val(), 100, 184);
        secondctx.fillText($("input[name=expectcourse]").val(), 360, 184);
        secondctx.fillText($("input[name=expectinstructor]").val(), 120, 199);
        secondctx.fillText($("input[name=expectstudent]").val(), 365, 199);
        secondctx.fillText($("input[name=expectsubjectleast]").val(), 170, 215);
        secondctx.fillText($("input[name=expectsubjectmost]").val(), 430, 215);
        $(".selfassesment").each(function(ind) {
            if (this.checked) {
                secondctx.fillText("✔", $(".hdn_assesment").eq(ind).attr("name"), $(".hdn_assesment")
                    .eq(ind).val());
            }
        })
        $(".bother").each(function(ind) {
            if (this.checked) {
                secondctx.fillText("✔", $(".hdn_bother").eq(ind).attr("name"), $(".hdn_bother").eq(ind)
                    .val());
            }
        })
        secondctx.fillText($("#otherposstext").val(), 495, 328);
        secondctx.fillText($("#health-text").val(), 470, 355);
        secondctx.fillText($("#specify-text").val(), 440, 397);
        secondctx.fillText($("input[name=embarrassing]").val(), 81, 425);
        secondctx.fillText($("input[name=parents]").val(), 370, 452);
        secondctx.fillText($("input[name=friends]").val(), 90, 452);
        secondctx.fillText($("input[name=teachers]").val(), 98, 466);
        secondctx.fillText($("input[name=councelors]").val(), 380, 466);
        var d = new Date();
        var month = d.getMonth() + 1;
        var day = d.getDate();
        var output = d.getFullYear() + '/' +
            (month < 10 ? '0' : '') + month + '/' +
            (day < 10 ? '0' : '') + day;
        secondctx.fillText(output, 495, 830);
        secondctx.fillText(fname, 81, 830);
    }

    $("#admission-form").click(function() {
        var canvas = document.getElementById("pdf_renderer");
        const dataURI = canvas.toDataURL();
        var windowContent =
            '<!DOCTYPE html><html><head><style>@page {margin: 0px; size: 8.5 x 13 inches} html{margin:0}</style></head><body><img src="' +
            dataURI + '" style="width: 100%;height: 100%;margin: auto;"></body></html>';
        var printWin = window.open();
        printWin.document.write(windowContent);
        setTimeout(function() {
            printWin.print();
            printWin.close();
        }, 100);
        showHide(3);
    })

    $("#gctc-form").click(function() {
        const dataURI = first.toDataURL(),
            secondDataURI = second.toDataURL();
        var windowContent =
            '<!DOCTYPE html><html><head><style>@page {margin: 0px; size: 8.5 x 13 in} html{margin:0}</style></head><body><img src="' +
            dataURI + '" style="width: 100%;height: 100%;margin: auto;"><img src="' + secondDataURI +
            '" style="width: 100%;height: 100%;margin: auto;"></body></html>';
        var printWin = window.open();
        printWin.document.write(windowContent);
        setTimeout(function() {
            printWin.print();
            printWin.close();
        }, 100);
    })

    $("input[name='type']").each(function(i) {
        $(this).click(function() {
            $("input[name='type']").each(function(index) {
                $(this).prop('checked', false);
            })
            $(this).prop('checked', true);
        })
    })
    viewForm(3,'');

    $.ajax({
        url: "{{ route('getnum') }}",
        type: 'post',
        success: function(data) {
            if (data.number != null) {
                for (var i = 0; i < data.number; i++) {
                    showHide(i);
                }
            }
            if (data.type == 'new') {
                $("#newstudform").prop('hidden', false);
                $("#oldstud").prop('hidden', true);
            } else if (data.type == 'old') {
                $("#oldstud").prop('hidden', false);
                $("#newstudform").prop('hidden', true);
            }
            // $("#ticketnumupload").val(data.transaction);
            $("#ticketnum").text(data.transaction);
            var array = JSON.parse(sessionStorage.getItem("item"));
            for (var i = 0; i < array.length; i++) {
                $(".btn-outline-primary").eq(array[i]).prop('disabled', true);
            }
            console.log(array + " " + array.length);
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
    var studproceed = false;
    $("input[name='type']").each(function(ind) {
        $(this).click(function() {
            var str = "";
            if(ind < 3){
                str = "new";
            }else if(ind < 5){
                str = "transferee";
            }
            $("#studtype").val(str);
            console.log("Example : "+ind);
            studproceed = true;
        })
    })

    $(".btn-outline-primary").each(function(ind) {
        $(this).click(function() {
            $(".req-file").eq(ind).click();
        })
    })

    $(".req-file").each(function(ind) {
        $(this).change(function() {
            var files = this.files;
            if (!files.length) {
                $(".requirements").eq(ind).prop('checked', false);
                $(".file-label").eq(ind).empty();
            } else {
                $(".requirements").eq(ind).prop('checked', true);
                $(".file-label").eq(ind).text(files[files.length - 1].name);
            }
        })
    })

    $(".upload-form").submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            type: 'post',
            data: new FormData(this),
            contentType: false,
            cache: false,
            dataType: 'json',
            processData: false,
            success: function(result) {
                console.log(result);
            }
        })
    })

    let stepNum = 0,
        b = true;
    var arr = [];
    $(".btn-proceed").each(function(index) {
        $(this).click(function() {
            if (index == 1) {
                if (studproceed) {
                    showHide(1);
                    viewForm(2, "new");
                    // if ($("input[name=type]:checked").val() < 3) {
                    //     arr = [6, 7, 8];
                    // } else if ($("input[name=type]:checked").val() < 5) {
                    //     $("#LSA").prop("hidden", false);
                    //     stgctc = 147;
                    //     sttype = 196;
                    //     arr = [1, 5, 6];
                    // } else {
                    //     arr = [1, 2, 3, 4, 5, 6];
                    // }
                    // sessionStorage.setItem("item", JSON.stringify(arr));
                    // for (var i = 0; i < arr.length; i++) {
                    //     $(".btn-outline-primary").eq(arr[i]).prop('disabled', true);
                    // }
                } else {
                    toastr.error("You must determine what kind of new student you are.");
                }
            } else {
                b = true;
                stgctc = 237;
                sttype = 297;
                console.log(index);
                if (index == 2) {
                    showHide(1);
                    // arr = [1, 2, 3, 4, 5, 7, 8];
                    // for (var i = 0; i < arr.length; i++) {
                    //     $(".btn-outline-primary").eq(arr[i]).prop('disabled', true);
                    // }
                    viewForm(2, "old");
                } else {
                    showHide(index);
                    viewForm(index + 1, "");
                }
            }
        })
    })

    $("#s-Student").submit(function(e) {
        e.preventDefault();
        console.log("Exmaple");
        viewForm(4, '');
        showHide(2);
    })

    function viewForm(num, stype) {
        $.ajax({
            url: "{{ route('stop') }}",
            type: 'post',
            data: {
                key: num,
                type: stype
            },
            success: function(data) {
                if (data.type == 'new') {
                    $("#newstudform").prop('hidden', false);
                    $("#oldstud").prop('hidden', true);
                } else if (data.type == 'old') {
                    $("#oldstud").prop('hidden', false);
                    $("#newstudform").prop('hidden', true);
                }
            }
        })
    }

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
                    console.log("Example");
                    console.log(result);
                    if (result.success) {
                        load();
                        $("#ticketnum").text(result.transaction);
                        showHide(2);
                        b = false;
                        viewForm(3, '');
                        // loadgctc();
                        // $("#ticketnumupload").val(result.transaction);
                        // showHide(3);
                    }
                },
                error: function(xhr, status, error) {
                    var err = eval("(" + xhr.responseText + ")");
                    console.log(err.Message);
                }
            })
        }
    })

})
</script>

<script src="{{ asset('js/enroll.js') }}"></script>
@endsection