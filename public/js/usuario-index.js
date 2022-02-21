$(function() {
    $('.usuario-list-table').DataTable({
        columnDefs: [{
                targets: 0,
                visible: false
            },
            {
                targets: -1,
                width: "15%",
                orderable: false
            }
        ],
        order: [
            [2, 'desc']
        ],
        dom: '<"d-flex justify-content-between align-items-center header-actions mx-1 row mt-75"' +
            '<"col-lg-12 col-xl-3" l>' +
            '<"col-lg-12 col-xl-9 pl-xl-75 pl-0"<"dt-action-buttons text-xl-right text-lg-left text-md-right text-left d-flex align-items-center justify-content-lg-end align-items-center flex-sm-nowrap flex-wrap mr-1"<"mr-1"f>B>>' +
            '>t' +
            '<"d-flex justify-content-between mx-2 row mb-1"' +
            '<"col-sm-12 col-md-6"i>' +
            '<"col-sm-12 col-md-6"p>' +
            '>',
        language: {
            "url": "https://cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json",
            paginate: {
                // remove previous & next text from pagination
                previous: '&nbsp;',
                next: '&nbsp;'
            }
        },
    });

    $('.delete').on('click', function(e) {
        form = $('#eliminar');
        e.preventDefault();

        Swal.fire({
            title: '¿Está seguro que desea eliminar el usuario?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Eliminar',
            cancelButtonText: `Cancelar`,
        }).then((result) => {
            if (result.isConfirmed) {
                form[0].submit();
            }
        })
    });
});