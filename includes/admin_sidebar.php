<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="/langgamtrading/includes/sidebar.css">
</head>
<body>
  <div class="sidebar rounded-5 shadow-lg" id="side_nav">
    <div class="header-box px-2 pt-3 pb-3 d-flex justify-content-between text-center">
      <h1 class="fs-4 text-white px-2">LANGGAM TRADING</h1>
      <button class=" btn d-md-none d-block close-btn px-1 py-0 text-white">
        <i class='bx bxs-chevrons-left' ></i>
      </button>
    </div>

    <ul class="list-unstyled px-2">
      <li class="">
        <a href="/langgamtrading/pages/admin/admin_dashboard.php" class="text-decoration-none px-3 py-2 d-block">
          <i class='bx bxs-dashboard p-2'></i>Dashboard</a>
      </li>
      <li class="">
        <a href="/langgamtrading/pages/admin/acc_manage.php"class="text-decoration-none px-3 py-2 d-block">
          <i class='bx bxs-user-account p-2'></i>Accounts</a>
      </li>
      <li class="">
        <a href="/langgamtrading/pages/inventory.php" class="text-decoration-none px-3 py-2 d-block">
          <i class='bx bx-clipboard p-2'></i>Inventory</a>
      </li>
      <li class="">
        <a href="/langgamtrading/pages/orders.php" class="text-decoration-none px-3 py-2 d-block">
          <i class='bx bx-list-ul p-2'></i>Orders</a>
      </li>
      <li class="">
        <a href="/langgamtrading/pages/suppliers.php" class="text-decoration-none px-3 py-2 d-block">
          <i class='bx bx-package p-2'></i>Suppliers</a>
      </li>
      <li class="">
        <a href="/langgamtrading/pages/admin/sales.php" class="text-decoration-none px-3 py-2 d-block">
          <i class='bx bx-line-chart p-2'></i>Sales</a>
      </li>
    </ul>
  </div>

  <script>
    $(document).ready(function () {
      var url = window.location.pathname; // get the current URL path
      $('a[href="' + url + '"]').closest('li').addClass('active'); // find the corresponding link and add "active" class to its parent li

      $('a[href]').each(function () { // loop through all links
        if (url.startsWith($(this).attr('href'))) { // check if the link matches the current URL path
          $(this).closest('li').addClass('active'); // add "active" class to its parent li
        }
      });
    });

  </script>
</body>

</html>