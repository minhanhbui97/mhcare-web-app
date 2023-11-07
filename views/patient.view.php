<?php $name = "Mao Phoc" ; ?>

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
            <li class="breadcrumb-item" aria-current="page">Register New Patient</li>

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
        <input type="text" class="form-control" name="patient_id" value="<?= $patient['id'] ?>" disabled readonly>
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

      <!-- <div class="required">
        <label class="form-label control-label">Gender</label>
        <input type="text" class="form-control" name="gender" required>
      </div>

      <div class="required">
        <label class="form-label control-label">Date of Birth</label>
        <input type="text" class="form-control" name="dateOfBirth" required>
      </div>

      <div>
        <label class="form-label control-label">Address</label>
        <input type="text" class="form-control" name="address" >
      </div>

      <div>
        <label class="form-label control-label">City</label>
        <input type="text" class="form-control" name="city" >
      </div>

      <div>
        <label class="form-label control-label">Province</label>
        <input type="text" class="form-control" name="province" >
      </div>

      <div>
        <label class="form-label control-label">Postal Code</label>
        <input type="text" class="form-control" name="postalCode" >
      </div>

      <div>
        <label class="form-label control-label">Phone</label>
        <input type="text" class="form-control" name="phone" >
      </div>

      <div class="required">
        <label class="form-label control-label">Email</label>
        <input type="email" class="form-control" name="email" required>
      </div>

      <div>
        <label class="form-label control-label">List of Current Medications</label>
        <input type="text" class="form-control" name="listMedications">
      </div>

      <div>
        <label class="form-label control-label">List of Allergies</label>
        <input type="text" class="form-control" name="listAllergies">
      </div>

      <div>
        <label class="form-label control-label">Referring Doctor</label>
        <input type="text" class="form-control" name="referringDoctor">
      </div> -->

      <!-- <div class="full-width" style="text-align:center;">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div> -->

      <!-- <div class="full-width" style="text-align:center;">
        <a href="http://localhost/employee-workspace"><button class="btn btn-secondary">Cancel</button></a>
      </div> -->

    </form>

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

