<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>CSV To Mysql</title>

  
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
 <form  method="post" enctype="multipart/form-data">
  <nav class="black lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">CSV To DB</a>
      <ul class="right hide-on-med-and-down">
       <li><a href="index.php">Home</a></li>
		 <li><a href="showdata.php">Show data</a></li>
      </ul>

      <ul id="nav-mobile" class="sidenav">
        <li><a href="index.php">Home</a></li>
		 <li><a href="showdata.php">Show data</a></li>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <div class="row center">
	   <?php
                    
                    $connect = mysqli_connect("localhost", "root", "", "zujo");
                    
                    
                    $sql = "SELECT * FROM csv";
                    if($result = mysqli_query($connect, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                         echo "<th>Id</th>";
                                        echo "<th>Username</th>";
                                        echo "<th>Amount</th>";
                                        echo "<th>Date</th>";
                                        
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
										  echo "<td>" . $row['Id'] . "</td>";
                                        echo "<td>" . $row['Username'] . "</td>";
                                        echo "<td>" . $row['Amount'] . "</td>";
                                        echo "<td>" . $row['Date'] . "</td>";
										
                                        
                                       
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
                    }
 
                    
                    mysqli_close($connect);
                    ?>
	  </div>

    </div>
  </div>


 
  <footer class="page-footer #424242 grey darken-3">
    <div class="container">
      <div class="row">
        
         
        </div>
      </div>
    </div>
    <div class="footer-copyright black">
      <div class="container">
      Made by <a class="orange-text text-lighten-3" href="http://materializecss.com">Sahani BrijeshKumar</a>
      </div>
    </div>
  </footer>

</form>
  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  <script type='text/javascript'>
	function showError(msg){
		
		var div=$("#errormessage");
		
		if(div){
			div.empty();
			div.html("<h4>"+msg+"</h>");
			setTimeout(function(){ 
			$("#errormessage").empty(); 
			}, 5000);
		}
	}
  </script>


  </body>
</html>
<?php 
$connect = mysqli_connect("localhost", "root", "", "zujo");
if(isset($_POST["submit"]))
{
 if($_FILES['file']['name'])
 {
  $filename = explode(".", $_FILES['file']['name']);
  if($filename[1] == 'csv')
  {
   $handle = fopen($_FILES['file']['tmp_name'], "r");
   while($data = fgetcsv($handle))
   {
				$item1 = mysqli_real_escape_string($connect, $data[0]);  
                $item2 = mysqli_real_escape_string($connect, $data[1]);
				 $item3 = mysqli_real_escape_string($connect, $data[2]);
                $query = "INSERT into csv(Username, Amount,Date) values('$item1','$item2','$item3')";
                mysqli_query($connect, $query);
   }
   fclose($handle);
		echo "<script>showError('Import done');</script>";
  }
  
   else {
 echo "<script>showError('please select CSV file');</script>";
}
 }
}
?>