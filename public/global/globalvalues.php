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
				<span style="color:#fff; font:normal 30px arial">Cbay.org</span></a></td>
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
				<span style="color:#fff; font:normal 30px arial">Cbay.org</span></a></td>
			</tr>
			<tr>
				<td>
					<table width="100%" border="0" cellspacing="0" cellpadding="10" align="left">
						<tr><td><a href="javascript:void(0);" style="color:#D63C2B ; font:bold 12px arial; text-decoration:none;">Hello&nbsp;&nbsp;&nbsp;<FULLNAME></a></td></tr>
						<tr><td>Login Credential:</td></tr>
						<tr><td>User Id:&nbsp;&nbsp;&nbsp;<EMAIL></td></tr>
						<tr><td>Password:<PASSWORD></td></tr>
						<tr><td>&nbsp;</td></tr>
						<tr><td>Sincerely,</td></tr>
						<tr><td>Cbay.org team</td></tr>
					</table>
				</td>
			</tr>  
			</table></td>
		</tr> 
	</table>
<br/><br/>
Regards,<br/>
Cbay.org Customer Service
</body>';
/* end register subject*/
/* register subject */
global $sentParentSubject;
global $sentParentMessage;
$sentParentSubject= "Status of registration confirmation";
$sentParentMessage='<body>
		<table width="600" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td><table width="600" border="0" cellspacing="0" cellpadding="5" style="border:1px solid #D63C2B ">
			<tr><td bgcolor="#D63C2B ">
				<a href="Javascript:void(0);" target="_blank" style="text-decoration: none;">
				<span style="color:#fff; font:normal 30px arial">Cbay.org</span></a></td>
			</tr>
			<tr>
				<td>
					<table width="100%" border="0" cellspacing="0" cellpadding="10" align="left">
						<tr><td><a href="javascript:void(0);" style="color:#D63C2B ; font:bold 12px arial; text-decoration:none;">Dear&nbsp;&nbsp;&nbsp;<FULLNAME></a></td></tr>
						<tr><td><CREATEDUSERNAME>&nbsp;&nbsp; is  successfully created by a &nbsp;&nbsp;<CREATEDUSERTYPE></td></tr>						
						<tr><td>&nbsp;</td></tr>
						<tr><td>Sincerely,</td></tr>
						<tr><td>Cbay.org team</td></tr>
					</table>
				</td>
			</tr>  
			</table></td>
		</tr> 
	</table>
<br/><br/>
Regards,<br/>
Cbay.org Customer Service
</body>';
/* end register subject*/
/* register subject */
global $sentsuperadminSubject;
global $sentsuperadminMessage;
$sentsuperadminSubject= "Your user adding new one";
$sentsuperadminMessage='<body>
		<table width="600" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td><table width="600" border="0" cellspacing="0" cellpadding="5" style="border:1px solid #D63C2B ">
			<tr><td bgcolor="#D63C2B ">
				<a href="Javascript:void(0);" target="_blank" style="text-decoration: none;">
				<span style="color:#fff; font:normal 30px arial">Cbay.org</span></a></td>
			</tr>
			<tr>
				<td>
					<table width="100%" border="0" cellspacing="0" cellpadding="10" align="left">
						<tr><td><a href="javascript:void(0);" style="color:#D63C2B ; font:bold 12px arial; text-decoration:none;">Hello&nbsp;&nbsp;&nbsp;<FULLNAME></a></td></tr>
						<tr><td><PARENTNAME>&nbsp;is created by &nbsp;<CREATEDUSERNAME></td></tr>						
						<tr><td>&nbsp;</td></tr>
						<tr><td>Sincerely,</td></tr>
						<tr><td>Cbay.org team</td></tr>
					</table>
				</td>
			</tr>  
			</table></td>
		</tr> 
	</table>
<br/><br/>
Regards,<br/>
Cbay.org Customer Service
</body>';
/* end register subject*/



/*start  */
global $productSubject;
global $productmessage;
$productSubject = "Request For New Password for Chemicals";
$productmessage = '<body>
		<table width="600" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td><table width="600" border="0" cellspacing="0" cellpadding="5" style="border:1px solid #D63C2B">
			<tr><td bgcolor="#D63C2B">
				<a href="javascript:void(0);" target="_blank" style="text-decoration: none;">
				<span style="color:#fff; font:normal 30px arial">Cbay.org</span></a></td>
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
						<tr><td>Cbay.org team</td></tr>
					</table>
				</td>
			</tr>  
			</table></td>
		</tr> 
	</table>
