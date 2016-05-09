#!/bin/bash

destination="username@hostname:/home/username/slow_query_logs/."

logfile="/var/log/mysqld_slowqry"

date=`date +%Y%m%d`
yesterday=`date -d '1 day ago ' +%Y%m%d`
dayBeforeYesterday=`date -d '2 day ago ' +%Y%m%d`

if [ -s $logfile ]
then
        echo "$logfile is not empty "
        #scp to web server host
        scp -i /home/username/.ssh/id_rsa $logfile $destination
else
        echo "$logfile is empty "
fi



logfile1="$logfile-$date"

if [ -s $logfile1 ]
then
        echo "$logfile1 is not empty "
        scp -i /home/username/.ssh/id_rsa $logfile1 $destination

else
        echo "$logfile1 is empty "

fi

logfile2="$logfile-$yesterday"
if [ -s $logfile2 ]
then
        echo "$logfile2 is not empty "
        scp -i /home/username/.ssh/id_rsa $logfile2 $destination
else
        echo "$logfile2 is empty "
fi

logfile3="$logfile-$dayBeforeYesterday"
if [ -s $logfile3 ]
then
        echo "$logfile3 is not empty "
        scp -i /home/username/.ssh/id_rsa $logfile3 $destination
else
        echo "$logfile3 is empty "
fi






# http://unix.stackexchange.com/questions/58704/bash-script-to-copy-log-files-into-a-new-directory

# [ -s FILE ] True if FILE exists and has a size greater than zero

# ssh-keygen -t rsa
# ssh-copy-id username@hostname