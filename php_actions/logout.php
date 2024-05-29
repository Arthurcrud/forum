<?php
session_start();
$_SESSION = array();
session_unset();
session_destroy();
echo "<script> 
		alert('Voce foi deslogado!');
	 </script> ";

echo "<script> 
		location.href = ('../index.php') 
	 </script> ";
