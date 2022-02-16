<?php

$conn = mysqli_connect("localhost", "root",  "sese3355", "abc_corp");

if(!$conn){
    echo "db 에 연결하지 못했습니다.".mysqli_connect_error();
}
else{
    echo "db 에 접속했습니다.";
}
$sql = "SELECT * FROM msg_board";
$result = mysqli_query($conn, $sql);
$list = '';
while($row = mysqli_fetch_array($result)){
    $list = $list."<li>{$row['number']}: <a href=\"view.php?number={$row['number']}\">{$row['name']}</a></li>";
    echo '<ul>'.$list.'</ul>';
}
mysqli_close($conn);
?>