@extends('menu')

@section('content')
    <section id="content">
        <div class="container">
            <div class="card material-table">
                <div class="card-header">
                    <h2>Listar Usuários</h2>

                    <!-- Botão novo -->
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="text-right">
                                <a class="btn btn-primary btn-sm m-t-10", href="http://ser.cbo/index.php/usuario/create">Novo Usuário</a>
                            </div>
                        </div>
                    </div>
                    <!-- Botão novo -->

                </div>

                <div class="table-responsive">
                    <table id="usuario-grid" class="table table-hover">
                            <thead>
                            <tr>
                                <th>Login</th>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Açao</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Login</th>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Açao</th>
                            </tr>
                            </tfoot>
                    </table>
                </div>
            </div>

        </div>
    </section>

@stop

@section('javascript')
    <script type="text/javascript">
        var table = $('#usuario-grid').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{!! route('usuario.grid') !!}",
            columns: [
                {data: 'username', name: 'users.username'},
                {data: 'nome_operadores', name: 'operadores.nome_operadores'},
                {data: 'email', name: 'users.email'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    </script>
@stop