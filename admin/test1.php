<?php
if(count($_COOKIE) > 0) {
    echo "Cookies are enabled.";
    print_r($_COOKIE);
} else {
    echo "Cookies are disabled.";
}
?>

<?php   
/*    $id = "id";
    if(isset($_COOKIE[$id]))
    {
        $sid = $_COOKIE[$id];
        session_id($sid);
    }
    
    echo $_COOKIE[$id];

    session_start();

    echo $_SESSION["id"];*/
?>