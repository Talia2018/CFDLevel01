#!/bin/bash

echo
echo " ____    _____      _      ____    _____ "
echo "/ ___|  |_   _|    / \    |  _ \  |_   _|"
echo "\___ \    | |     / _ \   | |_) |   | |  "
echo " ___) |   | |    / ___ \  |  _ <    | |  "
echo "|____/    |_|   /_/   \_\ |_| \_\   |_|  "
echo
echo "Experimental LOOP network with 1 channel."
echo
CHANNEL_NAME="$1"
DELAY="$2"
LANGUAGE="$3"
TIMEOUT="$4"
VERBOSE="$5"
: ${CHANNEL_NAME:="senderchannel"}
: ${DELAY:="3"}
: ${LANGUAGE:="golang"}
: ${TIMEOUT:="10"}
: ${VERBOSE:="false"}
LANGUAGE=`echo "$LANGUAGE" | tr [:upper:] [:lower:]`
COUNTER=1
MAX_RETRY=5

CC_SRC_PATH="github.com/chaincode/chaincode_example02/go/"
if [ "$LANGUAGE" = "node" ]; then
	CC_SRC_PATH="/opt/gopath/src/github.com/chaincode/chaincode_example02/node/"
fi

echo "Channel name : "$CHANNEL_NAME

# import utils
. scripts/utils.sh

createChannel() {
	setGlobals 0 1

	if [ -z "$CORE_PEER_TLS_ENABLED" -o "$CORE_PEER_TLS_ENABLED" = "false" ]; then
                set -x
		peer channel create -o orderer.example.com:7050 -c $CHANNEL_NAME -f ./channel-artifacts/channel.tx >&log.txt
		res=$?
                set +x
	else
		set -x
		peer channel create -o orderer.example.com:7050 -c $CHANNEL_NAME -f ./channel-artifacts/channel.tx --tls $CORE_PEER_TLS_ENABLED --cafile $ORDERER_CA >&log.txt
		res=$?
		set +x
	fi
	cat log.txt
	verifyResult $res "Channel creation failed"
	echo "===================== Channel '$CHANNEL_NAME' created ===================== "
	echo
}

joinChannel () {
        for peer in 0 1; do
                joinChannelWithRetry $peer 1
                echo "===================== peer${peer}.loop joined channel '$CHANNEL_NAME' ===================== "
                sleep $DELAY
                echo
        done
	
	for peer in 0 1; do
		joinChannelWithRetry $peer 2
		echo "===================== peer${peer}.sender joined channel '$CHANNEL_NAME' ===================== "
		sleep $DELAY
		echo
	done
}

## Create channel
echo "Creating channel..."
createChannel

## Join all the peers to the channel
echo "Having all peers join the channel..."
joinChannel

## Set the anchor peers for each org in the channel
echo "Updating anchor peers for loop..."
updateAnchorPeers 0 1
echo "Updating anchor peers for sender..."
updateAnchorPeers 0 2

## Install chaincode on peer0.loop and peer0.sender
echo "Installing chaincode on peer0.loop..."
installChaincode 0 1
echo "Install chaincode on peer0.sender..."
installChaincode 0 2

# Instantiate chaincode on peer0.sender
echo "Instantiating chaincode on peer0.sender..."
instantiateChaincode 0 2

# Query chaincode on peer0.loop
echo "Querying chaincode on peer0.loop..."
chaincodeQuery 0 1 100

# Invoke chaincode on peer0.loop and peer0.sender
echo "Sending invoke transaction on peer0.loop peer0.sender..."
chaincodeInvoke 0 1 0 2

## Install chaincode on peer1.sender
echo "Installing chaincode on peer1.sender..."
installChaincode 1 2

# Query on chaincode on peer1.sender, check if the result is 90
echo "Querying chaincode on peer1.sender..."
chaincodeQuery 1 2 90

echo
echo "========= All GOOD, LOOP network execution completed =========== "
echo

echo
echo " _____   _   _   ____   "
echo "| ____| | \ | | |  _ \  "
echo "|  _|   |  \| | | | | | "
echo "| |___  | |\  | | |_| | "
echo "|_____| |_| \_| |____/  "
echo

exit 0
