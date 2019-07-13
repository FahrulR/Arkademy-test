<?php  
 $source = 'biodata.json';
 $content = file_get_contents($source);
 $data = json_decode($content, true);
 echo "Name: ".$data['biodata']['name']."<br />";
 echo "<br />";
 echo "Age: ".$data['biodata']['age']."<br />";
 echo "<br />";
 echo "Address: ".$data['biodata']['address']."<br />";
 echo "<br />";
 echo "Hobbies: <br />";
 foreach($data['biodata']['hobbies'] as $hobbies) {
    echo "<li>".$hobbies. '<br />';
    echo "</li>";
 }
     echo "<br />";
 echo "Is married: ";
 echo $data['biodata']['is_married'] ? 'true' : 'false';
 echo "<br />";
 echo "<br />List of school: <br />";
 foreach ($data['biodata']['list_school'] as $key => $value) {
    echo "<li>".$value["name"].", ".$value["year_in"]."-".$value["year_out"]." ".$value["major"]."<br />";
 	echo "</li>";
 }
 echo "<br />";
 echo "Skills: <br />";
 foreach ($data['biodata']['skills'] as $key => $value) {
    echo "<li>".$value["skill_name"].": ".$value["level"]."<br />";
 	echo "</li>";
 }
 echo "<br />";
 echo "Interest in coding: ";
 echo $data['biodata']['interest_in_coding'] ? 'true' : 'false';
  ?>