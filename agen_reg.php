<?php
include "./includes/agen_header.php";

if (isset($_POST['emp_name'])) {
    $emp_name = $_POST['emp_name'];
    $emp_agency = $_POST['emp_agency'];
    $emp_email = $_POST['emp_email'];
    $emp_phone = $_POST['emp_phone'];
    $pass = md5($_POST['pass']);
    $conf_pass = md5($_POST['conf_pass']);

    if ($pass == $conf_pass) {
        $sql = "select * from emp where emp_email='" . $emp_email . "'";
        $query = mysqli_query($conn, $sql);

        if (mysqli_num_rows($query) > 0) {
            echo "
            <script>
                alert('Email is already registred..')
            </script>
        ";
        } else {
            if (is_numeric($emp_phone)) {
                $sql1 = "insert into emp(emp_name,emp_agency,emp_email,emp_phone,emp_pass) values('$emp_name','$emp_agency','$emp_email','$emp_phone','$pass')";
                $query1 = mysqli_query($conn, $sql1);

                if ($query1) {
                    echo "
                <script>
                    alert('Registered successful..')
                </script>
            ";
                } else {
                    echo "
                <script>
                    alert('Try Again..')
                </script>
            ";
                }
            }
        }
    } else {
        echo "
            <script>
                alert('Password do not match')
            </script>
        ";
    }
}
?>
<!-- form div -->
<div class="magindiv" style="height: 100px;"></div>

<div class="formDiv">
    <h2>Register for Agency</h2>
    <p>Welcome to Car<span>2Go</span></p>
    <form action="./agen_reg.php" method="post" enctype="multipart/form-data">
        <div class="inputDiv">
            <i class='bx bx-user'></i>
            <input type="text" name="emp_name" placeholder="Full Name" required>
        </div>
        <div class="inputDiv">
            <i class='bx bx-car'></i>
            <input type="text" name="emp_agency" placeholder="Agency Name" required>
        </div>
        <div class="inputDiv">
            <i class='bx bx-envelope'></i>
            <input type="email" name="emp_email" placeholder="Email" required>
        </div>
        <div class="inputDiv">
            <i class='bx bx-phone'></i>
            <input type="text" name="emp_phone" placeholder="Phone No." required>
        </div>
        <div class="inputDiv">
            <i class='bx bx-lock-alt'></i>
            <input type="password" name="pass" placeholder="Password" required>
        </div>

        <div class="inputDiv">
            <i class='bx bx-lock-alt'></i>
            <input type="password" name="conf_pass" placeholder="Confirm Password" required>
        </div>
        <input type="submit" value="Register" class="btn">
        <p>Already have an account ? <a href="./agen_login.php">Login</a></p>
    </form>
</div>

<?php
include "./includes/script.php";
?>