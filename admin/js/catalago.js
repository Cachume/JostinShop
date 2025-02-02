const modalCatalogo = document.getElementById('modalCatalogo');
const modalEliminarCatalogo = document.getElementById('modalEliminarCatalogo');
const formCatalogo = document.getElementById('formCatalogo');
const formEliminarCatalogo = document.getElementById('formEliminarCatalogo');
const btnAgregarCatalogo = document.getElementById('agregarCatalogo');
const btnCancelarCatalogo = document.getElementById('btnCancelarCatalogo');
const btnCancelarEliminarCatalogo = document.getElementById('btnCancelarEliminarCatalogo');

let catalogoActual = null;

// Abrir modal para agregar/editar catálogo
btnAgregarCatalogo.addEventListener('click', () => {
    document.getElementById('tituloModalCatalogo').textContent = 'Agregar Catálogo';
    formCatalogo.reset();
    catalogoActual = null;
    modalCatalogo.style.display = 'flex';
});

// Cerrar modal de catálogo
btnCancelarCatalogo.addEventListener('click', () => {
    modalCatalogo.style.display = 'none';
});

// Cerrar modal de eliminar catálogo
btnCancelarEliminarCatalogo.addEventListener('click', () => {
    modalEliminarCatalogo.style.display = 'none';
});

// Abrir modal para editar catálogo
function abrirModalEditarCatalogo(id) {

    const catalogo = { id: id, nombre: 'Camisas' };
    
    document.getElementById('tituloModalCatalogo').textContent = 'Editar Catálogo';
    document.getElementById('nombreCatalogo').value = catalogo.nombre;
    catalogoActual = catalogo;
    modalCatalogo.style.display = 'flex';
}

// Abrir modal para eliminar catálogo
function abrirModalEliminarCatalogo(id) {
    catalogoActual = id;
    modalEliminarCatalogo.style.display = 'flex';
}

// Guardar o actualizar catálogo
formCatalogo.addEventListener('submit', (e) => {
    e.preventDefault();
    const nombreCatalogo = document.getElementById('nombreCatalogo').value;

    if (catalogoActual) {
        console.log('Actualizando catálogo:', { id: catalogoActual.id, nombre: nombreCatalogo });
    } else {
        console.log('Agregando catálogo:', { nombre: nombreCatalogo });
    }

    modalCatalogo.style.display = 'none';
});

// Eliminar catálogo
formEliminarCatalogo.addEventListener('submit', (e) => {
    e.preventDefault();
    console.log('Eliminando catálogo con ID:', catalogoActual);
    modalEliminarCatalogo.style.display = 'none';
});