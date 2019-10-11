var cycle = 0;
var allBackgrounds = [ "images/aveng.jpg", 
                       "images/starwars.jpg",
                        "images/captain.jpg",
                        "images/gravity.jpg",
                        "images/aqua.jpg"];
 
setInterval(function() {
	if (cycle < 5) {
		document.body.style.backgroundImage = "url('" + allBackgrounds[cycle] + "')";
		cycle += 1;
	} else { 
		cycle = 0;
	}
}, 3000);
