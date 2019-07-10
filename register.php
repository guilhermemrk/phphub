<!DOCTYPE html>
<html>

<head>
    <?php $page_title = 'Registration Form';
    echo "<title>{$page_title}</title>"
    ?>
    <link rel="stylesheet" href="./css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <main>
      <?php
      include './bit/header.php';
      ?>
        <div class="container">
            <div class="formRegister">
                <form action="./post/p_register.php" method="POST">
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
</body>

</html>
