$(document).ready(function() {
    var addButton;

    if (window.location.pathname.includes('acc_manage.php')) {
        addButton = '<div class="mb-1"><button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addAccount" id="add_btn"><i class="bx bx-plus"></i> Add Account</button></div>';
    }
    // Check if the current page is suppliers.php
    else if (window.location.pathname.includes('suppliers.php')) {
        addButton = '<div class="mb-1"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSupplier"><i class="bx bx-plus"></i> Add Supplier</button></div>';
    }
    

    var table = $('#table').DataTable({
        buttons: [
            // Export buttons configuration
            {
                extend: 'copy',
                className: 'btn btn-sm btn-dark export rounded m-1',
                text: '<i class="bx bx-copy"></i> Copy',
                exportOptions: {
                    columns: ':not(:last-child)' // Exclude the last column (Options)
                }
            },
            {
                extend: 'excel',
                className: 'btn btn-sm btn-dark export rounded m-1',
                text: '<i class="bx bxs-spreadsheet"></i> Excel',
                exportOptions: {
                    columns: ':not(:last-child)' // Exclude the last column (Options)
                }
            },
            {
                extend: 'pdf',
                className: 'btn btn-sm btn-dark export rounded m-1',
                text: '<i class="bx bxs-file-pdf"></i> PDF',
                exportOptions: {
                    columns: ':not(:last-child)' // Exclude the last column (Options)
                }
            },
            {
                extend: 'print',
                className: 'btn btn-sm btn-dark export rounded m-1',
                text: '<i class="bx bxs-printer"></i> Print',
                exportOptions: {
                    columns: ':not(:last-child)' // Exclude the last column (Options)
                }
            }
        ],
        language: {
            searchPlaceholder: "Search",
            search: ""
        }
    });

    table.buttons().container().appendTo('#table_wrapper .col-md-6:eq(0)');

    // Center the search bar on smaller screens
    function centerSearchBar() {
        var windowWidth = $(window).width();
        if (windowWidth < 768) {
            $('.dataTables_wrapper .dataTables_filter')
                .addClass('text-center')
                .removeClass('float-md-end')
                .css({
                    'width': '100%',
                    'margin-bottom': '10px'
                });
        } else {
            $('.dataTables_wrapper .dataTables_filter')
                .removeClass('text-center')
                .addClass('float-md-end')
                .css({
                    'width': 'auto',
                    'margin-bottom': '0'
                });
        }
    }

    // Call the function on page load and window resize
    centerSearchBar();
    $(window).resize(centerSearchBar);

    // Append the addButton only if it is defined
    if (addButton) {
        $('.dataTables_wrapper .dataTables_filter').prepend(addButton);
    }
});
