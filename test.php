<?php

// http://www.dkruse.de/dokumente/netzwerke/Sicher3_Asymm_Verschluesselung.pdf

$p = 6967; // primzahl 1
$q = 9473; // primzahl 2
$e = 379; // eine weitere zahl, e und (p-1) * (q-1) m�ssen teilerfremd sein

// Privaten Schl�ssel d ermitteln mit 1 = (e * d) % (p-1) * (q-1)
for ($d = 0; ($e * $d) % (($p-1) * ($q-1)) != 1; $d++) {}
print('private key: ' . $d . '<br>');

// �ffentlichen schl�ssel ermitteln, besteht aus N und e
$N = $p * $q;
print('public key: ' . $N . ', ' . $e . '<br>');

// Zu verschl�sselnde Nachricht m als Zahl (https://www.torsten-horn.de/techdocs/ascii.htm)
$M = ord('B') ;
print('message: ' . chr($M) . '<br>');

// Verschl�sseln mit dem �ffentlichen Schl�ssel mit M hoch e mod N
$C = bcpowmod($M, $e, $N);
print('crypted message: ' . $C . '<br>');

// Entschl�sseln privatem Schl�ssel mit C hoch d % N
$M = bcpowmod($C, $d, $N);
print('decrypted message: ' . chr($M) . '<br>');
