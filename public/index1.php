<?php
//echo "doen";
     if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Database connection parameters
        $server = "localhost";
        $username = "root";
        $password = "";
        //$database = "forservision"; // Your database name
    
        // Create a database connection
        $conn = mysqli_connect($server, $username, $password);
    
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    
        if (isset($_POST['Username']) && isset($_POST['Email']) && isset($_POST['Password'])) {
            // Signup form submitted
            $Username = $_POST['Username'];
            $Email = $_POST['Email'];
            $Password = $_POST['Password'];
    
            // Check if the username or email already exists in the logintab table
            $checkQuery = "SELECT * FROM logintab WHERE olduser='$Username' OR oldemail='$Email'";
            $result = mysqli_query($conn, $checkQuery);
    
            if (mysqli_num_rows($result) > 0) {
                // User already exists
                echo "User with this username or email already exists. Please choose a different username or email.";
            } else {
                // User does not exist, insert the new user into the logintab table
                $insertQuery = "INSERT INTO `forservision`.`logintab` (olduser, oldemail, oldpass, date) VALUES ('$Username', '$Email', '$Password', NOW())";
    
                if (mysqli_query($conn, $insertQuery)) {
                    echo "Signup successful. You can now sign in.";
                } else {
                    echo "Error: " . $insertQuery . "<br>" . mysqli_error($conn);
                }
            }
        } elseif (isset($_POST['olduser']) && isset($_POST['oldpass'])) {
            // Signin form submitted
            $olduser = $_POST['olduser'];
            $oldpass = $_POST['oldpass'];
    
            // Check if the provided username and password match in the logintab table
            $signinQuery = "SELECT * FROM logintab WHERE olduser='$olduser' AND oldpass='$oldpass'";
            $result = mysqli_query($conn, $signinQuery);
    
            if (mysqli_num_rows($result) > 0) {
                // User found, allow access or redirect as needed
                echo "Signin successful. You can now access your account.";
            } else {
                // User not found or incorrect credentials
                echo "Invalid username or password. Please try again.";
            }
        }
    
        // Close the database connection
        mysqli_close($conn);
    }
?>
