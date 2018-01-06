 <?php
header("Access-Control-Allow-Origin: *")
include 'algoritmo.php';
header('Content-Type: application/json');
$g = ($_GET['g'] ?: 15);
partite($g);
sortSquadre($GLOBALS['squadre']);
$arrsquadre = [];
$i=0;
/*foreach ($squadre as $squadra)	{
	$o->Squadra = $squadra->getNome();
	$o->Alternativa = $squadra->getPunti();
	$o->Tradizionale = $squadra->getPuntiTrad();
	$o->Somma = $squadra->getPunti()+$squadra->getPuntiTrad();
	$arrsquadre[$i] = $o;
	$i++;
}*/
$out = json_encode($squadre);
print $out."\n";
?>