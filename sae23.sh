#!/bin/bash

#Infinite loop

cap_pres= $(echo "SELECT \`ID-cap\` FROM sae23db.capteurs;") | mysql -h "192.168.194.99" -u "root3" -p"root3" -D "sae23db"
#we make make the variable a list of sensors



while true 
do

for i in $cap_pres
do
	$data_temp= $(mosquitto_sub -h mqtt.iut-blagnac.fr -t Student/by-deviceName/$cap_pres[i] -C 1 | jq '.[0].temperature')
	$data_hum= $(mosquitto_sub -h mqtt.iut-blagnac.fr -t Student/by-deviceName/$cap_pres[i] -C 1 | jq '.[0].humidity')
done 

done