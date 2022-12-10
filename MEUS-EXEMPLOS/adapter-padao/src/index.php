<?php 

$c = new Client();

//instancia da biblioteca para alimentar adaptador
$h = new HostingerMail('018165s5498ss8e489ew4d');

//cliente utilizando método da biblioteca oferecida pelo adaptador
$c->sendSubiscript($h);
