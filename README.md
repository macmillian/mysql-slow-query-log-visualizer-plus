# mysql-slow-query-log-visualizer-plus
A slow query log visualiser for slow MySQL queries. Forked from: 
https://code.google.com/p/mysql-slow-query-log-visualizer/ <br />



This project add a "front end" to the mysql-slow-query-log-visualizer tool.   A bash scripts run via cron, and copy the slow query log files from the database server to a web server.  Then, the log files are processed by another bash script on the web server, to create weekly and monthly log files.  

These files are presented on the "index.php" page.  You can click the link for the file you would like to see in the visualizer tool.

The original method of drag-and-drop to load the slow query log into the visualizer also still works, and is provided as the bottom option on the index.php page.


Index page <br />
<img src="http://macmillian.net/mysql-slow-query-log-plus/images/screenshot-index.png" />

App page, showing visualizer tool<br />
<img src="http://macmillian.net/mysql-slow-query-log-plus/images/screenshot-orig.png" />
