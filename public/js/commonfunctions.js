var Requried = 'Required';
var email_wrong_formate = 'Entered email formate worng';
var email_already_exixts = 'Entered email is already registered.';
function regTab1(tabid,stage){
	$("html, body").animate({ scrollTop:100 }, 600);
	var closeTadId=$('#opentabId').val();
	if(closeTadId=='7'){
		$("#tab_"+closeTadId+"_hide").slideUp("slow");		
		$("#icon"+closeTadId).removeClass("glyphicon-triangle-top").addClass("glyphicon-triangle-bottom");
		$('#opentabId').val(tabid);
	}else{
		$("#tab_"+closeTadId+"_hide").slideUp("slow");
		$("#icon"+closeTadId).removeClass("glyphicon-triangle-top").addClass("glyphicon-triangle-bottom");
		$("#tab_"+tabid+"_hide").slideDown("slow");
		$("#icon"+tabid).removeClass("glyphicon-triangle-bottom").addClass("glyphicon-triangle-top");
		$('#opentabId').val(tabid);
	}
}
var tab1flag = false;
var tab2flag = false;
var tab3flag = false;
var tab4flag = false;
function setAllTrue(){
	tab1flag = true;
	tab2flag = true;
	tab3flag = true;
	tab4flag = true;
}
function validateReg(typeTab){
	var flag = true;	
	var usertype = $("#user_type").val();
	var userEmail = $("#user_email").val();
	if(typeTab==1){		
		if(usertype==""){
			$("#user_type_req").html(Requried);
			flag=false;
		}else{
			$("#user_type_req").html('');
		}
		if($("#hid_user_id").val()==""){
			if(userEmail==""){
				$("#user_email_req").html(Requried);
				flag=false;
			}else if(checkEmail(userEmail)==false){
				$("#user_email_req").html(email_wrong_formate);
				flag=false;
			}else if(checkEmailVaild()==1){
				$("#user_email_req").html(email_already_exixts);
				flag=false;
			}else{
				$("#user_email_req").html('');
			}
		}else{
			$("#hidCheckValue").val('0');
			$("#user_email_req").html('');
		}
		if($("#user_password").val()==''){
			$("#user_pwd_req").html(Requried);
			flag = false;
		}else{
			$("#user_pwd_req").html('');	
		}	
		if(flag == false){
			$("#hid_tab_1").val('1');
			$("#hidCheckValue").val('0');
			tab1flag = false;
			return false;
		}else{	
			$("#hidCheckValue").val('0');
			$("#hid_tab_1").val('0');
			var typeTabNext = typeTab+1;
			tab1flag = true;
			regTab1(typeTabNext,'0');
		}
	}else if(typeTab==2){
		if($("#user_first_name").val()==''){
			$("#user_firstname_req").html(Requried);
			flag = false;
		}else{
			$("#user_firstname_req").html('');
		}
		if($("#user_last_name").val()==''){
			$("#user_lastname_req").html(Requried);
			flag = false;
		}else{
			$("#user_lastname_req").html('');
		}
		if($("#user_gendermf").val()==''){
			$("#user_gender_req").html(Requried);
			flag = false;
		}else{
			$("#user_gender_req").html('');
		} 
		if($("#user_gendermf").val()==''){
			$("#user_gender_req").html(Requried);
			flag = false;
		}else{
			$("#user_gender_req").html('');
		}
		if( ($("#user_date").val()=='') && ($("#user_month").val()=='') && ($("#user_year").val()=='')){
			$("#user_dob_req").html(Requried);
			flag = false;
		}else{
			$("#user_dob_req").html('');
		}
		if($("#user_country").val()==''){
			$("#user_country_req").html(Requried);
			flag = false;
		}else{
			$("#user_country_req").html('');
		}
		if($("#user_mobile").val()==''){
			$("#user_mobile_req").html(Requried);
			flag = false;
		}else{
			$("#user_mobile_req").html('');
		}
		if(usertype==1){
			if($("#user_parent_name").val()==''){
				$("#user_parent_name_req").html(Requried);
				flag = false;
			}else{
				$("#user_parent_name_req").html('');
			}
			if($("#user_parent_lastname").val()==''){
				$("#user_parent_lastname_req").html(Requried);
				flag = false;
			}else{
				$("#user_parent_lastname_req").html('');
			}
			if($("#user_mobile_number").val()==''){
				$("#user_parent_mobile_req").html(Requried);
				flag = false;
			}else{
				$("#user_parent_mobile_req").html('');
			}
			if($("#user_parent_email").val()==''){
				$("#user_parent_email_req").html(Requried);
				flag = false;
			}else{
				$("#user_parent_email_req").html('');
			}
			if($("#user_parent_pincode").val()==''){
				$("#user_parent_pincode_req").html(Requried);
				flag = false;
			}else{
				$("#user_parent_pincode_req").html('');
			}
			if($("#user_perment_pincode").val()==''){
				$("#user_parent_perment_pincode_req").html(Requried);
				flag = false;
			}else{
					$("#user_parent_perment_pincode_req").html('');
			}
			if($("#user_afi").val()==''){
				$("#user_annual_afi_req").html(Requried);
				flag = false;
			}else{
				$("#user_annual_afi_req").html('');
			}
			if($("#user_fnw").val()==''){
				$("#user_fnw_req").html(Requried);
				flag = false;
			}else{
				$("#user_fnw_req").html('');
			}
		}
		if(usertype==2){
			if($("#user_emp_ctc").val()==''){
				$("#user_emp_ctc_req").html(Requried);
				flag = false;
			}else{
				$("#user_emp_ctc_req").html('');
			}
		}
		if(flag == false){
			$("#hid_tab_2").val('1');
			tab2flag = false;
			return false;
		}else{
			$("#hid_tab_2").val('0');
			var typeTabNext = typeTab+1;
			tab2flag = true;
			regTab1(typeTabNext,'0');
		}
	}else if(typeTab==3){
		if(usertype==1){
			if($("#user_state").val()==''){
				$("#user_state_req").html(Requried);
				flag = false;
			}else{
				$("#user_state_req").html('');
			}
			if($("#user_district").val()==''){
				$("#user_district_req").html(Requried);
				flag = false;
			}else{
				$("#user_district_req").html('');
			}
			if($("#user_colleges").val()==''){
				$("#user_colleges_req").html(Requried);
				flag = false;
			}else{
				$("#user_colleges_req").html('');		
			}
			if($("#user_principal_name").val()==''){
				$("#user_principal_name_req").html(Requried);
				flag = false;
			}else{
				$("#user_principal_name_req").html('');
			}
			if($("#user_princi_phone").val()==''){
				$("#user_princi_phone_req").html(Requried);
				flag = false;
			}else{
				$("#user_princi_phone_req").html('');
			}
			if($("#user_princi_email").val()==''){
				$("#user_princi_email_req").html(Requried);
				flag = false;
			}else{
				$("#user_princi_email_req").html('');
			}
			if(flag == false){
				$("#hid_tab_3").val('1');
				tab3flag = false;
				return false;
			}else{
				$("#hid_tab_3").val('0');
				var typeTabNext = typeTab+1;
				tab3flag = true;
				regTab1(typeTabNext,'0');
			}
		}else{
			$("#hid_tab_3").val('0');
			var typeTabNext = typeTab+1;
			tab3flag = true;
			regTab1(typeTabNext,'0');
		}
	}else if(typeTab==4){
		if(($("#user_entrance_year").val()=='') || ($("#user_entrance_exam").val()=='') || ($("#user_entrance_rank").val()=='')){
			$("#user_entrance_rank_req").html(Requried);
			$("#user_entrance_op_1").html('Optional');
			$("#user_entrance_op_2").html('Optional');
			flag = false;
		}else{
			$("#user_entrance_op_1").html('');
			$("#user_entrance_op_2").html('');
			$("#user_entrance_rank_req").html('');
		}
		if(flag == false){
			$("#hid_tab_4").val('1');
			tab4flag = false;
			return false;
		}else{
			$("#hid_tab_4").val('0');
			var typeTabNext = typeTab+1;
			tab4flag = true;
			regTab1(typeTabNext,'0');
		}
	}else if(typeTab==5){
			var typeTabNext = typeTab+1;
			regTab1(typeTabNext,'0');
	}else if(typeTab==6){
			var typeTabNext = typeTab+1;
			regTab1(typeTabNext,'0');
	}else if(typeTab==7){
			var typeTabNext = typeTab+1;
			regTab1(typeTabNext,'1');
	}
	return false;
	/*
	if(tab1flag && tab2flag && tab3flag && tab4flag){	
		allFormValdation();
	}else{
		return false;
	}
	*/
}
function formFinalSubmit(){
	if(tab1flag && tab2flag && tab3flag && tab4flag){
		if( allFormValdation() )
		{
			$("#frm_meth").submit();	
		}
	}
	
	if( ! tab1flag )
	{
		regTab1(1,0); validateReg(1); return  false;
	}
	else if( ! tab2flag )
	{
		regTab1(2,0); validateReg(2); return  false;
	}
	else if( ! tab3flag )
	{
		regTab1(3,0); validateReg(3); return  false;
	}
	else if( ! tab4flag )
	{
		regTab1(4,0); validateReg(4); return  false;
	}
	return  false;
}
function allFormValdation(){
	var flag = true;
	var usertype = $("#user_type").val();
	var userEmail = $("#user_email").val();
	if(usertype==""){
		$("#user_type_req").html(Requried);
		flag=false;
	}else{
		$("#user_type_req").html('');
	}
	if($("#hid_user_id").val()==""){
		if(userEmail==""){
			$("#user_email_req").html(Requried);
			flag=false;
		}else if(checkEmail(userEmail)==false){
			$("#user_email_req").html(email_wrong_formate);
			flag=false;
		}else if(checkEmailVaild()==1){
			$("#user_email_req").html(email_already_exixts);
			flag=false;
		}else{
			$("#user_email_req").html('');
		}
	}else{
		$("#hidCheckValue").val('0');
		$("#user_email_req").html('');
	}
	if($("#user_password").val()==''){
		$("#user_pwd_req").html(Requried);
		flag = false;
	}else{
		$("#user_pwd_req").html('');	
	}
	if($("#user_first_name").val()==''){
		$("#user_firstname_req").html(Requried);
		flag = false;
	}else{
		$("#user_firstname_req").html('');
	}
	if($("#user_last_name").val()==''){
		$("#user_lastname_req").html(Requried);
		flag = false;
	}else{
		$("#user_lastname_req").html('');
	}
	if($("#user_gendermf").val()==''){
		$("#user_gender_req").html(Requried);
		flag = false;
	}else{
		$("#user_gender_req").html('');
	} 
	if($("#user_gendermf").val()==''){
		$("#user_gender_req").html(Requried);
		flag = false;
	}else{
		$("#user_gender_req").html('');
	}
	if( ($("#user_date").val()=='') || ($("#user_month").val()=='') || ($("#user_year").val()=='')){
		$("#user_dob_req").html(Requried);
		flag = false;
	}else{
		$("#user_dob_req").html('');
	}
	if($("#user_country").val()==''){
		$("#user_country_req").html(Requried);
		flag = false;
	}else{
		$("#user_country_req").html('');
	}
	if($("#user_mobile").val()==''){
		$("#user_mobile_req").html(Requried);
		flag = false;
	}else{
		$("#user_mobile_req").html('');
	}
	if(usertype==1){
		if($("#user_parent_name").val()==''){
			$("#user_parent_name_req").html(Requried);
			flag = false;
		}else{
			$("#user_parent_name_req").html('');
		}
		if($("#user_parent_lastname").val()==''){
			$("#user_parent_lastname_req").html(Requried);
			flag = false;
		}else{
			$("#user_parent_lastname_req").html('');
		}
		if($("#user_mobile_number").val()==''){
			$("#user_parent_mobile_req").html(Requried);
			flag = false;
		}else{
			$("#user_parent_mobile_req").html('');
		}
		if($("#user_parent_email").val()==''){
			$("#user_parent_email_req").html(Requried);
			flag = false;
		}else{
			$("#user_parent_email_req").html('');
		}
		if($("#user_parent_pincode").val()==''){
			$("#user_parent_pincode_req").html(Requried);
			flag = false;
		}else{
			$("#user_parent_pincode_req").html('');
		}
		if($("#user_perment_pincode").val()==''){
			$("#user_parent_perment_pincode_req").html(Requried);
			flag = false;
		}else{
				$("#user_parent_perment_pincode_req").html('');
		}
		if($("#user_afi").val()==''){
			$("#user_annual_afi_req").html(Requried);
			flag = false;
		}else{
			$("#user_annual_afi_req").html('');
		}
		if($("#user_fnw").val()==''){
			$("#user_fnw_req").html(Requried);
			flag = false;
		}else{
			$("#user_fnw_req").html('');
		}
	}
	if(usertype==2){
		if($("#user_emp_ctc").val()==''){
			$("#user_emp_ctc_req").html(Requried);
			flag = false;
		}else{
			$("#user_emp_ctc_req").html('');
		}
	}
	if(usertype==1){
		if($("#user_state").val()==''){
			$("#user_state_req").html(Requried);
			flag = false;
		}else{
			$("#user_state_req").html('');
		}
		if($("#user_district").val()==''){
			$("#user_district_req").html(Requried);
			flag = false;
		}else{
			$("#user_district_req").html('');
		}
		if($("#user_colleges").val()==''){
			$("#user_colleges_req").html(Requried);
			flag = false;
		}else{
			$("#user_colleges_req").html('');		
		}
		if($("#user_principal_name").val()==''){
			$("#user_principal_name_req").html(Requried);
			flag = false;
		}else{
			$("#user_principal_name_req").html('');
		}
		if($("#user_princi_phone").val()==''){
			$("#user_princi_phone_req").html(Requried);
			flag = false;
		}else{
			$("#user_princi_phone_req").html('');
		}
		if($("#user_princi_email").val()==''){
			$("#user_princi_email_req").html(Requried);
			flag = false;
		}else{
			$("#user_princi_email_req").html('');
		}
	}
	if(flag==false){		
		return false;
	}else{
		$("#hidCheckValue").val('0');
		return true;
	}
}
function addIssueFunction(type){
	  var flag=true;
	  var title= $("#title").val();
	  var buttontype=$('#hidbutton_value').val(type);
	  var selectcat=$('#category_id').val();
	  if(title==""){
		 $("#errortitle").html("Required");
		 flag=false;
	  }else{
		  $("#errortitle").html("");
	  }
	  var ckeditor= CKEDITOR.instances['article-body'].getData().replace(/<[^>]*>/gi, '').length;
	  if( !ckeditor ){
		$("#erroreditor").html("Required");
		 flag=false;
	  }else{
		$("#erroreditor").html(""); 
	  }
	  if(selectcat==""){
		$('#errorCat').html('Required');
		 flag=false;
	  }else{
		$('#errorCat').html('');
	  }
	  if(flag==true){
		$('#addIssue').submit();
	  }
	}
