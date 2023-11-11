<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="/langgamtrading/css/custom.css">
</head>
<body>
  <div class="sidebar rounded-5 shadow-lg" id="side_nav">
    <div class="header-box px-3 pt-3 pb-3 d-flex justify-content-between text-center">
      <button class="fs-4 btn d-md-none d-block close-btn p-0 text-white">
        <i class='bx bx-x'></i>
      </button>
      <h1 class="fs-4 text-white px-2 side-brand">LANGGAM TRADING 3RD BRANCH</h1>
    </div>

    <ul class="list-unstyled px-2">
      <div class="time-date-day px-3 text-center">
        <?php date_default_timezone_set('Asia/Manila'); ?>
        <p class="small text-white mb-1"><i class='bx bx-time'></i> <?php echo date('h:i A'); ?></p>
        <p class="small text-white mb-0"><i class='bx bxs-calendar' ></i> <?php echo date('l'); ?> | <?php echo date('m/d/Y'); ?></p>
      </div>
      <hr class="text-white">
      <li class="">
        <a href="/langgamtrading/branch3/pages/employee/emp_dashboard.php" class="text-decoration-none px-3 py-2 d-block">
          <i class='bx bxs-dashboard p-2'></i>Home</a>
      </li>
      <li class="">
        <a href="/langgamtrading/branch3/pages/inventory.php" class="text-decoration-none px-3 py-2 d-block">
          <i class='bx bx-clipboard p-2'></i>Inventory</a>
      </li>
      <li class="">
        <a href="/langgamtrading/branch3/pages/orders.php" class="text-decoration-none px-3 py-2 d-block">
          <i class='bx bx-list-ul p-2'></i>Orders</a>
      </li>
      <li class="">
        <a href="/langgamtrading/branch3/pages/voided.php" class="text-decoration-none px-3 py-2 d-block">
        <i class='bx bx-folder-minus p-2'></i>Voided</a>
      </li>
      <li class="">
        <a href="/langgamtrading/branch3/pages/suppliers.php" class="text-decoration-none px-3 py-2 d-block">
          <i class='bx bx-package p-2'></i>Suppliers</a>
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