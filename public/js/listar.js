let crud = function () {
    let table = function () {
        var tabla = "#usuarios";
        
        var init = function () {
            $(tabla).DataTable({
                'ajax':       {
                    'type': 'GET',
                    'url':  'api/usuarios'
                },
                'createdRow': function (row) {
                    $(row).css({'text-align': 'center'});
                },
                'columns':    [
                    {data: 'name'},
                    {data: 'email'},
                    {data: 'telephone'},
                    {data: 'password'}
                ],
                'language':   {
                    'url': "js/Spanish.json"
                },
                'responsive': true,
                'searching':  false
            });
        };
        
        var reload = function () {
            if (!$.fn.DataTable(tabla)) {
                init();
            }
            $(tabla).DataTable().ajax.reload(null, false);
        };
        
        return {
            init:   function () {
                init()
            },
            reload: function () {
                reload()
            }
        }
    };
    let create = function () {
        $("#add_user_submit").click(function (e) {
            e.preventDefault();
            var btn = $(this);
            var form = $(this).closest('form');
            
            form.validate({
                rules: {
                    name:               {
                        required: true
                    },
                    email:              {
                        required: true,
                        email:    true
                    }
                }
            });
            
            if (!form.valid()) {
                return;
            }
            
            $.ajax({
                url:        form.attr('action'),
                type:       form.attr('method'),
                data:       form.serialize(),
                dataType:   'json',
                beforeSend: function () {
                    /*Deshabilito el boton de registro para prevenir muchas peticiones.*/
                    btn.attr('disabled', 'disabled');
                    /*Muestro el loading para indicar visualmente que se esta procesando la solicitud.*/
                    $("#divLoading").addClass('show');
                },
                success:    function (response) {
                    if (!response.success) {
                        /*Si ocurrió un error notificamos al usuario*/
                        return $.notify(response.msg, "error");
                    }
                    /*Limpiamos los campos del formulario*/
                    form[0].reset();
                    /*Oculto el modal*/
                    $("#modalAddUser").modal('toggle');
                    /*Notifico que se creo un nuevo usuario*/
                    $.notify(response.msg, "success");
                    /*Recargamos la tabla*/
                    table().reload();
                },
                complete:   function () {
                    /*Remuevo el atributo disabled*/
                    btn.removeAttr('disabled');
                    /**/
                    $("#divLoading").removeClass('show');
                },
                error:      function (jqXHR, exception) {
                    $("#divLoading").removeClass('show');
                    
                    let message = '';
                    if (jqXHR.status === 0) {
                        message = 'Not connect.\n Verify Network.';
                    } else if (jqXHR.status === 404) {
                        message = 'Requested page not found. [404]';
                    } else if (jqXHR.status === 500) {
                        message = 'Internal Server Error [500].';
                    } else if (exception === 'parsererror') {
                        message = 'Requested JSON parse failed.';
                    } else if (exception === 'timeout') {
                        message = 'Time out error.';
                    } else if (exception === 'abort') {
                        message = 'Ajax request aborted.';
                    } else {
                        message = 'Uncaught Error.\n' + jqXHR.responseText;
                    }
                    
                    $.notify(message, 'error');
                },
                timeout:    5000
            })
        });
    };
    
    return {
        init: function () {
            table().init();
            create();
        }
    }
};

$(document).ready(function () {
    crud().init();
});
