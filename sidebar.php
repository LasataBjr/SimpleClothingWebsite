
     <link rel="stylesheet" type="text/css" href="assets/CSS/sidebar.css">  
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script type="text/javascript" src="assets/Js/sidebar.js"></script> 
    <aside class="sidebar">
        <div class="adminlogo">
            <h1>ADMIN<span>CLUB</span></h1>
        </div>
            <div class="menu">
                <div class="items"><a href="dashboard.php"><i class="fas fa-desktop"></i>Dashboard</a></div>
                <div class="items"><a href="#" class="dropbtn"><i class="fa fa-file"></i>Pages
                <i class="fas fa-angle-right  dropdown"></i>
                </a>
                    <div class="dropdown-menu">
                        <div class="sub-item"><a href="home.php"><i class="fas fa-home"></i>Home</a></div>
                        <div class="sub-item"><a href="about_cms.php"><i class="fas fa-info-circle"></i>About</a></div>
                        <div class="sub-item"><a href="Gallerytable.php"><i class="fas fa-image"></i>Gallery</a></div>
                        <div class="sub-item"><a href="shoptable.php"><i class="fas fa-cart-shopping"></i>Shop</a></div>
                    </div>
                   </div> 
                <div class="items"><a href="setting.php"><i class="fa fa-cog"></i>Setting</a></div> 
                <div class="items"><a href="index.php"><i class="fas fa-globe"></i>Site</a></div> 
                <div class="items"><a href="logout.php"><i class="fa fa-sign-out"></i>Logout</a></div>
                <div class="items"><a href="#"><i class="fas fa-user-circle"></i><?php echo $_SESSION['Username'];?></a></div> 

            </div>
    </aside>
    <!-- <script type="text/javascript" src="../bootstrap/js/"></script>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <div class="container-fluid col-auto position-fixed top-0 start-0 bg-light min-vh-100" style="width: 250px;">
        <div class="row">

                    <div class="d-flex flex-column justify-content-between p-2" id="sidebar">
                        <a href="#" class="text-decoration-none d-flex align-items-center" role="button">
                            <span class="fs-5 fw-bold" class="adminlogo">ADMIN<span>CLUB</span></span>
                        </a>
                        <hr>
                        <div class="mt-5" style="height: 60vh;">
                        <ul class="nav nav-pills flex-column " id="menu">
                    <li class="nav-item  mt-4 " class="item1">
                        <a href="dashboard.php" class="nav-link fw-semibold border rounded" aria-current="page"><i class="fas fa-desktop"></i><span class="ms-2 items">Dashboard</span></a>
                        </li>

                    <li class="nav-item  mt-4 " class="item2">
                        <a class="nav-link fw-semibold border rounded" href="" data-bs-target="#sidemenu" data-bs-toggle="collapse"><i class="fa-regular fa-file-lines"></i><span class="ms-2 me-5">Pages</span>
                            <i class="fa-solid fa-angle-down ms-5"></i></a>
                        <ul class="nav nav-link collapse" id="sidemenu" data-bs-parent="#menu">
                            <li class="nav-item ">
                                    <a href="home.php" class="nav-link border-bottom rounded-0" aria-current="page">Home </a>
                                </li>
                                <li class="nav-item ">
                                    <a href="about_cms.php" class="nav-link border-bottom rounded-0" aria-current="page">About</a>
                                </li>
                                <li class="nav-item ">
                                    <a href="Gallerytable.php" class="nav-link border-bottom rounded-0" aria-current="page">Gallery </a>
                                </li>
                                <li class="nav-item ">
                                    <a href="shoptable.php" class="nav-link border-bottom rounded-0" aria-current="page">Shop</a>
                                </li>
                                
                        </ul>
                    </li>

                    <li class="nav-item  mt-4 " class="item3">
                        <a href="setting.php" class="nav-link fw-semibold border rounded" aria-current="page"><i class="fa-solid fa-list"></i><span class="ms-2">Setting</span></a>
                        </li>
                     <li class="nav-item  mt-4 " class="item4">
                        <a href="index.php" class="nav-link fw-semibold border rounded" aria-current="page"><i class="fa-solid fa-globe"></i><span class="ms-2">Site</span></a>
                        </li>   
                    
            </ul>
            </div>
                    </div>
                
            
        </div>
        
    </div> -->
    <!--  -->

