document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form"); // Asegúrate de envolver los inputs en un <form>
    
    form.addEventListener("submit", function (event) {
        event.preventDefault(); // Evita el envío del formulario si hay errores
        
        let isValid = true;

        // Obtener los campos
        const email = document.getElementById("email");
        const cdi = document.getElementById("cdi");
        const pass = document.getElementById("pass");
        const passc = document.getElementById("passc");

        // Validar correo
        if (!validateEmail(email.value)) {
            showError(email, "Correo inválido");
            isValid = false;
        } else {
            clearError(email);
        }

        // Validar cédula (debe ser un número y tener al menos 6 caracteres)
        if (!cdi.value || cdi.value.length < 6) {
            showError(cdi, "Cédula inválida");
            isValid = false;
        } else {
            clearError(cdi);
        }

        // Validar contraseña (mínimo 6 caracteres)
        if (pass.value.length < 6) {
            showError(pass, "La contraseña debe tener al menos 6 caracteres");
            isValid = false;
        } else {
            clearError(pass);
        }

        // Validar confirmación de contraseña
        if (passc.value !== pass.value) {
            showError(passc, "Las contraseñas no coinciden");
            isValid = false;
        } else {
            clearError(passc);
        }

        // Si todo es válido, puedes enviar el formulario
        if (isValid) {
            form.submit();
        }
    });

    // Función para validar correo electrónico
    function validateEmail(email) {
        const re = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        return re.test(email);
    }

    // Función para mostrar error
    function showError(input, message) {
        const errorSpan = input.nextElementSibling;
        errorSpan.textContent = message;
        errorSpan.style.color = "red";
    }

    // Función para limpiar error
    function clearError(input) {
        const errorSpan = input.nextElementSibling;
        errorSpan.textContent = "";
    }
});
