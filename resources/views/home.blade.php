@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"> @lang('home.dashboard')</div>

                <div class="panel-body">
                    @lang('home.logged_in_message')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
