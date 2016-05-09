# mysql-slow-query-log-visualizer-plus
A slow query log visualiser for MySQL. <br />
Forked from: 
https://code.google.com/p/mysql-slow-query-log-visualizer/ <br />


This project adds a way to load and index slow query logs via web host, so that the logs can be easily viewed with the mysql-slow-query-log-visualizer tool.   <br />

The slow query log files are presented on an "index.php" page.  A user can click the link for the file they would like to analyze with the visualizer tool.  A demo of this project is located here:  <br />
<a href="http://macmillian.net/mysql-slow-query-log-plus/index.php">macmillian.net/mysql-slow-query-log-plus/index.php </a>

The original method of drag-and-drop to load the slow query log into the visualizer also still works, and is provided as the bottom option on the index.php page.


Index page <br />
<img src="http://macmillian.net/mysql-slow-query-log-plus/images/screenshot-index.png" />

App page, showing visualizer tool<br />
<img src="http://macmillian.net/mysql-slow-query-log-plus/images/screenshot-orig.png" />

## More details
* the public_html folder contains the code which is served on the web host.  

* the cron_scripts folder contain the bash scripts which run via cron job.  One bash scripts runs on the database server, and copies the slow query log files from the database server to a web server.  Then, a second bash script runs on the web server and processes the log files to create weekly and monthly logs. 
