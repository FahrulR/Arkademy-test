<?php
	function jumlahFrasa($kata,$frasa){
		$count= substr_count($kata,$frasa);
		echo "Jumlah frasa '$frasa' pada kata '$kata' Ditemukan sebanyak $count kali<br>";
	}

	jumlahFrasa("banananananana","na");

?>
