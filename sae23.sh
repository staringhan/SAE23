#!/bin/bash

#Infinite loop
while true 
do

#subscribing to the broker of the room E209
	data_E209=$(mosquitto_sub -h iot.iut-blagnac.fr -u student -P student -t "STDS/Student/by-room/E209/#" -C 1)
	#The date and the hour of the subscribtion 
	date1=$(date +%F)
	heure1=$(date +%X)
	#The name of the sensor 
	ID_capE209=$(echo "E209")
	#A random number for the ID, until 0 32767
	ID_mesE209=$RANDOM
	

#subscribing to the broker of the room E006
	data_E006=$(mosquitto_sub -h iot.iut-blagnac.fr -u student -P student -t "STDS/Student/by-room/E006/#" -C 1)
	#The date and the hour of the subscribtion 
	date2=$(date +%F)
	heure2=$(date +%X)
	#The name of the sensor 
	ID_capE006=$(echo "E006")
	#A random number for the ID, until 0 32767
	ID_mesE006=$RANDOM
	
	
#subscribing to the broker of the room B202
	data_B202=$(mosquitto_sub -h iot.iut-blagnac.fr -u student -P student -t "STDS/Student/by-room/B202/#" -C 1)
	#The date and the hour of the subscribtion 
	date3=$(date +%F)
	heure3=$(date +%X)
	#The name of the sensor 
	ID_capB202=$(echo "B202")
	#A random number for the ID, until 0 32767
	ID_mesEB202=$RANDOM

#subscribing to the broker of the room B110
	data_B110=$(mosquitto_sub -h iot.iut-blagnac.fr -u student -P student -t "STDS/Student/by-room/B110/#" -C 1)
	#The date and the hour of the subscribtion 
	date4=$(date +%F)
	heure4=$(date +%X)
	#The name of the sensor 
	ID_capB110=$(echo "EB110")
	#A random number for the ID, until 0 32767
	ID_mesB110=$RANDOM


#Vérification de la présence de la commande mysql

if command -V mysql > /dev/null; then 
	echo "la commande 'mysql' n'est pas installée."
	exit 1
fi

#Vérification de la présence de la base de données

if ! mysql -h 127.0.0.1 -e "USE sae23db;" > /dev/null 2>&1; then
	echo "impossible de se connecter à la base de données"
	exit 1
fi

	#Insertion des données dans la base de données
	
	$(echo "INSERT INTO sae23db.mesures (ID-mes, date, heure, valeur, IDcap) VALUES ('$ID_mesE209', '$date1', '$heure1', '$data_E209', '$ID_capE209');" | /opt/lampp/bin/mysql -h localhost -u root -ppassroot)
	$(echo "INSERT INTO sae23db.mesures (ID-mes, date, heure, valeur, IDcap) VALUES ('$ID_mesE006', '$date2', '$heure2', '$data_E006', '$ID_capE2006');" | /opt/lampp/bin/mysql -h localhost -u root -ppassroot)
	$(echo "INSERT INTO sae23db.mesures (ID-mes, date, heure, valeur, IDcap) VALUES ('$ID_mesB202', '$date3', '$heure3', '$data_B202', '$ID_capEB202');" | /opt/lampp/bin/mysql -h localhost -u  root -ppassroot)
	$(echo "INSERT INTO sae23db.mesures (ID-mes, date, heure, valeur, IDcap) VALUES ('$ID_mesB110', '$date4', '$heure4', '$data_B110', '$ID_capB110');" | /opt/lampp/bin/mysql -h localhost -u root -ppassroot)

done





