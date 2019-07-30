<?php
	define('ADVANCED_PW', 'mi');
	
	
	$config['db_user'] = 'sqldemo';
	$config['db_pass'] = 'sql348demo';
	


	
try {
	
	
	$db_conn = new PDO('mysql:host=localhost;port=3306;dbname=sqldemo', $config['db_user'], $config['db_pass'],);

    
    
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>

	
	
	
	


