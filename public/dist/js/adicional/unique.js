$.validator.addMethod("unique",
    function(value, element, params) {
        var isUnique = false;
        if(value == '')
            return isUnique;

        id_send= '';
        if(params[1] !='')
           // id_send ='id='+params[1]+'&';

        $.ajax({
            url: params[0] + value,
            type : 'GET',
            async: false,
            //data: value,
            dataType: 'json',
            cache: true,
            success: function(data){
                isUnique = false;
            }
        });

        return isUnique;

    },
    jQuery.validator.format("O CPF informado já se encontra em uso")
);
