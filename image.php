<?php include "classes.php" ?>
<?php
$customerId = SessionManager::getCustomerId() == 0 ? null : SessionManager::getCustomerId();
$securityuserid = SessionManager::getSecurityUserId() == 0 ? null : SessionManager::getSecurityUserId();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["btnDelete"])){
        if(is_numeric($_POST["btnDelete"])){
            Image::remove($_POST["btnDelete"]);
            header("location: gallery.php");
        }
    }
    $returnVal = true;
    if(isset($_POST["btnPostComment"])){
        isset($_POST["comment"]) && $_POST["comment"] != "" ? $comment = $_POST["comment"] : $returnVal = false;
        isset($_POST["hfImageId"]) && $_POST["hfImageId"] != "" ? $imageid = $_POST["hfImageId"] : $returnVal = false;
        $currentDate = date('Y-m-d H:i:s');
        if($returnVal){
            $imagecomment = new Imagecomment(0,$comment,$customerId,1,$imageid,$currentDate, null);
            $imagecomment->save();
            header("location: image.php?id=$imageid");
        }
    }
}
if($_SERVER["REQUEST_METHOD"] == "GET"){
    if(isset($_GET["id"]) && is_numeric($_GET["id"]) && $_GET["id"] > 0){
        $image = new Image($_GET["id"]);
        if($image != null){

        }
        else{
            header("location: index.php");
        }
    }
    else{
        header("location: index.php");
    }
}


$imageCommentList = Imagecomment::loadbyimageid($image->getId());
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
            <a href="gallery.php">Gallery</a>
        </li>
        <li class="breadcrumb-item active"><?php echo $image->getName() ?></li>
    </ol>

    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

            <!-- Preview Image -->
            <img class="img-fluid rounded" src="<?php echo $image->getImgUrl() ?>" alt="<?php echo $image->getName() ?>" title="<?php echo $image->getName() ?>">
            <br>
            <br>
            <h3>
                <?php echo nl2br($image->getName()) ?>
            </h3>

            <!-- Post Content -->
            <p>
                <?php echo nl2br($image->getDescription()) ?>
            </p>

            <hr>
            <h4 class="text-center">Comments</h4>
            <?php
            if($customerId != null && $customerId > 0){
                ?>
                <b class="lead text-white">Leave a Comment:</b>
                <!-- Comments Form -->
                <form method="post">
                    <div class="form-group">
                        <textarea name="comment" class="form-control" rows="3" required></textarea>
                    </div>
                    <button name="btnPostComment" id="btnPostComment" type="submit" class="btn btn-primary">Submit</button>
                    <input type="hidden" name="hfImageId" value="<?php echo $image->getId() ?>">
                </form>
                <?php
            }
            if(!empty($imageCommentList)){
                foreach ($imageCommentList as $imagecomment){
                    $customer = new Customer($imagecomment->getCustomerId());
                    ?>
                    <!-- Single Comment -->
                    <div class="media mb-4">
                        <div class="media-body">
                            <h5 class="mt-0"><?php echo $customer->getFirstName()." ".$customer->getLastName() ?></h5>
                            <?php echo $imagecomment->getComment(); ?>
                        </div>
                    </div>
                    <?php
                }
            }

            ?>

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">
            <?php
            if($securityuserid > 0){
                ?>

                <form method="post" class="pull-right">
                    <button name="btnDelete" class="btn btn-danger" value="<?php echo $image->getId()?>">Delete</button>
                </form>
                <a class="btn btn-danger btn-block" href="create-image.php?id=<?php echo $image->getId(); ?>&cmd=edit">Edit Image</a>
                <?php
            }
            ?>
            <a href="event.php?id=<?php echo $image->getEventId(); ?>" class="btn btn-default btn-block">View Event</a>


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
