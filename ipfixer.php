<?php
	$newinfo = $_GET['field'];
	$hostnamez = $_GET['hostname'];
	
	if ($newinfo == "publicfield")
	{
		$ipz = $_SERVER['REMOTE_ADDR'];
		
		
		// write the xml file
		
		  $sats = array();
		  $sats [] = array(
		  'host' => "$hostnamez",
		  'ip' => "$ipz"
		  );
		  
		  
		  
		  $doc = new DOMDocument();
		  $doc->formatOutput = true;
		  
		  $r = $doc->createElement( "sats" );
		  $doc->appendChild( $r );
		  
		  foreach( $sats as $sat )
		  {
		  $b = $doc->createElement( "sat" );
		  
		  $host = $doc->createElement( "host" );
		  $host->appendChild(
		  $doc->createTextNode( $sat['host'] )
		  );
		  $b->appendChild( $host );
		  
		  $ip = $doc->createElement( "ip" );
		  $ip->appendChild(
		  $doc->createTextNode( $sat['ip'] )
		  );
		  $b->appendChild( $ip );
		  $r->appendChild( $b );
		  }
		  
		  echo $doc->saveXML();
		  $doc->save("sat.xml");
	}
?>