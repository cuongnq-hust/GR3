<?php
if (isset($_POST['doimatkhau'])) {
    $taikhoan = $_POST['email'];
    $matkhau_cu = md5($_POST['password_cu']);
    $matkhau_moi = md5($_POST['password_moi']);
    $sql = "SELECT * FROM tbl_dangky WHERE email='" . $taikhoan . "' AND matkhau='" . $matkhau_cu . "' LIMIT 1";
    $row = mysqli_query($mysqli, $sql);
    $count = mysqli_num_rows($row);
    if ($count > 0) {
        $sql_update = mysqli_query($mysqli, "UPDATE tbl_dangky SET matkhau='".$matkhau_moi."'");
        echo '<p style="color: green">"Mat khau da thay doi"</p>';
    } else {
        echo '<p style="color: red">"Tai Khoan hoac mat khau cu khong dung"</p>';
    }
}
?>
<form action="" method="POST" autocomplete="off">
            <table border="1" class="table-login" style="text-align: center; border-collapse: collapse">
                <tr>
                    <td colspan="2">
                        <h3>Doi Mat Khau Admin</h3>
                    </td>
                </tr>
                <tr>
                    <td>Tai Khoan</td>
                    <td><input type="text" name="email"></td>
                </tr>
                <tr>
                    <td>Mat Khau Cu</td>
                    <td><input type="text" name="password_cu"></td>
                </tr>
                <tr>
                    <td>Mat Khau Moi</td>
                    <td><input type="text" name="password_moi"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="doimatkhau" value="Doi Mat Khau"></td>
                </tr>
            </table>
        </form>