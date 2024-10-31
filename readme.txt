=== Professional Booking Management ===
Contributors: ty.nguyen, thesys
Tags: appointment management, booking management, service booking, service calendar, service schedule, service checkout, customer login, login plugin, service signup, customer barcode, stripe
Requires at least: 4.2.4
Tested up to: 4.5
Stable tag: 1.0.0
License: GPLv2 or later

Professional Booking Management adds service calendar, service schedule and customer checkout to your posts and pages for simple booking.

== Description ==

Professional Booking Management creates editor buttons for embedding service calendar, service schedule, login area, and customer checkout to a post or a page. From the "Booking Management" page you can also manage services, customers, booking, and packages. Includes an optional floating widget for all pages.

Major features in Professional Booking Management include:

* Add a monthly service calendar along with service details to the frontend.
* Add a login area with customer's dashboard to your site for updating payment information.
* Add a schedule of services to your website.
* When a member signs up a QR-barcode it is automatically generated for the member.
* Add own Cascading Style Sheet to override the style of the plugin.
* Automatically charge Customers during booking process.
* Track payments and unpaid Customers. See payment information.

PS: You'll need a [MyProBooking Plugin password](http://news.myprobooking.com/wordpress-plugin-setup) for instruction to create one.  It is free to signup and use; Transaction fee applies on a business or a commercial site.

Also if you find any bugs or request for us to add new features please email us at support@myprobooking.com. Please check welcome email for instruction and app download links.


== Installation ==

Upload the "Professional Booking Management" plugin to your blog, Activate it, then enter your [MyProBooking Plugin Username & Password](http://news.myprobooking.com/wordpress-plugin-setup). You can find the username and password emailed to you after you have created the account.

1, 2, 3: You're done! Enjoy!

== Frequently Asked Questions ==

= Where can I find more information about this plugin? =

Please go to <a href="http://news.myprobooking.com/more-on-wordpress" target="_blank">More Plugin Info</a> for more FAQ .

= I have added a login to my post but where is the customer's area? =

You do not need to add in a customer's area. The login takes care of this. The login directs user to the customer's area. It will also be in the same post.

= How wide should my post or page be for the calendar? =

Although, the calendar supports mobile view it is your preference how wide to display your calendar. Both desktop view and mobile view display content differently and accordingly to the device screen's width and height.

So keep in mind to give the post area enough room to display calendar information for desktop view. 

= Can I override the plugin CSS? =

Yes, you can. You can change the color and styling of the plugin. Css override is in the Control Pane1. 

Go to "Booking Management" -> Click "Control Panel" Button 
-> Settings icon -> Scroll down to "CSS Override"

= Why isn't my password working? =

Your username and password will not work if you did not receive a plugin email password. When creating your account you still need to go through the process of entering your domain name so we can setup your plugin credential. You will also need to set up your Stripe account when creating your account to accept credit cards online.

Once it is finished the username and password is sent to your email address. Here is the step-by-step tutorial: <a href="http://news.myprobooking.com/wordpress-plugin-setup" target="_blank"> More on Setup</a>.

= How do I add a calendar to my post or page? =

Go to the post or page entry -> Click on "Visual" on the to right hand corner of your editor 
-> Click on the calendar icon -> Click on "Preview Changes" button
-> You should see your calendar

=  Does this plugin support Euro? =

Yes!

Currency Setting is where you change the content of your site. You can find it here in this tutorial: <a href="http://news.myprobooking.com/wordpress-changing-text" target="_blank"> Content Wizard</a>.

= Which payment gateway is the plugin compatible with? =

In the meantime this plugin only support Stripe. Stripe has no monthly payment. If Stripe is supported in your country and you wish to have your currency added to the plugin please email us at support@myprobooking.com with the Subject Line: "Currency Addition"

Countries: https://stripe.com/global

= Is there any monthly fee to run this plugin? =

There is no monthly fee to use this plugin. But if you are planning to charge customers then there is a credit card processing fee and service application fee that is applied to the charge. 

For personal site it is free since we don't expect there will be any credit card transaction made. But please feel free to give us your feedbacks for improvements.

The service application fee is processed automatically by Stripe and goes to our coffee run and hosting. If you would like to show your support we appreciate it. :) 

= How to set up HTTPS? =

If you are planning to transact online then you should setup SSL on your website. The plugin shortcodes goes through SSL and you might also want to strengthen your website protection too by applying SSL to these pages or posts.

1.) You might want to use a SSL redirect for your site using htaccess: https://wordpress.org/support/topic/changing-htaccess-fine-to-redirect-to-https

2.) Or Install plugin: https://wordpress.org/support/view/plugin-reviews/wordpress-https

There are several SSL provider out there and it is really inexpensive to secure your web pages. If you have any questions please let us know by emailing to use directly.

= How do I enable testing? =

You can test the website on your localhost. Once you are ready please go to the control panel -> click on "Setting" -> Go to "Plugin Test Mode" -> Select "No".

This will lock your control panel to be only accessible by your website. If you made a mistake and lock youself out before going live feel free to contact us.

= Are you going to have more features in the near future? =

Yes, we are currently working on some new features. Please let us know what you need to see if we can accommodate this in later releases.

= Can I offer refund to my customers? =

Yes, you can void a transaction in the control panel -> Customers -> Edit - > Go to list of transaction -> Click on a Transaction -> Void.

== Screenshots ==

1. screenshot.png
Editor buttons for service listing for booking, service calendar, login, and checkout
2. screenshot-1.png
Editor buttons for service listing for booking, service calendar, login, and checkout
3. screenshot-2.png
Service Selection Process for booking
3. screenshot-3.png
Booking by Date Selection
4. screenshot-4.png
Booking Available Time Selection  
5. screenshot-5.png
Booking Summary Overview
6. screenshot-6.png
Schedule of services for booking with date and clerk filtering
7. screenshot-7.png
Schedule of services popup option
8. screenshot-8.png
Corner Menu for booking
9. screenshot-9.png
Account Sign up form for customer login
10. screenshot-10.png
Customer Login Area
11. screenshot-11.png
Calendar of services for booking


== Changelog ==

= 1.0.0 =
*Release Date - 25 February 2016*

* Setting update
* Update to use Curl as default url reader
* Curl update to use ssl checking
* Check to see if user has fopen or curl enabled on server

