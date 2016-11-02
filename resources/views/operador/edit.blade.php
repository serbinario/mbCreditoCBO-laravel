@extends('menu')

@section('content')
    <div class="container">
            <section id="content">
                {!! Form::model($model, ['route'=> ['operador.update', $model->id_operadores], 'id' => 'formOperador', 'method' => "POST" ]) !!}
                @include('tamplatesForms.tamplateFormOperador')
                {!! Form::close() !!}
            </section>
        </div>
@stop