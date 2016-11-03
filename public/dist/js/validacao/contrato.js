// Regras de validação
$(document).ready(function () {

    $("#formContrato").validate({
        rules: {
            'cliente[name]': {
                required: true,
                alphaSpace: true,
                maxlength: 200
            },
            'cliente[cpf]': {
                required: true,
                number: true,
                maxlength: 15
            },
            'cliente[telefone]': {
                required: true,
                number: true,
                maxlength: 11
            },
            'cliente[agencia_id]': {
                required: true,
                integer: true
            },
            'cliente[conta]': {
                required: true,
                number: true,
                maxlength: 6
            },
            convenio_id: {
                required: true,
                integer: true
            },
            tipo_contrato_id: {
                required: true,
                integer: true
            },
            data_contratado: {
                date: true,
                minlength:true
            },
            valor_contratado: {
                required: true,
                number: true
            },
            codigo_transacao: {
                required: true,
                number: true
            },
            prazo: {
                required: true
            },
            data_prox_chamada: {
                date: true
            },
        },
        //For custom messages
        messages: {
            nome_operadores:{
                required: "Enter a username",
                minlength: "Enter at least 5 characters"
            }
        },
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