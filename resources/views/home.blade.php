@extends('layouts.user')

@section('content')
<div class="container" style="height: 100%; ">
    
            <div class="card">
                <div class="card-header" style="text-align: center;">Welcome {{ Auth::user()->name }}</div>
                
                <div class="card-body">
                    <p> Welcome </p>
                </div>
            </div>
</div>
@endsection
