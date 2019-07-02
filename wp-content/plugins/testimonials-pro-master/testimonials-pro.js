	
function displayPT(animation){ 
var tpcount=document.getElementById("tp_count").value; var tpcountall=document.getElementById("tp_count_all").value; 
var tpcountP=tpcount-1+2; var tpcountM=tpcount-1;
if(tpcountM=='0'){ tpcountM=tpcountall; tpcount=1;}

document.getElementById("TP_div_"+tpcount).style.display="none"; document.getElementById("TP_div_"+tpcountM).style.display="inherit";
document.getElementById("TP_div_"+tpcount).style.opacity="0"; document.getElementById("TP_div_"+tpcountM).style.opacity="1";
document.getElementById("tp_count").value=tpcountM;
}

function displayNT(animation){ 
var tpcount=document.getElementById("tp_count").value; var tpcountall=document.getElementById("tp_count_all").value; 
var tpcountP=tpcount-1+2; var tpcountM=tpcount-1; 
if(tpcountall<tpcountP){ tpcountP=1; tpcount=tpcountall; }

document.getElementById("TP_div_"+tpcount).style.display="none"; document.getElementById("TP_div_"+tpcountP).style.display="inherit";
document.getElementById("TP_div_"+tpcount).style.opacity="0"; 
document.getElementById("TP_div_"+tpcountP).style.opacity="1";

document.getElementById("tp_count").value=tpcountP;
}

function TP_init() {
document.getElementById("tp_count").value='1';
}
window.onload = TP_init; 

