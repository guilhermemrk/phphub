<!DOCTYPE html>
<html>

<head>
    <?php
      $page_title = 'Add Entry';
      echo "<title>{$page_title}</title>";
      include './bit/htmlconfig.php';
    ?>
</head>

<body>
    <main>
        <?php
          include './bit/header.php';
          include './bit/navbar.php';
        ?>
        <div class="container">
            <div class="formcontainer">
                <form action="./post/ep_addentity.php" method="POST">
                    <div class="line">
                        <div class="lineLabel">
                            <label for="name">Company</label>
                        </div>
                        <div class="lineInput">
                            <input class="textarea" type="text" id="companyn" name="companyn">
                        </div>
                    </div>
                    <div class="line">
                        <div class="lineLabel">
                            <label for="name">City</label>
                        </div>
                        <div class="lineInput">
                            <input class="textarea" type="text" id="city" name="city">
                        </div>
                    </div>
                    <div class="line">
                        <div class="lineLabel">
                            <label for="name">Phone</label>
                        </div>
                        <div class="lineInput">
                            <input class="textarea" type="text" id="phone" name="phone">
                        </div>
                    </div>
                    <div class="line">
                        <div class="lineLabel">
                            <label for="name">Email</label>
                        </div>
                        <div class="lineInput">
                            <input class="textarea" type="text" id="email" name="email">
                        </div>
                    </div>
                    <div class="line">
                        <div class="lineLabel">
                            <label for="name">Accountant Email</label>
                        </div>
                        <div class="lineInput">
                            <input class="textarea" type="text" id="aemail" name="aemail">
                        </div>
                    </div>
                    <div class="line">
                        <input class="button" type="submit" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </main>
    <?php include './bit/footer.php'; ?>
</body>

</html>
