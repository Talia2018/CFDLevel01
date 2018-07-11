
CFD02 Capstone Project - Loop
=========
Chaincode Name ==> sender_cc.go

Network Start Script
=========
Location ==> /usr/local/fabric-samples/loop-network

startup script ==> loopNetw.sh

Couch DB
========
We use CouchDB for comprehensiver database query

Chaincode Functions
=========
initOrder  ==> create and Loop order when request come in

UpdateOrderStatus ==> update order status when Order shipped out, received by receiver etc

UpdateOrderLocation ==> update order location when GPS report received

getOrderByID ==> search order by Key: orderID, which combined with "order"+ timestamp (milli seconds)

getOrderBySender ==> search orders requested from certain sender, for example "sender01"

getAllActiveOrder  ==> search orders are currently activer, status is "inprogess"

getOrderByReceiver ==> search orders belong to certain receiver, for example "receiver01"

getOrderHistory ==> search all transaction for certain order with Key (orderID)



Node JS scripts
=======
enrollAdmin.js  ==> enroll admin user: "admin" for senderMSP

registerUser.js ==> register normal user: "user1" for senderMSP

invoke_add_sender01.js ==> call "initOrder" chaincode function to add an LoopOrder (with sender: sender01)

query_sender01.js ==> call "getOrderBySender" chaincode function to query LoopOrder (created from above JS code)


Reminder
=======
Please do a clean prior to start attempt by clear all docker images and restart

docker rm -f $(docker ps -aq)

docker rmi -f $(docker images -aq)

docker network prune

=======
