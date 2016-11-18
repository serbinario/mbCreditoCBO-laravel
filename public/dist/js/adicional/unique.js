$.validator.addMethod("unique",
    function(value, element, params) {
        var isUnique = false;
        if(value == '')
            return isUnique;

        id_send= '';
        if(params[1] !='')
           // id_send ='id='+params[1]+'&';

        $.ajax({
            url: '/index.php/contrato/searchCliente/' + value,
            type : 'GET',
            async: false,
            data: value,
            dataType: 'json',
            cache: true,
            success: function(data){
                if (data.dados.length == 0) {
                    isUnique = true;
                }
            }
        });

        return isUnique;

    },
    $.validator.format("O CPF informado já se encontra em uso")
);
