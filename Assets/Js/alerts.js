// Función para mostrar una alerta flotante con un mensaje
function mostrarAlerta(mensaje) {
    // Crea un elemento div para la alerta
    var alerta = document.createElement('div');
    alerta.className = 'alert';
    alerta.innerHTML = mensaje;

    // Agrega la alerta al contenedor de alertas en el DOM
    document.getElementById('alert-container').appendChild(alerta);

    // Muestra la alerta
    alerta.style.display = 'block';

    // Oculta la alerta después de 5 segundos (5000 milisegundos)
    setTimeout(function() {
        alerta.style.display = 'none';
        // Elimina la alerta del DOM después de ocultarla
        document.getElementById('alert-container').removeChild(alerta);
    }, 5000);
}
