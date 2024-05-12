
    document.getElementById('btn-filtrar').addEventListener('click', function() {
        var categoria = document.getElementById('filtro-categoria').value;

        // Envía una solicitud AJAX al servidor para obtener la lista filtrada de patrones
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'patrones.php?categoria=' + categoria, true);
        xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 300) {
                // Procesa la respuesta del servidor
                var patrones = JSON.parse(xhr.responseText);
                // Renderiza los patrones en la vista
                renderizarPatrones(patrones);
            } else {
                console.error('Error al obtener la lista de patrones');
            }
        };
        xhr.send();
    });

    function renderizarPatrones(patrones) {
        // Lógica para renderizar los patrones en la vista
        // Puedes usar jQuery, Vue.js, Angular u otra biblioteca/framework
        // O simplemente manipular el DOM directamente con JavaScript vanilla
    }

// REVISAR NO FUNCIONA