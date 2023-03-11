    <?php include('../Admin/connect.php'); ?>

<style >
    
.header-top-area {
    background: #AD8B73;


}
</style>
    <!-- Start Welcome area -->
    
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="#"><img class="main-logo" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">
                                    <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                        <div class="menu-switcher-pro">
                                            <a class="navbar-brand" href="index.php"><img class="logo-img" src="img/incare1.png" alt="logo"></a></a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                        <div class="header-top-menu tabl-d-n">
                                            <ul class="nav navbar-nav mai-top-nav">
                                               
                                               <li class="nav-item"><a href="index.php" class="nav-link">Home</a>
                                                </li>
                                                 <li class="nav-item dropdown res-dis-nn">

                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">Staffs <span class="angle-down-topmenu"><i class="fa fa-angle-down"></i></span></a>
                                                    <div role="menu" class="dropdown-menu animated zoomIn">
                                                        <a href="staffAll.php" class="dropdown-item">Staff List</a>
                                                        <a href="staffAdd.php" class="dropdown-item">Add Staff</a>
                    
                                                    </div>
                                                </li>
                                      
                                                    <li class="nav-item dropdown res-dis-nn">

                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">Animals <span class="angle-down-topmenu"><i class="fa fa-angle-down"></i></span></a>
                                                    <div role="menu" class="dropdown-menu animated zoomIn">
                                                        <a href="animalAll.php" class="dropdown-item">Animal list</a>
                                                        <a href="animalAdd.php" class="dropdown-item">Add animal</a>
                    
                                                    </div>
                                                </li>
                                                   <li class="nav-item dropdown res-dis-nn">

                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">Breed <span class="angle-down-topmenu"><i class="fa fa-angle-down"></i></span></a>
                                                    <div role="menu" class="dropdown-menu animated zoomIn">
                                                        <a href="breedAll.php" class="dropdown-item">Breed list</a>
                                                        <a href="breedAdd.php" class="dropdown-item">Add breed</a>
                    
                                                    </div>
                                                </li>
                                                 <li class="nav-item dropdown res-dis-nn">

                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">Customer <span class="angle-down-topmenu"><i class="fa fa-angle-down"></i></span></a>
                                                    <div role="menu" class="dropdown-menu animated zoomIn">
                                                        <a href="custAll.php" class="dropdown-item">Customer list</a>
                                                         <a href="custOrder.php" class="dropdown-item">Customer Orders</a>
                                                        
                    
                                                    </div>
                                                </li>
                                                 <li class="nav-item dropdown res-dis-nn">

                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">Report <span class="angle-down-topmenu"><i class="fa fa-angle-down"></i></span></a>
                                                    <div role="menu" class="dropdown-menu animated zoomIn">
                                                        <a href="report.php" class="dropdown-item">Date Report</a>
                                                         <a href="graphStocks.php" class="dropdown-item">Chart Report</a>
                                                         <a href="lowStock.php" class="dropdown-item">Low Stocks List</a>
                                                        
                    
                                                    </div>
                                                </li>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                                <li class="nav-item">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
															<span class="admin-name"><?php echo $_SESSION["staffName"];?></span>
															<i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
														</a>

                                                    <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">

                                                        <li>
                                                                <a href="Profile.php" class="dropdown-item">View profile</a>
                                                        <a href="changePass.php" class="dropdown-item">Change Password</a>
                                                            <a href="logout_query.php" onclick="return confirm('Are you sure to log out?')"><span class="edu-icon edu-locked author-log-ic"></span>Log Out</a>
                                                             
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
