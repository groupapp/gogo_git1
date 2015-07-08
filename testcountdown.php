<?php 
$day   = 12;     // Day of the countdown
  $month = 6;      // Month of the countdown
  $year  = 2014;   // Year of the countdown
  $hour  = 23;     // Hour of the day (east coast time)
  $event = "2014 FIFA World Cup Brazil"; //event

  $calculation = ((mktime ($hour,0,0,$month,$day,$year) - time(void))/3600);
  $hours = (int)$calculation;
  $days  = (int)($hours/24);
?>

<ul>
<li>The date is <?php echo (date ("l, jS \of F Y g:i:s A"));?>.</li>
<li>It is <?php echo $days?> days until <?php echo $event?>.</li>
<li>It is <?php echo $hours?> hours until <?php echo $event?>.</li>
</ul>

<p><?php echo $days-1?> Days <?php echo 24-date("G")-1?> Hours <?php echo 60-date("i")?> Minutes</p>