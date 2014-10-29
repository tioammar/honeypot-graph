<script type="text/javascript"
      	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHvUp8QPFVx6Z0Qg0zkBPU3TGAFYWgBWM">
    </script>
    <script type="text/javascript">
	      function initialize() {
	      	var myLatlng = new google.maps.LatLng(<?php $record = geoip_record_by_name($ip);  $lat = $record['latitude']; $long = $record['longitude']; echo $lat . "," . $long; ?>)
	        var mapOptions = {
		        center: myLatlng,
		        zoom: 8
	        };
	        var map = new google.maps.Map(document.getElementById('maps'),
	            mapOptions);
	        var marker = new google.maps.Marker({
			    position: myLatlng
			});
			marker.setMap(map);
	      }
	      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
</script>
<div class="col-sm-3">
<ul class="list-group">
		<li class="list-group-item text-muted">Profile</li>
		<li class="list-group-item text-right"><span class="pull-left">IP Address</span> <?php echo $ip ?></li>
			<?php
			    $location = $country->getCountryByIP($ip);
			    $fingerprint = $p0f->getOSByIP($ip);
			    $isp = geoip_isp_by_name($ip);
			    if ($row = $location->fetch_array()){
					echo "<li class='list-group-item text-right'><span class='pull-left'>Country</span>" . $row['country_name'] . " <img src='blank.gif' class='flag flag-" . $row['country_code2'] . "'/></li>
					    <li class='list-group-item text-right'><span class='pull-left'>Region</span>"; if ($row['region']){ echo $row['region']; } else { echo "N/A"; }
					echo "</li>
					 	<li class='list-group-item text-right'><span class='pull-left'>City</span>"; if ($row['city']){ echo $row['city']; } else { echo "N/A"; }
					echo "</li>";
				}
				echo "<li class='list-group-item text-right'><span class='pull-left'>OS</span>";
				if ($row1 = $fingerprint->fetch_array()){
				    echo $row1['os'];
				}
				else {
				   	echo "N/A";
				}
				echo "</li>
				<li class='list-group-item text-right'><span class='pull-left'>ISP</span>"; if ($isp){ echo $isp; } else { echo "N/A"; } 
				echo "</li>";
			?>
    </ul>
    <div class="panel panel-default">
    	<div class="panel-heading">Location</div>
    	<div id="maps" class="panel-body" style="height:380px;"></div>
    </div>
    <a href="javascript:history.go(-1)" type="button" class="top btn btn-primary">&larr; Back</a> 
</div> <!-- col-sm-3 -->
