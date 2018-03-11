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
function GetJoomlaZipFile()
{
	$url = "http://www.joomla.org/download.html";

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
			if (stristr($val,"zip") != "")
				return $val;
		}
	}
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

function get_a_href($file)
{
	$h1count = preg_match_all("/<a\s[^>]*href=(\"??)([^\" >]*?)\\1[^>]*>(.*)<\/a>/siU",$file,$patterns);
	return $patterns[2];
}

function GetDomainName($url)
{
	$url = strtolower($url);
	preg_match('@^(?:http://)?([^/]+)@i', $url, $matches);
	$domain = $matches[1];
	if ((substr($domain,0,4) == "www."))
		$domain = substr($domain,4);
	return $domain;
}

function GetJoomlaLatestVersion()
{
	$temp = GetJoomlaZipFile();
	$temp = substr($temp,strrpos($temp,"/") + 1);
	$temp = substr($temp,0,strpos($temp,"-")); 
	$version = substr($temp,strpos($temp,"_") + 1);
	return $version;
}
?>