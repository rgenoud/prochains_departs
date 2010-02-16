<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?
/*
 *  Prochains departs sur le web
 *  Copyright (C) 2010 Richard Genoud
 *
 * ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
 *
 *  This program is free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or (at
 *  your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful, but
 *  WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 *  General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License along
 *  with this program; if not, write to the Free Software Foundation, Inc.,
 *  59 Temple Place, Suite 330, Boston, MA 02111-1307 USA.
 *
 * ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
 */

if (!empty($_GET)) extract($_GET);

?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
	<meta http-equiv="Content-Script-Type" content="text/javascript"/>
	<meta name="description" content="clone du widget prochains departs de la sncf"/>
	<meta name="keywords" content="sncf,horaires,prochains departs,gare en mouvement,retard,train"/>
	<title>Prochains Departs <? echo $station; ?></title>
</head>
<body>
<?

/*

exit_erreur() {
	echo ""
	echo "<html>"
	echo "<head>"
	echo "<title>erreur</title>"
	echo '<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">'
	echo "</head>"
	echo "<body>"
	echo "erreur : query=|$QUERY_STRING| station=|$station| gid=|$gid| nb=|$nb| p1=|$p1| p2=|$p2| p3=|$p3| p4=|$p4| p5=|$p5| p6=|$p6|<br/>"
	echo "</body>"
	echo "</html>"

}
 */
?>
<center>Prochains Departs <? echo $station; ?></center>
<?

$day = date("Y;m;d");
$hour = date("H;i");

if (($nb < 1) || ($nb > 60)) {
	$nb = 10;
}

if (empty($gid)) {
	echo "error, no gid defined !</br>";
} else {
	/* send the request with curl */
	$ch = curl_init();
	$url = "http://aln.canaltp.fr/dev/index.php?gare=$gid&nbredepart=$nb&datedepart=$day&heuredep=$hour&modedep=1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1&numafficheur=0";
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$output = curl_exec($ch);
	curl_close($ch);

	/* now, just parse the result */
	$pattern[0] = "@^.*&ligne0@";
	$replace[0] = "&ligne0";
	$pattern[1] = "@&@";
	$replace[1] = "</td></tr>\n<tr><td>";
	$pattern[2] = "@;@";
	$replace[2] = "</td>\n<td>";
	$pattern[3] = "@ligne(\d+)=@";
	$replace[3] = "$1:";
	$pattern[4] = "@Train TER@";
	$replace[4] = "TER";
	$output = preg_replace($pattern, $replace, $output);

	/* output the result */
	echo "<table><tr><td>\n";
	echo "$output\n";
	echo "</td></tr>\n</table>\n";
}
/*
echo "<!-- Piwik -->"
echo "<script type="text/javascript">"
echo "var pkBaseURL = (("https:" == document.location.protocol) ? "https://127.0.0.1/piwik/" : "http://127.0.0.1/piwik/");"
echo "document.write(unescape("%3Cscript src='" + pkBaseURL + "piwik.js' type='text/javascript'%3E%3C/script%3E"));"
echo "</script><script type="text/javascript">"
echo "try {"
echo "var piwikTracker = Piwik.getTracker(pkBaseURL + "piwik.php", 1);"
echo "piwikTracker.trackPageView();"
echo "piwikTracker.enableLinkTracking();"
echo "} catch( err ) {}"
echo "</script><noscript><p><img src="http://127.0.0.1/piwik/piwik.php?idsite=1" style="border:0" alt=""/></p></noscript>"
echo "<!-- End Piwik Tag -->"
 */
?>
</body>
</html>

