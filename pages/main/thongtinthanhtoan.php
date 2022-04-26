<div class="container">
    <div class="arrow-steps clearfix">
        <div class="step done"> <span> <a href="index.php?quanly=giohang">Gio Hang</a></span> </div>
        <div class="step done"> <span><a href="index.php?quanly=vanchuyen">Van Chuyen</a></span> </div>
        <div class="step current"> <span><a href="index.php?quanly=thongtinthanhtoan">Thanh Toan</a><span> </div>
        <div class="step "> <span><a href="index.php?quanly=donhangdadat">Lich Su Don Hang</a><span> </div>
    </div>
    <form action="pages/main/xulythanhtoan.php" method="POST">
        <div class="row">
            <?php
            $id_dangky = $_SESSION['id_khachhang'];
            $sql_get_vanchuyen = mysqli_query($mysqli, "SELECT * FROM tbl_shipping WHERE 
        id_dangky='$id_dangky' LIMIT 1");
            $count = mysqli_num_rows($sql_get_vanchuyen);
            if ($count > 0) {
                $row_get_vanchuyen = mysqli_fetch_array($sql_get_vanchuyen);
                $name = $row_get_vanchuyen['name'];
                $phone = $row_get_vanchuyen['phone'];
                $address = $row_get_vanchuyen['address'];
                $note = $row_get_vanchuyen['note'];
            } else {
                $name = '';
                $phone = '';
                $address = '';
                $note = '';
            }
            ?>
            <div class="col-md-8">
                <h4>Thong Tin Van Chuyen Va Gio Hang</h4>
                <ul>
                    <li>Ho va ten van chuyen: <b><?php echo $name ?></b></li>
                    <li>So Dien Thoai: <b><?php echo $phone ?></b></li>
                    <li>Dia chi: <b><?php echo $address ?></b></li>
                    <li>Ghi chu: <b><?php echo $note ?></b></li>
                </ul>
                <h5>Gio Hang Cua Ban</h5>
                <table style="width: 100%; text-align: center; border-collapse: collapse" border="1">
                    <tr>
                        <td>ID</td>
                        <td>Ma San Pham</td>
                        <td>Ten San Pham</td>
                        <td>Hinh Anh</td>
                        <td>So Luong</td>
                        <td>Gia San Pham</td>
                        <td>Thanh Tien</td>
                    </tr>
                    <?php
                    if (isset($_SESSION['cart'])) {
                        $i = 0;
                        $tongtien = 0;
                        foreach ($_SESSION['cart'] as $cart_item) {
                            $thanhtien = $cart_item['soluong'] * $cart_item['giasp'];
                            $tongtien += $thanhtien;
                            $i++;
                    ?>
                            <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $cart_item['masp'] ?></td>
                                <td><?php echo $cart_item['tensanpham'] ?></td>
                                <td><img src="admincp/modules/quanlysp/uploads/<?php echo $cart_item['hinhanh'] ?>" width="50px" height="50px"></td>
                                <td>
                                    <a href="pages/main/themgiohang.php?cong=<?php echo $cart_item['id'] ?>"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                    <?php echo $cart_item['soluong'] ?>
                                    <a href="pages/main/themgiohang.php?tru=<?php echo $cart_item['id'] ?>"><i class="fa fa-minus" aria-hidden="true"></i></a>
                                </td>
                                <td><?php echo number_format($cart_item['giasp'], 0, ',', '.') . 'vnd'; ?></td>
                                <td><?php echo number_format($thanhtien, 0, ',', '.') . 'vnd'; ?></td>
                            </tr>
                        <?php
                        }
                        ?>

                    <?php

                    } else {
                    ?>
                        <tr>
                            <td colspan="8">
                                <p>Hien tai gio hang trong</p>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
            <style type="text/css">
                .col-md-4.hinhthucthanhtoan .form-check {
                    margin: 11px;
                }
            </style>
            <div class="col-md-4 hinhthucthanhtoan">
                <h4>Hinh Thuc Thanh Toan</h4>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment" id="exampleRadios1" value="tien mat" checked>
                    <label class="form-check-label" for="exampleRadios1">
                        Tien Mat
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment" id="exampleRadios2" value="chuyen khoan">
                    <label class="form-check-label" for="exampleRadios2">
                        Chuyen Khoan
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment" id="exampleRadios3" value="momo">
                    <img src="images/momo.png" width="50px" height="50px">

                    <label class="form-check-label" for="exampleRadios3">
                        Momo
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment" id="exampleRadios4" value="vnpay">
                    <img src="images/vnpay.jpg" width="50px" height="50px">

                    <label class="form-check-label" for="exampleRadios4">
                        Vnpay
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment" id="exampleRadios5" value="paypal">
                    <img src="images/paypal.png" width="100px" height="50px">
                    <label class="form-check-label" for="exampleRadios5">
                        Paypal
                    </label>
                </div>
                <p>Tong Tien <?php echo number_format($tongtien, 0, ',', '.') . 'vnd'; ?></p>
                <input type="submit" value="Dat Hang" name="thanhtoanngay" class="btn btn-danger">
            </div>
        </div>
</div>
</form>