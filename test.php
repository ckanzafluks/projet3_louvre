<?php

class XMLRPClientWordPress
{
       
    
    function sayHello()
    {
        $params = array();
        return $this->send_request('demo.sayHello',$params);
    }
}

$objXMLRPClientWordPress = new XMLRPClientWordPress("http://localhost/xmlrpc.php" , "admin" , "abbas");
$objXMLRPClientWordPress->sayHello();

die;
