#!/bin/bash

WHERE=`pwd`

TGZ_NAME="phplot-5.0-1.tgz"
DIR_NAME="phplot"

cd ..
tar -cvz --exclude=OLD --exclude=*.webprj --exclude=work --exclude=*~ --exclude=CVS --exclude=.?* --exclude=np --exclude=.cvsignore -f $TGZ_NAME $DIR_NAME
cd "$WHERE"
