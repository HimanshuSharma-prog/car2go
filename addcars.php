<?php
include "./includes/agen_header.php";

if (isset($_POST['car_comp'])) {
    $car_comp = $_POST['car_comp'];
    $car_name = $_POST['car_name'];
    $rent = $_POST['rent'];
    $car_cap = $_POST['car_cap'];
    // $image=$_POST['image'];
    $car_cat = $_POST['car_cat'];
    $car_no=$_POST['car_no'];
    $emp_id=$_POST['emp_id'];

    $image = rand(1, 1000) . '-' . $_FILES['image']['name'];
    $file_loc = $_FILES['image']['tmp_name'];
    $file_size = $_FILES['image']['size'];
    $file_type = $_FILES['image']['type'];
    $new_size = $file_size / 1024;
    $folder = './assets/carimages/';
    $new_file_name = strtolower($image);
    $final_file = str_replace(' ', '-', $new_file_name);

    $upload = move_uploaded_file($file_loc, $folder . $final_file);

    if ($upload) {
        $sql = "insert into cars (car_company,car_name,rent,sheating,image,car_cat,car_no,emp_id) values('$car_comp','$car_name','$rent','$car_cap','$final_file','$car_cat','$car_no','$emp_id')";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            echo "
                <script>
                    alert('Car added successfully..')
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Try adding car again')
                </script>
            ";
        }
    }
}
?>
<!-- form div -->
<div class="magindiv" style="height: 100px;"></div>

<!-- add cars div -->

<div class="addCarsDiv">
    <h2>Add Cars</h2>
    <form action="./addcars.php" method="post" enctype="multipart/form-data">
        <?Php
            if(isset($_GET['emp_id'])){
                $emp_id=$_GET['emp_id'];

                echo"<input type='number' name='emp_id' hidden value='$emp_id'>";
            }
        ?>    
    
        <div class="inputDiv">
            <i class='bx bxs-business'></i>
            <input type="text" name="car_comp" required placeholder="Car Company name">
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
            <input type="number" name="car_cap" required placeholder="Sheating capacity include driver">
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
        <div class="inputDiv">
            <i class='bx bx-detail'></i>
            <input type="text" name="car_no" placeholder="Car Number" required>
        </div>
        <input type="submit" value="Add Car" class="btn">
    </form>
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