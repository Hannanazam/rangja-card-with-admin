<?php
    require('database.php');

    $id = $_GET['id'];

    $q = " DELETE FROM `cards` WHERE id = $id ";

    mysqli_query($conn,$q);
    echo "
    <script type=\"text/javascript\">
    alert(123);
    </script>
";
    header('location:form.php');

?>