document.addEventListener('DOMContentLoaded', () => {
    const agendarButtons = document.querySelectorAll('.btn-agendar');

    agendarButtons.forEach(button => {
        button.addEventListener('click', (event) => {
            const autoId = button.getAttribute('data-id');
            const autoDescripcion = button.getAttribute('data-descripcion');

            document.getElementById('autoId').value = autoId;
            document.getElementById('autoDescripcion').value = autoDescripcion;

            const modal = new bootstrap.Modal(document.getElementById('modalAgendarPrueba'));
            modal.show();
        });
    });
});
