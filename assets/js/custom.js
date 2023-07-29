$(document).ready(function() {
  var addButton;

  if (window.location.pathname.includes('acc_manage.php')) {
    addButton = '<div class="mb-1"><button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addAccount" id="add_btn"><i class="bx bx-plus"></i> Add Account</button></div>';
  } else if (window.location.pathname.includes('suppliers.php')) {
    addButton = '<div class="mb-1"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSupplier"><i class="bx bx-plus"></i> Add Supplier</button></div>';
  } else if (window.location.pathname.includes('inventory.php')) {
    addButton = '<div class="mb-1"><button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addProduct"><i class="bx bx-plus"></i> Add Product</button></div>';
  }

  var table;

  function initializeDataTable() {
    table = $('#table').DataTable({
      buttons: [
        {
          extend: 'copy',
          className: 'btn btn-sm btn-dark export rounded m-1',
          text: '<i class="bx bx-copy"></i> Copy',
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
        },
        {
          extend: 'excel',
          className: 'btn btn-sm btn-success export rounded m-1',
          text: '<i class="bx bxs-spreadsheet"></i> Excel',
          exportOptions: {
            columns: ':not(:last-child)' // Exclude the last column (Options)
          }
        },
        {
          extend: 'pdf',
          className: 'btn btn-sm btn-danger export rounded m-1',
          text: '<i class="bx bxs-file-pdf"></i> PDF',
          exportOptions: {
            columns: ':not(:last-child)' // Exclude the last column (Options)
          }
        }
      ],
      language: {
        searchPlaceholder: "Search",
        search: "",
        emptyTable: "No data available in the table. Please add some data."
      }
    });

    table.buttons().container().appendTo('#table_wrapper .col-md-6:eq(0)');
    // Adjust the z-index of .page-link.active and .active > .page-link
    $('.page-link.active, .active > .page-link').css('z-index', '0');
  }

  // Initialize DataTables on page load
  initializeDataTable();

  // Append the addButton only if it is defined
  if (addButton) {
    $('.dataTables_wrapper .dataTables_filter').prepend(addButton);
  }

  // Destroy and reinitialize DataTables when switching pages
  $(document).on('click', 'a.page-link', function(e) {
    e.preventDefault();
    table.destroy();
    initializeDataTable();
    // Append the addButton again after reinitializing DataTable
    table.buttons().container().appendTo('#table_wrapper .col-md-6:eq(0)');
    
    if (addButton) {
      $('.dataTables_wrapper .dataTables_filter').prepend(addButton);
    }
    
    return false;
  });
});
