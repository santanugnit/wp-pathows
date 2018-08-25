// JavaScript Document
var button = document.getElementById("menu-button");
/*var responsive = document.getElementById("menu-responsive");
button.onclick = function(){
   this.classList.toggle("active");
  if(responsive.style.display==="block"){
     responsive.style.display="none";
  } else{
     responsive.style.display="block";
  }
}*/
var year = document.getElementById("year");
var d = new Date();
(function(){
	//year.innerHTML = d.getFullYear();
})();



(function( $ ) {
	
	$( document ).ready( function() {
		
		$("#menu-button").click( function(){
			var responsive = document.getElementById("menu-responsive");
			
			this.classList.toggle("active");
			if(responsive.style.display==="block"){
				responsive.style.display="none";
			} else{
				responsive.style.display="block";
			}
		});
		
		
	});
	
	
})( jQuery );