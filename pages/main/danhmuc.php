<?php
$sql_pro = "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_danhmuc='$_GET[id]' ORDER BY id_sanpham DESC";
$query_pro = mysqli_query($mysqli, $sql_pro);
$sql_cate = "SELECT * FROM tbl_danhmuc WHERE tbl_danhmuc.id_danhmuc='$_GET[id]' LIMIT 1";
$query_cate = mysqli_query($mysqli, $sql_cate);
$row_title =  mysqli_fetch_array($query_cate);
?>
<h3>Danh muc san pham :<span style="text-align: center; text-transform: uppercase"><?php echo $row_title['tendanhmuc']?></span> </h3>

<div class="row">
    <?php
    while ($row = mysqli_fetch_array($query_pro)) {
    ?>
        <div class="col-md-2" style="text-align: center;">
            <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
                <img class="img img-responsive" width="150px" height="150px" src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>">
                <p class="title_product">Ten san pham: <?php echo $row['tensanpham'] ?></p>
                <p class="price_product">Gia: <?php echo number_format($row['giasp'], 0, ',', '.') . 'vnd' ?></p>
            </a>
        </div>
    <?php
    }
    ?>
</div>