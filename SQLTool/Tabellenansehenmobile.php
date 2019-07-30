<?php
	require_once './inc/db_connect.inc.php';
	
?>
<html>
  <head>
    <title>show tables</title>
	<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	
   
	
	<link rel="stylesheet" href="Frontend/css/style.css">
	<link rel="stylesheet" href="Frontend/css/bootstrap.css">
    <link rel="stylesheet" href="Frontend/css/bootstrap-grid.css">
    <link rel="stylesheet" href="Frontend/css/bootstrap-reboot.css">
	<link rel="stylesheet" href="Frontend/css/style.css">
  </head>

  <body bgcolor='#FAFAFA'>
 
    <div class="container-fluid">
     <div id="navbar_mobile" class=" col-xs-12 d-block d-sm-none text-center" >
		 <h3 >SQL-Tool</h3><p>
			<a href="index.php">I-SQL</a>
			<a href="Tabellenansehenmobile.php">Daten</a>
			<a href="Frontend/HTML/Hilfe.html">Hilfe</a>
            <a href="Frontend/HTML/SQLBeispiele.php">BSP</a>
            <a href="Frontend/HTML/ermodell.php">ER-Schema</a></p>
		</div>
  
	
  <div class="col-xs-12">
<?php



//hol die tabellennamen der Datenbank
$query = $db_conn ->prepare("SHOW TABLES");
$query->execute();
$result = $query->fetchALL(PDO::FETCH_NUM); //speichere die Ergebnisse in result

	
	$zaehler=0;
	
foreach ($result as $aValue2){ //wegen der Tabellenform der Datenbanken muss jede Reihe einzeln durchgegangen werden
	
	$result_row =$result[$zaehler];
	
	 $Tabellennamen[$zaehler]= $result_row[0];
	$zaehler++;

	
}


//gebe Tabelleninhalt und Attribute aus 

foreach($Tabellennamen as $key=>$tn){
	
	//alle 3 Div soll ne row div erscheinen
	
	
	
	

//gebe titel über den einzelnen Tabellen aus
echo "<div class='col-lg-xs-12 col-xl-4'>";
echo "<span style='text-align:center' id=".$Tabellennamen[$key]."><h2>".$Tabellennamen[$key].'</h2></span>';

//hole neue Daten, Daten der einzelnen Tabellen

$query = $db_conn ->prepare("select * from ". $Tabellennamen[$key]);
$query->execute();
$result = $query->fetchALL(PDO::FETCH_ASSOC);

//baue Tabelle auf
echo "<table>";
//erste Zeile für die Attribute 
echo '<tr>'; 
foreach($result[0] as $aKey => $aValue){
	
	
	echo '<td class="font-weight-light bordertable" style="background-color:lightgrey;border:3px solid grey;padding:3px;" ><b>'. $aKey . '</b></td>';
	

}
	echo '</tr>';

// die unteren Zeilen mit den Werten 
foreach($result as $aKey => $aValue){
	
	$result_row=$result[$aKey];
	echo '<tr>';
	foreach($result_row as $arowKey => $arowValue){
	
	echo '<td class="font-weight-light bordertable"  >'. $arowValue . '</td>';
	}
	echo '</tr>';
}
//ende einer Tabelle 
echo "</table></div>";




	



} //ende großer Schleife, welches jede Tabelle durchgeht

?>
	
	</div>
	
</div>
</div>
	</body>
</html>