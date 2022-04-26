<?php
if (isset($_POST['dangky'])) {
    $tenkhachhang = $_POST['hovaten'];
    $email = $_POST['email'];
    $dienthoai = $_POST['dienthoai'];
    $matkhau = md5($_POST['matkhau']);
    $diachi = $_POST['diachi'];
    $sql_dangky = mysqli_query($mysqli, "INSERT INTO 
    tbl_dangky(tenkhachhang,email,diachi,matkhau,dienthoai) 
    VALUE('" . $tenkhachhang . "','" . $email . "','" . $diachi . "','" . $matkhau . "','" . $dienthoai . "')");
    if ($sql_dangky) {
        header('Location:index.php?quanly=giohang');
        echo '<p style="color: Green"> Ban da dang ky thanh cong</p>';
        $_SESSION['dangky'] = $tenkhachhang;
        $_SESSION['email'] = $email;
        $_SESSION['id_khachhang'] = mysqli_insert_id($mysqli);
        
    }
}
?>
<p>Dang Ky Thanh vien</p>
<style type="text/css">
    table.dangky tr td {
        padding: 5px;
    }
</style>
<form action="#" method="POST">
    <table class="dangky" border="1" width="50%" style="border-collapse: collapse;">
        <tr>
            <td>Ho Va Ten</td>
            <td><input type="text" size="50" name="hovaten"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" size="50" name="email"></td>
        </tr>
        <tr>
            <td>Dien Thoai</td>
            <td><input type="text" size="50" name="dienthoai"></td>
        </tr>
        <tr>
            <td>Dia Chi</td>
            <td><input type="text" size="50" name="diachi"></td>
        </tr>
        <tr>
            <td>Mat Khau</td>
            <td><input type="text" size="50" name="matkhau"></td>
        </tr>
        <tr>
            <td><input type="submit" name="dangky" value="Dang Ky"></td>
            <td><a href="index.php?quanly=dangnhap">Dang Nhap Neu Co Tai Khoan</a></td>
        </tr>
    </table>
</form>