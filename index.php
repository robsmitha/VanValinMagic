<?php include "classes.php" ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Magic Man Van Valin is a Magician in Tampa, FL. Cory has handled hundreds of shows at a multitude of venues and is capable of entertaining crowds of all sizes. Your guests will feel amazed being greeted with entertainment they would've never seen coming. ">
    <meta name="author" content="Rob" >

    <title>Van Valin Magic</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Cabin:700' rel='stylesheet' type='text/css'>
      <link href="https://fonts.googleapis.com/css?family=Cinzel:700|Contrail+One|Lato" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/grayscale.min.css" rel="stylesheet">
	<link href="css/custom.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">
			<i class="fa fa-magic"></i> Van Valin <span class="blue"> Magic</span>
		</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#services">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#media">Media</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
            </li>
              <li class="nav-item">
                  <a class="nav-link" href="event-home.php">Events</a>
              </li>
              <?php if(SessionManager::getSecurityUserId() > 0   //Security user logged in
                  && SessionManager::getCustomerId() == 0) {
                  ?>
                  <li class="nav-item">
                      <a class="nav-link" href="admin-dashboard.php">Administration</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="logout.php">Logout</a>
                  </li>
                  <?php
              }else if(SessionManager::getCustomerId() > 0){  //customer is logged in
                  ?>
                  <!--<li class="nav-item">
                        <a class="nav-link" href="online-cart.php"><i class="icon-basket"></i> Cart
                            <span id="cartCounter" class="badge badge-pill badge-primary">
                                <?php/*
                                $foundcart = Cart::loadbycustomerid(SessionManager::getCustomerId());
                                $totalcartcount = 0;
                                if($foundcart != null){
                                    //use this cart id for item;
                                    $cartid = $foundcart->getId();
                                    $totalcartcount = Onlinecart::getcartcount($cartid);
                                }
                                echo $totalcartcount;*/
                  ?>
                            </span>
                        </a>
                    </li>-->
                  <li class="nav-item">
                      <a class="nav-link" href="logout.php">Logout</a>
                  </li>
                  <?php
              }
              else{   //nobody logged in
                  ?>
                  <li class="nav-item">
                      <a class="nav-link" href="login.php">Login</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="create-customer.php">Register</a>
                  </li>
                  <?php
              }
              ?>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Intro Header -->
    <header class="masthead">
      <div class="intro-body">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <h1 class="brand-heading">Magic <span class="blue"><i>Redefined</i></span></h1>
              <a href="#intro" class="btn btn-circle js-scroll-trigger">
                <i class="fa fa-angle-double-down animated"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Intro Section -->
    <section id="intro" class="content-section text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-pills nav-justified" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Next Show</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">All Shows</a>
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
                                            <p><?php echo nl2br(substr($event->getDescription(), 0, 300)); ?></p>
                                            <div class="btn-group">
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
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="content-section text-center">
      <div class="container">
		  <div class="row">
			  <div class="col-md-12">
			  <h2>Who is<span class="blue"> Cory Van Valin?</span></h2>
				<hr>
			  </div>
		  </div>
        <div class="row">
          <div class="col-md-6">
            <img src="img/1.jpg" class="img-fluid" alt="Magic Man Van Valin">
          </div>
          <div class="col-md-6">
		  <p><b>Well if you are from the Tampa Bay / Central Florida area, then you KNOW he is the best upcoming magician that will make you reconsider believing in magic!</b></p>
                <p> Cory’s ability to connect with each individual in an audience truly makes it an experience remembered for many years. 
                From his on-the-spot humor, to his mastery of his craft, Cory Van Valin’s best magic trick is bringing back that child-like love and wonder for magic that we’ve all had growing up!</p>   
                <p>Cory has handled hundreds of shows at a multitude of venues ranging from all over Florida to Las Vegas, Nevada. He is capable of pleasing crowds of all demographics at birthday parties, VIP events and everything in between.
                </p>
                <p> Cory has been named <a href="http://933flz.iheart.com/onair/vj-kidd-leow-29680/tampa-bays-top-up-coming-magician-12324017/" target="_blank"><i>Tampa Bay’s Top Up & Coming Magician by 93.3 flz</i></a>,
                 and has performed for many celebrities and well known companies in the 5 years he’s been performing, and has even opened up for the headlining act in Las Vegas!</p>   
		  </div>
        </div>
      </div>
    </section>

    <!-- Download Section -->
    <section id="download" class="download-section content-section text-center">
      <div class="container">
        <div class="col-lg-8 mx-auto">
          
        </div>
      </div>
    </section>
	
    <!-- Services Section -->
    <section id="services" class="content-section text-center">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
			<h2>What types of services can we book you for?</h2>
			
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
			<p>
			I pride myself on my love to share magic with everybody. Whether it is a 30-45 minute magic show for children, or strolling around at your cocktail hour, or even performing on stage for your corporation’s employees.
			</p> 
			</div>
		</div>
		<div id="accordion" role="tablist">
          <div class="card">
            <div class="card-header" role="tab" id="headingOne">
                <a class="text-white" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <h5 class="mb-0">Strolling Magic</h5>
                </a>
            </div>

            <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
              <div class="card-body bg-dark">
                  <div class="row">
                      <div class="col-md-8">
                          <p>This is a guaranteed asset to any party or event. With my mastery of casually approaching guests, and my ability to generate interest in my talent before performing, by the time attendants see what I can do they are already laughing and smiling wanting to tell everybody about this strolling magician!
                              With many diverse parties and hours of experiences under my belt, my strolling magic is a sure-fire way to impress your guests!</p>
                          <b>Darlene W. on June 27, 2016</b>
                          <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                          <br>
                          <q><i>Magic Man Van Valin is more than a magician! He is a skilled entertainer. Our party guests loved him & we were thrilled with his performance. He worked my 60th birthday party as a strolling magician, mingled around the room amazing small groups with his tricks, illusions, jokes and friendly professional demeanor. He was a tremendous source of enjoyment for all ages.
                                  I highly recommend Magic Man Van Valin! Thank you, Gigsalad for helping us find the right entertainment for our party!</i></q>
                      </div>
                      <div class="col-md-4">
                          <img src="img/services/1.jpg" class="img-fluid mx-auto" alt="cory van valin">
                      </div>
                  </div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" role="tab" id="headingTwo">
                <a class="text-white collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <h5 class="mb-0"> Corporate Shows </h5>
                </a>
            </div>
            <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
              <div class="card-body bg-dark">
                  <div class="row">
                      <div class="col-md-8">
                          <p>The benefits of hiring entertainment for your corporate meetings are crucial! Aside the gratitude that your employees will feel being greeted with entertainment to their work party or meeting, Magician’s have the ability to create a fun laughable and a mind-opening atmosphere, which is surely to liven up the event!
                              My 45 & 60 minute corporate magic show is full of audience participation, good clean humor, and powerful displays of magic and presentation.</p>
                          <b>Pam M. on December 10, 2015</b>
                          <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                          <br>
                          <q><i>We had a Casino Holiday Gala at our home for approximately 180 guests on December 5th. There were a lot of people to entertain but everyone I asked said they had been dazzled by our amazing magician.
                                  Not only had they been entertained, but wowed! Everyone said they tried to see and spot how he was doing his tricks, but couldn't figure it out. It apparently was "magic". Not only was the magic great, but his personality was very entertaining.
                                  I would highly recommend him for any event and would use him again should the occasion arise.</i></q>
                      </div>
                      <div class="col-md-4">
                          <img src="img/services/2.jpg" class="img-fluid mx-auto" alt="cory van valin">
                      </div>
                  </div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" role="tab" id="headingThree">

                <a class="text-white collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    <h5 class="mb-0">Trade Shows</h5>
                </a>

            </div>
            <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
              <div class="card-body bg-dark">
                  <div class="row">
                      <div class="col-md-8">
                          <p>Want to spark interest at your trade show booth and generate more sales? With my ice-breaking skills, and my ability to maintain attention for an extended amount of time, I will not only generate a constant flow of traffic to your booth, which will result in more leads.
                              I will work closely with your sales team to have a customized magic presentation which feature your company’s message and branding.</p>
                          <b> Noah D. on July 31, 2012</b>
                          <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                          <br>
                          <q><i>I hired Magic Man Van Valin for the open house for my business. There were over 100 guests in attendance and I had various forms of entertainment. The room where Cory performed his card tricks was packed with observers, mesmerized by his magic, and he was the talk of the entire party.
                                  I highly recommend Magic Man Van Valin for parties, social events, etc. Very entertaining!! </i></q>
                      </div>
                      <div class="col-md-4">
                          <img src="img/services/3.jpg" class="img-fluid mx-auto" alt="cory van valin">
                      </div>
                  </div>
              </div>
            </div>
          </div>
            <div class="card">
                <div class="card-header" role="tab" id="headingFour">
                    <a class="text-white collapsed" data-toggle="collapse" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        <h5 class="mb-0">Children’s magic</h5>
                    </a>
                </div>
                <div id="collapseFour" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
                    <div class="card-body bg-dark">
                        <div class="row">
                            <div class="col-md-8">
                                <p>Children have an initiate love for magic, everything is magic to them! What my magic performance for children ignites is a belief in themselves that they too, can achieve the impossible. I believe it is important to
                                    never lose that child sense of wonder and these values are reflected in my style of work. I strive to be an positive role model in children's lives because that is what I want to give back!</p>
                                <b>Angela H. on December 15, 2014</b>
                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                <br>
                                <q><i>My son's 13th birthday was treated with the awesome talents of Magic Man Van Valin!! He related to the young and the young at heart and we were all WOWED!!!
                                        Magic Van is such an asset to the "Magic World" and my entire family and friends in attendance are honored to commend him - and commend him highly - we do!!! </i></q>
                                <br>

                                <small>
                                    Hired as:	Children's Party Magician</small>
                            </div>
                            <div class="col-md-4">
                                <img src="img/services/4.jpg" class="img-fluid mx-auto" alt="cory van valin">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
		<div class="row">
			<div class="col-md-12">
			 <h3>What to expect when hiring Cory</h3>					
				<p> A boost in excitement and energy from his close up entertainment</p>												
				<p> Talk amongst attendants about their personal mind-blowing experience with Cory</p>												
				<p> A lasting memory and a sense of appreciation from guests for the special entertainment you hired specifically for them.</p>											
				<p> And much more!</p>			
				<a href="#contact" class="btn btn-default btn-lg js-scroll-trigger"><i class="fa fa-pencil fa-fw"></i> <span class="network-name">Schedule Event</span></a>		
			</div>
		</div>
	</div>
	</section>
	    <!-- Media Section -->
    <section id="media" class="content-section text-center">
        <div class="media-section">
            <div class="container">
                <div class="col-md-12">
                <h2>Photos & Videos</h2>
   					 <hr>
            </div>
            <!-- photo Content -->
