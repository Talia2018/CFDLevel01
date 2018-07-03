# day 2

### install on local
git clone https://github.com/hyperledger/fabric-samples.git
cd fabric-samples
### curl -sSL https://goo.gl/6wtTN5 | bash -s 1.1.0
curl -sSL https://goo.gl/6wtTN5 | bash -s 1.2.0-rc2
cd fabcar
./startFabric.sh


### clear docker
docker rm -f $(docker ps -aq)
docker rmi -f $(docker images -aq)
docker network prune

### restart docker
cd /home/ubuntu/fabric-samples/fabcar
./startFabric.sh


#### yum user
cd /home/ec2-user/fabric-samples/fabcar
./startFabric.sh

### git checkout version
git checkout v1.1.0
git status
git branch

### version update
curl -sSL https://goo.gl/6wtTN5 | bash -s 1.2.0-rc2


### node install on yum umser
https://www.e2enetworks.com/help/knowledge-base/how-to-install-node-js-and-npm-on-centos/
yum install -y gcc-c++ make
curl -sL https://rpm.nodesource.com/setup_6.x | sudo -E bash -
yum install nodejs
node -v 

or
sudo yum install nodejs npm --enablerepo=epel


### for yum user
npm install npm -g
npm config set registry http://registry.npmjs.org/  


### node 
sudo npm install --unsafe perm --verbose
or
npm install
##### for yum user error
sudo chown -R root:root /root/.node-gyp/
npm install

### run node js add admin and user register
node enrollAdmin.js
node registerUser 

### node rebuild
npm rebuild  --unsafe perm --verbose
or
npm rebuild


### post transaction and query
node 2invoke.js
node query.js


### update /home/ubuntu/fabric-samples/chaincode/fabcar/go/fabcar.go
change CAR0 TO CAR999 to CAR6 TO CAR999
example:
        startKey := "CAR6"
        endKey := "CAR999"


###clear docer and restart 
docker rm -f $(docker ps -aq)
docker rmi -f $(docker images -aq)
docker network prune
cd /home/ubuntu/fabric-samples/fabcar
./startFabric.sh
node enrollAdmin.js
node registerUser 
node 2invoke.js
node query.js



### docker couchdb
docker exec -it couchdb /bin/bash
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

### go src
cd $GOPATH
ls 
cd /usr/local/go/bin/src
sudo su
mkdir cfd02
cd cfd02
vim cfd02.go


### put code below
package main

import (
        "fmt"
        "github.com/hyperledger/fabric/core/chaincode/shim"
        "github.com/hyperledger/fabric/protos/peer"
)

type YorkAsset struct {

}

func(t *YorkAsset) Init(stub shim.ChaincodeStubInterface) peer.Response {
	args := stub.GetStringArgs()
	if len(args) !=2 {
		return shim.Error("Incorrect number of arguments. Expecting a key and a value.")
	}
	err := stub.PutState(args[0],[]byte(args[1]))
	if err != nil {
		return shim.Error("Failed to create YorkAsset")
	}
	return shim.Success(nil)
}

func(t *YorkAsset) Invoke(stub shim.ChaincodeStubInterface) peer.Response{
	fn, args := stub.GetFunctionAndParameters()
	if fn == "getState" {
		result, err := getState(stub, args)
	} else if fn == "updateState" {
		result, err := updateState(stub, args)
	} else {
		return shim.Error("Invalid smart contract name")
	}

	if err != nil {
		return shim.Error(err.Error())
	}
	return shim.Success([]byte(result))
}

func getState(stub ChaincodeStubInterface, args []string) (string, error) {
	if len(args) != 1 {
		return "", fmt.Errorf("Incorrect number of arguments. Expectiong a key")
	}
	value, err := stub.GetState(args[0])
	if err != nil {
		return "", fmt.Errorf("Failed to get YorkAsset")
	}
	if value == nil {
		return "", fmt.Errorf("Failed to find asset")
	}
	return string(value), nil
}

func updateState(stub shim.ChaincodeStubInterface, args []string) (string, error) {
	if len(args) != 2 {
		return "", fmt.Errorf("Incorrect number of arguments. Expectinog a key and a value")
	}
	err := stub.PutState(args[0], byte[](args[1]))
	if err != nil{
		return "", fmt.Errorf(Failed to update ledger state"")
	}
	return args[1], nil
}

func main() {
	err := shim.Start(new(YorkAsset))
	if err != nil {
		fmt.Errorf("Error starting chaincode for YorkAsset")
	}
}




### build source file under local user ubuntu
cd /usr/local
sudo chown -R ubuntu:ubuntu go
export GOPATH=/usr/local/go/bin

cd /usr/local/go/bin/src/cfd02
go get -u --tags nopkcs11 github.com/hyperledger/fabric/core/chaincode/shim
go build --tags nopkcs11



###clear docer and start new chaincode
docker rm -f $(docker ps -aq)
docker rmi -f $(docker images -aq)
docker network prune

cd /home/ubuntu/fabric-samples/chaincode-docker-devmode
docker-compose -f docker-compose-simple.yaml up

##### for yum user
cd /home/ec2-user/fabric-samples/chaincode-docker-devmode
sudo service docker restart
sudo su
export PATH=$PATH:/usr/local/bin/:/usr/local/go/bin
docker-compose -f docker-compose-simple.yaml up
