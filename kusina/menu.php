<?php @$menuActive = "active"; ?>
<!-- HEADER STARTS -->
<?php include 'header.php'; ?>
<!-- HEADER ENDS -->

<!-- MENU PAGE CONTENT STARTS -->

<!-- BREAD CRUMB STARTS -->
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_4.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-2 bread">Specialties</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Menu <i class="ion-ios-arrow-forward"></i></span></p>
            </div>
        </div>
    </div>
</section>
<!-- BREAD CRUMB ENDS -->
<?php $categories = $obj->getMultiData("categories");?>
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-2">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Specialties</span>
                <h2 class="mb-4">Our Menu</h2>
            </div>
        </div>
        <div class="row">
            <?php foreach( $categories as $val ){ ?>
            <div class="col-md-6 col-lg-4 menu-wrap">
                <div class="heading-menu text-center ftco-animate">
                    <h3><?php echo $val['category_name']; ?></h3>
                </div>
                <?php $items = $obj->getItemsByCategory($val['id']);  ?>
                <?php $sn=0; foreach( $items as $value ){ $sn++;?>
                <div class="menus d-flex ftco-animate">
                    <div class="menu-img img" style="background-image: url(images/items/<?php echo $value['item_image']; ?>);"></div>
                    <div class="text">
                        <div class="d-flex">
                            <div class="one-half">
                                <h3><?php echo $value['item_name']; ?></h3>
                            </div>
                            <div class="one-forth">
                                <span class="price">$<?php echo $value['item_price']; ?></span>
                            </div>
                        </div>
                        <p><?php echo $value['item_desc']; ?></p>
                    </div>
                </div>
                <?php } ?>
            </div>
            <?php } ?>
        </div>
    </div>

</section>
<!-- MENU PAGE CONTENT ENDS -->

<!-- FOOTER STARTS -->
<?php include 'footer.php'; ?>
<!-- FOOTER ENDS -->
