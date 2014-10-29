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
    <a href="javascript:history.go(-1)" type="button" class="top btn btn-primary">&larr; Back</a> 
</div> <!-- col-sm-3 -->