<br/><br/>
Regards,<br/>
Cbay.org Customer Service
</body>';

global $bidsendSubject;
global $bidsendMessage;
$bidsendSubject = "Bidding on your product";
$bidsendMessage = '<body>
		<table width="600" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td><table width="600" border="0" cellspacing="0" cellpadding="5" style="border:1px solid #D63C2B">
			<tr><td bgcolor="#D63C2B">
				<a href="javascript:void(0);" target="_blank" style="text-decoration: none;">
				<span style="color:#fff; font:normal 30px arial">Cbay.org</span></a></td>
			</tr>
			<tr>
				<td>
					<table width="100%" border="0" cellspacing="0" cellpadding="10" align="left">
						<tr><td><a href="javascript:void(0);" style="color:#4ca4b6; font:bold 12px arial; text-decoration:none;">Dear&nbsp;&nbsp;&nbsp;<FULLNAME></a></td></tr>
						<tr><td><USERNAME>&nbsp;&nbsp;biding on your product.</td></tr>
						<tr><td>&nbsp;</td></tr>
						<tr><td>Sincerely,</td></tr>
						<tr><td>Cbay.org team</td></tr>
					</table>
				</td>
			</tr>  
			</table></td>
		</tr> 
	</table>
<br/><br/>
Regards,<br/>
Cbay.org Customer Service
</body>';

global $buysendSubject;
global $buysendMessage;
$buysendSubject = "Buying on your product";
$buysendMessage = '<body>
		<table width="600" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td><table width="600" border="0" cellspacing="0" cellpadding="5" style="border:1px solid #D63C2B">
			<tr><td bgcolor="#D63C2B">
				<a href="javascript:void(0);" target="_blank" style="text-decoration: none;">
				<span style="color:#fff; font:normal 30px arial">Cbay.org</span></a></td>
			</tr>
			<tr>
				<td>
					<table width="100%" border="0" cellspacing="0" cellpadding="10" align="left">
						<tr><td><a href="javascript:void(0);" style="color:#4ca4b6; font:bold 12px arial; text-decoration:none;">Dear&nbsp;&nbsp;&nbsp;<FULLNAME></a></td></tr>
						<tr><td><USERNAME>&nbsp;&nbsp;biding on your product.</td></tr>
						<tr><td>&nbsp;</td></tr>
						<tr><td>Sincerely,</td></tr>
						<tr><td>Cbay.org team</td></tr>
					</table>
				</td>
			</tr>  
			</table></td>
		</tr> 
	</table>
<br/><br/>
Regards,<br/>
Cbay.org Customer Service
</body>';

global $bidderonproductSubject;
global $bidderonproductMessage;
$bidderonproductSubject = "Wait for approval on your bid product";
$bidderonproductMessage = '<body>
		<table width="600" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td><table width="600" border="0" cellspacing="0" cellpadding="5" style="border:1px solid #D63C2B">
			<tr><td bgcolor="#D63C2B">
				<a href="javascript:void(0);" target="_blank" style="text-decoration: none;">
				<span style="color:#fff; font:normal 30px arial">Cbay.org</span></a></td>
			</tr>
			<tr>
				<td>
					<table width="100%" border="0" cellspacing="0" cellpadding="10" align="left">
						<tr><td><a href="javascript:void(0);" style="color:#4ca4b6; font:bold 12px arial; text-decoration:none;">Hello&nbsp;&nbsp;&nbsp;<FULLNAME></a></td></tr>
						<tr><td>Wait for approval on product owner of bid your product</td></tr>
						<tr><td>&nbsp;</td></tr>
						<tr><td>Sincerely,</td></tr>
						<tr><td>Cbay.org team</td></tr>
					</table>
				</td>
			</tr>  
			</table></td>
		</tr> 
	</table>
<br/><br/>
Regards,<br/>
Cbay.org Customer Service
</body>';





