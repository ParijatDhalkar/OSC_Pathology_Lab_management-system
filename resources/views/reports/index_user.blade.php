@extends('layouts.user')
@section('content')

<section class="content">
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Reports</div>
                    <div class="panel-body">
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th> Sample Id </th><th> Remarks </th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($reports as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->sample_id }}</td><td>{{ $item->remarks }}</td>
                                        <td>
                                            
                                            <a href="{{ url('/reports/' . $item->id) }}" class="btn btn-success btn-xs" title="View Report"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                            <a href="{{ route('reports.print', $item->id) }}" target="_blank" class="btn btn-success"><i class="fa fa-print"></i> Print</a> 
                                            
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $reports->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection