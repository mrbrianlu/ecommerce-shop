<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="page-title text-center">
                    <h2>SHOP</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcumb Area End ##### -->

<!-- ##### Shop Grid Area Start ##### -->
<section class="shop_grid_area section-padding-80">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 col-lg-3">
                <div class="shop_sidebar_area">

                    <!-- ##### Single Widget ##### -->
                    <div class="widget catagory mb-50">
                        <!-- Widget Title -->
                        <h6 class="widget-title mb-30">Catagories</h6>

                        <!--  Catagories  -->
                        <div class="catagories-menu">
                            <ul id="menu-content2" class="menu-content collapse show">
                                <!-- Single Item -->
                                <?php foreach ($categories as $category) : ?>
                                    <li>
                                        <a href="?category_id=<?php echo $category['categoryID']; ?>">
                                            <?php echo $category['categoryName']; ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-8 col-lg-9">
                <!-- ##### Single Product Details Area Start ##### -->
                <section class="single_product_details_area d-flex align-items-center">

                    <!-- Single Product Thumb -->
                    <div class="single_product_thumb clearfix">
                        <img src="<?php echo $image_filename; ?>" alt="<?php echo $image_alt; ?>">
                    </div>

                    <!-- Single Product Description -->
                    <div class="single_product_desc clearfix">
                        <h2><?php echo $name; ?></h2>
                        <p class="product-price">$<?php echo $list_price; ?></p>

                        <!-- Form -->
                        <form action="." class="cart-form clearfix" method="post">
                            <!-- Select Box -->
                            <div class="select-box d-flex mt-50 mb-30">
                                <input type="hidden" name="action" value="add">
                                <input type="hidden" name="product_id"
                                       value="<?php echo $product_id; ?>">
                                <b>Quantity: &nbsp;</b>
                                <input id="quantity" type="text" name="quantity" 
                                       value="1" size="5">
                            </div>
                            <!-- Cart-->
                            <div class="cart-fav-box d-flex align-items-center">
                                <!-- Cart -->
                                <button type="submit" name="addtocart" value="5" class="btn essence-btn">Add to cart</button>
                            </div>
                        </form>
                    </div>
                </section>
                <!-- ##### Single Product Details Area End ##### -->
            </div>
        </div>
    </div>
</section>
<!-- ##### Shop Grid Area End ##### -->
