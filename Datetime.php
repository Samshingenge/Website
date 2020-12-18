<?php
/*date_default_timezone_set("Harare,Pretoria");*/

date_default_timezone_set('Africa/Windhoek');
$CurrentTime=time();
$DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);
echo $DateTime;


//$CurrentTime=time();
//$DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);
//echo $DateTime;



 ?>
