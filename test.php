<?php

// http://www.dkruse.de/dokumente/netzwerke/Sicher3_Asymm_Verschluesselung.pdf

$p = 6967; // primzahl 1
$q = 9473; // primzahl 2
$e = 379; // eine weitere zahl, e und (p-1) * (q-1) müssen teilerfremd sein

// Privaten Schlüssel d ermitteln mit 1 = (e * d) % (p-1) * (q-1)
for ($d = 0; ($e * $d) % (($p-1) * ($q-1)) != 1; $d++) {}
print('private key: ' . $d . '<br>');

// Öffentlichen schlüssel ermitteln, besteht aus N und e
$N = $p * $q;
print('public key: ' . $N . ', ' . $e . '<br>');

// Zu verschlüsselnde Nachricht m als Zahl (https://www.torsten-horn.de/techdocs/ascii.htm)
$M = ord('B') ;
print('message: ' . chr($M) . '<br>');

// Verschlüsseln mit dem öffentlichen Schlüssel mit M hoch e mod N
$C = bcpowmod($M, $e, $N);
print('crypted message: ' . $C . '<br>');

// Entschlüsseln privatem Schlüssel mit C hoch d % N
$M = bcpowmod($C, $d, $N);
print('decrypted message: ' . chr($M) . '<br>');
