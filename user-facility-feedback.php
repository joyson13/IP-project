<body>

    <?php


    session_start();
    include('mysqlconnection.php');
    $branch_id = (int) $_SESSION['branch_id'];
    $facility_raiting = (int) $_POST['facility-ratings'];
    $facility_feedback = $_POST['feedback-text'];
    $customer_id = (int) $_SESSION['customer_id'];
    //echo "<h1>".$trainer_id."</h1>";
    //echo "<h1>".$trainer_feedback."</h1>";

    $sql = "INSERT INTO customer_facility_feedback(customer_id,branch_id,feedback,facility_rating,feed_back_date) VALUES ('$customer_id','$branch_id','$facility_feedback','$facility_raiting',NOW());";

    if ($conn->query($sql) === TRUE) {
        header("location:welcome.php");
    } else {
        //header("location:errorpage.php");
    }


    ?>



</body>