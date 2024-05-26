function mostrarFormulario() {
    var formulario = document.getElementById('formulario-accion');
    if (formulario.style.display === 'none' || formulario.style.display === '') {
        formulario.style.display = 'block';
    } else {
        formulario.style.display = 'none';
    }
}
