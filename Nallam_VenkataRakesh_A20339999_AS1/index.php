<!DOCTYPE html>
<?php
/**
* Data Section 1
*/
$daysOfTheWeekOpen = array(1=>"Mon",2=>"Tue",3=>"Wed",4=>"Thur",5=>"Fri");
$openingHours = array("Mon"=>9,"Tue"=>9,"Wed"=>9,"Thur"=>12,"Fri"=>9);
$closingHours = array("Mon"=>5,"Tue"=>5,"Wed"=>5,"Thur"=>4.5,"Fri"=>4.5);

?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Reliable Repair</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 20px;
        padding-bottom: 40px;
		background-image: url("img/green.jpg");
      }
	  
	  .contact{
	  position:absolute;
	  margin-top:199px;
	  margin-left:98px;
	  }

      /* Custom container */
      .container-narrow {
        margin: 0 auto;
        max-width: 700px;
      }
      .container-narrow > hr {
        margin: 30px 0;
      }

      /* Main marketing messages */
      .jumbotron {
        margin: 60px 0;
        text-align: center;
		background: url(img/sue.jpg);
		color: white;
      }
      .jumbotron h1 {
        font-size: 72px;
        line-height: 1;
      }
      .jumbotron .btn {
        font-size: 21px;
        padding: 14px 24px;
      }

      /* Supporting marketing content */
      .marketing {
        margin: 60px 0;
      }
      .marketing p + h4 {
        margin-top: 28px;
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="ico/favicon.png">
  </head>

  <body>

    <div class="container-narrow">

      <div class="masthead">
        <ul class="nav nav-pills pull-right">
          <li class="active"><a href="index.php">Home</a></li>
          <li><a href="quote.php">Quote</a></li>
          <li><a href="contact.php">Contact</a></li>
        </ul>
        <h3 class="muted">Reliable Repair</h3>
      </div>

      <hr>

      <div class="row-fluid marketing">
        <h1>Chicago's No#1 Appliance Repair</h1>
        <p class="lead">We offer repairs of many household appliances</p>
        <a class="btn btn-large btn-success" href="quote.php">Request a quote today!</a>
      </div>

      <hr>

      <div class="row-fluid marketing">
		<h1>Reliable Repair</h1>
        <div class="span6">
		<?php
		//section 1
        echo "<table width='100%' border='2' cellspacing='3' cellpadding='2' align='center'><th>Days Open</th></span><span class='col-md-4'><th>Opening Hours</th><th>Last Drop off</th>";
		foreach($daysOfTheWeekOpen as $x) {
		//Assigning AM to ind variable
            $ind = " am";
		    echo "<tr><td>$x";
			//evaluating pm condition here
            if($openingHours[$x] >= 12){
                $ind = " pm";
            }
			// converting decimal minute format to time minute format
            $fracOpen = ($openingHours[$x] - (int)$openingHours[$x]) * 60;
            $fracClose = ($closingHours[$x] - (int)$closingHours[$x]) * 60;
			//checking if fracOpen greater than 0, and changing "4.5" format to 4
            if($fracOpen > 0){
			//using floor we are taking the hour part alone
                $Open = floor($openingHours[$x])." ".$fracOpen;
            }
            else{
                $Open = $openingHours[$x];
            }
            if($fracClose > 0){
                $Close = floor($closingHours[$x])." ".$fracClose;
            }
            else{
                $Close = $closingHours[$x];
            }
			//Appending AM and PM to the $Open and $Close variable
            if($fracOpen > 0 || $fracClose > 0){
                echo "<td>".$Open.$ind." - ".$Close." pm</td>";
            }
			//Else Appending AM and PM to $openingHours[$x] and $closingHours[$x]
            else{
                echo "<td>".$openingHours[$x] .$ind." -  ". $closingHours[$x]." pm</td>";
            }
			
			//Computing Dropoff Time
            if(($closingHours[$x] + 12) - $openingHours[$x] >= 6){
                $diffTime = $closingHours[$x] - 3;
			
			//Converting decimal minute part to regular time format
                $fracDiff = ($diffTime - (int)$diffTime) * 60;
				//computing Dropoff if fracDiff > 0
                if($fracDiff > 0){
                    echo "<td>".(int)$diffTime. " ".$fracDiff." pm </td>";
                }
                else{
                    echo "<td>".$diffTime." pm </td>";
                }
            }
            else
			//Printing N/A when the working hours is less than 6
			{
                echo "<td>N/A</td>";
            }
        }
		?>
		
		</div>
      </div>

        <div class="span6">
        <?php
		
		?>
	  <div class="contact">
		<h2>Contact information</h2>
		<?php 
		echo "DIRECTIONS TO OUR STORE<br/>";
		//we are redirecting to the google store location
		echo "<a href='https://www.google.com/maps/place/1717+N+Larrabee+St,+Chicago,+IL+60614/@41.913294,-87.643143,17z/data=!3m1!4b1!4m2!3m1!1s0x880fd33e791f5a63:0x75ae7cb014606d0e'>1717 N LARRABEE ST, CHICAGO, IL 60614-5621</a>";
		
		?>
	  </div>
	  
	  <div class="row-fluid">
		<?php 
		//section 4
		?>
	  </div>
	  <!--created a class for displaying footer-->
      <div class="footer">
        <?php
		//added the footer elements
		echo '<a href="index.php">Home|</a>';
		echo '<a href="quote.php">Quote|</a>';
		echo '<a href="copyright.php">Copyright</a>';
		//created a copyright.php page for showing the copyright content
		?>
      </div>
    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>
