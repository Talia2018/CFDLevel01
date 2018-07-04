package main

import (
	"bytes"
	"encoding/json"
	"fmt"
	"strconv"
	"strings"
	"time"

	"github.com/hyperledger/fabric/core/chaincode/shim"
	pb "github.com/hyperledger/fabric/protos/peer"
)

type LoopAsset struct {
}

type LoopOrder struct {
	Shipper  string `json:"shipper"`
	OrderDate string `json:"orderdate"`
	Status   string `json:"status"`
	Location string `json:"location"`
	LastUpdate   string `json:"lastupdate"`
	Receiver string `json:"receiver"`
}



func main() {
	err := shim.Start(new(LoopAsset))
	if err != nil {
		fmt.Printf("Error starting Simple chaincode: %s", err)
	}
}


func (t *LoopAsset) Invoke(stub shim.ChaincodeStubInterface) pb.Response {
	function, args := stub.GetFunctionAndParameters()
	fmt.Println("invoke is running " + function)

	// Handle different functions
	if function == "initOrder" { //create a new Order
		return t.initOrder(stub, args)
	} else if function == "UpdateOrderStatus" { //change owner of a specific Order
		return t.transferOrder(stub, args)
	} else if function == "updateOrderLocation" { //transfer all Orders of a certain color
		return t.updateOrderLocation(stub, args)
	} else if function == "getOrderByID" { //read a Order
		return t.getOrderByID(stub, args)
	} else if function == "getOrdersByShipper" { //find Orders for owner X using rich query
		return t.getOrdersByShipper(stub, args)
	} else if function == "getOrdersByLocation" { //find Orders for owner X using rich query
		return t.getOrdersByLocation(stub, args)
	} else if function == "getAllActiveOrders" { //find Orders based on an ad hoc rich query
		return t.getAllActiveOrders(stub, args)
	} else if function == "getOrderHistory" { //get history of values for a Order
		return t.getOrderHistory"(stub, args)
	} else if function == "getOrdersByReceiver" { //get Orders based on range query
		return t.getOrdersByReceive(stub, args)
	} 

	fmt.Println("invoke did not find func: " + function) //error
	return shim.Error("Received unknown function invocation")
}

func trimLeftChars(s string, n int) string {
    m := 0
    for i := range s {
        if m >= n {
            return s[i:]
        }
        m++
    }
    return s[:0]
}

func askForConfirmation() bool { 
	var response string 
	_, err := fmt.Scanln(&response) 
 	if err != nil { 
		log.Fatal(err) 
	} 
	
	if strings.ToLower(trimLeftChars(response)[0]) =="y" {
	return true;
	}
	
	return false;
}


//func getOrderNumber() string {
//   m := 0
//    for i := range s {
//       if m >= n {
//            return s[i:]
//        }
//        m++
//    }
//    return s[:0]
//}


func (t *LoopAsset) initOrder(stub shim.ChaincodeStubInterface, args []string) pb.Response {
	var err error

	//   0       1       2     3	4
	// "shipper", orderdate, "status", "location", "lastupdate", "receiver"
	// current time := time.Now().UTC()
	//order id: "Order"+time.Now().UTC().Format(time.RFC850)).String()
	

	if len(args) != 6 {
		return shim.Error("Incorrect number of arguments. Expecting 4")
	}
	fmt.Println(" start initializing Order...")
	

	// ==== Check if Order already exists ====
	//OrderAsBytes, err := stub.GetState(shipper)
	//if err != nil {
	//	return shim.Error("Failed to get Order: " + err.Error())
	//} else if OrderAsBytes != nil {
	//	fmt.Println("This Order already exists: " + shipper)
	//	return shim.Error("This Order already exists: " + shipper)
	//}
	// if (askForConfirmation() 
	
	
	timestamp := time.Now().UTC().Format(time.RFC850)).String()
	order := {Shipper:"shipper01", OrderDate: timestamp, Status: "ordered", Location: "ShipperLocation", LastUpdate: timestamp, Receiver: "Recever01"}	
	orderID := "Order"+ timestamp
	
	orderAsBytes, err := json.Marshal(order)
	if err != nil {
		return shim.Error(err.Error())
	}
	err = stub.PutState(orderID, orderAsBytes)
	if err != nil {
		return shim.Error(err.Error())
	}

	fmt.Println("- end init Order")
	return shim.Success(nil)

}

