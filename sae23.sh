#!/bin/bash
host=$(hostname -I | cut -d' ' -f1)
user="4325492_sae23db"
pass="Sae23dbmdp"
databsae="4325492_sae23db"

while true 
do


    # Query the database for list of captor IDs
    cap_pres_string=$(echo "SELECT \`ID-cap\` FROM capteurs;" | mysql -h "$host" -u "$user" -p"$pass" -D "$databsae")


    clear
 

    # Remove the first line from the query result
    cap_pres_string=$(echo "$cap_pres_string" | sed '1d')

    if [[ -z "$cap_pres_string" ]]
    then
        echo "Aucun capteur trouve dans la base de donnees..."
        sleep 5
        continue
    fi
	
    # Split the query result into an array of captor IDs
    IFS=$'\n' read -r -d '' -a cap_pres <<< "$cap_pres_string"


    echo " Liste des capteurs disponibles dans la DB : "
    echo "       ***********************"
    echo ""
    for id in "${cap_pres[@]}"
    do                    	
        echo "       - $id"
    done
    echo ""
    echo "       ***********************"
    echo " En attente de la recéption des données... "

    # Listen for MQTT messages from any captor
    while read -r topic data
    do


        # Extract the captor ID from the topic
        id=$(echo "$topic" | cut -d '/' -f 3)


        # Check if this captor is in the list of captors from the database
        if printf '%s\n' "${cap_pres[@]}" | grep -q -P "^$id$"; then


            # Extract the data from the MQTT message
            room=$(echo "$data" | jq '.[1].room')
            data_temp=$(echo "$data" | jq '.[0].temperature')
            data_hum=$(echo "$data" | jq '.[0].humidity')
            data_co2=$(echo "$data" | jq '.[0].co2')
            data_lum=$(echo "$data" | jq '.[0].illumination')

            echo "Température du capteur $id : $data_temp"
            echo "Humidite du capteur $id : $data_hum"


            # Send the data to the database
            #fetch the time in a format 00:00:00
            
            timee=$(date +%H:%M:%S)
            echo $timee
            echo "INSERT INTO \`mesures\`(\`ID-mes\`, \`date\`, \`heure\`, \`ID-cap\`, \`Salle\`, \`type\`, \`valeur\`) VALUES (NULL, current_timestamp(), '$timee', '$id', '$room', 'Temperature', '$data_temp');" | mysql -h "$host" -u "$user" -p"$pass" -D "$databsae"
            echo "INSERT INTO \`mesures\`(\`ID-mes\`, \`date\`, \`heure\`, \`ID-cap\`, \`Salle\`, \`type\`, \`valeur\`) VALUES (NULL, current_timestamp(), '$timee', '$id', '$room', 'Humidite', '$data_hum');" |mysql -h "$host" -u "$user" -p"$pass" -D "$databsae"
            echo "INSERT INTO \`mesures\`(\`ID-mes\`, \`date\`, \`heure\`, \`ID-cap\`, \`Salle\`, \`type\`, \`valeur\`) VALUES (NULL, current_timestamp(), '$timee', '$id', '$room', 'CO2', '$data_co2');" | mysql -h "$host" -u "$user" -p"$pass" -D "$databsae"
            echo "INSERT INTO \`mesures\`(\`ID-mes\`, \`date\`, \`heure\`, \`ID-cap\`, \`Salle\`, \`type\`, \`valeur\`) VALUES (NULL, current_timestamp(), '$timee', '$id', '$room', 'Luminosite', '$data_lum');" | mysql -h "$host" -u "$user" -p"$pass" -D "$databsae"

            clear


            echo "**********************************************************"
            echo "*                                                        *"
            echo "*  Les donnees ont ete correctement envoyees vers la DB  *"
            echo "*                                                        *"
            echo "**********************************************************"

            # Break out of the while loop to go back to the beginning and refresh the captor list
            break


        fi
    done < <(mosquitto_sub -h mqtt.iut-blagnac.fr -t "Student/by-deviceName/+/data" -v)
done
