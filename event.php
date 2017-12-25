<?php include "classes.php" ?>
<?php
$customerId = SessionManager::getCustomerId() == 0 ? null : SessionManager::getCustomerId();
$securityuserid = SessionManager::getSecurityUserId() == 0 ? null : SessionManager::getSecurityUserId();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $returnVal = true;
    if(isset($_POST["btnPostComment"])){
        isset($_POST["comment"]) && $_POST["comment"] != "" ? $comment = $_POST["comment"] : $returnVal = false;
        isset($_POST["hfEventId"]) && $_POST["hfEventId"] != "" ? $eventid = $_POST["hfEventId"] : $returnVal = false;
        $currentDate = date('Y-m-d H:i:s');
        if($returnVal){
            $eventcomment = new Eventcomment(0,$comment,$customerId,1,$eventid,$currentDate, null);
            $eventcomment->save();
            header("location: event.php?id=$eventid");
        }
    }
    if(isset($_POST["btnDeleteComment"])){
        if(is_numeric($_POST["btnDeleteComment"])){
            Eventcomment::remove($_POST["btnDeleteComment"]);
            header("location: event.php?id=".$_POST["hfEventId"]);
        }
    }
}
if($_SERVER["REQUEST_METHOD"] == "GET"){
    if(isset($_GET["id"]) && is_numeric($_GET["id"]) && $_GET["id"] > 0){
        $event = new Event($_GET["id"]);
        if($event != null){

        }
        else{
            header("location: index.php");
        }
    }
    else{
        header("location: index.php");
    }
}


$eventCommentList = Eventcomment::loadbyeventid($event->getId());
?>
<!DOCTYPE html>
<html lang="en">

<?php include "head.php" ?>

<body>

<!-- Navigation -->
<?php include "navbar.php" ?>

<!-- Page Content -->
<div class="container">



    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item">
            <a href="event-home.php">Events</a>
        </li>
        <li class="breadcrumb-item active"><?php echo $event->getName() ?></li>
    </ol>

    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

            <!-- Preview Event -->
            <img class="img-fluid rounded" src="<?php echo $event->getImgUrl() ?>" alt="<?php echo $event->getName() ?>">
            <br><br>
            <h4>
                <?php echo nl2br($event->getName()) ?>
            </h4>

            <!-- Post Content -->
            <p>
                <?php echo nl2br($event->getDescription()) ?>
            </p>
            <?php
            if($securityuserid > 0){
                ?>
                <a class="btn btn-outline-light btn-block" href="create-event.php?id=<?php echo $event->getId(); ?>&cmd=edit">Edit Event</a>
                <?php
            }
            ?>
            <hr>
            <h3 class="text-center">Comments</h3>
            <br>
            <?php
            if(!empty($eventCommentList)){
                foreach ($eventCommentList as $eventcomment){
                    $customer = new Customer($eventcomment->getCustomerId());
                    ?>
                    <!-- Single Comment -->
                    <div class="media mb-4">
                        <div class="media-body">
                            <?php
                            if($securityuserid > 0 || $customerId == $eventcomment->getCustomerId()){
                                ?>
                                <form method="post">
                                    <input type="hidden" name="hfEventId" value="<?php echo $event->getId() ?>">
                                    <button type="submit" name="btnDeleteComment" value="<?php echo $eventcomment->getId() ?>" class="btn btn-outline-danger pull-right">Delete</button>
                                </form>
                                <?php
                            }
                            ?>
                            <h5 class="mt-0 mb-0"><?php echo $customer->getFirstName()." ".$customer->getLastName() ?></h5>
                            <?php echo $eventcomment->getComment(); ?>
                            <br>
                            <small>Posted on <?php echo date_format(date_create($eventcomment->getCreateDate()), 'g:ia \o\n l jS F Y') ?></small>

                        </div>
                    </div>
                    <?php
                }
            }
            if($customerId != null && $customerId > 0){
                ?>
                <!-- Comments Form -->
                <b class="lead text-white">Leave a Comment:</b>
                <form method="post">
                    <div class="form-group">
                        <textarea name="comment" class="form-control" rows="3" required></textarea>
                    </div>
                    <button name="btnPostComment" id="btnPostComment" type="submit" class="btn btn-primary">Submit</button>
                    <input type="hidden" name="hfEventId" value="<?php echo $event->getId() ?>">
                </form>
                <?php
            }
            else{
                ?>
                <div class="alert alert-dark" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="alert-heading">Hold up!</h5>
                    <p>Please <a href="login.php">Login</a> or <a href="create-customer.php">register</a> to comment on an event.</p>
                    <hr>
                    <div class="btn-group">
                        <a class="btn btn-primary" href="login.php">Login</a>
                        <a class="btn btn-default" href="create-customer.php">Register</a>
                    </div>
                </div>
            <?php
            }
            ?>

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">
            <div class="text-center">
                <h4 class="mb-3">Event Details</h4>

                <h5>
                    <small class="badge badge-primary"><?php echo date_format(date_create($event->getStartDate()), 'm/d/y') ?></small>
                </h5>
                <h5>
                    <small><?php echo date_format(date_create($event->getStartDate()), 'g:i A')." To ".date_format(date_create($event->getEndDate()), 'g:i A') ?></small>
                </h5>
                <br>
                <br>
                <h5>
                    <b><?php echo nl2br($event->getLocation()) ?></b>
                </h5>

                <br>
                <a class="btn btn-primary btn-block btn-lg" href="<?php echo $event->getTicketLink() ?>">Get Tickets</a>

            </div>
        </div>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<!-- Footer -->
<?php include "footer.php" ?>

<!-- Bootstrap core JavaScript -->
<?php include "scripts.php" ?>

</body>

</html>
