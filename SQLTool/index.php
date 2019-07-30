
<?php

include 'serverSideCheckForIllegalCommands.php';
	
?>
 
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>

    <!--einbau von files, meta-->
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
    

	<script type="text/javascript" src="Frontend/js/checkForObviousSQLErrorAndConnectToServer.js"></script>
	<script type="text/javascript" src="Frontend/js/toggleButtonSchemata.js"></script>
	<script type="text/javascript" src="Frontend/js/textarea.js"></script>


</head>



<body bgcolor='#FAFAFA' onload="ladeTextArea()">

<div class="container-fluid">

<!--nur mobile div-->
		<div id="navbar_mobile" class=" col-xs-12 d-block d-sm-none text-center" >
		 <h3 >SQL-Tool</h3><p>
			<a id="active" href="index.php">I-SQL</a>
			<a href="Tabellenansehenmobile.php">Daten</a>
			<a href="Frontend/HTML/Hilfe.html">Hilfe</a>
            <a href="Frontend/HTML/SQLBeispiele.php">BSP</a>
            <a href="Frontend/HTML/ermodell.php">ER-Schema</a></p>
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
            
			<p id="active"><a href="index.php">Interaktives SQL</a></p>
			<p ><a href="Tabellenansehen.php">Datenbestand</a></p>
			<p ><a href="Frontend/HTML/Hilfe.html">Hilfe</a></p>
            <p ><a href="Frontend/HTML/SQLBeispiele.php">SQL-Beispiele</a></p>
            
			<p><a href="Frontend/HTML/ermodell.php">ER-Schema</a></p>
        </div>
		
		
		
		
	<div id="einUndAusgabeBereich" class="col-sm-10 col-xl-10 row">
	<div id="pageheadline" class="col-sm-10 text-center d-none d-sm-block">Interaktives SQL</div>
        <div class="col-sm-10 col-xl-5 float-right"  id="Eingabebereich" >

            <!--HIer kommt ein eingabefeld und 2 Buttons f�r clear und reset -->
            <form name="formular" action="index.php" method="post">
                <!-- onsubmit="return aendereausgabebereich(this)"-->
                <input type="hidden" name="pw" value="">
                <h3  class="text-center dropdown-item">Eingabebereich</h3>
                <textarea name="advancedString" class="md-textarea form-control" id="textAreaSqlInput" rows="4" cols="35" 
				onchange="saveTextArea()"></textarea> <!--this is the text area on the center, where you will input sql-code -->
                <input type="hidden" name="advancedCheck" value="1">

                <div class="text-center">
				<div class="col-sm-12 col-lg-12">
				<button type="button"style="" class="btn btn-secondary" data-toggle="tooltip" data-placement="bottom" title=
							
"Assistent:  personalNr name fachgebiet boss
Hoert:   matrikelNr vorlesungsNr
Professor:   personalNr name rang raum
Prueft:  matrikelNr vorlesungsNr personalNr note
Setztvorraus:  vorgaenger nachfolger
Student:  matrikelNr name semester
Vorlesung:  vorlesungsNr titel sWS gelesenVon" onclick="tabellenhilfetoggle()"> <!-- toggles on and off the description of the tables-->
Schemata
</button>
				
				
				
				<!--wenn button gedrückt wird, dann wird sql-check von checkForObviousSQLErrorAndConnectToServer.js aufgerufen-->
					<input type="button" class="btn btn-info d-none d-xl-inline-block" name="absenden" id="adc" value="senden"  onclick="return sqlcheckvorher('desktop')">
                  
					
					
					
					<input type="button" class="btn btn-info d-inline-block d-xl-none" name="absenden" id="adc" value="senden"  onclick="return sqlcheckvorher('mobile')">
                    
					
					
					<div id="Tabellenanzeige" class="text-left"></div> <!-- here comes the content, which will be filled with the tabellen toggle -->
						
               </div>
             
            </form>

        </div>
	</div>
		
		

<b><div id="AusgabebereichUeberschrift" style=""class="col-sm-10 col-xl-7"><h3 class="dropdown-item">Ausgabebereich</h3>   </b>
	<div id="fehlerausgabe" class="text-justify"></div>

<!---die Antwort der Datenbank kommt in diese div id rein-->
	
		<div class=" d-none d-md-block text-center col-xl-12 " id="Ausgabebereich">
		
		
	


         
		</div> <!--- ende ausgabebereich 1-->
	

<!--anfang mobile ausgabebereich/start of mobile results-->
<!-- hier kommt die sqlausgabe rein für mobile-->


		<div class="col-sm-12 col-xl-6 d-block d-md-none " style="padding-left:0px;" id="Ausgabebereichmobil"> 
 


		</div>
	</div>
	
	
</div>
</div>
</div>


     

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>


</body>
</html>
