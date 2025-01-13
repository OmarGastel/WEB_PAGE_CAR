document.addEventListener('DOMContentLoaded', function () {
    const modalAgendar = new bootstrap.Modal(document.getElementById('modalAgendarPrueba'));
    const btnsAgendar = document.querySelectorAll('.btn-agendar');

    btnsAgendar.forEach(btn => {
        btn.addEventListener('click', () => {
            const autoId = btn.getAttribute('data-id');
            const descripcion = btn.getAttribute('data-descripcion');

            // Rellena los campos del modal
            document.getElementById('autoId').value = autoId;
            document.getElementById('autoDescripcion').value = descripcion;

            // Muestra el modal
            modalAgendar.show();
        });
    });
});
