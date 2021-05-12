// Dashboard 1 Morris-chart
$( function () {
	"use strict";
	
});

function initChart(data2) {
	Morris.Area( {
		element: 'extra-area-chart',
		data: data2,
		lineColors: [ '#26DAD2' ],
		xkey: 'DATE',
		ykeys: [ 'prix' ],
		labels: [ 'Top' ],
		pointSize: 0,
		lineWidth: 0,
		resize: true,
		fillOpacity: 0.8,
		behaveLikeLine: true,
		gridLineColor: '#e0e0e0',
		hideHover: 'auto'
	});
}
