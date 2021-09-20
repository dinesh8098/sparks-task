<?php include 'Functions.php';
$connect= new Functions();
$connection=$connect-> getConection();
$history="select * from history";
$historyval=$connect->select($connection,$history);
$nofhistory=$connect->noofRows($historyval);
$searchhistory=$_POST['searchno'];
$particularhistory="select * from history where transid=$searchhistory";
$parhistory=$connect->select($connection,$particularhistory);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Document</title>
</head>
<body class="bghis">
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
   <div class='search'>
        <input type='number' name='searchno' id='searchno' placeholder='ENTER THE TRANSACTION ID '>
        <button type='submit' name='search' id='search' >search</button></div></form>

<?php if($nofhistory > 0){ ?>
  
    <?php if($connect->postof($searchhistory)){?>
        <div class='history history1'>
        <table id='short'><tr><th>SENDER</th><th>SENDER NAME</th><th>RECIEVER</th><th>RECIEVER NAME</th><th>TRANSACTION AMOUNT</th><th>TRANSACTION ID</th><th>TIME</th></tr>
        <?php while($data=$connect->fetchData($parhistory)){?>
            <tr><td><?php echo $data['sender'] ?></td><td><?php echo $data['sendername'] ?></td><td><?php echo $data['reciever'] ?></td><td><?php echo $data['recievername'] ?></td><td><?php echo $data['transamount'] ?></td><td><?php echo $data['transid'] ?><td><?php echo $data['time'] ?></td></tr>
            <?php }?>
</table></div>
            <?php } else{ ?>
        <div class='history'>
        <table><tr><th>SENDER</th><th>SENDER NAME</th><th>RECIEVER</th><th>RECIEVER NAME</th><th>TRANSACTION AMOUNT</th><th>TRANSACTION ID</th><th>TIME</th><th>STATUS</th></tr>
        <?php while($data=$connect->fetchData($historyval)){?>
    <tr><td><?php echo $data['sender'] ?></td><td><?php echo $data['sendername'] ?></td><td><?php echo $data['reciever'] ?></td><td><?php echo $data['recievername'] ?></td><td><?php echo $data['transamount'] ?></td><td><?php echo $data['transid'] ?></td><td><?php echo $data['time'] ?></td><td><?php echo $data['status'] ?></td></tr></div>
    <?php }?>
</table></div>
    <?php }?>
</table>
 <?php }?>


</div>
</body>
</html>