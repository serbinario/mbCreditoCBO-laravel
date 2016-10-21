@extends('menu')

@section('content')
    <div class="container">
        <section class="content">
            {!! Form::open(['route'=>'usuario.store', 'id' => 'formUsuario', 'method' => "POST" ]) !!}
            @include('tamplatesForms.tamplateFormUsuario')
            {!! Form::close() !!}
        </section>
    </div>

@stop