#!/bin/sh

# Script to launch the command line interface for DbVisualizer

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

VM_ARGS="-Xmx768M"

if [ "$JAVA_MAJOR_VERSION" = "9" ]; then
   $JAVA_EXEC ${VM_ARGS} \
      -Dsun.locale.formatasdefault=true \
      -Djava.awt.headless=true \
      -Ddbvis.home="${DBVIS_HOME}" \
      @"${DBVIS_HOME}"/java9-args \
      -cp "${CP}" \
      com.onseven.dbvis.DbVisualizerCmd "$@"
elif [ "$JAVA_MAJOR_VERSION" = "1" ] && [ "$JAVA_MINOR_VERSION" = "8" ]; then
   $JAVA_EXEC ${VM_ARGS}  \
      -Dsun.locale.formatasdefault=true \
      -Djava.awt.headless=true \
      -Ddbvis.home="${DBVIS_HOME}" \
      -cp "${CP}" \
      com.onseven.dbvis.DbVisualizerCmd "$@"
else
   echo "Error: Java 8 is required. Below is the version currently being used:\n"
   $JAVA_EXEC -version
   exit 2
fi
