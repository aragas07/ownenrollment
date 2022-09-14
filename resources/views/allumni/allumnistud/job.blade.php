@extends('layouts.alumni', ['title' => 'Alumni', 'active'=>'Job'])
@section('content')
<div class="content-wrapper">
    <div class="main-container">
        <div class="container-xl p-3">
            <div class="row justify-content-between align-items-center">
                <div class="col flex-shrink-0 mb-3 mb-md-0">
                    <h1 class="display-5 mb-0">Job</h1>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('injob') }}" method="POST" enctype="multipart/form-data"
                        class="needs-validation" novalidator>
                        <input hidden type="text" name="userid" class="userid">
                        <div class="s-cl"></div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Employment Status</label>
                            <div class="col-sm-10 justify-content-between">
                                <label class="lab"><input required type="radio" value="Employed" name="empstatus"
                                        id="employed" class="em-status"> Employed</label>
                                <div class="col-sm-4">
                                    <label class="lab"><input type="radio" value="Self-employed" name="empstatus"
                                            id="s-empbtn"> Self-employed</label>
                                    <label class="s-label disabled">Specify nature of business/practice
                                        <input type="text" disabled name="business" required
                                            class="form-control form-control-sm" id="s-emp"></label>
                                </div>
                                <label class="lab1"><input type="radio" value="Unemployed" id="unemployed"
                                        name="empstatus"> Unemployed</label>
                                <label class="lab1"><input type="radio" value="Other" name="empstatus" id="others">
                                    Others</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-12">Income bracket (range) monthly</label>
                            <div class="col-2"></div>
                            <div class="col-10 justify-content-between form-check">
                                <label><input required type="radio" class="income form-check-input"
                                        value="below - 10,000" name="income"> below - 10,000</label>
                                <label><input type="radio" class="income" value="10,001 - 20,000" name="income"> 10,001
                                    - 20,000</label>
                                <label><input type="radio" class="income" value="20,001 - 30,000" name="income"> 20,001
                                    - 30,000</label>
                                <label><input type="radio" class="income" value="30,001 - 40,000" name="income"> 30,001
                                    - 40,000</label>
                                <label><input type="radio" class="income" value="40,001 - above" name="income"> 40,001 -
                                    above</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 row">
                                <label class="col-sm-12 col-form-label other disabled">Have you joined a religious
                                    congregation?</label>
                                <div class="col-sm-2"></div>
                                <div class="col-sm-10 row">
                                    <div class="col-sm-6">
                                        <label class="other disabled"><input required type="radio" disabled
                                                name="employedrel" id="o-yes" class="otherp"> Yes</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="other disabled"><input type="radio" disabled name="employedrel"
                                                id="o-no" class="otherp"> No</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="rel disabled">Pls. Provide name of employer</label>
                                        <input required type="text" name="religion" id="pr-religion" disabled
                                            class="disform form-control form-control-sm">
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="rel disabled">Specify</label>
                                        <input required type="text" name="religion" id="pr-specify" disabled
                                            class="disform form-control form-control-sm">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label sect disabled">In What Sector are you
                                employed?</label>
                            <div class="col-sm-10 justify-content-between">
                                <label class="sect disabled"><input required type="radio" value="0" disabled
                                        name="sector" class="emp-disable emsector"> Government/Public</label>
                                <label class="sect disabled"><input type="radio" value="1" disabled name="sector"
                                        class="emp-disable emsector"> Private</label>
                                <label class="sect disabled"><input type="radio" value="2" disabled name="sector"
                                        id="overseas" class="emp-disable emsector"> Overseas</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="sect disabled col-sm-2 col-form-label">Name of Employer</label>
                            <div class="col-sm-10">
                                <input required class="emp-disable form-control form-control-sm" type="text" disabled
                                    name="employername">
                            </div>
                        </div>
                        <div class="form-group row addr">
                            <label class="sect disabled col-sm-2 col-form-label">Region</label>
                            <div class="col-sm-10 s-cl">
                                <select disabled id="region" class="emp-disable form-control form-control-sm">
                                    @foreach($region as $regions)
                                    <option value="{{$regions->id}}">{{$regions->region}} -
                                        {{$regions->region_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row addr">
                            <label class="sect disabled col-sm-2 col-form-label">Province</label>
                            <div class="col-sm-10 s-cl">
                                <select disabled id="province" class="emp-disable form-control form-control-sm">
                                    @foreach($province as $prov)
                                    <option value="{{$prov->id}}">{{$prov->province_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row addr">
                            <label class="sect disabled col-sm-2 col-form-label">City</label>
                            <div class="col-sm-4 s-cl">
                                <select disabled id="city" class="emp-disable form-control form-control-sm">
                                    @foreach($city as $cities)
                                    <option value="{{$cities->id}}">{{$cities->city_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-1 s-cl"></div>
                            <label class="sect disabled col-sm-1 col-form-label">Barangay</label>
                            <div class="col-sm-4 s-cl">
                                <select name="barangay" disabled id="barangay"
                                    class="emp-disable form-control form-control-sm">
                                    @foreach($barangay as $brgy)
                                    <option value="{{$brgy->id}}">{{$brgy->barangay_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row" hidden id="job-address">
                            <label class="sect disabled col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                                <input class="emp-disable form-control form-control-sm overseas" type="text"
                                    name="outside">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="sect disabled col-sm-2 col-form-label">Position/Designation</label>
                            <div class="col-sm-10">
                                <input required class="emp-disable form-control form-control-sm" type="text" disabled
                                    name="position">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="sect disabled col-sm-2 col-form-label">Employment period</label>
                            <div class="col-sm-9">
                                <label class="sect disabled"><input type="checkbox" disabled id="period"
                                        class="emp-disable"> I currently work here</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="sect disabled col-sm-2 col-form-label">Date started</label>
                            <div class="col-sm-4 s-cl">
                                <input required class="emp-disable form-control form-control-sm" type="date" disabled
                                    name="from">
                            </div>
                            <div class="col-sm-1 s-cl"></div>
                            <label class="sect disabled col-sm-1 col-form-label">To</label>
                            <div class="col-sm-4 s-cl">
                                <input type="text" name="to" hidden value="  ">
                                <input class="emp-disable d-end form-control form-control-sm" type="date" disabled required name="to">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label sect disabled">Choose industry of
                                employment</label>
                            <div class="col-sm-10 row industries">
                                <div class="col-4">
                                    <label class="sect disabled"><input type="checkbox" required value="Agriculture"
                                            disabled name="industry[]" id="industries" class="emp-disable em-industry">
                                        Agriculture</label>
                                </div>
                                <div class="col-4">
                                    <label class="sect disabled"><input type="checkbox" value="Business Services"
                                            disabled name="industry[]" class="emp-disable em-industry"> Business
                                        Services</label>
                                </div>
                                <div class="col-4">
                                    <label class="sect disabled"><input type="checkbox" value="Communications" disabled
                                            name="industry[]" class="emp-disable em-industry">
                                        Communications</label>
                                </div>
                                <div class="col-4">
                                    <label class="sect disabled"><input type="checkbox" value="Marketing" disabled
                                            name="industry[]" class="emp-disable em-industry">
                                        Marketing</label>
                                </div>
                                <div class="col-4">
                                    <label class="sect disabled"><input type="checkbox" value="Engineering" disabled
                                            name="industry[]" class="emp-disable em-industry">
                                        Engineering</label>
                                </div>
                                <div class="col-4">
                                    <label class="sect disabled"><input type="checkbox" value="Financial Services"
                                            disabled name="industry[]" class="emp-disable em-industry"> Financial
                                        Services</label>
                                </div>
                                <div class="col-4">
                                    <label class="sect disabled"><input type="checkbox"
                                            value="Hospitality, tourism, travel" disabled name="industry[]"
                                            class="emp-disable em-industry"> Hospitality, Tourism,
                                        Travel</label>
                                </div>
                                <div class="col-4">
                                    <label class="sect disabled"><input type="checkbox" value="Industrial technology"
                                            disabled name="industry[]" class="emp-disable em-industry"> Industrial
                                        technology</label>
                                </div>
                                <div class="col-4">
                                    <label class="sect disabled"><input type="checkbox"
                                            value="Media/Journalism/Publishing" disabled name="industry[]"
                                            class="emp-disable em-industry"> Media/Journalism/Publishing</label>
                                </div>
                                <div class="col-4">
                                    <label class="sect disabled"><input type="checkbox"
                                            value="Military/Defense/Public safety" disabled name="industry[]"
                                            class="emp-disable em-industry"> Military/Defense/Public safety</label>
                                </div>
                                <div class="col-4">
                                    <label class="sect disabled"><input type="checkbox"
                                            value="Politics, Public Policy, Advocacy" disabled name="industry[]"
                                            class="emp-disable em-industry"> Politics, Public Policy, Advocacy</label>
                                </div>
                                <div class="col-4">
                                    <label class="sect disabled"><input type="checkbox" value="Retail" disabled
                                            name="industry[]" class="emp-disable em-industry"> Retail</label>
                                </div>
                                <div class="col-4">
                                    <label class="sect disabled"><input type="checkbox" value="Teaching" disabled
                                            name="industry[]" class="emp-disable em-industry"> Education</label>
                                </div>
                                <div class="col-4">
                                    <label class="sect disabled"><input type="checkbox" value="Medicine/Health" disabled
                                            name="industry[]" class="emp-disable em-industry"> Medicine/Health</label>
                                </div>
                                <div class="col-4">
                                    <label class="sect disabled"><input type="checkbox" value="Environmental" disabled
                                            name="industry[]" class="emp-disable em-industry"> Environmental</label>
                                </div>
                                <div class="col-4">
                                    <label class="sect disabled"><input type="checkbox" value="Social Services" disabled
                                            name="industry[]" class="emp-disable em-industry"> Social Services</label>
                                </div>
                                <div class="col-4">
                                    <label class="sect disabled"><input type="checkbox"
                                            value="Computer Science/Information Technology" disabled name="industry[]"
                                            class="emp-disable em-industry"> Computer Science/Information
                                        Technology</label>
                                </div>
                                <div class="col-4">
                                    <label class="sect disabled"><input type="checkbox"
                                            value="Business process outsourcing" disabled name="industry[]"
                                            class="emp-disable em-industry"> Business process outsourcing</label>
                                </div>
                                <div class="col-4">
                                    <label class="sect disabled"><input type="checkbox" disabled
                                            class="emp-disable em-industry" id="other"> Others</label>
                                    <br><label class="sp disabled">Please specify <input type="text" required disabled
                                            class="disform form-control form-control-sm" name="industry[]"
                                            id="specify"></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 row">
                                <label class="col-sm-12 col-form-label sect disabled">Is your current position related
                                    to your undergraduate field of study?</label>
                                <div class="col-sm-2"></div>
                                <div class="col-sm-10 row">
                                    <div class="col-sm-4">
                                        <label class="sect disabled"><input required type="radio" value="0" disabled
                                                name="field" class="emp-disable em-rel-pos"> Yes, Same field as
                                            major</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="sect disabled"><input type="radio" value="1" disabled name="field"
                                                class="emp-disable em-rel-pos"> No, but allied field to major</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="sect disabled"><input type="radio" value="2" disabled name="field"
                                                class="emp-disable em-rel-pos"> No, not related</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 row">
                                <label class="col-sm-12 col-form-label undisabled">Are you looking for
                                    employment?</label>
                                <div class="col-sm-2"></div>
                                <div class="col-sm-10 row">
                                    <div class="col-sm-5">
                                        <label class="undisabled"><input required type="radio" value="1" disabled
                                                name="hiring" class="unemp em-hiring"> Yes</label>
                                    </div>
                                    <div class="col-sm-5">
                                        <label class="undisabled"><input type="radio" value="0" disabled name="hiring"
                                                class="unemp em-hiring"> No</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 row">
                                <label class="col-sm-12 col-form-label undisabled">Have you been employed in the
                                    past?</label>
                                <div class="col-sm-2"></div>
                                <div class="col-sm-10 row">
                                    <div class="col-sm-5">
                                        <label class="undisabled"><input required type="radio" disabled id="emp-past"
                                                class="unemp em-employed past-employed"> Yes</label>
                                    </div>
                                    <div class="col-sm-5">
                                        <label class="undisabled"><input type="radio" value="No" disabled
                                                name="employed" class="unemp em-employed past-employed"> No</label>
                                    </div>
                                    <div class="col-sm-12">
                                        <label class="prov disabled">Pls. provide name of employer</label>
                                        <input required type="text" name="employed" id="pr" disabled
                                            class="disform form-control form-control-sm">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="id" value="">
                        <div class="row">
                            <label for="" class="col-sm-2"></label>
                            <div class="col-sm-10">
                                <input type="submit" value="Submit" class="btn btn-primary"
                                    style="border: 2px solid black" name="job" id="jobbtn">
                            </div>
                        </div>
                    </form>
                </div><!-- /.card-body -->
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
    });

    $("#region").change(function() {
        province($(this).val());
    })

    $("#province").change(function() {
        city($(this).val());
    })

    $("#city").change(function() {
        brgy($(this).val());
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

    function province(id) {
        $("#province").empty();
        $.ajax({
            url: "{{ route('getProv') }}",
            type: 'post',
            data: {
                id: id
            },
            dataType: 'json',
            success: function(data) {
                for (var i = 0; i < data.length; i++) {
                    $("#province").append("<option value='" + data[i].id + "'>" + data[i]
                        .province_name + "</option>");
                }
                city($("#province").val());
            }
        })
    }

    function city(id) {
        $("#city").empty();
        $.ajax({
            url: "{{ route('getCity') }}",
            type: "POST",
            data: {
                id: id
            },
            dataType: 'json',
            success: function(data) {
                for (var i = 0; i < data.length; i++) {
                    $("#city").append("<option value='" + data[i].id + "'>" + data[i].city_name +
                        "</option>");
                }
                brgy($("#city").val());
            }
        })
    }

    function brgy(id) {
        $("#barangay").empty();
        $.ajax({
            url: "{{ route('getBrgy') }}",
            type: "POST",
            data: {
                id: id
            },
            dataType: 'json',
            success: function(data) {
                for (var i = 0; i < data.length; i++) {
                    $("#barangay").append("<option value='" + data[i].id + "'>" + data[i]
                        .barangay_name + "</option>");
                }
            }
        })
    }

    $("form").submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            type: 'post',
            data: new FormData(this),
            contentType: false,
            cache: false,
            dataType: 'json',
            processData: false,
            success: function(data) {
                if(data.success){
                    location.href = 'jobhistory';
                }
            },
            error: function(request, status, error) {
                console.log(request.responseText);
            }
        })
    })

    $("input[name=empstatus]").click(function() {
        $(".disform").each(function() {
            $(this).prop('disabled', true)
        })
        $("#s-emp").prop('disabled', !$("#s-empbtn").is(":checked"));
        if ($("#others").is(":checked")) {
            religion();
        }
        $(".otherp").each(function() {
            $(this).prop('disabled', !$("#others").is(":checked"));
            $(this).click(function() {
                religion();
            });
        });

        $(".emp-disable").each(function() {
            $(this).prop('disabled', !$("#employed").is(":checked"));
        })
        $(".unemp").each(function() {
            $(this).prop('disabled', !$("#unemployed").is(":checked"));
        })
        if ($("#unemployed").is(":checked")) {
            $("#pr").prop('disabled', !$("#emp-past").is(":checked"));
        }
        if ($("#employed").is(":checked")) {
            $(".d-end").prop('disabled', $("#period").is(":checked"));
            $("#period").change(function() {
                $(".d-end").prop('disabled', $(this).is(":checked"));
            })
        }
    });


    function religion() {
        $("#pr-religion").prop('disabled', !$("#o-yes").is(":checked"));
        $("#pr-specify").prop('disabled', !$("#o-no").is(":checked"));
    }
    $(".past-employed").click(function() {
        $("#pr").prop('disabled', !$("#emp-past").is(":checked"));
    })

    $("#other").click(function() {
        $("#specify").prop('disabled', !$(this).is(":checked"))
    })

    $(".industries :checkbox").change(function() {
        let bool = false;
        if ($(".industries :checkbox:checked").length == 0) {
            bool = true;
        }
        $("#industries").attr('required', bool);
    })

    $("input[name=sector]").click(function() {
        let bool = $("#overseas").is(":checked");
        $(".addr").prop('hidden', bool);
        $("#job-address").prop('hidden', !bool);
        $("input[name=outside]").attr('required', bool);
    })
})
</script>
@endsection