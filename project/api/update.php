<?php


  require 'db_config.php';


  $id  = $_POST["id"];
  $post = $_POST;


  $sql = "UPDATE name SET name = '".$post['name']."'
    ,id_work = '".$post['work']."'
    ,id_salary ='".$post['salary']."' 
    WHERE id = '".$id."'";


  $result = $koneksi->query($sql);


  $sql = "SELECT * FROM name WHERE id = '".$id."'"; 


  $result = $koneksi->query($sql);


  $data = $result->fetch_assoc();


  echo json_encode($data);


?>