/*Image Slider*/

let currentSlide = 0;

function control(n) 
{
	currentSlide = currentSlide + n;	

	slideShow(currentSlide);
}

slideShow(currentSlide);
function slideShow(num) 
{
	let slides= document.getElementsByClassName('slide');
	if(num == slides.length)
	{
		currentSlide = 0;
		num = 0;
	}
	if(num < 0)
	{
		currentSlide = slides.length-1;
		num = slides.length-1;
	}
	for (let x of slides)//x consist array of slides
	{
		x.style.display = "none";
	}
	slides[num].style.display = "block";
}

/* Popup*/
function openup() 
	{
  		document.getElementById("popup").style.display = "block";
  		
  	}	
  	function closeup() 
	{
  		document.getElementById("popup").style.display = "none";
  	
  	}
/*function show() 
	{
  		document.getElementById("popup1").style.display = "block";
  	}	
  	function hide() 
	{
  		document.getElementById("popup1").style.display = "none";
  	}
function open() 
	{
  		document.getElementById("popup2").style.display = "block";
  	}	
  	function close() 
	{
  		document.getElementById("popup2").style.display = "none";
  	}*/

/*Form Validation*/

	/*name = document.getElementById("name").value;
	address = document.getElementById("address").value;
	email = document.getElementById("email").value;
	password = document.getElementById("password").value;
	let flag = 1;

	function fun()
	{
		if(name.length < 8)
		{
			//console.log("less");
			document.getElementById("error").innerHTML = "Should be atleast 8 characters";
		}
		else
		{
			document.getElementById("error").innerHTML = " ";
		}
		if(!isNaN(address))
		{
			//console.log("less");
			document.getElementById("error1").innerHTML = "Shouldn't be digits";
		}
		else
		{
			document.getElementById("error1").innerHTML = " ";
		}
		if(password.length < 8)
		{
			//console.log("less");
			document.getElementById("error3").innerHTML = "Should be atleast 8 characters";
		}
		else
		{
			document.getElementById("error3").innerHTML = " ";
		}

		

		if(flag)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
*/