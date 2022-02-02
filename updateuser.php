 <?php  
 $connect = mysqli_connect("localhost", "root", "", "jvmtech");  
 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';  
      $username = mysqli_real_escape_string($connect, $_POST["username"]);  
      $password = mysqli_real_escape_string($connect, $_POST["password"]);  
      $fname = mysqli_real_escape_string($connect, $_POST["fname"]);  
      $lname = mysqli_real_escape_string($connect, $_POST["lname"]);  
      $position = mysqli_real_escape_string($connect, $_POST["position"]);
      $salary = mysqli_real_escape_string($connect, $_POST["salary"]);

      if($_POST["id"] != '')  
      {  
           $query =   
           "UPDATE admin SET username = '$username', password = '$password', fname = '$fname', lname = '$lname', position = '$position', salary = '$salary'  WHERE id = '".$_POST["id"]."'";  
           $message = 'Data Updated';  
      }  
      else  
      {  
           $query = "  
           INSERT INTO admin(username, password, fname, lname, position, salary)  
           VALUES('$username', '$password', '$fname', '$lname', '$position', '$salary');  
           ";  
           $message = 'Data Inserted';  
      }  
      if(mysqli_query($connect, $query))  
      {    
           $output .= '<label class="text-success">' . $message . '</label>';  
           $select_query = "SELECT * FROM admin";  
           $result = mysqli_query($connect, $select_query);  
           $output .= '  
                <table class="table">
                    <thead class="text-primary">
                      <th>ID</th>
                      <th>Name</th>
                      <th>Username</th>
                      <th>Password</th>
                      <th>Position</th>
                      <th>Salary</th>
                      <th><center>Action</center></th>
                    </thead>  
           ';  
           while($row = mysqli_fetch_assoc($result))  
           {  
                $output .= '  
                     <tbody>
                      <tr>
                        <td>'.$row['id'].'</td>
                        <td>'.$row['fname'].' '.$row['lname'].'</td>
                        <td>'.$row['username'].'</td>
                        <td>'.$row['password'].'</td>
                        <td>'.$row['position'].'</td>
                        <td>'.$row['salary'].'</td>
                        <td>               
                          <input type="button" name="edit" value="Edit" id="'.$row["id"].';" class="btn btn-info btn-xs edit_data"/>
                          <a href="user.inc.php?delete='.$row["id"].'" class="btn btn-danger" role="button">Delete</a>
                        </td>
                      </tr>
                    </tbody>  
                ';  
           }  
           $output .= '</table>';  
      }  
      echo $output;  
 }  
 ?>