<?php
class Squadra	{
	var $nomesquadra;
	var $punti;
	var $puntiTrad;
	var $golfatti;
	var $golsubiti;
	var $sconfitte;
	var $vittorie;
	var $pareggi;
	function __construct( $nome )	{
		$this->nomesquadra = $nome;
		$this->punti=0;
		$this->puntiTrad=0;
		$this->golfatti=0;
		$this->golsubiti=0;
		$this->pareggi=0;
		$this->sconfitte=0;
		$this->vittorie=0;
	}
	function getNome()	{
		return $this->nomesquadra;
	}
	function aggiungipartita($GFa,$GSa)	{
		if ($GFa > $GSa) {
      		$this->puntiTrad = $this->puntiTrad + 3;
      		$this->vittorie = $this->vittorie + 1;
    	}
    	if ($GFa == $GSa) {
    		$this->puntiTrad = $this->puntiTrad + 1;
    		$this->pareggi = $this->pareggi + 1;
    	}
    	if ($GFa < $GSa)  {
      		$this->sconfitte = $this->sconfitte + 1;
		}
		if ($GSa == 0) {
      		$this->punti = $this->punti + 2.5;
    	} elseif ($GSa == 1) {
        	$this->punti = $this->punti + 1.5;
      	}
    	if ($GFa > 0) {
      		$this->punti = $this->punti + 1.3;
    	}
    	$this->golfatti = $this->golfatti+$GFa;
    	$this->golsubiti = $this->golsubiti+$GSa;
	}
	function getPunti() {
	    return $this->punti;
	}
	function getPuntiTrad()	{
	    return $this->puntiTrad;
	}
	function getGolFatti() {
	    return $this->golfatti;
	}
	function getGolSubiti()  {
	    return $this->golsubiti;
	}
	function getVittorie() {
	    return $this->vittorie;
	}
	function getPareggi()  {
	    return $this->pareggi;
	}
	function getSconfitte()  {
	    return $this->sconfitte;
	}
	function azzeraPunti() {
	    $this->punti=0;
	}
	function azzeraPuntiTrad() {
	    $this->puntiTrad=0;
	}
	function resettaGol()  {
	   	$this->golfatti = 0;
	    $this->golsubiti = 0;
	}
	function resettaPartiteVintePersePareggiate()  {
	    $this->vittorie = 0;
	    $this->pareggi = 0;
	    $this->sconfitte = 0;
	}
  function arrotonda () {
    $this->puntiTrad=round($this->puntiTrad, 0);
    $this->punti=round($this->punti,1);
  }
}
$inter = new Squadra("Inter");
$juve = new Squadra("juventus");
$napoli = new Squadra("Napoli");
$milan = new Squadra("Milan");
$lazio = new Squadra("Lazio");
$benevento = new Squadra("Benevento");
$sampdoria = new Squadra("Sampdoria");
$roma = new Squadra("Roma");
$hellas = new Squadra("Verona");
$torino = new Squadra("Torino");
$atalanta = new Squadra("Atalanta");
$spal = new Squadra("Spal");
$crotone = new Squadra("Crotone");
$chievo = new Squadra("Chievo");
$fiorentina = new Squadra("Fiorentina");
$udinese = new Squadra("Udinese");
$genoa = new Squadra("Genoa");
$sassuolo = new Squadra("Sassuolo");
$cagliari = new Squadra("Cagliari");
$bologna = new Squadra("Bologna");
$squadre = array($benevento, $inter,$juve,$napoli,$milan,$lazio,$sampdoria,$roma,$hellas,$torino,$atalanta,$spal,$crotone,$chievo,$fiorentina,$udinese,$genoa,$sassuolo,$cagliari,$bologna);

