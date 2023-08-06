    <?php
    include('./includes/header.php')
    ?>
    <?php
    include('./includes/db.php')
    ?>
    <!-- home div -->
    <div class="homeDiv" id="homeDiv">
        <div class="layer">
            <p class="text">Rent a Car</p>
            <h1 id="homeText">Best Rental Cars In Your Location</h1>
            <a href="./cars.php" class="btn">
                <i class='bx bx-car'></i>
                <p>Reserve now</p>
            </a>
        </div>
    </div>

    <!-- about div -->
    <div class="aboutDiv" id="aboutDiv">
        <div class="titlesDiv">
            <h2>About Car<span>2Go</span></h2>
            <p>Take a look under the hood of the largest car sharing marketplace in your location</p>
            <div class="underline">
                <div class="dot"></div>
                <div class="line"></div>
                <div class="dot"></div>
            </div>
        </div>
        <div class="detailsDiv">
            <div class="imgDiv">
                <img src="./assets/images/car3.jpg" alt="car">
            </div>
            <div class="details">
                <h2>Find your drive</h2>
                <div class="text">
                    <p class="title">Car<span>2Go</span></p>
                    <p>is the largest car sharing marketplace in your location, where you
                        can book any car you want, wherever you want it, from a vibrant community of trusted hosts
                        across
                        the many location like Delhi, Mumbai, Bangalore. Whether you're flying in from a far or looking
                        for a
                        car down the street, searching for a rugged truck or something smooth and swanky, guests can
                        take
                        the wheel of the perfect car for any occasion, while hosts can take the wheel of their futures
                        by
                        building an accessible, flexible, and scalable car sharing business from the ground up.</p>
                </div>

            </div>
        </div>
    </div>

    <div class="carsDiv" id="carsDiv">
        <div class="titlesDiv">
            <h2>Cars</h2>
            <p>Find a car that suits you best</p>
            <div class="underline">
                <div class="dot"></div>
                <div class="line"></div>
                <div class="dot"></div>
            </div>
        </div>
        <a href="./cars.php" class="allBtn">
            <p>See all</p>
        </a>
        <div class="cardDiv">
            <?php
                $sql="select * from cars";
                $query=mysqli_query($conn,$sql);

                if(mysqli_num_rows($query)<3){
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
                }else{
                    $i=0;
                    while($i<3){
                        $row=mysqli_fetch_array($query);
                        $car_id=$row['car_id'];
                        $car_comp=$row['car_company'];
                        $car_name=$row['car_name'];
                        $rent=$row['rent'];
                        $image=$row['image'];

                        echo"
                        <div class='card'>
                        <img src='./assets/carimages/$image' alt='car'>
                        <h2>$car_comp $car_name</h2>
                        <p>₹ $rent/day</p>
                        <a href='./details.php?car_id=$car_id' class='btn'>
                            <i class='bx bx-car'></i>
                            <p>Reserve now</p>
                        </a>
                    </div>
                        ";
                        $i++;
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

    <!-- services div -->
    <div class="servicesDiv" id="servicesDiv">
        <div class="titlesDiv">
            <h2>Our Services</h2>
            <p>We provide best car services for your safe trips</p>
            <div class="underline">
                <div class="dot"></div>
                <div class="line"></div>
                <div class="dot"></div>
            </div>
        </div>

        <div class="cardDiv">
            <div class="card">
                <img src="./assets/images/s4.png" alt="services">
                <h2>Become a part</h2>
                <p>We provide to be a part of agencies, if you want to provide car services in your area tahn register
                    with Car<span>2Go</span> and extend your business</p>
                <a href="./emp_login.php" class="btn">Register Now</a>
            </div>
            <div class="card">
                <img src="./assets/images/s1.png" alt="services">
                <h2>Travel Experts</h2>
                <p>Our professional drivers are more than just a mode of transportation; they are your travel
                    companions. They have undergone extensive training, are skilled in driving navigation, and can speak
                    multiple languages. By utilizing their local expertise, you can have a fantastic trip.</p>
            </div>
            <div class="card">
                <img src="./assets/images/s2.png" alt="services">
                <h2>Door Pickup</h2>
                <p>We offer doorstep pick-up service without any additional charges, allowing you to be picked up from
                    wherever you are located. This eliminates the hassle of arranging transportation to reach the rental
                    car or the worry of finding a suitable parking space when returning the car.</p>
            </div>
            <div class="card">
                <img src="./assets/images/s3.png" alt="services">
                <h2>Sit Back & Relax</h2>
                <p>Navigating the busy streets can be stressful and exhausting. With our professional service, you can
                    sit back, relax, and enjoy a well-deserved break from the daily hustle and bustle of traffic. Let
                    our skilled drivers handle the driving while you unwind and enjoy the ride.</p>
            </div>
        </div>
    </div>

    <!-- contact div -->

    <div class="contactDiv" id="contactDiv">
        <div class="titlesDiv">
            <h2>Contact Us</h2>
            <div class="underline">
                <div class="dot"></div>
                <div class="line"></div>
                <div class="dot"></div>
            </div>
        </div>
        <div class="detailsDiv">
            <form action="">
                <div class="inputDiv">
                    <i class='bx bx-user'></i>
                    <input type="text" name="c_user" placeholder="Username" required>
                </div>
                <div class="inputDiv">
                    <i class='bx bx-envelope'></i>
                    <input type="email" name="c_email" placeholder="Email" required>
                </div>
                <div class="msgDiv">
                    <i class='bx bx-message-square-dots'></i>
                    <textarea name="c_msg" placeholder="Enter Your message ..." required></textarea>
                </div>
                <input type="submit" value="Send Message" class="btn">
            </form>
            <div class="imgDiv">
                <img src="./assets/images/car2.jpg" alt="car">

            </div>
        </div>
    </div>

    <?php
    include('./includes/footer.php');
    include('./includes/script.php');
    ?>