/*Dashboard Init*/
 
"use strict"; 

/*****Ready function start*****/
$(document).ready(function(){
	// $('#statement').DataTable({
	// 	"bFilter": false,
	// 	"bLengthChange": false,
	// 	"bPaginate": false,
	// 	"bInfo": false,
	// });

	

	
	if( $('#ct_chart_3').length > 0 ){
		new Chartist.Pie('#ct_chart_3', {
		  series: [20, 10, 30, 40]
		}, {
		  donut: true,
		  donutWidth: 60,
		  startAngle: 270,
		  total: 200,
		  showLabel: true
		});
	}
	

	


});
/*****Ready function end*****/

/*****Sparkline function start*****/
var sparklineLogin = function() { 
	if( $('#sparkline_1').length > 0 ){
		$("#sparkline_1").sparkline([2,4,4,6,8,5,6,4,8,6,6], {
			type: 'bar',
			width: '100%',
			height: '180',
			barWidth: '8',
			barSpacing: '15',
			barColor: '#ed8739',
			highlightSpotColor: '#ed8739'
		});
	}	
}
/*****Sparkline function end*****/

/*****Resize function start*****/
var sparkResize,echartResize;
$(window).on("resize", function () {
	/*Sparkline Resize*/
	clearTimeout(sparkResize);
	sparkResize = setTimeout(sparklineLogin, 200);
	
}).resize(); 
/*****Resize function end*****/

/*****Function Call start*****/
sparklineLogin();
/*****Function Call end*****/
