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
      <li class="breadcrumb-item" aria-current="page">Register New Patient</li>

    </ol>
  </nav>
</div>
<div class="container">
  <form action="/patient/add" method="POST" class="form">
    <div class="full-width text-center">
      <h3>
        Register New Patient
      </h3>

    </div>

    <div class="required">
      <label class="form-label control-label">First Name</label>
      <input type="text" class="form-control" name="first_name" required>
    </div>

    <div class="required">
      <label class="form-label control-label">Last Name</label>
      <input type="text" class="form-control" name="last_name" required>
    </div>

    <div class="required">
      <label class="form-label control-label">Gender</label>
      <input type="text" class="form-control" name="gender" required>
    </div>

    <div class="required">
      <label class="form-label control-label">Date of Birth</label>
      <input type="date" class="form-control" name="date_of_birth" required>
    </div>

    <div>
      <label class="form-label control-label">Address 1</label>
      <input type="text" class="form-control" name="address_1">
    </div>

    <div>
      <label class="form-label control-label">Address 2</label>
      <input type="text" class="form-control" name="address_2">
    </div>

    <div>
      <label class="form-label control-label">City</label>
      <input type="text" class="form-control" name="city">
    </div>

    <div>
      <label class="form-label control-label">Province</label>
      <input type="text" class="form-control" name="province">
    </div>

    <div>
      <label class="form-label control-label">Postal Code</label>
      <input type="text" class="form-control" name="postal_code">
    </div>

    <div>
      <label class="form-label control-label">Phone Number</label>
      <input type="tel" class="form-control" name="phone_number">
    </div>

    <div>
      <label class="form-label control-label">Email</label>
      <input type="email" class="form-control" name="email">
    </div>

    <div>
      <label class="form-label control-label">Doctor</label>
      <select class="form-select" name="doctor_id">
        <option selected>Select a doctor</option>
        <?php foreach ($doctors as $doctor) : ?>
          <option value="<?= $doctor['doctor_id'] ?>"><?= $doctor['doctor_name'] ?> </option>
        <?php endforeach; ?>
      </select>
    </div>

    <div>
      <label class="form-label control-label">Referring Doctor</label>
      <select class="form-select" name="referring_doctor_id">
        <option selected>Select a doctor</option>
        <?php foreach ($referring_doctors as $referring_doctor) : ?>
          <option value="<?= $referring_doctor['referring_doctor_id'] ?>"><?= $referring_doctor['referring_doctor_name'] ?> </option>
        <?php endforeach; ?>
      </select>
    </div>

    <br />
    <div>
      <label class="form-label control-label">List of Medications</label>
      <?php foreach ($medications as $medication) : ?>
        <div class="form-check mb-2">
          <input class="form-check-input" type="checkbox" id="<?= "gridCheck-m-" . $medication['medication_id'] ?>">
          <label class="form-check-label" for="<?= "gridCheck-m-" . $medication['medication_id'] ?>">
            <?= $medication['medication_name'] ?>
          </label>
        </div>
      <?php endforeach; ?>
    </div>

    <div>
      <label class="form-label control-label">List of Allergies</label>
      <?php foreach ($allergies as $allergy) : ?>
        <div class="form-check mb-2">
          <input class="form-check-input" type="checkbox" id="<?= "gridCheck-a-" . $allergy['allergy_id'] ?>">
          <label class="form-check-label" for="<?= "gridCheck-a-" . $allergy['allergy_id'] ?>">
            <?= $allergy['allergy_name'] ?>
          </label>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="full-width" style="text-align:center;">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>

  </form>

</div>

<?php require(VIEW_PATH . 'partials/footer.php'); ?>