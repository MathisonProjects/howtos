#!/bin/bash
echo "------------------------------------------------------------------------------------------"
echo "|                            domain_checker.sh has Started!                              |"
echo "------------------------------------------------------------------------------------------"
echo ""
DOSLIST_FILE="$(pwd)/domains"

while read -r line
do
	CUSTOM_URL="$1.$line"
	
    WHOISRESULT=$(whois $CUSTOM_URL | egrep -c '^No match|^NOT FOUND|^Not fo|AVAILABLE|^No Data Fou|has not been regi|No entri')
    echo $CUSTOM_URL
	if [[ ${WHOISRESULT} == 1 ]]; then
	  	echo "$CUSTOM_URL" >> $1.validDomains.txt
	fi;

done < "$DOSLIST_FILE"


echo ""
echo "------------------------------------------------------------------------------------------"
echo "|                            domain_checker.sh is complete!                              |"
echo "------------------------------------------------------------------------------------------"