global $bidsendparentSubject;
global $bidsendparentMessage;
$bidsendparentSubject = "Request bid product";
$bidsendparentMessage = '<body>
		<table width="600" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td><table width="600" border="0" cellspacing="0" cellpadding="5" style="border:1px solid #D63C2B">
			<tr><td bgcolor="#D63C2B">
				<a href="javascript:void(0);" target="_blank" style="text-decoration: none;">
				<span style="color:#fff; font:normal 30px arial">Cbay.org</span></a></td>
			</tr>
			<tr>
				<td>
					<table width="100%" border="0" cellspacing="0" cellpadding="10" align="left">
						<tr><td><a href="javascript:void(0);" style="color:#4ca4b6; font:bold 12px arial; text-decoration:none;">Hello&nbsp;&nbsp;&nbsp;<FULLNAME></a></td></tr>
						<tr><td><USERNAME>&nbsp;&nbsp;is biding on your <TYPE>(<BUSERNAME>)product.</td></tr>
						<tr><td>&nbsp;</td></tr>
						<tr><td>Sincerely,</td></tr>
						<tr><td>Cbay.org team</td></tr>
					</table>
				</td>
			</tr>  
			</table></td>
		</tr> 
	</table>
<br/><br/>
Regards,<br/>
Cbay.org Customer Service
</body>';




/*End Bid process*/

global $buyReceivedSubject;
global $buyReceivedMessage;
$buyReceivedSubject = "Buying on your product";
$buyReceivedMessage = '<body>
		<table width="600" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td><table width="600" border="0" cellspacing="0" cellpadding="5" style="border:1px solid #D63C2B">
			<tr><td bgcolor="#D63C2B">
				<a href="javascript:void(0);" target="_blank" style="text-decoration: none;">
				<span style="color:#fff; font:normal 30px arial">Cbay.org</span></a></td>
			</tr>
			<tr>
				<td>
					<table width="100%" border="0" cellspacing="0" cellpadding="10" align="left">
						<tr><td><a href="javascript:void(0);" style="color:#4ca4b6; font:bold 12px arial; text-decoration:none;">Dear&nbsp;&nbsp;&nbsp;<FULLNAME></a></td></tr>
						<tr><td><USERNAME>&nbsp;&nbsp;buying on your product.</td></tr>
						<tr><td>&nbsp;</td></tr>
						<tr><td>Sincerely,</td></tr>
						<tr><td>Cbay.org team</td></tr>
					</table>
				</td>
			</tr>  
			</table></td>
		</tr> 
	</table>
<br/><br/>
Regards,<br/>
Cbay.org Customer Service
</body>';

global $acceptenceonproductownerSubject;
global $acceptenceonproductownerMessage;
$acceptenceonproductownerSubject = "Buying on your product";
$acceptenceonproductownerMessage = '<body>
		<table width="600" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td><table width="600" border="0" cellspacing="0" cellpadding="5" style="border:1px solid #D63C2B">
			<tr><td bgcolor="#D63C2B">
				<a href="javascript:void(0);" target="_blank" style="text-decoration: none;">
				<span style="color:#fff; font:normal 30px arial">Cbay.org</span></a></td>
			</tr>
			<tr>
				<td>
					<table width="100%" border="0" cellspacing="0" cellpadding="10" align="left">
						<tr><td><a href="javascript:void(0);" style="color:#4ca4b6; font:bold 12px arial; text-decoration:none;">Hello&nbsp;&nbsp;&nbsp;<FULLNAME>,</a></td></tr>
						<tr><td><BUYERNAME>&nbsp; is buying your &nbsp;<PRODUCTNAME>&nbsp; Then your &nbsp;<STATUS>.Message will be sent successfully</td></tr>
						<tr><td>&nbsp;</td></tr>
						<tr><td>Sincerely,</td></tr>
						<tr><td>Cbay.org team</td></tr>
					</table>
				</td>
			</tr>  
			</table></td>
		</tr> 
	</table>
<br/><br/>
Regards,<br/>
Cbay.org Customer Service
</body>';

