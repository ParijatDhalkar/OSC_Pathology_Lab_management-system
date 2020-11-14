@extends('layouts.user')
@section('content')

<section class="content">
    <div class="row">
        <div class="col-lg-12 col-xs-12">                
            <div class="panel panel-default">
                <div class="panel-heading">Deatils for Invoice ID: {{ $invoice->id }}</div>
                <div class="panel-body">
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