Also add the PHP isset function, and also find out about sanitation:<br>
http://code.tutsplus.com/tutorials/sanitize-and-validate-data-with-php-filters--net-2595
 <br><br>
THIS is the receiving file: webform2.php: <br>
<br>
NB The procedural version of mysqli is being used below
 
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
$TransNo = 0;
$CustNo = '';
$TransDate = '';
$AmtPaid = '';
$Notes ='';
$CustFN ="";
$CustEmail = "";

 
$link = mysqli_connect("localhost", "my_user", "my_password", "myDBname");
// for example: $link = mysqli_connect("mywebsite.com", "root", "#$*12UeGD*Qdf", "myDBname");
 
/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
/* change character set to utf8 */
if (!mysqli_set_charset($link, "utf8")) {
    printf("Error loading character set utf8: %s\n", mysqli_error($link));
} else {
echo "";
    //printf("Current character set: %s\n", mysqli_character_set_name($link));
}
 
 
$TransNo = $_POST['TransNo'];
$CustNo = $_POST['CustNo'];
$TransDate = $_POST['TransDate'];
$D1 = $TransDate;
$D2 = explode("/", $D1);
$TransDate = $D2[2]."-".$D2[1]."-".$D2[0];
echo $TransDate;         
$charset = mysqli_character_set_name($link);//check for UTF-8
$AmtPaid = $_POST['AmtPaid'];
$Notes = $_POST['Notes'];
$Notes = str_replace('"', '&quot;', $Notes);  //for mailto: emails.
$Notes = htmlentities( $Notes, ENT_SUBSTITUTE );
  //and also header: charset=UTF-8"   WORKS LIKE A CHARM 2014
$Notes = mysqli_real_escape_string($link, $Notes);
  
$TransNoInt = intval($TransNo);
$query="insert into transactions2 (TransNo, CustNo, TransDate, AmtPaid, Notes)
VALUES ( ?,  ?, '?', ?, '?') ";

echo '<br>';

if ($stmt = mysqli_prepare($link, $query)) {

    /* bind parameters for markers */
    mysqli_stmt_bind_param($stmt, "sssss", transactions2); //untested

    /* execute query */
    mysqli_stmt_execute($stmt);

    /* bind result variables */
    mysqli_stmt_bind_result($stmt, $TransNo,  $CustNo, '$TransDate', $AmtPaid, '$Notes');

    /* fetch value */
    mysqli_stmt_fetch($stmt);

    //printf("%s is in district %s\n", $city, $district);

    /* close statement */
    mysqli_stmt_close($stmt);
}



//mysqli_query($link, $query);
echo "<font size = 4 color = red>".mysqli_error($link)."</font>";
if (mysqli_affected_rows($link) == -1)
echo "<font size = 5  color = red><b><b>insert into transactions NOT successful!</b></font><br>$query<br>";
else
echo "<font size = 4>insert success! </font><br>";
