<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MajorLife - where to live on UMW's campus</title>
<link href="settings.css" rel="stylesheet" type="text/css" /><!--[if IE 5]>
<style type="text/css"> 
/* place css box model fixes for IE 5* in this conditional comment */
.twoColFixLtHdr #sidebar1 { width: 230px; }
</style>
<![endif]--><!--[if IE]>
<style type="text/css"> 
/* place css fixes for all versions of IE in this conditional comment */
.twoColFixLtHdr #sidebar1 { padding-top: 30px; }
.twoColFixLtHdr #mainContent { zoom: 1; }
/* the above proprietary zoom property gives IE the hasLayout it needs to avoid several bugs */
</style>
<![endif]-->
</head>

<body class="twoColFixLtHdr">
<div id="topthing">
 	<p><a href="index.php">Home Page</a></p>
</div>
<div id="container">
  <div id="header">
    <h1>MajorLife: </h1><h3 style="margin-top:-15px;">where to live on UMW's campus</h3>
  <!-- end #header --></div>
  <div id="sidebar1">
 
    <p>An interactive website where UMW students can determine ideal residential choices based upon major and academic interests. Students can determine the time distribution of their presence in certain buildings, thus allowing them to find the most convenient location to live. Along with this will be informal commentary on each building as well as the social and academic nature of each major.</p>
  <!-- end #sidebar1 --></div>
  <div id="mainContent">
    <h1><a href="update.php">Update Majors</a></h1>
     <h1><a href="updatecomment.php">Update Comments</a></h1>
    <h1><a href="view.php">View</a></h1>
            <h1><a href="install.php">Install</a></h1>

   
					 
					<!-- CONTENT -->
				<div id="content">
			<h1>Installing</h1>
			<p>
<?php
			$host = 'localhost';
			$user = 'root';
			$pass = 'root';
			$database = 'majorlife';
			$db = new mysqli($host, $user, $pass);
            
            $sql = "CREATE DATABASE IF NOT EXISTS 'majorlife'";
            
            
			$database = $db->real_escape_string($database);
			
			print("<li> Connected to MySQL server</li>"); 
            
            $db->query("CREATE DATABASE IF NOT EXISTS $database");

		
			print("<li> Created database $database</li>");
            
            $db->select_db($database);


			print("<li> Selecting database</li>");

			$query = <<<EOT




DROP TABLE IF EXISTS `majors`;
CREATE TABLE IF NOT EXISTS `majors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `major` varchar(70) NOT NULL,
  `building` varchar(50) NOT NULL,
  `skill_level` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=catdog;

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `major` varchar(70) NOT NULL,
  `comments` blob NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=catdog;

CREATE TABLE IF NOT EXISTS `professor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `major` varchar(70) NOT NULL,
  `fav_professor` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=catdog;

EOT;

			$db->multi_query($query);

			print("<li> Filled in database.</li>");


			$dbconnect = fopen("../dbconnect.php", "w");
	
			fwrite($dbconnect, "<?php" . "\n");

			fwrite($dbconnect, "\$db = new mysqli('localhost', 'root', 'root', 'majorlife');" . "\n");
			fwrite($dbconnect, "or die (mysql_error());" . "\n");
            fwrite($dbconnect, "mysql_select_db('majorlife') or die(mysql_error());" . "\n");
			
			fwrite($dbconnect, "?>" . "\n");
			fclose($dbconnect);

			print("<li>Created dbconnect.php</li>");

?>
			</p>
		<!-- END CONTENT -->
					
				</div>
				 

	<!-- end #mainContent --></div>
	<!-- This clearing element should immediately follow the #mainContent div in order to force the #container div to contain all child floats --><br class="clearfloat" />
  <div id="footer">
    
  <!-- end #footer --></div>
<!-- end #container --></div>
</body>
</html>