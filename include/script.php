<script type="text/javascript">
	new Morris.Bar({
		element: 'hit-by-ip',
		data: [
			<?php
				$R = $common->getStatsAllIP();
				$i = 1;
				while ($row = $R->fetch_array() and $i <= 5){
					echo "{ y: '".$row['ip']."', a: '".$row['hits']."'},";
					$i++;
				}
			?>
		],
	  	xkey: 'y',
	  	ykeys: 'a',
	  	labels: ['Hits', 'IP']
	});
	new Morris.Bar({
		element: 'port-hit',
		data: [
			<?php
				$R = $common->getStatsAllPort();
				$i = 1;
				while ($row = $R->fetch_array() and $i <= 5){
					echo "{ y: '".$row['port']."', a: '".$row['hits']."'},";
					$i++;
				}
			?>
		],
	  	xkey: 'y',
	  	ykeys: 'a',
	  	labels: ['Hits', 'Port'],
	  	barColors: ['#990000']
	});
	new Morris.Donut({
		element: 'os-use',
		data: [
			<?php
				$R = $p0f->getOSHits();
				$i = 1;
				while ($row = $R->fetch_array() and $i <= 5){
					echo "{ label:'".$row['os']."', value:'".$row['used']."'},";
					$i++;	
				}
			?>
		],
	})
	new Morris.Bar({
		element: 'country-attackers',
		data: [
			<?php
				$R = $country->getStatsCountry();
				$i = 1;
				while ($row = $R->fetch_array() and $i <= 5){
					echo "{ y: '".$row['country_name']."', a: '".$row['hits']."'},";
					$i++;
				}
			?>
		],
	  	xkey: 'y',
	  	ykeys: 'a',
	  	labels: ['Unique IP', 'Country'],
  		barColors: ['#008A2E']
	});
</script>