const selectorPago = document.getElementById('selector-pago');
const infoPago = document.getElementById('info-pago');
const botonesEliminar = document.querySelectorAll('.boton-eliminar');
const entradasCantidad = document.querySelectorAll('.entrada-cantidad');
const elementoPrecioTotal = document.getElementById('precio-total');



// Mostrar información de pago
selectorPago.addEventListener('change', () => {
    const metodoSeleccionado = selectorPago.value;
    
    // Ocultamos toda la información de pago
    document.querySelectorAll('.metodo-info').forEach(info => {
        info.style.display = 'none';
    });

    document.querySelectorAll('.campo-formulario').forEach(info => {
        info.style.display = 'none';
    });
    
    // Mostramos solo la información correspondiente / necesaria al metodo de pago
    if (metodoSeleccionado) {
        const infoMostrar = document.querySelector(`[data-metodo="${metodoSeleccionado}"]`);
        const efectivo = document.querySelector('[data-metodo=efectivo]');

        if(infoMostrar == efectivo){
            infoMostrar.style.display = 'block';
            infoPago.style.display = 'block';
            document.querySelectorAll('.campo-formulario').forEach(info => {
                info.style.display = 'none';
            });
        }
        else{
            if (infoMostrar){
                infoMostrar.style.display = 'block';
                infoPago.style.display = 'block';
                document.querySelectorAll('.campo-formulario').forEach(info => {
                    info.style.display = 'block';
                });

            } else {
                infoPago.style.display = 'none';
            }
            
        }
    }
});

//OPCIONAL
// Eliminamos productos del carrito
botonesEliminar.forEach(boton => {
    boton.addEventListener('click', (e) => {
        const itemCarrito = e.target.closest('.item-carrito');
        itemCarrito.remove();
        actualizarPrecioTotal();
    });
});

// Actualizamos la cantidad del campo input
entradasCantidad.forEach(entrada => {
    entrada.addEventListener('change', (e) => {
        if (isNaN(e.target.value) || e.target.value <= 0) {
            e.target.value = 1;
        }
        actualizarPrecioTotal();
    });
});

// Botones de cantidad
document.querySelectorAll('.boton-cantidad').forEach(boton => {
    boton.addEventListener('click', (e) => {
        const entrada = e.target.parentElement.querySelector('.entrada-cantidad');
        let valorActual = parseInt(entrada.value) || 1;
        
        if (e.target.classList.contains('mas')) {
            entrada.value = valorActual + 1;
        } else if (e.target.classList.contains('menos') && valorActual > 1) {
            entrada.value = valorActual - 1;
        }
        actualizarPrecioTotal();
    });
});

// Calcular precio total
function actualizarPrecioTotal() {
    let total = 0;
    document.querySelectorAll('.item-carrito').forEach(item => {
        const precio = parseFloat(item.querySelector('.precio-item').textContent.replace('$', ''));
        const cantidad = parseInt(item.querySelector('.entrada-cantidad').value) || 1;
        total += precio * cantidad;
    });
    elementoPrecioTotal.textContent = `$${total.toFixed(2)}`;
}


actualizarPrecioTotal();
