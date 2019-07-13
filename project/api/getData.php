<?php
require 'db_config.php';

$sql = "select name.id as id, name.name as name, work.name as work, salary.salary as salary from name, work, salary where name.id_work = work.id and name.id_salary = salary.id";

$result = $koneksi->query($sql);


  while($row = $result->fetch_assoc()){


     $json[] = $row;


  }


  $data['data'] = $json;


$result =  mysqli_query($koneksi,$sql);


$data['total'] = mysqli_num_rows($result);


echo json_encode($data);


?>