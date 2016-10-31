@extends('menu')

@section('content')
    <div class="container">
        <section class="content">
            {!! Form::open(['route'=>'operador.store', 'id' => 'novoFormOperador', 'method' => "POST" ]) !!}
            @include('tamplatesForms.tamplateNovoFormOperador')
            {!! Form::close() !!}
        </section>
    </div>

@stop