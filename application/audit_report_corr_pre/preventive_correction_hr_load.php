



<style>
.modal-dialog {
          width: 860px;

        }
.modal-header {
    background-color: #49a7d2;
    padding:16px 16px;
    color:#FFF;
    border-bottom:2px dashed #337AB7;
 }
</style>


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Launch demo modal
</button>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">�</span></button>
        <h4 class="modal-title" id="myModalLabel">Corrective & Preventive Action <span id="aname"></span></h4>
      </div>
      <form method="post" id="report_form" >
      <div class="modal-body">

			<div class="col-lg-12">	

<div class="col-lg-12">	
	 <table id="correc" class="table table-bordered table-striped">
                         
                                 <tr>
                                  	<th>sr. no</th>

                                  	<th>Corrective Action</th>

                                   <th >
                                       <button type="button" id="utton" name="tton"  onclick="return addrow1();" class="pull-right btn btn-raised btn-success btn-sm">Add </button>

                                   </th>
                                 </tr>

                                 <tbody id="correcbody">
                                

                                </tbody>
                      </table>
     </div>

     <div class="col-lg-12">	
	 <table id="preve" class="table table-bordered table-striped">
                         
                                 <tr>
                                  	<th>sr. no</th>

                                  	<th>Preventive Action</th>

                                   <th >
                                       <button type="button" id="utton" name="tton"  onclick="return addrow2();" class="pull-right btn btn-raised btn-success btn-sm">Add </button>

                                   </th>
                                 </tr>

                                 <tbody id="prevebody">
                                

                                </tbody>
                      </table>
     </div>
      	
       
                     
               
                       
                       <div class="col-lg-12">
											<hr />
										</div>

               
                             
             
        </div>
    <input type="hidden" name="report_name" id="report_name">
    <input type="hidden" name="report_name_id" id="report_name_id">

    <input type="hidden" name="report_name_d" id="report_name_d">
      
  </div>
      <div class="modal-footer">
      
        <button class="btn btn btn-success" type="submit" >Save</button>
        <button type="button" class="btn btn-orange" data-dismiss="modal">Cancel</button>
      </div>
  </form>
    </div>
  </div>
</div>

<script  type="text/javascript" >
	function saveCPReport(id,name){

		$('#report_name_id').val(id);
		$('#report_name').val(name);
		var aname=name;
		var array = name.split("_");


	     $.ajax({
				url:"audit_report_corr_pre/load_old_hr_report.php",
				method:"POST",
				data:{id:id,name:name},
				dataType:"json",
				success:function(data)
				{
					$('#correcbody').empty();

					$('#prevebody').empty();
					
						if(data){
							var preventives=data.p;
								
								for(var k in preventives) {
												myFunction1(preventives[k], k)
								}

								var corrctive=data.c;
								
								for(var j in corrctive) {
												myFunction(corrctive[j], j,'correcbody','paymentsno')
								}
						}

						



				
				}
			})	

	   
		
          $('#report_name_d').val('Hr Audit');
          
    	
    	$('#exampleModalCenter').modal('show');

    }

      function myFunction(item, index) {

   if(index!=100){
    var c=index+1;
   additionalRows='<tr id="row'+index+'"><td width="2%" class="paymentsno">'+c+'</td><td><textarea type="text" col="2" name="corrective_action['+index+']" id="corrective-action'+index+'" class="form-control" >'+item+'</textarea></td><td width="5%"><span  class="label label-danger" onclick="return removerow1('+index+');">Remove</span></td></tr>';
   
   

    $('#correcbody').append(additionalRows);
}

}
       
function myFunction1(item, index) {

   if(index!=100){
    var c=index+1;
   additionalRows='<tr id="row1'+index+'"><td width="2%" class="paymentsno1">'+c+'</td><td><textarea type="text" col="2" name="preventive_action['+index+']" id="preventive-action'+index+'" class="form-control" >'+item+'</textarea></td><td width="5%"><span  class="label label-danger" onclick="return removerow2('+index+');">Remove</span></td></tr>';
   
   

    $('#prevebody').append(additionalRows);
}

}

    String.prototype.capitalize = function() {
    return this.charAt(0).toUpperCase() + this.slice(1);
}
</script>

<script  type="text/javascript" >
	$(document).ready(function() {
	$(document).on('submit', '#report_form', function(event){
			event.preventDefault();
			
			
				
					
					$.ajax({
						url:"audit_report_corr_pre/save_hr_audit_report.php",
						method:'POST',
						data:new FormData(this),
						contentType:false,
						processData:false,
						success:function(data)
						{
							alert(data);
							$('#report_form')[0].reset();
							$('#exampleModalCenter').modal('hide');
							
						}
					});
				
			
		});

});

	 function addrow1(){

    // if(sessionStorage.clickcount){
    //   sessionStorage.clickcount =Number(sessionStorage.clickcount)+1;
    // }else{
    //   sessionStorage.clickcount=1;
    // }
    // var count =sessionStorage.clickcount;
    
    var numpayment = ($('#correcbody').children().length);
    var count=numpayment;
   
    if(numpayment>=1){
      numpayment =numpayment-1;
     if($.trim($('#correcbody tr:eq('+numpayment+')').find('textarea:eq(0)').val()) == ''){
          alert('Please Enter the Corrective Action.');
          $('#correcbody tr:eq('+numpayment+')').find('textarea:eq(0)').focus();
          return false;
      
   }
}

     var $tbody, $row, additionalRows;
    $tbody = $('#correcbody');
      var numprod = ($tbody.children().length);
    $row = $tbody.find('tr:last');



    additionalRows='<tr id="row1'+count+'"><td width="2%" class="paymentsno">1</td><td><textarea type="text" col="2" name="corrective_action['+count+']" id="corrective-action'+count+'" class="form-control" ></textarea></td><td width="5%"><span  class="label label-danger" onclick="return removerow1('+count+');">Remove</span></td></tr>';
   
   

    $('#correcbody').append(additionalRows);

    $("td.paymentsno").each(function(index,element){                 
           $(element).text(index + 1); 
        });

  



}

function removerow1(id){

  $("#row1"+id).remove();
  $("td.paymentsno").each(function(index,element){                 
           $(element).text(index + 1); 
        });
  

 }


  function addrow2(){

   
    
    var numpayment = ($('#prevebody').children().length);
    var count=numpayment;
    
    if(numpayment>=1){
      numpayment =numpayment-1;
     if($.trim($('#prevebody tr:eq('+numpayment+')').find('textarea:eq(0)').val()) == ''){
          alert('Please Enter the Preventive Action.');
          $('#correcbody tr:eq('+numpayment+')').find('textarea:eq(0)').focus();
          return false;
      
   }
}

     var $tbody, $row, additionalRows;
    $tbody = $('#prevebody');
      var numprod = ($tbody.children().length);
    $row = $tbody.find('tr:last');



    additionalRows='<tr id="row'+count+'"><td width="2%" class="paymentsno1">1</td><td><textarea type="text" col="2" name="preventive_action['+count+']" id="preventive-action'+count+'" class="form-control" ></textarea></td><td width="5%"><span  class="label label-danger" onclick="return removerow2('+count+');">Remove</span></td></tr>';
   
   

    $('#prevebody').append(additionalRows);

    $("td.paymentsno1").each(function(index,element){                 
           $(element).text(index + 1); 
        });

  



}

function removerow2(id){

  $("#row1"+id).remove();
  $("td.paymentsno1").each(function(index,element){                 
           $(element).text(index + 1); 
        });
  

 }


</script>




    







