<?php
include_once "./include/connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員中心</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <header class="nav">
        <div class="nav-item col-4"></div>
        <div class="nav-item col-4">
            <ul class="d-flex justify-content-evenly">
                <li>1</li>
                <li>2</li>
                <li>3</li>
            </ul>
        </div>
        <div class="nav-item col-4">
            <?php
            if (isset($_SESSION['user'])) {
                echo "歡迎光臨" . $_SESSION['user'];
                echo "<a href='logout.php' class='btn btn-warning mx-2'> 登出 </a>";
                echo "<a href='member.php' class='btn btn-success mx-2'> 會員中心 </a>";
            } else {
            ?>
                <a href="reg.php" class="btn btn-primary mx-2">註冊</a>
                <a href="login_form.php" class="btn btn-success mx-2">登入</a>

            <?php
            }
            ?>
        </div>

    </header>
    <div class="container">
        <h1 class="text-center">使用者資料</h1>
        <?php

        if (isset($_SESSION['msg'])) {
            echo "<div class='alert alert-warning text-center col-4 m-auto'>";
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
            echo "</div>";
        }

        $sql = "select * from users where `acc`='{$_SESSION['user']}'";
        $user = $pdo->query($sql)->fetch();
        ?>

        </pre>
        <form action="./update.php" method="post" class="col-4 m-auto">
            <div class="input-group">
                <label class="col-3 input-group-text" for="">帳號:</label>
                <input class="form-control" type="text" name="acc" id="acc" value="<?= $user['acc']; ?>">
            </div>
            <div class="input-group">
                <label class="col-3 input-group-text" for="">密碼:</label>
                <input class="form-control" type="password" name="pw" id="pw" value="<?= $user['pw']; ?>">
            </div>
            <div class="input-group">
                <label class="col-3 input-group-text" for="">姓名:</label>
                <input class="form-control" type="text" name="name" id="name" value="<?= $user['name']; ?>">
            </div>
            <div class="input-group">
                <label class="col-3 input-group-text" for="">電子郵件:</label>
                <input class="form-control" type="text" name="email" id="email" value="<?= $user['email']; ?>">
            </div>
            <div class="input-group">
                <label class="col-3 input-group-text" for="">居住地:</label>
                <input class="form-control" type="text" name="address" id="address" value="<?= $user['address']; ?>">
            </div>
            <div class="text-center">
                <input class="form-control" type="hidden" name="id" id="id" value="<?= $user['id']; ?>">
                <input class="btn btn-primary mx-2 mt-3 " type="submit" value="更新">
                <input class="btn btn-warning mx-2 mt-3" type="reset" value="重置">
                <input class="btn btn-danger mx-2 mt-3" type="button" value="刪除" onclick="location.href='del_user.php?id=<?=$user['id'];?>'">

            </div>
        </form>
    </div>
</body>

</html>