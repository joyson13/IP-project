<body>
    <?php

    session_start();
    unset($_SESSION['username']);
    session_destroy();
    header("location: site.php");

    ?>

    <script type='text/JavaScript'>
        window.location.replace('site.php');
</script>
</body>