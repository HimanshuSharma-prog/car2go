<?php
        include "./includes/agen_header.php";
    ?>
    <div class="magindiv" style="height: 90px;"></div>

    <!-- userdashboard div -->

    <div class="userDetailsDiv">
        <div class="detailsDiv">
            <img src="./assets/images/photo4.jpg" alt="user">
            <?php
                if(isset($_GET['emp_id'])){
                    $emp_id=$_GET['emp_id'];

                    $sql="select * from emp where emp_id='".$emp_id."' limit 1";
                    $query=mysqli_query($conn,$sql);

                    if(mysqli_num_rows($query)==1){
                        $row=mysqli_fetch_array($query);
                        $emp_name=$row['emp_name'];
                        $emp_agency=$row['emp_agency'];
                        $emp_email=$row['emp_email'];
                        $emp_phone=$row['emp_phone'];

                        echo"
                        <div class='details'>
                            <h2>$emp_agency</h2>
                            <p>$emp_name</p>
                            <p>$emp_email</p>
                            <p>$emp_phone</p>
                        </div>
                        </div>
                        <div class='cardDiv'>
                            <a href='./agen_update.php?emp_id=$emp_id' class='card'>
                                <i class='bx bxs-user-detail'></i>
                                <p>Update Account</p>
                            </a>
                            <a href='./addcars.php?emp_id=$emp_id' class='card'>
                                <i class='bx bx-car' ></i>
                                <p>Add Cars</p>
                            </a>
                            <a href='./allcars.php?emp_id=$emp_id' class='card'>
                                <i class='bx bxs-car-mechanic' ></i>
                                <p>Update Cars</p>
                            </a>
                            <a href='./allusers.php?emp_id=$emp_id' class='card'>
                                <i class='bx bx-user' ></i>
                                <p>Check Users</p>
                            </a>
                            <a href='./agen_pass.php?emp_id=$emp_id' class='card'>
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
            <!-- <div class="details">
                <h2>Balaji Cars</h2>
                <p>Himanshu Sharma</p>
                <p>sharmahimanshu1611@gmail.com</p>
                <p>8950960268</p>
            </div> -->
        <!-- </div>
        <div class="cardDiv">
            <a href="./updatedetails.php" class="card">
                <i class='bx bxs-user-detail'></i>
                <p>Update Account</p>
            </a>
            <a href="./addcars.php" class="card">
                <i class='bx bx-car' ></i>
                <p>Add Cars</p>
            </a>
            <a href="./update_cars.php" class="card">
                <i class='bx bxs-car-mechanic' ></i>
                <p>Update Cars</p>
            </a>
            <a href="./allusers.php" class="card">
                <i class='bx bx-user' ></i>
                <p>Check Users</p>
            </a>
            <a href="./updatepas.php" class="card">
                <i class='bx bx-lock-alt' ></i>
                <p>Update Password</p>
            </a>
            <a class="card" onclick="logout()">
                <i class='bx bx-log-out-circle' ></i>
                <p>Logout</p>
            </a>
        </div> -->
    </div>
    <script>
    window.addEventListener('load',()=>{
        const user=localStorage.getItem('user')
        if(!user){
            window.location.replace('./agen_login.php');
        }
    })
</script>
    <?php
        include "./includes/script.php";
    ?>