<html>
<head>
<title>Query</title>
</head>
<body>
<?php 

try{
    
 
$server = 'localhost';
$user = 'root';
$pass = 'ntk14121412';
$mydb = 'bussiness_service';
$table_name = 'catagories';
$connect = mysqli_connect($server, $user, $pass);


if (!$connect) {
    
    die ("Cannot connect to $server using $user");
} else {
    $sql = "SELECT * from $table_name";
    $sqlCmd = "INSERT INTO $table_name VALUES ('0','{$tittle}','{$desc}');";;
   
    mysqli_select_db($connect,$mydb);
   // if (mysqli_query($connect, $sql)) {
    //    $result = mysqli_query($connect, $sql);
        
     //    Return the number of rows in result set
      //  $rowcount = mysqli_num_rows( $result );
    
        
    //}
   
   // $SQLcmd = "INSERT INTO $table_name (ProductID, Product_desc, Cost, Weight, Numb) VALUES ('0','{$desc}','{$cost}','{$weight}','{$num}');";
    if($id){
        if(mysqli_query($connect, $sqlCmd)){
            print $sqlCmd;
        }
        else {
            die ("Table Create Creation Failed SQLcmd=$SQLcmd");
            
        }
        
    }
    
    
    
    if (!mysqli_query($connect,$sql)){
        print "hello";
        die ("Table Create Creation Failed SQLcmd=$SQLcmd");
       
        
    } else {
        $result = mysqli_query($connect, $sql);
        print "<br>SQLcmd=$sql";
        
        
        
    }
   
    mysqli_close($connect);
}
}catch(Exception $ex){
   
    
}
?>
<form action="adminadded.php" method="get">
<table border ="1" cellspacing="0" cellpadding="10">
        <tr>
        <th>CatagoriesId</th>
        <th>Tittle</th>
        <th>Description</th>
        
        </tr>
        <?php
        if (mysqli_num_rows($result) > 0) {
            $sn=1;
            while($data = mysqli_fetch_assoc($result)) {
                ?>
 <tr>
   
   <td><?php echo $data['CatagoriesID']; ?> </td>
   <td><?php echo $data['Tittle']; ?> </td>
   <td><?php echo $data['Description']; ?> </td>
  
 <tr>
 <?php
  $sn++;}} else { ?>
    <tr>
     <td colspan="8">No data found</td>
    </tr>
 <?php } ?>
 <tr>
 <td><input name="ID"></td>
 <td><input name = "tittle"></td>
 <td><input name="desc"></td>
 </tr>
 </table>
 <input type="submit" value="Add catagories">
 </form>
</body>
</html> 