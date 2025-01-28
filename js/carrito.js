const selectorPago = document.getElementById('selector-pago');
const infoPago = document.getElementById('info-pago');
const botonesEliminar = document.querySelectorAll('.boton-eliminar');
const entradasCantidad = document.querySelectorAll('.entrada-cantidad');
const elementoPrecioTotal = document.getElementById('precio-total');

let precioTotal = 20.00; 

// Función para mostrar información de pago
selectorPago.addEventListener('change', () => {

    const opcionSeleccionada = selectorPago.value;
    infoPago.style.display = 'none';
    infoPago.innerHTML = '';

    if (opcionSeleccionada) {
        infoPago.style.display = 'block';
        switch (opcionSeleccionada) {
            case 'efectivo':
                infoPago.innerHTML = `
                    <p><strong>Pago en Efectivo:</strong> Puedes realizar el pago directamente en nuestra tienda al momento de retirar tu pedido.</p>
                    <p>Dirección: Barinitas.Calle 6, Entre Carrera 5 y 6</p>
                `;
                break;
            case 'transferencia':
                infoPago.innerHTML = `
                    <p><strong>Transferencia Bancaria:</strong></p>
                    <p>Banco de Venezuela</p>
                    <p>Número de Cuenta: 1234567890</p>
                    <p>Titular: Pedro</p>
                    <p>Cédula/RIF: V-8.548.236</p>
                `;
                break;
            case 'pago_movil':
                infoPago.innerHTML = `
                    <p><strong>Pago Móvil:</strong></p>
                    <p>Número Telefónico: +58 414-00000000</p>
                    <p>Cédula/RIF: V-12.345.678-9</p>
                    <p>Banco XYZ</p>
                `;
                break;
            case 'binance':
                infoPago.innerHTML = `
                    <p><strong>Pago con Binance:</strong></p>
                    <p>Wallet: abc123def456ghi789</p>
                    <p>Por favor, envía el comprobante una vez realizado el pago.</p>
                `;
                break;
            case 'paypal':
                infoPago.innerHTML = `
                    <p><strong>Pago con PayPal:</strong></p>
                    <p>Enlace de pago: <a href="https://www.paypal.me/" target="_blank">paypal.me/nombre_X</a></p>
                `;
                break;
            default:
                infoPago.innerHTML = '';
        }
    }
});

// Funcionalidad para eliminar productos del carrito
botonesEliminar.forEach(boton => {
    boton.addEventListener('click', (e) => {
        const itemCarrito = e.target.closest('.item-carrito');
        itemCarrito.remove();
        actualizarPrecioTotal();
    });
});

// Funcionalidad para actualizar la cantidad
entradasCantidad.forEach(entrada => {
    entrada.addEventListener('change', (e) => {
        if (isNaN(e.target.value) || e.target.value <= 0) {
            e.target.value = 1;
        } // Validamos que el valor sea un número válido y mayor que cero
            // isNaN() verifica si el valor NO es un número
        actualizarPrecioTotal();
    });
});

// Botones de aumentar y disminuir cantidad
const botonesCantidad = document.querySelectorAll('.boton-cantidad');

botonesCantidad.forEach(boton => {
    boton.addEventListener('click', (e) => {
        const entrada = e.target.parentElement.querySelector('.entrada-cantidad');
        let valorActual = parseInt(entrada.value);

        if (e.target.classList.contains('mas')) {
            entrada.value = valorActual + 1;
        } else if (e.target.classList.contains('menos') && valorActual > 1) {
            entrada.value = valorActual - 1;
        }
        actualizarPrecioTotal(); /// Ahhhhhh que dolor de cabeza!!!!! :c
    });
});

// Función para actualizar el precio total
function actualizarPrecioTotal() {
    let total = 0;
    const itemsCarrito = document.querySelectorAll('.item-carrito');

    itemsCarrito.forEach(item => {

        const elementoPrecio = item.querySelector('.precio-item');
        const elementoCantidad = item.querySelector('.entrada-cantidad');
        const precio = parseFloat(elementoPrecio.innerText.replace('$', ''));
        const cantidad = parseInt(elementoCantidad.value);
        total += precio * cantidad;

    });
    elementoPrecioTotal.innerText = `$${total.toFixed(2)}`;
}