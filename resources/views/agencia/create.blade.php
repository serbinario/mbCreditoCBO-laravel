@extends('menu')

@section('content')
    <div class="container">
        <section id="content">
            {!! Form::open(['route'=>'agencia.store', 'id' => 'formOperador', 'method' => "POST" ]) !!}
            @include('tamplatesForms.tamplateFormAgenciaCallCenter')
            {!! Form::close() !!}
        </section>
    </div>

@stop