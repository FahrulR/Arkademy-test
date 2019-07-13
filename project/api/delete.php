<?php


 require 'db_config.php';


 $id  = $_POST["id"];


 $sql = "DELETE FROM name WHERE id = '".$id."'";


 $result = $koneksi->query($sql);


 echo json_encode([$id]);


?>