#!/bin/sh

origin="/home/username/slow_query_logs"

chmod 644 $origin/*

destination="/var/www/html/hostname/current/logs"

year=`date +%Y`
month=`date +%m`
lastMonth=`date -d'last-month' +%m`

#### first, copy all log files from origin to destination ####
cp -p $origin/* $destination/.

#### next, cat weekly ####
weeklyDestination="/var/www/html/hostname/current/logs/week"

lastWeek=`date -d'next-sunday-14days' +%Y%m%d-``date -d'next-sunday-8days' +%Y%m%d`
sunday=`date -d'next-sunday-14days' +%Y%m%d`
monday=`date -d'next-sunday-13days' +%Y%m%d`
tuesday=`date -d'next-sunday-12days' +%Y%m%d`
wednesday=`date -d'next-sunday-11days' +%Y%m%d`
thursday=`date -d'next-sunday-10days' +%Y%m%d`
friday=`date -d'next-sunday-9days' +%Y%m%d`
saturday=`date -d'next-sunday-8days' +%Y%m%d`
cat $destination/mysqld_slowqry-$sunday $destination/mysqld_slowqry-$monday  \
$destination/mysqld_slowqry-$tuesday $destination/mysqld_slowqry-$wednesday  \
$destination/mysqld_slowqry-$thursday $destination/mysqld_slowqry-$friday  \
$destination/mysqld_slowqry-$saturday > $weeklyDestination/mysqld_slowqry-$lastWeek

thisWeek=`date -d'next-sunday-7days' +%Y%m%d-``date -d'next-sunday-1days' +%Y%m%d`
sunday=`date -d'next-sunday-7days' +%Y%m%d`
monday=`date -d'next-sunday-6days' +%Y%m%d`
tuesday=`date -d'next-sunday-5days' +%Y%m%d`
wednesday=`date -d'next-sunday-4days' +%Y%m%d`
thursday=`date -d'next-sunday-3days' +%Y%m%d`
friday=`date -d'next-sunday-2days' +%Y%m%d`
saturday=`date -d'next-sunday-1days' +%Y%m%d`
cat $destination/mysqld_slowqry-$sunday $destination/mysqld_slowqry-$monday  \
$destination/mysqld_slowqry-$tuesday $destination/mysqld_slowqry-$wednesday  \
$destination/mysqld_slowqry-$thursday $destination/mysqld_slowqry-$friday  \
$destination/mysqld_slowqry-$saturday > $weeklyDestination/mysqld_slowqry-$thisWeek


#### next, cat monthly ####
monthlyDestination="/var/www/html/link.dev.greenpeaceusa.org/current/logs/month"
cat $destination/mysqld_slowqry-$year$month* > $monthlyDestination/mysqld_slowqry-$year$month
cat $destination/mysqld_slowqry-$year$lastMonth* > $monthlyDestination/mysqld_slowqry-$year$lastMonth


#### update file permissions ####
chmod 644 $destination/*
chmod 775 $destination/month
chmod 775 $destination/week
chmod 644 $destination/month/*
chmod 644 $destination/week/*


#### delete logs older than 3 months ####
threeMonthsAgo=`date -d'last-sunday-3months' +%Y%m`

find $destination -name mysqld_slowqry-$threeMonthsAgo\* -type f -delete
find $origin -name mysqld_slowqry-$threeMonthsAgo\* -type f -delete