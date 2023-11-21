<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員登入</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="w-50 mx-auto">
            <h2 class="text-center mt-5">會員登入</h2>           
            <form class="m-auto col-6" action="./api/login.php" method="post">
                <?php
                    if(isset($_GET['error'])){
                        echo "<span style='color:red'>";
                        echo $_GET['error'];
                        echo "</span>";

                    }

                ?>
                <div class="input-group mb-3">
                    <input class="form-control" type="text" name="acc" id="acc" placeholder="請輸入帳號">
                </div>
                <div class="input-group mb-3">
                    <input class="form-control" type="text" name="pw" id="pw" placeholder="請輸入密碼">
                </div>                
               
                <div class="text-center">
                    <input class="btn btn-dark mx-2 mt-3 " type="submit" value="送出">
                    <input class="btn btn-light mx-2 mt-3" type="reset" value="重置">
                </div>
            </form>

        </div>
    </div>
</body>

</html>