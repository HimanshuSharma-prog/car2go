<?php
include "./includes/header.php";
    if(isset($_POST['new_pass'])){
        $new_pass=md5($_POST['new_pass']);
        $conf_pass=md5($_POST['conf_pass']);
        $u_id=$_POST['u_id'];

        if($new_pass==$conf_pass){
            $sql="update users set u_pass='$conf_pass' where u_id='$u_id'";
            $query=mysqli_query($conn,$sql);
            if($query){
                echo "
                <script>
                    alert('Password Updated succesfully')
                    window.location.replace('./updatepas.php?u_id=$u_id')
                </script>
            ";
            }else{
                echo "
                <script>
                    alert('please try again..')
                    window.location.replace('./updatepas.php?u_id=$u_id')
                </script>
            ";
            }
        }else{
            echo "
                <script>
                    alert('Password did not match')
                    window.location.replace('./updatepas.php?u_id=$u_id')
                </script>
            ";
        }

    }
?>
<!-- form div -->
<div class="magindiv" style="height: 100px;"></div>

<div class="formDiv">
    <h2>Update Password</h2>
    <form action="./updatepas.php" method="post">
        <?php
        if (isset($_GET['u_id'])) {
            $u_id = $_GET['u_id'];

            echo "
            <input type='number' name='u_id' hidden value='$u_id'>
                    
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