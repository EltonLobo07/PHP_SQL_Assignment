<?php
		$N1=$_POST["n1"];
		$N2=$_POST["n2"];
		for($num=$N1;$num<=$N2;$num++){
			$flag=0;
			if($num==0 || $num==1)
				continue;
			for($i=2;$i<$num;$i++){
				if($num%$i==0){
					$flag=1;
					break;
				}
			}
			if($flag==0)
				echo $num." ";
		}
	?>