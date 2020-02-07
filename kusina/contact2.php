<?php @$contactActive = "active"; ?>
   <!-- HEADER STARTS -->
   <?php include 'header.php'; ?>
   <?php $obj = new db(); ?>
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
       
        <section class="ftco-section contact-section bg-light">
          <div class="container">
            <div class="row d-flex mb-5 contact-info">
              <div class="col-md-12 mb-4">
                <h2 class="h4 font-weight-bold">Contact Information</h2>
              </div>
              <div class="w-100"></div>
              <div class="col-md-3 d-flex">
                <div class="dbox">
                    <p><span>Address:</span> 198 West 21th Street, Suite 721 New York NY 10016</p>
                </div>
              </div>
              <div class="col-md-3 d-flex">
                <div class="dbox">
                    <p><span>Phone:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
                </div>
              </div>
              <div class="col-md-3 d-flex">
                <div class="dbox">
                    <p><span>Email:</span> <a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
                </div>
              </div>
              <div class="col-md-3 d-flex">
                <div class="dbox">
                    <p><span>Website</span> <a href="#">yoursite.com</a></p>
                </div>
              </div>
            </div>
          </div>
        </section>
            <section class="ftco-section ftco-no-pt ftco-no-pb contact-section">
                <div class="container">
                    <div class="row d-flex align-items-stretch no-gutters">
                        <div class="col-md-6 p-5 order-md-last">
                            <h2 class="h4 mb-5 font-weight-bold">Contact Us</h2>
                            <form method="POST" action="" id="myform">
                              <div class="form-group">
                                <input type="text" class="form-control" placeholder="Your Name" name="name" required="required">
                              </div>
                              <div class="form-group">
                                <input type="email" class="form-control" placeholder="Your Email" name="email" required="required">
                              </div>
                              <div class="form-group">
                                <input type="text" class="form-control" placeholder="Subject" name="subject" required="required">
                              </div>
                              <div class="form-group">
                                <textarea id="" cols="30" rows="7" class="form-control" name="message"  required="required" placeholder="Message"></textarea>
                              </div>
                              <div class="form-group">
                                <input type="submit" name="submit" value="Send Message" id="beforeMessage" class="btn btn-primary py-3 px-5">
                                <btn class="btn btn-success py-3 px-5" id="afterMessage"><i class="fa fa-check-circle"></i> Message Sent</btn>
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
  
   
<?php

   if( isset($_POST['submit']) ){
    
      if ( isset($_POST['name'])    && $_POST['name'] != "" 
        && isset($_POST['email'])   && $_POST['email'] != ""
        && isset($_POST['subject']) && $_POST['subject'] != ""
        && isset($_POST['message']) && $_POST['message'] != "" ) {

            extract($_POST);

            date_default_timezone_set('Asia/Karachi');

            $date= date("Y-m-d");
            $time=date("H:m");

            $arr = array(
                "name" => $name,
                "email" => $email,
                "subject" => $subject,
                "message" => $message,
                "date"=>$date,
                "time"=>$time
            );

            $r = $obj->insertRecord($arr, "messages");
            if ($r == 1) {$msg = "Message Sent Successfully";?>
                              <script>
                                  document.getElementById("myform").focus();
                                  document.getElementById("beforeMessage").style.display="none";
                                  document.getElementById("afterMessage").style.display="inline-block";
                                  
                                </script>
                <?php
            }
            else { ?>
             <script>
               alert("Error!");
            </script>
          <?php  } 
        }

}else {  }

?> 
  <!-- FOOTER STARTS -->
   <?php include 'footer.php'; ?>
   <!-- FOOTER ENDS -->
                          