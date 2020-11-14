@extends('layouts.user')
@section('content')

<section class="content">
    <div class="row">
        <div class="col-lg-12 col-xs-12">                



            <div class="panel panel-default">
                <div class="panel-heading">Deatils for Invoice ID: {{ $invoice->id }}</div>
                <div class="panel-body">

                    <a href="{{ url('invoices/' . $invoice->id . '/edit') }}" data-toggle="tooltip" class="btn btn-primary btn-xs" title="Edit Invoice"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                    {!! Form::open([
                        'method'=>'DELETE',
                        'url' => ['invoices', $invoice->id],
                        'style' => 'display:inline'
                    ]) !!}
                        {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                'type' => 'submit',
                                'class' => 'btn btn-danger btn-xs',
                                'title' => 'Delete Invoice',
                                'data-toggle' => 'tooltip',
                                'onclick'=>'return confirm("Confirm delete?")'
                        ))!!}
                    {!! Form::close() !!}
                    {{-- <a href="{{ route('invoices.print', $invoice->id) }}" data-toggle="tooltip" class="btn btn-success btn-xs" title="Print Invoice"><span class="glyphicon glyphicon-print" aria-hidden="true"/></a> --}}
                    <br/>
                    <br/>

                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th>ID</th><td>{{ $invoice->id }}</td>
                                </tr>
                                <tr><th> Appointment Id </th><td> {{ $invoice->appointment_id }} </td></tr>
                                <tr><th> Amount </th><td> {{ $invoice->amount }} INR</td></tr>
                                <tr><th> Status </th><td> {{ $invoice->status }} </td></tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

         </div>
    </div>
</section>


@endsection