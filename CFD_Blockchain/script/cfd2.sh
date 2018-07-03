#!/bin/bash

sudo curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add
sudo add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/ubuntu $(lsb_release -cs) stable"
sudo apt-get upgrade -y
sudo apt-get update -y
apt-cache policy docker-ce
sudo apt-get install -y docker-ce

sudo curl -L https://github.com/docker/compose/releases/download/1.19.0/docker-compose-`uname -s`-`uname -m` -o /usr/local/bin/docker-compose
sudo chmod +x /usr/local/bin/docker-compose

cd /home/ubuntu
git clone https://github.com/hyperledger/fabric-samples.git
cd fabric-samples
curl -sSL https://goo.gl/6wtTN5 | bash -s 1.2.0-rc2
cd fabcar
sudo ./startFabric.sh

apt install npm
apt install nodejs-legacy
npm install 
npm install --unsafe perm --verbose
npm rebuild  --unsafe perm --verbose
npm rebuild 


npm install 
npm rebuild 

node enrollAdmin.js
node registerUser 
node invoke.js
node query.js


