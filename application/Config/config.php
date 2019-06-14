<?php
class DB {
public $connect;
	public function getConnection()
	{		
            
            $ip = explode(".", $_SERVER['HTTP_HOST']);                        
            if($ip[0]=='192' ||$_SERVER['HTTP_HOST']=='localhost')
                $con=mysqli_connect("localhost","root","","taxpay");
            else 
               $con=mysqli_connect("localhost","knebxnii_knebxnii","v@siml00k!me","knebxnii_taxpay"); 
		// Check connection
		if (mysqli_connect_errno())
	  	{
	  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  	}
		return $con;
	}	
	public function closeConnection($con)
	{
            //mysql_close($con);
            mysqli_close($con);
	}
}
?>