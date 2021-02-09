<?php
include 'DBController.php';
$db_handle = new DBController();
$productResult = $db_handle->runQuery("select huf_id,huf_ipd,huf_pname,huf_uhid,huf_dadm,huf_tadm,huf_ddd,huf_dddd,huf_tddd,huf_mlc,huf_surg,huf_lens,huf_recd from tbl_huf");

if (isset($_POST["export"])) {
    $filename = "Export_excel.xls";
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=\"$filename\"");
    $isPrintHeader = false;
    if (! empty($productResult)) {
        foreach ($productResult as $row) {
            if (! $isPrintHeader) {
                echo implode("\t", array_keys($row)) . "\n";
                $isPrintHeader = true;
            }
            echo implode("\t", array_values($row)) . "\n";
        }
    }
    exit();
}
?>
<html>
<head>

<style>
body {
    font-size: 0.95em;
    font-family: arial;
    color: #212121;
}

th {
    background: #E6E6E6;
    border-bottom: 1px solid #000000;
}

#table-container {
    width: 850px;
    margin: 50px auto;
}

table#tab {
    border-collapse: collapse;
    width: 100%;
}

table#tab th, table#tab td {
    border: 1px solid #E0E0E0;
    padding: 8px 15px;
    text-align: left;
    font-size: 0.95em;
}

.btn {
    padding: 8px 4px 8px 1px;
}
#btnExport {
    padding: 10px 40px;
    background: #499a49;
    border: #499249 1px solid;
    color: #ffffff;
    font-size: 0.9em;
    cursor: pointer;
}
</style>
</head>
<body>
    <!--<div id="table-container">
        <table id="tab">
            <thead>
                <tr>
                    <th width="35%">Sr. No.</th>
                    <th width="20%">Name of the Patient</th>
                    <th width="25%">UHID No</th>
                    <th width="20%">IPD No</th>
                    <th width="20%">Date of Admission (D1)</th>
                    <th width="20%">Time of Admission</th>
                    <th width="20%">Dischage/DAMA/Death</th>
                    <th width="20%">Date of Dischage/DAMA/Death (D2)</th>
                    <th width="20%">Time of Dischage/DAMA/Death</th>
                    <th width="20%">MLC/Non MLC</th>
                    <th width="20%">Surgery/No Surgery</th>
                     <th width="20%">Lenth of Stay /(LOS D2-D1)</th>
                    <th width="20%">Recorded By</th> 
                    
                </tr>
            </thead>
            <tbody>
 
            <?php
            if (! empty($productResult)) {
                foreach ($productResult as $key => $value) {
                    ?>
                 
                     <tr>
                    <td><?php //echo $productResult[$key]["huf_id"]; ?></td>
                     <td><?php //echo $productResult[$key]["huf_pname"]; ?></td>
                     <td><?php //echo $productResult[$key]["huf_uhid"]; ?></td>
                    <td><?php //echo $productResult[$key]["huf_ipd"]; ?></td>
                    <td><?php //echo $productResult[$key]["huf_dadm"]; ?></td>
                    <td><?php //echo $productResult[$key]["huf_tadm"]; ?></td>
                    <td><?php //echo $productResult[$key]["huf_ddd"]; ?></td>
                    <td><?php //echo $productResult[$key]["huf_dddd"]; ?></td>
                    <td><?php //echo $productResult[$key]["huf_tddd"]; ?></td>
                    <td><?php //echo $productResult[$key]["huf_mlc"]; ?></td>
                    <td><?php //echo $productResult[$key]["huf_surg"]; ?></td>
                    <td><?php //echo $productResult[$key]["huf_lens"]; ?></td>
                  <td><?php //echo $productResult[$key]["huf_recd"]; ?></td>
                </tr>
             <?php
                }
            }
            ?>
      </tbody>
        </table>-->
<title> IPD Reports Download</title>
       <center style="padding:200px 0 0  ;"> <div class="btn">
            <form action="" method="post">
                <button type="submit" id="btnExport"
                    name='export' value="Export to Excel"
                    class="btn btn-info">Export to Excel</button>
            </form>
        </div></center>
    </div>
</body>
</html>