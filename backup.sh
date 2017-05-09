#!/bin/bash

<<<<<<< HEAD
DB="bancodetiempo"
=======
DB="bancotiempo"
>>>>>>> origin/master
PROJECT="$HOME/bancodetiempo"
DATE=`date +%Y-%m-%d-%H:%M:%S`

BKPS_FOLDER="production"
BKP_FOLDER=$DATE
BKP_FILE=$BKP_FOLDER.tar.bz2
RESOURCES_FOLDER="public/resources"

cd $PROJECT

mkdir $BKP_FOLDER
mysqldump -uroot -ptoor $DB > $BKP_FOLDER/db.sql
cp -R $RESOURCES_FOLDER $BKP_FOLDER
tar --force-local -cjf $BKP_FILE $BKP_FOLDER

rm -rf $BKP_FOLDER
<<<<<<< HEAD
rm $BKPS_FOLDER/*

mv $BKP_FILE $BKPS_FOLDER


git add $BKPS_FOLDER
git commit -m "Production backup"
git push
=======
#rm $BKPS_FOLDER/*
#mv $BKP_FILE $BKPS_FOLDER

gdrive upload --parent 0B2I7jvPWf3npNnpNU0RpbTByZ2M --delete $BKP_FILE

>>>>>>> origin/master
