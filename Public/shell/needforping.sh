#!/bin/bash

. needforping.conf

TMP_DIR=/$needforping_DIR/shell/pingresult
SERVER_LIST=/$needforping_DIR/shell/server_list.txt

while read line
    do
        $needforping_DIR/shell/goping.sh $line &
    done < $SERVER_LIST
