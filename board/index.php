<?php
  include ("login_check.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>abc 게시판</title>
</head>
<body>
  <h1>게시판</h1>
  <h2>글 목록</h2>
  <?php
      $conn = mysqli_connect("localhost:3306", "root",  "sese3355", "abc_corp");
      if(!$conn){
        echo "db 에 연결하지 못했습니다.".mysqli_connect_error();
      }
      else{
          echo "db 에 접속했습니다.\n";

          if(isset($_SESSION['id'])) {
            echo $_SESSION['id']; echo "님 안녕하세요";
  ?>
            <button onclick="location.href='logout.php'">로그아웃</button>
            <br/>
            <hr>
            <p><a href="write.php">글쓰기</a></p>
            <hr>
            <h2>글 검색</h2>
            <form action="search_result.php" method="post">
              <h3>삭제할 키워드를 입력하세요.</h3>
              <p>
                <label for="search">키워드:</label>
                <input type="text" id="search" name="skey">
              </p>
              <input type="submit" value="검색">
            </form>
            <hr>
            <h2>글 삭제</h2>
            <form action="delete.php" method="post">
              <h3>삭제할 메시지 번호를 입력하세요.</h3>
              <p>
                <label for="msgdel">번호:</label>
                <input type="text" id="msgdel" name="delnum">
              </p>
              <input type="submit" value="삭제">
            </form>
  <?php
          }
          else{
  ?>
            <a href="login.html">로그인해주세요</a> <br>
            <?php
          }
        }
        $sql = "SELECT * FROM msg_board";
        $result = mysqli_query($conn, $sql);
        $list = '';
        while($row = mysqli_fetch_array($result)){
          $list = $list."<li>{$row['number']}: <a href=\"view.php?number={$row['number']}\">{$row['name']}</a></li>";
        }
        echo $list;
      ?>
</body>
</html>
