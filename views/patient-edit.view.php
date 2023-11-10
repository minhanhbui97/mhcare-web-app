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
    <!-- TO DO: Style input to make it more visible that it is disabled, can't use attribute disabled -->

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
        <option value="Select a doctor" <?= !isset($existing_doctor) ? 'selected' : '' ?>>Select a doctor</option>
        <?php foreach ($doctors as $doctor) : ?>
          <option value="<?= $doctor['doctor_id'] ?>" <?=
                                                      isset($existing_doctor) && $existing_doctor['doctor_id'] === $doctor['doctor_id'] ? 'selected' : ''
                                                      ?>><?= $doctor['doctor_name'] ?> </option>

        <?php endforeach; ?>
      </select>
    </div>


    <div>
      <label class="form-label control-label">Referring Doctor</label>
      <select class="form-select" name="referring_doctor_id">
        <option value="Select a doctor" <?= !isset($existing_referring_doctor) ? 'selected' : '' ?>>Select a doctor</option>
        <?php foreach ($referring_doctors as $referring_doctor) : ?>
          <option value="<?= $referring_doctor['referring_doctor_id'] ?>" <?=
                                                      isset($existing_referring_doctor) && $existing_referring_doctor['referring_doctor_id'] === $referring_doctor['referring_doctor_id'] ? 'selected' : ''
                                                      ?>><?= $referring_doctor['referring_doctor_name'] ?> </option>
        <?php endforeach; ?>
      </select>
    </div>

    <div>
      <label class="form-label control-label">List of Medications</label>

      <?php
      $medication_ids = array_map(function ($item) {
        return $item['medication_id'];
      }, $existing_medications);
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
    <!-- $medication['medication_id'] -->
    <!-- <div>
      <label class="form-label control-label">List of Allergies</label>
      <?php foreach ($allergies as $allergy) : ?>
        <div class="form-check mb-2">
          <input class="form-check-input" type="checkbox" name="allergy_check_list[]" value="<?= $allergy['allergy_id'] ?>" id="<?= "gridCheck-a-" . $allergy['allergy_id'] ?>">
          <label class="form-check-label" for="<?= "gridCheck-a-" . $allergy['allergy_id'] ?>">
            <?= $allergy['allergy_name'] ?>
          </label>
        </div>
      <?php endforeach; ?>
    </div> -->

    <div class="full-width" style="text-align:center;">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>

  </form>

  <a href="patients"><button class="btn btn-link"> Back </button></a>


</div>


<?php require(VIEW_PATH . 'partials/footer.php'); ?>