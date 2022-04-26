<p>Them bai viet</p>
<table border="1" width="100%" style="border-collapse: collapse;">
    <form method="POST" action="modules/quanlybaiviet/xuly.php" enctype="multipart/form-data">
        <tr>
            <td>Ten bai viet</td>
            <td><input type="text" name="tenbaiviet"></td>
        </tr>
        <tr>
            <td>Noi Dung</td>
            <td><textarea rows="10" name="noidung" style="resize: none"></textarea></td>
        </tr>
        <tr>
            <td>Hinh Anh</td>
            <td><input type="file" name="hinhanh"></td>
        </tr>
        <tr>
            <td>Tom Tat</td>
            <td><textarea rows="10" name="tomtat" style="resize: none"></textarea></td>
        </tr>
        <tr>
            <td>Danh muc baiviet</td>
            <td>
                <select name="danhmuc">
                    <?php
                    $sql_danhmuc = "SELECT * FROM tbl_danhmucbaiviet ORDER BY id_baiviet DESC";
                    $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
                    while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                    ?>
                        <option value=" <?php echo $row_danhmuc['id_baiviet'] ?>">
                            <?php echo $row_danhmuc['tendanhmuc_baiviet'] ?>
                        </option>
                    <?php
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Tinh Trang</td>
            <td>
                <select name="tinhtrang">
                    <option value="1">
                        Kich Hoat
                    </option>
                    <option value="0">
                        An
                    </option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="thembaiviet" value="Them bai viet"></td>
        </tr>
    </form>
</table>