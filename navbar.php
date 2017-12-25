<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <i class="fa fa-magic"></i> Van Valin <span class="blue"> Magic</span>
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="event-home.php">Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="gallery.php">Gallery</a>
                </li>
                <?php if(SessionManager::getSecurityUserId() > 0   //Security user logged in
                    && SessionManager::getCustomerId() == 0) {
                    ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownAdmin" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Administration
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownAdmin">
                            <a class="dropdown-item" href="admin-dashboard.php">Home</a>
                            <!--<a class="dropdown-item" href="create-blog.php">Create Blog</a>
                            <a class="dropdown-item" href="create-item.php">Create Item</a>-->
                            <a class="dropdown-item" href="create-user.php">Create User</a>
                            <a class="dropdown-item" href="create-image.php">Create Image</a>
                            <a class="dropdown-item" href="create-event.php">Create Event</a>
                        </div>
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