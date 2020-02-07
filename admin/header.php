<?php
    require_once 'connection.php';
// Check, if username session is NOT set then this page will jump to login page
    if ( !isset( $_SESSION['username'] ) ) {
        header('location: login.php');
    }else{}
    $obj = new db();

    $unreadMessages = $obj->getUnread();
    $latestMessages = $obj->getLatestMessages();
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Elite Admin Template - The Ultimate Multipurpose admin template</title>
    <!-- chartist CSS -->
    <link href="../assets/node_modules/morrisjs/morris.css" rel="stylesheet">
    <link href="dist/css/pages/ecommerce.css" rel="stylesheet">
    <!-- FontAwesome CSS -->
    <link href="../kusina/fonts/fontawesome/css/all.css" rel="stylesheet">
    <!-- Toaster Notification -->
    <link href="../assets/node_modules/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- Select plugins css -->
    <link href="../assets/node_modules/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <link href="../assets/node_modules/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <!-- Color Clock plugins css -->
    <link href="../assets/node_modules/clockpicker/dist/jquery-clockpicker.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="../assets/node_modules/css-chart/css-chart.css" rel="stylesheet">
    <!-- DATA TABLES -->
    <link rel="stylesheet" type="text/css" href="../assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="../assets/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css">
    <style>
        #imageDiv img {
            width: 80px;
            z-index: 999999999;
        }

        #imageDiv #tempImg {
            width: 80px;
        }

    </style>
</head>

<body class="skin-default fixed-layout">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Kusina Admin</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="../assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="../assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                            <!-- dark Logo text -->
                            <img src="../assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo text -->
                            <img src="../assets/images/logo-light-text.png" class="light-logo" alt="homepage" /></span> </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
                        <!-- ============================================================== -->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <li class="nav-item right-side-toggle"> <a class="nav-link  waves-effect waves-light" href="transaction-cart.php"><i class="ti-shopping-cart"></i></a></li>
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown" id="overallMessagesContent">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="ti-email"></i>
                                <div class="notify">
                                    <?php foreach( $unreadMessages as $value ){
                                  if( $value['total_unread'] > 0){ ?>
                                    <span class="heartbit"></span>
                                    <span class="point"></span>
                                    <?php } } ?>
                                </div>
                            </a>
                            <div class="dropdown-menu mailbox dropdown-menu-right animated bounceInDown" aria-labelledby="2">
                                <ul>
                                    <li>
                                        <div class="drop-title">You have <?php foreach( $unreadMessages as $value){ ?>
                                            <?php if( $value['total_unread'] == 0 ){echo "no";}
                                                                      else{ echo $value['total_unread']; } ?>
                                            <?php } ?> new messages
                                        </div>
                                    </li>
                                    <li>
                                        <div class="message-center" id="latestMessagesContent">
                                            <?php foreach( $latestMessages as $value ){ ?>
                                            <!-- Message -->
                                            <a href="view-message.php?id=<?php echo $value['id']; ?>">
                                                <div class="user-img"> <img src="../assets/images/users/all.png" alt="user" class="img-circle"> <span class="<?php if( $value['is_read'] == 0 ){ echo 'profile-status online pull-right'; }else{ echo 'profile-status busy pull-right';} ?>"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5><?php echo $value['name']; ?></h5> <span class="mail-desc"><?php echo $value['subject']; ?></span> <span class="time"><?php echo $value['date']; ?></span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <?php } ?>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center link" href="view-messages.php"> <strong>See all messages</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <li class="nav-item right-side-toggle"> <a class="nav-link  waves-effect waves-light" href="javascript:void(0)"><i class="icon-settings"></i></a></li><!-- ============================================================== -->
                        <li class="nav-item right-side-toggle"> <a class="nav-link  waves-effect waves-light" href="logout.php"><i class="icon-logout"></i></a></li>
                    </ul>
                </div>
            </nav>
        </header>
