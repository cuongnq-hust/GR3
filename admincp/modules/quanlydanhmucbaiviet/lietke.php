<?php
$sql_lietke_danhmucbv = "SELECT * FROM tbl_danhmucbaiviet ORDER BY thutu DESC";
$query_lietke_danhmucbv = mysqli_query($mysqli, $sql_lietke_danhmucbv);
?>
<p>Liet Ke Danh Muc Bai Viet</p>
<table style="width: 100%" border="1" style="border-collapse: collapse;">
  <tr>
    <th>Id</th>
    <th>Ten Danh Muc</th>
    <th>Quan Ly</th>
  </tr>
  <?php
  $i = 0;
  while ($row = mysqli_fetch_array($query_lietke_danhmucbv)) {
    $i++;
  ?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $row['tendanhmuc_baiviet'] ?></td>
      <td>
        <a href="modules/quanlydanhmucbaiviet/xuly.php?idbaiviet=<?php echo $row['id_baiviet'] ?>">Xoa</a> |
        <a href="?action=quanlydanhmucbaiviet&query=sua&idbaiviet=<?php echo $row['id_baiviet'] ?>">Sua</a> |
      </td>
    </tr>
  <?php
  }
  ?>

</table>