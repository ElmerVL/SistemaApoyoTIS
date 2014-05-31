$("form").validate({
    rules: {
        nombre_usuario: {
            required: true, minlength: 5, maxlength: 20,remote:"../Controlador/ControladorVerificador.php?x=1",
        },
        contraseña_usuario1: {
            required: true, minlength: 5, maxlength: 20
        },
        contraseña_usuario2: {
            required: true, minlength: 5, maxlength: 20 , equalTo: "#contraseña_usuario1"
        },
        nombre_largo_ge: {
            required: true, minlength: 5, maxlength: 45
        },
        nombre_corto_ge: {
            required: true, minlength: 5, maxlength: 15
        },
        correo_ge: {
            required: true, email: true, maxlength: 70
        },
        direccion_ge: {
            required: true, minlength: 5, maxlength: 50
        },
        telefono_ge: {
            required: true, number: true
        }
    },
    messages: {
        nombre_usuario: {
            required: "Introduzca el Nombre de Usuario.",
            minlength: "Mínimo {0} Caracteres.",
            maxlength: "Máximo {0} Caracteres.",
            remote:"nombre de usuario ya registrado"
        },
        contraseña_usuario1: {
            required: "Introduzca su Contraseña.",
            minlength: "Mínimo {0} Caracteres.",
            maxlength: "Máximo {0} Caracteres."
        },
        contraseña_usuario2: {
            required: "Repita la Contraseña.",
            equalTo: "Las contraseñas no coinciden.",
            minlength: "Mínimo {0} Caracteres.",
            maxlength: "Máximo {0} Caracteres."
        },
        nombre_largo_ge: {
            required: "Introduzca el Nombre de su Empresa.",
            minlength: "Mínimo {0} Caracteres.",
            maxlength: "Máximo {0} Caracteres."
        },
        nombre_corto_ge: {
            required: "Introduzca el Nombre Corto de su Empresa.",
            minlength: "Mínimo {0} Caracteres.",
            maxlength: "Máximo {0} Caracteres."
        },
        correo_ge: {
            required: "Introduzca su correo electrónico.",
            email:"Introduzca un correo electrónico válido",
            minlength: "Mínimo {0} Caracteres.",
            maxlength: "Máximo {0} Caracteres."
        },
        direccion_ge: {
            required: "Introduzca su dirección.",
            minlength: "Mínimo {0} Caracteres.",
            maxlength: "Máximo {0} Caracteres."
        },
        telefono_ge: {
            required: "Introduzca su teléfono.",
            number: "Introduzca un número válido.",
        }
    },
    
    errorElement: 'small',
    errorPlacement: function(error, element) {
        error.html(error.text()).insertAfter(element).hide().fadeIn();
    },
    submitHandler: function(form) {
        form.submit();
    }



});


