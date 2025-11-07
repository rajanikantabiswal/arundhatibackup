=== ITS Jewellery Price Pro Plugin ===
Contributors: Ifelse Team
Tags: gold, jewellery, gold price, diamond price, precious metals, dynamic price-update  
Requires at least: 5.8.2
Tested up to: 6.8.1
Requires PHP: 7.4, 8.1, 8.2, 8.3, 8.4
Stable tag: 24.02.06
License: 
License URI: 

ITS Jewellery Price Plugin for Woocommerce helps to update prices of jewellery products. We all know that prices of jewellery products change everyday based on prices of precious metals such as Gold and Diamond. 

== Description ==
ITS Jewellery Price Plugin for Woocommerce helps to update prices of jewellery products. We all know that prices of jewellery products change everyday based on prices of precious metals such as Gold and Diamond. Changing the price of each product is a big task that needs human resources and time. With our plugin you need to only update the prices of precious metals. The plugin will take care of updating the prices of the jewellery products.

== Documentation ==

For detailed instructions on how to configure the plugin, please visit the [documentation](https://www.ifelsetech.com/its-jewellery-price-pro-plugin-documentation/).


== Features ==
* Unlimited metals can be added
* While adding metals, respective product attributes are also created automatically
* This plugin works in simple product and variable product
* Every metal has three input fields in product edit page for weight, making charge and wastage charge
* Standard formula is used for product price calculation
* Changing of metal price is recorded in a separate metal price log
* Changing of product price is recorded in a separate product price log
* Additional information on the variable product page will be changed when the variant is changed.

== Pro Features ==
* Discount Feature
* Extra fields in product edit page
* Multi currency support
* Bulk Price Update
* Detail Logs
* Metal unit option

== Shortcodes ==
* Shortcode available for Price Breakup :  [itsjp_price_breakup]
* Show price breakup shortcode in popup : [itsjp_price_breakup show="popup"]
* Show today's metals prices in default format: [itsjp_metal_rate]
* Metals can be selected to display in the shortcode
* Show today's metals prices in table format: [itsjp_metal_rate  template="table" caption="Market Price Today" metal_head="Details" rate_head="Rate/gm"]
* Show today's metals prices in marquee style: [itsjp_metal_rate  template="marquee" caption="Market Price Today" metal_head="Details" rate_head="Rate/gm"]


== Add on Feature ==
* Price breakup details on simple and variable product page
* Show price breakup below add to cart in default woocommerce product template

== Multi Currency Switcher Support ==
* This plugin supports multi currency switcher plugin named CURCY – Multi Currency for WooCommerce

== Required Plugin ==
* Woocommerce

== Installation ==
=Installation Via WordPress Admin Area=
* Log into your WordPress admin area.
* Go to Dashboard » Plugin.
* Click on Add New Plugin button at top.
* Search for “ITS Jewellery Price”.
* Now click on the “Install Now” button of the “ITS Jewellery Price” plugin.
* Click on Activate once the plugin is installed.
* To activate the features of the plugin you need to get a license key from the plugin product page.

=Installation Using FTP=
* Download the ‘its-jewellery-price.zip’ file.
* Extract Zip file.
* Using your FTP program, upload the non-zipped plugin folder into the “/wp-content/plugins/” folder.
* Activate the plugin through the ‘Plugins’ menu in WordPress.

==How to use this plugin?==
* Before installing this plugin you must install woocommerce plugin.
* After activating the plugin, go to Settings >> Activate License. There is a link available to get the license key for this plugin. If you want to evaluate this plugin you can get a trial license key to test this plugin for a limited period. 
* Then, go to settings >> Add Metal Group - to add a metal group.
* After adding a metal group click Add New Metal and enter metal name then select metal group then enter metal price per gram and then click Save button. * The added metals will be shown below in table format.
* Then go to the product and enter all the data required. You will see the extra added fields for metal weight, making charge and wastage charge.
* After updating the product, go to ITS Jewellery Price settings page and click edit button and enter the current price of the metal and update it. Now, the plugin will take care of updating the prices of all products that are having this metal.

== Frequently Asked Questions ==
=How many metals can be added?=
This plugin does not restrict in adding metals. Any number of metals can be added.

=Do I need to create product attributes in woocommerce for metal names added through this plugin?=
Not at all. This plugin will take care of it. Product attributes will be created automatically.

=Does this plugin have a metal price log page?=
Yes, This plugin has a metal price log page.

=Does this plugin have a product price log page?=
Yes, this plugin has a product price log page. 
 
=Can I change the product price formula?=
No. You can not change the product price formula. For a custom price formula you can contact the developer.

== Screenshots ==
1. Price Setting page
2. Add Metal Group
3. Add New Metal
4. Price Settings
5. Metal Price Log
6. Product Price Log

== Changelog ==
= V25.06.17 =
  Improvements: Allow duplicate metal display names, support for php 8.4 version, support for wordpress 6.8.1
= V24.09.03 =
  Bug Fix: Discounted tax variable fixed.
= V24.09.02 =
  Improvements: Price breakup templates added
= V24.07.22 =
  Improvements: In general tab settings, tax value has condition to enter minimum 1 percentage it means 0.1, 0.25 values not allowed. But, the client Kushal Khabiya has a requirement to enter 0.25 tax for gem stone. So I removed that condition to allow 0 point values as tax percentage and tested.
= V24.06.25 =  
  Improvements: Automatic log clearing feature added. 
= V24.06.06 =
  Improvements: Fixed charge for making charge and wastage charge. Tax exempt feature for metal only.
= V24.06.05 = 
* Addon Introduced: Bulk Discount Addon
= V24.03.25 =
* Improvements: Additional information in the product page.
= V24.03.22 =
* Improvements: Old feature enhanced. Additional Information in the product page
= V24.03.19 =
* Improvements: Gold Prices for more than 30 Indian cities added.
= V24.02.06 =
* Bug Fix: On mobile devices, the clicking effect of the "Price Breakup Show" button no longer overlaps with the button above it.
= V24.01.08 =
* Improvements:The compatibility of the Shopengine plugin has been introduced.
= V23.07.07 =
* New Feature: Paid Add-on Auto price updater functionality added
= V23.06.03 =
* Bug Fix: Fixed css issue in price breakup
= V23.05.24 =
* Bug Fix:  Fixed the issue that the default text is not being displayed when the wastage or making charges fields are left blank.
* Improvements: Price breakup sub total, grand total and rounded total rows background color and text color can be customised by user.
* Improvements: Show or hide Metal price per unit in the price breakup based on metal.  

= V23.05.04 =
* Improvments and Bug Fix: Queue concept and batch processing method used for bulk price update.

= V23.04.28 =
* Bug Fix: Price Filter in the front end and backend of woocommerce issue because of price update fixed

= V23.04.07 =
* Bug Fix: The product price log table column discount_price data type changed to decimal(10,2)

= V23.05.04 =
**Improvements**
* extra input fields added in price breakup settings page to add custom label name instead of making charges and wastage charges in price breakup

= V23.03.14  =
**Bug Fixes**
* Fix - simple and variable product meta data display