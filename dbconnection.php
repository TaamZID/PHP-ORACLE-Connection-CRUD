<?php 
        try{
            $server = 'DESKTOP-U1M0RMC';
            $username = "SYSTEM";
            $password = "TAMZID";
            $service_name = 'XE';
            $sid = '';
            $port = 1521;

            $XE = "(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)(HOST = $server)(PORT = $port))(CONNECT_DATA = (SERVICE_NAME = $service_name) (SID = $sid)))";

            $db= new PDO("oci:dbname=" . $XE."; charset=utf8", $username, $password,[
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
            echo "Oracle DB Connected Successfully!";
        }catch(PDOException $e){
            echo $e->getMessage();
        }
?>
 
