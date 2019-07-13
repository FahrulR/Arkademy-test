<?php


require 'db_config.php';


  $post = $_POST;


  $sql = "INSERT INTO name (name,id_work,id_salary) 


	VALUES ('".$post['name']."','".$post['work']."','".$post['salary']."')";


  $result = $koneksi->query($sql);


  $sql = "SELECT * FROM name Order by id desc LIMIT 1"; 


  $result = $koneksi->query($sql);


  $data = $result->fetch_assoc();


echo json_encode($data);


?>