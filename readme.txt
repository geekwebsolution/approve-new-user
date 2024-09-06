=== Approve New User ===
Contributors: rajkakadiya
Donate link: https://geekcodelab.com/
Tags: comments, spam
Requires PHP: 7.4
Requires at least: 6.3
Tested up to: 6.6.1
Stable tag: 1.0.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Approve New User plugin automates the user registration process on your WordPress website.

== Description ==

The Approve New User plugin automates the user registration process on your WordPress website, adding a layer of approval to ensure better control over who can access your site.

Typically, registering users on a WordPress site is straightforward. When a new user registers, their information is added to the website’s database, and they receive an email with their login credentials. While simple, this process offers many opportunities for customization.

Introducing Approve New User – a new way to register users on your WordPress website. Here’s how it works:

<b>User Registration:</b> A new user registers on the site, and their ID is created.
<b>Admin Notification:</b> An email is sent to the site administrators.
<b>Approval Process:</b> An administrator can either approve or deny the registration request.
<b>User Notification:</b> An email is sent to the user, letting them know if their registration was approved or denied.
<b>Login Credentials:</b> If approved, the user receives an email with their login credentials.

Users will not be able to log in until they are approved. Only approved users will be allowed access, while those waiting for approval or who have been rejected will not be able to log in. This process is simple, straightforward, and effective.

Additionally, user status can be updated even after the initial approval or denial. Administrators can search for approved, denied, and pending users. Also, users created before the activation of Approve New User will automatically be treated as approved users.

<h4>Features</h4>

* <b>Automated User Registration:</b> Simplifies the user registration process by adding a layer of approval.
* <b>Admin Notification:</b> Sends an email to site administrators whenever a new user registers.
* <b>Approval/Deny Option:</b> Allows administrators to approve or deny registration requests.
* <b>User Notification:</b> Sends an email to users informing them if their registration has been approved or denied.
* <b>Secure Login Credentials:</b> Provides login credentials to users only after approval.
* <b>Access Control:</b> Ensures that only approved users can log in to the site.
* <b>Status Updates:</b> Allows administrators to update user status (approve or deny) even after the initial decision.
* <b>User Search:</b> Enables administrators to search for approved, denied, and pending users.
* <b>Backward Compatibility:</b> Automatically treats users created before the plugin’s activation as approved users.

== Installation ==

1. Extract the zip file and just drop the contents in the wp-content/plugins/ directory of your WordPress installation.
2. Activate the plugin through the Plugins menu in WordPress
3. No configuration necessary.

After Plugin Active go to WooCommerce-> Donation.

== Screenshots ==

1. Welcome Message
2. Register Form Message
3. Successfull Registration Message
4. User List Page
5. Update User Access Status


== Changelog ==
= 1.0.1 =
 Prefix updated for security reasons
 Unused hooks enqueue script removed
 Fixed missing sanitize in verify nonce 

= 1.0.0 =
 Initial release