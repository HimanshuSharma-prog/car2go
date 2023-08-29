<?php
include "./includes/agen_header.php";
    if(isset($_POST['new_pass'])){
        $new_pass=md5($_POST['new_pass']);
        $conf_pass=md5($_POST['conf_pass']);
        $emp_id=$_POST['emp_id'];

        if($new_pass==$conf_pass){
            $sql="update emp set emp_pass='$conf_pass' where emp_id='$emp_id'";
            $query=mysqli_query($conn,$sql);
            if($query){
                echo "
                <script>
                    alert('Password Updated succesfully')
                    window.location.replace('./agen_pass.php?emp_id=$emp_id')
                </script>
            ";
            }else{
                echo "
                <script>
                    alert('please try again..')
                    window.location.replace('./agen_pass.php?emp_id=$emp_id')
                </script>
            ";
            }
        }else{
            echo "
                <script>
                    alert('Password did not match')
                    window.location.replace('./agen_pass.php?emp_id=$emp_id')
                </script>
            ";
        }

    }
?>
<!-- form div -->
<div class="magindiv" style="height: 100px;"></div>

<div class="formDiv">
    <h2>Update Password</h2>
    <form action="./agen_pass.php" method="post">
        <?php
        if (isset($_GET['emp_id'])) {
            $emp_id = $_GET['emp_id'];

            echo "
            <input type='number' name='emp_id' hidden value='$emp_id'>
                    
                    ";
        }
        ?>
        <!-- <div class="inputDiv">
            <i class='bx bx-lock-alt'></i>
            <input type="password" name="old_pass" placeholder="Old Password" required>
        </div> -->
        <div class="inputDiv">
            <i class='bx bx-lock-alt'></i>
            <input type="password" name="new_pass" placeholder="New Password" required>
        </div>
        <div class="inputDiv">
            <i class='bx bx-lock-alt'></i>
            <input type="password" name="conf_pass" placeholder="Confirm Password" required>
        </div>
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