// ==========================
// getOrderByID
// ===========================
func (t *LoopAsset) getOrderByID(stub shim.ChaincodeStubInterface, args []string) pb.Response {
	var name, jsonResp string
	var err error

	if len(args) != 1 {
		return shim.Error("Incorrect number of arguments. Expecting name of the OrderID to query")
	}

	oid = args[0]
	valAsbytes, err := stub.GetState(oid) //get the Order from chaincode state
	if err != nil {
		jsonResp = "{\"Error\":\"Failed to get state for " + oid+ "\"}"
		return shim.Error(jsonResp)
	} else if valAsbytes == nil {
		jsonResp = "{\"Error\":\"Order does not exist: " + oid + "\"}"
		return shim.Error(jsonResp)
	}
	return shim.Success(valAsbytes)
}

// ==========================
// getOrderByShipper
// ===========================
func (t *LoopAsset) getOrderByShipper(stub shim.ChaincodeStubInterface, args []string) pb.Response {
	var name, jsonResp string
	var err error

	if len(args) != 1 {
		return shim.Error("Incorrect number of arguments. Expecting name of the OrderID to query")
	}

	fmt.Println("start looking for all orders created by shoipper:" , shipper)
		
	shipper := strings.ToLower(args[0])
	
	queryString := fmt.Sprintf("{\"selector\":{\"docType\":\"LoopOrder\",\"shipper\":\"%s\"}}", shipper)

	queryResults, err := stub.GetQueryResult(queryString)
	if err != nil {
		return shim.Error(err.Error())
	}
	
	defer resultsIterator.Close()
	
	//return shim.Success(queryResults)
	
	// Query the shipper~name index by shipper
	// This will execute a key range query on all keys starting with 'shipper'
	//queryResults, err := stub.GetStateByPartialCompositeKey("shipper~name", []string{shipper})
	//if err != nil {
	//	return shim.Error(err.Error())
	//	}
	//defer queryResults.Close()

	var buffer bytes.Buffer
	buffer.WriteString("[")

	bArrayMemberAlreadyWritten := false
	for resultsIterator.HasNext() {
		queryResponse, err := resultsIterator.Next()
		if err != nil {
			return shim.Error(err.Error())
		}
		// Add a comma before array members, suppress it for the first array member
		if bArrayMemberAlreadyWritten == true {
			buffer.WriteString(",")
		}
		buffer.WriteString("{\"Key\":")
		buffer.WriteString("\"")
		buffer.WriteString(queryResponse.Key)
		buffer.WriteString("\"")

		buffer.WriteString(", \"Record\":")
		// Record is a JSON object, so we write as-is
		buffer.WriteString(string(queryResponse.Value))
		buffer.WriteString("}")
		bArrayMemberAlreadyWritten = true
	}
	buffer.WriteString("]")

	fmt.Printf("getOrdersByShipper queryResult:\n%s\n", buffer.String())
	return shim.Success(buffer.Bytes())
}



// ==========================
// getOrderHistory
// ===========================
func (t *LoopAsset) getOrderHistory(stub shim.ChaincodeStubInterface, args []string) pb.Response {

	if len(args) < 1 {
		return shim.Error("Incorrect number of arguments. Expecting 1")
	}

	oid := args[0]

	fmt.Printf("starting getOrderHistory: %s\n", oid)

	resultsIterator, err := stub.GetHistoryForKey(oid)
	if err != nil {
		return shim.Error(err.Error())
	}
	defer resultsIterator.Close()

	// buffer is a JSON array containing historic values for the marble
	var buffer bytes.Buffer
	buffer.WriteString("[")

	bArrayMemberAlreadyWritten := false
	for resultsIterator.HasNext() {
		response, err := resultsIterator.Next()
		if err != nil {
			return shim.Error(err.Error())
		}
		// Add a comma before array members, suppress it for the first array member
		if bArrayMemberAlreadyWritten == true {
			buffer.WriteString(",")
		}
		buffer.WriteString("{\"TxId\":")
		buffer.WriteString("\"")
		buffer.WriteString(response.TxId)
		buffer.WriteString("\"")

		buffer.WriteString(", \"Value\":")
		// if it was a delete operation on given key, then we need to set the
		//corresponding value null. Else, we will write the response.Value
		//as-is (as the Value itself a JSON marble)
		if response.IsDelete {
			buffer.WriteString("null")
		} else {
			buffer.WriteString(string(response.Value))
		}

		buffer.WriteString(", \"Timestamp\":")
		buffer.WriteString("\"")
		buffer.WriteString(time.Unix(response.Timestamp.Seconds, int64(response.Timestamp.Nanos)).String())
		buffer.WriteString("\"")

		buffer.WriteString(", \"IsDelete\":")
		buffer.WriteString("\"")
		buffer.WriteString(strconv.FormatBool(response.IsDelete))
		buffer.WriteString("\"")

		buffer.WriteString("}")
		bArrayMemberAlreadyWritten = true
	}
	buffer.WriteString("]")

	fmt.Printf("getOrderHistory returning:\n%s\n", buffer.String())

	return shim.Success(buffer.Bytes())
}

