<?php
 require_once "include/header.php";

 require_once "include/main.php";

 $fetch = "SELECT * FROM `customer`";
 $result = mysqli_query($conn, $fetch);
 ?>


<div class="container">
<h1 class="text-center pt-2"> USERS INFORMATIONS </h1>
    <div class="table-responsive bg-dark shadow mt-5 border border-warning">
        <table
            class="table shadow table-primary table-center table-border">
            <thead class="table-dark">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Password</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                while($data = mysqli_fetch_assoc($result)){
                    echo "
                     <tr >
                    <td > ". $data['id'] . "</td>
                    <td> ". $data['username'] ."</td>
                    <td>". $data['email'] ."</td>
                    <td>". $data['mobile'] ."</td>
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