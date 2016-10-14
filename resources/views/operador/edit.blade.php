@extends('menu')

@section('content')
    <div class="container">
        <br>
        <div class="ibox-content">
            @if(Session::has('message'))
                <div class="alert alert-success">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <em> {!! session('message') !!}</em>
                </div>
            @endif

            @if(Session::has('errors'))
                <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <section class="content">
                {!! Form::model($model, ['route'=> ['operador.update', $model->id_operadores], 'method' => "POST" ]) !!}
                @include('tamplatesForms.tamplateFormOperador')
                {!! Form::close() !!}
            </section>
        </div>
    </div>
@stop