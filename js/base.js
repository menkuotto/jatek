var kep_tmp ='';
var kep1 ='';
var kep2 = ''; 
var kep3 = '';
var pontszam=0;
$.fn.villog = function() {
	for($i=1; $i<5; $i++){
	this.fadeTo(100, 0.1).fadeTo(200, 1.0); 
	}
} 
function polg_vk(vkk){
var vk='. vk';
if(vkk=='Polgármester jelölt'){vk='';}
return vk;
}
function slot_vk(vkk){
var vk=vkk;
if(vkk=='Polgármester jelölt'){vk='';}
return vk;
}
function porget(){  
$.ajax({
type: "POST",
url: "json.php?task=porget",
dataType: "text",
scriptCharset: "utf-8" ,
data: { "sav": "ossz"} 
}).done(function(dataIN){
	dataP = JSON.parse(dataIN);
setTimeout(function(){$('#sav1').html('<image src="'+dataP.kep1+'"/><div class="vk">'+slot_vk(dataP.vk1)+'</div>');},500);	
setTimeout(function(){$('#sav2').html('<image src="'+dataP.kep2+'"/><div class="vk">'+slot_vk(dataP.vk2)+'</div>');},700);	
setTimeout(function(){$('#sav3').html('<image src="'+dataP.kep3+'"/><div class="vk">'+slot_vk(dataP.vk3)+'</div>');},100);
setTimeout(function()
		{
$('#nev1').html(dataP.nev1+' '+dataP.vk1+polg_vk(dataP.vk1));
if(dataP.csoport1=='s' ){$('#nev1').css("color","red").villog();}else{$('#nev1').css("color","")}
$('#nev2').html(dataP.nev2+' '+dataP.vk2+polg_vk(dataP.vk2));
if(dataP.csoport2=='s' ){$('#nev2').css("color","red").villog();}else{$('#nev2').css("color","")}
$('#nev3').html(dataP.nev3+' '+dataP.vk3+polg_vk(dataP.vk3));
if(dataP.csoport3=='s' ){$('#nev3').css("color","red").villog();}else{$('#nev3').css("color","")}
if(dataP.csoport1==dataP.csoport2 && dataP.csoport2==dataP.csoport3){if(dataP.csoport1!='s'){$('#nev1').villog();$('#nev2').villog();$('#nev3').villog();}}

$('#uzeno').html(dataP.uzenet+'<div> pontszám: '+dataP.pont+'</div>');
pontszam=pontszam+parseInt(dataP.pont);
$('#pontszam').html(pontszam);
},1200); 
	
});
}

function start_slot( ) {

$('#sav1').html('');
$('#sav2').html('');
$('#sav3').html('');
//setTimeout(porget(1),1000);
porget();
}
	