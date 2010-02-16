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
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
	<meta http-equiv="Content-Script-Type" content="text/javascript"/>
	<meta name="description" content="clone du widget prochains departs de la sncf"/>
	<meta name="keywords" content="sncf,horaires,prochains departs,gare en mouvement,retard,train"/>
<title>Prochains D&eacute;parts</title>
</head>
<body>
	<ol>
<?
$station[0] = "Villefranche sur sa&ocirc;ne";
$gid[0] = "OCE87721332";
$nb[0] = 10;
$station[1] = "Lyon Part-Dieu";
$gid[1] = "OCE87723197";
$nb[1] = 30;
$station[2] = "Lyon Perrache";
$gid[2] = "OCE87722025";
$nb[2] = 30;
$station[3] = "Lyon Vaise";
$gid[3] = "OCE87721001";
$nb[3] = 15;
$station[4] = "Lyon Jean-Mac&eacute;";
$gid[4] = "OCE87282624";
$nb[4] = 10;
$station[5] = "M&acirc;con Ville";
$gid[5] = "OCE87725689";
$nb[5] = 10;
$station[6] = "Amb&eacute;rieu";
$gid[6] = "OCE87743716";
$nb[6] = 10;
$station[7] = "Saint-&Eacute;tienne Ch&acirc;teaucreux";
$gid[7] = "OCE87726000";
$nb[7] = 15;
$station[8] = "Saint-Georges-de-Reneins";
$gid[8] = "OCE87721340";
$nb[8] = 10;

for ($i = 0; $i < count($station); $i++) {
	echo "<li><a href=\"./prochains_departs.php?station=$station[$i]&gid=$gid[$i]&nb=$nb[$i]\">$station[$i]</a></li>";
}

?>
	</ol>
</body>
</html>
