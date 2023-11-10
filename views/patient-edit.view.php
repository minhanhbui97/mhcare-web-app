<?php

use function PHPSTORM_META\map;

require(VIEW_PATH . 'partials/head.php'); ?>

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
      <li class="breadcrumb-item"><a href="/employee-workspace">Employee Workspace</a></li>
      <li class="breadcrumb-item"><a href="../patients">Patient List</a></li>
      <li class="breadcrumb-item" aria-current="page">Update Patient Information</li>
    </ol>
  </nav>
</div>

<div class="container mb-4">
  <form action="/patient/edit" method="POST" class="form">
    <div class="full-width text-center h2">
      Update Patient Information
    </div>

    <div>
      <label class="form-label control-label h6 ">Patient ID</label>
      <input type="text" class="form-control-plaintext fw-bold" name="patient_id" value="<?= $patient['patient_id'] ?>" readonly>
    </div>

    <div class="required">
      <label class="form-label control-label h6">First Name</label>
      <input type="text" class="form-control" name="first_name" value="<?= $patient['first_name'] ?>">
    </div>

    <div class="required">
      <label class="form-label control-label h6">Last Name</label>
      <input type="text" class="form-control" name="last_name" value="<?= $patient['last_name'] ?>">
    </div>

    <div class="required">
      <label class="form-label control-label h6">Gender</label>
      <input type="text" class="form-control" name="gender" value="<?= $patient['gender'] ?>">
    </div>

    <div class="required">
      <label class="form-label control-label h6">Date of Birth</label>
      <input type="date" class="form-control" name="date_of_birth" value="<?= $patient['date_of_birth'] ?>">
    </div>

    <div>
      <label class="form-label control-label h6">Address 1</label>
      <input type="text" class="form-control" name="address_1" value="<?= $patient['address_1'] ?>">
    </div>

    <div>
      <label class="form-label control-label h6">Address 2</label>
      <input type="text" class="form-control" name="address_2" value="<?= $patient['address_2'] ?>">
    </div>

    <div>
      <label class="form-label control-label h6">City</label>
      <input type="text" class="form-control" name="city" value="<?= $patient['city'] ?>">
    </div>

    <div>
      <label for="province_select" class="form-label control-label h6">Province</label>
      <select class="form-select" name="province">
        <option value="Select a province" <?= !isset($existing_province) ? 'selected' : '' ?>>Select a province</option>

        <?php
        $list_province = array(
          array("value" => "AB", "name" => "Alberta"),
          array("value" => "BC", "name" => "British Columbia"),
          array("value" => "MB", "name" => "Manitoba"),
          array("value" => "NB", "name" => "New Brunswick"),
          array("value" => "NL", "name" => "Newfoundland and Labrador"),
          array("value" => "NS", "name" => "Nova Scotia"),
          array("value" => "NT", "name" => "Northwest Territories"),
          array("value" => "NU", "name" => "Nunavut"),
          array("value" => "ON", "name" => "Ontario"),
          array("value" => "PE", "name" => "Prince Edward Island"),
          array("value" => "QC", "name" => "Quebec"),
          array("value" => "SK", "name" => "Saskatchewan"),
          array("value" => "YT", "name" => "Yukon"),
        );
        ?>

        <?php foreach ($list_province as $province) : ?>
          <option value="<?= $province['value'] ?>" <?=
                                                    isset($existing_province['province']) && $existing_province['province'] === $province['value'] ? 'selected' : ''
                                                    ?>> <?= $province['name'] ?> </option>
        <?php endforeach; ?>
      </select>
    </div>

    <div>
      <label class="form-label control-label h6">Doctor</label>
      <select class="form-select" name="doctor_id">
        <option value="Select a doctor" <?= !isset($existing_province) ? 'selected' : '' ?>>Select a province</option>
        <?php foreach ($doctors as $doctor) : ?>
          <option value="<?= $doctor['doctor_id'] ?>" <?=
                                                      isset($existing_doctor) && $existing_doctor['doctor_id'] === $doctor['doctor_id'] ? 'selected' : ''
                                                      ?>><?= $doctor['doctor_name'] ?> </option>

        <?php endforeach; ?>
      </select>
    </div>

    <div>
      <label class="form-label control-label h6">Postal Code</label>
      <input type="text" class="form-control" name="postal_code" value="<?= $patient['postal_code'] ?>">
    </div>

    <div>
      <label class="form-label control-label h6">Phone Number</label>
      <input type="text" class="form-control" name="phone_number" value="<?= $patient['phone_number'] ?>">
    </div>

    <div>
      <label class="form-label control-label h6">Email</label>
      <input type="email" class="form-control" name="email" value="<?= $patient['email'] ?>">
    </div>

    <div>
      <label class="form-label control-label h6">Doctor</label>
      <select class="form-select" name="doctor_id">
        <option value="Select a doctor" <?= !isset($existing_doctor) ? 'selected' : '' ?>>Select a doctor</option>
        <?php foreach ($doctors as $doctor) : ?>
          <option value="<?= $doctor['doctor_id'] ?>" <?=
                                                      isset($existing_doctor) && $existing_doctor['doctor_id'] === $doctor['doctor_id'] ? 'selected' : ''
                                                      ?>><?= $doctor['doctor_name'] ?> </option>

        <?php endforeach; ?>
      </select>
    </div>

    <div>
      <label class="form-label control-label h6">Referring Doctor</label>
      <select class="form-select" name="referring_doctor_id">
        <option value="Select a doctor" <?= !isset($existing_referring_doctor) ? 'selected' : '' ?>>Select a doctor</option>
        <?php foreach ($referring_doctors as $referring_doctor) : ?>
          <option value="<?= $referring_doctor['referring_doctor_id'] ?>" <?=
                                                                          isset($existing_referring_doctor) && $existing_referring_doctor['referring_doctor_id'] === $referring_doctor['referring_doctor_id'] ? 'selected' : ''
                                                                          ?>><?= $referring_doctor['referring_doctor_name'] ?> </option>
        <?php endforeach; ?>
      </select>
    </div>

    <br />

    <div>
      <label class="form-label control-label h6">List of Medications</label>

      <?php
      $medication_ids = array_map(function ($item) {
        return $item['medication_id'];
      }, $existing_medication_ids);
      ?>

      <?php foreach ($medications as $medication) : ?>
        <div class="form-check mb-2">
          <input class="form-check-input" type="checkbox" name="medication_check_list[]" value="<?= $medication['medication_id'] ?>" id="<?= "gridCheck-m-" . $medication['medication_id'] ?>" <?= in_array($medication['medication_id'], $medication_ids) ? 'checked' : '' ?> />

          <label class="form-check-label" for="<?= "gridCheck-m-" . $medication['medication_id'] ?>">
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
          <input class="form-check-input" type="checkbox" name="allergy_check_list[]" value="<?= $allergy['allergy_id'] ?>" id="<?= "gridCheck-a-" . $allergy['allergy_id'] ?>" <?= in_array($allergy['allergy_id'], $allergy_ids) ? 'checked' : '' ?> />

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

  <a href="../patients"><button class="btn btn-link"> Back </button></a>


</div>


<?php require(VIEW_PATH . 'partials/footer.php'); ?>