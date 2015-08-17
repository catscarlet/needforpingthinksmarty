#!/bin/bash
needforping_DIR=/var/www/html/8091/needforpingthinksmarty/Public/
. /$needforping_DIR/shell/needforping.conf

TMP_DIR=/$needforping_DIR/shell/pingresult
#SERVER_LIST=/$needforping_DIR/shell/server_list.txt

    i=0
    MYSQL_COMMAND="SELECT server_name FROM $DB_PREFIX$DB_NAME.pinglist ;"
    mysql -u$DB_USER -p$DB_PWD -e "$MYSQL_COMMAND" | while read server_name; do

    if [ $i -ne 0 ] ;then
      $needforping_DIR/shell/goping.sh $server_name &
      #echo "$server_name"
    fi
    i=`expr $i + 1`
      done
