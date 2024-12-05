<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "CAR BOOKINGS"
	},
	axisY: {
		title: "NO OF CARS"
	},
	data: [{
		type: "column",
		yValueFormatString: "#",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
}
</script>

</body>
</html>