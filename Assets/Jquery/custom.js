$(document).ready(function(){
$("#contact").validate({
//Rules
	rules:{
			name:{
				required:true
			},
			address:{
				required:true,
				digits: false,
			},
			email:{
				required: true
				 },
			password:{
				required:true,
				minlength: 8
			}
		

	},		
	//Messages
	messages:{
		name: "Please enter your name",
		address:
		{
		digits:"Please donot enter digits"
		},
		email:"Please enter proper email with @",
		password:
		{
		minlength:"please enter atleast 8 characters"
		}

	},
	submitHandler: function()
	{
		alert("Form Validated");
	}
	});
});