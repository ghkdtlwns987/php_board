<?php
    $conn = mysqli_connect("localhost:3306", "root",  "sese3355", "abc_corp");
    if(!$conn){
    echo "db 에 연결하지 못했습니다.".mysqli_connect_error();
    }
    else{
        echo "db 에 접속했습니다.";
    }
    $view_num = $_GET['number'];
    $sql = "SELECT * FROM msg_board WHERE number = $view_num" ;
    $result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>view - abc 게시판</title>
</head>

<body>
    <h1>게시판</h1>
    <h2>글 내용</h2>
    <?php
    if($row = mysqli_fetch_array($result)){
    ?>        
    <h3>글번호 : <?= $row['number'] ?>/ 글쓴이 : <?= $row['name'] ?></h3>
    <div>
        <?= $row['message'] ?>
    </div>
    <?php
    }
    mysqli_close($conn);

    ?>
    <p><a href="index.php">메인화면으로 돌아가기</a></p>
    <p><a href="update.php?number=<?= $row['number'] ?>">수정하기</a></p>
</body>
</html>
