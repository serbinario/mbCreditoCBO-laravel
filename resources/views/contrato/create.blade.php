@extends('menu')

@section('content')
    <div class="container">
        <section id="content">
            {!! Form::open(['route'=>'contrato.store', 'id' => 'formContrato', 'method' => "POST" ]) !!}
            @include('tamplatesForms.tamplateFormContrato')
            {!! Form::close() !!}
        </section>
    </div>
@stop