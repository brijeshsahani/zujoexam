<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>CSV To Mysql</title>

  <!-- CSS  -->
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
      <br><br>
      <h1 class="header center orange-text">Upload CSV File</h1>
      <div class="row center">
       
      </div>
      <div class="row center">
      <div id='errormessage' class='red-text'></div>
    <div class="file-field input-field ">
      <div class="btn">
        <span>File</span>
        <input type="file" name="file">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
      </div>
    </div>
	<div class='input-field'>
		<button class="btn waves-effect waves-light" type="submit" name="submit">Upload
    <i class="material-icons right">send</i>
		</button>
	</div>
  
      </div>
      <br><br>

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
			}, 2000);
		}
	}
  </script>


  </body>
</html>
<?php 
$connect = mysqli_connect("localhost", "root", "", "zujo");//database connection
if(isset($_POST["submit"])) // when user click of submit button 
{
 if($_FILES['file']['name'])// validate file selected or not
 {
  $filename = explode(".", $_FILES['file']['name']);// dot seperator and file have 2 value filename and extension
  if($filename[1] == 'csv') // check 2nd value extension is csv or not
  {
   $handle = fopen($_FILES['file']['tmp_name'], "r"); //open file
   while($data = fgetcsv($handle))// get data from file
   {
				$item1 = mysqli_real_escape_string($connect, $data[0]); //in item1 we store user data 
                $item2 = mysqli_real_escape_string($connect, $data[1]);//in item2 we store amount data
				 $item3 = mysqli_real_escape_string($connect, $data[2]);//in item3 we store date 
                $query = "INSERT into csv(Username, Amount,Date) values('$item1','$item2','$item3')";// then insert in database
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