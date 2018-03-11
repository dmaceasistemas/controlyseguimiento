<?php
/*
Joomla Magic Updater Component
Copyright (C) 2008  Rahman Haghparast

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/
function display( $ZipAddress = "" )
{		
	$greeting = "Joomla is being Updated";

	if ($ZipAddress != "")
	{
		$greeting = ExtractZipFile(FetchZipFile($ZipAddress));
	}	
	else
	{
		$greeting = GetJoomlaZipFile( 'zip' );
		if ($greeting != '')
		{
			$greeting = ExtractZipFile(FetchZipFile(GetJoomlaZipFile( 'zip' )));
		}
		else
			$greeting = "There was a problem finding the url of the update file.";
	}
	print $greeting;
}

function get_web_page( $url )
{
    $ch = curl_init( $url );
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_ENCODING, "");
	curl_setopt($ch, CURLOPT_USERAGENT, "spider");
	curl_setopt($ch, CURLOPT_AUTOREFERER, true);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 120);
	curl_setopt($ch, CURLOPT_TIMEOUT, 120);
	curl_setopt($ch, CURLOPT_MAXREDIRS, 10);

    $content = curl_exec( $ch );
    curl_close( $ch );
    return $content;
}

function GetDomainName( $url )
{
	$url = strtolower($url);
	preg_match('@^(?:http://)?([^/]+)@i', $url, $matches);
	$domain = $matches[1];
	if ((substr($domain,0,4) == "www."))
		$domain = substr($domain,4);
	return $domain;
}

function get_a_href( $file )
{
	$h1count = preg_match_all("/<a\s[^>]*href=(\"??)([^\" >]*?)\\1[^>]*>(.*)<\/a>/siU",$file,$patterns);
	return $patterns[2];
}
function GetJoomlaZipFile( $type )
{
	$url = "http://joomlacode.org/gf/project/joomla/frs/"; 
	if (function_exists('curl_version') && !(ini_get('safe_mode')) &&!(ini_get('open_basedir')))
	{
		$file = get_web_page( $url );
	}
	else
	{
		$file = @file_get_contents($url);
	}

	$links = get_a_href($file);
	if(!empty($links[0]))
	{
		foreach($links as $key => $val)
		{
			$val = str_replace("'","",$val);
			$val = str_replace("\"","",$val);
			if (strpos($val,"#") === false)
			{
	
				$extension = strtolower(substr($url,-3));
				if (($extension == "com") || ($extension == "net") || ($extension == "org") || ($extension == "ir"))
					$url = $url . "/";
				if (strrpos($url,".") > strrpos($url,"/"))
					$newurl = substr($url,0,strrpos($url,"/") + 1);
				else
					$newurl = $url;
	
				if (substr($val,0,3) == "../")
				{
					$val = substr($val,3);
					$urlarray = split("/",$newurl);
					for ($k = 0 ; $k < (count($urlarray) - 2); $k++)
						$finalurl .= $urlarray[$k] . "/";
					$newurl = $finalurl;
				}
	
				if (substr($val,0,1) == "/")
				{
					$val = "http://" . GetDomainName($url) . $val;
				}
				else if (substr($val,0,7) != "http://")
					$val = $newurl.$val;
			}
			if (stristr($val,$type) != "") 
			{
				return $val;
			}
		}
	}
}
function GetJoomlaPatchZipFile()
{
	$type = JVERSION; 
	$type = substr($type,0 ,5);  
	return GetJoomlaZipFile( $type );
}

function FetchZipFile( $url )
{
	$FileName = substr($url,strrpos($url,"/") + 1);
	chmod(JPATH_SITE.DS.'tmp'.DS,0777);
	$fp = fopen(JPATH_SITE.DS.'tmp'.DS.$FileName, "wb");
	$temp = "";

	if (function_exists('curl_version') && !(ini_get('safe_mode')) &&!(ini_get('open_basedir')))
	{
		$ch = curl_init($url);
	
		curl_setopt($ch, CURLOPT_FILE, $fp);
		curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);	
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	
		if(curl_exec($ch) === false)
		{
			$temp = 'Curl error: ' . curl_error($ch);
		}
		else
		{
			$temp = 'Operation completed without any errors with curl functions.';
		}
		curl_close($ch);
	}
	else
	{
		if($contents = file_get_contents( $url ))
		{
			$temp = 'Operation completed without any errors with file_get_contents mode.';
		}
		else
		{
			$temp = 'There was a problem fetching Joomla zip file';
		}
		fwrite($fp,$contents);
	}
	fclose($fp);
	print $temp.'<br />';
	return $FileName;
}

function myPreExtractCallBack( $p_event, &$p_header )
{
	if ((stristr($p_header['filename'],"installation") != "") || (stristr($p_header['filename'],"favicon") != ""))
	{
		return 0;
	}
	else
	{
		return 1;
	}
}

function ExtractZipFile( $FileName )
{
	print $FileName.' was used for updating joomla core. <br />';
	require_once(JPATH_SITE.DS.'components'.DS.'com_joomlaupdater'.DS.'pclzip.lib.php');
	$archive = new PclZip(JPATH_SITE.DS.'tmp'.DS.$FileName);
	$list = $archive->extract(PCLZIP_OPT_PATH, JPATH_SITE,PCLZIP_CB_PRE_EXTRACT, 'myPreExtractCallBack', PCLZIP_OPT_REPLACE_NEWER);
	if ($list == 0)
	{
		print "Error  : '".$archive->errorInfo(true)."'";
		$ReturnValue = 'There was a problem updating joomla to the latest version';	
	}
	else
	{
		print "<b>The extracted files are : </b><br />\r\n";
		for ($j=0; $j< count($list); $j++)
		{
			print $list[$j]['filename']. "<br />\r\n";
		}
		$ReturnValue = 'Joomla was successfully updated to version : <b>' . GetJoomlaLatestVersion() . '</b>';	
	}
// This part will regenerate the update icon after the update process
	if (file_exists(JPATH_SITE.DS.'administrator'.DS.'modules'.DS.'mod_quickicon'.DS.'mod_quickicon-original.php'))
	{
		chmod(JPATH_SITE.DS.'administrator'.DS.'modules'.DS.'mod_quickicon'.DS.'mod_quickicon.php',0777);
		chmod(JPATH_SITE.DS.'administrator'.DS.'modules'.DS.'mod_quickicon'.DS.'mod_quickicon-original.php',0777);
		chmod(JPATH_SITE.DS.'administrator'.DS.'templates'.DS.'khepri'.DS.'images'.DS.'header',0777);
		unlink(JPATH_SITE.DS.'administrator'.DS.'modules'.DS.'mod_quickicon'.DS.'mod_quickicon.php');
		rename(JPATH_SITE.DS.'administrator'.DS.'modules'.DS.'mod_quickicon'.DS.'mod_quickicon-original.php',JPATH_SITE.DS.'administrator'.DS.'modules'.DS.'mod_quickicon'.DS.'mod_quickicon.php');
		unlink(JPATH_SITE.DS.'administrator'.DS.'templates'.DS.'khepri'.DS.'images'.DS.'header'.DS.'magic-logo.png');
	}

	if (!file_exists(JPATH_SITE.DS.'administrator'.DS.'modules'.DS.'mod_quickicon'.DS.'mod_quickicon-original.php'))
	{
		chmod(JPATH_SITE.DS.'administrator'.DS.'modules'.DS.'mod_quickicon',0777);
		rename(JPATH_SITE.DS.'administrator'.DS.'modules'.DS.'mod_quickicon'.DS.'mod_quickicon.php',JPATH_SITE.DS.'administrator'.DS.'modules'.DS.'mod_quickicon'.DS.'mod_quickicon-original.php');
		copy(JPATH_SITE.DS.'administrator'.DS.'components'.DS.'com_joomlaupdater'.DS.'core'.DS.'mod_quickicon.php',JPATH_SITE.DS.'administrator'.DS.'modules'.DS.'mod_quickicon'.DS.'mod_quickicon.php');
		copy(JPATH_SITE.DS.'administrator'.DS.'components'.DS.'com_joomlaupdater'.DS.'core'.DS.'magic-logo.png',JPATH_SITE.DS.'administrator'.DS.'templates'.DS.'khepri'.DS.'images'.DS.'header'.DS.'magic-logo.png');
	}

	return $ReturnValue;
}
function GetJoomlaLatestVersion()
{
	$temp = GetJoomlaZipFile( 'zip' );
	$temp = substr($temp,strrpos($temp,"/") + 1);
	$temp = substr($temp,0,strpos($temp,"-")); 
	$version = substr($temp,strpos($temp,"_") + 1);
	return $version;
}

if( !ini_get('safe_mode') )
{
	set_time_limit(0);
}
// no direct access
defined('_JEXEC') or die('Restricted access');

if (isset($_POST["SubmitButton"]))
{
	if ($_POST["JoomlaZipAddress"] == GetJoomlaZipFile( 'zip' ))
	{
		display();
	}
	else
	{
		display($_POST["JoomlaZipAddress"]);
	}
}
else if (isset($_POST["SubmitButtonPatch"]))
{
	display($_POST["JoomlaZipAddressPatch"]);
}
else
{
?>
<form method="post">
Joomla Updater by <a href="http://www.realtyna.com" target="_blank">http://www.realtyna.com</a> version 1.4.0 <br />
Written by <a href='mailto:haghparast@gmail.com'>Rahman Haghparast</a> <br />
Special thanks to Vincent Blavet (<a href="http://www.phpconcept.net" target="_blank">http://www.phpconcept.net</a>) for his <a href="http://www.phpconcept.net/pclzip/index.en.php" target="_blank">pclzip</a> class <br />
Apache mod_curl should be enabled for this component to run properly.	<br />
As in version 1.1 the component will work without mod_curl too. <br />
As in version 1.2 an icon is added to joomla control panel and checks the latest version automatically when the admin goes to the cpanel section of joomla. <br />
As in version 1.3 the component will update using the complete stable package or just the patch files. Thanks to <a href='mailto:micheldejoode@gmail.com'>Michel de Joode</a> for his idea and his support for this feature. <br />
As in version 1.4 the component will replace all files even if they have been changed by users. It will also show the error information upon facing any kind of errors.<br />
<br />
<?php
print 'Your Joomla Version is : <b>' . JVERSION . '</b><br />';
print 'Latest Joomla Version is : <b>' . GetJoomlaLatestVersion(). '</b><br />';
if (GetJoomlaLatestVersion() > JVERSION)
	print 'It\'s better to upgrade to the latest version of Joomla <br />';
?>
Enter the url of the latest Joomla <b>zip</b> file or just press the button for auto update: <br />
<input type="text" name="JoomlaZipAddress" size="130" value="<?php print GetJoomlaZipFile( 'zip' ) ?>" />
<input type="submit" name="SubmitButton" value="update" />

<?php
if (GetJoomlaLatestVersion() > JVERSION)
{
?>
<br><br>Or update using just the patch-files:<br>
<input type="text" name="JoomlaZipAddressPatch" size="130" value="<?php print GetJoomlaPatchZipFile() ?>" />
<input type="submit" name="SubmitButtonPatch" value="update" />
<?php
}
?>
</form>
<?php
}
?>
