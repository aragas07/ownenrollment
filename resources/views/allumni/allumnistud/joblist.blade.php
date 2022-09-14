@extends('layouts.alumni', ['title' => 'Alumni', 'active'=>'Job History'])
@section('content')
<div class="content-wrapper">
    <div class="main-container">
        <div class="container-xl p-3">
            <div class="row justify-content-between align-items-center">
                <div class="col flex-shrink-0 mb-3 mb-md-0">
                    <h1 class="display-5 mb-0">Job History</h1>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <select class="form-control form-control-sm col-sm-2" id="status">
                        <option value="0">Employed</option>
                        <option value="1">Self employed</option>
                        <option value="2">Unemployed</option>
                        <option value="3">Other</option>
                    </select>
                </div>
                <div class="card-body table-responsive p-0" style="height: 65vh">
                    <table class="table table-head-fixed text-nowrap" id="0">
                        <thead>
                            <tr>
                                <th>Sector</th>
                                <th>Name of employer</th>
                                <th>Address</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Position</th>
                                <th>Industry</th>
                                <th>Salary</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employee as $job)
                                <tr>
                                    <td>@if($job->sector === 0) Government @else Private @endif</td>
                                    <td>{{ $job->employername }}</td>
                                    <td>{{ $job->barangay_name }}, {{ $job->city_name }}, {{ $job->province_name }}, {{ $job->region_name }}</td>
                                    <td>{{ $job->datestart }}</td>
                                    <td>{{ $job->dateend }}</td>
                                    <td>{{ $job->position }}</td>
                                    <td>{{ $job->industry }}</td>
                                    <td>{{ $job->salary }}</td>
                                </tr>
                            @endforeach
                            @foreach($employedOutside as $job)
                                <tr>
                                    <td>Outside</td>
                                    <td>{{ $job->employername }}</td>
                                    <td>{{ $job->outside }}</td>
                                    <td>{{ $job->datestart }}</td>
                                    <td>{{ $job->dateend }}</td>
                                    <td>{{ $job->position }}</td>
                                    <td>{{ $job->industry }}</td>
                                    <td>{{ $job->salary }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <table class="table table-head-fixed text-nowrap" hidden id="1">
                        <thead>
                            <tr>
                                <th>Business/practice</th>
                                <th>Income</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($selfemployed as $self)
                                <tr>
                                    <td>{{ $self->status }}</td>
                                    <td>{{ $self->salary }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <table class="table table-head-fixed text-nowrap" hidden id="2">
                        <thead>
                            <tr>
                                <th>Past employed</th>
                                <th>Hiring</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($unemployed as $unemp)
                                <tr>
                                    <td>{{ $unemp->past_employment }}</td>
                                    <td>@if($unemp->hiring === 1) Yes @else No @endif</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <table class="table table-head-fixed text-nowrap" hidden id="3">
                        <tbody>
                            @foreach($other as $oth)
                                <tr>
                                    <td>{{ $oth->religious }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
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
        $("#status").change(function(){
            $(".table").each(function(i){
                if($(this).attr('id') == $("#status").val()){
                    $(this).prop('hidden', false);
                }else{
                    $(this).prop('hidden', true);
                }
            })
        })
    })
</script>
@endsection