<?php

/**
 * @author Ravi Tamada
 * @link http://www.androidhive.info/2012/01/android-login-and-registration-with-php-mysql-and-sqlite/ Complete tutorial
 */

include("config.php");

// json response array
//$response = array("error" => FALSE);

if (isset($_POST['email']) && isset($_POST['password'])) {

    // receiving the post params
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * from members where Id='$email' and pass='$password'";
		  $result = mysqli_query($db,$sql);
		  $count = mysqli_num_rows($result);
		  $user = mysqli_fetch_assoc($result);

    if ($count == 1) {
        // use is found
        $response["data"]["error"] = FALSE;
        $response["user"]["Id"] = $user["Id"];
        $response["user"]["FirstName"] = $user["FirstName"];
        $response["user"]["dept"] = $user["dept"];
        $response["user"]["pass"] = $user["pass"];
        echo json_encode($response);
    } else {
        // user is not found with the credentials
        $response["data"]["error"] = TRUE;
        $response["data"]["error_msg"] = "Login credentials are wrong. Please try again!";
        echo json_encode($response);
    }
} else {
    // required post params is missing
    $response["data"]["error"] = TRUE;
    $response["data"]["error_msg"] = "Required parameters email or password is missing!";
    echo json_encode($response);
}
?>

