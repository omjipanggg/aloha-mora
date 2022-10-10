<nav class="navbar navbar-dark bg-dark navbar-expand-md fixed-top" id="navbar">
  <div class="container">
    <a class="navbar-brand" href="./">
        <i class="fas fa-mug-saucer"></i>Nusantara
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end bg-dark" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h4 class="offcanvas-title" id="offcanvasNavbarLabel">Nusantara</h4>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1">
          <?php if (!empty($_SESSION['username'])) { ?>
          <li class="nav-item">
            <a href="?page=dashboard" class="nav-link">
              <i class="fas fa-cart-shopping"></i>
              <span class="total-count"></span>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?= '@' . $_SESSION['username']; ?>
            </a>
            <ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown">
              <li><a class="dropdown-item" href="?page=dashboard">Dashboard</a></li>
              <li><a class="dropdown-item" href="?page=profile">Profile</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="./config/destroy.php">Logout</a></li>
            </ul>
          </li>
          <?php } else { ?>
          <li class="nav-item desktop">
            <a class="nav-link" href="?page=auth"><i class="fas fa-user"></i></a>
          </li>
          <li class="nav-item mobile">
            <a class="nav-link" href="?page=auth">Login</a>
          </li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </div>
</nav>