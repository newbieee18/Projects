 <?php  
 $connect = mysqli_connect("localhost", "root", "", "projweb");  
 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';  
      $prodname = mysqli_real_escape_string($connect, $_POST["prodname"]);   
      $quantity = mysqli_real_escape_string($connect, $_POST["quantity"]);  
      $price = mysqli_real_escape_string($connect, $_POST["price"]);
      $img = mysqli_real_escape_string($connect, $_POST["img"]);
      $prodname1 = mysqli_real_escape_string($connect, $_POST["prodname1"]);   
      $quantity1 = mysqli_real_escape_string($connect, $_POST["quantity1"]);  
      $price1 = mysqli_real_escape_string($connect, $_POST["price1"]);
      $img1 = mysqli_real_escape_string($connect, $_POST["img1"]);

      if($_POST["id"] != '')  
      {  
           $query =   
           "UPDATE pork SET prodname = '$prodname', quantity = '$quantity', price = '$price', img = '$img'  WHERE id = '".$_POST["id"]."'";  
           $message = 'Data Updated';  
      }  
      else if($_POST["id1"] != '')
      {
        $query1 =   
           "UPDATE burger SET prodname = '$prodname', quantity = '$quantity', price = '$price', img = '$img'  WHERE id = '".$_POST["id1"]."'";  
           $message = 'Data Updated';
      } 
       
      if(mysqli_query($connect, $query))  
      {    
           $output .= '<label class="text-success">' . $message . '</label>';  
           $select_query = "SELECT * FROM pork";  
           $result = mysqli_query($connect, $select_query);  
           $output .= '  
                <table class="table">
                    <thead class="text-primary">
                      <th>PRODUCT ID</th>
                      <th>PRODUCT NAME</th>
                      <th>QUANTITY</th>
                      <th>IMAGE</th>
                      <th><center>Action</center></th>
                    </thead>  
           ';  
           while($row = mysqli_fetch_assoc($result))  
           {  
                $output .= '  
                     <tbody>
                      <tr>
                        <td>'.$row['id'].'</td>
                        <td>'.$row['prodname'].' '.$row['lname'].'</td>
                        <td>'.$row['quantity'].'</td>
                        <td>'.$row['price'].'</td>
                        <td>'.$row['img'].'</td>
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
      else if(mysqli_query($connect, $query1))  
      {    
           $output .= '<label class="text-success">' . $message . '</label>';  
           $select_query1 = "SELECT * FROM burger";  
           $result1 = mysqli_query($connect, $select_query1);  
           $output .= '  
                <table class="table">
                    <thead class="text-primary">
                      <th>PRODUCT ID</th>
                      <th>PRODUCT NAME</th>
                      <th>QUANTITY</th>
                      <th>IMAGE</th>
                      <th><center>Action</center></th>
                    </thead>  
           ';  
           while($row1 = mysqli_fetch_assoc($result1))  
           {  
                $output .= '  
                     <tbody>
                      <tr>
                        <td>'.$row1['id1'].'</td>
                        <td>'.$row1['prodname1'].' '.$row1['lname'].'</td>
                        <td>'.$row1['quantity1'].'</td>
                        <td>'.$row1['price1'].'</td>
                        <td>'.$row1['img1'].'</td>
                        <td>               
                          <input type="button" name="edit1" value="Edit" id="'.$row1["id"].';" class="btn btn-info btn-xs edit_data1"/>
                          <a href="user.inc.php?delete1='.$row1["id"].'" class="btn btn-danger" role="button">Delete</a>
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