<style>
.img-thumbnail{
	width: 250px; 
	height: 250px; 
}
</style>
<div class="row">
    <?php
    $imageList = Image::loadfeaturedimages();
    if(!empty($imageList)){
        foreach ($imageList as $image){
            ?>
            <div class="col-md-3">
                <a id="<?php echo $image->getId() ?>" onclick="showdiv(this.id)" data-toggle="modal" data-target="#myModal" class="d-block mb-4 h-100" title="<?php echo $image->getName(); ?>">
                    <img id="img<?php echo $image->getId(); ?>" class="img-fluid img-thumbnail" src="<?php echo $image->getImgUrl(); ?>" alt="<?php echo $image->getDescription(); ?>">
                </a>
            </div>
    <?php

        }
    }
    ?>
</div>
    <br>
	<p>See more of cory's work</p>
	<ul class="list-inline banner-social-buttons">
		<li class="list-inline-item">
			<a href="https://www.facebook.com/CoryVanValin.magic" class="btn btn-default btn-lg" target="_blank"><i class="fa fa-facebook fa-fw"></i> <span class="network-name">Facebook</span></a>
		</li>
		<li class="list-inline-item">
			<a href="https://www.youtube.com/playlist?list=PLGaj79QJWbiYX45PKpvm0pT-WR4JwdAek" class="btn btn-default btn-lg" target="_blank"><i class="fa fa-youtube fa-fw"></i> <span class="network-name">Youtube</span></a>
		</li>
		<li class="list-inline-item">
			<a href="https://www.eventbrite.com/e/cory-van-valin-magic-redefined-channelside-tickets-28289943984?aff=es2" class="btn btn-default btn-lg" target="_blank"><i class="fa fa-calendar fa-fw"></i> <span class="network-name">Events</span></a>
		</li>
	</ul>
    </section>
	
    <!-- Contact Section -->
    <section id="contact" class="content-section text-center">
      <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Contact <span class="blue">Van Valin Magic</span></h2>
   					 <hr>
            </div>
            <div class="col-md-8">
				<form id="contact-form" method="post" action="contact.php" role="form">

                        <div class="messages"></div>

                        <div class="controls">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_name">Name *</label>
                                        <input id="form_name" type="text" name="name" class="form-control" placeholder="Please enter your first & last name *" required="required" data-error="Name is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_lastname">Subject *</label>
                                        <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Schedule Show, Event or just saying hello! *" required="required" data-error="Please what you are inquiring about">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_email">Email *</label>
                                        <input id="form_email" type="email" name="email" class="form-control" placeholder="Please enter your email *" required="required" data-error="Valid email is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_phone">Phone</label>
                                        <input id="form_phone" type="tel" name="phone" class="form-control" placeholder="Please enter your phone">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="form_message">Message *</label>
                                        <textarea id="form_message" name="message" class="form-control" placeholder="Please include Date, Time, Venue address, Occasion, # of Guests and type of preformance. *" rows="4" required="required" data-error="Please include Date, Time, Venue address, Occasion, # of Guests and type of preformance."></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-success btn-send" value="Send message">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="text-muted"><strong>*</strong> These fields are required.</p>
                                </div>
                            </div>
                        </div>

                    </form>            
            </div>
            <div class="col-md-4">
                <h3>Let's get in touch</h3>
				 <address>
				 <strong>Contact Information</strong>
				 <br>
                    <abbr title="Phone">P:</abbr> (813) 802-9907
                    <br>
                    <abbr title="Email">E:</abbr> <a href="mailto:Cory@MagicManVan.com">Cory@MagicManVan.com</a>
                </address>
                
            </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container text-center">
        <a href="#page-top" class="btn btn-circle js-scroll-trigger">
			<i class="fa fa-angle-double-up animated"></i>
		</a>
		<br>
		<br>
            <p>Copyright &copy; Van Valin Magic 2016</p>
            <small>Powered by <a href="http://www.webmediaconcepts.com/">Web Media Concepts</a></small>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>

    <!-- Custom scripts for this template -->
    <script src="js/grayscale.min.js"></script>
    <!--contact form js-->
    <!--<script src="js/validator.js"></script>-->
    <script src="js/contact.js"></script>
    <script>
        function showdiv(e) {
            var imgid = "img" + e;
            var imgsrc = document.getElementById(imgid).getAttribute("src");
            var description = document.getElementById(imgid).getAttribute("alt");
            var name = document.getElementById(e).getAttribute("title");
            $("#imgModal").attr("src", imgsrc);
            document.getElementById("lblName").innerText = name;
            document.getElementById("lblDescription").innerText = description;
        }
    </script>
    <div id="myModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <img id="imgModal" class="img-fluid" src="" alt="">
        </div>
    </div>
  </body>

</html>
