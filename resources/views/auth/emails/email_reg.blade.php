<!DOCTYPE html>
<html lang="en">
<head>
<style>	
	 td { margin: 0px; font-family: arial, sans-serif; }
	.gt a { color: #222; }
	.ii a[href] { color: #15c; }
	.im { color: #500050; }
	.tdMargin {
		padding: 20px 30px 25px 30px;
		box-sizing: border-box;
		font-size: 0;
	}
	.bodyPtag {
		margin: 15px 0 0 0;
		text-align: left;
		padding: 10px 5px;
		box-sizing: border-box;
		border-bottom: 1px solid #d4d4d4;
		color: #6d7177;
		font-size: 16px;
		font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif;
		
	}
	.bodySpanTag {
		display: inline-block;
		padding-right: 5px;
		width: 50%;
		box-sizing: border-box;
		vertical-align: top;
	}
	.bodyHead {
		margin: 0 0 10px 0;
		color: #da2051;
		font-size: 22px;
		text-align: left;
		font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif;
		font-weight: bold;
	}
	.bodyPtagAns {
		display: inline-block;
		color: #0073cf;
		width: 49%;
	}
	.bodyText {
		margin: 20px 0 15px 0;
		color: #000;
		font-size: 18px;
		text-align: justify;
		font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif;
	}
	.footerText {
		margin: 30px 0 10px;
		text-align: justify;
		color: #7d8389;
		font-size: 14px;
		font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif;
	}
	.footerCopyright {
		background: #33475C;
		color: #d1d6da;
		text-align: center;
		font-size: 11px;
		font-weight: bold;
		padding: 15px 25px;
	}

	.btn{
		padding: 6px 12px;
		margin-bottom: 0;
		font-size: 14px;
		font-weight: 400;
		line-height: 1.42857143;
		text-align: center;
		white-space: nowrap;
		vertical-align: middle;
		-ms-touch-action: manipulation;
		touch-action: manipulation;
		cursor: pointer;
		-webkit-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		user-select: none;
		background-image: none;
		border: 1px solid transparent;
		border-radius: 4px;
	}
	.btn-success{
		color: #fff;
		background-color: #5cb85c;
		border-color: #4cae4c;
	}
	a{
		text-decoration: none;
	}
</style>
</head>
<body>


<table width="700px" border="0" cellpadding="0" cellspacing="0" align="center" style="min-width:700px">
	<tbody>
		<tr>
			<td bgcolor="#f5f7f9" valign="middle" style="box-sizing:border-box">
				<table width="100%" border="0" cellpadding="0" cellspacing="0">
					<tbody>
						<tr>
							<td valign="top" align="center" class="tdMargin">   
								<p style="margin:0"><img src="https://ci3.googleusercontent.com/proxy/QSdXyrvYgSQ1t2u-rnyDbsk3T7nLlPvnFefdOb2w5Uw_V0bMlrlUqZfLiBQF_loO_Jo2u0YtgzpURAW04C7aYLvgvqxYXav25b8i8TRyK1PhRr5k-n3Vi1M=s0-d-e1-ft#https://promotions.mobikwik.com/emailtemplates/images/top-strip.png" width="100%" style="display:block" class="CToWUd"></p>
								<table bgcolor="#fff" width="100%" cellpadding="0" cellspacing="0">
									<tbody>
										<tr>
											<td valign="top" align="center" style="padding:20px 25px; background-color:#fff">
												<span class="im">
													<p class="bodyHead">Dear {{$user->first_name}}</p><hr>
													<p class="bodyText">Welcome to Cinema Clubby. <br><br>
													Thank you for registering with our services. Please confirm your account by clicking below button, Or Copy below Link paste in URL.</p>
													<p class="bodyPtag"><span class="bodySpanTag">Username : </span><span class="bodyPtagAns">{{$user->email}}</span></p>
													<p style="margin-top:30px"><a class="btn btn-success" href="{{ URL::to('verify/' . $confirmation_code) }}" >Verify</a></p>
													<p class="footerText">Link - <a class="btn btn-link" target="_blank">{{ URL::to('verify/' . $confirmation_code) }}</a></p><hr>
												</span>
											</td>
										</tr>
									</tbody>
								</table>                             
								                                                 
							</td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
		<tr>
			<td valign="middle">
				<table width="100%" cellpadding="0" cellspacing="0" border="0">
					<tbody>
						<tr>
							<td class="footerCopyright">Copyright © 2017 <a href="" style="color:#db1f51; text-decoration:none" target="_blank">Cinema Clubby</a> | All Rights Reserved.</td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>                                               
	</tbody>
</table>


</body>
</html>