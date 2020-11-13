@extends('layouts.admin')

@section('title') Pathology Lab | Home @endsection

@section('content_header')
<section class="content-header">
      <h1>
        Appointments
        <small>View All</small>
      </h1>
    </section>
@endsection

@section('main_content')
    <section class="content">

        <div class="row">
            <div class="col-lg-12 col-xs-12">
                @if(Session::has('flash_message'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-check"></i>Success!</h4>
                        {!! session('flash_message') !!}
                    </div>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Appointments</div>
                    <div class="panel-body">

                        <!-- <a href="{{ url('/appointments/create') }}" class="btn btn-primary btn-xs" title="Add New Appointment"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a> -->
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th> Patient Name </th>
                                        <th> Test Name </th>
                                        <th> Status </th>
                                        <th> Date </th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($appointments as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->patient->name }}</td>
                                        <td>{{ $item->test->name }}</td>
                                        @php
                                            $color;
                                            if($item->status == 'pending'){
                                                $color = 'bg-yellow';
                                            } elseif ($item->status == 'done') {
                                                $color = 'bg-green';
                                            } elseif ($item->status == 'processing') {
                                                $color = 'bg-blue';
                                            } else {
                                                $color = 'bg-red';
                                            }
                                        @endphp
                                        <td><small class="label {{ $color }}">{{ $item->status }}</small></td>
                                        <td>{{ $item->date }}</td>
                                        <td>
                                           
                                            @if($item->status == 'pending')
                                            
                                                <a href="{{ url('/appointments/' . $item->id) }}" class="btn btn-success btn-xs" title="View Appointment" data-toggle="tooltip"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                                {!! Form::open([
                                                    'method'=>'GET',
                                                    'url' => ['/samples/create'],
                                                    'style' => 'display:inline'
                                                ]) !!}
                                                    {!! Form::button('<span class="glyphicon glyphicon-share" aria-hidden="true"/>', array(
                                                            'type' => 'submit',
                                                            'class' => 'btn btn-info btn-xs',
                                                            'title' => 'Collect Sample',
                                                            'data-toggle' => 'tooltip'
                                                    )) !!}
                                                    {{ Form::hidden('appointment_id', $item->id) }}
                                                    {{ Form::hidden('patient_id', $item->patient->id) }}
                                                    {{ Form::hidden('test_id', $item->test->id) }}
                                                {!! Form::close() !!}

                                            @else

                                                <a href="{{ url('/appointments/' . $item->id) }}" class="btn btn-success btn-xs" title="View Appointment" data-toggle="tooltip"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                            @endif
                                
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $appointments->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection