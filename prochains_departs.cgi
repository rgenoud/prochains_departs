#!/bin/sh
echo "Content-Type: text/html; charset=utf-8"
echo ""

gare="Lyon Part Dieu"

date=`date "+%Y;%m;%d"`
heure=`date "+%H;%M"`
nb=30

# ok, c'est crade...
params=`echo $QUERY_STRING | sed -e "s/\&/ /g"`
nparams=0
for param in $params; do
	toto=`echo $param | sed -e "s/=/ /g"`
	for i in $toto ; do
		nparams=$((nparams+1))
		eval "p$nparams=$i"
	done
done
gare=$p2
nb=$p4

exit_erreur() {
	echo ""
	echo "<html>"
	echo "<head>"
	echo "<title>erreur</title>"
	echo '<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">'
	echo "</head>"
	echo "<body>"
	echo "erreur : query=|$QUERY_STRING| gare=|$gare| nb=|$nb| p1=|$p1| p2=|$p2| p3=|$p3| p4=|$p4|<br/>"
	echo "</body>"
	echo "</html>"

}

case $gare in
	part_dieu)
		gid=OCE87723197
		;;
	perrache)
		gid=OCE87722025
		;;
	macon)
		gid=OCE87725689
		;;
	amberieu)
		gid=OCE87743716
		;;
	villefranche)
		gid=OCE87721332
		;;
	*)
		exit_erreur;
		;;
esac

echo "<html>"
echo "<head>"
echo "<title>Prochains Departs $gare</title>"
echo '<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">'
echo "</head>"
echo "<body>"
echo "<center>Prochains Departs $gare<br/><br/></center>"
echo "<table><tr><td>"
wget -q -O- "http://aln.canaltp.fr/dev/index.php?gare=$gid&nbredepart=$nb&datedepart=$date&heuredep=$heure&modedep=1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1&alea=1262617546333&numafficheur=0" | \
sed -e "s@^.*\&ligne0@\&ligne0@" -e "s@\&@</td></tr><tr><td>@g" -e "s@;@</td><td>@g"
echo "</td></tr></table>"

echo "</body>"
echo "</html>"

