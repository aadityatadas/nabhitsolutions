		<div ng-controller="myCtrl" class="container">
			<div class="col-sm-6" ng-init="fetchhosp()">
				<h5 class="page-header text-center" style="padding-bottom:0px;margin-bottom:0px;">Hospital Utilization-1</h5>
				<canvas id="dvCanvasH" height="230px" width="auto"></canvas>
				<canvas id="myChart" width="auto" height="120px"></canvas>			
			</div>
			<div class="col-sm-6" ng-init="fetchhosp1()">
				<h5 class="page-header text-center" style="padding-bottom:0px;margin-bottom:0px;">Hospital Utilization-2</h5>
				<canvas id="dvCanvasHS" height="230px" width="auto"></canvas>		
			</div>
			<div class="col-sm-6" ng-init="fetchiass()">
				<h5 class="page-header text-center" style="padding-bottom:0px;margin-bottom:0px;">Initial Assessment (Avg. Time in Hr.)</h5>
				<canvas id="dvCanvasI" height="230px" width="auto"></canvas>
			</div>
			<div class="col-sm-6" ng-init="fetchvent()">
				<h5 class="page-header text-center" style="padding-bottom:0px;margin-bottom:0px;">Ventilator Associated Pnemonia Rate</h5>
				<canvas id="dvCanvasV" height="230px" width="auto"></canvas>
			</div>
			<div class="col-sm-6" ng-init="fetchcent()">
				<h5 class="page-header text-center" style="padding-bottom:0px;margin-bottom:0px;">Central Line Associated Blood Stream Infection Rate</h5>
				<canvas id="dvCanvasCT" height="230px" width="auto"></canvas>
			</div>
			<div class="col-sm-6" ng-init="fetchcath()">
				<h5 class="page-header text-center" style="padding-bottom:0px;margin-bottom:0px;">Cather Associated Unrinary Tract Infection Form</h5>
				<canvas id="dvCanvasCH" height="230px" width="auto"></canvas>
			</div>
			<div class="col-sm-6" ng-init="fetchlos()">
				<h5 class="page-header text-center" style="padding-bottom:0px;margin-bottom:0px;">Average Length Of Stay</h5>
				<canvas id="dvCanvasLS" height="230px" width="auto"></canvas>
			</div>
			<div class="col-sm-6" ng-init="fetchbor()">
				<h5 class="page-header text-center" style="padding-bottom:0px;margin-bottom:0px;">Bed Occupancy Rate</h5>
				<canvas id="dvCanvasBR" height="230px" width="auto"></canvas>
			</div>
			<div class="col-sm-6" ng-init="fetchwt()">
				<h5 class="page-header text-center" style="padding-bottom:0px;margin-bottom:0px;">OPD Waiting Time (Average)</h5>
				<canvas id="dvCanvasWT" height="230px" width="auto"></canvas>
			</div>
			<div class="col-sm-6" ng-init="fetchip()">
				<h5 class="page-header text-center" style="padding-bottom:0px;margin-bottom:0px;">IPD Feedback Rate/Index</h5>
				<canvas id="dvCanvasIP" height="230px" width="auto"></canvas>
			</div>
		</div>
		<script src="hosp_app.js"></script>