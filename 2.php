<!DOCTYPE html>
<html>
<body>
<?php
function is_username_valid($username){
if(!preg_match('/^((?=.*?([a-zA-Z])))(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{5,9}$/', $username)){
	$username= false;
} else {
	$username= true;
}
	echo $username ? 'true' : 'false';
}
function is_password_valid($password){
if(!preg_match('/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!$%^&*-])(?=.*?[\@]).{8,}$/', $password)){
	$password= false;
} else {
	$password= true;
}
	echo $password ? 'true' : 'false';
}
is_username_valid("@sony");
echo "<br>";
is_username_valid("Ayu22v");
echo "<br>";
is_password_valid("p@ssW0rd#");
echo "<br>";
is_password_valid("C0d3YourFuture!#");

?>
</body>
</html>