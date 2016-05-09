<?php
/*
 * @author J.R. MacMillian
 * @copyright Copyright (c) 2016, J.R. MacMillian
 * @link http://www.macmillian.net
 * @license https://opensource.org/licenses/MIT MIT
 */

$dir    = getcwd() . '/logs';

$logFiles = scandir($dir);

$logFileList = '<ul>';
foreach($logFiles as $file){
	if (preg_match('/mysqld_slowqry-/',$file)) {
		$file_path = $dir . '/' . $file;
		if ( filesize( $file_path )  > 0) {
		    $name = str_replace("mysqld_slowqry-", "", $file);
			$logFileList .= '<li><a href="app.php?file=' . $file . '" >' . $name . '</a></li>';
		}
		
	}
}
$logFileList .= '</ul>';

$weekDir    = getcwd() . '/logs/week';

$weekLogFiles = scandir($weekDir);

$weekLogFileList = '<ul>';

foreach($weekLogFiles as $file){

	if (preg_match('/mysqld_slowqry-/',$file)) {
		$file_path = $weekDir . '/' . $file;

		if ( filesize( $file_path )  > 0) {
			$name = str_replace("mysqld_slowqry-", "", $file);

			$weekLogFileList .= '<li><a href="app.php?file=week/' . $file . '" >' . $name . '</a></li>';
		}

	}

}

$weekLogFileList .= '</ul>';


$monthDir    = getcwd() . '/logs/month';

$monthLogFiles = scandir($monthDir);

$monthLogFileList = '<ul>';

foreach($monthLogFiles as $file){

	if (preg_match('/mysqld_slowqry-/',$file)) {
		$file_path = $monthDir . '/' . $file;

		if ( filesize( $file_path )  > 0) {
			$name = str_replace("mysqld_slowqry-", "", $file);

			$monthLogFileList .= '<li><a href="app.php?file=month/' . $file . '" >' . $name . '</a></li>';
		}

	}

}

$monthLogFileList .= '</ul>';


?><!DOCTYPE html>  
<html lang="en">
    <head>  
        <meta charset="utf-8">  
        <title> Slow Query Logs</title>
        <link rel="stylesheet" href="css/style.css">
    </head>  
    <body> 
    <h1 align="center"> Slow Query Logs</h1>
    <div id="log_selections_container">
            
            <div id="logo" style="float:left; width: 400px;margin: 50px 0 50px 50px">
            	<!--  add logo here, if desired <img src="images/logo.png" /> -->
            </div>
            
            <div id="log_selections" style="float:left; margin: 100px 50px ">

	            <h2>Select Month</h2>
	            <?php echo $monthLogFileList; ?>
	            
	            <h2>Select Week</h2>
	            <?php echo $weekLogFileList; ?>
	            
	           	<h2>Select Begin Date</h2>
	            <?php echo $logFileList; ?>
	            <h2>Or</h2>
	            <ul>
	            	<li><a href="app.php" >Drag and Drop a Log File from Your Computer</a></li>
	            </ul> 
	            
	    	</div>
            
     </div>
    </body>    
</html>  