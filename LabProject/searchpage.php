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
$mydb = 'CNWebDatabase';
$table_name = 'Products';
$connect = mysqli_connect($server, $user, $pass);
$search = $_GET["searchfield"];

if (!$connect) {
    
    die ("Cannot connect to $server using $user");
} else {
    $sql = "SELECT * from $table_name WHERE Product_desc = '$search'";
   
    mysqli_select_db($connect,$mydb);
   // if (mysqli_query($connect, $sql)) {
    //    $result = mysqli_query($connect, $sql);
        
     //    Return the number of rows in result set
      //  $rowcount = mysqli_num_rows( $result );
    
        
    //}
   
   // $SQLcmd = "INSERT INTO $table_name (ProductID, Product_desc, Cost, Weight, Numb) VALUES ('0','{$desc}','{$cost}','{$weight}','{$num}');";
 
    
    
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

<table border ="1" cellspacing="0" cellpadding="10">
        <tr>
        <th>ProductId</th>
        <th>Product desc</th>
        <th>const</th>
        <th>number available</th>
        <th>Weight</th>
        </tr>
        <?php
        if (mysqli_num_rows($result) > 0) {
            $sn=1;
            while($data = mysqli_fetch_assoc($result)) {
                ?>
 <tr>
   
   <td><?php echo $data['ProductID']; ?> </td>
   <td><?php echo $data['Product_desc']; ?> </td>
   <td><?php echo $data['Cost']; ?> </td>
   <td><?php echo $data['Numb']; ?> </td>
   <td><?php echo $data['Weight']; ?> </td>

 <tr>
 <?php
  $sn++;}} else { ?>
    <tr>
     <td colspan="8">No data found</td>
    </tr>
 <?php } 
 ?>
 </table>
</body>
</html> 