global $buyeronproductSubject;
global $buyeronproductMessage;
$buyeronproductSubject = "Wait for approval on your bought product";
$buyeronproductMessage = '<body>
		<table width="600" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td><table width="600" border="0" cellspacing="0" cellpadding="5" style="border:1px solid #D63C2B">
			<tr><td bgcolor="#D63C2B">
				<a href="javascript:void(0);" target="_blank" style="text-decoration: none;">
				<span style="color:#fff; font:normal 30px arial">Cbay.org</span></a></td>
			</tr>
			<tr>
				<td>
					<table width="100%" border="0" cellspacing="0" cellpadding="10" align="left">
						<tr><td><a href="javascript:void(0);" style="color:#4ca4b6; font:bold 12px arial; text-decoration:none;">Hello&nbsp;&nbsp;&nbsp;<FULLNAME></a></td></tr>
						<tr><td>Wait for approval on product owner of bought your product</td></tr>
						<tr><td>&nbsp;</td></tr>
						<tr><td>Sincerely,</td></tr>
						<tr><td>Cbay.org team</td></tr>
					</table>
				</td>
			</tr>  
			</table></td>
		</tr> 
	</table>
<br/><br/>
Regards,<br/>
Cbay.org Customer Service
</body>';





global $buysendparentSubject;
global $buysendparentMessage;
$buysendparentSubject = "Request buy product";
$buysendparentMessage = '<body>
		<table width="600" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td><table width="600" border="0" cellspacing="0" cellpadding="5" style="border:1px solid #D63C2B">
			<tr><td bgcolor="#D63C2B">
				<a href="javascript:void(0);" target="_blank" style="text-decoration: none;">
				<span style="color:#fff; font:normal 30px arial">Cbay.org</span></a></td>
			</tr>
			<tr>
				<td>
					<table width="100%" border="0" cellspacing="0" cellpadding="10" align="left">
						<tr><td><a href="javascript:void(0);" style="color:#4ca4b6; font:bold 12px arial; text-decoration:none;">Hello&nbsp;&nbsp;&nbsp;<FULLNAME></a></td></tr>
						<tr><td><USERNAME>&nbsp;&nbsp;is buying on your <TYPE>(<BUSERNAME>)product.</td></tr>
						<tr><td>&nbsp;</td></tr>
						<tr><td>Sincerely,</td></tr>
						<tr><td>Cbay.org team</td></tr>
					</table>
				</td>
			</tr>  
			</table></td>
		</tr> 
	</table>
<br/><br/>
Regards,<br/>
Cbay.org Customer Service
</body>';
/*End Bid process*/
/*End Bid process*/

global $productaddSubject;
global $productaddMessage;
$productaddSubject = "Adding new product";
$productaddMessage = '<body>
		<table width="600" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td><table width="600" border="0" cellspacing="0" cellpadding="5" style="border:1px solid #D63C2B">
			<tr><td bgcolor="#D63C2B">
				<a href="javascript:void(0);" target="_blank" style="text-decoration: none;">
				<span style="color:#fff; font:normal 30px arial">Cbay.org</span></a></td>
			</tr>
			<tr>
				<td>
					<table width="100%" border="0" cellspacing="0" cellpadding="10" align="left">
						<tr><td><a href="javascript:void(0);" style="color:#4ca4b6; font:bold 12px arial; text-decoration:none;">Hello&nbsp;&nbsp;&nbsp;<FULLNAME></a></td></tr>
						<tr><td><USERNAME>&nbsp;added new product waiting your approval.</td></tr>
						<tr><td>&nbsp;</td></tr>
						<tr><td>Sincerely,</td></tr>
						<tr><td>Cbay.org team</td></tr>
					</table>
				</td>
			</tr>  
			</table></td>
		</tr> 
	</table>
<br/><br/>
Regards,<br/>
Cbay.org Customer Service
</body>';
/*End Bid process*/
global $productaddsuccessSubject;
global $productaddsuccessMessage;
$productaddsuccessSubject = "Processing on approval for your product";
$productaddsuccessMessage = '<body>
		<table width="600" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td><table width="600" border="0" cellspacing="0" cellpadding="5" style="border:1px solid #D63C2B">
			<tr><td bgcolor="#D63C2B">
				<a href="javascript:void(0);" target="_blank" style="text-decoration: none;">
				<span style="color:#fff; font:normal 30px arial">Cbay.org</span></a></td>
			</tr>
			<tr>
				<td>
					<table width="100%" border="0" cellspacing="0" cellpadding="10" align="left">
						<tr><td><a href="javascript:void(0);" style="color:#4ca4b6; font:bold 12px arial; text-decoration:none;">Dear&nbsp;&nbsp;&nbsp;<FULLNAME></a></td></tr>
						<tr><td>Processing on approval for your product.</td></tr>
						<tr><td>&nbsp;</td></tr>
						<tr><td>Sincerely,</td></tr>
						<tr><td>Cbay.org team</td></tr>
					</table>
				</td>
			</tr>  
			</table></td>
		</tr> 
	</table>
<br/><br/>
Regards,<br/>
Cbay.org Customer Service
</body>';
/*End Bid process*/

global $confirmstatusonbidSubject;
global $confirmstatusonbidMessage;
$confirmstatusonbidSubject = "Confirmation on bid product";
$confirmstatusonbidMessage = '<body>
		<table width="600" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td><table width="600" border="0" cellspacing="0" cellpadding="5" style="border:1px solid #D63C2B">
			<tr><td bgcolor="#D63C2B">
				<a href="javascript:void(0);" target="_blank" style="text-decoration: none;">
				<span style="color:#fff; font:normal 30px arial">Cbay.org</span></a></td>
			</tr>
			<tr>
				<td>
					<table width="100%" border="0" cellspacing="0" cellpadding="10" align="left">
						<tr><td><a href="javascript:void(0);" style="color:#4ca4b6; font:bold 12px arial; text-decoration:none;">Dear&nbsp;&nbsp;&nbsp;<FULLNAME></a></td></tr>
						<tr><td>Your bid on <PRODUCTNAME> has been <STATUS>.</td></tr>
						<tr><td>&nbsp;</td></tr>
						<tr><td>Sincerely,</td></tr>
						<tr><td>Cbay.org team</td></tr>
					</table>
				</td>
			</tr>  
			</table></td>
		</tr> 
	</table>
<br/><br/>
Regards,<br/>
Cbay.org Customer Service
</body>';

/*Change Product Status Message*/
global $changeProductSubject;
global $changeProductMessage;
$changeProductSubject = "Message for status on your product";
$changeProductMessage = '<body>
		<table width="600" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td><table width="600" border="0" cellspacing="0" cellpadding="5" style="border:1px solid #D63C2B">
			<tr><td bgcolor="#D63C2B">
				<a href="javascript:void(0);" target="_blank" style="text-decoration: none;">
				<span style="color:#fff; font:normal 30px arial">Cbay.org</span></a></td>
			</tr>
			<tr>
				<td>
					<table width="100%" border="0" cellspacing="0" cellpadding="10" align="left">
						<tr><td><a href="javascript:void(0);" style="color:#4ca4b6; font:bold 12px arial; text-decoration:none;">Hello&nbsp;&nbsp;&nbsp;<FULLNAME></a></td></tr>
						<tr><td><USERNAME> is <PRODUCTNAME> is <STATUS>.</td></tr>
						<tr><td>&nbsp;</td></tr>
						<tr><td>Sincerely,</td></tr>
						<tr><td>Cbay.org team</td></tr>
					</table>
				</td>
			</tr>  
			</table></td>
		</tr> 
	</table>
<br/><br/>
Regards,<br/>
Cbay.org Customer Service
</body>';

global $ownparentProductSubject;
global $ownparentProductMessage;
$ownparentProductSubject = "To change the status for your user product";
$ownparentProductMessage = '<body>
		<table width="600" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td><table width="600" border="0" cellspacing="0" cellpadding="5" style="border:1px solid #D63C2B">
			<tr><td bgcolor="#D63C2B">
				<a href="javascript:void(0);" target="_blank" style="text-decoration: none;">
				<span style="color:#fff; font:normal 30px arial">Cbay.org</span></a></td>
			</tr>
			<tr>
				<td>
					<table width="100%" border="0" cellspacing="0" cellpadding="10" align="left">
						<tr><td><a href="javascript:void(0);" style="color:#4ca4b6; font:bold 12px arial; text-decoration:none;">Hello&nbsp;&nbsp;&nbsp;<FULLNAME></a></td></tr>
						<tr><td><PRODUCTOWNER> is <PRODUCTNAME> is <STATUS>.</td></tr>
						<tr><td>&nbsp;</td></tr>
						<tr><td>Sincerely,</td></tr>
						<tr><td>Cbay.org team</td></tr>
					</table>
				</td>
			</tr>  
			</table></td>
		</tr> 
	</table>
<br/><br/>
Regards,<br/>
Cbay.org Customer Service
</body>';

global $subparentProductSubject;
global $subparentProductMessage;
$subparentProductSubject = "To change the status for another admin user have product";
$subparentProductMessage = '<body>
		<table width="600" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td><table width="600" border="0" cellspacing="0" cellpadding="5" style="border:1px solid #D63C2B">
			<tr><td bgcolor="#D63C2B">
				<a href="javascript:void(0);" target="_blank" style="text-decoration: none;">
				<span style="color:#fff; font:normal 30px arial">Cbay.org</span></a></td>
			</tr>
			<tr>
				<td>
					<table width="100%" border="0" cellspacing="0" cellpadding="10" align="left">
						<tr><td><a href="javascript:void(0);" style="color:#4ca4b6; font:bold 12px arial; text-decoration:none;">Hello&nbsp;&nbsp;&nbsp;<FULLNAME></a></td></tr>
						<tr><td><PARENT> is <PRODUCTOWNER> is <PRODUCTNAME> is <STATUS>.</td></tr>
						<tr><td>&nbsp;</td></tr>
						<tr><td>Sincerely,</td></tr>
						<tr><td>Cbay.org team</td></tr>
					</table>
				</td>
			</tr>  
			</table></td>
		</tr> 
	</table>
<br/><br/>
Regards,<br/>
Cbay.org Customer Service
</body>';

global $mainsubparentProductSubject;
global $mainsubparentProductMessage;
$mainsubparentProductSubject = "To change the status for admin to another admin user have product";
$mainsubparentProductMessage = '<body>
		<table width="600" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td><table width="600" border="0" cellspacing="0" cellpadding="5" style="border:1px solid #D63C2B">
			<tr><td bgcolor="#D63C2B">
				<a href="javascript:void(0);" target="_blank" style="text-decoration: none;">
				<span style="color:#fff; font:normal 30px arial">Cbay.org</span></a></td>
			</tr>
			<tr>
				<td>
					<table width="100%" border="0" cellspacing="0" cellpadding="10" align="left">
						<tr><td><a href="javascript:void(0);" style="color:#4ca4b6; font:bold 12px arial; text-decoration:none;">Hello&nbsp;&nbsp;&nbsp;<FULLNAME></a></td></tr>
						<tr><td><SUBPARENT> is <PARENT> is <PRODUCTOWNER> is <PRODUCTNAME> is <STATUS>.</td></tr>
						<tr><td>&nbsp;</td></tr>
						<tr><td>Sincerely,</td></tr>
						<tr><td>Cbay.org team</td></tr>
					</table>
				</td>
			</tr>  
			</table></td>
		</tr> 
	</table>
<br/><br/>
Regards,<br/>
Cbay.org Customer Service
</body>';

global $mainparentProductSubject;
global $mainparentProductMessage;
$mainparentProductSubject = "To change the status for speradmin to another admin user have product";
$mainparentProductMessage = '<body>
		<table width="600" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td><table width="600" border="0" cellspacing="0" cellpadding="5" style="border:1px solid #D63C2B">
			<tr><td bgcolor="#D63C2B">
				<a href="javascript:void(0);" target="_blank" style="text-decoration: none;">
				<span style="color:#fff; font:normal 30px arial">Cbay.org</span></a></td>
			</tr>
			<tr>
				<td>
					<table width="100%" border="0" cellspacing="0" cellpadding="10" align="left">
						<tr><td><a href="javascript:void(0);" style="color:#4ca4b6; font:bold 12px arial; text-decoration:none;">Hello&nbsp;&nbsp;&nbsp;<FULLNAME></a></td></tr>
						<tr><td><PARENT> is <PRODUCTOWNER> is <PRODUCTNAME> is <STATUS>.</td></tr>
						<tr><td>&nbsp;</td></tr>
						<tr><td>Sincerely,</td></tr>
						<tr><td>Cbay.org team</td></tr>
					</table>
				</td>
			</tr>  
			</table></td>
		</tr> 
	</table>
<br/><br/>
Regards,<br/>
Cbay.org Customer Service
</body>';

/*End*/
