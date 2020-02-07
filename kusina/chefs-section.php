<?php $chefs = $obj->getMultiData("chefs"); ?>
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-2">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Chefs</span>
                <h2 class="mb-4">Our Master Chefs</h2>
            </div>
        </div>
        <div class="row">
            <?php foreach( $chefs as $value ){ ?>
            <div class="col-md-6 col-lg-3 ftco-animate">
                <div class="staff">
                    <div class="img" style="background-image: url(../kusina/images/chefs/<?php echo $value['image']; ?>);"></div>
                    <div class="text px-4 pt-4">
                        <h3><?php echo $value['name']; ?></h3>
                        <span class="position mb-2"><?php echo $value['title']; ?></span>
                        <div class="faded">
                            <!-- <p>I am an ambitious workaholic, but apart from that, pretty simple person.</p> -->
                            <ul class="ftco-social d-flex">
                                <li class="ftco-animate"><a href="https://www.twitter.com/<?php echo $value['twitter']; ?>"><span class="icon-twitter"></span></a></li>
                                <li class="ftco-animate"><a href="https://www.facebook.com/<?php echo $value['facebook']; ?>"><span class="icon-facebook"></span></a></li>
                                <li class="ftco-animate"><a href="https://www.plus.google.com/<?php echo $value['google_plus']; ?>"><span class="icon-google-plus"></span></a></li>
                                <li class="ftco-animate"><a href="https://www.instagram.com/<?php echo $value['instagram']; ?>"><span class="icon-instagram"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
