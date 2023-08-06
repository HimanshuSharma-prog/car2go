<?php
        include "./includes/header.php";
    ?>    
    <div class="carsDiv" id="carsDiv">
        <div class="marginDiv" style="height: 60px;"></div>
        <div class="cardDiv">
        <?php
                $sql="select * from cars";
                $query=mysqli_query($conn,$sql);

                if(mysqli_num_rows($query)>0){
                    while($row=mysqli_fetch_array($query)){
                        $car_id=$row['car_id'];
                        $car_comp=$row['car_company'];
                        $car_name=$row['car_name'];
                        $rent=$row['rent'];
                        $image=$row['image'];
                        $car_cat=$row['car_cat'];

                        echo"
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
        </div>
    </div>

    <?php
    include "./includes/footer.php";
        include "./includes/script.php";
    ?>