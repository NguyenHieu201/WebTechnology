<html>
<head>
<title>Create Table</title>
</head>
<body>
<?php 

try{
    
 
$server = '127.0.0.1';
$user = 'root';
$pass = 'ntk14121412';
$mydb = 'bussiness_service';
$table_name = 'catagories';
$biz_table_name = 'business';
$bizcat_table_name = 'biz_catagories';
$connect = mysqli_connect($server, $user, $pass);
if($_GET["cat_id"]){
    $cat_id = $_GET["cat_id"];
}
else {
    $cat_id=0;
}
if (!$connect) {
    
    die ("Cannot connect to $server using $user");
} else {
   
    $SQLcmd = "SELECT * from $table_name";
    $sqlbizcat = "SELECT * from $bizcat_table_name WHERE(CatagoriesID=$cat_id)";
    
    mysqli_select_db($connect,$mydb);
    if (mysqli_query($connect,$SQLcmd)){
        $res = mysqli_query($connect,$SQLcmd);
       
    } else {
        die ("Table Create Creation Failed SQLcmd=$SQLcmd");
    }
    if (mysqli_query($connect,$sqlbizcat)){
        $res1 = mysqli_query($connect,$sqlbizcat);
        
    } else {
        die ("Table Create Creation Failed SQLcmd=$SQLcmd");
    }
    
    //mysqli_close($connect);
}
}catch(Exception $ex){
   
    
}
?>
<div>
<table>
<tr>Click on biz cat</tr>

<?php
while ($row = mysqli_fetch_assoc($res)){
    
?>

<a href="http://localhost/LabProject/biz_listing.php?cat_id=<?php print $row["CatagoriesID"]?>">
<?php
print $row["Tittle"]
?>
</a>

<?php 
}?>
</table>
<table>
<tr>
Biz table

</tr>
<?php
while ($data = mysqli_fetch_assoc($res1)){
    $bizid = $data["BusinessID"];
    $bizquery = "SELECT * from $biz_table_name WHERE(BusinessID='$bizid')";
    $res2 = mysqli_query($connect, $bizquery);
    $data1 = mysqli_fetch_assoc($res2)
    
?>
<td><?php print $data1['BusinessID'] ?></td>
<td><?php print $data1['Namel']?></td>
<td><?php print $data1['Address']?></td>
<td><?php print $data1['City']?></td>
<td><?php print $data1['Telephone']?></td>
<td><?php print $data1['URL']?></td>
<td><?php print $cat_id?></td>


<?php 
}
?>
</table>
</div>
</body>
</html> 