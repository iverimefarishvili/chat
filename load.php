<?php


$query = "SELECT name,comment,post_time from comments";
$comm = mysqli_query($conn,$query);

while($row=mysqli_fetch_array($comm)){
	$name=$row['name'];
	$comment=$row['comment'];
	$time=$row['post_time'];
?>
<div class="chats"><strong><?=$name?>:</strong> <?=$comment?> <p style="float:right"><?=date("j/m/Y g:i:sa", strtotime($time))?></p></div>
<?php
}
?>