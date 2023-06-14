#!/bin/bash
# This script is used to install all the required packages for the project

# Install the required packages
sudo apt-get install mosquitto mosquitto-clients -y
sudo apt-get install jq -y
sudo apt-get install sed -y
sudo apt-get install mariadb-client-core-10.6 mariadb-common -y
