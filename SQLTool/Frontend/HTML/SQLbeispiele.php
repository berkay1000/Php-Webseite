
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>

    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>SQL-tool</title>

    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/bootstrap-grid.css">
    <link rel="stylesheet" href="../css/bootstrap-reboot.css">
	<link rel="stylesheet" href="../css/style.css">
    <script src="../js/bootstrap.bundle.js"></script>
    <script src="../js/bootstrap.js"></script>
    
    <script src="../js/sqlcheck.js"></script>


    <script type="text/javascript">
        function copyArea(btnnummer) {
  /* Get the text field */
  var copyText = document.getElementById(btnnummer);

  /* Select the text field */
  copyText.select();

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
 
} 

    </script>




</head>
<body>


<div class="container-fluid">
	<div class="row">
        <div class="col-sm-6 col-lg-6 col-xl-6 d-none d-sm-block" >
			
            <img class="float-left position-absolute d-none d-sm-block img-responsive"  
			src="../bilder/handOBENLINKS.png"
            style="z-index: 2" />
			<h1  id="overheadline" style="margin-left:135px;">SQL-Tool</h1>
        </div>


		

        <div class="col-sm-6 col-lg-6 col-xl-6 text-left d-none d-sm-block float-left  ">
		
            <img class="img-responsive float-right" src="../bilder/logoHSO.gif" height="60" width="226"/>
        </div>
    </div>	
	
	<div class="d-none d-sm-block">
    <img src="../bilder/line_bottom.png" width="100%"/>
	</div>
	
	
<div class="row-fluid">
<div id="navbar_mobile" class=" col-xs-12 d-block d-sm-none text-center" >
		 <h3 >SQL-Tool</h3><p>
			<a href="../../index.php">I-SQL</a>
			<a href="../../Tabellenansehenmobile.php">Daten</a>
			<a href="Hilfe.html">Hilfe</a>
            <a href="SQLBeispiele.php">BSP</a>
            <a href="ermodell.php">ER-Schema</a></p>
</div>
		
        <div id="navbar_left" class="col-xs-6  col-sm-2 col-xl-2 d-none d-sm-block hidden-xs hidden-xs-inline float-left" >
		
			<p ><a href="../../index.php">Interaktives SQL</a></p>
			<p ><a href="../../Tabellenansehen.php">Datenbestand</a></p>
			<p ><a href="Hilfe.html">Hilfe</a></p>
            <p id="active"><a href="SQLBeispiele.php">SQL-Beispiele</a></p>
            
			<p class=""><a href="../HTML/ermodell.php">ER-Schema</a></p>
		</div>
		
		
		
<div id="SQL-Beispiele" class="col-xs-6 col-sm-10 col-xl-9 float-left">
		
		<div id="SQLBeispieleAnzahlUngerade" class="col-xs-12" >
		<div id="pageheadline" class="text-center"> SQL-Beispiele</div>
		</div>
			
			
			
		




<div id="SQLBeispieleAnzahlGerade" class="row">
	<div class="col-sm-6 col-lg-6 col-xs-12">
	 <!-- The text field -->
	<textarea id="2" cols="25" rows="2" >select * from Professor; </textarea>
	<!-- The button used to copy the text -->
	</div>
	<div class="col-sm-6 col-lg-6 col-xs-12">
	<button  onclick="copyArea(2)">Copy text</button>
	hierbei werden alle  Attribute der Tabelle "Professor" entnommen 
	</div>
	<br/>
</div>

<div id="SQLBeispieleAnzahlUngerade" class="row" >
	<div class="col-sm-6 col-lg-6 col-xs-12">
	 <!-- The text field -->
	<textarea id="3" cols="25" rows="5" >select * from Professor, Vorlesung
where personalNr = gelesenVon
and name = "Meier"; </textarea>
	<!-- The button used to copy the text -->
	</div>
	<div class="col-sm-6 col-lg-6 col-xs-12">
	<button  onclick="copyArea(3)">Copy text</button>
	hierbei werden alle  Attribute der Tabelle "Professor" und Vorlesung entnommen. Diese werden verkn&uuml;pft. gelesenVon bei Vorlesungen zeigt an welcher Prof welche Vorlesung h&auml;lt.. Es wird nach name="Meier" gefiltert. So finden wir heraus welche Vorlesungen der Herr Meier h&auml;lt. </br> 
	</div>
</div>

	
<div id="SQLBeispieleAnzahlGerade" class="row">
	<div class="col-sm-6 col-lg-6 col-xs-12">
	<textarea id="4" cols="25" rows="6" >select a.name 
from Assistent a,Professor p
where boss = p.personalNr
and p.name ="Meier";
	</textarea>
</div>
<div class="col-sm-6 col-lg-6 col-xs-12">
	<button  onclick="copyArea(4)">Copy text</button>
	Dieser Befehl nimmt die Tabellen Assistent und Professor, verknüpft sie und gibt alle Assistentennamen, die den Professor Meier als Boss haben
	</div>
</div>



<div id="SQLBeispieleAnzahlUngerade" class="row">
	<div class="col-sm-6 col-lg-6 col-xs-12">
	<textarea id="5" cols="25" rows="6" >
select * from Student s, Vorlesung v, Hoert h
where h.matrikelNr = s.matrikelNr
and h.vorlesungsNr = v.vorlesungsNr;
	</textarea>
	</div>
	
	<div class="col-sm-6 col-lg-6 col-xs-12">
	<button  onclick="copyArea(5)">Copy text</button>
	verkn&uuml;pft Student und Vorlesung mithilfe dritttabelle Hoert.
	</div>
</div>

<div id="SQLBeispieleAnzahlGerade" class="row">
	<div class="col-sm-6 col-lg-6 col-xs-12">
	<textarea id="6" cols="25" rows="10" >
select professor.name as pname, Student.name as studname, titel from Prueft, Professor ,Vorlesung,Student

where prueft.matrikelNr = student.matrikelNr 
and prueft.vorlesungsNr = Vorlesung.vorlesungsNr
and professor.personalNr = Prueft.personalNr;
	</textarea>
	</div>
	<div class="col-sm-6 col-lg-6 col-xs-12">
	<button  onclick="copyArea(6)">Copy text</button>
	verkn&uuml;pft Student, Professor, und Vorlesung unter der Tabelle Prueft, und gibt dabei den professornamen,
	studentennamen und Vorlesungsfach an, in der gepr&uuml;ft werden soll

	</div>



  </div>

</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>


</body>
</html>