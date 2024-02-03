<?php require('views/partials/head.php'); ?>

<?php require('views/partials/nav.php'); ?>

<div class="flex-grow-1">
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
                    <th scope="col">Last Name</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">DOB</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($patients as $patient) : ?>
                    <tr>
                        <th scope="row"><?= $patient['patient_id'] ?></th>
                        <td><?= $patient['last_name'] ?></td>
                        <td><?= $patient['first_name'] ?></td>
                        <td><?= $patient['gender'] ?></td>
                        <td><?= $patient['date_of_birth'] ?></td>
                        <td>
                            <div class="d-flex align-items-center" style="margin-left: -10px;">
                                <a href="/patient?id=<?= $patient['patient_id'] ?>" class="btn btn-link">View Details</a>

                                <a href="/patient/edit?id=<?= $patient['patient_id'] ?>" class="btn btn-link link-secondary">Edit</a>

                                <form action="/patient/delete" method="POST">
                                    <input type="hidden" value="<?= $patient['patient_id'] ?>" name="patient_id"></input>
                                    <button type="submit" class="btn btn-link link-danger">Remove</button>
                                </form>
                            </div>

                        </td>
                    </tr>

                <?php endforeach; ?>
            </tbody>
        </table>

        <p class="fw-light">* The Patient list is ordered by Last Name and First Name</p>



    </div>
</div>

<?php require('views/partials/footer.php'); ?>