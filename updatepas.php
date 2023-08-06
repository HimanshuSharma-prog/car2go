<?php
        include "./includes/script.php";
    ?>
    <!-- form div -->
    <div class="magindiv" style="height: 100px;"></div>

    <div class="formDiv">
        <h2>Update Password</h2>
        <form action="">
            <div class="inputDiv">
                <i class='bx bx-lock-alt' ></i>
                <input type="password" name="pass" placeholder="Old Password" required>
            </div>
            <div class="inputDiv">
                <i class='bx bx-lock-alt' ></i>
                <input type="password" name="pass" placeholder="New Password" required>
            </div>
            <div class="inputDiv">
                <i class='bx bx-lock-alt' ></i>
                <input type="password" name="conf_pass" placeholder="Confirm Password" required>
            </div>
            <input type="submit" value="Update" class="btn">
        </form>
    </div>
    <script>
    window.addEventListener('load',()=>{
        const user=localStorage.getItem('user')
        if(!user){
            window.location.replace('./login.php');
        }
    })
</script>
    <?php
        include "./includes/script.php";
    ?>