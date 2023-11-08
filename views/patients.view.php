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
            <li class="breadcrumb-item"><a href="employee-workspace">Employee Workspace</a></li>
            <li class="breadcrumb-item" aria-current="page">Patient List</a></li>

        </ol>
    </nav>
</div>

<div class="index-text container-border">
    <h1 class="text-center">
        MH-Care Patient List
    </h1>

    <table class="table table-hover" style="margin-top: 2rem">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <!-- <th scope="col">Gender</th> -->
                <!-- <th scope="col">DOB</th> -->
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>

        <?php foreach ($patients as $patient) : ?>
            <tr>
                <th scope="row"><?= $patient['id'] ?></th>
                <td><?= $patient['first_name'] ?></td>
                <td><?= $patient['last_name'] ?></td>
                <td>
                    <a href="/patient?id=<?= $patient['id'] ?>" class="link-primary">View Details</a>
                      |  
                    <a href="/patient/edit?id=<?= $patient['id'] ?>" class="link-secondary">Edit</a>
                      |  
                    <form action="/patient/delete" method="POST">
                        <input type="hidden" value="<?= $patient['id'] ?>" name="patient_id"></input>
                        <button type="submit" class="btn btn-link">Remove</button>
                    </form>


                    <div class="full-width" style="text-align:center;">
        
      </div>
                </td>
            </tr>

        <?php endforeach; ?> 
            <!-- <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>Male</td>
                <td>May 23rd, 1989</td>
                <td>
                    <a href="#" class="link-primary">View Details</a>
                      |  
                    <a href="#" class="link-secondary">Edit</a>
                      |  
                    <a href="#" class="link-secondary">Remove</a>
                </td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>Female</td>
                <td>April 1st, 1994</td>
            </tr>
            <tr>
            <th scope="row">3</th>
                <td>Brenda</td>
                <td>Watson</td>
                <td>Female</td>
                <td>January 10th, 1996</td>
            </tr> -->
        </tbody>
    </table>


</div>

<?php require('views/partials/footer.php'); ?>