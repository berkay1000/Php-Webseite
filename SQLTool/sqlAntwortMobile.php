<?php
include 'serverSideCheckForIllegalCommands.php';

?>

<!--this is the answer which will we printed out on the "ausgabebereich" id="fehlerausgabe" and id="ausgabebereich". for mobile -->

<tr>
      <td><hr width="4" size="1" color="#E1E1E1"></td>
      <td>
			  
				<?php error_reporting(2);  ?>
					

					<!--*** Ergebnis anzeigen/ show results ---------------------------------------------------------------------------------->
					
					
	
					<?php if($dbChangeFlag == 0): ?>
					<div class="col-sm-12 overflow-auto">

					<table border="1" bordercolor="#aeaeae" style="background-color:#aeaeae;" cellspacing="0" cellpadding="2">
						<tr>
						
						
						<?php
						
							try{
						if(($query->execute())){
							
					
							// do query and show result headlines first
							
						
							
							$var =0;
							
							$db_data= $query->fetchAll(PDO::FETCH_ASSOC);  
							$query->execute();
							$numcols = $query -> columncount();
							
					
							//adjust the text size, depending on displaywidth, if mobile and number of attributes
							 $ausgabefeldgroesse=10/$numcols;
							 if($ausgabefeldgroesse>1.25){$ausgabefeldgroesse=1.25;}
							 if($ausgabefeldgroesse<0.5){$ausgabefeldgroesse=1.25;}
							
							$aValue="";
							$wertvorher="";
							$colCounterToCheckIntegrity=0;
							if($numcols!=0){
								
							foreach($db_data[0] as $aKey=>$aValue) //hat nur namen und keine zahlen z.b. pesonalNr / Fachgebiet/ name/Boss...	
							{
								
								 $colCounterToCheckIntegrity++; //counts the amount of print out columns
								
								
								
								
								
								
								if(!is_numeric($aKey)){
									echo '<td><B CLASS="head" style="font-size:15px;" >' . $aKey . '</B></td>';
									
									$wertvorher=$aValue;
									$keyvorher =$aKey;
								}
								
								else if($wertvorher==$aValue){
										echo '<td><B CLASS="head" style="font-size:15px;" >' . $keyvorher . '</B></td>';
								}
									
									
									
								
								
								
								 
							}

							}
							else{
								//echo '<td>nichts gefunden</td>';
							}
							//}
						
						}
						
							}
							
							catch(Error $e){
								echo" irgendwas lief schief! schau nochmal in dein SQL-Befehl";
							}
						
						
						?>
						</tr>
						<?php
						
							// reset data pointer
							if(true ==  $query->execute()){
							//mysqli_data_seek($db_result, 0);
							$zaehler=0;
							
							while($zaehler <count($db_data ))  //Anzahl reihen 
							{
								
								$db_data_onerow=$db_data[$zaehler];
								
								echo '<tr>';
								foreach($db_data_onerow as $aKey=>$aValue)
								{
									//*****************
									
									
								if(!is_numeric($aKey)){
									echo '<td class="font-weight-light" style="font-size:15px;" >'. $aValue . '</td>';
								$wertvorher=$aValue;
								$keyvorher =$aKey;
								}
								
								
								else{
									if($wertvorher!=$aValue){
										echo '<td class="font-weight-light" style="font-size:'.$ausgabefeldgroesse.'vw;" >'. $aValue . '</td>';
									}
								}
								
									
									//**************
								}
								++$zaehler;
								echo '</tr>';
							}
						
							}
						?>
					</table>
					</div>



					 <div id='fehlerausgabe'><?php 
						if(true ==  $query->execute()){
							echo "<div class='col-sm-12' style='text-align:center;font-weight:normal;'>Gefundene Datens&auml;tze: ";
							 $ANZreihen =$query->rowCount();
							 echo "".$ANZreihen."<br/>";
							//echo anzahl reihen
							if($colCounterToCheckIntegrity!=$numcols){ //compares the amount of print out columns with amount of existing numcols in the background 
								echo " <b>ACHTUNG:</b> Anzahl tatsächlicher Spalten stimmen nicht mit Ausgabebereich überein.</br>";
								echo "es sollten ".$numcols." Spalten angezeigt werden. Aber es werden nur ".  $colCounterToCheckIntegrity++."  Spalten angezeigt<br/>";
								echo "Grund: Spalten mit den selben Attributnamen werden nur einmal übernommen. <br/>";
								echo "Zum Beispiel: professor.Name und Assistent.Name<br/>";
								echo "Korrekturmöglichkeiten: Stern ersetzen und dafür sorgen dass alle Attributnamen einzigartig sind z.b. 'p.name as professorname'<br/>";
							}
						
						}
						else{
							
							foreach($errors as $azaehler){
							echo "irgendwas lief schief";
							echo $azaehler;
							}
						}
					
					
					
					?></div></b></B>

					<?php elseif($dbChangeFlag == 1): ?>

						<B CLASS="text">Tabelle wurde geändert</B>

					<?php endif; ?>

        

				<BR><HR width="90%" size=1 color="#FFFFFF" align=left>
				<?php
				
				echo '<b class="text">SQL-Tool</b><b CLASS="cite"></b>';
				echo '<b class="text"> von </b><b class="cite">Berkay Yaman </b>';
				
				?>
				
				
      </td>
    </tr>
  </table>



