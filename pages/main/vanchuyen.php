<div class="container">
    <!-- Responsive Arrow Progress Bar -->
    <div class="arrow-steps clearfix">
        <div class="step done"> <span> <a href="index.php?quanly=giohang">Gio Hang</a></span> </div>
        <div class="step current"> <span><a href="index.php?quanly=vanchuyen">Van Chuyen</a></span> </div>
        <div class="step "> <span><a href="index.php?quanly=thongtinthanhtoan">Thanh Toan</a><span> </div>
        <div class="step "> <span><a href="index.php?quanly=donhangdadat">Lich Su Don Hang</a><span> </div>
    </div>
    <!-- end Responsive Arrow Progress Bar -->
    <h4>Thong Tin Van Chuyen</h4>
    <?php
    if (isset($_POST['themvanchuyen'])) {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $note = $_POST['note'];
        $id_dangky = $_SESSION['id_khachhang'];
        $sql_them_vanchuyen = mysqli_query($mysqli, "INSERT INTO tbl_shipping(name,phone,address,note,id_dangky)
        VALUES ('$name','$phone','$address','$note','$id_dangky')
        ");
        if ($sql_them_vanchuyen) {
            echo '<script>alert("Them van chuyen thanh cong")</script>';
        }
    } elseif (isset($_POST['capnhatvanchuyen'])) {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $note = $_POST['note'];
        $id_dangky = $_SESSION['id_khachhang'];
        $sql_update_vanchuyen = mysqli_query($mysqli, "UPDATE tbl_shipping SET
         name='$name',phone='$phone',address='$address',note='$note',id_dangky='$id_dangky' WHERE id_dangky='$id_dangky'
        ");
        if ($sql_update_vanchuyen) {
            echo '<script>alert("Cap nhat van chuyen thanh cong")</script>';
        }
    }
    ?>
    <div class="row">>
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
        <div class="col-md-12" style="margin-bottom: 50px">
            <form action="" autocomplete="off" method="POST">
                <div class="form-group">
                    <label for="email">Ten Khach Hang</label>
                    <input type="text" name="name" value="<?php echo $name ?>" class="form-control" placeholder="...">
                </div>
                <div class="form-group">
                    <label for="email">Dien Thoai</label>
                    <input type="text" name="phone" value="<?php echo $phone ?>" class="form-control" placeholder="...">
                </div>
                <div class="form-group">
                    <label for="email">Dia chi</label>
                    <input type="text" name="address" value="<?php echo $address ?>" class="form-control" placeholder="...">
                </div>
                <div class="form-group">
                    <label for="email">Ghi Chu</label>
                    <input type="text" name="note" value="<?php echo $note ?>" class="form-control" placeholder="...">
                </div>
                <?php
                if ($name == '' && $phone == '') {
                ?>
                    <button type="submit" name="themvanchuyen" class="btn btn-primary"> Them Van Chuyen</button>
                <?php
                } elseif ($name != '' && $phone != '') {
                ?>
                    <button type="submit" name="capnhatvanchuyen" class="btn btn-success"> Cap Nhat Van Chuyen</button>
                <?php
                }
                ?>
            </form>
        </div>
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
                <tr>
                    <td colspan="8">
                        <p>Tong Tien <?php echo number_format($tongtien, 0, ',', '.') . 'vnd'; ?></p>
                        <div style="clear: both;"></div>
                        <?php
                        if (isset($_SESSION['dangky'])) {
                        ?>
                            <p><a href="index.php?quanly=thongtinthanhtoan">Hinh Thuc Thanh Toan</a></p>
                        <?php
                        } else {
                        ?>
                            <p><a href="index.php?quanly=dangky">Dang Ky Dat Hang</a></p>
                        <?php
                        }
                        ?>

                    </td>
                </tr>
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
</div>