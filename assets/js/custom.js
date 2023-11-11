$(document).ready(function () {
  var addButton;
  var table;

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
  } else if (window.location.pathname.includes("sales.php")) {
    addButton =
      '<div class="mb-1"><button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#salesImport"><i class="bx bx-plus"></i> Import Sales</button></div>';
  }
  if (!window.location.pathname.includes("admin_dashboard.php") && !window.location.pathname.includes("emp_dashboard.php")) {
    initializeDataTable();
  }
  function initializeDataTable() {
    var windowLocation = window.location.pathname; // Get the current window location
    var enableOrdering =
      windowLocation.includes("orders.php") ||
      windowLocation.includes("sales.php") ||
      windowLocation.includes("voided.php");

    var orderConfig = enableOrdering
      ? [
          [1, "desc"],
          [2, "desc"],
        ]
      : []; // Configure the order conditionally

    let table = $("#table").DataTable({
        lengthMenu: [
          [10, 25, 50, -1],
          [10, 25, 50, 'All']
        ],
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
  }
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

  scrollProgress.style.background = `conic-gradient(#32384D ${scrollValue}%, #d7d7d7 ${scrollValue}%)`;

  clearTimeout(hideTimer);
  hideTimer = setTimeout(() => {
    scrollProgress.style.display = "none";
  }, 5000);
};

window.onscroll = calcScrollValue;
window.onload = calcScrollValue;
