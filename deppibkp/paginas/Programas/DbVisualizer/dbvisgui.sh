#!/bin/sh

# Script to launch DbVisualizer by manually invoking Java

# Function: Initializes the java version variables
init_java_version() {
  version_output=`"$JAVA_EXEC" $1 -version 2>&1`
  is_gcj=`expr "$version_output" : '.*gcj'`
  IS_OPENJDK=`expr "$version_output" : '.*OpenJDK'`
  if [ "$is_gcj" = "0" ]; then
    java_version=`expr "$version_output" : '.*"\(.*\)".*'`
    JAVA_MAJOR_VERSION=`expr "$java_version" : '\([0-9][0-9]*\).*'`
    JAVA_MINOR_VERSION=`expr "$java_version" : '[0-9][0-9]*\.\([0-9][0-9]*\).*'`
    JAVA_MICRO_VERSION=`expr "$java_version" : '[0-9][0-9]*\.[0-9][0-9]*\.\([0-9][0-9]*\).*'`
    VER_PATCH=`expr "$java_version" : '[0-9][0-9]*\.[0-9][0-9]*\.[0-9][0-9]*[\._]\([0-9][0-9]*\).*'`
  fi
}

if [ -z "$DBVIS_HOME" ] ; then 
  DBVIS_HOME=`dirname "$0"`
fi

if [ -z "$JAVA_EXEC" ] ; then 
 JAVA_EXEC=java
fi

init_java_version

CP="$DBVIS_HOME/resources"
CP="$CP:$DBVIS_HOME/lib/*"

VM_ARGS="-XX:StringTableSize=1000003 -Xmx768M "

DBVIS_OSTYPE=`uname`

if [ "$JAVA_MAJOR_VERSION" = "9" ]; then
   JAVA_ARGS="${VM_ARGS} @java9-args ${COMMON_ARGS}"
    echo $DBVIS_OSTYPE | grep -iq darwin
    if [ $? = "0" ]; then
       # MacOS start Java 9
       $JAVA_EXEC ${VM_ARGS} \
          @"${DBVIS_HOME}"/java9-args @"${DBVIS_HOME}"/java9-args-macos \
          -Dsun.locale.formatasdefault=true \
          -Ddbvis.home="${DBVIS_HOME}" \
          -splash:"${DBVIS_HOME}/resources/images/ix3/dbvis-splash_dark.png" \
          -cp "${CP}" \
          com.onseven.dbvis.DbVisualizerGUI "$@"
    else
       # Not MacOS Java 9
       $JAVA_EXEC ${VM_ARGS} \
          @"${DBVIS_HOME}"/java9-args \
          -Dsun.locale.formatasdefault=true \
          -Ddbvis.home="${DBVIS_HOME}" \
          -splash:"${DBVIS_HOME}/resources/images/ix3/dbvis-splash_dark.png" \
          -cp "${CP}" \
          com.onseven.dbvis.DbVisualizerGUI "$@"
    fi
elif [ "$JAVA_MAJOR_VERSION" = "1" ] && [ "$JAVA_MINOR_VERSION" = "8" ]; then
   # Not Java 9
   $JAVA_EXEC ${VM_ARGS} \
     -Dsun.java2d.xrender=false \
     -Dsun.locale.formatasdefault=true \
     -Ddbvis.home="${DBVIS_HOME}" \
     -splash:"${DBVIS_HOME}/resources/images/ix3/dbvis-splash_dark.png" \
     -cp "${CP}" \
     com.onseven.dbvis.DbVisualizerGUI "$@"
else
   echo "Error: Java 8 is required. Below is the version currently being used:\n"
   $JAVA_EXEC -version
   exit 2
fi

