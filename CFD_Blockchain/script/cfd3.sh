#!/bin/bash
cd /home/ubuntu
git clone https://github.com/hyperledger/fabric-samples.git
cd fabric-samples
curl -sSL https://goo.gl/6wtTN5 | bash -s 1.2.0-rc2
cd fabcar
./startFabric.sh

npm install 
npm install --unsafe perm --verbose
npm rebuild  --unsafe perm --verbose
npm rebuild 

node enrollAdmin.js
node registerUser 
node invoke.js
node query.js
