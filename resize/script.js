ResizeGame();
gw = 0;
gh = 0;
gx = 0;
gy = 0;
$(window).resize(function() { //Screen was resized.
	ResizeGame();
  //alert($(window).width());
});

 $(document).ready(function(){
 	ResizeGame();
 	//Half their screen size x 2 ?
	
	
 	//$('#lc1').click(function(event) {
 	//	$('#lc2').text("Rawr");
   	//});
   	$('#box').text("Rawr");
 });



 function ResizeGame() {

 	//200w
 	//x50
 	//gw100
 	//gh33
 	// 
 	gx = ($(window).width()/4);
 	gw = gx*2;
 	if (gw<314) return;
 	//1/3rds height of width.
 	gh = (gw/3);
 	gy = 500; //fixed 250 offset for height.
 	$('#tlborder').css('left', gx);
 	$('#tlborder').css('top', gy);
	$('#top').css('left', (gx+$('#tlborder').width()));
 	$('#top').css('top', gy); 	
 	$('#top').css('width', (gw-$('#tlborder').width()-$('#trborder').width()));
 	$('#bot').css('left', (gx+$('#blborder').width()));
 	$('#bot').css('top', gy+gh-$('#blborder').height()); 	
 	$('#bot').css('left', gx+$('#blborder').width()); 	
 	$('#bot').css('width', (gw-$('#blborder').width()-$('#brborder').width()));
 	$('#trborder').css('left', gx+gw-$('#tlborder').width());
 	$('#trborder').css('top', gy); 	
 	$('#blborder').css('left', gx);
 	$('#blborder').css('top', gy+gh-$('#blborder').height());
 	$('#brborder').css('left', gx+gw-$('#blborder').width());
 	$('#brborder').css('top', gy+gh-$('#blborder').height());
 	$('#left').css('left', gx);
 	$('#left').css('top', gy+$('#tlborder').height());
 	$('#left').css('height', (gh-$('#tlborder').height()-$('#blborder').height()));
 	$('#right').css('left', gx+gw-$('#tlborder').width());
 	$('#right').css('top', gy+$('#tlborder').height());
 	$('#right').css('height', (gh-$('#tlborder').height()-$('#blborder').height())); 
 	$('#box').css('left', gx+$('#blborder').width());
 	$('#box').css('top', gy+$('#tlborder').height());
 	$('#box').css('height', (gh-$('#tlborder').height()-$('#blborder').height()));  			 	
 	$('#box').css('width', (gw-$('#blborder').width()-$('#brborder').width()));
 }