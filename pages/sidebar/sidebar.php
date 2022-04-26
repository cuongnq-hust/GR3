    <h4>Danh Muc San Pham</h4>
    <ul class="list_sidebar">
        <?php
        $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
        $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
        while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
        ?>
            <li style="text-transform: uppercase"><a href="index.php?quanly=danhmucsanpham&id=<?php echo $row_danhmuc['id_danhmuc'] ?>">
                    <?php echo $row_danhmuc['tendanhmuc'] ?></a></li>
        <?php
        }
        ?>
    </ul>
    <h4>Danh Muc Bai Viet</h4>
    <ul class="list_sidebar">
        <?php
        $sql_danhmuc_bv = "SELECT * FROM tbl_danhmucbaiviet ORDER BY id_baiviet DESC";
        $query_danhmuc_bv = mysqli_query($mysqli, $sql_danhmuc_bv);
        while ($row_danhmuc = mysqli_fetch_array($query_danhmuc_bv)) {
        ?>
            <li style="text-transform: uppercase"><a href="index.php?quanly=danhmucbaiviet&id=<?php echo $row_danhmuc['id_baiviet'] ?>">
                    <?php echo $row_danhmuc['tendanhmuc_baiviet'] ?></a></li>
        <?php
        }
        ?>
    </ul>