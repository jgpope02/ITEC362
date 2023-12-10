<!-- Joshua Pope 11/12/23 -->

<?php
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'dataForm');
    $conn = new mysqli (DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if($conn->connect_error) {
        die('Connection Failed ' . $conn->connect_error);
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $fname = $_POST["fName"];
        $lname = $_POST["lName"];
        $email = $_POST["email"];
        $phone = $_POST["phoneNum"];
        $notif = $_POST["notifAnswer"];
        $query = $conn->prepare("INSERT INTO user_inquiries (FirstName, LastName, EmailAddress, PhoneNumber, NotificationType)
        VALUES (?,?,?,?,?)");
        $query->bind_param('sssss',$fname, $lname, $email, $phone, $notif);
        $query->execute();
        $conn->close();
    }

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial=scale=1">

        <title>Form</title>
        <script>

        </script>
    </head>

    <form id="form1" method="POST">
        <h1>Contact Us</h1>
        <h5>First Name</h5>
        <input name="fName" placeholder="First Name..." style="border-radius: 3px;">
        <h5>Last Name</h5>
        <input name="lName" placeholder="Last Name..." style="border-radius: 3px;">
        <h5>Email</h5>
        <input name="email" placeholder="Email Address..." style="border-radius: 3px;">
        <h5>Phone Number</h5>
        <input name="phoneNum" placeholder="Phone Number..." style="border-radius: 3px;">
        <h5>Notifications</h5>
        <input type="radio" name="notifAnswer" id="radioEmail" value="Email">
        <label for="radioEmail">Email</label>
        <input type="radio" name="notifAnswer" id="radioPhone" value="Phone">
        <label for="radioPhone">Phone</label>
        <input type="radio" name="notifAnswer" id="radioBoth" value="Email & Phone">
        <label for="radioBoth">Email & Phone</label>
        <br>
        <button name="submit" type="submit" style="width: 100px; height: 100px; margin-top: 1rem;">Submit</button>
    </form>
</html>