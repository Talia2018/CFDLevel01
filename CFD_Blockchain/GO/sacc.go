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

	err := stub.PutState(args[0], []byte(args[1]))

	if err != nil {
		return shim.Error("Failed to create YorkAsset")
	}

	return shim.Success(nil)
}

func(t *YorkAsset) Invoke(stub shim.ChaincodeStubInterface) peer.Response {
	fn, args := stub.GetFunctionAndParameters()

	var result string
	var err error
	if fn == "getState" {
		result, err = getState(stub, args)

	} else if fn == "updateState" {
		result, err = updateState(stub, args)

	} else {
		return shim.Error("Invalid smart contract name")
	}


	if err != nil { return shim.Error(err.Error()) }
	return shim.Success([]byte(result))
}

func getState(stub shim.ChaincodeStubInterface, args []string) (string, error) {
	if len(args) != 1 {
		return "", fmt.Errorf("Incorrect number of arguments. Expecting a key")
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
		return "", fmt.Errorf("Incorrect number of arguments. Expecting a key and a value")
	}

	err := stub.PutState(args[0], []byte(args[1]))

	if err != nil {
		return "", fmt.Errorf("Failed to update ledger state")
	}

	return args[1], nil
}

func main() {
	err := shim.Start(new(YorkAsset))
	if err != nil {
		fmt.Printf("Error starting chaincode for YorkAsset")
	}
}
