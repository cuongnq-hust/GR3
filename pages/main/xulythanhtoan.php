<?php
session_start();
include("../../admincp/config/config.php");
require('../../mail/sendmail.php');
require('../../carbon/autoload.php');

use Carbon\Carbon;
use Carbon\CarbonInterval;

$now = Carbon::now('Asia/Ho_Chi_minh');
$id_khachhang = $_SESSION['id_khachhang'];
$code_order = rand(0, 9999);
$cart_payment = $_POST['payment'];
$id_dangky = $_SESSION['id_khachhang'];
$sql_get_vanchuyen = mysqli_query($mysqli, "SELECT * FROM tbl_shipping WHERE 
id_dangky='$id_dangky' LIMIT 1");
$row_get_vanchuyen = mysqli_fetch_array($sql_get_vanchuyen);
$id_shipping = $row_get_vanchuyen['id_shipping'];

$insert_cart = "INSERT INTO tbl_cart(id_khachhang,code_cart,cart_status,cart_date,cart_payment,cart_shipping) 
VALUE
('" . $id_khachhang . "',
'" . $code_order . "',
'1',
'" . $now . "',
'" . $cart_payment . "',
'" . $id_shipping . "')";

$cart_query = mysqli_query($mysqli, $insert_cart);
if ($cart_query) {
    foreach ($_SESSION['cart'] as $key => $value) {
        $id_sanpham = $value['id'];
        $soluong = $value['soluong'];
        $insert_order_details = "INSERT INTO tbl_cart_details(id_sanpham,code_cart,soluongmua) 
        VALUE('" . $id_sanpham . "','" . $code_order . "','" . $soluong . "')";
        mysqli_query($mysqli, $insert_order_details);
    }
    $tieude = "Dat Hang Web Thanh Cong";
    $noidung = "<p>Cam on quy khach da dat hang voi ma don hang: " . $code_order . "</p>";
    $noidung .= "<h4>Don Hang Bao Gom: </h4>";
    foreach ($_SESSION['cart'] as $key => $val) {
        $noidung .= "<ul style='border: 1px solid blue; margin: 10px'>
        <li>" . $val['tensanpham'] . "</li>
        <li>" . $val['masp'] . "</li>
        <li>" . number_format($val['giasp'], 0, ',', '.') . "</li>
        <li>" . $val['soluong'] . "</li>
        </ul>";
    }

    $maildathang = $_SESSION['email'];
    $mail = new Mailer();
    $mail->dathangmail($tieude, $noidung, $maildathang);
}
unset($_SESSION['cart']);
header('Location:../../index.php?quanly=camon');
