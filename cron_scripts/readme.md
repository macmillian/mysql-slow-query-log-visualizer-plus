## About the cron job scripts:

### The on_db_server/copy_slow_query_log_to_web_server.sh script

* This script assumes that the slow query logs are named mysqld_slowqry-YYMMDD.  If your log files are not named with this scheme, then this script would need to be modified.

* The script tests whether some log file exist and if they exist, it it copies them to the web server specified in the destination string
> [ -s FILE ] True if FILE exists and has a size greater than zero

* In order to enable scp to work without requiring a password to be entered, you can create a key pair and copy it to the other server. See this topic for more info:
 http://unix.stackexchange.com/questions/58704/bash-script-to-copy-log-files-into-a-new-directory

 > ssh-keygen -t rsa

 > ssh-copy-id username@hostname


* On my database server, there was some unpredictable behavior with the log file rotator. So, that is why there are 4 blocks that are testing for log files of different dates, and copying them to the web server if they exist.

- - -

### The on_web_server/slow_query_log_processing.sh script

* You will need to set the origin and destination strings for your server.
* This script creates monthly and weekly log files from the individual day logs that were copied from the database server to the web server via the "on_db_server/copy_slow_query_log_to_web_server.sh" script
* Then, it sets the slow query log files to be viewable by the apache web user
* Then, it deletes slow query log files that are older than 3 months
