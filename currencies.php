<?php
/**
 * Currency Conversion
 *
 * @author      Alistair Quinn
 * @copyright   2016 Alistair Quinn
 * @license     GPL-2.0+
 *
 *
 * Usage: [currency_conversion base=AUD value=1000.00 output=GBP] may display '£598.94'
 *
 */

function currency_conversion_shortcode( $atts ) {

	$atts = shortcode_atts(
		array(
			'base' => '', // Stored currency (e.g. AUD)
			'output' => '', // Displayed currency (e.g. GBP)
			'value' => '' // Stored value (e.g. 1000.00)
		),
		$atts
	);

	$base= $atts['base'];
	$output = $atts['output'];
	$value = $atts['value'];

	$ratesFeed = file_get_contents ("http://api.fixer.io/latest?base=".$base."&symbols=".$output."");
	$exchangeRates = json_decode($ratesFeed, true);
	
	$rate = $exchangeRates['rates'][$atts['output']]; // Exchange Rate for display currency

	$conversion = number_format($value*$rate, 2, '.', ','); // Converted value

	switch ($output) {
		case "GBP":
	        $result = '&pound;' . $conversion;
	        break;
		case "USD":
	        $result = '&dollar;' . $conversion;
	        break;
		case "EUR":
	        $result = $conversion . ' &euro;';
	        break;
	    default:
        	$result = $base . ' ' . $value;
	}

	echo $result;

}
add_shortcode( 'currency_conversion', 'currency_conversion_shortcode' );








