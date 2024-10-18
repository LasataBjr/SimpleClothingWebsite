$(document).ready(function(){
	//jquery for expand and collapse of the menu
	$('.dropbtn').click(function(){
		$('this').next('.dropdown-menu').slideToggle();
		$(this).find('.dropdown').toggleClass('rotate');
	});
});