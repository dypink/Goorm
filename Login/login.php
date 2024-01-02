<?php
    session_start();
    header("content-type: text/html; charset=UTF-8");
    $page = basename($_SERVER["PHP_SELF"]);
    $mode = $_REQUEST["mode"];
    $accessflag = $_SESSION["accessFlag"];
    $inputid = $_POST["input_id"];
    $inputpw = $_POST["input_pw"];
    $id = "testroot";
    $pw = "e7d3307ad9ae65ae140edffb7356b820";

    if($accessflag == "login") {
        if($mode == "logout") {
            unset($_SESSION["accessFlag"]);
            session_destroy();
            echo "<script>location.href='{$page}'</script>";
            exit();
        }
    } else {
        if($mode == "login" and $inputid == $id and md5($inputpw) == $pw) {
            $_SESSION["accessFlag"] = "login";
            echo "<script>location.href='{$page}'</script>";
            exit();
        } else if($mode == "login" and ($inputid != $id or md5($inputpw) != $pw)) {
            echo "<script>alert('계정이 일치하지 않습니다. 다시 시도해 주세요.');history.back(-1);</script>";
            echo "<script>location.href='{$page}'</script>";
            exit();
        }
        if($mode == "error_back") {
            echo "<script>location.href='{$page}'</script>";
            exit();
        }
    }
?>
<html>
<head>
    <title>ypink's Login</title>
</head>
<body>
<div style="margin:auto;text-align:center;">
<?php if($accessflag != "login") { ?>
    <br>
    <h1>Login</h1>
    <form action="<?=$page?>?mode=login" name="login_form" method="post">
        <input type="text" name="input_id" placeholder="ID">
        <br>
        <input type="password" name="input_pw" placeholder="PassWord">
        <br><br>
        <button type="submit" name="login_btn">Login</button>
    </form>
<?php } else { ?>
    <h1>Login Success</h1>
    <form action="<?=$page?>?mode=logout" method="post">
        <button type="submit" name="logout_btn">Logout</button>
    </form>
<?php } ?>
</div>
</body>
</html>