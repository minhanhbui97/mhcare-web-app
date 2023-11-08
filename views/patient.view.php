<?php $name = "Mao Phoc"; ?>

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
        You are logged in as <?= $name ?>
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
      <li class="breadcrumb-item"><a href="http://localhost/patients">Patient List</a></li>
      <li class="breadcrumb-item" aria-current="page">Patient Information</li>

    </ol>
  </nav>
</div>
<div class="container">
  <form class="form">
    <div class="full-width text-center">
      <h3>
        Patient Information
      </h3>

    </div>


    <div>
      <label class="form-label control-label full-width">Patient ID</label>
      <input type="text" class="form-control" name="patient_id" value="<?= $patient['patient_id'] ?>" disabled readonly>
    </div>

    <br></br>

    <div>
      <label class="form-label control-label">First Name</label>
      <input type="text" class="form-control" name="first_name" value="<?= $patient['first_name'] ?>" disabled readonly>
    </div>

    <div>
      <label class="form-label control-label">Last Name</label>
      <input type="text" class="form-control" name="last_name" value="<?= $patient['last_name'] ?>" disabled readonly>
    </div>

    <div>
      <label class="form-label control-label">Gender</label>
      <input type="text" class="form-control" name="gender" value="<?= $patient['gender'] ?>" disabled readonly>
    </div>

    <div>
      <label class="form-label control-label">Date of Birth</label>
      <input type="text" class="form-control" name="date_of_birth" value="<?= $patient['date_of_birth'] ?>" disabled readonly>
    </div>

    <div>
      <label class="form-label control-label">Address 1</label>
      <input type="text" class="form-control" name="address_1" value="<?= $patient['address_1'] ?>" disabled readonly>
    </div>

    <div>
      <label class="form-label control-label">Address 2</label>
      <input type="text" class="form-control" name="address_1" value="<?= $patient['address_2'] ?>" disabled readonly>
    </div>

    <div>
      <label class="form-label control-label">City</label>
      <input type="text" class="form-control" name="city" value="<?= $patient['city'] ?>" disabled readonly>
    </div>

    <div>
      <label class="form-label control-label">Province</label>
      <input type="text" class="form-control" name="province" value="<?= $patient['province'] ?>" disabled readonly>
    </div>

    <div>
      <label class="form-label control-label">Postal Code</label>
      <input type="text" class="form-control" name="postal_code" value="<?= $patient['postal_code'] ?>" disabled readonly>
    </div>

    <div>
      <label class="form-label control-label">Phone Number</label>
      <input type="tel" class="form-control" name="phone_number" value="<?= $patient['phone_number'] ?>" disabled readonly>
    </div>

    <div>
      <label class="form-label control-label">Email</label>
      <input type="email" class="form-control" name="email" value="<?= $patient['email'] ?>" disabled readonly>
    </div>

    <div>
      <label class="form-label control-label">Doctor</label>
      <input type="email" class="form-control" name="doctor" value="<?= $doctor_name['doctor_name']?>" disabled readonly>
    </div>

    <div>
      <label class="form-label control-label">Referring Doctor</label>
      <input type="email" class="form-control" name="referring_doctor" value="<?= $referring_doctor_name['referring_doctor_name']?>" disabled readonly>
    </div>
    

    <br>
    <div>
      <label><input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">I have a bike</label>
    </div>

  </form>

  <a href="patients"><button class="btn btn-link"> Back </button></a>

</div>

<!-- <div class="index-text container-border">
    <h1 class="text-center"> Register New Patient </h1>
    <div class="required">
        <label for="first_name" class="form-label control-label">First Name</label>
        <input type="text" class="form-control" id="first_name" required>
      </div>

      <div class="required">
        <label for="last_name" class="form-label control-label">Last Name</label>
        <input type="text" class="form-control" id="last_name" required>
      </div>

      <div class="required">
        <label for="phone_number" class="form-label control-label">Phone Number</label>
        <input type="tel" class="form-control" id="phone_number" required>
      </div>

      <div>
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email">
      </div>



</div> -->

<?php require('views/partials/footer.php'); ?>