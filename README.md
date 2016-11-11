# Currency Conversion Shortcode
This is a WordPress shortcode which will convert base currency to either EUR,GBP or USD.

This shortcode uses the fixer.io exchange rate feed.

## Install

1. Copy the file into your theme directory ./inc folder
2. Add the following code to your functions.php file:

<pre>
/**
 * Load Country Code Conversion Shortcode.
 */
require get_template_directory() . '/inc/currencies.php';
</pre>

## Usage

[currency_conversion base=AUD value=1000.00 output=GBP] may display '£598.94'
