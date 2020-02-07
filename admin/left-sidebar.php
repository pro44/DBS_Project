        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User Profile-->
                <div class="user-profile">
                    <div class="user-pro-body">
                        <div><img src="../assets/images/users/2.jpg" alt="user-img" class="img-circle"></div>
                        <div class="dropdown">
                            <a href="javascript:void(0)" class="dropdown-toggle u-dropdown link hide-menu" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['username']; ?><span class="caret"></span></a>
                            <div class="dropdown-menu animated flipInY">
                                <a href="logout.php" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                                <!-- text-->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">

                        <!--  <li>
                            <div class="hide-menu text-center">
                                <div id="eco-spark"></div>
                                <small>TOTAL EARNINGS - JUNE 2020</small>
                                <h4>$2,478.00</h4>
                            </div>
                        </li> -->

                        <li class="nav-small-cap">--- MAIN</li>
                        <li> <a class="waves-effect waves-dark <?php echo @$dashboardActive; ?>" href="./index.php" aria-expanded="false"><i class="icon-speedometer"></i><span class="hide-menu">Dashboard </span></a>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark <?php echo @$TransactionsActive; ?>" href="javascript:void(0)" aria-expanded="false"><i class="icon-wallet"></i><span class="hide-menu">Transactions</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="make-transaction.php">Make a Transaction</a></li>
                                <li><a href="view-transactions.php">View Transactions</a></li>
                            </ul>
                        </li>
                        
                        <li class="nav-small-cap">--- Table Reservation</li>
                        <li> <a class="waves-effect waves-dark <?php echo @$tablesActive; ?>" href="tables.php" aria-expanded="false"><i class="icon-umbrella"></i><span class="hide-menu">Tables</span></a>
                        </li><li> <a class="waves-effect waves-dark <?php echo @$tablesActive; ?>" href="view-messages.php" aria-expanded="false"><i class="ti-calendar"></i><span class="hide-menu">View Reservations</span></a>
                        </li>
                        <li class="nav-small-cap">--- Website Management</li>
                        <li> <a class="waves-effect waves-dark <?php echo @$messagesActive; ?>" href="view-messages.php" aria-expanded="false"><i class="ti-email"></i><span class="hide-menu">Messages</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark <?php echo @$categoriesActive; ?>" href="categories.php" aria-expanded="false"><i class="ti-bookmark-alt"></i><span class="hide-menu">Categories</span></a>
                        </li>
                        

                        <li> <a class="has-arrow waves-effect waves-dark <?php echo @$itemsActive; ?>" href="javascript:void(0)" aria-expanded="false"><i class="ti-clipboard"></i><span class="hide-menu">Menu</span></a>
                            <ul aria-expanded="false" class="collapse <?php if( @$itemsActive == "active" ){echo "in";} ?>">
                                <li><a href="add-item.php" class="<?php echo @$addItemActive; ?>">Add Item</a></li>
                                <li> <a class="has-arrow <?php echo @$viewItemsActive; ?>" href="javascript:void(0)" aria-expanded="false">View Menu</a>
                                    <ul aria-expanded="false" class="collapse <?php if( @$viewItemsActive == "active" ){echo "in";} ?> ">
                                        <?php $categories = $obj->getMultiData("categories"); ?>
                                        <?php foreach($categories as $value){?>
                                        <li><a id="activeClassAdd" href="view-items.php?c_id=<?php echo $value['id']; ?>"><?php echo $value['category_name']; ?></a></li>
                                        <?php } ?>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-image"></i><span class="hide-menu">Slider</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="layout-single-column.html">Add Slide</a></li>
                                <li><a href="layout-fix-header.html">View Slides</a></li>
                            </ul>
                        </li>
                        <li> <a class="waves-effect waves-dark <?php echo @$reviewsActive; ?>" href="./view-reviews.php" aria-expanded="false"><i class="icon-badge"></i><span class="hide-menu">Reviews </span></a>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark <?php echo @$chefsActive; ?>" href="javascript:void(0)" aria-expanded="false"><i class="icon-people"></i><span class="hide-menu">Chefs</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="add-chef.php">Add Chef</a></li>
                                <li><a href="view-chefs.php">View Chefs</a></li>
                            </ul>
                        </li>
                        <li> <a class="waves-effect waves-dark <?php echo @$factsActive; ?>" href="facts.php" aria-expanded="false"><i class="icon-check"></i><span class="hide-menu">Facts</span></a>
                        </li>
                        <li class="nav-small-cap">--- SUPPORT</li>

                        <li> <a class="has-arrow waves-effect waves-dark <?php echo @$settingsActive; ?>" href="javascript:void(0)" aria-expanded="false"><i class="icon-settings"></i><span class="hide-menu">Settings</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="essentials.php">Basic Info</a></li>
                                <li><a href="open-hours.php">Open Hours</a></li>
                                <li><a href="contact-page-info.php">Contact Page</a></li>
                            </ul>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="logout.php" aria-expanded="false"><i class="icon-logout"></i><span class="hide-menu">Log Out</span></a></li>
                        
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->