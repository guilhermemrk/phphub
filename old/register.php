<!DOCTYPE html>
<html>

<head>
    <?php
    include_once './src/bit/login_verification.php';
    $page_title = 'Registration Form';
    echo "<title>{$page_title}</title>";
    include './src/bit/htmlconfig.php';
    ?>
</head>

<body>
    <main>
      <?php
      include './src/bit/header.php';
      ?>
        <div class="container-a">
            <div class="formcontainer">
                <form action="./src/post/hp_register.php" method="POST">
                    <div class="line">
                        <div class="lineLabel">
                            <label for="name">Name</label>
                        </div>
                        <div class="lineInput">
                            <input class="textarea" type="text" id="name" name="name">
                        </div>
                    </div>
                    <div class="line">
                        <div class="lineLabel">
                            <label for="email">Email</label>
                        </div>
                        <div class="lineInput">
                            <input class="textarea" type="email" id="email" name="email">
                        </div>
                    </div>
                    <div class="line">
                        <div class="lineLabel">
                            <label for="password">Password</label>
                        </div>
                        <div class="lineInput">
                            <input class="textarea" type="password" id="password" name="password">
                        </div>
                        <input class="button" type="submit" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </main>
    <?php include './src/bit/footer.php'; ?>
</body>

</html>
