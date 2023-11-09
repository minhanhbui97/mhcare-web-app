<?php require(VIEW_PATH . 'partials/head.php'); ?>

<?php require(VIEW_PATH . 'partials/nav.php'); ?>

<div class="container-fluid banner">
  <div class="row align-items-center justify-content-between">
    <div class="col-md image-container">
    </div>

    <div class="col-md">
      <h1 class="text-light banner-text">
        Welcome to MH-Care - Division of Mental Health and Psychiatry
      </h1>
      <h2 class="text-light banner-text">
        St. Joseph's Health Care, London, ON
      </h2>
    </div>
  </div>
</div>

<!-- Breadcrumb nav -->
<div id="breadcrumb">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Home</a></li>
      <li class="breadcrumb-item" aria-current="page">Employee Log In</a></li>
    </ol>
  </nav>
</div>


<div class="container">
  <form action="/login" method="POST" class="form">
    <div class="full-width text-center">
      <h3>
        Employee Login
      </h3>

    </div>

    <div class="required">
      <label class="form-label control-label full-width">Username</label>
      <input type="text" class="form-control" id="username" name="username" required>
    </div>

    <div class="required">
      <label class="form-label control-label full-width">Password</label>
      <input type="password" class="form-control" id="password" name="password" required>
    </div>

    <div style="color: red; font-size: 14px; text-align:center;" class="full-width">
      <?php
      if (isset($_SESSION['_flash'])) {
        echo $_SESSION['_flash']['error_msg'];
      }
      ?>
    </div>

    <div class="full-width" style="text-align:center;">
      <button type="submit" class="btn btn-primary" id="submit_btn">Log In</button>
    </div>
  </form>

</div>

<?php require(VIEW_PATH . 'partials/footer.php'); ?>