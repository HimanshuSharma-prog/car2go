<?php
include('./includes/header.php');

if(isset($_POST['email'])){
    $email=$_POST['email'];
    $pass=md5($_POST['pass']);

    $sql="select * from users where u_email='".$email."' AND u_pass='".$pass."' limit 1";
    $query=mysqli_query($conn,$sql);

    if(mysqli_num_rows($query)==1){
        $row=mysqli_fetch_array($query);
        $u_id=$row['u_id'];
        $email=$row['u_email'];
        echo"
            <script>
            const data={
                u_id:$u_id,
                email:'$email',
                type:'user'
            }
            localStorage.setItem('user', JSON.stringify(data));
                alert('Login successful')
                setTimeout(()=>{
                    window.location.replace('index.php');
                },1000)
            </script>
        ";
        // header("Location:index.php");
    }else{
        echo"
            <script>
                alert('Email and password did not match')
            </script>
        ";
    }
}
?>
    <!-- form div -->
    <div class="magindiv" style="height: 100px;"></div>

    <div class="formDiv">
        <h2>Login</h2>
        <p>Welcome to Car<span>2Go</span></p>
        <form action="./login.php" method="post" enctype="multipart/form-data">
            <div class="inputDiv">
                <i class='bx bx-envelope' ></i>
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="inputDiv">
                <i class='bx bx-lock-alt' ></i>
                <input type="password" name="pass" placeholder="Password" required>
            </div>
            <input type="submit" value="Login" class="btn">
            <p>Don't have an account ? <a href="./register.php">Register</a></p>
        </form>
    </div>

<?php
    include('./includes/script.php')
?>