## About the cron job scripts:


###### on_db_server folder

copy_slow_query_log_to_web_server.sh

* This script assumes that the slow query logs are named mysqld_slowqry-YYMMDD.  If your log files are not named with this scheme, then this script would need to be modified.

* The script tests whether some log file exist and if they exist, it it copies them to the web server specified in the destination string

> [ -s FILE ] True if FILE exists and has a size greater than zero

* In order to enable scp to work you can create a key pair and copy it to the other server
 http://unix.stackexchange.com/questions/58704/bash-script-to-copy-log-files-into-a-new-directory

> ssh-keygen -t rsa
> 
> ssh-copy-id username@hostname
