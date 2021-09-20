<?php
session_start();
class Functions{
    public function getConection(){
        $conn = mysqli_connect("localhost", "dinesh", "dinessh@123", "bank");
        if (!$conn)
        {
            die("Connection failed: " . mysqli_connect_error());
        }

        return $conn;
    }

    public function select($conn,$sql){
        $value = mysqli_query($conn, $sql);

        return $value;

    }

    public function serverreq(){
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            return 1;
        }
    }

    public function noofRows($data){

        return $data->num_rows ;
        }
    

    public function fetchData($result){

        return $result->fetch_assoc();

        
    }
    public function postof($value){
        if(isset($value)){
            return 1;
        }
    }
    public function timee(){
        $timestamp = time();
        return date("F d, Y h:i:s A", $timestamp);
    }
    public function timeupdate($amountcheck,$senderaccno,$recieveraccno,$amount,$amounttransfer,$status,$sendername,$recievername){
        if ($status == 1){
            $statusval='success';
        }
        else{
            $statusval='failed';
        }
        if($amountcheck  == 1){
           
             $connection=$this->getConection();
             $timeup=$this->timee();
             $timesqli="insert into history(sender,reciever,transamount,transid,time,status,sendername,recievername) values('$senderaccno','$recieveraccno','$amount','$amounttransfer','$timeup','$statusval','$sendername','$recievername')";
             $timrcon= $this->select($connection,$timesqli);
    }
    }

    public function transaction($senderamount,$recieveramount,$transactionamount){
        
        $connection=$this->getConection();
        $send="select * from bank where phone='$senderamount'";
        $senderconnect=$this->select($connection,$send);
        $recieve="select * from bank where phone='$recieveramount'";
        $recieveconnect=$this->select($connection,$recieve);
        $sendervalue=$this->fetchData($senderconnect);
        $recievevalue=$this->fetchData($recieveconnect);
        $senderacc=$sendervalue['current_bal'] ;
        $recieveracc=$recievevalue['current_bal'];
        

        if($senderacc > $transactionamount){
            $replacedsender=$senderacc - $transactionamount;
            $replacedreciever=$recieveracc + $transactionamount;
           
            
            
            $sql = "update bank set current_bal = '$replacedsender' where phone=$senderamount";
            $selectsender=$this->select($connection,$sql);
            $mysql = "update bank set current_bal= '$replacedreciever' where phone=$recieveramount";
            $selectreciever=$this->select($connection,$mysql);
            
           
            return 1;

        }
        else{
            return 0;
        }

    }
}
?>





