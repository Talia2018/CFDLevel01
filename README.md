
CFD02 Capstone Project - Loop
=========

Network Setup
=========
Location ==> /usr/local/fabric-samples/loop-network

startup script ==> loopNetw.sh

Key&Artifact Generate ==> loopNetw.sh generate

Network startup ==> loopNetw.sh up s:couchdb

Network shutdown ==> loopNetw.sh up

domain name ==> loopsystems.ca
	
CA ==> ca.loopsystems.ca

Orderer ==> orderer.loopsystems.ca

Org1 ==> loop.loopsystems.ca (peer0 & peer1)

Org2 ==> sender.loopsystems.ca (peer0 & peer1)


Couch DB
========
We use CouchDB for comprehensiver database query


Chaincode
========
code name ==> sender_cc.go


Chaincode Functions
=========
initOrder  ==> create a Loop order when order request received.

UpdateOrderStatus ==> update order status when order status changed, for example of created, inprogress,received etc.

UpdateOrderLocation ==> update order location when GPS report received. 

getOrderByID ==> search order by Key: orderID, which combined with "order"+ timestamp (milli seconds).

getOrderBySender ==> search all orders requested from certain sender, for example "sender01".

getAllActiveOrder  ==> search all orders are currently activer, for example, order status is "inprogess".

getOrderByReceiver ==> search orders belong to certain receiver, for example "receiver01".

getOrderHistory ==> search all transactions for certain order (defined with Key: orderID).


Node JS scripts
=======
enrollAdmin.js  ==> enroll admin user: "admin"

registerUser.js ==> register normal user: "user1" for senderMSP with "client" role

invoke_add_sender01.js ==> call "initOrder" chaincode function to add an LoopOrder

query_sender01.js ==> call "getOrderBySender" chaincode function to query LoopOrder created from above JS code.


Reminder
=======
Please do a clean prior to start attempt by clear all docker images:

docker rm -f $(docker ps -aq)

docker rmi -f $(docker images -aq)

docker network prune

