<?php include "classes.php" ?>
<?php
if(SessionManager::getSecurityUserId() == 0){
    header("location: admin-login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<?php include "head.php" ?>

<body>

<!-- Navigation -->
<?php include "navbar.php" ?>

<!-- Page Content -->
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">Hello, <?php echo SessionManager::getUsername() ?></h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Administration</li>
    </ol>
    <div class="row">
        <div class="col-sm-4">
            <a href="create-event.php">
                <div class="tile">
                    <div class="tile-title">
                        <h3 class="text-white">Create Event</h3>
                        <p>Create an Event to display on the site.</p>
                    </div>
                    <div class="tile-footer">
                        <i class="icon-arrow-right-circle pull-right fa-2x text-white"></i>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-4">
            <a href="create-image.php">
                <div class="tile">
                    <div class="tile-title">
                        <h3 class="text-white">Create Image</h3>
                        <p>Create an Image to display on the site.</p>
                    </div>
                    <div class="tile-footer">
                        <i class="icon-arrow-right-circle pull-right fa-2x text-white"></i>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-4">
            <a href="create-user.php">
                <div class="tile">
                    <div class="tile-title">
                        <h3 class="text-white">Create User</h3>
                        <p>Create a user to edit the site content.</p>
                    </div>
                    <div class="tile-footer">
                        <i class="icon-arrow-right-circle pull-right fa-2x text-white"></i>
                    </div>
                </div>
            </a>
        </div>
    </div>

</div>
<!-- /.container -->

<!-- Footer -->
<?php include "footer.php" ?>

<!-- Bootstrap core JavaScript -->
<?php include "scripts.php" ?>

</body>

</html>
