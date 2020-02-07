<?php @$contactActive = "active"; ?>
<!-- HEADER STARTS -->
<?php include 'header.php'; ?>
<!-- HEADER ENDS -->

<!-- CONTACT PAGE CONTENT STARTS -->

<!-- BREAD CRUMB STARTS -->
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_4.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-2 bread">Contact Us</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Contact <i class="ion-ios-arrow-forward"></i></span></p>
            </div>
        </div>
    </div>
</section>
<!-- BREAD CRUMB ENDS -->

<?php $contact_info = $obj->getMultiData("contact_info");
        foreach($contact_info as $value){ ?>
<section class="ftco-section contact-section bg-light">
    <div class="container">
        <div class="row d-flex mb-5 contact-info">
            <div class="col-md-12 mb-4">
                <h2 class="h4 font-weight-bold">Contact Information</h2>
            </div>
            <div class="w-100"></div>
            <div class="col-md-3 d-flex">
                <div class="dbox">
                    <p><span>Address:</span> <?php echo $value['address']; ?></p>
                </div>
            </div>
            <div class="col-md-3 d-flex">
                <div class="dbox">
                    <p><span>Phone:</span> <a href="tel://<?php echo $value['phone']; ?>"><?php echo $value['phone']; ?></a></p>
                </div>
            </div>
            <div class="col-md-3 d-flex">
                <div class="dbox">
                    <p><span>Email:</span> <a href="mailto:<?php echo $value['email']; ?>"><?php echo $value['email']; ?></a></p>
                </div>
            </div>
            <div class="col-md-3 d-flex">
                <div class="dbox">
                    <p><span>Website:</span> <a href="#"><?php echo $value['website']; ?></a></p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php } ?>
<section class="ftco-section ftco-no-pt ftco-no-pb contact-section">
    <div class="container">
        <div class="row d-flex align-items-stretch no-gutters">
            <div class="col-md-6 p-5 order-md-last">
                <h2 class="h4 mb-5 font-weight-bold">Contact Us</h2>
                <form method="POST" action="" id="myform">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Your Name" name="name" required="required" id="name">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Your Email" name="email" required="required" id="email">
                    </div>
                    <div class="form-group">
                        <div class="select-wrap one-third">
                      <select name="subject" id="subject" required="required" class="form-control">
                        <option value="" selected="selected">Subject</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                      </select>
                    </div>
                    </div>
                    <div class="form-group">
                        <textarea id="" cols="30" rows="7" class="form-control" name="message" required="required" placeholder="Message" id="message"></textarea>
                    </div>
                    <div class="form-group">
                        <btn class="btn btn-success py-3 px-5" id="afterMessage"><i class="fa fa-check-circle"></i> Message Sent</btn>
                        <input type="submit" name="submit" value="Send Message" id="beforeMessage" class="btn btn-primary py-3 px-5">
                    </div>
                </form>
            </div>
            <div class="col-md-6 d-flex align-items-stretch">
                <div id="map"></div>
            </div>
        </div>
    </div>
</section>
<!-- CONTACT PAGE CONTENT ENDS -->


<!-- FOOTER STARTS -->
<?php include 'footer.php'; ?>
<!-- FOOTER ENDS -->
<script>
    $('form').submit(function(e) {
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'messageSubmit.php',
            data: $('form').serialize(),
            success: function() {
                $('#beforeMessage').hide();
                $('#afterMessage').fadeIn(400);
                setTimeout(function() {
                    $('form').trigger("reset");
                    $('#afterMessage').hide();
                    $('#beforeMessage').fadeIn(400);
                }, 1500);
            }
        });
    });

</script>
