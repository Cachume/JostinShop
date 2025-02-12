document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form"); 
    
    form.addEventListener("submit", function (event) {
        event.preventDefault(); 
        
        let isValid = true;

        // Obtener los campos
        const email = document.getElementById("email");
        const pass = document.getElementById("pass");
   

        // Validar correo
        if (!validateEmail(email.value)) {
            showError(email, "Correo inválido");
            isValid = false;
        } else {
            clearError(email);
        }

        // Validar contraseña (mínimo 6 caracteres)
        if (pass.value.length < 6) {
            showError(pass, "La contraseña debe tener al menos 6 caracteres");
            isValid = false;
        } else {
            clearError(pass);
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
