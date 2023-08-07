<?php
include "./includes/header.php";
// include"./includes/db.php";
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $full_name = $_POST['full_name'];
    $phone = $_POST['number'];
    $emp_id = $_POST['emp_id'];
    $emp_agency=$_POST['emp_agency'];

    if (is_numeric($phone)) {
        $sql = "update emp set emp_name='$full_name',emp_phone='$phone',emp_email='$email',emp_agency='$emp_agency' where emp_id='$emp_id'";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            echo "
        <script>
            alert('Details update successfully')
            window.location.replace('./emp_update.php?emp_id=$emp_id')
        </script>
    ";
        } else {
            echo "
        <script>
            alert('Some thing went wrong, try again')
            window.location.replace('./emp_update.php?emp_id=$emp_id')
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
    // $sql="update users set u_email='$email',u_name='$full_name',u_phone='$phone' where u_id='$u_id'";

}
?>
<!-- form div -->
<div class="magindiv" style="height: 100px;"></div>

<div class="formDiv">
    <h2>Update Details</h2>
    <form action="./emp_update.php" method="post">
        <div class="inputDiv">
            <i class='bx bx-user'></i>
            <input type="text" name="full_name" placeholder="Full Name" required>
        </div>
        <div class="inputDiv">
            <i class='bx bx-car'></i>
            <input type="text" name="emp_agency" placeholder="Agency Name" required>
        </div>
        <div class="inputDiv">
            <i class='bx bx-envelope'></i>
            <input type="email" name="email" placeholder="Email" required>
        </div>
        <div class="inputDiv">
            <i class='bx bx-phone'></i>
            <input type="text" name="number" placeholder="Phone No." required>
        </div>
        <?php
        if (isset($_GET['emp_id'])) {
            $emp_id = $_GET['emp_id'];

            echo "
            <input type='number' name='emp_id' hidden value='$emp_id'>
                    
                    ";
        }
        ?>
        <!-- <div class="inputDiv">
                <i class='bx bx-lock-alt' ></i>
                <input type="password" name="pass" placeholder="Password" required>
            </div>

            <div class="inputDiv">
                <i class='bx bx-lock-alt' ></i>
                <input type="password" name="conf_pass" placeholder="Confirm Password" required>
            </div> -->
        <input type="submit" value="Update" class="btn">
    </form>
</div>
<script>
    window.addEventListener('load', () => {
        const user = localStorage.getItem('user')
        if (!user) {
            window.location.replace('./login.php');
        }
    })
</script>
<?php
include "./includes/script.php";
?>