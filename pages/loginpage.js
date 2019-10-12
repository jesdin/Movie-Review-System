var cycle = 0;
var allBackgrounds = [ "../images/aEndgame.jpg", 
                       "../images/newstarwars.jpg",
                        "../images/captainmarvel.jpg",
                        "../images/newgravity.jpg",
                        "../images/aquaman.jpg"];
 
setInterval(function() {
	if (cycle < 5) {
		document.body.style.backgroundImage = "url('" + allBackgrounds[cycle] + "')";
		cycle += 1;
	} else { 
		cycle = 0;
	}
}, 3000);
