#!/bin/bash
needforping_DIR=/var/www/html/8091/needforpingthinksmarty/Public/
. /$needforping_DIR/shell/needforping.conf

TMP_DIR=/$needforping_DIR/shell/pingresult
SERVER_LIST=/$needforping_DIR/shell/server_list.txt
line=$1
OUTPUTTXT=$TMP_DIR/ping_$line.txt
OUTPUTTMP=$TMP_DIR/ping_$line.tmp
OUTPUTFORJS=$TMP_DIR/$line.json

  echo "" > $OUTPUTTXT
  THESERVER="The server is $1 SERVER"
  echo $THESERVER >> $OUTPUTTXT
  DATETIME="Pingtime is "`date "+%Y-%m-%d %H:%M:%S"`" CST"
  echo $DATETIME >> $OUTPUTTXT
  ping -c $PINGCOUNT $line |tail -n 3 >> $OUTPUTTXT

  $needforping_DIR/shell/readline.sh $OUTPUTTXT $OUTPUTTMP
