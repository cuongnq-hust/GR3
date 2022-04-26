<p>
    <?php
    if (isset($_SESSION['dangky'])) {
        echo 'Xin Chao: ' . '<span style="color: red">' . $_SESSION['dangky'] . '</span>';
    }
    ?>
</p>
<?php
if (isset($_SESSION['cart'])) {
}
?>
<div class="container">
    <!-- Responsive Arrow Progress Bar -->
    <div class="arrow-steps clearfix">
        <div class="step current"> <span> <a href="index.php?quanly=giohang">Gio Hang</a></span> </div>
        <div class="step"> <span><a href="index.php?quanly=vanchuyen">Van Chuyen</a></span> </div>
        <div class="step"> <span><a href="index.php?quanly=thongtinthanhtoan">Thanh Toan</a><span> </div>
        <div class="step"> <span><a href="index.php?quanly=donhangdadat">Lich Su Don Hang</a><span> </div>
    </div>
    <!-- end Responsive Arrow Progress Bar -->
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
        <td>Quan Ly</td>
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
                <td><a href="pages/main/themgiohang.php?xoa=<?php echo $cart_item['id'] ?>">Xoa</a></td>
            </tr>
        <?php
        }
        ?>
        <tr>
            <td colspan="8">
                <p>Tong Tien <?php echo number_format($tongtien, 0, ',', '.') . 'vnd'; ?></p>
                <p><a href="pages/main/themgiohang.php?xoatatca=1">Xoa tat ca</a></p>
                <div style="clear: both;"></div>
                <?php
                if (isset($_SESSION['dangky'])) {
                ?>
                    <p><a href="index.php?quanly=vanchuyen">Hinh Thuc Van Chuyen</a></p>
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