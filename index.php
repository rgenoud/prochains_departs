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
$i = 0;
$station[$i] = "Villefranche sur sa&ocirc;ne";
$gid[$i] = "OCE87721332";
$nb[$i] = 10;
$i++;
$station[$i] = "Lyon Part-Dieu";
$gid[$i] = "OCE87723197";
$nb[$i] = 30;
$i++;
$station[$i] = "Lyon Perrache";
$gid[$i] = "OCE87722025";
$nb[$i] = 30;
$i++;
$station[$i] = "Lyon Vaise";
$gid[$i] = "OCE87721001";
$nb[$i] = 15;
$i++;
$station[$i] = "Lyon Jean-Mac&eacute;";
$gid[$i] = "OCE87282624";
$nb[$i] = 10;
$i++;
$station[$i] = "M&acirc;con Ville";
$gid[$i] = "OCE87725689";
$nb[$i] = 10;
$i++;
$station[$i] = "Amb&eacute;rieu";
$gid[$i] = "OCE87743716";
$nb[$i] = 10;
$i++;
$station[$i] = "Saint-&Eacute;tienne Ch&acirc;teaucreux";
$gid[$i] = "OCE87726000";
$nb[$i] = 15;
$i++;
$station[$i] = "Saint-Georges-de-Reneins";
$gid[$i] = "OCE87721340";
$nb[$i] = 10;
$i++;
$station[$i] = "Montluel";
$gid[$i] = "OCE87723569";
$nb[$i] = 10;
$i++;
$station[$i] = "gare de Moirans (38430)";
$gid[$i] = "OCE87747329";
$nb[$i] = 10;
$i++;
$station[$i] = "gare de Moirans-Galifette (38430)";
$gid[$i] = "OCE87747691";
$nb[$i] = 10;
$i++;

for ($i = 0; $i < count($station); $i++) {
	echo "<li><a href=\"./prochains_departs.php?station=$station[$i]&gid=$gid[$i]&nb=$nb[$i]\">$station[$i]</a></li>";
}

?>
	</ol>
</body>
</html>
