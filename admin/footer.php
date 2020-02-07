    <footer class="footer">
        © 2020 | Made with <i class="fa fa-heart" style="color: #ff3944;"></i> by Raja Aakash Rathore
    </footer>

    <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/node_modules/popper/popper.min.js"></script>
    <script src="../assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="dist/js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Font Awesome -->
    <script src="../kusina/fonts/fontawesome/js/all.js"></script>
    <!--stickey kit -->
    <script src="../assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="../assets/node_modules/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <script src="../assets/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--morris JavaScript -->
    <script src="../assets/node_modules/raphael/raphael-min.js"></script>
    <script src="../assets/node_modules/morrisjs/morris.min.js"></script>
    <!-- Sweet-Alert  -->
    <script src="../assets/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="../assets/node_modules/sweetalert2/sweet-alert.init.js"></script>
    <!-- Toaster Notification -->
    <script src="../assets/node_modules/toast-master/js/jquery.toast.js"></script>
    <!-- Clock Plugin JavaScript -->
    <script src="../assets/node_modules/clockpicker/dist/jquery-clockpicker.min.js"></script>
    <!-- Bootstrap Select Picker -->
    <script src="../assets/node_modules/bootstrap-select/bootstrap-select.min.js"></script>
    <script src="../assets/node_modules/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
    <!-- This is data table -->
    <script src="../assets/node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/ecom-dashboard.js"></script>
    <script src="dist/js/pages/jquery.PrintArea.js" type="text/JavaScript"></script>
    <script src="dist/js/data-tables-init.js"></script>
    <script src="dist/js/check-messages.js"></script>
    <!-- This page plugins -->
    <!-- ============================================================== -->
    </body>

    </html>

    <script type="text/javascript">
        $(document).ready(function(e) {
            
            $('#activeClassAdd').click(function() {
                this.addClass = "active";
            });

            //DELETE MESSAGE CODE
            $(".dlt-message").click(function() {
                var id = $(this).attr('data-url');
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'mr-2 btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false,
                })

                swalWithBootstrapButtons.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: false
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            type: 'POST',
                            data: {
                                message_id: id
                            },
                            url: "view-messages.php",
                            success: function(data) {}
                        });
                        swalWithBootstrapButtons.fire(
                            'Deleted!',
                            'Your Message has been deleted.',
                            'success'
                        ).then(function() {
                            window.location = "view-messages.php";
                        })
                    } else if (
                        // Read more about handling dismissals
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire(
                            'Cancelled',
                            'Your Message is safe :)',
                            'error'
                        )
                    }
                })
            });

            //DELETE REVIEW CODE
            $(".dlt-review").click(function() {
                var id = $(this).attr('data-url');
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'mr-2 btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false,
                })

                swalWithBootstrapButtons.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: false
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            type: 'POST',
                            data: {
                                review_id: id
                            },
                            url: "view-reviews.php",
                            success: function(data) {}
                        });
                        swalWithBootstrapButtons.fire(
                            'Deleted!',
                            'Your Review has been deleted.',
                            'success'
                        ).then(function() {
                            window.location = "view-reviews.php";
                        })
                    } else if (
                        // Read more about handling dismissals
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire(
                            'Cancelled',
                            'Your Review is safe :)',
                            'error'
                        )
                    }
                })
            });

            //DELETE CHEF CODE
            $(".dlt-chef").click(function() {
                alert(id);

                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'mr-2 btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false,
                })

                swalWithBootstrapButtons.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: false
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            type: 'POST',
                            data: {
                                chef_id: id
                            },
                            url: "view-chefs.php",
                            success: function(data) {}
                        });
                        swalWithBootstrapButtons.fire(
                            'Deleted!',
                            'Your Chef has been deleted.',
                            'success'
                        ).then(function() {
                            window.location = "view-chefs.php";
                        })
                    } else if (
                        // Read more about handling dismissals
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire(
                            'Cancelled',
                            'Your Chef is safe :)',
                            'error'
                        )
                    }
                })
            });

            //DELETE CATEGORY CODE
            $(".dlt-category").click(function() {
                var id = $(this).attr('data-url');

                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'mr-2 btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false,
                })

                swalWithBootstrapButtons.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: false
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            type: 'POST',
                            data: {
                                category_id: id
                            },
                            url: "categories.php",
                            success: function(data) {}
                        });
                        swalWithBootstrapButtons.fire(
                            'Deleted!',
                            'Your Cateogry has been deleted.',
                            'success'
                        ).then(function() {
                            window.location = "categories.php";
                        })
                    } else if (
                        // Read more about handling dismissals
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire(
                            'Cancelled',
                            'Your Cateogry is safe :)',
                            'error'
                        )
                    }
                })
            });

            //DELETE CATEGORY CODE
            $(".dlt-table").click(function() {
                var id = $(this).attr('data-url');

                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'mr-2 btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false,
                })

                swalWithBootstrapButtons.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: false
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            type: 'POST',
                            data: {
                                table_id: id
                            },
                            url: "tables.php",
                            success: function(data) {}
                        });
                        swalWithBootstrapButtons.fire(
                            'Deleted!',
                            'Your Table has been deleted.',
                            'success'
                        ).then(function() {
                            window.location = "tables.php";
                        })
                    } else if (
                        // Read more about handling dismissals
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire(
                            'Cancelled',
                            'Your Table is safe :)',
                            'error'
                        )
                    }
                })
            });


            //DELETE ITEM CODE
            $(".dlt-item").click(function() {
                var string = $(this).attr('data-url');
                var fields = string.split(/&/);

                var item_id = fields[0];
                var c_id = fields[1];

                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'mr-2 btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false,
                })

                swalWithBootstrapButtons.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: false
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            type: 'POST',
                            data: {
                                item_id: item_id
                            },
                            url: "view-items.php?c_id=" + c_id,
                            success: function(data) {}
                        });
                        swalWithBootstrapButtons.fire(
                            'Deleted!',
                            'Your Item has been deleted.',
                            'success'
                        ).then(function() {
                            window.location = "view-items.php?c_id=" + c_id;
                        })
                    } else if (
                        // Read more about handling dismissals
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire(
                            'Cancelled',
                            'Your Item is safe :)',
                            'error'
                        )
                    }
                })
            });
            //DELETE ITEM CODE

        
            //---------------------------------------------------
            //---------------------------------------------------


            /*
                    // UPDATE CATEGORIES CODE     
                        setInterval(function(){
                          $('#CategoriesContent').load("checkCategories.php").fadeIn(1000);
                        }, 5000 );  
            */

        });

    </script>
