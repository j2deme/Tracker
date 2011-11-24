<!-- footer.tpl -->
    </body>
</html>
<?php
//print_r($_SESSION);
if(isset($_SESSION['errors'])){
    $errors = $_SESSION['errors'];
    if(isset($errors['MSG'])){
        echo "<script>";
        $ml = new MyLib();
        echo $ml->Alert($errors['MSG'][0],$errors['MSG'][1]);
        echo "</script>";
    }
}
unset($_SESSION['errors']);
?>
