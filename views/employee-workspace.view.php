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
            <li class="breadcrumb-item" aria-current="page">Employee Workspace</li>
        </ol>
    </nav>
</div>

<div class="index-text container-border">
    <h1 class="text-center"> Employee Workspace Menu </h1>

    <div style="text-align:center;">
        <a href="patients"><button class="btn btn-primary">
                View Patient List
            </button></a>
    </div>

    <div style="text-align:center;">
        <a href="patient/add"><button class="btn btn-primary">
                Register New Patient
            </button></a>
    </div>

</div>

<?php require('views/partials/footer.php'); ?>