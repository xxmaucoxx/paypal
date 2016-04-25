<?php

class paypalController
{
	public function _construct($mode='live')
	{
		if($mode=='live')
			$this->_url='https://www.paypal.com/cgi-bin/webscr';
		else
			$this->_url='https://www.sandbox.paypal.com/cgi-bin/websrc';
	}
    public function run()
    {
    	$postFields='cmd=notify-valite';

    	foreach ($_POST as $key => $value) {
    		$postFields .="&$key=".urlencode($value);
    	}

    	$ch= curl_init();

// set URL and other appropriate options
        $options = array(
                CURLOPT_URL => 'https://www.paypal.com/cgi-bin/webscr',
                CURLOPT_RETURNTRANSFER=>true,
                //CURLOPT_SSL_VARIFYPEER=>false,
                CURLOPT_POST=>true,
                CURLOPT_POSTFIELDS=>$postFields
        );
    curl_setopt_array($ch,$options);
    $result=curl_exec($ch);
    curl_close($ch);

    echo ($result);
    }

}
