
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>

    <meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>SQL-tool</title>
 <link rel="stylesheet" href="../css/bootstrap.css">
 <link rel="stylesheet" href="../css/bootstrap-grid.css">
 <link rel="stylesheet" href="../css/bootstrap-reboot.css">
 <script type="text/javascript" src="../js/bootstrap.bundle.js"></script>
    <script type="text/javascript"src="../js/bootstrap.js"></script>
	<link rel="stylesheet" href="../css/style.css">

</head>


<body bgcolor='#FAFAFA'>
 <div class="container-fluid">
		<div class="row-fluid">

		<div id="navbar_mobile" class=" col-xs-12 d-block d-sm-none text-center" >
		 <h3 >SQL-Tool</h3><p>
		<a href="../../index.php">I-SQL</a>
			<a href="../../Tabellenansehenmobile.php">Daten</a>
			<a href="Hilfe.html">Hilfe</a>
            <a href="SQLBeispiele.php">BSP</a>
            <a   id="active" href="ermodell.php">ER-Schema</a></p>
		</div>
		</div>
	
	
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
        <div id="navbar_left" class="col-xs-12 col-sm-3 col-xl-2 d-none d-sm-block hidden-xs hidden-xs-inline float-left" >
            
			<p class=""><a href="../../index.php">Interaktives SQL</a></p>
			<p class=""><a href="../../Tabellenansehen.php">Datenbestand</a></p>
			<p class=""><a href="Hilfe.html">Hilfe</a></p>
            <p class="table-hover"><a href="SQLBeispiele.php">SQL-Beispiele</a></p>
          
			<p id="active"><a href="../HTML/ermodell.php">ER-Schema</a></p>
        </div>
		<div class=" col-xs-12 col-sm-6 col-xl-5 d-sm-block float-left" >

			<h4 id="pageheadline" class="col-xs-12 text-center">ER-Schema</h4><br/>
			<div class="col-xs-12 col-sm-12 col-xl-12">
			<img src="../bilder/ermodell.png" width="100%" >
			</div>
		</div>
	</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>


</body>
</html>