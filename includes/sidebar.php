<!-- Sidebar -->
<div class="sidebar">
  <ul class="nav flex-column">
    <li class="nav-item">
      <a class="nav-link" href="#">
        <i class="fa fa-home"></i> Home
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">
        <i class="fa fa-user"></i> Profile
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">
        <i class="fa fa-cog"></i> Settings
      </a>
    </li>
  </ul>
</div>

<!-- Page content -->
<div class="page-content">
  <button class="btn btn-primary" id="sidebar-toggle"><i class="fa fa-bars"></i></button>
  <h1>Hello, World!</h1>
</div>

<script>
  // Get the sidebar element
  const sidebar = document.querySelector('.sidebar');
  // Get the toggle button element
  const toggleButton = document.querySelector('#sidebar-toggle');

  // Add click event listener to toggle button
  toggleButton.addEventListener('click', () => {
    // Toggle the 'active' class on the sidebar
    sidebar.classList.toggle('active');
  });
</script>
