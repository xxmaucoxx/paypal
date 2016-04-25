<?php
	require 'paypalController.php';
	$paypal= new paypalController('live');
	$paypal->run();