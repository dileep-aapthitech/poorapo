function getColleges(){
	var country_id = $('#user_country').val();
	var state_id = $('#user_state').val();
	var district_id = $('#user_district').val();
	if(country_id!=''){
		$.ajax({
			type:'POST',
			url:  BASE_URL+'/users/get-ajax-info',
			data:{countryid:country_id,stateid:state_id,distid:district_id},
			success: function(data){
				if(data.output=='success'){
					$("#user_colleges").html(data.dist_names);					
				}else{
					$("#user_colleges").html('');	
				}
			}
		});
	}else{
		alert('Select a country');return false;
	}	
}
function getDistricts(){
	var country_id = $('#user_country').val();
	var state_id = $('#user_state').val();
	if(country_id!=''){
		$.ajax({
			type:'POST',
			url:  BASE_URL+'/users/states-and-entranceexam',
			data:{countryid:country_id,stateid:state_id},
			success: function(data){
				if(data.output=='success'){
					$("#user_district").html(data.dist_names);					
				}else{
					$("#user_district").html('');	
				}
			}
		});
	}else{
		alert('Select a country');return false;
	}
}
function ajaxData(){
	var country_id = $('#user_country').val();
	if(country_id!=''){
		$.ajax({
			type:'POST',
			url:  BASE_URL+'/users/states-and-entranceexam',
			data:{countryid:country_id,},
			success: function(data){
				if(data.output=='success'){
					$("#user_state").html(data.statenames);
					$("#user_entrance_exam").html(data.entranceExams);
				}
			}
		});
	}else{
		alert('Select a country');return false;
	}
}
function checkEmailVaild(){
	var emailcheck = $("#user_email").val();
	if(emailcheck!==''){
	if(checkEmail(emailcheck)==false)
	{
		alert('Please email format not correct');return false;
	}
	else{	
		$.ajax({
			type:'POST',
			url:  BASE_URL+'/users/check-email-exists',
			data:{user_email:emailcheck},
			success: function(data){
				if(data.output=='exists'){
					alert('Already Email Exits'); return false;
				}else if(data.output=='notexists'){
					alert('valid Email'); return false;
				}
			}
		});
	}
  }
}
function switchinUser(){
	var userCheck = $("#user_type").val();
	if(userCheck==2){
		$("#hideemployeeDiv").hide();
		$("#employeeDiv").show();
	}else if(userCheck==1){
		$("#employeeDiv").hide();
		$("#hideemployeeDiv").show();
	}
}
function checkEmail(emailStr) {
	if (emailStr.length == 0) {
		return true;
	}
	var emailPat=/^(.+)@(.+)$/;
	var specialChars="\\(\\)<>@,;:\\\\\\\"\\.\\[\\]";
	var validChars="\[^\\s" + specialChars + "\]";
	var quotedUser="(\"[^\"]*\")";
	var ipDomainPat=/^(\d{1,3})[.](\d{1,3})[.](\d{1,3})[.](\d{1,3})$/;
	var atom=validChars + "+";
	var word="(" + atom + "|" + quotedUser + ")";
	var userPat=new RegExp("^" + word + "(\\." + word + ")*$");
	var domainPat=new RegExp("^" + atom + "(\\." + atom + ")*$");
	var matchArray=emailStr.match(emailPat);
	if (matchArray == null) {
		return false;
	}
	var user=matchArray[1];
	var domain=matchArray[2];
	if (user.match(userPat) == null) {
		return false;
	}
	var IPArray = domain.match(ipDomainPat);
	if (IPArray != null) {
		for (var i = 1; i <= 4; i++) {
			if (IPArray[i] > 255) {
				return false;
			}
		}
		return true;
	}
	var domainArray=domain.match(domainPat);
	if (domainArray == null) {
		return false;
	}
	var atomPat=new RegExp(atom,"g");
	var domArr=domain.match(atomPat);
	var len=domArr.length;
	if ((domArr[domArr.length-1].length < 2) ||(domArr[domArr.length-1].length > 3)) {
		return false;
	}
	if (len < 2) {
	   return false;
	}
	return true;
}
function loginValidations(type_id){
	var flag=true;
	$('#errorMsg').html('');
	var userEmail=$('#email').val();
	var userPassword=$('#password').val();
	if(userEmail==''){
		$('#emailError').html('Enter a email id');
		flag=false;
	}else if(checkEmail(userEmail)==false){
		$('#emailError').html('Enter valid email id');
		flag=false;
	}else{
		$('#emailError').html('');
	}
	if(userPassword==''){
		$('#passwordError').html('Enter a password');
		flag=false;
	}else{
		$('#passwordError').html('');
	}
	//$('#reload').html('<img src="public/images/spiffygif.gif"/>');
	if(flag==false){
		return false;
	}else{
			if(type_id==1){
				var url=BASE_URL+'/users/login';
			}else{
				var url=BASE_URL+'/admin/login';
			}
			
			$.ajax({
				type:'POST',
				datatype:'json',
				url:  url,
				data:{inputEmail:userEmail,password:userPassword,type_id:type_id},
				success: function(response){
					$('#reload').html('');
					if(response.output=='success'){
						if(type_id==1){
							window.location=BASE_URL+"/users/change-password";
						}else if(type_id==3){
							window.location=BASE_URL+"/admin/dashboard";
						}
						//window.location=BASE_URL+'edit-user?user_id='+data.user_id;
					}else{
						$('#errorMsg').html('Enter username and password are wrong');
					}
				}
			});
	}
}
function changePassword(regAuth){	
	$('#errorMsg').html('');
	$('#sucessMsg').html('');
	var flag=true;
	var userId=$("#hidUserId").val();
	var oldpasswrd=$("#oldPassword").val();		
	var passwrd=$("#newPassword").val();
	var cnfpwrd=$("#confirmPassword").val();
	if(oldpasswrd==""){
		$('#oldPwdError').html('Enter old Password');
		$("#oldPassword").focus();
		flag=false;
	}else{
		$('#oldPwdError').html('');
	}		
	if(passwrd==""){
		$('#newPwdError').html('Enter the password');
		$("#newPassword").focus();
		flag=false;
	}else{
		$('#newPwdError').html('');
	}		
	if(cnfpwrd==""){
		$('#confirmPwdError').html('Enter the confirm password');
		$("#confirmPassword").focus();
		flag=false;
	}else{
		$('#confirmPwdError').html('');
	}		
	if(flag==false){
		return false;
	}else{
		$('#errorMsg').html('');
		$('#sucessMsg').html('');
		if(passwrd==cnfpwrd){
			if(regAuth=='admin'){
				var  url =   ADMIN_BASE_URL+'/admin/check-password';
			} else if(regAuth=='user'){
				var  url =  BASE_URL+'/users/check-password';
			}
			$.ajax({
				type:'POST',
				url: url,
				data:{oldpasswrd:oldpasswrd,userId:userId},
				success: function(data){
					if(data.output=='success'){
						if(regAuth=='admin'){
								var  url2 =   ADMIN_BASE_URL+'/admin/change-password';
						} else if(regAuth=='user'){
								var  url2 =  BASE_URL+'/users/change-password';
						}
						$.ajax({
							type:'POST',
							url: url2, 
							data:{cnfpwrd:cnfpwrd,userId:userId},
							success: function(data){
								/*if(regAuth=='admin'){
									window.location=ADMIN_BASE_URL+'/admin/user-lists';
								}else if(regAuth=='user'){
									window.location=BASE_URL+'/users/change-password';
								}*/
								//alert('change_passwordSucessMsg');return false;
								$("#oldPassword").val('');
								$("#newPassword").val('');
								$("#confirmPassword").val('');
								$('#sucessMsg').html('change password sucessfully updated');
							}
						});					
					}else{
						$('#errorMsg').html('old password is wrong');
					}
				}
			});			
		}else{
			$('#errorMsg').html('Do not match the new and confirm passwords');
			$('#oldPwdError').html('Enter old Password');
			$("#confirmPassword").focus();
		}
	}		
}	
function forgetPassword(){	
    var flag=true;
	var emailcheck=$('#forgetMail').val();
	if(emailcheck==''){
		$('#emailError').html('Enter a email');
		flag=false;
	}else if(checkEmail(emailcheck)==false){
		$('#emailError').html('Enter valid email');
		flag=false;
	}else{
		$('#emailError').html('');
	}
	if(flag==false){ 
		return false;
	}else{	
		var  url =  BASE_URL+'/users/send-password-reset-url';
		$.ajax({
			type:'POST',
			url:   url,
			data:{email:emailcheck},
			success: function(result){
				alert(result);
				if(result.output=='success'){	
					$('#sucessMsg').html('Sucessfully sending the mail');
						window.location=BASE_URL;
				}else if(result.output=='notsuccess'){
					//$('#submit').removeAttr('disabled');
					$('#errorMsg').html('mail is not sending');
				}else if(result.output=='server-error'){
					$('#submit').removeAttr('disabled');
					$('#errorMsg').html('mail is not sending');
				}
			}
		});			
	}		
}
function resetPassword(regAuth){	
	var flag=true;
	var token=$('#hidToken').val();	
	var passwrd=$("#newPassword").val();
	var cnfpwrd=$("#confirmPassword").val();		
	if(passwrd==""&& cnfpwrd==""){
		$('#newPwdError').html('Your Confirm Password do not match!');
		flag=false;
		$("#newPassword").focus();
	}		
	if(flag==false){ 
			return false;
	}else{	
		$('#errorMsg').html('');
		if(passwrd==cnfpwrd){
		var  url = BASE_URL+'/users/setnepassword';
			$.ajax({
				type:'POST',
				url:url,
				data:{cnfpwrd:cnfpwrd,token:token},
				success: function(data){
					if(data.output=='success'){	
						$('#sucessMsg').html('Sucessfully reset the password');
							window.location=BASE_URL;
					}else{
						$('#errorMsg').html('All ready reset the password');
					}
				}
			});
		}else{
			$('#errorMsg').html('Do not match the new and confirm passwords');
			$("#confirmPassword").focus();
		}
	}		
}
//Admin category Function 
function CategoryFunction(ad_type){
	if(ad_type==0){
		//window.location=BASE_URL+"/admin/dashboard";
	}else{
		window.location=BASE_URL+"/admin/issues";
	}
}