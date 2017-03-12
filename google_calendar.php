<?php
// INSTRUCTIONS FOR GETTING PHP WORKING ON A MAC
// !!!!!YOU SHOULD ONLY HAVE TO DO THIS ONCE!!!!!!
// 0. See the following link for more technical instructions:
//      https://coolestguidesontheplanet.com/get-apache-mysql-php-and-phpmyadmin-working-on-macos-sierra/
// 1. Open Terminal
// 2. Type the following command, which will open up an editor called nano (after sudo commands
//    you will need to type in your user password for the computer):
//      sudo nano /private/etc/apache2/httpd.conf
// 3. In this editor, type ctrl-w and then php <enter> to search for instances of php. You want 
//    to uncomment the following line by deleting the # at the beginning:
//      #LoadModule php5_module libexec/apache2/libphp5.so
// 4. Exit nano by typing ctrl-x, then a y, then <enter>
// 5. Restart your apache web server by typing
//      sudo apachectl restart
// !!!!!YOU SHOULD ONLY HAVE TO DO THIS ONCE!!!!!!

// AFTER completing steps 1-5, you can view any file with php locally by:
// A. Copy all relevant files to a subdirectory of:
//      /Library/WebServer/Documents
// B. In a browser, if you want to look at file yourfile.html in subdiretory yourdirectory, go to:
//      localhost://yourdirectory/yourfile.html
// (For a more complicated setup but a way doesn't require steps A & B every time, follow the detailed instructions above for setting up User Level Root)

// determine path, css filename and view mode
$calendarpath="https://calendar.google.com/calendar/embed?src=qs9kh487pd20j3b0nkbon947l4%40group.calendar.google.com&ctz=America/Chicago";

$newcss="css/google_calendar.css";

// import the contents of the Google Calendar page into a string
$contents = file_get_contents($calendarpath);

// add secure Google address to root relative links
$contents = str_replace('//calendar.google.com/calendar', 'https://www.google.com/calendar', $contents);
$contents = str_replace('src="/calendar/', 'src="https://www.google.com/calendar/', $contents);

// inject css file reference
$contents = str_replace('<script>function _onload()', '<link rel="stylesheet" type="text/css" href="'.$newcss.'" /><script>function _onload()', $contents );

// update settings found in javascript _onload() function
$contents = str_replace('"showCalendarMenu":true', '"showCalendarMenu":false', $contents);
if($defaultview == "month") $contents = str_replace('"showDateMarker":true', '"showDateMarker":false', $contents);
if($defaultview != "month") $contents = str_replace('"showTabs":true', '"showTabs":false', $contents);

echo $contents;
?>