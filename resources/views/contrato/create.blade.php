@extends('menu_old')

@section('content')
    <div class="container">
        <section class="content">
            {!! Form::open(['route'=>'contrato.store', 'id' => 'formContrato', 'method' => "POST" ]) !!}
            @include('tamplatesForms.tamplateFormContrato')
            {!! Form::close() !!}
        </section>
    </div>
@stop