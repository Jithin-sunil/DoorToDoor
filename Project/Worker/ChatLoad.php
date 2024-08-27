
<?php
include("../Assests/Connection/Connection.php");
session_start();




 $selQry = "select * from tbl_chat c inner join tbl_worker b on (b.worker_id=c.chat_towid) or (b.worker_id=c.chat_fromwid) where b.worker_id='".$_SESSION["wid"]."' order by chat_datetime";
    $rowdis=$con->query($selQry);
     while($datadis=$rowdis->fetch_assoc())
  
    {
        if ($datadis["chat_fromuid"]==$_GET["id"]) {

            $selQry1= "select * from tbl_user where user_id  ='".$_GET["id"]."'";
    $rowdis1=$con->query($selQry1);
     if($datadis1=$rowdis1->fetch_assoc())
  
{
            
?>

<div class="chat-message is-received">
    <img src="../Assests/Files/User/Photo/<?php echo $datadis1["user_photo"] ?>" alt="">
    <div class="message-block">
        <span><?php echo $datadis1["user_name"] ?></span>
        <div class="message-text"><?php echo $datadis["chat_content"] ?></div>
    </div>
</div>
    <div class="chat-message" style="margin: 0px; padding: 0px" >

</div>

<?php
        }

} else {
    
?>
<div class="chat-message is-sent">
    <img src="../Assests/Files/Worker/Photo/<?php echo $datadis["worker_photo"] ?>" alt="">
    <div class="message-block">
        <span><?php echo $datadis["worker_name"] ?></span>
        <div class="message-text"><?php echo $datadis["chat_content"] ?></div>
    </div>
</div>
        <div class="chat-message" style="margin: 0px; padding: 0px" >

</div>
<?php
    }

        }
    


?>