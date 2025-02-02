// Abrir y cerrar la barra lateral
document.getElementById('botonMenu').addEventListener('click', function () {

    var barraLateral = document.getElementById('barraLateral');
    var fondoOscuro = document.getElementById('fondoOscuro');

    if (barraLateral.style.left === '-250px' || barraLateral.style.left === '') {

        barraLateral.style.left = '0px'; // Abre la barra lateral
        fondoOscuro.style.display = 'block'; // Muestra el fondo oscuro

    } else {
        
        barraLateral.style.left = '-250px'; // Cierra la barra lateral
        fondoOscuro.style.display = 'none'; // Oculta el fondo oscuro
    }
});

// Cerrar la barra lateral al hacer clic en el fondo oscuro
document.getElementById('fondoOscuro').addEventListener('click', function () {

    var barraLateral = document.getElementById('barraLateral');
    var fondoOscuro = document.getElementById('fondoOscuro');

    barraLateral.style.left = '-250px'; // Cierra la barra lateral
    fondoOscuro.style.display = 'none'; // Oculta el fondo oscuro

});