<?php include "classes.php" ?>
<?php
$eventList = Event::loadall();
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
        <small>Subheading</small>
    </h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Events</li>
    </ol>
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
            if(!empty($eventList)){
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
<!-- /.container -->

<!-- Footer -->
<?php include "footer.php" ?>

<!-- Bootstrap core JavaScript -->
<?php include "scripts.php" ?>

</body>

</html>
