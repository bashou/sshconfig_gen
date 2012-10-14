<?php
require_once('connect.php');

echo "IdentitiesOnly yes\n";

$resultat = $bdd->query("SELECT * FROM sg_hosts ORDER BY id_zone,id_infra,id_srv ASC");
$resultat->setFetchMode(PDO::FETCH_OBJ);

while( $ligne = $resultat->fetch() )
{
	$host = $ligne->id_zone.".".$ligne->id_infra;
	if(!empty($ligne->id_srv)) $host .= ".".$ligne->id_srv;
	echo "Host ".$host."\n";

	if(!empty($ligne->hostname)) echo "\thostname ".$ligne->hostname."\n";
	if(!empty($ligne->user)) echo "\tuser ".$ligne->user."\n";
	if(!empty($ligne->port)) echo "\tport ".$ligne->port."\n";
	if(!empty($ligne->identityfile)) echo "\tidentityfile ".$ligne->identityfile."\n";
	if(!empty($ligne->proxycommand)) echo "\tproxycommand ".$ligne->proxycommand."\n";	
	
	echo "\n";
}
$resultat->closeCursor();
?>