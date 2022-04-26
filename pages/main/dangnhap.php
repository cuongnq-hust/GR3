<?php
if (isset($_POST['dangnhap'])) {
    $email = $_POST['email'];
    $matkhau = md5($_POST['password']);
    $sql = "SELECT * FROM tbl_dangky WHERE email='" . $email . "' AND matkhau='" . $matkhau . "' LIMIT 1";
    $row = mysqli_query($mysqli, $sql);
    $count = mysqli_num_rows($row);
    if ($count > 0) {
        header('Location:../../index.php?quanly=camon');
        $row_data = mysqli_fetch_array($row);
        $_SESSION['dangky'] = $row_data['tenkhachhang'];
        $_SESSION['email'] = $row_data['email'];
        $_SESSION['id_khachhang'] = $row_data['id_dangky'];
        
    } else {
        echo '<p style="color: red"> Mat Khau Hoac Email Sai</p>';
    }
}
?>
<form action="" method="POST" autocomplete="off">
    <table border="1" width="50%" class="table-login" style="text-align: center; border-collapse: collapse">
        <tr>
            <td colspan="2">
                <h3>Dang nhap Khach Hang</h3>
            </td>
        </tr>
        <tr>
            <td>Tai Khoan</td>
            <td><input type="text" size="50" name="email" placeholder="Email..."></td>
        </tr>
        <tr>
            <td>Mat Khau</td>
            <td><input type="password" size="50" name="password" placeholder="Mat Khau..."></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="dangnhap" value="Dang Nhap"></td>
        </tr>
    </table>
</form>