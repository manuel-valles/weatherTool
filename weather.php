<?php  

  $error = "";
	$message = "";
  // PHP Validation
  if($_GET){
    $city = str_replace(' ', '', $_GET['city']);
    $url = "http://www.weather-forecast.com/locations/".$city."/forecasts/latest";
    $site = @file_get_contents($url); //@ error control operator: any error messages will be ignored.
    
    if(!$site) {
        $error='<div class="alert alert-danger" role="alert">That city could not be found</div>';   
    } else { 
          $match = preg_match('/<span class="phrase">(.*?)<\/span>/is', $site, $matches);
    	    $message = '<div class="alert alert-success" role="alert">'.$matches[1].'<br></div>';
    	  }
	}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <!-- Extra style for Bootstrap  -->
    <style type="text/css">
    	body{
			height: 600px;
			background-image: url("background3.jpg");
    	}
    	.container{
    		height: 100%;
    		padding-top: 70px;
        text-align: center;
    	}
    </style>
  </head>
  <body>
    <div class="container">
      <h1 class="display-4">What's the weather?</h1>
      <form>
        <div class="form-group col-sm-5 mx-auto">
            <label class="lead pt-4" for="city">Enter the name of a city:</label>
            <input type="text" class="form-control" name="city" placeholder="Eg. London" value="<?php if ($_GET) {echo $city;}?>">
            <!-- This php code to keep the display of the city -->
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>   
        <div class="form-group col-sm-5 mx-auto" id="weather"><?php print_r($error.$message); ?></div>
      </form>
    </div>

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  </body>
</html>