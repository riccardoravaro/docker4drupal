#!/bin/sh
set -e

start_browser_api(){
  CURRENT_DIR=$(pwd)
  LOCAL_PHANTOMJS="${CURRENT_DIR}/bin/phantomjs"
  if [ -f ${LOCAL_PHANTOMJS} ]; then
    ${LOCAL_PHANTOMJS} --ssl-protocol=any --ignore-ssl-errors=true vendor/jcalderonzumba/gastonjs/src/Client/main.js 8510 1024 768 2>&1 &
  else
    phantomjs --ssl-protocol=any --ignore-ssl-errors=true vendor/jcalderonzumba/gastonjs/src/Client/main.js 8510 1024 768 2>&1 >> /dev/null &
  fi
  sleep 2
}

stop_services(){
  ps axo pid,command | grep phantomjs | grep -v grep | awk '{print $1}' | xargs -I {} kill {}
  ps axo pid,command | grep php | grep -v grep | grep -v phpstorm | awk '{print $1}' | xargs -I {} kill {}
  sleep 2
}

<<<<<<< HEAD
star_local_browser(){
  CURRENT_DIR=$(pwd)
  cd ${CURRENT_DIR}/vendor/behat/mink/driver-testsuite/web-fixtures
  if [ "$TRAVIS" = true ]; then
    echo "Starting webserver fox fixtures...."
    ~/.phpenv/versions/5.6/bin/php -S 127.0.0.1:6789 > /dev/null 2>&1 &
  else
    php -S 127.0.0.1:6789 2>&1 >> /dev/null &
  fi
=======
start_local_browser(){
  CURRENT_DIR=$(pwd)
  ${CURRENT_DIR}/bin/mink-test-server > /dev/null 2>&1 &
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
  sleep 2
}

mkdir -p /tmp/jcalderonzumba/phantomjs
<<<<<<< HEAD
stop_services
start_browser_api
star_local_browser
=======
stop_services || true
start_browser_api
start_local_browser
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
cd ${CURRENT_DIR}
${CURRENT_DIR}/bin/phpunit --configuration integration_tests.xml
stop_services
start_browser_api
