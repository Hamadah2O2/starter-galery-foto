<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container d-flex justify-content-between">
    <ul class="navbar-nav mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
    </ul>
    <form class="d-flex" role="search">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
    <ul class="navbar-nav">
      <li class="nav-item dropdown border-start">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <?= (session()->get('username')) ? session()->get('username') : 'Account' ?>
        </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item d-flex align-items-center" href="<?= base_url('auth/login') ?>"><span class="iconoir-log-in"></span> Login</a></li>
          <li><a class="dropdown-item d-flex align-items-center" href="<?= base_url('auth/register') ?>"><span class="iconoir-user-plus"></span> Register</a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item" href="#">Apps by ozn</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>