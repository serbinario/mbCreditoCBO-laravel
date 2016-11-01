@extends('menu')

@section('content')
    <div class="container">
        <section id="content">
            {!! Form::open(['route'=>'usuario.store', 'id' => 'formUsuario', 'method' => "POST" ]) !!}
            @include('tamplatesForms.tamplateFormUsuario')
            {!! Form::close() !!}
        </section>
    </div>

@stop