<html>
<head>
<title>JQuery DatePicker</title>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script>
$(function() {
$( "#txtDate" ).datepicker();
$( "#txtDate2" ).datepicker();
});
</script>
</head>
<body>
<div>From: <input type="text" id="txtDate" />&nbsp;To: <input type="text" id="txtDate2" /></div>

</html>