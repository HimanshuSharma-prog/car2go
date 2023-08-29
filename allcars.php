<?php
include "./includes/agen_header.php";
?>
<!-- form div -->
<div class="magindiv" style="height: 100px;"></div>

<!-- all carsDiv -->

<div class="allCarsDiv">
    <h2>All Cars</h2>
    <div class="cardDiv">
        <?php
        if (isset($_GET['emp_id'])) {
            $emp_id=$_GET['emp_id'];

            $sql="select * from cars where emp_id='".$emp_id."'";
            $query=mysqli_query($conn,$sql);

            if(mysqli_num_rows($query)>0){
                while($row=mysqli_fetch_array($query)){
                    $image=$row['image'];
                    $rent=$row['rent'];
                    $car_id=$row['car_id'];
                    $car_comp=$row['car_company'];
                    $car_name=$row['car_name'];

                    echo"
                    <div class='card'>
                    <img src='./assets/carimages/$image' alt='car'>
                    <h2>$car_comp $car_name</h2>
                    <p>₹ $rent/day</p>
                    <a href='./update_cars.php?car_id=$car_id&emp_id=$emp_id' class='btn'>
                        <p>Update Car</p>
                    </a>
                </div>
                    ";
                }
            }else{
                echo "
                <div class='errDiv'>
                <img src='./assets/images/no_cars.png' alt='no_cars'>
                <p>You have not listed any cars yet, first add cars.</p>
                <a href='./addcars.php' class='btn'>Add Cars</a>
            </div>
                ";
            }
        }
        ?>
       
        <!-- <div class="card">
            <img src="./assets/images/car3.webp" alt="car">
            <h2>Tata Nexon</h2>
            <p>₹ 2000/day</p>
            <div class="btn">
                <p>Update Car</p>
            </div>
        </div>
        <div class="card">
            <img src="./assets/images/car3.webp" alt="car">
            <h2>Tata Nexon</h2>
            <p>₹ 2000/day</p>
            <div class="btn">
                <p>Update Car</p>
            </div>
        </div>
        <div class="card">
            <img src="./assets/images/car3.webp" alt="car">
            <h2>Tata Nexon</h2>
            <p>₹ 2000/day</p>
            <div class="btn">
                <p>Update Car</p>
            </div>
        </div> -->
    </div>
</div>

<!-- add cars div -->

<!-- <div class="addCarsDiv" id="update_cars">
        <h2>Update Cars</h2>
        <form action="">
            <div class="inputDiv">
                <i class='bx bxs-business' ></i>
                <input type="text" name="comp_name" required placeholder="Car Company name">
            </div>
            <div class="inputDiv">
                <i class='bx bx-car' ></i>
                <input type="text" name="car_name" required placeholder="Car name">
            </div>
            <div class="inputDiv">
                <i class='bx bx-rupee' ></i>
                <input type="number" name="rent" required placeholder="Rent price per day">
            </div>
            <div class="inputDiv">
                <i class='bx bx-group'></i>
                <input type="number" name="car_cap" placeholder="Sheating capacity include driver">
            </div>

            <div class="imgDiv">
                <div class="title">
                    <i class='bx bx-image' ></i>
                    <p>Select car image</p>
                </div>
                <input type="file" name="image" placeholder="car image" required>
            </div>
            <div class="catDiv">
                <div class="title">
                    <i class='bx bx-car' ></i>
                    <p>Select car category</p>
                </div>
                <input type="text" name="car_cat" required placeholder="Car Category" hidden>
                <div class="cardDiv">
                    <div class="card">
                        <p>SUV</p>
                    </div>
                    <div class="card">
                        <p>Hatchback</p>
                    </div>
                    <div class="card">
                        <p>Sedan</p>
                    </div>
                </div>
            </div>
            <input type="submit" value="Update Car" class="btn">
        </form>
    </div> -->
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