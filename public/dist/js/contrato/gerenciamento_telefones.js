// Gereciamento de telefones para clientes encontrados no filtro de cpf

// Referencia global a table de telefones
var objTablePhone;

// Função construtora da table de telefones para editar
function TablePhonesEdit(_idClient) {
    // Atributo que armazenará o id do cliente
    this.idClient = _idClient;

    // Atributo que armazenará a table
    var table = $('#telefones-grid').DataTable({
        processing: true,
        serverSide: true,
        ajax: "/index.php/contrato/telefone/grid/" + this.idClient,
        columns: [
            {data: 'telefone', name: 'telefones.telefone'}
            // {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });

    // Recupera a table carregada
    this.getTable = function () {
        return table;
    }

    // Método que persisti o telefone no banco
    this.newFone = function (_fone) {
        // Requisição ajax
        jQuery.ajax({
            type: 'POST',
            url: '/index.php/contrato/telefone/store/' + this.idClient,
            data: {'telefone' : _fone},
            datatype: 'json'
        }).done(function (json)  {
            // Recarregando a grid
            this.getTable().ajax.reload();
        });
    };
}
