<!DOCTYPE html>
<html>

<head>
    <?php $page_title = 'Login';
    echo "<title>{$page_title}</title>";
    include './bit/htmlconfig.php';
    ?>
</head>

<body>
    <main>
        <?php
        include './bit/header.php';
        ?>
        <div class="container">
            <div class="formcontainer">
                <form action="./post/p_login.php" method="POST">
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
