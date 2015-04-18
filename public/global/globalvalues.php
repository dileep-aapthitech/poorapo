<?php
/*Forget Password*/
global $forgotPasswordSubject;
global $frogotPasswordMessage;
$forgotPasswordSubject = "Request For New Password for Poraapo";
$frogotPasswordMessage = '<body>
		<table width="600" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td><table width="600" border="0" cellspacing="0" cellpadding="5" style="border:1px solid #D63C2B">
			<tr><td bgcolor="#D63C2B">
				<a href="javascript:void(0);" target="_blank" style="text-decoration: none;">
				<span style="color:#fff; font:normal 30px arial">Poraapo.com</span></a></td>
			</tr>
			<tr>
				<td>
					<table width="100%" border="0" cellspacing="0" cellpadding="10" align="left">
						<tr><td><a href="javascript:void(0);" style="color:#4ca4b6; font:bold 12px arial; text-decoration:none;">Hello&nbsp;&nbsp;&nbsp;<FULLNAME></a></td></tr>
						<tr><td>This email was generated based on your request for new password.</td></tr>
						<tr><td>Please click the below link to reset your password.</td></tr>
						<tr><td><a href="<PASSWORDLINK>"><PASSWORDLINK></a></td></tr>
						<tr><td>Note: If you did not request for new password, please ignore this email.</td></tr>
						<tr><td>&nbsp;</td></tr>
						<tr><td>Sincerely,</td></tr>
						<tr><td>Poraapo.com team</td></tr>
					</table>
				</td>
			</tr>  
			</table></td>
		</tr> 
	</table>
<br/><br/>
Regards,<br/>
Poraapo.com 
</body>';
/*End Forget Password*/

/* register subject */
global $regSubject;
global $regMessage;
$regSubject= "Registration confirmation";
$regMessage='<body>
		<table width="600" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td><table width="600" border="0" cellspacing="0" cellpadding="5" style="border:1px solid #D63C2B ">
			<tr><td bgcolor="#D63C2B ">
				<a href="Javascript:void(0);" target="_blank" style="text-decoration: none;">
				<span style="color:#fff; font:normal 30px arial">Poraapo.com</span></a></td>
			</tr>
			<tr>
				<td>
					<table width="100%" border="0" cellspacing="0" cellpadding="10" align="left">
						<tr><td><a href="javascript:void(0);" style="color:#D63C2B ; font:bold 12px arial; text-decoration:none;">Hello&nbsp;&nbsp;&nbsp;<FULLNAME></a></td></tr>
						<tr><td>Successfully register with Poraapo.com</td></tr>
						<tr><td>&nbsp;</td></tr>
						<tr><td>Sincerely,</td></tr>
						<tr><td>Poraapo.com team</td></tr>
					</table>
				</td>
			</tr>  
			</table></td>
		</tr> 
	</table>
<br/><br/>
Regards,<br/>
Poraapo.com Customer Service
</body>';
/* end register subject*/
/* register subject */
global $sentShareMsgSubject;
global $sentShareMessage;
$sentShareMsgSubject= "<sentShareMsgSubject>";
$sentShareMessage='<body>
		<table width="600" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td><table width="600" border="0" cellspacing="0" cellpadding="5" style="border:1px solid #D63C2B ">
			<tr><td bgcolor="#D63C2B ">
				<a href="Javascript:void(0);" target="_blank" style="text-decoration: none;">
				<span style="color:#fff; font:normal 30px arial">Poraapo.com</span></a></td>
			</tr>
			<tr>
				<td>
					<table width="100%" border="0" cellspacing="0" cellpadding="10" align="left">
						<tr><td><a href="javascript:void(0);" style="color:#D63C2B ; font:bold 12px arial; text-decoration:none;">Dear&nbsp;&nbsp;&nbsp;<FULLNAME></a></td></tr>
						<tr><td><CREATEDUSERNAME>&nbsp;&nbsp; is  successfully created by a &nbsp;&nbsp;<CREATEDUSERTYPE></td></tr>						
						<tr><td>&nbsp;</td></tr>
						<tr><td>Sincerely,</td></tr>
						<tr><td>Poraapo.com team</td></tr>
					</table>
				</td>
			</tr>  
			</table></td>
		</tr> 
	</table>
<br/><br/>
Regards,<br/>
Poraapo.com Customer Service
</body>';
/* end register subject*/
/* register subject */
global $contactSubject;				
global $contactMessage;
$contactSubject= "Contact Information";
$contactMessage='<body>
		<table width="600" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td><table width="600" border="0" cellspacing="0" cellpadding="5" style="border:1px solid #D63C2B ">
			<tr><td bgcolor="#D63C2B ">
				<a href="Javascript:void(0);" target="_blank" style="text-decoration: none;">
				<span style="color:#fff; font:normal 30px arial">poraapo</span></a></td>
			</tr>
			<tr>
				<td>
					<table width="100%" border="0" cellspacing="0" cellpadding="10" align="left">
						<tr><td><a href="javascript:void(0);" style="color:#D63C2B ; font:bold 12px arial; text-decoration:none;">Hello&nbsp;&nbsp;&nbsp;<FIRSTNAME></a></td></tr>
						
						<tr><td>Contact Name:</td><td><FIRSTNAME></td></tr>
						<tr><td>Conatct Email:</td><td><CONTACTEMAIL></td></tr>
						<tr><td>Conatct Number:</td><td><PHONENUMBER></td></tr>
						<tr><td>Contact Message:</td><td><CONTACTMESSAGE></td></tr>
											
						<tr><td>&nbsp;</td></tr>
						<tr><td>Sincerely,</td></tr>
						<tr><td>poraapo team</td></tr>
					</table>
				</td>
			</tr>  
			</table></td>
		</tr> 
	</table>
<br/><br/>
Regards,<br/>
porrapo Customer Service
</body>';