function partita($squadra1, $squadra2, $goal1, $goal2) {
  foreach($GLOBALS['squadre'] as $corrente) {
    if($corrente->getNome() == $squadra1)	{
    	$corrente->aggiungipartita($goal1,$goal2);
    }
    if($corrente->getNome() == $squadra2)  {
    	$corrente->aggiungipartita($goal2,$goal1);
	}
  }
}
function partite($giornata)	{
  foreach($GLOBALS['squadre'] as $squadra) {
    $squadra->azzeraPunti();
    $squadra->azzeraPuntiTrad();
    $squadra->resettaGol();
    $squadra->resettaPartiteVintePersePareggiate();
  }
  $soloquarta = false;
  $finoquinta = false;
  $finosesta = false;
  $finosettima = false;
  $finottava = false;
  $finonona = false;
  $finodecima = false;
  $finoundicesima = false;
  $finododicesima = false;
  $finotredicesima = false;
  $finoquattordicesima = false;
  $finoquindicesima = false;
  $finosedicesima = false;
  if($giornata<5)
    $soloquarta=true;
  if($giornata<6)
    $finoquinta=true;
  if($giornata<7)
    $finosesta=true;
  if($giornata<8)
    $finosettima=true;
  if($giornata<9)
    $finottava=true;
  if($giornata<10)
    $finonona=true;
  if($giornata<11)
    $finodecima=true;
  if($giornata<12)
    $finoundicesima=true;
  if($giornata<13)
    $finododicesima=true;
  if($giornata<14)
    $finotredicesima=true;
  if($giornata<15)
    $finoquattordicesima=true;
  if($giornata<16)
    $finoquindicesima=true;
  if($giornata<17)
    $finosedicesima=true;
  partita("juventus", "Cagliari", 3, 0);
  partita("Verona", "Napoli", 1, 3);
  partita("Atalanta", "Roma", 0, 1);
  partita("Bologna", "Torino", 1, 1);
  partita("Crotone", "Milan", 0, 3);
  partita("Inter", "Fiorentina", 3, 0);
  partita("Lazio", "Spal", 0, 0);
  partita("Sampdoria", "Benevento", 2, 1);
  partita("Sassuolo", "Genoa", 0, 0);
  partita("Udinese", "Chievo", 1, 2);
  partita("Benevento", "Bologna", 0, 1);
  partita("Genoa", "juventus", 2, 4);
  partita("Roma", "Inter", 1, 3);
  partita("Torino", "Sassuolo", 3, 0);
  partita("Milan", "Cagliari", 2, 1);
  partita("Napoli", "Atalanta", 3, 1);
  partita("Crotone", "Verona", 0, 0);
  partita("Spal", "Udinese", 3, 2);
  partita("Chievo", "Lazio", 1, 2);
  partita("Fiorentina", "Sampdoria", 1, 2);
  partita("juventus", "Chievo", 3, 0);
  partita("Inter", "Spal", 2, 0);
  partita("Verona", "Fiorentina", 0, 5);
  partita("Udinese", "Genoa", 1, 0);
  partita("Atalanta", "Sassuolo", 2, 1);
  partita("Cagliari", "Crotone", 1, 0);
  partita("Lazio", "Milan", 4, 1);
  partita("Benevento", "Torino", 0, 1);
  partita("Bologna", "Napoli", 0, 3);
  partita("Crotone", "Inter", 0, 2);
  partita("Fiorentina", "Bologna", 2, 1);
  partita("Roma", "Verona", 3, 0);
  partita("Sassuolo", "juventus", 1, 3);
  partita("Milan", "Udinese", 2, 1);
  partita("Napoli", "Benevento", 6, 0);
  partita("Spal", "Cagliari", 0, 2);
  partita("Torino", "Sampdoria", 2, 2);
  partita("Chievo", "Atalanta", 1, 1);
  partita("Genoa", "Lazio", 2, 3);
  if (!$soloquarta) {
    partita("Bologna", "Inter", 1, 1);
    partita("Benevento", "Roma", 0, 4);
    partita("Atalanta", "Crotone", 5, 1);
    partita("Cagliari", "Sassuolo", 0, 1);
    partita("Genoa", "Chievo", 1, 1);
    partita("juventus", "Fiorentina", 1, 0);
    partita("Lazio", "Napoli", 1, 4);
    partita("Milan", "Spal", 2, 0);
    partita("Udinese", "Torino", 2, 3);
    partita("Verona", "Sampdoria", 0, 0);
    if (!$finoquinta) {
      partita("Roma", "Udinese", 3, 1);
      partita("Spal", "Napoli", 2, 3);
      partita("juventus", "Torino", 4, 0);
      partita("Sampdoria", "Milan", 2, 0);
      partita("Cagliari", "Chievo", 0, 2);
      partita("Crotone", "Benevento", 2, 0);
      partita("Verona", "Lazio", 0, 3);
      partita("Inter", "Genoa", 1, 0);
      partita("Sassuolo", "Bologna", 0, 1);
      partita("Fiorentina", "Atalanta", 1, 1);
    }
    if(!$finosesta)
    {
      partita("Udinese","Sampdoria",4,0);
      partita("Genoa","Bologna",0,1);
      partita("Napoli","Cagliari",3,0);
      partita("Benevento","Inter",1,2);
      partita("Lazio","Sassuolo",6,1);
      partita("Torino","Verona",2,2);
      partita("Chievo","Fiorentina",2,1);
      partita("Spal","Crotone",1,1);
      partita("Milan","Roma",0,2);
      partita("Atalanta","juventus",2,2);
    }
    if(!$finosettima)
    {
      partita("juventus","Lazio",1,2);
      partita("Roma","Napoli",0,1);
      partita("Fiorentina","Udinese",2,1);
      partita("Bologna","Spal",2,1);
      partita("Cagliari","Genoa",2,3);
      partita("Crotone","Torino",2,2);
      partita("Sampdoria", "Atalanta",3,1);
      partita("Sassuolo","Chievo",0,0);
      partita("Inter","Milan",3,2);
      partita("Verona", "Benevento",1,0);
      if(!$finottava)
      {
        partita("Sampdoria","Crotone",5,0);
        partita("Napoli","Inter",0,0);
        partita("Chievo","Verona",3,2);
        partita("Atalanta","Bologna",1,0);
        partita("Benevento", "Fiorentina",0,3);
        partita("Milan","Genoa",0,0);
        partita("Spal","Sassuolo",0,1);
        partita("Torino","Roma",0,1);
        partita("Udinese","juventus",2,6);
        partita("Lazio","Cagliari",3,0);
        if(!$finonona)
        {
          partita("Inter","Sampdoria",3,2);
          partita("Atalanta","Verona",3,0);
          partita("Bologna","Lazio",1,2);
          partita("Cagliari", "Benevento",2,1);
          partita("Chievo","Milan",1,4);
          partita("Fiorentina","Torino",3,0);
          partita("Genoa","Napoli",2,3);
          partita("juventus","Spal",4,1);
          partita("Roma","Crotone",1,0);
          partita("Sassuolo","Udinese",0,1);
          if(!$finodecima) {
            partita("Milan","juventus",0,2);
            partita("Roma","Bologna",1,0);
            partita("Benevento","Lazio",1,5);
            partita("Sampdoria","Chievo",4,1);
            partita("Spal","Genoa",1,0);
            partita("Napoli","Sassuolo",3,1);
            partita("Udinese","Atalanta",2,1);
            partita("Crotone", "Fiorentina",2,1);
            partita("Torino","Cagliari",2,1);
            partita("Verona","Inter",1,2);
          }
          if(!$finoundicesima) {
            partita("Bologna","Crotone",2,3);
            partita("Genoa","Sampdoria",0,2);
            partita("Inter","Torino",1,1);
            partita("Fiorentina","Roma",2,4);
            partita("Cagliari","Verona",2,1);
            partita("juventus","Benevento",2,1);
            partita("Chievo","Napoli",0,0);
            partita("Atalanta","Spal",1,1);
            partita("Sassuolo","Milan",0,2);
          }
          if(!$finododicesima) {
            partita("Roma","Lazio",2,1);
            partita("Napoli","Milan",2,1);
            partita("Crotone","Genoa",0,1);
            partita("Benevento","Sassuolo",1,2);
            partita("Sampdoria","juventus",3,2);
            partita("Spal","Fiorentina",1,1);
            partita("Torino","Chievo",1,1);
            partita("Udinese","Cagliari",0,1);
            partita("Inter","Atalanta",2,0);
            partita("Verona","Bologna",2,3);
          }
          if(!$finotredicesima)  {
            partita("Bologna","Sampdoria",3,0);
            partita("Sassuolo","Verona",0,2);
            partita("Chievo","Spal",2,1);
            partita("Cagliari","Inter",1,3);
            partita("Milan","Torino",0,0);
            partita("Genoa","Roma",1,1);
            partita("Udinese","Napoli",0,1);
            partita("Lazio","Fiorentina",1,1);
            partita("juventus","Crotone",3,0);
            partita("Atalanta","Benevento",1,0);
          }
          if(!$finoquattordicesima)  {
            partita("Roma","Spal",3,1);
            partita("Napoli","juventus",0,1);
            partita("Torino","Atalanta",1,1);
            partita("Benevento","Milan",2,2);
            partita("Bologna","Cagliari",1,1);
            partita("Fiorentina","Sassuolo",3,0);
            partita("Inter","Chievo",5,0);
            partita("Sampdoria","Lazio",1,2);
            partita("Crotone","Udinese",0,3);
            partita("Verona","Genoa",0,1);
          }
        }
      }
    }
  }
}

function sortSquadre (&$squadre) {
  for ($i=0;$i<20;$i++) {
    for ($c=1;$c<20;$c++)  {
      if($squadre[$c]->getPuntiTrad()>$squadre[$c-1]->getPuntiTrad()) {
        $temp = $squadre[$c];
        $squadre[$c] = $squadre[$c-1];
        $squadre[$c-1] = $temp;
      }
    }
    $squadre[$i]->arrotonda();
  }
}

?>