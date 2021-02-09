  
conInt = 0;
conLev=1;
zVal=1.96;

ss=0;
pop=0;
perc=0;
pf = 0;

function to(obj) {
    
  if (obj.box.value == "") {
    conInt=0
  }
  else {
    conInt = eval(obj.box.value)
  }

  if (obj.popbox.value == "" || obj.popbox.value == 0) { 
      alert("You must enter a Population");
      return false;
   }
  else {
     pop = eval(obj.popbox.value)
  }

  if (conInt == 0) {
      alert("You must enter a confidence interval between .1 and 50.")
   }
  else {  
     if (pop == 0) {
        ss = ((zVal *zVal) * 0.25) / ((conInt / 100) *(conInt / 100))
     }
     else {
       ss = ((zVal *zVal) * 0.25) / ((conInt / 100) *(conInt / 100));

       ss=ss/(1+(ss-1)/pop)
     }
        
     obj.s_size.value=parseInt(ss+.5)

  }
}

function ConLevButF2(obj){
   zVal=1.96
}
function ConLevButF3(obj){
   zVal=2.58
}
function ConLevButF1(obj){
   zVal=1.645
}




function cler(obj, string) {
  obj.box.value = string;
  obj.popbox.value = string;
  obj.s_size.value = string;
}



  function iVal(val) {  var sTmp=""; var sAllow="1234567890"
  for(i=0;i<val.length;i++) if(sAllow.indexOf(val.charAt(i))>=0) sTmp+=val.charAt(i);
  return sTmp;} 