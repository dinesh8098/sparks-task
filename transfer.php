<?php
include 'particulardetails.php';
session_start();
$connect= new Functions();
$connection=$connect-> getConection();
$sql="select * from bank";
$dataconnect=$connect->select($connection,$sql);
$noofrows=$connect->noofRows($dataconnect);
$detailvalue=$_POST['id'];
$personal=$_POST['transfer'];
$detailval=new particulardetails();
$detailsrow=$detailval->details($detailvalue);
$perdetail=$detailval->dataconnectiondetails($detailvalue);
$_SESSION["sender"]=$detailvalue;


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Banking</title>
</head>
<body class='bg'>
<nav>
   
   <div class='navbar'>
   <div class='logo'>
   <h3><span class="m">S</span><span class="e">p</span><span class="g">a</span><span class="a">r</span><span class='g'>k</span><span class="m">s&nbsp</span><span class="e">b</span><span class="g">a</span><span class="a">n</span><span class="g">k</span>
       </h3>    </div>
   <ul>
   
             <li><a href="index.php">HOME</a></li>
             <li><a href="transfer.php">TRANSFER</a></li>
             <li><a href="history.php">HISTORY</a></li>
   
           </ul>
   </div>
   </nav>

<form method='POST' action="<?php htmlspecialchars($_SERVER[" PHP_SELF"]) ?>">
<div class='details'>
<?php 
if($noofrows > 0){?>
<table><tr><th>name</th><th>account balance</th><th>email</th><th>account no</th><th> select</th></tr>
<?php while($data=$connect->fetchData($dataconnect)){?>
<tr><td class='upper'><?php echo $data['name'] ?></td><td class='upper'><?php echo $data['current_bal'] ?></td><td> <?php echo $data['email'] ?> </td><td class='upper'><?php echo $data['phone'] ?> </td><td><button type='submit' name='id' class='select-transfer' value='<?php echo $data['phone'] ?>'>SELECT</button><td></tr>
<?php 
}?>
</table>

<?php }?></div>
</form>

<?php 
if ($detailsrow > 0){
    
    while($pardata=$connect->fetchData($perdetail)){?>
       <div class='parlogo '>
       <div class='parimage'><img src='logo.png'>
       <div class='cancelb'>
       <button class='back'><img src="cancel-button.png" alt="cancel"></button>
       </div></div>
       <form method='POST' action="amount.php">
    <table><tr><td class='upper'>NAME</td><td class='upper'><?php echo $pardata['name']?></td></tr><tr><td class='upper'>ACCOUNT NUMBER</td><td><?php echo $pardata['phone']?></td></tr><tr><td class='upper'>EMAIL</td><td><?php echo $pardata['email'] ?></td></tr></table>
    <button class='btns' name='transfer' value='<?php echo $pardata['phone']?>'>TRANSFER</button>
</div>
    <?php }}?>
</form>
<script src='script/transfer.js'></script>
</body>
</html>