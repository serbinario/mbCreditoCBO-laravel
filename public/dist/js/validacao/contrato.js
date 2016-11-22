// Regras de validação
$(document).ready(function () {

    $("#formContrato").validate({
        rules: {
            /*searchCpf: {
                number: true,
                maxlength: 15
            },*/
            name: {
                required: true,
                /*alphaSpace: true,*/
                maxlength: 200
            },
            cpf: {
                required: true,
                cpfBR: true,
                maxlength: 15,
                unique: ['/index.php/contrato/searchCpf', $('#idCliente').val()]
            },
            addPhoneText: {
                required: true,
                number: true,
                maxlength: 12
            },
            agencia_id: {
                required: true,
                integer: true
            },
            conta: {
                required: true,
                bankBr: true,
                maxlength: 15,
            },
            'contrato[convenio_id]': {
                required: true,
                integer: true
            },
            'contrato[tipo_contrato_id]': {
                required: true,
                integer: true
            },
            'contrato[data_contratado]': {
                required: true,
                date: true
            },
            'contrato[valor_contratado]': {
                required: true,
                number: true
            },
            'contrato[codigo_transacao]': {
                required: true,
                number: true,
                unique: ['/index.php/contrato/searchContrato', $('#idCliente').val()]
            },
            'contrato[prazo]': {
                required: true
            },
            'contrato[data_prox_chamada]': {
                required: true,
                date: true
            },
            'contrato[matricula]': {
                maxlength: 20,
                number: true
            }
        },
        //For custom messages
        /*messages: {
            nome_operadores:{
                required: "Enter a username",
                minlength: "Enter at least 5 characters"
            }
        },*/
        //Define qual elemento será adicionado
        errorElement : 'small',
        errorPlacement: function(error, element) {
            error.insertAfter(element.parent());
        },

        highlight: function(element, errorClass) {
            //console.log("Error");
            $(element).parent().parent().addClass("has-error");
        },
        unhighlight: function(element, errorClass, validClass) {
            //console.log("Sucess");
            $(element).parent().parent().removeClass("has-error");
        }
    });
});