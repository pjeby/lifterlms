== Changelog ==


= v3.30.0 - 2019-03-21 =
------------------------

##### Updates

+ **Create custom thank you pages with new access plan checkout redirect options.**
+ Added the ability to sort items on the membership auto enrollment table (drag and drop to sort and reorder).
+ Improved the interface and interactions with the membership auto enrollment table settings.

##### LifterLMS Blocks

+ Updated LifterLMS Blocks to 1.3.8.
+ Fixed an issue causing some installations to be unable to use certain blocks due to jQuery dependencies being declared improperly.

##### Bug Fixes

+ Fixed issue preventing courses with the same title from properly displayed on the membership automatic enrollment courses table on the admin panel.
+ Fixed an issue preventing builder custom fields from being able to specify a custom sanitization callback.
+ Fixed an issue preventing builder custom fields from being able to properly save and render multi-select data.

##### Template Updates

+ [templates/product/access-plan-restrictions.php](https://github.com/gocodebox/lifterlms/blob/master/templates/product/access-plan-restrictions.php)
+ [templates/product/free-enroll-form.php](https://github.com/gocodebox/lifterlms/blob/master/templates/product/free-enroll-form.php)


= v3.29.4 - 2019-03-08 =
------------------------

+ Fixed an issue preventing users with email addresses containing an apostrophe from being able to login.


= v3.29.3 - 2019-03-01 =
------------------------

##### Bug Fixes

+ Removed attempts to validate & save access plan data when the Classic Editor "post" form is submitted.
+ Fix issue causing 1-click free-enrollment for logged in users to refresh the screen without actually performing an enrollment.

##### Template Updates

+ [product/free-enroll-form.php](https://github.com/gocodebox/lifterlms/blob/master/templates/product/free-enroll-form.php)


= v3.29.2 - 2019-02-28 =
------------------------

+ Fix issue causing blank "period" values on access plans from being updated.
+ Fix an issue preventing paid access plans from being switched to "Free".


= v3.29.1 - 2019-02-27 =
------------------------

+ Automatically reorder access plans when a plan is deleted.
+ Skip (don't create) empty plans passed to the access plan save method as a result of deleted access plans.


= v3.29.0 - 2019-02-27 =
------------------------

##### Improved Access Plan Management

+ Added a set of methods for creating access plans programmatically.
+ Updated the Access Plan metabox on courses and lessons with improved data validation.
+ When using the block editor, the "Pricing Table" block will automatically update when access plan changes are saved to the database (from LifterLMS Blocks 1.3.5).
+ Access plans are now created and updated via AJAX requests, resolves a 5.0 editor issue causing duplicated access plans to be created.

##### Student Management Improvements

+ Added the ability for instructors and admins to mark lessons complete and incomplete for students via the student course reporting table.

##### Admin Panel Settings and Reporting Design Changes

+ Replaced LifterLMS logos and icons on the admin panel with our new logo LifterLMS Logo and Icons.
+ Revamped the design and layout of settings and reporting screens.

##### Checkout Improvements

+ Updated checkout javascript to expose an error addition functions
+ Abstracted the checkout form submission functionality into a callable function not directly tied to `$_POST` data
+ Removed display order field from payment gateway settings in favor of using the gateway table sortable list

##### Other Updates

+ Removed code related to an incompatibility between Yoast SEO Premium and LifterLMS resulting from former access plan save methods.
+ Reduced application logic in the `course/complete-lesson-link.php` template file by refactoring button display filters into functions.
+ Added function for checking if request is a REST request
+ Updated LifterLMS Blocks to version 1.3.7

##### Bug Fixes

+ Fixed an issue preventing "Pricing Table" blocks from displaying on the admin panel when the current user was enrolled in the course or no payment gateways were enabled on the site.
+ Fixed the checkout nonce to have a unique ID & name
+ Fixed an issue with deleted quizzes causing quiz notification's to throw fatal errors.
+ Fixed an issue preventing notification timestamps from displaying on the notifications dashboard page.
+ Fix an issue causing `GET` requests with no query string variables from causing issues via incorrect JSON encoding via the API Handler abstract.
+ Fix an issue causing access plan sale end dates from using the default WordPress date format settings.
+ `LLMS_Lesson::has_quiz()` will now properly return a boolean instead of the ID of the associated quiz (or 0 when none found)

##### Template Updates

+ [checkout/form-checkout.php](https://github.com/gocodebox/lifterlms/blob/master/templates/checkout/form-checkout.php)
+ [course/complete-lesson-link.php](https://github.com/gocodebox/lifterlms/blob/master/templates/course/complete-lesson-link.php)
+ [product/access-plan-pricing.php](https://github.com/gocodebox/lifterlms/blob/master/templates/product/access-plan-pricing.php)
+ [notifications/basic.php](https://github.com/gocodebox/lifterlms/blob/master/templates/notifications/basic.php)

##### Templates Removed

Admin panel templates replaced with view files which cannot be overridden from a theme or custom plugin.

+ `admin/post-types/product-access-plan.php`
+ `admin/post-types/product.php`


= v3.28.3 - 2019-02-14 =
------------------------

+ ❤❤❤ Happy Valentines Day or whatever ❤❤❤
+ Tested to WordPress 5.1
+ Fixed an issue causing JSON data saved by 3rd party plugins in course or lesson postmeta fields to be not duplicate properly during course duplications and imports.


= v3.28.2 - 2019-02-11 =
------------------------

##### Updates

+ Updated default country list to remove non-existant countries and resolve capitilization issues, thanks [nrherron92](https://github.com/nrherron92)!

##### Bug fixes

+ Fixed an issue causing the email notification content getter to use the same filter as popover notifications.
+ Fixed an issue preventing default blog date & time settings from being used when displaying an access plan's access expiration date on course and membership pricing tables.
+ Fixed an issue causing 404s on paginated dashboard endpoints when the permalink structure is set to anything other than `%postname%`.

##### Deprecations

+ `LLMS_Query->set_dashboard_pagination()`


= v3.28.1 - 2019-02-01 =
------------------------

+ Fixed an issues preventing exports to be accessible on Apache servers.
+ Fixed an issue causing servers with certain nginx rules to open CSV exports directly instead of downloading them.


= v3.28.0 - 2019-01-29 =
------------------------

##### Updates

+ Updated reporting table export functions to provide immediate download prompts of the files. Exports are generated in real time and you *must* remain on the page while it generates. The good news is if your site had issues with email or cronjobs it'll no longer be an issue for you.
+ Updated lesson metabox to use icons for attached quizzes
+ Added an orange highlight to the admin "Add-Ons & More" menu item
+ Removed unused cron event.

##### LifterLMS Blocks

+ Updated LifterLMS Blocks to 1.3.4
+ Adds support for handling courses & lessons in "Classic Editor" mode as defined by the Divi page builder
+ Skips course and lesson migration when "Classic" mode is enabled.
+ Adds conditions to identify "Classic" mode when the Classic Editor plugin settings are configured to enforce classic (or block) mode for *all* posts.

##### Database Updates

+ Unschedules the aforementioned unused cron event.

##### Bug fixes

+ Fixed an issue preventing the temp directory old file cleanup cron from firing on schedule.
+ During plugin uninstallation the tmp cleanup cron will now be properly unscheduled.
+ Fixed an issue causing notifications on the student dashboard to appear on top of static headers or the WP Admin Bar when scrolling.
+ Fixed an issue preventing manual updating of customer and source information on orders resulting from unfocusable hidden form fields.
+ Fixed mismatched HTML tags on the Admin Add-Ons screen

##### Deprecations

+ Class method: `LLMS_Admin_Table::queue_export()`
+ Class: `LLMS_Processor_Table_To_Csv`