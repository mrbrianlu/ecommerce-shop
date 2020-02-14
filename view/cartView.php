<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="page-title text-center">
                    <h2>CART</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcumb Area End ##### -->

<!--================Cart Area =================-->
<section>
    <div class="checkout_area section-padding-80">
        <div class="container">
            <div class="row">
                <?php
                if (empty($_SESSION['cart']) ||
                        count($_SESSION['cart']) == 0) :
                    ?>
                    <p>There are no items in your cart.
                        <br>
                        <a class="btn essence-btn" href=".?action=list_products">Continue Shopping</a>
                    </p>
                    
                <?php else: ?>
                    <form action="." method="post">
                        <input type="hidden" name="action" value="update">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Product</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($_SESSION['cart'] as $key => $item) :
                                    $cost = number_format($item['cost'], 2);
                                    $total = number_format($item['total'], 2);
                                    ?>
                                    <tr>
                                        <td>
                                            <div class="media">
                                                <div class="media-body">
                                                    <p><?php echo $item['name']; ?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h5>$<?php echo $cost; ?></h5>
                                        </td>
                                        <td>
                                            <div class="product_count">
                                                <input type="text" name="newqty[<?php echo $key; ?>]" id="sst" maxlength="6" value="<?php echo $item['qty']; ?>" title="Quantity:" class="input-text qty">
                                            </div>
                                        </td>
                                        <td>
                                            <h5>$<?php echo $total; ?></h5>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                <tr>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                        <h5>Subtotal</h5>
                                    </td>
                                    <td>
                                        <h5>$<?php echo get_subtotal(); ?></h5>
                                    </td>
                                </tr>


                                <tr class="out_button_area">
                                    <td>
                                        <input type="submit" value="Update Cart" class="btn essence-btn">
                                    </td>
                                    <td>
                                        <a class="btn essence-btn" href=".?action=empty_cart">Empty Cart</a>
                                    </td>
                                    <td>
                                        <a class="btn essence-btn" href=".?action=list_products">Continue Shopping</a>
                                    </td>
                                    <td>
                                        <a class="btn essence-btn" href=".?action=checkout">Proceed to checkout</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!--================End Cart Area =================-->