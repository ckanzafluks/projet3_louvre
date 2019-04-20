<?php

class XMLRPClientWordPress
{
    var $XMLRPCURL = "";
    var $UserName  = "";
    var $PassWord = "";
    
    // Constructor
    public function __construct($xmlrpcurl, $username, $password)
    {
        $this->XMLRPCURL = $xmlrpcurl;
        $this->UserName  = $username;
        $this->PassWord = $password;
    }
    
    function send_request($requestname, $params)
    {
        phpinfo();die;
        //var_dump($requestname, $params);die;
        $request = xmlrpc_encode_request($requestname, $params);
        
	var_dump($request);die;
	$ch = curl_init();
        curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
        curl_setopt($ch, CURLOPT_URL, $this->XMLRPCURL);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 1);
        $results = curl_exec($ch);
        curl_close($ch);
        return $results;
    }
    
    function sayHello()
    {
        $params = array();
        return $this->send_request('demo.sayHello',$params);
    }
}

$objXMLRPClientWordPress = new XMLRPClientWordPress("http://localhost/xmlrpc.php" , "admin" , "abbas");
$objXMLRPClientWordPress->sayHello();

die;
