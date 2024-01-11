<?php
    header("Content-Type: text/html; charset=UTF-8");
    $db_servername = "localhost";
    $db_username = "pink";
    $db_password = "pink";
    $db_name = "board_db;
    $db_conn = new mysqli($db_servername, $db_username, $db_password, $db_name);
    $db_query_create = "CREATE DATABASE board_db";
    $db_query_create_table = "CREATE TABLE board(Title VARCHAR(50), Writer VARCHAR(30), Contents TEXT)";
    $db_query_all = "SELECT * FROM board";

    if($db_conn -> connect_error){
        echo "<script>alert('DB Error');</script>";
    }

    $db_result_all = mysqli_query($db_conn, $db_query_all);
    /* if(!$db_result_all){
        $result_db = mysqli_query($db_conn, $db_query_create);
        $result_table = mysqli_query($db_conn, $db_query_create_table);
    } */
?>
<!DOCTYPE html>
<head>
    <title>게시판</title>
</head>
<body>
    <h1>게시판</h1>
    <table>
        <th>
            <td>제목</td>
            <td>작성자</td>
        </th>
        <?php
            for($i=0; $i<len($db_result_all); $i++){
        ?>
                <td>db_result_all[<?=$i?>][0]</td>
                <td>db_result_all[<?=$i?>][1]</td>
        <?php
            }
        ?>
    </table>
    <br>
    <button type="button">작성하기</button>
</body>
</html>