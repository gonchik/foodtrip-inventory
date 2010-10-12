<?php
if($stationPrice == null) {
	echo '0.00';
}
else {
	echo $stationPrice['StationPrice']['price'];	
}
?>