const modalProducto = document.getElementById('modalProducto');
const modalEliminar = document.getElementById('modalEliminar');
const formProducto = document.getElementById('formProducto');
const formEliminar = document.getElementById('formEliminar');
const btnAgregar = document.getElementById('agregarProducto');
const btnCancelar = document.getElementById('btnCancelar');
const btnCancelarEliminar = document.getElementById('btnCancelarEliminar');

let productoActual = null;

// Abrir modal para agregar/editar producto
btnAgregar.addEventListener('click', () => {
    document.getElementById('tituloModal').textContent = 'Agregar Producto';
    formProducto.reset();
    productoActual = null;
    modalProducto.style.display = 'flex';
});

// Cerrar modal de producto
btnCancelar.addEventListener('click', () => {
    modalProducto.style.display = 'none';
});

// Cerrar modal de eliminar
btnCancelarEliminar.addEventListener('click', () => {
    modalEliminar.style.display = 'none';
});

// Abrir modal para editar producto
function abrirModalEditar(id) {
    // Aquí puedes obtener los datos del producto desde una API o un array
    const producto = { id: id, nombre: 'Producto ' + id, precio: 10.00, stock: 50 };
    document.getElementById('tituloModal').textContent = 'Editar Producto';
    document.getElementById('nombre').value = producto.nombre;
    document.getElementById('precio').value = producto.precio;
    document.getElementById('stock').value = producto.stock;
    productoActual = producto;
    modalProducto.style.display = 'flex';
}

// Abrir modal para eliminar producto
function abrirModalEliminar(id) {
    productoActual = id;
    modalEliminar.style.display = 'flex';
}

// Guardar o actualizar producto
formProducto.addEventListener('submit', (e) => {
    e.preventDefault();
    const nombre = document.getElementById('nombre').value;
    const precio = document.getElementById('precio').value;
    const stock = document.getElementById('stock').value;

    if (productoActual) {
        // Lógica para actualizar el producto
        console.log('Actualizando producto:', { id: productoActual.id, nombre, precio, stock });
    } else {
        // Lógica para agregar el producto
        console.log('Agregando producto:', { nombre, precio, stock });
    }

    modalProducto.style.display = 'none';
});

// Eliminar producto
formEliminar.addEventListener('submit', (e) => {
    e.preventDefault();
    console.log('Eliminando producto con ID:', productoActual);
    modalEliminar.style.display = 'none';
});