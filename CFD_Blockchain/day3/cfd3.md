# day 3

### new fabric
cd /home/ubuntu/
git clone https://github.com/hyperledger/fabric-samples.git
cd fabric-samples
curl -sSL https://goo.gl/6wtTN5 | bash -s 1.2.0-rc2


### cp first-network backup
cd /home/ubuntu/
cd fabric-samples/
cp -r first-network/ 1first-network/

cd first-network
./byfn.sh -m generate -c mychannel
./byfn.sh -m up -c "mychannel"
./byfn.sh -m down -c "mychannel"


### clean docker
docker rm -f $(docker ps -aq)
docker rmi -f $(docker images -aq)
docker network prune

### clean genesis block
rm -rf /home/ubuntu/fabric-samples/first-network/channel-artifacts/*.*
rm -rf channel-artifacts/*.*

### install docker and docker-compose, export PATH from cfd1



### edit configtx.yaml
    - &Org3
        Name: Org3MSP
        ID: Org3MSP
        MSPDir: crypto-config/peerOrganizations/org3.example.com/msp
        AnchorPeers:
            - Host: 18.188.156.97
              Port: 7051




    - &Org4
        Name: Org4MSP
        ID: Org4MSP
        MSPDir: crypto-config/peerOrganizations/org4.example.com/msp
        AnchorPeers:
            - Host: 18.191.136.235
              Port: 7051




    OrdererType: solo
    Addresses:
        - 52.60.80.132:7050


----------------------

# continue the day2 code

### continue the chain code
cd /usr/local/go/bin

### build source file under local user ubuntu
cd /usr/local
sudo chown -R ubuntu:ubuntu go
export GOPATH=/usr/local/go/bin

cd /usr/local/go/bin
mkdir /usr/local/go/bin/src
mkdir /usr/local/go/bin/src/cfd02
cd /usr/local/go/bin/src/cfd02
go get -u --tags nopkcs11 github.com/hyperledger/fabric/core/chaincode/shim
go build --tags nopkcs11


#### yum user
cd /usr/local
sudo chown -R ec2-user:ec2-user go



### edit below file /home/ubuntu/fabric-samples/chaincode-docker-devmode/docker-compose-simple.yaml  add line under 
cd /home/ubuntu/fabric-samples/chaincode-docker-devmode
### edit below file /home/ubuntu/fabric-samples/chaincode-docker-devmode/docker-compose-simple.yaml  add line under line 87
          - /usr/local/go/bin/src/cfd02:/opt/gopath/src/chaincodedev/


cd /home/ubuntu/fabric-samples/chaincode-docker-devmode
docker-compose -f docker-compose-simple.yaml up

### clear docker if neeed
docker-compose -f docker-compose-simple.yaml down

docker rm -f $(docker ps -aq)
docker rmi -f $(docker images -aq)
docker network prune


### start new terminal and run
docker exec -it chaincode bash
#### inside the last command
cd ..
cd chaincodedev
or
cd /opt/gopath/src/chaincodedev
go build
CORE_PEER_ADDRESS=peer:7052 CORE_CHAINCODE_ID_NAME=mycc:0 ./cfd02

### start 3rd terminal and
docker exec -it cli bash
#### inside the last command
peer chaincode install -p chaincodedev/chaincode/sacc -n mycc -v 0
peer chaincode instantiate -n mycc -v 0 -c '{"Args":["naba","female"]}' -C myc
peer chaincode query -n mycc -c '{"Args":["getState","naba"]}' -C myc

peer chaincode invoke -n mycc -c '{"Args":["updateState", "a", "20"]}' -C myc
peer chaincode query -n mycc -c '{"Args":["getState","a"]}' -C myc



### sample 
https://github.com/hyperledger/fabric-samples



### full script below
----------

-----------------

cd /home/ubuntu
cd fabric-samples/fabcar
sudo ./startFabric.sh
sudo su
npm install 
Ctrl+c
exit

node enrollAdmin.js
node registerUser 
node invoke.js
node query.js


### docker couchdb
sudo docker exec -it couchdb /bin/bash
pwd
ls
cd data
ls
cd shards
ls
cd 00000000-1fffffff
ls
cat maychannel_fabca
exit


#### clean all docker
sudo su
docker rm -f $(docker ps -aq)
docker rmi -f $(docker images -aq)
docker network prune
exit

------------------
cd /home/ubuntu
cd fabric-samples/first-network/
###export PATH=$PATH:/usr/local/bin/
sudo ./byfn.sh -m generate -c mychannel
sudo ./byfn.sh -m up -c "mychannel"
sudo ./byfn.sh -m down -c "mychannel"

#### clean all docker
sudo su
docker rm -f $(docker ps -aq)
docker rmi -f $(docker images -aq)
docker network prune
exit

-------------------
### install go
sudo curl -O https://storage.googleapis.com/golang/go1.10.linux-amd64.tar.gz
tar xvf go1.10.linux-amd64.tar.gz
sudo chown -R root:root ./go
sudo mv /usr/local/go /usr/local/go1
sudo mv go /usr/local

### go src
export GOPATH=/usr/local/go/bin
cd $GOPATH
ls 
cd /usr/local/go/bin
sudo su
mkdir src
mkdir src/cfd02
cd src/cfd02
vim cfd02.go

### build source file under local user ubuntu
exit
cd /usr/local
sudo chown -R ubuntu:ubuntu go
export GOPATH=/usr/local/go/bin

cd /usr/local/go/bin/src/cfd02
go get -u --tags nopkcs11 github.com/hyperledger/fabric/core/chaincode/shim
go build --tags nopkcs11

### edit below file /home/ubuntu/fabric-samples/chaincode-docker-devmode/docker-compose-simple.yaml  add line under 
cd /home/ubuntu/fabric-samples/chaincode-docker-devmode
### edit below file /home/ubuntu/fabric-samples/chaincode-docker-devmode/docker-compose-simple.yaml  add line under line 87
          - /usr/local/go/bin/src/cfd02:/opt/gopath/src/chaincodedev/

###start new chaincode
cd /home/ubuntu/fabric-samples/chaincode-docker-devmode
docker-compose -f docker-compose-simple.yaml up

### start new terminal and run
docker exec -it chaincode bash
#### inside the last command
cd ..
cd chaincodedev
or
cd /opt/gopath/src/chaincodedev
go build
CORE_PEER_ADDRESS=peer:7052 CORE_CHAINCODE_ID_NAME=mycc:0 ./cfd02

### start 3rd terminal and
docker exec -it cli bash
#### inside the last command
peer chaincode install -p chaincodedev/chaincode/sacc -n mycc -v 0
peer chaincode instantiate -n mycc -v 0 -c '{"Args":["naba","female"]}' -C myc
peer chaincode query -n mycc -c '{"Args":["getState","naba"]}' -C myc

peer chaincode invoke -n mycc -c '{"Args":["updateState", "a", "20"]}' -C myc
peer chaincode query -n mycc -c '{"Args":["getState","a"]}' -C myc

### close 2nd & 3rd terminal, and ctrl+c 1st terminal, clean docker
docker rm -f $(docker ps -aq)
docker rmi -f $(docker images -aq)
docker network prune



--------------
### build network

####yum user
curl -sSL https://goo.gl/6wtTN5 | bash -s 1.2.0-rc1
cd /home/ec2-user/fabric-samples/first-network
sudo su
export PATH=$PATH:/usr/local/bin/
./byfn.sh -m generate -c mychannel
./byfn.sh -m up -c "mychannel"
./byfn.sh -m down -c "mychannel"
