@extends('layouts.user')
@section('content')

<section class="content">
    <div class="row">
        <div class="col-lg-12 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">Invoices</div>
                <div class="panel-body">

                    <a href="{{ url('/invoices/create') }}" class="btn btn-primary btn-xs" title="Add New Invoice"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
                    <br/>
                    <br/>
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th>Invoice ID</th>
                                    <th>Appointment ID</th>
                                    <th>Patient Name</th>
                                    <th>Amount</th>
                                    <th>Status </th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($invoices as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->appointment_id }}</td>
                                    <td>{{ $item->appointment->patient->name }}</td>
                                    <td>{{ $item->amount }}</td>
                                    @php
                                        $color;
                                        if($item->status == 'unpaid'){
                                            $color = 'bg-yellow';
                                        } elseif ($item->status == 'paid') {
                                            $color = 'bg-green';
                                        } else {
                                            $color = 'bg-red';
                                        }
                                    @endphp
                                    <td><small class="label {{ $color }}">{{ $item->status }}</small></td>
                                    <td>

                                        @if($item->status == 'paid') 
                                        <a href="{{ url('/invoices/' . $item->id) }}" class="btn btn-success btn-xs" data-toggle="tooltip" title="View Invoice"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                        @else

                                        <a href="{{ url('/invoices/' . $item->id) }}" class="btn btn-success btn-xs" data-toggle="tooltip" title="View Invoice"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                        <a href="{{ url('/invoices/' . $item->id . '/edit') }}" data-toggle="tooltip" class="btn btn-primary btn-xs" title="Edit Invoice"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>

                                        {!! Form::open([
                                            'method'=>'DELETE',
                                            'url' => ['/invoices', $item->id],
                                            'style' => 'display:inline'
                                        ]) !!}
                                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                                    'type' => 'submit',
                                                    'class' => 'btn btn-danger btn-xs',
                                                    'title' => 'Delete Invoice',
                                                    'data-toggle' => 'tooltip',
                                                    'onclick'=>'return confirm("Confirm delete?")'
                                            )) !!}
                                        {!! Form::close() !!}

                                        {!! Form::open([
                                            'method'=>'GET',
                                            'url' => ['admin/payments/create'],
                                            'style' => 'display:inline'
                                        ]) !!}
                                            {!! Form::button('<span class="glyphicon glyphicon-usd" aria-hidden="true"/>', array(
                                                    'type' => 'submit',
                                                    'class' => 'btn btn-info btn-xs',
                                                    'title' => 'Make Payment',
                                                    'data-toggle' => 'tooltip'
                                            )) !!}
                                            {{ Form::hidden('invoice_id', $item->id) }}
                                        {!! Form::close() !!}
                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $invoices->render() !!} </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection