
<?php

include 'serverSideCheckForIllegalCommands.php';
	
?>
 
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>

    
	<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>SQL-tool</title>

    <link rel="stylesheet" href="Frontend/css/bootstrap.css">
    <link rel="stylesheet" href="Frontend/css/bootstrap-grid.css">
    <link rel="stylesheet" href="Frontend/css/bootstrap-reboot.css">
	<link rel="stylesheet" href="Frontend/css/style.css">
	
    <script type="text/javascript" src="Frontend/js/bootstrap.bundle.js"></script>
    <script type="text/javascript"src="Frontend/js/bootstrap.js"></script>
    
    <script type="text/javascript" src="Frontend/js/sqlcheck.js"></script>
	<script type="text/javascript" src="Frontend/js/checkForObviousSQLErrorAndConnectToServer.js"></script>
	<script type="text/javascript" src="Frontend/js/toggleButtonSchemata.js"></script>
	


</head>
<body>


<body bgcolor='#FAFAFA'>

<div class="container-fluid">
		<div id="navbar_mobile" class="d-inline-block d-sm-none" >
		 <h3 class="  col-xl-12">SQL-Tool</h3><p>
			<b><a href="index.php">I-SQL</a>
			<a href="Tabellenansehenmobile.php">Daten</a>
			<a href="Frontend/HTML/Hilfe.html">Hilfe</a>
            <a href="Frontend/HTML/SQLBeispiele.php">BSP</a>
            <a href="Frontend/HTML/ermodell.php">ER-Schema</a></p></b>
		</div>
 
    <div class="row">


        <div class="col-sm-6 col-lg-6 col-xl-6 d-none d-sm-block" >
			
            <img class="float-left position-absolute d-none d-sm-block img-responsive"  
			src="Frontend/bilder/handOBENLINKS.png"
            style="z-index: 2" />
			<h1  id="overheadline" style="margin-left:135px;">SQL-Tool</h1>
        </div>


		

        <div class="col-sm-6 col-lg-6 col-xl-6 text-left d-none d-sm-block float-left  ">
		
            <img class="img-responsive float-right" src="Frontend/bilder/logoHSO.gif" height="60" width="226"/>
        </div>
    </div>	
	<div class="d-none d-sm-block">
    <img src="Frontend/bilder/line_bottom.png" width="100%"/>
	</div>
	
<div class="row-fluid" >

        <div id="navbar_left" class="col-xs-12 col-sm-2 col-xl-2 d-none d-sm-block hidden-xs hidden-xs-inline float-left " >
          
			<p ><a href="index.php">Interaktives SQL</a></p>
			<p id="active"><a href="Tabellenansehen.php">Datenbestand</a></p>
			<p><a href="Frontend/HTML/Hilfe.html">Hilfe</a></p>
            <p><a href="Frontend/HTML/SQLBeispiele.php">SQL-Beispiele</a></p>
            
			<p><a href="Frontend/HTML/ermodell.php">ER-Schema</a></p>
        </div>
		
		
		
<div class="Tabellenanzeigen col-xs-10 col-sm-10 col-xl-10 float-left">
<div id="pageheadline" class="col-xs-12"> Datenbestand</div>

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
$counterToBuildRowdivStart=4;
$counterToBuildRowdivEnd=4;
foreach($Tabellennamen as $key=>$tn){
	
	//alle 3 Div soll ne row div erscheinen
	
	
	if($counterToBuildRowdivStart==4){
	echo "<div class='row'>";
	$counterToBuildRowdivStart=0;
	}
	
	$counterToBuildRowdivStart++;

//gebe titel über den einzelnen Tabellen aus
echo "<div class='col-lg-3  col-md-6 col-sm-6'>";
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
	
	
	echo '<td class="font-weight-light bordertable" style="font-size:13px;background-color:lightgrey;border:3px solid grey;padding:3px;" ><b>'. $aKey . '</b></td>';
	

}
	echo '</tr>';

// die unteren Zeilen mit den Werten 
foreach($result as $aKey => $aValue){
	
	$result_row=$result[$aKey];
	echo '<tr>';
	foreach($result_row as $arowKey => $arowValue){
	
	echo '<td class="font-weight-light bordertable" style="font-size:12px;" >'. $arowValue . '</td>';
	}
	echo '</tr>';
}
//ende einer Tabelle 

echo "</table></div>";

$counterToBuildRowdivEnd--;

if($counterToBuildRowdivEnd==0){
	echo "</div>";
	$counterToBuildRowdivEnd=3;
	}
	



} //ende großer Schleife, welches jede Tabelle durchgeht

?>
	
	</div>
	
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>


</body>
</html>
