<?php
include 'header.php';
?>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">


        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="info-box blue-bg">
                    <i class="fa fa-cloud-download"></i>
                    <div class="count">6.674</div>
                    <div class="title">Download</div>
                </div>
                <!--/.info-box-->
            </div>
            <!--/.col-->

            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="info-box brown-bg">
                    <i class="fa fa-shopping-cart"></i>
                    <div class="count">7.538</div>
                    <div class="title">Purchased</div>
                </div>
                <!--/.info-box-->
            </div>
            <!--/.col-->

            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="info-box dark-bg">
                    <i class="fa fa-thumbs-o-up"></i>
                    <div class="count">4.362</div>
                    <div class="title">Order</div>
                </div>
                <!--/.info-box-->
            </div>
            <!--/.col-->

            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="info-box green-bg">
                    <i class="fa fa-cubes"></i>
                    <div class="count">1.426</div>
                    <div class="title">Stock</div>
                </div>
                <!--/.info-box-->
            </div>
            <!--/.col-->

        </div>
        <!--/.row-->


        <div class="col-md-6 portlets">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="pull-left">Add Item</div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                    <div class="padd">

                        <div class="form quick-post">
                            <!-- Edit profile form (not working)-->
                            <form class="form-horizontal">
                                <!-- Title -->
                                <div class="form-group">
                                    <label class="control-label col-lg-2" for="title">Name</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" name="title" id="title">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-2" for="price">Price</label>
                                    <div class="col-lg-10">
                                        <input type="number" class="form-control" name="price" id="price">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-2" for="qty">Quantity</label>
                                    <div class="col-lg-10">
                                        <input type="number" class="form-control" name="qty" id="qty">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-2">Category</label>
                                    <div class="col-lg-10">
                                        <select class="form-control">
                                            <option value="">- Choose Category -</option>
                                            <option value="Food">Food</option>
                                            <option value="Drink">Drink</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-9">
                                        <button type="submit" class="btn btn-primary">Publish</button>
                                        <button type="reset" class="btn btn-default">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>


                    </div>
                    <div class="widget-foot">
                        <!-- Footer goes here -->
                    </div>
                </div>
            </div>

        </div>

        </div>
        <!-- project team & activity end -->

    </section>

</section>
<!--main content end-->
</section>
<!-- container section start -->

<?php
include 'footer.php';