$(document).ready(function () {
  var addButton;
  var table;
  var table1;
  var table2;

  if (window.location.pathname.includes("acc_manage.php")) {
    addButton =
      '<div class="mb-1"><button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addAccount" ><i class="bx bx-plus"></i> Add Account</button></div>';
  } else if (window.location.pathname.includes("suppliers.php")) {
    addButton =
      '<div class="mb-1"><button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addSupplier"><i class="bx bx-plus"></i> Add Supplier</button></div>';
  } else if (window.location.pathname.includes("inventory.php")) {
    addButton =
      '<div class="mb-1"><button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addProduct"><i class="bx bx-plus"></i> Add Product</button></div>';
  } else if (window.location.pathname.includes("orders.php")) {
    addButton =
      '<div class="mb-1"><button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addOrder"><i class="bx bx-plus"></i> Create Order</button></div>';
  }

  function initializeDataTable() {
    var windowLocation = window.location.pathname; // Get the current window location
    var enableOrdering =
      windowLocation.includes("orders.php") ||
      windowLocation.includes("sales.php");

    var orderConfig = enableOrdering
      ? [
          [1, "desc"],
          [2, "desc"],
        ]
      : []; // Configure the order conditionally

      if ($.fn.DataTable.isDataTable("#table")) {
        table.destroy();
      }
      if ($.fn.DataTable.isDataTable("#table1")) {
        table1.destroy();
      }
      if ($.fn.DataTable.isDataTable("#table2")) {
        table2.destroy();
      }

    if (!window.location.pathname.includes("orders.php")) {
      table = $("#table").DataTable({
        stateSave: true,
        pagingType: 'full_numbers',
        buttons: [
          {
            extend: "copy",
            className: "btn btn-sm btn-dark export rounded m-1",
            text: '<i class="bx bx-copy"></i> Copy',
            exportOptions: {
              columns: ":not(:nth-child(2)):not(:last-child)", // Exclude the last column (Options)
            },
          },
          {
            extend: "print",
            className: "btn btn-sm btn-dark export rounded m-1",
            text: '<i class="bx bxs-printer"></i> Print',
            exportOptions: {
              columns: ":not(:nth-child(2)):not(:last-child)", // Exclude the last column (Options)
            },
          },
          {
            extend: "excel",
            className: "btn btn-sm btn-success export rounded m-1",
            text: '<i class="bx bxs-spreadsheet"></i> Excel',
            exportOptions: {
              columns: ":not(:nth-child(2)):not(:last-child)", // Exclude the last column (Options)
            },
          },
        ],
        columnDefs: [
          {
            targets: -1, // The last column
            searchable: false, // Make the last column not searchable
          },
        ],
        order: orderConfig, // Apply the conditional order configuration
        language: {
          searchPlaceholder: "Search",
          search: "",
          emptyTable: "No data available in the table. Please add some data.",
        },
      });
      // Append the addButton only if it is defined
      if (addButton) {
        $(".dataTables_wrapper .dataTables_filter").prepend(addButton);
      }
      table.buttons().container().appendTo("#table_wrapper .col-md-6:eq(0)");
      $(".page-link.active, .active > .page-link").css("z-index", "0");
    } else if (window.location.pathname.includes("orders.php")) {
      table1 = $("#table1").DataTable({
        stateSave: true,
        pagingType: 'full_numbers',
        buttons: [
          {
            extend: "copy",
            className: "btn btn-sm btn-dark export rounded m-1",
            text: '<i class="bx bx-copy"></i> Copy',
            exportOptions: {
              columns: ":not(:nth-child(2)):not(:last-child)", // Exclude the last column (Options)
            },
          },
          {
            extend: "print",
            className: "btn btn-sm btn-dark export rounded m-1",
            text: '<i class="bx bxs-printer"></i> Print',
            exportOptions: {
              columns: ":not(:nth-child(2)):not(:last-child)", // Exclude the last column (Options)
            },
          },
          {
            extend: "excel",
            className: "btn btn-sm btn-success export rounded m-1",
            text: '<i class="bx bxs-spreadsheet"></i> Excel',
            exportOptions: {
              columns: ":not(:nth-child(2)):not(:last-child)", // Exclude the last column (Options)
            },
          },
        ],
        columnDefs: [
          {
            targets: -1, // The last column
            searchable: false, // Make the last column not searchable
          },
        ],
        order: orderConfig, // Apply the conditional order configuration
        language: {
          searchPlaceholder: "Search",
          search: "",
          emptyTable: "No data available in the table. Please add some data.",
        },
      });
      // Append the addButton only if it is defined
      if (addButton) {
        $(".dataTables_wrapper .dataTables_filter").prepend(addButton);
      }

      table2 = $("#table2").DataTable({
        stateSave: true,
        pagingType: 'full_numbers',
        buttons: [
          {
            extend: "copy",
            className: "btn btn-sm btn-dark export rounded m-1",
            text: '<i class="bx bx-copy"></i> Copy',
            exportOptions: {
              columns: ":not(:nth-child(2)):not(:last-child)", // Exclude the last column (Options)
            },
          },
          {
            extend: "print",
            className: "btn btn-sm btn-dark export rounded m-1",
            text: '<i class="bx bxs-printer"></i> Print',
            exportOptions: {
              columns: ":not(:nth-child(2)):not(:last-child)", // Exclude the last column (Options)
            },
          },
          {
            extend: "excel",
            className: "btn btn-sm btn-success export rounded m-1",
            text: '<i class="bx bxs-spreadsheet"></i> Excel',
            exportOptions: {
              columns: ":not(:nth-child(2)):not(:last-child)", // Exclude the last column (Options)
            },
          },
        ],
        columnDefs: [
          {
            targets: -1, // The last column
            searchable: false, // Make the last column not searchable
          },
        ],
        order: orderConfig, // Apply the conditional order configuration
        language: {
          searchPlaceholder: "Search",
          search: "",
          emptyTable: "No data available in the table. Please add some data.",
        },
      });

      table1.buttons().container().appendTo("#table1_wrapper .col-md-6:eq(0)");
      table2.buttons().container().appendTo("#table2_wrapper .col-md-6:eq(0)");
      $(".page-link.active, .active > .page-link").css("z-index", "0");
    }
  }

  // Initialize DataTables on page load
  if (!window.location.pathname.includes("admin_dashboard.php")) {
    initializeDataTable();
  }

  // Destroy and reinitialize DataTables when switching pages
  $(document).on("click", "a.page-link", function (e) {
    e.preventDefault();
    if (!window.location.pathname.includes("admin_dashboard.php")) {
      if (!window.location.pathname.includes("orders.php")) {
        table.destroy();
      } else {
        table1.destroy();
        table2.destroy();
      }
      initializeDataTable();
    }

    return false;
  });
});

let hideTimer;

let calcScrollValue = () => {
  let scrollProgress = document.getElementById("progress");
  let progressValue = document.getElementById("progress-value");
  let pos = document.documentElement.scrollTop;
  let calcHeight =
    document.documentElement.scrollHeight -
    document.documentElement.clientHeight;
  let scrollValue = Math.round((pos * 100) / calcHeight);

  if (pos > 100) {
    scrollProgress.style.display = "grid";
  } else {
    scrollProgress.style.display = "none";
  }

  scrollProgress.addEventListener("click", () => {
    document.documentElement.scrollTop = 0;
  });

  scrollProgress.style.background = `conic-gradient(#306c76 ${scrollValue}%, #d7d7d7 ${scrollValue}%)`;

  clearTimeout(hideTimer);
  hideTimer = setTimeout(() => {
    scrollProgress.style.display = "none";
  }, 5000);
};

window.onscroll = calcScrollValue;
window.onload = calcScrollValue;
