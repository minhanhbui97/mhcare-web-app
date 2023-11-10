<?php require('views/partials/head.php'); ?>

<?php require('views/partials/nav.php'); ?>


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
      <li class="breadcrumb-item"><a href="employee-workspace">Employee Workspace</a></li>
      <li class="breadcrumb-item"><a href="patients">Patient List</a></li>
      <li class="breadcrumb-item" aria-current="page">Patient Information</li>

    </ol>
  </nav>
</div>
<div class="container mb-4">
  <form class="form">
    <div class="full-width text-center h2">
        Patient Information
    </div>


    <div>
      <label class="form-label control-label">Patient ID</label>
      <input type="text" class="form-control fw-bold" name="patient_id" value="<?= $patient['patient_id'] ?>" disabled readonly>
    </div>

    <div class="required">
      <label class="form-label control-label h6">First Name</label>
      <input type="text" class="form-control" name="first_name" value="<?= $patient['first_name'] ?>" disabled readonly>
    </div>

    <div class="required">
      <label class="form-label control-label h6">Last Name</label>
      <input type="text" class="form-control" name="last_name" value="<?= $patient['last_name'] ?>" disabled readonly>
    </div>

    <div class="required">
      <label class="form-label control-label h6">Gender</label>
      <input type="text" class="form-control" name="gender" value="<?= $patient['gender'] ?>" disabled readonly>
    </div>

    <div class="required">
      <label class="form-label control-label h6">Date of Birth</label>
      <input type="text" class="form-control" name="date_of_birth" value="<?= $patient['date_of_birth'] ?>" disabled readonly>
    </div>

    <div>
      <label class="form-label control-label h6">Address 1</label>
      <input type="text" class="form-control" name="address_1" value="<?= $patient['address_1'] ?>" disabled readonly>
    </div>

    <div>
      <label class="form-label control-label h6">Address 2</label>
      <input type="text" class="form-control" name="address_1" value="<?= $patient['address_2'] ?>" disabled readonly>
    </div>

    <div>
      <label class="form-label control-label h6">City</label>
      <input type="text" class="form-control" name="city" value="<?= $patient['city'] ?>" disabled readonly>
    </div>

    <div>
      <label class="form-label control-label h6">Province</label>
      <input type="text" class="form-control" name="province" value="<?= $patient['province'] ?>" disabled readonly>
    </div>

    <div>
      <label class="form-label control-label h6">Postal Code</label>
      <input type="text" class="form-control" name="postal_code" value="<?= $patient['postal_code'] ?>" disabled readonly>
    </div>

    <div>
      <label class="form-label control-labe h6">Phone Number</label>
      <input type="tel" class="form-control" name="phone_number" value="<?= $patient['phone_number'] ?>" disabled readonly>
    </div>

    <div>
      <label class="form-label control-label h6">Email</label>
      <input type="email" class="form-control" name="email" value="<?= $patient['email'] ?>" disabled readonly>
    </div>

    <div>
      <label class="form-label control-label h6">Doctor</label>
      <input type="text" class="form-control" name="doctor" value="<?= $doctor_name['doctor_name'] ?>" disabled readonly>
    </div>

    <div>
      <label class="form-label control-label h6">Referring Doctor</label>
      <input type="text" class="form-control" name="referring_doctor" value="<?= $referring_doctor_name['referring_doctor_name']  ?>" disabled readonly>
    </div>

    <div>
      <label class="form-label control-label h6">List of Medications</label>

      <?php
      $medication_ids = array_map(function ($item) {
        return $item['medication_id'];
      }, $existing_medication_ids);
      ?>

      <?php foreach ($medications as $medication) : ?>
        <div class="form-check mb-2">
          <input class="form-check-input" type="checkbox" name="medication_check_list[]" value="<?= $medication['medication_id'] ?>" id="<?= "gridCheck-m-" . $medication['medication_id'] ?>" <?= !in_array($medication['medication_id'], $medication_ids) ? 'hidden' : 'style = "opacity:0;"' ?> />

          <label class="form-check-label" for="<?= "gridCheck-m-" . $medication['medication_id'] ?>" <?= !in_array($medication['medication_id'], $medication_ids) ? 'hidden' : '' ?>>
            <?= $medication['medication_name'] ?>
          </label>
        </div>
      <?php endforeach; ?>
    </div>

    <div>
      <label class="form-label control-label h6">List of Allergies</label>

      <?php
      $allergy_ids = array_map(function ($item) {
        return $item['allergy_id'];
      }, $existing_allergie_ids);
      ?>

    <?php foreach ($allergies as $allergy) : ?>
        <div class="form-check mb-2">
          <input class="form-check-input" type="checkbox" name="allergy_check_list[]" value="<?= $allergy['allergy_id'] ?>" id="<?= "gridCheck-a-" . $allergy['allergy_id'] ?>" <?= !in_array($allergy['allergy_id'], $allergy_ids) ? 'hidden' : 'style = "opacity:0;"' ?> />

          <label class="form-check-label" for="<?= "gridCheck-a-" . $allergy['allergy_id'] ?>" <?= !in_array($allergy['allergy_id'], $allergy_ids) ? 'hidden' : '' ?>>
            <?= $allergy['allergy_name'] ?>
          </label>
        </div>
      <?php endforeach; ?>
    </div>

  </form>

  <a href="patients"><button class="btn btn-link"> Back </button></a>

</div>

<?php require('views/partials/footer.php'); ?>