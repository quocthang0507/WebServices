<!DOCTYPE html>
<html>

<head>
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <h2>Nhập tên đăng nhập và mật khẩu</h2>
    <div class="container form-signin">
        <?php
        $msg = '';
        $users = array("admin" => "admin", "thanglq" => "thanglq"); //Mảng kết hợp
        $_SESSION['valid'] = false;

        if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])) {
            foreach ($users as $username => $password) {
                if ($username == $_POST['username'] && $password == $_POST['password']) {
                    $_SESSION['valid'] = true;
                    $_SESSION['timeout'] = time();
                    $_SESSION['username'] = $username;
                }
            }
        }
        ?>
    </div>
    <div class="container">
        <?php
        if (!$_SESSION['valid']) {
        ?>
            <form class="form-signin" role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <h4 class="form-signin-heading"><?php echo $msg; ?></h4>
                <input type="text" class="form-control" name="username" placeholder="Nhập tên đăng nhập" required autofocus>
                <br>
                <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu" required>
                <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Đăng nhập</button>
            </form>
        <?php
        } else {
            echo 'Xin chào ' . $username . ' đã đăng nhập thành công.';
        ?>
            <a href="logout.php" title="Đăng xuất">Đăng xuất</a>
        <?php
        }
        ?>
    </div>
</body>

</html>