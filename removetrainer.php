<body>

    <?php

    session_start();
    include('mysqlconnection.php');

    $trainer_id = (int) $_POST['btn'];

    $sql = "DELETE from trainer where trainer_id like '$trainer_id';";

    if ($conn->query($sql) === TRUE) {

        header("location:adminwelcome.php");
    } else {
        //header("location:errorpage.php");
    }


    ?>

</body>