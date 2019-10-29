<body>


    <?php


    session_start();
    if (!$_SESSION['IsLogged']) {
        session_destroy();
        header("location:errorpage.php");
    }


    include('mysqlconnection.php');

    $routine_text = $_POST['routine-text'];
    $trainer_id = (int) $_SESSION['trainer_id'];
    $customer_id = (int) $_SESSION['customer_id'];
    $sql = "INSERT INTO customer_routine (customer_id,trainer_id,routine,routine_date) VALUES ('$customer_id','$trainer_id','$routine_text',NOW());";

    if ($conn->query($sql) === TRUE) {
        header("location:trainer-customerprofile.php?data1=" . $customer_id);
    } else {
        //header("location:errorpage.php");
    }

    ?>


</body>