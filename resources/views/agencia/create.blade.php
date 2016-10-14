@extends('menu')

@section('content')
    <div class="container">
        <section class="content">
            {!! Form::open(['route'=>'agencia.store', 'id' => 'formOperador', 'method' => "POST" ]) !!}
            @include('tamplatesForms.tamplateFormAgenciaCallCenter')
            {!! Form::close() !!}
        </section>
    </div>

@stop