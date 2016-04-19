<!DOCTYPE html>
<?php
/**
* Data Section 2
*/
$daysOfTheWeekOpen = array(1=>"Mon",2=>"Tue",3=>"Wed",4=>"Thu",5=>"Fri");
$openingHours = array("Mon"=>9,"Tue"=>9,"Wed"=>9,"Thu"=>12,"Fri"=>9);
$closingHours = array("Mon"=>5,"Tue"=>5,"Wed"=>5,"Thu"=>4.5,"Fri"=>4.5);
$applianceType = array(1=>"Large",2=>"Small",3=>"Mobile Phone");

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

	table, th, td {
	height: 20px;
	width:-2px;
    border: 1px solid black;
	}
	.footer
		{
		position:absolute;
	  margin-top:300px;
	  margin-left:553px;
		}
	 .dropdown
		{
		clear: both;
		float: right;
		margin-top:-26px;
		margin-left:406px;
		}
		.submit{
		float:right;
		margin-right:40px;
		}
		.drop{
		display:inline;
		clear: both;
		margin-left:200px;	
		}
      body {
        padding-top: 20px;
        padding-bottom: 40px;
		background-image: url("img/green.jpg");
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
          <li><a href="index.php">Home</a></li>
          <li class="active"><a href="quote.php">Quote</a></li>
          <li><a href="contact.php">Contact</a></li>
        </ul>
        <h3 class="muted">Reliable Repair</h3>
      </div>

      <hr>

      <div class="row-fluid marketing">
		<h1>Reliable Repair</h1>
        <div class="span6">
		<?php
		//section 6
		?>
        </div>
      </div>
	  

	  <div class="row-fluid">
		<h2>Quote</h2>
		
		<form method="post" action="action.php">
		<?php 	
		echo '<span class="drop">Select a Day:</span>';
		//we are displaying days which are open for more than 6 hours
		echo  '<select name="Days" class="dropdown">'; 
		foreach($daysOfTheWeekOpen AS $key=>$day){
		 if(($closingHours[$day] + 12) - $openingHours[$day] >= 6){
		echo  '<option value=".$key.">'.$day.'</option>';
		}
		}
		echo '</select><br/>';

		//populating Appliance Type from applianceType array
		echo "<span class='drop'>Select an Appliance Type:</span><br/>";
		echo  '<select name="Appliance" class="dropdown">';
		foreach($applianceType AS $key=>$applianceType){
		echo  '<option value=".$key.">'.$applianceType.'</option>';
		}
		echo '</select><br/>';
		
		//We are populating Dropoff time 
		echo "<span class='drop'>Dropoff Time:</span><br/>";
		echo  '<select name="Dropoff" class="dropdown">';
		foreach($daysOfTheWeekOpen AS $key=>$day){
		if(($closingHours[$day] + 12) - $openingHours[$day] >= 6)
		{
		$dropdown=$closingHours[$day] - 3;
		$fracDiff = ($dropdown - (int)$dropdown) * 60;
                if($fracDiff > 0)
				{
		echo  "<option value='.$key.'>".$day." ".(int)$dropdown. " ".$fracDiff." pm </option>";
		}
		else{
		echo  "<option value='.$key.'>$day $dropdown PM</option>";
		}
		}
		}
		echo '</select><br/>';
		
		//We are populating pickup day using the array $daysOfTheWeekOpen
		echo "<span class='drop'>Pickup Day:</span>"; 
		echo  '<select name="pickup" class="dropdown">';
 
		foreach($daysOfTheWeekOpen AS $key=>$day){
		echo  '<option value="'.$key.'">'.$day.'</option>';
		}
		echo '</select><br/>';
		echo '<input type="submit" value="SUBMIT" class=submit>';
		
		echo '</div>';
		
		echo '<div>';
		echo '<H2> Calendar </H2>';
		$date =time () ;
		//Assigning day month and year to a separate variable
		$day = date('d', $date) ;
		$month = date('m', $date) ;
		$year = date('Y', $date) ;
		//Here we generate the first day of the month
		$first_day = mktime(0,0,0,$month, 1, $year) ;
		//for generating the month name
		$title = date('F', $first_day) ;
		//Here we find out what day of the week the first day of the month falls on
		$day_of_week = date('D', $first_day) ;
		//we are computing the blank days which occur before the first day of the week which is sunday
		switch($day_of_week){
		case "Sun": $blank = 0; break;
		case "Mon": $blank = 1; break;
		case "Tue": $blank = 2; break;
		case "Wed": $blank = 3; break;
		case "Thu": $blank = 4; break;
		case "Fri": $blank = 5; break;
		case "Sat": $blank = 6; break;
		}
		//We then determine how many days are in the current month
		$days_in_month = cal_days_in_month(0, $month, $year) ;
		//Here we start building the table heads
		echo "<table border=1>";
		echo "<tr><th width=30% colspan=7> $title $year </th></tr>";
		echo "<tr><td width=42>S</td><td width=42>M</td><td width=42>T</td><td width=42>W</td><td width=42>T</td><td width=42>F</td><td width=42>S</td></tr>";
		//This counts the days in the week, up to 7
		$day_count = 1;
		echo "<tr>";
		//first we take care of those blank days
		while ( $blank > 0 )
		{
		echo "<td></td>";
		$blank = $blank-1;
		$day_count++;
		}
		//sets the first day of the month to 1
		$day_num = 1;
		//count up the days, untill we've done all of them in the month
		while ( $day_num <= $days_in_month )
		{
		//$day_of_week_new = date('D', $day_num) ;
		$first_day = mktime(0,0,0,$month, $day_num, $year) ;
		$day_of_week = date('D', $first_day) ;
		$check=1;
		//echo($day_of_week);
		foreach($daysOfTheWeekOpen as $key=>$value)
		{
		if($value==$day_of_week)
		{
		echo "<td style='background-color: pink;'> $day_num Open Hrs:$openingHours[$value] - $closingHours[$value] PM</td>";
		$check=0;
		}
		}
		if($check==1)
		{
		echo "<td> $day_num </td>";
		}
		$day_num++;
		$day_count++;
		
		//We are starting a new row when day count value crosses 7
		if ($day_count > 7)
		{
		echo "</tr><tr>";
		$day_count = 1;
		}
		}
		
		//Finally we finish out the table with some blank details if needed
		while ( $day_count >1 && $day_count <=7 )
		{
		echo "<td> </td>";
		$day_count++;
		}
		
		echo "</tr></table>"; 
		echo "</form>";
		?>
		</div>	  
		</div>
		<!-- /container -->
		<div class="footer">
        <?php
		echo '<a href="index.php">Home|</a>';
		echo '<a href="quote.php">Quote|</a>';
		echo '<a href="copyright.php">Copyright</a>';
		?>
		</div>
		</div>
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>
