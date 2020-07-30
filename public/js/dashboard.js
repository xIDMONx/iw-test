let crud = function () {
    let table = function () {
        var tabla = "#movies";
        
        var init = function () {
            $(tabla).DataTable({
                'ajax':       {
                    'type': 'GET',
                    'url':  `api/usuario/${id}/movies`
                },
                'createdRow': function (row) {
                    $(row).css({'text-align': 'center'});
                },
                'columns':    [
                    {data: 'name'},
                    {data: 'gender'},
                    {data: 'premiere_date'},
                    {data: 'descripcion'},
                    {
                        data:   null,
                        render: function (data, type, full) {
                            return `<a class="btn btn-primary btn-sm" accion="editar" identificador="${data.id}"><i class="fa fa-edit fa-fw"></i></a>&nbsp;<a class="btn btn-danger btn-sm" accion="eliminar" identificador="${data.id}"><i class="fa fa-trash fa-fw"></i></a>`;
                        }
                    }
                ],
                'language':   {
                    'url': "js/Spanish.json"
                },
                'responsive': true,
                'searching':  false
            });
    
            $(`${tabla} tbody`).on('click', 'a', function () {
                var accion = $(this).attr('accion'),
                    identificador     = $(this).attr('identificador');
        
                if (accion === 'eliminar') {
                    $.ajax({
                        url: `api/movie/${identificador}`,
                        type: 'delete',
                        beforeSend: function () {
                            /*Muestro el loading para indicar visualmente que se esta procesando la solicitud.*/
                            $("#divLoading").addClass('show');
                        },
                        success:    function (response) {
                            /*Recargamos la tabla*/
                            table().reload();
                        },
                        complete:   function () {
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
                    });
                }
        
                if (accion === 'editar') {
                    $.getJSON(`api/movie/${identificador}`, function (response) {
                        let modal = "#modalEditMovie";
                        let form = $(modal).find('form'),
                            action = form.attr('action');
                        
                        form.attr('action', `${action}/${identificador}`);
                
                        $.each(response, function (k, v) {
                            $(modal).find(`#${k}`).val(v);
                        })
                
                        $(modal).modal('show');
                    });
                }
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
        $("#add_movie_submit").click(function (e) {
            e.preventDefault();
            var btn = $(this);
            var form = $(this).closest('form');
            
            form.validate({
                rules: {
                    name:  {
                        required: true
                    },
                    email: {
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
                    $("#addMovie").modal('toggle');
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
    let update = function () {
        $("#edit_movie_submit").click(function (e) {
            e.preventDefault();
            var btn = $(this);
            var form = $(this).closest('form');
            
            form.validate({
                rules: {
                    name:           {
                        required: true
                    },
                    premiere_date: {
                        required: true
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
                    /*Limpiamos los campos del formulario*/
                    form[0].reset();
                    /*Oculto el modal*/
                    $("#modalEditMovie").modal('toggle');
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
            update();
        }
    }
};

$(document).ready(function () {
    crud().init();
});
