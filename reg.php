<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scanamele=1.0">
    <title>會員註冊</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <div id="app" class="container">
        <?php
        include "./include/header.php";
        ?>
        <h2 class="text-center">會員註冊</h2>
        <form action="./api/add_user.php" method="post" class="col-4 m-auto">
            <div class="input-group">
                <label class="col-3 input-group-text" for="">帳號:</label>
                <input class="form-control" type="text" name="acc" id="acc">
            </div>
            <div class="input-group">
                <label class="col-3 input-group-text" for="">密碼:</label>
                <input class="form-control" type="password" name="pw" id="pw">
            </div>
            <div class="input-group">
                <label class="col-3 input-group-text" for="">姓名:</label>
                <input class="form-control" type="text" name="name" id="name">
            </div>
            <div class="input-group">
                <label class="col-3 input-group-text" for="">電子郵件:</label>
                <input class="form-control" type="text" name="email" id="email">
            </div>
            <div class="input-group">
                <label class="col-3 input-group-text" for="">居住地:</label>
                <input class="form-control" type="text" name="address" id="address">
            </div>
            <div class="text-center">
                <input class="btn btn-primary mx-2 mt-3 " type="submit" value="送出">
                <input class="btn btn-warning mx-2 mt-3" type="reset" value="重置">
            </div>
        </form>

    </div>
    <?php
    include "./include/footer.php";
    ?>
</body>

</html>