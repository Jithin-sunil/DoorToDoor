
<?php
include('../Assests/Connection/Connection.php');
session_start();




 $selQry = "select * from tbl_chat c inner join tbl_user u on (u.user_id=c.chat_touid) or (u.user_id=c.chat_fromuid) where u.user_id='".$_SESSION["uid"]."' order by chat_datetime";
    $rowdis=$con->query($selQry);
     while($datadis=$rowdis->fetch_assoc())
  
    {
        if ($datadis["chat_fromwid"]==$_GET["id"]) {

            $selQry1= "select * from tbl_worker where worker_id ='".$_GET["id"]."'";
    $rowdis1=$con->query($selQry1);
     if($datadis1=$rowdis1->fetch_assoc())
  
{
            
?>

<div class="chat-message is-received">
    <img src="../Assests/Files/Worker/Photo/<?php echo $datadis1["worker_photo"] ?>" alt="">
    <div class="message-block">
        <span><?php echo $datadis1["worker_name"] ?></span>
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
    <img src="../Assests/Files/User/Photo/<?php echo $datadis["user_photo"] ?>" alt="">
    <div class="message-block">
        <span><?php echo $datadis["user_name"] ?></span>
        <div class="message-text"><?php echo $datadis["chat_content"] ?></div>
    </div>
</div>
        <div class="chat-message" style="margin: 0px; padding: 0px" >

</div>
<?php
    }

        }
    


?>