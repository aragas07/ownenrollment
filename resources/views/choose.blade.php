@extends('layouts/temp', ['activePage' => 'login', 'title' => 'DOrSU'])
@section('content')
<div class="col-xl-10" style="margin:auto">
    @foreach($authorize as $app)    
        <a href="{{$app->link}}" target="_blank" class="col-md-6">
            <div class="col-md-12 text-center">
                <div class="card">
                    <div class="card-body">
                        {{$app->name}}
                    </div>
                </div>
            </div>
        </a>
    @endforeach
</div>
@endsection