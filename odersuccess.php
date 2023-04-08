<?php
include 'inc/header.php';
// include 'inc/slider.php';
?>
<?php

if (isset($_GET['orderid']) && $_GET['orderid'] == 'order') {
    $customer_id = Session::get('customer_id');
    $insertOrder = $ct->insertOrder($customer_id);
    $delCart = $ct->del_all_data_cart();
    header('Location:success.php');
}
?>
<style type="text/css">
    h2.success_order {
        text-align: center;
        color: red;
    }

    p.success_note {
        text-align: center;
        padding: 8px;
        font-size: 17px;
    }
</style>
<form action="" method="POST">
    <div class="main">
        <div class="content">
            <div class="section group">
                <h2 class="success_order">Thanh Toán Thành Công</h2>
                <?php
                $customer_id = Session::get('customer_id');
                $get_amount = $ct->getAmountPrice($customer_id);
                if ($get_amount) {

                    while ($result = $get_amount->fetch_assoc()) {
                        $price = $result['price'];
                    }
                }
                ?>
                <p class="success_note">Tổng Tiền Đã Thanh Toán : <?php
                                                                    $vat = $price * 0.1;
                                                                    $total = $vat + $price;
                                                                    echo $fm->format_currency($total) . ' VNĐ';
                                                                    ?> </p>
                <p class="success_note">Đặt hàng thành công.<a href="orderdetails.php">Click Here</a> Để Xem Chi Tiết đơn đặt vé</p>
            </div>

        </div>

    </div>
</form>
<?php
include 'inc/footer.php';

?>