<?php
require_once('connect.php');

$file = "/Users/nassim/.ssh/config_tmp";
$lines = file($file); 

for( $i = 0; $i < sizeof($lines); $i++ ) 
{
	// Recupere le host
    if (preg_match("/^host/", $lines[$i]) )  
    {
	
		if (!empty($id_zone) && !empty($id_infra) && !empty($hostname))
		{
			$query = "INSERT INTO sg_hosts(hostname,id_zone,id_infra,id_srv,user,port,identityfile,proxycommand) VALUES (\"".$hostname."\",\"".$id_zone."\",\"".$id_infra."\",\"".$id_srv."\",\"".$user."\",".$port.",\"".$identityfile."\",\"".$proxycommand."\")";
			$bdd->query($query);
			
			if($bdd->errorCode() > 0)
			{
				$errs = $bdd->errorInfo();
				print_r($errs);
				echo $query."\n";
			}
		}else{
			echo "Aie sur $id_zone.$id_infra.$id_srv !\n";
			echo "INSERT INTO sg_hosts(hostname,id_zone,id_infra,id_srv,user,port,identityfile,proxycommand) VALUES (\"".$hostname."\",\"".$id_zone."\",\"".$id_infra."\",\"".$id_srv."\",\"".$user."\",".$port.",\"".$identityfile."\",\"".$proxycommand."\")";
		}
	
		$id_zone = "";
		$id_infra = "";
		$id_srv = "";
		$hostname = "";
		$user = "";
		$port = 22;
		$identityfile = "";
		$proxycommand = "";
	
	
        $str = ereg_replace( "^(.*) ", "", $lines[$i] ); 
		$exp_str = explode(".",$str);

		switch($exp_str[0])
		{
			case "ftv":
			$id_zone = $exp_str[0].".".$exp_str[1];
			$id_infra = $exp_str[2];
			$id_srv = str_replace("\n","",$exp_str[3]);
			break;
			
			case "own":
			$id_zone = $exp_str[0].".".$exp_str[1];
			$id_infra = $exp_str[2];
			$id_srv = str_replace("\n","",$exp_str[3]);
			break;
			
			default:
			$id_zone = "";
			$id_infra = "";
			$id_srv = "";
			break;
		}
    }
	// Hostname (if present)
	if (preg_match("/hostname/", $lines[$i]) )  
    {
        $hostname = ereg_replace( "^(.*) ", "", $lines[$i] );
		$hostname = str_replace(" ","",$hostname);
		$hostname = str_replace("\n","",$hostname);
    }
	// User (if present)
	if (preg_match("/user/", $lines[$i]) )  
    { 
        $user = ereg_replace( "^(.*)user ", "", $lines[$i] ); 
		$user = str_replace(" ","",$user);
		$user = str_replace("\n","",$user);    }
	// Port (if present)
	if (preg_match("/port/", $lines[$i]) )  
    {
        $port = ereg_replace( "^(.*)port ", "", $lines[$i] );
		$port = str_replace(" ","",$port);
		$port = str_replace("\n","",$port);
    }
	// Proxycommand (if present)
	if (preg_match("/proxycommand/", $lines[$i]) )  
    { 
        $proxycommand = ereg_replace( "^(.*)proxycommand ", "", $lines[$i] );
		$proxycommand = str_replace("\n","",$proxycommand);
    }
	// Identityfile (if present)
	if (preg_match("/identityfile/", $lines[$i]) )  
    { 
        $identityfile = ereg_replace( "^(.*)identityfile ", "", $lines[$i] ); 
		$identityfile = str_replace(" ","",$identityfile);
		$identityfile = str_replace("\n","",$identityfile);
    }
}

?>