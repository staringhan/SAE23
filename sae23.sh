#!/bin/bash

#Infinite loop
while true 
do

cap_pres= echo "SELECT ID-cap FROM sae23db.capteurs;" | mysql -h "root2" -u "root2" -p "root2" -D "sae23db" 
echo $cap_pres

for i in $cap_pres
do
	$data_temp= $(mosquitto_sub -h mqtt.iut-blagnac.fr -t Student/by-deviceName/$cap_pres[i] -C 1 | jq '.[0].temperature')
	$data_hum= $(mosquitto_sub -h mqtt.iut-blagnac.fr -t Student/by-deviceName/$cap_pres[i] -C 1 | jq '.[0].humidity')
done

#Vérification de la présence de la commande mysql

if command -V mysql > /dev/null; then 
	echo "la commande 'mysql' n'est pas installée."
	exit 1
fi

#Vérification de la présence de la base de données

if ! mysql -h 127.0.0.1 -e "USE sae23db;" > /dev/null 2>&1; then
	echo "Impossible de se connecter à la base de données"
	exit 1
fi
done