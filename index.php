 <?php
include 'algoritmo.php';
$squadre = array($benevento, $inter,$juve,$napoli,$milan,$lazio,$sampdoria,$roma,$hellas,$torino,$atalanta,$spal,$crotone,$chievo,$fiorentina,$udinese,$genoa,$sassuolo,$cagliari,$bologna);

partite(15);
foreach ($squadre as $squadra)	{
	print($squadra->getNome());
	print ": ";
	print($squadra->getPunti());
	print "\n";
}
?>