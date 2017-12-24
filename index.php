 <?php
include 'algoritmo.php';
$g = ($_GET['g'] ?: 15);
partite($g);
foreach ($squadre as $squadra)	{
	print($squadra->getNome());
	print ": ";
	print($squadra->getPunti());
	print "\n<br>";
}
?>