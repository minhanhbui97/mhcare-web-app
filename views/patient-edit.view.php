<?php require(VIEW_PATH . 'partials/head.php'); ?>

<?php require(VIEW_PATH . 'partials/nav.php'); ?>


<div class="container-fluid banner">
  <div class="row align-items-center justify-content-between">
    <div class="col-md image-container">
    </div>

    <div class="col-md">
      <h1 class="text-light banner-text">
        Welcome to MH-Care Employee Workspace
      </h1>
      <h2 class="text-light banner-text">
        You are logged in as <?= $_SESSION['user']['username'] ?>
      </h2>
    </div>
  </div>
</div>

<!-- Breadcrumb nav -->
<div id="breadcrumb">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Home</li>
      <li class="breadcrumb-item"><a href="http://localhost/employee-workspace">Employee Workspace</a></li>
      <li class="breadcrumb-item" aria-current="page">Update Patient Information</li>

    </ol>
  </nav>
</div>
<div class="container mb-4">
  <form action="/patient/edit" method="POST" class="form">
    <div class="full-width text-center">
      <h3>
        Update Patient Information
      </h3>

    </div>

    <div>
      <label class="form-label control-label">Patient ID</label>
      <input type="text" class="form-control" name="patient_id" value="<?= $patient['patient_id'] ?>" readonly>
    </div>

    <div>
      <label class="form-label control-label">First Name</label>
      <input type="text" class="form-control" name="first_name" value="<?= $patient['first_name'] ?>">
    </div>

    <div>
      <label class="form-label control-label">Last Name</label>
      <input type="text" class="form-control" name="last_name" value="<?= $patient['last_name'] ?>">
    </div>

    <div>
      <label class="form-label control-label">Gender</label>
      <input type="text" class="form-control" name="gender" value="<?= $patient['gender'] ?>">
    </div>

    <div>
      <label class="form-label control-label">Date of Birth</label>
      <input type="date" class="form-control" name="date_of_birth" value="<?= $patient['date_of_birth'] ?>">
    </div>

    <div>
      <label class="form-label control-label">Address 1</label>
      <input type="text" class="form-control" name="address_1" value="<?= $patient['address_1'] ?>">
    </div>

    <div>
      <label class="form-label control-label">Address 2</label>
      <input type="text" class="form-control" name="address_2" value="<?= $patient['address_2'] ?>">
    </div>

    <div>
      <label class="form-label control-label">City</label>
      <input type="text" class="form-control" name="city" value="<?= $patient['city'] ?>">
    </div>

    <div>
      <label class="form-label control-label">Province</label>
      <input type="text" class="form-control" name="province" value="<?= $patient['province'] ?>">
    </div>

    <div>
      <label class="form-label control-label">Postal Code</label>
      <input type="text" class="form-control" name="postal_code" value="<?= $patient['postal_code'] ?>">
    </div>

    <div>
      <label class="form-label control-label">Phone Number</label>
      <input type="text" class="form-control" name="phone_number" value="<?= $patient['phone_number'] ?>">
    </div>

    <div>
      <label class="form-label control-label">Email</label>
      <input type="email" class="form-control" name="email" value="<?= $patient['email'] ?>">
    </div>

    <div>
      <label class="form-label control-label">Doctor</label>
      <select class="form-select" name="doctor_id">
        <option selected><?= $patient_doctor_name['doctor_name'] ?? "Select a doctor"?></option>
        <?php foreach ($doctors as $doctor) : ?>
          <option value="<?= $doctor['doctor_id'] ?>"><?= $doctor['doctor_name'] ?> </option>
        <?php endforeach; ?>
      </select>
    </div>

    <div>
      <h4>List title</h4>
      <?php for ($i = 0; $i < 10; $i++) : ?>
        <div class="form-check mb-2">
          <input class="form-check-input" type="checkbox" id="gridCheck" disabled checked>
          <label class="form-check-label" for="gridCheck">
            Check me out
          </label>
        </div>
      <?php endfor; ?>
    </div>

    <div>
      <h4>List title</h4>
      <?php for ($i = 0; $i < 10; $i++) : ?>
        <div class="form-check mb-2">
          <input class="form-check-input" type="checkbox" id="gridCheck">
          <label class="form-check-label" for="gridCheck">
            Check me out
          </label>
        </div>
      <?php endfor; ?>
    </div>

    <div class="full-width" style="text-align:center;">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>

  </form>

  <a href="patients"><button class="btn btn-link"> Back </button></a>


</div>


<?php require(VIEW_PATH . 'partials/footer.php'); ?>