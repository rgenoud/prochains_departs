#!/bin/sh
echo "Content-Type: text/html; charset=utf-8"
echo ""

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
station=`echo $p2 | sed -e 's/%\([0-9A-F][0-9A-F]\)/\\\\\\\x\1/g' | xargs echo -e`
gid=$p4
nb=$p6

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

echo "<html>"
echo "<head>"
echo "<title>Prochains Departs $station</title>"
echo '<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">'
echo "</head>"
echo "<body>"
echo "<center>Prochains Departs $station<br/><br/></center>"
echo "<table><tr><td>"
wget -q -O- "http://aln.canaltp.fr/dev/index.php?gare=$gid&nbredepart=$nb&datedepart=$date&heuredep=$heure&modedep=1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1&alea=1262617546333&numafficheur=0" | \
sed -e "s@^.*\&ligne0@\&ligne0@" \
	-e "s@\&@</td></tr><tr><td>@g" \
	-e "s@;@</td><td>@g" \
	-e "s@ligne\([0-9]\+\)=@\1:@" \
	-e "s@Train TER@TER@"

echo "</td></tr></table>"

echo "</body>"
echo "</html>"

