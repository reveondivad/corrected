<?php include(""../common/header.php""); ?>

<form action=""/CMD-6/index.php"" method=""POST"">
    <input type=""text"" name=""domain"">
    <input type=""hidden"" name=""server"" value=""whois.publicinterestregistry.net"">
</form>

<pre>
<?php
if (preg_match('/^[-a-z0-9]+\.a[cdefgilmnoqrstuwxz]b[abdefghijmnorstvwyz]c[acdfghiklmnoruvxyz]d[ejkmoz]e[cegrstu]f[ijkmor]g[abdefghilmnpqrstuwy]h[kmnrtu]i[delmnoqrst]j[emop]k[eghimnprwyz]l[abcikrstuvy]m[acdeghklmnopqrstuvwxyz]n[acefgilopruz]omp[aefghklmnrstwy]qar[eosuw]s[abcdeghijklmnortuvyz]t[cdfghjklmnoprtvwz]u[agksyz]v[aceginu]w[fs]y[et]z[amw]bizcatcomedugovintmilnetorgprotelaeroarpaasiacoopinfojobsmobinamemuseumtravelarpaxn--[a-z0-9]+$/', strtolower($_POST[""domain""]))) {
    $domain = escapeshellarg($_POST[""domain""]);
    $server = escapeshellarg($_POST[""server""]);
    system(""whois -h $server $domain"");
} else {
    echo ""malformed domain name"";
}
?>
</pre>