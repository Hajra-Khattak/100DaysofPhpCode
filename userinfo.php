<?php
 require_once "include/header.php";

 require_once "include/main.php";

 $fetch = "SELECT * FROM `customer`";
 $result = mysqli_query($conn, $fetch);
 ?>


<div class="container">
<h1 class="text-center pt-2"> USERS INFORMATIONS </h1>
    <div class="table-responsive bg-dark shadow mt-5 ">
        <table
            class="table shadow table-primary table-center table-border ">
            <thead class=" table-dark" style="font-size:large;">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Profile Pic</th>
                    <th scope="col">Password</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $i = 1;
                while($data = mysqli_fetch_assoc($result)){
                    echo "
                     <tr >
                    <td > ". $i++ . "</td>
                    <td> ". $data['username'] ."</td>
                    <td>". $data['email'] ."</td>
                    <td>". $data['mobile'] ."</td> " ?>

                    <td> <img src="assets/img/<?php echo $data['image'] ?>" width="200"  alt=""></td>
                    <?php echo "
                    <td>". $data['password'] ."</td>
                </tr>
                    ";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php
 require_once "include/footer.php";

?>