function backFunction(back_type){
	if(back_type==1){
		window.location=BASE_URL+'/admin/issues';
	}else if(back_type==2){
		window.location=BASE_URL+'/admin/categories-list';
	}else{
		window.location=BASE_URL+'/admin/dashboard';
	}
}
function addissFunction(){
window.location=BASE_URL+'/admin/addissue';
}

function deleteIssue(id){
window.location=BASE_URL+'/admin/issues?delid='+id;
}
function editIssue(edit_id){
	window.location=BASE_URL+'/admin/addissue?ediid='+edit_id;
}
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
					$("#user_colleges").html(data.ajaxinfo);					
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
	if( $("#hid_user_id").val() == ''){
		var emailStatus = 0;
		var emailcheck = $("#user_email").val();
		if(emailcheck!==''){
			if(checkEmail(emailcheck)==false)
			{
				alert('Please email format not correct'); emailStatus=1; return emailStatus;
			}
			else{	
				$.ajax({
					type:'POST',
					url:  BASE_URL+'/users/check-email-exists',
					data:{user_email:emailcheck},
					success: function(data){
						if(data.output=='exists'){
							$("#hidCheckValue").val('1');
							emailStatus = 1;
						}else{
							emailStatus = 0;
						}
					}
				});
			}
		}
		return emailStatus;
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
function loginValidations(){
	var flag=true;
	$('#errorMsg').html('');
	var userEmail=$('#email').val();
	var userPassword=$('#password').val();
	if(userEmail==''){
		$('#emailError').html('Required');
		flag=false;
	}else if(checkEmail(userEmail)==false){
		$('#emailError').html('Enter valid email id');
		flag=false;
	}else{
		$('#emailError').html('');
	}
	if(userPassword==''){
		$('#passwordError').html('Required');
		flag=false;
	}else{
		$('#passwordError').html('');
	}
	if(flag==false){
		return false;
	}else{
			var image=BASE_PATH+'/images/ajax-loader.gif';
			$('#reload').html('<img src='+image+' />'); 
			var url=BASE_URL+'/users/login';
			$.ajax({
				type:'POST',
				datatype:'json',
				url:  url,
				data:{inputEmail:userEmail,password:userPassword},
				success: function(response){
					$('#reload').html('');
					if(response.output=='success'){
						if(response.user_type_id==4){
							window.location=BASE_URL+"/admin/dashboard";							
						}else {
							window.location=BASE_URL;
						}
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
	$("#sucessdiv").hide();
	$("#errordiv").hide();
	var flag=true;
	var userId=$("#hidUserId").val();
	var oldpasswrd=$("#oldPassword").val();		
	var passwrd=$("#newPassword").val();
	var cnfpwrd=$("#confirmPassword").val();
	if(oldpasswrd==""){
		$('#oldPwdError').html('Required');
		$("#oldPassword").focus();
		flag=false;
	}else{
		$('#oldPwdError').html('');
	}		
	if(passwrd==""){
		$('#newPwdError').html('Required');
		$("#newPassword").focus();
		flag=false;
	}else{
		$('#newPwdError').html('');
	}		
	if(cnfpwrd==""){
		$('#confirmPwdError').html('Required');
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
		var image=BASE_PATH+'/images/ajax-loader.gif';
			$('#reload').html('<img src='+image+' />'); 
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
						$('#reload').html('');
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
								$("#oldPassword").val('');
								$("#newPassword").val('');
								$("#confirmPassword").val('');
								$("#errordiv").hide();
								$("#sucessdiv").show();
								$('#sucessMsg').html('Change password sucessfully updated.');
							
							}
						});					
					}else{
						$("#sucessdiv").hide();
						$("#errordiv").show();
						$('#reload').html('');
						$('#errorMsg').html('Old password is wrong');
					}
				}
			});			
		}else{
			$("#sucessdiv").hide();
			$("#errordiv").show();
			$('#errorMsg').html('Do not match the new and confirm passwords');
			$("#confirmPassword").focus();
			$('#reload').html('');
		}
	}		
}	
function forgetPassword(){	
	$("#sucessdiv").hide();
	$("#errordiv").hide();
	$('#errorMsg').html('');
	$('#sucessMsg').html('');
    var flag=true;
	var emailcheck=$('#forgetMail').val();
	if(emailcheck==''){
		//$('#emailError').html('Enter a email');
		//$("#errordiv").show();
		$('#emailError').html('Required');
		flag=false;
	}else if(checkEmail(emailcheck)==false){
		//$('#emailError').html('Enter valid email');
		//$("#errordiv").show();
		$('#emailError').html('Enter valid email');
		flag=false;
	}else{
		$('#emailError').html('');
	}
	if(flag==false){ 
		return false;
	}else{	
		var image=BASE_PATH+'/images/ajax-loader.gif';
		$('#reload').html('<img src='+image+' />'); 
		var  url =  BASE_URL+'/users/send-password-reset-url';
		$.ajax({
			type:'POST',
			url:   url,
			data:{email:emailcheck},
			success: function(result){
				$('#reload').html(''); 
				if(result.output=='success'){
					$("#sucessdiv").show();
					$('#sucessMsg').html('Sucessfully sending the mail');
				}else if(result.output=='Not Found The Email'){
					$("#errordiv").show();
					$('#errorMsg').html('Do not match email');
				}else if(result.output=='server-error'){
					$("#errordiv").show();
					$('#errorMsg').html('Mail is not sending');
				}
			}
		});			
	}		
}
function resetPassword(regAuth){	
	var flag=true;
	$('#errorMsg').html('');
	$('#sucessMsg').html('');
	$("#errordiv").hide();
	$("#errordiv").hide();
	var token=$('#hidToken').val();	
	var passwrd=$("#newPassword").val();
	var cnfpwrd=$("#confirmPassword").val();
	if(passwrd==""){
		$('#newPwdError').html('Required');
		$("#newPassword").focus();
		flag=false;
	}else{
		$('#newPwdError').html('');
	}		
	if(cnfpwrd==""){
		$('#confirmPwdError').html('Required');
		$("#confirmPassword").focus();
		flag=false;
	}else{
		$('#confirmPwdError').html('');
	}
	if(flag==false){ 
			return false;
	}else{	
		var image=BASE_PATH+'/images/ajax-loader.gif';
		$('#reload').html('<img src='+image+' />');
		if(passwrd==cnfpwrd){
		var  url = BASE_URL+'/users/setnepassword';
			$.ajax({
				type:'POST',
				url:url,
				data:{cnfpwrd:cnfpwrd,token:token},
				success: function(data){
					$('#reload').html(''); 
					if(data.output=='success'){	
						$("#sucessdiv").show();
						$('#sucessMsg').html('Sucessfully reset the password');
							window.location=BASE_URL;
					}else{
						$("#sucessdiv").show();
						$('#sucessMsg').html('All ready reset the password');
					}
				}
			});
		}else{
			$('#reload').html(''); 
			$("#errordiv").show();
			$('#errorMsg').html('Do not match the new and confirm passwords');
			$("#confirmPassword").focus();
		}
	}		
}
function addLikeCount(status,key,issueId,totalLikes){
		var pTotalLikes=0;
		if(status==2){
			window.location =  BASE_URL+'/users/login';
		}else{
			if(status==1){
				pTotalLikes=totalLikes+1;
				$('#likeStatus'+key).html('<a href="JavaScript:void(0);" class="btn btn-primary btn-xs" onclick="addLikeCount(0,'+key+','+issueId+','+pTotalLikes+');">Dislike</a>');
				$('#likeCount'+key).html('<span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>'+pTotalLikes);
			}else{
				pTotalLikes=totalLikes-1;
				$('#likeStatus'+key).html('<a href="JavaScript:void(0);" class="btn btn-primary btn-xs" onclick="addLikeCount(1,'+key+','+issueId+','+pTotalLikes+');">Like</a>');
				$('#likeCount'+key).html('<span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>'+pTotalLikes);
			}
			var  url =  BASE_URL+'/like-unlike';
			$.ajax({
				type:'POST',
				url: url,
				data:{total_likes:pTotalLikes,issue_id:issueId,like_type:status},
				success: function(data){

				}
			});		
		}
	}
//Admin category Function 
function CategoryFunction(ad_type){
	if(ad_type==0){
		window.location=BASE_URL+"/admin/categories-list";
	}else{
		window.location=BASE_URL+"/admin/issues";
	}
}

function editCategory(editcatid){
	window.location=BASE_URL+"/admin/add-category?editid="+editcatid;
	
}
function deleteCategory(delcatid){
	window.location=BASE_URL+"/admin/delete-category?id="+delcatid;
	
}
function addCategory(){
	
	window.location=BASE_URL+"/admin/add-category";
	
}