<?php
include "./includes/header.php";
if (isset($_POST['car_id'])) {
    $car_cat = $_POST['car_cat'];
    $car_id = $_POST['car_id'];
    $u_id = $_POST['user_id'];
    $emp_id = $_POST['emp_id'];
    $image = $_POST['image'];
    $rent = $_POST['rent'];
    $car_name = $_POST['car_name'];
    $trip_days = $_POST['trip_days'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $total_rent = $trip_days * $rent;
    $sql = "select * from rent_cars where car_id='" . $car_id . "' AND u_id='" . $u_id . "'";
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_array($query);
        $endDate = $row['end_date'];

        if ($start_date <= $endDate) {
            echo "
                <script>
                    alert('You already have rented this car ')
                    window.location.replace('./details.php?car_id=$car_id&car_cat=$car_cat');
                </script>
            ";
        } else {
            $sql1 = "insert into rent_cars(u_id,car_id,emp_id,car_name,image,rent,days,start_date,end_date,total_rent) values('$u_id','$car_id','$emp_id','$car_name','$image','$rent','$trip_days','$start_date','$end_date','$total_rent')";
            $query1 = mysqli_query($conn, $sql1);

            if ($query1) {
                echo "
                        <script>
                            alert('Car rented successful...')
                        window.location.replace('./details.php?car_id=$car_id&car_cat=$car_cat');
                        </script>
                    ";
            }
        }
    } else {
        $sql = "insert into rent_cars(u_id,car_id,emp_id,car_name,image,rent,days,start_date,end_date,total_rent) values('$u_id','$car_id','$emp_id','$car_name','$image','$rent','$trip_days','$start_date','$end_date','$total_rent')";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            echo "
                    <script>
                        alert('Car rented successful...')
                        window.location.replace('./details.php?car_id=$car_id&car_cat=$car_cat');
                    </script>
                ";
        }
    }
}
?>
<div class="magindiv" style="height: 90px;"></div>

<!-- details div -->
<div class="carDetailsDiv">
    <?php
    if (isset($_GET['car_id'])) {
        $car_id = $_GET['car_id'];

        $sql = "select * from cars where car_id='" . $car_id . "'";
        $query = mysqli_query($conn, $sql);

        if (mysqli_num_rows($query) == 1) {
            $row = mysqli_fetch_array($query);
            $car_comp = $row['car_company'];
            $car_name = $row['car_name'];
            $rent = $row['rent'];
            $image = $row['image'];
            $car_cap = $row['sheating'];
            $car_no = $row['car_no'];
            $emp_id = $row['emp_id'];
            $car_cat=$_GET['car_cat'];

            echo "
                    <div class='imgDiv'>
                    <img src='./assets/carimages/$image' alt='car'>
                </div>
                <div class='details'>
                    <h2>$car_comp $car_name</h2>
                    <p class='rent'>₹ $rent/day</p>
                    <div class='div'>
                        <img src='./assets/images/model.png' alt='model'>
                        <p>$car_name</p>
                    </div>
                    <div class='div'>
                        <img src='./assets/images/no-plate.png' alt='no-plate'>
                        <p>$car_no</p>
                    </div>
                    <div class='div'>
                        <img src='./assets/images/capacity.png' alt='capacity'>
                        <p>$car_cap person included driver</p>
                    </div>
                    <div class='div' id='tripDiv'>
                        <img src='./assets/images/trip.png' alt='capacity'>
                        <p id='tripDaysText'>2 days of trip</p>
                    </div>
                    <form action='./details.php' method='post' enctype='multipart/form-data' id='rentForm'>
                        <input type='number' name='car_id' hidden value='$car_id'>
                        <input type='number' name='emp_id' hidden value='$emp_id'>
                        <input type='text' name='image' hidden value='$image'>
                        <input type='text' name='car_cat' hidden value='$car_cat'>
                        <input type='number' name='user_id' hidden id='userIdInput'>
                        <input type='text' name='car_name' hidden value='$car_comp $car_name'>
                        <input type='number' name='rent' hidden value='$rent'>
                        <input type='number' name='trip_days' hidden id='tripInput'>
                        
                        <div class='dateDiv'>
                            <div class='inputDiv'>
                                <p>Start Date</p>
                                <input type='date' name='start_date' required id='start_date'>
                            </div>
                            <div class='inputDiv' id='end_div'>
                                <p>Up to Date</p>
                                <input type='date' name='end_date' required id='end_date'>
                            </div>
                        </div>
                        <input type='submit' value='Rent Car' class='btn'>
                    </form>
                    <a href='login.php' class='btn' id='rentBtn'>Rent Car</a>
                    </div>
        
                    ";
        }
    }
    ?>


</div>

<!-- similar car  -->

<div class="similarCarsDiv">
    <h2 class="title">Similar Cars</h2>
    <div class="cardDiv">
        <?php
        if (isset($_GET['car_cat'])) {
            $car_cat = $_GET['car_cat'];

            $sql = "select * from cars where car_cat='" . $car_cat . "'";
            $query = mysqli_query($conn, $sql);

            if (mysqli_num_rows($query) > 0) {
                $row = mysqli_fetch_array($query);
                $car_id = $row['car_id'];
                $car_comp = $row['car_company'];
                $car_name = $row['car_name'];
                $rent = $row['rent'];
                $image = $row['image'];
                $car_cat = $row['car_cat'];

                echo "
                        <div class='card'>
                        <img src='./assets/carimages/$image' alt='car'>
                        <h2>$car_comp $car_name</h2>
                        <p>₹ $rent/day</p>
                        <a href='./details.php?car_id=$car_id&car_cat=$car_cat' class='btn'>
                            <i class='bx bx-car'></i>
                            <p>Reserve now</p>
                        </a>
                    </div>
                        ";
            }
        }
        ?>
        <!-- <div class="card">
                <img src="./assets/images/car1.webp" alt="car">
                <h2>Hyundai Exter</h2>
                <p>₹ 2000/day</p>
                <a href="./details.php" class="btn">
                    <i class='bx bx-car'></i>
                    <p>Reserve now</p>
                </a>
            </div> -->
    </div>
</div>
<?php
include "./includes/footer.php";
include "./includes/script.php";
?>