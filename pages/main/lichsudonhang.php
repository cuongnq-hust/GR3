<p>Lich su don hang</p>
<?php
$id_khachhang = $_SESSION['id_khachhang'];
$sql_lietke_dh = "SELECT * FROM tbl_cart,tbl_dangky WHERE tbl_cart.id_khachhang=tbl_dangky.id_dangky 
AND tbl_cart.id_khachhang='$id_khachhang'
ORDER BY tbl_cart.id_cart DESC";
$query_lietke_dh = mysqli_query($mysqli, $sql_lietke_dh);
?>
<table style="width: 100%" border="1" style="border-collapse: collapse;">
  <tr>
    <th>ID</th>
    <th>Ma don hang</th>
    <th>Ten Khach Hang</th>
    <th>Dia Chi</th>
    <th>Email</th>
    <th>So Dien Thoai</th>
    <th>Tinh Trang</th>
    <th>Ngay Dat</th>
    <th>Quan Ly</th>
    <th>In</th>
    <th>Hinh thuc thanh toan</th>


  </tr>
  <?php
  $i = 0;
  while ($row = mysqli_fetch_array($query_lietke_dh)) {
    $i++;
  ?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $row['code_cart'] ?></td>
      <td><?php echo $row['tenkhachhang'] ?></td>
      <td><?php echo $row['diachi'] ?></td>
      <td><?php echo $row['email'] ?></td>
      <td><?php echo $row['dienthoai'] ?></td>
      <td><?php if ($row['cart_status'] == 1) {
            echo '<p>Don Hang Moi</p>';
          } else {
            echo 'Da xem';
          } ?></td>
      <td><?php echo $row['cart_date'] ?></td>

      <td>
        <a href="index.php?quanly=xemdonhang&code=<?php echo $row['code_cart'] ?>">Xem don hang</a>
      </td>
      <td>
        <a href="admincp/modules/quanlydonhang/indonhang.php?code=<?php echo $row['code_cart'] ?>">In Don Hang</a>
      </td>
      <td>
          <?php
          if($row['cart_payment']=='vnpay' || $row['cart_payment'] == 'momo'  || $row['cart_payment']=='paypal'){
          ?>
          <a href=""><?php echo $row['cart_payment'] ?></a>
          <?php
          }else{
              ?>
              <?php echo $row['cart_payment'] ?>
          <?php
          }
          ?>
          </td>
    </tr>
  <?php
  }
  ?>

</table>