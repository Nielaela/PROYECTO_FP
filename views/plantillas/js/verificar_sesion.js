// Obtener el elemento del botón de subir un patrón
var botonSubirPatron = document.getElementById('boton-subir-patron');

// Verificar si el usuario ha iniciado sesión
if (usuarioConectado) {
    // Si el usuario está conectado, mostrar el botón
    botonSubirPatron.style.display = 'block';
} else {
    // Si el usuario no está conectado, ocultar el botón
    botonSubirPatron.style.display = 'none';
}