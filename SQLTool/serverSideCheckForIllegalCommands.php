
<?php
require_once './inc/db_connect.inc.php';
	
	
	

	// Anfrage prü fen
	$errors = array();	
	$dbChangeFlag = false; // indicate if db will be changed
	$accessGranted = false;
	
	$db_sql="";
		if(isset($_REQUEST['advancedString']))$db_sql = $_REQUEST['advancedString'];
		$accessGranted = false; // advancedCheck first!

		// Erweiterte Abfrage
		// Prüfen, ob Passwort benötigt wird und ggf. ob es richtig ist
		$criticalRequest = array(
		'INSERT' => array('msg'=>'Falsches Passwort: Einfügen Datenbank nicht möglich',
					'needPass'=>1),
		 'DELETE' => array('msg'=>'Falsches Passwort: Löschen aus Datenbank nicht möglich',
					'needPass'=>1),
		 'UPDATE' => array('msg'=>'Falsches Passwort: Ändern der Datenbank nicht möglich',
					'needPass'=>1),
		 'CREATE' => array('msg'=>'Unerlaubte Datenbankoperation',
					'needPass'=>0),
		 'ALTER' => array('msg'=>'Unerlaubte Datenbankoperation',
					'needPass'=>0),
		 'DROP' => array('msg'=>'Unerlaubte Datenbankoperation',
					'needPass'=>0));

		// alle badwords durchgehen
		foreach($criticalRequest as $aKey=>$aValue)
		{
			// enthält query das badword
			if(strpos(strtolower($db_sql), strtolower($aKey)) !== false)
			{
				// kann badword durch passwort ausgeführt werden?
				if($aValue['needPass'] == 1)
				{
					// stimmt passwort?
					if($_REQUEST['pw'] == ADVANCED_PW)
						$dbChangeFlag = 1;
					else
						$errors[] = $aValue['msg'];
				}
				else
				{
					$errors[] = $aValue['msg'];
				}
			}
		} 

		// no error so far so let's grant access!
		if(count($errors) == 0)
		  $accessGranted = true;
	

	// execute query and check for error
	if($accessGranted == true)
	{
		
		$error_txt = $db_conn->errorInfo();
		
		 $query = $db_conn ->query($db_sql);
		 
		
		if($error_txt != '')
		{
			
			$errors = $error_txt;
		}
	}
	?>