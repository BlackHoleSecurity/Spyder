#!/usr/bin/php
<?php
if(strtolower(substr(PHP_OS,0,3)) == "win") {
$G="";
$R="";
$Y="";
$B="";
$ua="Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:53.0) Gecko/20100101 Firefox/53.0";
} else {
$R="\e[91m";
$G="\e[92m";
$B="\e[36m";
$Y="\e[93m";
$ua="Mozilla/5.0 (Linux; Android 5.1.1; Andromax A16C3H Build/LMY47V) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.111 Mobile Safari/537.36";
system("clear");
}
echo $Y."
 ___           __               __ 
/  _/___ _  _ _\ |___  _ __  | /  \ |
\_  \ . \ \/ / . / ._\| `_/ \_\\  //_/
/___/  _/\  /\___\___\|_|    .'/()\`.
    |_\  /_/                 \ \  / /";
echo $R."\n++++++++++++++++++++++++++++++++++++++";
echo $B."\nAuthor  : Cvar1984                   ".$R."+";
echo $B."\nGithub  : http://github.com/Cvar1984 ".$R."+";
echo $B."\nTeam    : BlackHole Security         ".$R."+";
echo $B."\nVersion : 0.4 ( Beta )               ".$R."+";
echo $B."\nDate    : 31-03-2018                 ".$R."+";
echo $R."\n++++++++++++++++++++++++++++++++++++++".$G."\n\n";
if(!function_exists("curl_init")) {
	die($Y."[!] cUrl Is Missing, Check /usr/lib/php.ini [!]\n");
}
if(isset($argv[1]) && isset($argv[2])) {
	if(preg_match("/https:/",$argv[1])) {
		$argv[1]=str_replace("https://","http://",$argv[1]);
	}
if($argv[2] == "--upload" OR $argv[2] == "-u") {
include("upload");
} elseif($argv[2] == "--admin" OR $argv[2] == "-a") {
include("admin");
} else {
	die($Y."[!] Parameter False [!]\n");
}
$count=count($list);
echo "String Loaded : ".$Y.$count.$G."\n";
	foreach($list as $list) {
		$url=$argv[1].$list;
sleep(1);
$ch=curl_init();
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST,true);
curl_setopt($ch,CURLOPT_USERAGENT,$ua);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false); curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
curl_exec($ch);
$header=curl_getinfo($ch,CURLINFO_HTTP_CODE);
$write="";
if($header != "404" AND $header != "0") {
	$hdr="
header : ".$header."
Url    : ".$url;
	$tulis=fopen("result.txt","a");
	fwrite($tulis,$hdr);
	fclose($tulis);
	$header=$B.$header.$G;
	$write="true";
} else {
	$header=$R.$header.$G;
}
echo "Url    : ".$Y.$url.$G."\n";
echo "Header : ".$header."\n";
}
echo $R."=========================== Cvar1984 ))=====(@)>\n";
if($write == "true") {
	echo $Y."Maybe This Is Posible --> result.txt\n";
}
} else {
	echo $Y."--admin,  -a\tSearch Admin Pages\n";
	echo "--upload, -u\tSearch Upload Pages\n\n";
	echo "Example : ".$G."php spyder.php http://www.example.com --admin".$R."\n";
}