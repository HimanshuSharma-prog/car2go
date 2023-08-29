<?php
        include "./includes/header.php";
    ?>
    <!-- form div -->
    <div class="magindiv" style="height: 100px;"></div>

    <!-- rentedcar div -->

    <div class="rentedCarsDiv">
        <h2>All cars you rented</h2>
        <div class="cardDiv">
            <?php
                if(isset($_GET['u_id'])){
                    $u_id=$_GET['u_id'];

                    $sql="select * from rent_cars where u_id='".$u_id."'";
                    $query=mysqli_query($conn,$sql);

                    if(mysqli_num_rows($query)>0){
                        while($row=mysqli_fetch_array($query)){
                            $image=$row['image'];
                            $car_name=$row['car_name'];
                            $rent=$row['rent'];
                            $start_date=$row['start_date'];
                            $end_date=$row['end_date'];
                            $trip_days=$row['days'];
                            $total_rent=$row['total_rent'];

                            echo"
                            <div class='card'>
                            <img src='./assets/carimages/$image' alt='car'>
                            <div class='details'>
                                <h2>$car_name</h2>
                                <p>₹ $rent/day</p>
                                <p>Trip : $trip_days days trip</p>
                                <p>Start Date : $start_date</p>
                                <p>End Date : $end_date</p>
                                <p>Total rent : ₹ $total_rent</p>
                            </div>
                        </div>
                            ";
                        }
                    }else{
                        echo "
                <div class='errDiv'>
                <img src='./assets/images/no_cars.png' alt='no_cars'>
                <p>You have not rented any cars at this time.</p>
                <a href='./cars.php' class='btn'>Rent a car</a>
            </div>
                ";
                    }
                }
            ?>
            <!-- <div class="card">
                <img src="./assets/images/car2.webp" alt="car">
                <div class="details">
                    <h2>Thar</h2>
                    <p>₹ 2000/day</p>
                    <p>Trip : 5 days trip</p>
                    <p>Start Date : 05-08-2023</p>
                    <p>End Date : 10-08-2023</p>
                    <p>Status : Ongoing</p>
                </div>
            </div>
            <div class="card">
                <img src="./assets/images/car2.webp" alt="car">
                <div class="details">
                    <h2>Thar</h2>
                    <p>₹ 2000/day</p>
                    <p>Trip : 5 days trip</p>
                    <p>Start Date : 05-08-2023</p>
                    <p>End Date : 10-08-2023</p>
                    <p>Status : Ongoing</p>
                </div>
            </div>
            <div class="card">
                <img src="./assets/images/car2.webp" alt="car">
                <div class="details">
                    <h2>Thar</h2>
                    <p>₹ 2000/day</p>
                    <p>Trip : 5 days trip</p>
                    <p>Start Date : 05-08-2023</p>
                    <p>End Date : 10-08-2023</p>
                    <p>Status : Ongoing</p>
                </div>
            </div>
            <div class="card">
                <img src="./assets/images/car2.webp" alt="car">
                <div class="details">
                    <h2>Thar</h2>
                    <p>₹ 2000/day</p>
                    <p>Trip : 5 days trip</p>
                    <p>Start Date : 05-08-2023</p>
                    <p>End Date : 10-08-2023</p>
                    <p>Status : Ongoing</p>
                </div>
            </div>
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