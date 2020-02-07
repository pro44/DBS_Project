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
                <?php if($sn == 3){break;} } ?>
            </div>
            <?php } ?>
        </div>
        <div class="row">
            <div class="col-md-12 text-center ftco-animate">
                <p><a href="menu.php" class="btn btn-black py-3 px-5">View All Menu</a></p>
            </div>
        </div>
    </div>

</section>
