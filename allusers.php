<?php
include "./includes/agen_header.php";
?>
<!-- form div -->
<div class="magindiv" style="height: 100px;"></div>

<!-- all carsDiv -->

<div class="allUsersDiv">
    <h2>All Users</h2>
    <div class="cardDiv">
        <?php
            if(isset($_GET['emp_id'])){
                $emp_id=$_GET['emp_id'];

                $sql="select * from rent_cars where emp_id='".$emp_id."'";
                $query=mysqli_query($conn,$sql);

                if(mysqli_num_rows($query)>0){
                    while($row=mysqli_fetch_array($query)){
                        $u_id=$row['u_id'];
                        $car_name=$row['car_name'];
                        $start_date=$row['start_date'];
                        $end_date=$row['end_date'];

                        $sql1="select * from users where u_id='".$u_id."'";
                        $query1=mysqli_query($conn,$sql1);

                        if(mysqli_num_rows($query1)==1){
                            $row1=mysqli_fetch_array($query1);
                            $u_name=$row1['u_name'];

                            echo"
                            <div class='card'>
                            <img src='./assets/images/photo4.jpg' alt='car'>
                            <p class='title'>$u_name</p>
                            <P>Rented Car : $car_name</P>
                            <p>Start Date : $start_date</p>
                            <p>End Date : $end_date</p>
                        </div>
                            ";
                        }
                    }
                }else{
                    echo "
                <div class='errDiv'>
                <img src='./assets/images/no_users.png' alt='no_cars'>
                <p>No uers has rented your car at this time</p>
            </div>
                ";
                }
            }
        ?>
        <!-- <div class="card">
            <img src="./assets/images/photo4.jpg" alt="car">
            <p class="title">Himanshu Sharma</p>
            <P>Rented Car : Tata Nexon</P>
            <p>Status : on trip</p>
        </div>
        <div class="card">
            <img src="./assets/images/photo4.jpg" alt="car">
            <p class="title">Himanshu Sharma</p>
            <P>Rented Car : Tata Nexon</P>
            <p>Status : on trip</p>
        </div>
        <div class="card">
            <img src="./assets/images/photo4.jpg" alt="car">
            <p class="title">Himanshu Sharma</p>
            <P>Rented Car : Tata Nexon</P>
            <p>Status : on trip</p>
        </div> -->
    </div>
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