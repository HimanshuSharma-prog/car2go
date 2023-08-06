<?php
include "./includes/header.php";

if (isset($_POST['car_name'])) {
    $car_comp = $_POST['car_comp'];
    $car_name = $_POST['car_name'];
    $rent = $_POST['rent'];
    $car_cap = $_POST['car_cap'];
    // $image=$_POST['image'];
    $car_cat = $_POST['car_cat'];
    $car_no=$_POST['car_no'];
    $emp_id=$_POST['emp_id'];
    $car_id=$_POST['car_id'];

    $image = rand(1, 1000) . '-' . $_FILES['image']['name'];
    $file_loc = $_FILES['image']['tmp_name'];
    $file_size = $_FILES['image']['size'];
    $file_type = $_FILES['image']['type'];
    $new_size = $file_size / 1024;
    $folder = './assets/carimages/';
    $new_file_name = strtolower($image);
    $final_file = str_replace(' ', '-', $new_file_name);$car_comp = $_POST['car_comp'];

    $upload = move_uploaded_file($file_loc, $folder . $final_file);
    if($upload){
        $sql="update cars set car_company='$car_comp',car_name='$car_name',rent='$rent',sheating='$car_cap',car_no='$car_no',image='$final_file',car_cat='$car_cat' where car_id='$car_id'";
        $query=mysqli_query($conn,$sql);

        if($query){
            echo "
                <script>
                    alert('Car deatils updated sucessfully');
                    window.location.replace('./allcars.php?emp_id=$emp_id')
                </script>
            ";
        }else{
            echo "
                <script>
                    alert('Some thing went wrong, try again')
                </script>
            ";
        }
    }
}
?>
<!-- form div -->
<div class="magindiv" style="height: 100px;"></div>

<!-- all carsDiv -->


<div class="addCarsDiv">
    <h2>Update Cars</h2>

    <?php
    if (isset($_GET['car_id'])) {
        $car_id = $_GET['car_id'];
        $emp_id = $_GET['emp_id'];

        $sql = "select * from cars where car_id='" . $car_id . "'";
        $query = mysqli_query($conn, $sql);

        if (mysqli_num_rows($query) == 1) {
            $row = mysqli_fetch_array($query);
            $car_comp = $row['car_company'];
            $car_name = $row['car_name'];
            $rent = $row['rent'];
            $car_cap = $row['sheating'];
            $car_no = $row['car_no'];

            echo "
                <form action='./update_cars.php' method='post' enctype='multipart/form-data'>
                <input type='number' name='emp_id' hidden value='$emp_id'>
                <input type='number' name='car_id' hidden value='$car_id'>
                <div class='inputDiv'>
                    <i class='bx bxs-business'></i>
                    <input type='text' name='car_comp' required placeholder='Car Company name' value='$car_comp'>
                </div>
                <div class='inputDiv'>
                    <i class='bx bx-car'></i>
                    <input type='text' name='car_name' required placeholder='Car name' value='$car_name'>
                </div>
                <div class='inputDiv'>
                    <i class='bx bx-rupee'></i>
                    <input type='number' name='rent' required placeholder='Rent price per day' value='$rent'>
                </div>
                <div class='inputDiv'>
                    <i class='bx bx-group'></i>
                    <input type='number' name='car_cap' placeholder='Sheating capacity include driver' value='$car_cap'>
                </div>
        
                <div class='imgDiv'>
                    <div class='title'>
                        <i class='bx bx-image'></i>
                        <p>Select car image</p>
                    </div>
                    <input type='file' name='image' placeholder='car image' required>
                </div>
                <div class='catDiv'>
                    <div class='title'>
                        <i class='bx bx-car'></i>
                        <p>Select car category</p>
                    </div>
                    <input type='text' name='car_cat' required placeholder='Car Category' id='carCategory' hidden>
                    <div class='cardDiv'>
                        <div class='card' onclick='carCat(`suv`)' id='suv'>
                            <p>SUV</p>
                        </div>
                        <div class='card' onclick='carCat(`hatchback`)' id='hatchback'>
                            <p>Hatchback</p>
                        </div>
                        <div class='card' onclick='carCat(`sedan`)' id='sedan'>
                            <p>Sedan</p>
                        </div>
                    </div>
                </div>
                <div class='inputDiv'>
            <i class='bx bx-detail'></i>
            <input type='text' name='car_no' placeholder='Car Number' required value='$car_no'>
        </div>
        <input type='submit' value='Add Car' class='btn'>
            </form>
                ";
        } else {
            echo "
                <script>
                    alert('error')
                </script>
            ";
        }
    } else {
        echo "
            <script>
                alert('error')
            </script>
        ";
    }
    ?>
    <!-- <form action="./update_cars.php" method="post" enctype="multipart/form-data">
        <div class="inputDiv">
            <i class='bx bxs-business'></i>
            <input type="text" name="comp_name" required placeholder="Car Company name">
        </div>
        <div class="inputDiv">
            <i class='bx bx-car'></i>
            <input type="text" name="car_name" required placeholder="Car name">
        </div>
        <div class="inputDiv">
            <i class='bx bx-rupee'></i>
            <input type="number" name="rent" required placeholder="Rent price per day">
        </div>
        <div class="inputDiv">
            <i class='bx bx-group'></i>
            <input type="number" name="car_cap" placeholder="Sheating capacity include driver">
        </div>

        <div class="imgDiv">
            <div class="title">
                <i class='bx bx-image'></i>
                <p>Select car image</p>
            </div>
            <input type="file" name="image" placeholder="car image" required>
        </div>
        <div class="catDiv">
            <div class="title">
                <i class='bx bx-car'></i>
                <p>Select car category</p>
            </div>
            <input type="text" name="car_cat" required placeholder="Car Category" id="carCategory" style="display: none;">
            <div class="cardDiv">
                <div class="card" onclick="carCat('suv')" id="suv">
                    <p>SUV</p>
                </div>
                <div class="card" onclick="carCat('hatchback')" id="hatchback">
                    <p>Hatchback</p>
                </div>
                <div class="card" onclick="carCat('sedan')" id="sedan">
                    <p>Sedan</p>
                </div>
            </div>
        </div>
        <input type="submit" value="Update Car" class="btn">
    </form> -->
</div>

<script>
    window.addEventListener('load',()=>{
        const user=localStorage.getItem('user')
        if(!user){
            window.location.replace('./emp_login.php');
        }
    })
</script>
<?php
include "./includes/script.php";
?>