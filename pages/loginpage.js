var cycle = 0;
var allBackgrounds = [ "aveng.jpg", 
                       "starwars.jpg",
                        "captain.jpg",
                        "gravity.jpg",
                        "aqua.jpg"];
 
setInterval(function() {
	if (cycle < 5) {
		document.body.style.backgroundImage = "url('" + allBackgrounds[cycle] + "')";
		cycle += 1;
	} else { 
		cycle = 0;
	}
}, 3000);
