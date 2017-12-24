 <?php
include 'algoritmo.php';
header('Content-Type: application/json');
$g = ($_GET['g'] ?: 15);
partite($g);
$arrsquadre = [];
foreach ($squadre as $squadra)	{
	$o->Squadra = $squadra->getNome();
	$o->Alternativa = $squadra->getPunti();
	$o->Tradizionale = $squadra->getPuntiTrad();
	$o->Somma = $squadra->getPunti()+$squadra->getPuntiTrad();
	array_push($arrsquadre, $o);
}
$out = json_encode($arrsquadre);
print $out."\n";
?>