// Función para validar el correo electrónico
function validarEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

// Función para validar las contraseñas
function validarContrasena(password, confirmPassword) {
    return password === confirmPassword;
}

document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    form.addEventListener('submit', function(event) {
        // Validación del correo electrónico
        const emailInput = document.getElementById('email');
        const email = emailInput.value.trim();

        if (!validarEmail(email)) {
            event.preventDefault(); // Evita que el formulario se envíe
            alert('Por favor, introduce una dirección de correo electrónico válida.');
            return;
        }

        // Validación de las contraseñas
        const passwordInput = document.getElementById('newPassword');
        const confirmPasswordInput = document.getElementById('confirmPassword');
        const password = passwordInput.value;
        const confirmPassword = confirmPasswordInput.value;

        if (!validarContrasena(password, confirmPassword)) {
            event.preventDefault(); // Evita que el formulario se envíe
            alert('Las contraseñas no coinciden. Por favor, inténtalo de nuevo.');
        }
    });
});