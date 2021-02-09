  
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.min.js"></script>
    <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
    <style type="text/css">
    canvas{
        margin:auto;
    }
    .alert{
        margin-top:20px;
    }
element.style {
    /* FONT-WEIGHT: 500; */
    display: block;
    width: 1100;
    height: 400;

}
    </style>

  <table class="table header table-hover table-bordered">
                        <tr >
                            <td style="width: 300px;">
                               
<table class="custom-table"  cellspacing="10" cellpadding="10" border="1" width="600px"  style="border-color: #9DA2E2; text-align: center;" >
                                            <tr style="background-color: #9DA2E2;">
                                                <td style="font-weight: bold;color: white;">Total</td>
                                                <td style="font-weight: bold;color: white;">Completed</td>
                                                <td style="font-weight: bold;color: white;">Not-Completed</td>

                                        
                                            
                                            </tr>
                                            <tr style="background-color: white;">
                                                <?php
                                                    include('dbinfo.php');

                                                    $qry = "SELECT COUNT(*) as total FROM tbl_huf";
                                                        $res = mysqli_query($connect, $qry);
                                                        $row=mysqli_fetch_assoc($res);
                                                        // echo $row['total'];
                                                        // echo "SELECT COUNT(*) as total FROM tbl_huf";
                                                        // die();

                                                        $qrydis = "SELECT COUNT(*) as discharge FROM tbl_huf WHERE (huf_ddd='Discharge' AND huf_ddd!=' ') ";
                                                                $resdis = mysqli_query($connect, $qrydis);
                                                                $rowdis=mysqli_fetch_assoc($resdis);
                                                                // echo $rowdis['discharge'];
                                                                                                            

                                                        $qrynotdis = "SELECT COUNT(*) as notdischarge FROM tbl_huf WHERE (huf_ddd='Death' OR huf_ddd='DAMA' OR huf_ddd=' ') ";
                                                                    $resnotdis = mysqli_query($connect, $qrynotdis);
                                                                    $rownotdis=mysqli_fetch_assoc($resnotdis);
                                                                    // echo $rownotdis['notdischarge'];
                                                                    // echo "SELECT COUNT(*) as notdischarge FROM tbl_huf WHERE (huf_ddd='Death' OR huf_ddd='DAMA' OR huf_ddd=' ')";
                                                                    // die();

                                                       

                                                    ?>


                                                <td style="font-weight: bold;color: black;" ><?php echo $row['total'];?></td>
                                                <td style="font-weight: bold;color: green;"><?php echo $rowdis['discharge'];?></td>
                                                <td style="font-weight: bold;color: red;"><?php echo $rownotdis['notdischarge'];?></td>
                                                
                                            </tr>
                                            
                                        </table>
                            </td>


                            <td style="width: 400px;">
                                         <div class="col-lg-12">
                                            <div class="col-lg-12" style="padding-left:50;">
                                                <canvas id="myChart4" width="500" height="250px"></canvas>
                                            </div>
                                        </div>
                                                                        
                            </td>
                        </tr>
                        
                       
                    </table>
<script  type="text/javascript">
$(document).ready(function(){
    var ctx = document.getElementById("myChart4");
    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["Total ","Completed","Not-Completed"],
            datasets: [{
                label: 'Total, Completed, Not-Completed ',
                data: [<?php echo $row['total'];?>,
                <?php echo $rowdis['discharge'];?>,
                <?php echo $rownotdis['notdischarge'];?>],
                backgroundColor: [               
                    'rgba(49, 159, 9, 1)',
                    'rgba(242, 38, 96, 1)'
                    // 'rgba(15, 108, 189, 1)'
                    //,
                    //
                ]
            }]
        },
        options: {
            rotation: 2 * Math.PI,
            circumference: 2 * Math.PI
        }
    });
});
</script>