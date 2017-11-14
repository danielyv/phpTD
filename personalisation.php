<?php
	/**
	 * Created by PhpStorm.
	 * User: yves
	 * Date: 10/11/17
	 * Time: 11:26
	 */
	setcookie ("preference",$_GET["preference"],time ()+3600);
	echo "<a href='index.php'>Goto index</a>";

?>