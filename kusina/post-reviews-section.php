<style>
        #imageDiv img {
            width: 80px;
            z-index: 999999999;
        }

        #imageDiv #tempImg {
            width: 80px;
        }

    </style>
<section class="ftco-section ftco-no-pt ftco-no-pb">
    <div class="container">
        <div class="row d-flex">
            <div class="col-md-5 ftco-animate img img-2" style="background-image: url(images/bg_6.jpg);"></div>
            <div class="col-md-7 ftco-animate makereservation p-4 p-md-5">
                <div class="heading-section ftco-animate mb-5">
                    <span class="subheading">Loved our Service?</span>
                    <h2 class="mb-4">Post a Review</h2>
                </div>
                <form id="postReviewForm" action="">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" required="required" id="name" class="form-control" placeholder="Your Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Designation</label>
                                <input type="text" class="form-control" id="position" placeholder="Your Designation">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Image">Image</label>
                                <div class="col-sm-12" id="imageDiv">
                                    <input type="file" class="form-control" required="required" accept="image/*" id="image">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="Review">Review</label>
                                <textarea cols="30" rows="7" maxlength="250" class="form-control" required="required" placeholder="Review (less than 250 characters)" id="review"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 mt-3">
                            <div class="form-group">
                                <btn class="btn btn-success py-3 px-5" id="afterReview" style="display:none;"><i class="fa fa-check-circle"></i> Review Posted</btn>
                        <input type="submit" name="submit" value="Post Review" id="beforeReview" class="btn btn-primary py-3 px-5">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
