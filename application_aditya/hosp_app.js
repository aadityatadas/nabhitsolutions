
var app = angular.module('app', []);
app.controller('myCtrl', function ($scope, $http) {

    $scope.error = false;
    $scope.success = false;

    // Hospital Utilization Form
    $scope.fetchhosp = function(){
        $http.get('charts/fetchhosp.php').success(function(data){
			
            var ctx = document.getElementById("dvCanvasH").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [
                        {
                            label: 'Admissions',
                            backgroundColor: 'red',
                            borderColor: 'red',
                            data: data.year,
                            borderWidth: 2,
                            fill: false
                        },
                        {
                            label: 'Surgery',
                            backgroundColor: 'green',
                            borderColor: 'green',
                            data: data.surg,
                            borderWidth: 2,
                            fill: false
                        },
						{
                            label: 'OPDs',
                            backgroundColor: 'yellow',
                            borderColor: 'yellow',
                            data: data.opd,
                            borderWidth: 2,
                            fill: false
                        }
                    ]
                },
                options: {
                    responsive: true,
                    title:{
                        display:true,
                        text:''
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: false,
                    },
                    hover: {
                        mode: 'nearest',
                        intersect: true
                    },
                    scales: {
                        xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Month'
                            }
                        }],
                        yAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Per 100 Patient'
                            },
                            ticks: {
                                beginAtZero:true
                            }
                        }],
                    }
                }
            });
        });
    }
	// End Of H U F
	// Hospital Utilization Form No. 2
    $scope.fetchhosp1 = function(){
        $http.get('charts/fetchhosp1.php').success(function(data){
			
            var ctx = document.getElementById("dvCanvasHS").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [
                        {
                            label: 'Discharge',
                            backgroundColor: 'red',
                            borderColor: 'red',
                            data: data.dis,
                            borderWidth: 2,
                            fill: false
                        },
                        {
                            label: 'Dama',
                            backgroundColor: 'green',
                            borderColor: 'green',
                            data: data.dama,
                            borderWidth: 2,
                            fill: false
                        },
						{
                            label: 'Death',
                            backgroundColor: 'yellow',
                            borderColor: 'yellow',
                            data: data.death,
                            borderWidth: 2,
                            fill: false
                        }
                    ]
                },
                options: {
                    responsive: true,
                    title:{
                        display:true,
                        text:''
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: false,
                    },
                    hover: {
                        mode: 'nearest',
                        intersect: true
                    },
                    scales: {
                        xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Month'
                            }
                        }],
                        yAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Per 100 Patient'
                            },
                            ticks: {
                                beginAtZero:true
                            }
                        }],
                    }
                }
            });
        });
    }
	// End Of H U F 2.
	// Initaial Assessment Form
	$scope.fetchiass = function(){
        $http.get('charts/fetchiass.php').success(function(data){

            var ctx = document.getElementById("dvCanvasI").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [
                        {
                            label: '2017',
                            backgroundColor: 'red',
                            borderColor: 'red',
                            data: data.prev,
                            borderWidth: 2,
                            fill: false
                        },
                        {
                            label: '2018',
                            backgroundColor: 'skyblue',
                            borderColor: 'skyblue',
                            data: data.year,
                            borderWidth: 2,
                            fill: false
                        }

                    ]
                },
                options: {
                    responsive: true,
                    title:{
                        display:true,
                        text:''
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: false,
                    },
                    hover: {
                        mode: 'nearest',
                        intersect: true
                    },
                    scales: {
                        xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Month'
                            }
                        }],
                        yAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Initial Assessment Time'
                            },
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });

        });
    }
	
	// End of I A F
	// Ventilator Form
	$scope.fetchvent = function(){
        $http.get('charts/fetchvent.php').success(function(data){

            var ctx = document.getElementById("dvCanvasV").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [
                        {
                            label: '2017',
                            backgroundColor: 'red',
                            borderColor: 'red',
                            data: data.prev,
                            borderWidth: 2,
                            fill: false
                        },
                        {
                            label: '2018',
                            backgroundColor: 'skyblue',
                            borderColor: 'skyblue',
                            data: data.year,
                            borderWidth: 2,
                            fill: false
                        }

                    ]
                },
                options: {
                    responsive: true,
                    title:{
                        display:true,
                        text:''
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: false,
                    },
                    hover: {
                        mode: 'nearest',
                        intersect: true
                    },
                    scales: {
                        xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Month'
                            }
                        }],
                        yAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Per 1000 Ventilator Days'
                            },
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
        });
    }
	
	// End Of V F
	// C L A B S I Form
	$scope.fetchcent = function(){
        $http.get('charts/fetchcent.php').success(function(data){

            var ctx = document.getElementById("dvCanvasCT").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [
                        {
                            label: '2017',
                            backgroundColor: 'red',
                            borderColor: 'red',
                            data: data.prev,
                            borderWidth: 2,
                            fill: false
                        },
                        {
                            label: '2018',
                            backgroundColor: 'skyblue',
                            borderColor: 'skyblue',
                            data: data.year,
                            borderWidth: 2,
                            fill: false
                        }

                    ]
                },
                options: {
                    responsive: true,
                    title:{
                        display:true,
                        text:''
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: false,
                    },
                    hover: {
                        mode: 'nearest',
                        intersect: true
                    },
                    scales: {
                        xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Month'
                            }
                        }],
                        yAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Per 1000 Central Line Days'
                            },
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });

        });
    }
	
	// End Of C L A B S I F
	// Cather Associated Unrinary Tract Infection Form
	$scope.fetchcath = function(){
        $http.get('charts/fetchcath.php').success(function(data){

            var ctx = document.getElementById("dvCanvasCH").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [
                        {
                            label: '2017',
                            backgroundColor: 'red',
                            borderColor: 'red',
                            data: data.prev,
                            borderWidth: 2,
                            fill: false
                        },
                        {
                            label: '2018',
                            backgroundColor: 'skyblue',
                            borderColor: 'skyblue',
                            data: data.year,
                            borderWidth: 2,
                            fill: false
                        }

                    ]
                },
                options: {
                    responsive: true,
                    title:{
                        display:true,
                        text:''
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: false,
                    },
                    hover: {
                        mode: 'nearest',
                        intersect: true
                    },
                    scales: {
                        xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Month'
                            }
                        }],
                        yAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Per 1000 Catheter Days'
                            },
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });

        });
    }
	
	// End Of C A U T I F
	// AVG L O S Form
	$scope.fetchlos = function(){
        $http.get('charts/fetchlos.php').success(function(data){

            var ctx = document.getElementById("dvCanvasLS").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [
                        {
                            label: '2017',
                            backgroundColor: 'red',
                            borderColor: 'red',
                            data: data.prev,
                            borderWidth: 2,
                            fill: false
                        },
                        {
                            label: '2018',
                            backgroundColor: 'skyblue',
                            borderColor: 'skyblue',
                            data: data.year,
                            borderWidth: 2,
                            fill: false
                        }

                    ]
                },
                options: {
                    responsive: true,
                    title:{
                        display:true,
                        text:''
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: false,
                    },
                    hover: {
                        mode: 'nearest',
                        intersect: true
                    },
                    scales: {
                        xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Month'
                            }
                        }],
                        yAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Average Length of Stay'
                            },
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });

        });
    }
	
	// End of AVG L O S
	// AVG Bed  Occupancy Rate Form
	$scope.fetchbor = function(){
        $http.get('charts/fetchbor.php').success(function(data){

            var ctx = document.getElementById("dvCanvasBR").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [
                        {
                            label: '2017',
                            backgroundColor: 'red',
                            borderColor: 'red',
                            data: data.prev,
                            borderWidth: 2,
                            fill: false
                        },
                        {
                            label: '2018',
                            backgroundColor: 'skyblue',
                            borderColor: 'skyblue',
                            data: data.year,
                            borderWidth: 2,
                            fill: false
                        }

                    ]
                },
                options: {
                    responsive: true,
                    title:{
                        display:true,
                        text:''
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: false,
                    },
                    hover: {
                        mode: 'nearest',
                        intersect: true
                    },
                    scales: {
                        xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Month'
                            }
                        }],
                        yAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'In %'
                            },
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });

        });
    }
	
	// End of AVG B O R
	// AVG OPD Waiting Time Form
	$scope.fetchwt = function(){
        $http.get('charts/fetchwt.php').success(function(data){

            var ctx = document.getElementById("dvCanvasWT").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [
                        {
                            label: '2017',
                            backgroundColor: 'red',
                            borderColor: 'red',
                            data: data.prev,
                            borderWidth: 2,
                            fill: false
                        },
                        {
                            label: '2018',
                            backgroundColor: 'skyblue',
                            borderColor: 'skyblue',
                            data: data.year,
                            borderWidth: 2,
                            fill: false
                        }

                    ]
                },
                options: {
                    responsive: true,
                    title:{
                        display:true,
                        text:''
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: false,
                    },
                    hover: {
                        mode: 'nearest',
                        intersect: true
                    },
                    scales: {
                        xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Month'
                            }
                        }],
                        yAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Waiting Time In Min.'
                            },
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });

        });
    }
	
	// End of AVG OPD Waiting Time
	// AVG IPD Feedback Rate Form
	$scope.fetchip = function(){
        $http.get('charts/fetchip.php').success(function(data){

            var ctx = document.getElementById("dvCanvasIP").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [
                        {
                            label: '2017',
                            backgroundColor: 'red',
                            borderColor: 'red',
                            data: data.prev,
                            borderWidth: 2,
                            fill: false
                        },
                        {
                            label: '2018',
                            backgroundColor: 'skyblue',
                            borderColor: 'skyblue',
                            data: data.year,
                            borderWidth: 2,
                            fill: false
                        }

                    ]
                },
                options: {
                    responsive: true,
                    title:{
                        display:true,
                        text:''
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: false,
                    },
                    hover: {
                        mode: 'nearest',
                        intersect: true
                    },
                    scales: {
                        xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Month'
                            }
                        }],
                        yAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Feedback Rate In %'
                            },
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });

        });
    }
	
	// End of AVG IPD Feedback Rate
	
    $scope.clear = function(){
        $scope.error = false;
        $scope.success = false;
    }

});