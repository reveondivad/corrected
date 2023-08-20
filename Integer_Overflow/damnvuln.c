<?php
$dn = htmlspecialchars($_GET['host']);
$filter=""((sn=$person*)(givenname=$person*))"";
$justthese = array(""ou"", ""sn"", ""givenname"", ""mail"");
$sr=ldap_search($ds, $dn, $dn, $justthese);
$info = ldap_get_entries($ds, $sr);
echo htmlspecialchars($info[""count""])."" entries returned"";
?>