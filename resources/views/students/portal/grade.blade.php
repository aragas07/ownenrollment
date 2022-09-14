<!DOCTYPE html>
<html>

<head>
    <base target="_top">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{asset('light-bootstrap/js/core/jquery.3.2.1.min.js')}}"></script>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Comfortaa&display=swap');

    body {
        background: linear-gradient(90deg, #4b6cb7 0%, #182848 100%);
    }

    /* For tabs */

    /* Style the tab */
    .tab {
        overflow: hidden;
        padding: 0;
        border: 1px solid #E6E6E6;
        border-top: 0;
        border-right: 0;
        border-left: 0;
        margin-bottom: 1em;
    }

    /* Style the buttons inside the tab */
    .tab button {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 0 16px;
        transition: 0.3s;
        font-size: 17px;
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
        background-color: #ddd;
    }

    /* Create an active/current tablink class */
    .tab button.active {
        background-color: #E6E6E6;
    }

    .logged-in {}

    .form,
    .form-logged-in {
        z-index: 1;
        background: #FFFFFF;
        border-radius: 10px;
        margin: 40px auto;
        padding: 20px;
        font-family: 'Comfortaa', cursive;
    }

    .form-logged-in {
        overflow-x: auto;
        white-space: nowrap;
    }

    #example-table {
        overflow-x: auto;
        white-space: nowrap;
    }

    #dorsu-logo {
        margin-top: calc(-50% + -20px);
    }

    #grades-table_paginate {
        float: right;
        margin-top: -45px;
    }

    .my-custom {
        border: 0;
    }

    @media only screen and (max-width: 600px) {
        .login {
            margin-top: 20%;
        }

        #example-table {
            display: block;
        }

        #grades-table_paginate {
            float: none !important;
            margin-top: 0 !important;
        }

        #grades-table {
            display: block;
            overflow-x: auto;
            white-space: nowrap;
        }

        /* .userpassIns{
          position:fixed;
          right: 1em;
          bottom: 1em;
        } */
    }
    </style>
</head>

<body>
    <div class="logged-in d-flex align-items-center justify-content-center">
        <div class="form-logged-in col-sm-8">
            <div class="row align-items-left px-0">
                <div class="col-sm-12 pb-3">
                    <img class="pb-3" src="https://dorsu.edu.ph/wp-content/uploads/2022/08/header4.png" style="width: 100%;" alt="grade-inquiry-header">
                </div>
                <div class="col-sm-12 tab">
                    <button class="tablinks active" value="grade">Grade Inquiry</button>
                    <button class="tablinks" value="schedule">Schedule Inquiry</button>
                    <button class="tablinks" value="email">DOrSU Email Availability</button>
                </div>
                <div class="tabcontent" id="grade">
                    <form id="gradeform" action="{{ route('getGrade') }}" method="POST" class="row">
                        <h4 class="text-center">(Unofficial) Grade Report</h4>
                        <div class="col-sm-6">
                            Name: <span id="fname">{{Auth::user()->name}}</span>
                        </div>
                        <div class="col-sm-6">
                            Course: <span class="course"></span>
                        </div>
                        <div class="col-sm-6">
                            Semester: <select id="semester" name="sem" class="my-custom">
                                <option value="1">1st</option>
                                <option value="2">2nd</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            School Year: 
                            <select id="schoolyear" name="sy" class="my-custom">
                                @foreach($sy as $year)
                                <option value="{{$year->sy}}">{{$year->sy}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-12">
                            <table id="grades-table" class="display table-striped table-bordered w-100">
                                <thead>
                                    <tr>
                                        <th>Subject</th>
                                        <th>Description</th>
                                        <th>Grade</th>
                                        <th>Completion grade</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @php($i = true)
                                    @foreach($grade as $gr)
                                        <tr>
                                            <td>{{$gr->subject}}</td>
                                            <td>{{$gr->description}}</td>
                                            <td>{{$gr->grade}}</td>
                                            <td>{{$gr->completion}}</td>
                                        </tr>
                                            @if($i)
                                                <input type="text" hidden id="coursetext" value="{{$gr->course}}">
                                                @php($i=false)
                                            @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </form>
                    
                </div>
                <div class="tabcontent" id="schedule" style="display:none;">
                    <div class="row">
                        <h4 class="text-center">Schedule Inquiry</h4>
                        <div class="col-sm-6">
                            Name: <span id="fname">{{Auth::user()->name}}</span>
                        </div>
                        <div class="col-sm-6">
                            Course: <span class="course"></span>
                        </div>
                        <div class="col-sm-6">
                            Semester: <select id="semester" class="my-custom" onchange="selectChange()"></select>
                        </div>
                        <div class="col-sm-6">
                            School Year: <select id="schoolyear" class="my-custom" onchange="selectChange()"></select>
                        </div>
                        <div class="col-sm-12">
                            <table id="grades-table" class="display table-striped table-bordered w-100"></table>
                        </div>
                    </div>
                </div>
                <div class="tabcontent" id="email" style="display:none;">
                    <h4 class="text-center">DOrSU Email Availability</h4>
                </div>
                <div class="col-sm-12">
                    <hr>
                    Notes: <br>
                    - Data covered: AY 2016-2022<br>
                    - Last updated: August 15, 2022
                    
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(".tablinks").click(function(){
                $(".tablinks").each(function(){
                    $(this).attr('class','tablinks');
                })
                $(this).attr('class','tablinks active');
                var str = $(this).val();
                console.log(str);
                $(".tabcontent").each(function(e){
                    $(this).hide();
                })
                $("#"+str).show();
            })
            $(".course").text($("#coursetext").val());
            $("#semester").val({{$sem->semester}});
            $("#schoolyear").prop("selectedIndex", $("#schoolyear>option").length - 1);

            $("#semester").change(function(){
                $("#gradeform").submit();
            })
            
            $("#schoolyear").change(function(){
                $("#gradeform").submit();
            })
            
            $("form").on('submit',function(e){
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    dataType: 'json',
                    processData: false,
                    success: function(data){
                        $("#grades-table>tbody").html(data.grade);
                    }
                })
            })
        })
    </script>
</body>
</html>