<?php
session_start();
/**
 * Short description for thoughtcloud_registration.php
 *
 * @package thoughtcloud_registration
 * @author root <root@students>
 * @version 0.1
 * @copyright (C) 2014 root <root@students>
 * @license MIT
 */

if (!isset($_POST["roll"]))
{
  //replace echo with a shared variable for proper styling and use...
  echo "You haven't entered your roll number. Please do enter it.";
}
if (!isset($_POST["pass"]))
{
  //replace echo with a shared variable for proper styling and use...
  echo "You haven't entered your password. Please do enter it.";
}


$roll = strtoupper($_POST["roll"]);
$pass = $_POST["pass"];
//ldap auth with given roll and pass...
//Create a password hash
//$passwordhash = password_hash($pass);



  $ldapServer = "ldap.iitm.ac.in";
  $ldapPort = 389;
  $ldapDn = "cn=students,ou=bind,dc=ldap,dc=iitm,dc=ac,dc=in";
  $ldapPass = "rE11Bg_oO~iC";
  $ldapConn = ldap_connect($ldapServer, $ldapPort) or die("Could not connect to LDAP server.");  

  $studentUser = $roll;
  $studentPass = $pass;

  if($ldapConn) 
  {
    $ldapBind = ldap_bind($ldapConn, $ldapDn, $ldapPass);
    if($ldapBind)
    {
      //echo "Bound<br>";
      $filter = "(&(objectclass=*)(uid=".$studentUser."))";
      $ldapDn = "dc=ldap,dc=iitm,dc=ac,dc=in";
      $result = ldap_search($ldapConn, $ldapDn, $filter) or die ("Error in search query: ".ldap_error($ldapConn));   
      $entries = ldap_get_entries($ldapConn, $result);
      foreach($entries as $values => $values1)
      {
        $logindn = $values1['dn'];
      }
      $loginbind = ldap_bind($ldapConn, $logindn, $studentPass);
      if ($loginbind)
      {
         //echo "success";
      /*  $cookie_name="allow_access";
        $cookie_value=md5(uniqid(rand()));
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");*/
        //database connetion established
        $con=mysqli_connect("saarang.iitm.ac.in","student","13InstiWO","students_1415");
        if (mysqli_connect_errno()) 
        {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        $sql = "SELECT * FROM users WHERE username='$roll' ";
        echo $sql;
        $query = mysqli_query($con,$sql);
        $result=mysqli_fetch_array($query,MYSQLI_BOTH);
       //print_r($result);
        //Also, check if user is not present in students database...
        $_SESSION['username']= $result["username"];
        $_SESSION['name'] = $result["fullname"];
        $_SESSION['email'] = $result["email"];
        $_SESSION['gender'] = $result["gender"];
        $_SESSION['user_id']=$result['id'];
        
        mysqli_close($con);
        header('Location:../index.php'); 

       }
    }
  }
  ldap_unbind($ldapConn);


  //ldap authentication ends here//

  //connect to students database to retrieve user info...
 
?>

