<?php
include('./includes/header.php');

if (isset($_POST['full_name'])) {

    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $pass = md5($_POST['pass']);
    // $conf_pass = md5($_POST['conf_pass']);

    $sql = "select * from users where u_email='$email'";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        if (mysqli_num_rows($query) > 0) {
            echo "
                <script>
                    alert('Email is already registered')
                </script>
            ";
        } else {
            if (is_numeric($number)) {
                $sql1 = "insert into users(u_email,u_pass,u_name,u_phone) values ('" . $email . "','" . $pass . "','" . $full_name . "','" . $number . "')";
                $query1 = mysqli_query($conn, $sql1);

                if ($query1) {
                    echo "
                <script>
                    alert('Registered successful')
                </script>
            ";
                } else {
                    echo "
                <script>
                    alert('something went wrong, please try again..')
                </script>
            ";
                }
            }else{
                echo "
                <script>
                    alert('Enter a valid phone number')
                </script>
            ";
            }
        }
    } else {
        $sql2 = $sql1 = "insert into users(u_email,u_pass,u_name,u_phone) values ('" . $email . "','" . $pass . "','" . $full_name . "','" . $number . "')";
        $query2 = mysqli_query($conn, $sql2);

        if ($query2) {
            echo "
                <script>
                    alert('Registered successful')
                </script>
            ";
        } else {
            echo "
            <script>
                alert('something went wrong, please try again')
            </script>
        ";
        }
    }
}

?>
<!-- form div -->
<div class="magindiv" style="height: 100px;"></div>

<div class="formDiv">
    <h2>Register</h2>
    <p>Welcome to Car<span>2Go</span></p>
    <form action="./register.php" method="post">
        <div class="inputDiv">
            <i class='bx bx-user'></i>
            <input type="text" name="full_name" placeholder="Full Name" required>
        </div>
        <div class="inputDiv">
            <i class='bx bx-envelope'></i>
            <input type="email" name="email" placeholder="Email" required>
        </div>
        <div class="inputDiv">
            <i class='bx bx-phone'></i>
            <input type="text" name="number" placeholder="Phone No." required>
        </div>
        <div class="inputDiv">
            <i class='bx bx-lock-alt'></i>
            <input type="password" name="pass" placeholder="Password" required>
        </div>

        <!-- <div class="inputDiv">
            <i class='bx bx-lock-alt'></i>
            <input type="password" name="conf_pass" placeholder="Confirm Password" required>
        </div> -->
        <input type="submit" value="Register" class="btn">
        <p>Already have an account ? <a href="./login.php">Login</a></p>
    </form>
</div>

<?php
include('./includes/script.php')
?>