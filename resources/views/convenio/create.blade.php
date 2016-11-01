@extends('menu')

@section('content')
    <div class="container">
        <section id="content">
            {!! Form::open(['route'=>'convenio.store', 'id' => 'formOperador', 'method' => "POST" ]) !!}
            @include('tamplatesForms.tamplateFormConvenioCallCenter')
            {!! Form::close() !!}
        </section>
    </div>
@stop