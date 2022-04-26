<?php
if(isset($_POST['timkiem'])){
    $tukhoa = $_POST['tukhoa'];  
}
$sql_pro = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc AND tbl_sanpham.tensanpham LIKE '%".$tukhoa."%'";
$query_pro = mysqli_query($mysqli, $sql_pro);
?>
<h3>Tu Khoa Tim Kiem: <?php echo $_POST['tukhoa']?></h3>
<div class="row">
    <?php
    while ($row = mysqli_fetch_array($query_pro)) {
    ?>
        <div class="col-md-2" style="text-align: center;">
            <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
                <img width="150px" height="150px" src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh']?>">
                <p class="title_product">Ten san pham: <?php echo $row['tensanpham'] ?></p>
                <p class="price_product">Gia: <?php echo number_format($row['giasp'], 0, ',', '.') . 'vnd' ?></p>
                <p style="color: blue"><?php echo $row['tendanhmuc'] ?></p>
            </a>
        </div>
    <?php
    }
    ?>
</div>