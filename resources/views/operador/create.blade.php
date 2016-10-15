@extends('menu')

@section('content')
    <div class="container">
        <section class="content">
            {{--{!! Form::open(['route'=>'operador.store', 'id' => 'formOperador', 'method' => "POST" ]) !!}--}}
            @include('tamplatesForms.tamplateFormOperador')
            {{--{!! Form::close() !!}--}}
        </section>
    </div>

@stop