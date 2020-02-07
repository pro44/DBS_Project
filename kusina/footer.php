<footer class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
       <?php $open_hours = $obj->getMultiData("open_hours");
        foreach($basic_info as $value){ ?>
        <div class="row mb-5">
            <div class="col-md-6 col-lg-3">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2"><?php echo $value['name']; ?></h2>
                    <p><?php echo $value['footer_desc']; ?></p>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
                        <li class="ftco-animate"><a href="https://www.twitter.com/<?php echo $value['twitter']; ?>"><span class="icon-twitter"></span></a></li>
                        <li class="ftco-animate"><a href="https://www.facebook.com/<?php echo $value['facebook']; ?>"><span class="icon-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="https://www.instagram.com/<?php echo $value['instagram']; ?>"><span class="icon-instagram"></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Open Hours</h2>
                    <ul class="list-unstyled open-hours">
                       <?php foreach($open_hours as $value){ ?>
                        <li class="d-flex"><span>Monday</span><span><?php echo $value['mon_from']; ?> - <?php echo $value['mon_to']; ?></span></li>
                        <li class="d-flex"><span>Tuesday</span><span><?php echo $value['tues_from']; ?> - <?php echo $value['tues_to']; ?></span></li>
                        <li class="d-flex"><span>Wednesday</span><span><?php echo $value['wed_from']; ?> - <?php echo $value['wed_to']; ?></span></li>
                        <li class="d-flex"><span>Thursday</span><span><?php echo $value['thurs_from']; ?> - <?php echo $value['thurs_to']; ?></span></li>
                        <li class="d-flex"><span>Friday</span><span><?php echo $value['fri_from']; ?> - <?php echo $value['fri_to']; ?></span></li>
                        <li class="d-flex"><span>Saturday</span><span><?php echo $value['sat_from']; ?> - <?php echo $value['sat_to']; ?></span></li>
                        <li class="d-flex"><span>Sunday</span><span> Closed</span></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Newsletter</h2>
                    <p>Far far away, behind the word mountains, far from the countries.</p>
                    <form action="#" class="subscribe-form">
                        <div class="form-group">
                            <input type="text" class="form-control mb-2 text-center" placeholder="Enter email address">
                            <input type="submit" value="Subscribe" class="form-control submit px-3">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Instagram</h2>
                    <div class="thumb d-sm-flex">
                        <a href="#" class="thumb-menu img" style="background-image: url(images/insta-1.jpg);">
                        </a>
                        <a href="#" class="thumb-menu img" style="background-image: url(images/insta-2.jpg);">
                        </a>
                        <a href="#" class="thumb-menu img" style="background-image: url(images/insta-3.jpg);">
                        </a>
                    </div>
                    <div class="thumb d-flex">
                        <a href="#" class="thumb-menu img" style="background-image: url(images/insta-4.jpg);">
                        </a>
                        <a href="#" class="thumb-menu img" style="background-image: url(images/insta-5.jpg);">
                        </a>
                        <a href="#" class="thumb-menu img" style="background-image: url(images/insta-6.jpg);">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        <div class="row">
            <div class="col-md-12 text-center">

                <p>
                    Copyright &copy;<script>
                        document.write(new Date().getFullYear());

                    </script> All rights reserved | Made with <i class="icon-heart" aria-hidden="true"></i> by <a href="javascript:void(0)">Raja Aakash</a>
                </p>
            </div>
        </div>
    </div>
</footer>


<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" /></svg></div>


<script src="js/jquery.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/jquery.animateNumber.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/jquery.timepicker.min.js"></script>
<script src="js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="js/google-map.js"></script>
<script src="js/main.js"></script>
<!--Font Awesome -->
<script src="../kusina/fonts/fontawesome/js/all.js"></script>

<script type="text/javascript">
    
    $(document).ready(function(e){

           $('#reservationForm').submit(function(e) {
            e.preventDefault();
            
            var name = $('#name').val();
            var capacity = $('#capacity').val();
            var book_time_from = $('#book_time_from').val();
            var book_time_to = $('#book_time_to').val();

            var form_data = new FormData(); // Create a FormData object

            form_data.append('name', name); // Append all element in FormData  object 
            form_data.append('capacity', capacity);
            form_data.append('book_time_from', book_time_from);
            form_data.append('book_time_to', book_time_to);

            $.ajax({
                url: 'table-reservation-ajax.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response) {
                    if (response !== 0) {
                        alert(response);
                       /* Swal.fire("Done!", "Review Added Successfully", "success");
                        $('#name').val('');
                        $('#position').val('');
                        $('#review').val('');
                        $('#imageDiv #image').val('');
                        $('#imageDiv img').prop('src', '');*/
                    } else {
                        Swal.fire({
                            type: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!'
                        })
                    }
                }
            });
            $('#imageDiv #image').val('');
            $('#imageDiv img').prop('src', ''); /* Clear the input type file */
        });

           $("#image").change(function(e) {
                $("#imageDiv img").hide();

            for (var i = 0; i < e.originalEvent.srcElement.files.length; i++) {

                var file = e.originalEvent.srcElement.files[i];

                var img = document.createElement("img");
                var reader = new FileReader();
                reader.onloadend = function() {
                    img.src = reader.result;
                }
                reader.readAsDataURL(file);
                $("#image").after(img);

            }
        });
        //-------------

        $('#postReviewForm').submit(function(e) {
            e.preventDefault();
            
            var name = $('#name').val();
            var position = $('#position').val();
            var review = $('#review').val();
            var file_data = $('#image').prop('files')[0];

            var form_data = new FormData(); // Create a FormData object

            form_data.append('name', name); // Append all element in FormData  object 
            form_data.append('position', position);
            form_data.append('review', review);
            form_data.append('file', file_data);
            
            alert(form_data);
            
            $.ajax({
                url: 'post-review-ajax.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response) {
                   $('#beforeReview').hide();
                $('#afterReview').fadeIn(400);
                setTimeout(function() {
                    $('form').trigger("reset");
                    $('#afterReview').hide();
                    $('#beforeReview').fadeIn(400);
                }, 1500);
                }
            });
            $('#imageDiv #image').val('');
            $('#imageDiv img').prop('src', ''); /* Clear the input type file */
        });
        
    })

    
    

</script>


</body>

</html>
