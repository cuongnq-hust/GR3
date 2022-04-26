<p>Chi Tiet San Pham</p>
<?php
$sql_chitiet = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc
AND tbl_sanpham.id_sanpham='$_GET[id]' LIMIT 1";
$query_chitiet = mysqli_query($mysqli, $sql_chitiet);
while ($row_chitiet = mysqli_fetch_array($query_chitiet)) {
?>
    <div class="wrapper_chitiet">
        <div class="hinhanh_sanpham">
            <img width="80%" src="admincp/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh'] ?>">
        </div>
        <form method="POST" action="pages/main/themgiohang.php?idsanpham=<?php echo $row_chitiet['id_sanpham'] ?>">
            <div class="chitiet_sanpham">
                <h3>Ten San Pham: <?php echo $row_chitiet['tensanpham'] ?></h3>
                <p>Ma sp: <?php echo $row_chitiet['masp'] ?></p>
                <p>Gia: <?php echo number_format($row_chitiet['giasp'], 0, ',', '.') . 'vnd' ?></p>
                <p>So Luong sp: <?php echo $row_chitiet['soluong'] ?></p>
                <p>Danh Muc sp: <?php echo $row_chitiet['tendanhmuc'] ?></p>
                <p> <input class="themgiohang" name="themgiohang" type="submit" value="Them Gio Hang"></p>
            </div>
        </form>
    </div>
    <div class="clear">
        <div class="tabs">
            <ul id="tabs-nav">
                <li><a href="#tab1">Noi Dung Chi Tiet</a></li>
                <li><a href="#tab2">Thong So Ky Thuat</a></li>
                <li><a href="#tab3">Hinh Anh</a></li>

            </ul> <!-- END tabs-nav -->
            <div id="tabs-content">
                <div id="tab1" class="tab-content">
                    <?php echo $row_chitiet['noidung'] ?>
                </div>
                <div id="tab2" class="tab-content">
                    <?php echo $row_chitiet['tomtat'] ?>
                </div>
                <div id="tab3" class="tab-content" style="text-align: center;">
                    <img width="30%" src="admincp/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh'] ?>">
                </div>
            </div> <!-- END tabs-content -->
        </div> <!-- END tabs -->
    </div>
<?php
}
?>