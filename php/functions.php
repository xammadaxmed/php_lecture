<?php
define("ENV","development");
define('HOST','localhost');
define('USER','root');
define('PASSWORD','');
define('DATABASE','test');
session_start();

$GLOBALS["connection"]=null;

connect();
function connect()
{
    $con = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
    if (!$con) {
        echo "MySQL connection failed!!";
        die();
    }
    else
    {
        $GLOBALS['connection']=$con;
    }
    return $con;
}



/**
 * @param string $query
 *@return array
 */

function Query($query)
{
    $arrReturn=[];
    if(empty($GLOBALS["connection"]))
    {
        connect();
    }

    $result = mysqli_query($GLOBALS["connection"], $query);

    if ($result) {

        $arrReturn['status']=true;
        $arrReturn['result']=$result;

    }

    else
    {
        $error="Something went wrong";
        if(ENV=="development")
        {
            $error= mysqli_error($GLOBALS['connection']);
        }

        $arrReturn['status']=false;
        $arrReturn['message']=$error;
    }

    
    return $arrReturn;
}

function Fetch($query_result)
{
    return  mysqli_fetch_assoc($query_result);
}


function flash($message,$type="success")
{
   $message_class="success";
   if($type=="error")
   {
    $message_class="danger";   
   }
 
    $html="<div class='alert alert-$message_class text-center'>$message</div>";
    $_SESSION['flash_message']=$html;
}



function get_flash()
{
    $message="";
    if(isset($_SESSION['flash_message']))
    {
        $message=$_SESSION['flash_message'];
        unset($_SESSION['flash_message']);
    }
    echo $message;
}


