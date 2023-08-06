<?php
        include "./includes/header.php";
    ?>
    <div class="magindiv" style="height: 90px;"></div>

    <!-- userdashboard div -->

    <div class="userDetailsDiv">
        <?php
            if(isset($_GET['u_id'])){
                $u_id=$_GET['u_id'];

                $sql="select * from users where u_id='".$u_id."'";
                $query=mysqli_query($conn,$sql);

                if(mysqli_num_rows($query)>0){
                    $row=mysqli_fetch_array($query);
                    $u_name=$row['u_name'];
                    $u_email=$row['u_email'];
                    $u_phone=$row['u_phone'];

                    echo"
                    <div class='detailsDiv'>
                    <img src='./assets/images/photo8.jpg' alt='user'>
                    <div class='details'>
                        <h2>$u_name</h2>
                        <p>$u_email</p>
                        <p>$u_phone</p>
                    </div>
                </div>
                <div class='cardDiv'>
                    <a href='./updatedetails.php?u_id=$u_id' class='card'>
                        <i class='bx bxs-user-detail'></i>
                        <p>Update Account</p>
                    </a>
                    <a href='./rentedcars.php?u_id=$u_id' class='card'>
                        <i class='bx bx-car' ></i>
                        <p>Rented Cars</p>
                    </a>
                    <a href='./updatepas.php?u_id=$u_id' class='card'>
                        <i class='bx bx-lock-alt' ></i>
                        <p>Update Password</p>
                    </a>
                    <a class='card' onclick='logout()'>
                        <i class='bx bx-log-out-circle' ></i>
                        <p>Logout</p>
                    </a>
                </div>
                    ";
                }
            }
        ?>
        <!-- <div class="detailsDiv">
            <img src="./assets/images/photo8.jpg" alt="user">
            <div class="details">
                <h2>Himanshu Sharma</h2>
                <p>sharmahimanshu1611@gmail.com</p>
                <p>8950960268</p>
            </div>
        </div>
        <div class="cardDiv">
            <a href="./updatedetails.php" class="card">
                <i class='bx bxs-user-detail'></i>
                <p>Update Account</p>
            </a>
            <a href="./rentedcars.php" class="card">
                <i class='bx bx-car' ></i>
                <p>Rented Cars</p>
            </a>
            <a href="./updatepas.php" class="card">
                <i class='bx bx-lock-alt' ></i>
                <p>Update Password</p>
            </a>
            <a href="#" class="card" onclick="logout()">
                <i class='bx bx-log-out-circle' ></i>
                <p>Logout</p>
            </a>
        </div> -->
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