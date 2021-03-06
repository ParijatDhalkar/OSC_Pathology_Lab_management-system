@extends('layouts.master')

@section('title') Pathology Lab | Home @endsection

@section('content_header')
<section class="content-header">
      <h1>
        Test Field
        <small>Edit</small>
      </h1>
    </section>
@endsection

@section('main_content')

    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-12">

                <div class="panel panel-default">
                    <div class="panel-heading">Edit Field {{ $field->id }}</div>
                    <div class="panel-body">

                        {{-- @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif --}}

                        {!! Form::model($field, [
                            'method' => 'PATCH',
                            'url' => ['/admin/fields', $field->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('fields.form', ['submitButtonText' => 'Update'])

                        {!! Form::close() !!}

                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection                