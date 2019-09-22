<body>
    <h1>Hello</h1>

<h1 id ="hi">
    <?php
        $output = "42"; // Again, do some operation, get the output.
        echo $output;
        
    ?>
<h1 id="hello"></h1>
<form action="" method="POST" id="phptestform">
<input type='hidden' name='hidden-tag-1' id='hidden-tag-1'>
</form>
<h1><?php
$value = $_POST["hidden-tag-1"];
echo "The value is ".$value;
?></h1>
</h1>

<script>
    var div = document.getElementById("hi");
    var myData = div.textContent;
    myData = parseInt(myData,10) + 2;
    document.getElementById("hello").innerHTML = myData;
    document.getElementById("hidden-tag-1").value=55;
    document.getElementById("phptestform").submit();
</script>
</body>