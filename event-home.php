<?php include "classes.php" ?>
<?php
$eventList = Event::loadall();
$securityuserid = SessionManager::getSecurityUserId();
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
    <h1 class="mt-4 mb-3">Events
        <small>Cory's Latest Shows!</small>
        <?php
        if($securityuserid > 0){
            ?>
            <a class="btn btn-danger pull-right" href="create-event.php">Create Event</a>
            <?php
        }
        ?>
    </h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Events</li>
    </ol>
    <ul class="nav nav-pills nav-justified" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fa fa-list"></i> </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><i class="fa fa-table"></i> </a>
        </li>
    </ul>
    <br>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <?php
            $eventList = Event::loadall();
            if(!empty($eventList)){
                foreach ($eventList as $event){
                    ?>
                    <!-- Project One -->
                    <div class="row">
                        <div class="col-md-7">
                            <a href="event.php?id=<?php echo $event->getId() ?>">
                                <img class="img-fluid rounded mb-3 mb-md-0" src="<?php echo $event->getImgUrl() ?>" alt="">
                            </a>
                        </div>
                        <div class="col-md-5">
                            <h3><?php echo $event->getName() ?></h3>
                            <b><?php echo $event->getLocation() ?></b>
                            <p><?php echo $event->getDescription() ?></p>
                            <div class="btn-group">
                                <?php
                                if($securityuserid > 0){
                                    ?>
                                    <a class="btn btn-danger pull-right" href="create-event.php?id=<?php echo $event->getId(); ?>&cmd=edit">Edit Event</a>
                                    <?php
                                }
                                ?>
                                <a class="btn btn-primary" href="event.php?id=<?php echo $event->getId() ?>">View Event
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                </a>
                                <a class="btn btn-default" href="<?php echo $event->getTicketLink() ?>">Get Tickets
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                    <hr>
                    <?php
                }
            }
            ?>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <?php
            if(!empty($eventList)){
            ?>
            <table class="table">
                <thead>
                <tr>
                    <th>Event</th>
                    <th>Date</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Location</th>
                    <th>Tickets</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($eventList as $event){
                    ?>
                    <tr>
                        <td>
                            <h5><a href="event.php?id=<?php echo $event->getId() ?>"><?php echo $event->getName() ?></a></h5>
                        </td>
                        <td><?php echo date_format(date_create($event->getStartDate()), 'm/d/y'); ?></td>
                        <td><?php echo date_format(date_create($event->getStartDate()), 'g:i A'); ?></td>
                        <td><?php echo date_format(date_create($event->getEndDate()), 'g:i A'); ?></td>
                        <td><?php echo $event->getLocation() ?></td>
                        <td><a class="btn btn-primary" href="<?php echo $event->getTicketLink() ?>">Get Tickets</a></td>
                    </tr>
                    <?php
                }
                }
                ?>
                </tbody>
            </table>
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
