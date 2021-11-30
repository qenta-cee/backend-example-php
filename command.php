<?php
/**
 * QPay Checkout Toolkit Light
 * - Terms of use can be found under
 * https://guides.qenta.com/prerequisites
 * - License can be found under:
 * https://github.com/qenta-cee/qcp-backend-example-php/blob/master/LICENSE.
 * 
 * THIS CODE AND INFORMATION ARE PROVIDED "AS IS" WITHOUT WARRANTY OF ANY
 * KIND, EITHER EXPRESSED OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND/OR FITNESS FOR A
 * PARTICULAR PURPOSE.
 * 
 * Please read the integration documentation before modifying this file!             
 */

  // loads the merchant specific parameters from the config file
	require_once("includes/config.inc.php");

  // loads the required PHP functions
  require_once("includes/functions.inc.php");

  // the command to execute received from the form
  $command = $_POST["command"];

  // the order number received from the form
  $orderNumber = isset($_POST["orderNumber"]) ? $_POST["orderNumber"] : "";

  // the source order number received from the form
  $sourceOrderNumber = isset($_POST["sourceOrderNumber"]) ? $_POST["sourceOrderNumber"] : "";

  // the payment number received from the form
  $paymentNumber = isset($_POST["paymentNumber"]) ? $_POST["paymentNumber"] : "";

  // the credit number received from the form
  $creditNumber = isset($_POST["creditNumber"]) ? $_POST["creditNumber"] : "";

  // the order description received from the form
  $orderDescription = isset($_POST["orderDescription"]) ? $_POST["orderDescription"] : "";

  // the amount received from the form
  $amount = isset($_POST["amount"]) ? $_POST["amount"] : "";

  // the curency of the amount received from the form
  $currency = isset($_POST["currency"]) ? $_POST["currency"] : "";

  // the fund transfer type
  $customerStatement  = isset($_POST["customerStatement"]) ? $_POST["customerStatement"] : "";

  // the fund transfer type
  $fundTransferType  = isset($_POST["fundTransferType"]) ? $_POST["fundTransferType"] : "";

  // the email-address of the consumer
  $consumerEmail = isset($_POST["consumerEmail"]) ? $_POST["consumerEmail"] : "";

  // the basket item count
  $basketItems = isset($_POST["basketItems"]) ? $_POST["basketItems"] : "";

  // the article number of basket item 1
  $basketItem1ArticleNumber = isset($_POST["basketItem1ArticleNumber"]) ? $_POST["basketItem1ArticleNumber"] : "";

  // the quantity of basket item 1
  $basketItem1Quantity = isset($_POST["basketItem1Quantity"]) ? $_POST["basketItem1Quantity"] : "";

  // the description of basket item 1
  $basketItem1Description = isset($_POST["basketItem1Description"]) ? $_POST["basketItem1Description"] : "";

  // the name of basket item 1
  $basketItem1Name = isset($_POST["basketItem1Name"]) ? $_POST["basketItem1Name"] : "";

  // the unit gross amount of basket item 1
  $basketItem1UnitGrossAmount = isset($_POST["basketItem1UnitGrossAmount"]) ? $_POST["basketItem1UnitGrossAmount"] : "";

  // the unit net amount of basket item 1
  $basketItem1UnitNetAmount = isset($_POST["basketItem1UnitNetAmount"]) ? $_POST["basketItem1UnitNetAmount"] : "";

  // the unit tax amount of basket item 1
  $basketItem1UnitTaxAmount = isset($_POST["basketItem1UnitTaxAmount"]) ? $_POST["basketItem1UnitTaxAmount"] : "";

  // the unit tax rate of basket item 1
  $basketItem1UnitTaxRate = isset($_POST["basketItem1UnitTaxRate"]) ? $_POST["basketItem1UnitTaxRate"] : "";

  // computes the fingerprint based on the request parameters and depending on the command
  $requestFingerprint = "";
  $requestParameters = "";
  
  if ($command == "approveReversal") {
    $requestParameters = array ( $customerId, $shopId, $toolkitPassword,
                                  $secret, $command,
                                  $language, $orderNumber );
  }
  if ($command == "deposit") {
    $requestParameters = array ( $customerId, $shopId, $toolkitPassword,
                                  $secret, $command,
                                  $language, $orderNumber,
                                  $amount, $currency,
                                  $basketItems, $basketItem1ArticleNumber,
                                  $basketItem1Quantity, $basketItem1Description,
                                  $basketItem1Name, $basketItem1UnitGrossAmount,
                                  $basketItem1UnitNetAmount, $basketItem1UnitTaxAmount,
                                  $basketItem1UnitTaxRate);
  }
  if ($command == "depositReversal") {
    $requestParameters = array ($customerId, $shopId, $toolkitPassword,
                                 $secret, $command,
                                 $language, $orderNumber,
                                 $paymentNumber);
  }
  if ($command == "getOrderDetails") {
    $requestParameters = array ($customerId, $shopId, $toolkitPassword,
                                 $secret, $command,
                                 $language, $orderNumber);
  }
  if ($command == "recurPayment") {
    $requestParameters = array ($customerId, $shopId, $toolkitPassword,
                                 $secret, $command,
                                 $language, $orderNumber,
                                 $sourceOrderNumber, $orderDescription,
                                 $amount, $currency);
  }
  if ($command == "refund") {
    $requestParameters = array ($customerId, $shopId, $toolkitPassword,
                                 $secret, $command,
                                 $language, $orderNumber,
                                 $amount, $currency,
                                 $basketItems, $basketItem1ArticleNumber,
                                 $basketItem1Quantity, $basketItem1Description,
                                 $basketItem1Name, $basketItem1UnitGrossAmount,
                                 $basketItem1UnitNetAmount, $basketItem1UnitTaxAmount,
                                 $basketItem1UnitTaxRate);
  }
  if ($command == "refundReversal") {
    $requestParameters = array ($customerId, $shopId, $toolkitPassword,
                                 $secret, $command,
                                 $language, $orderNumber,
                                 $creditNumber);
  }
  if ($command == "transferFund") {
    if ($fundTransferType == "SKRILLWALLET") {
    //  customerId, (shopId), toolkitPassword, secret, command, language, (orderNumber),
    // (creditNumber), orderDescription, amount, currency, (orderReference), customerStatement, fundTransferType and consumerEmail
      $requestParameters = array ($customerId, $shopId, $toolkitPassword,
                                   $secret, $command,
                                   $language,
                                   $orderDescription,
                                   $amount, $currency,
                                   $customerStatement,
                                   $fundTransferType,
                                   $consumerEmail);
    }
    if ($fundTransferType == "EXISTINGORDER") {
      $requestParameters = array ($customerId, $shopId, $toolkitPassword,
                                   $secret, $command,
                                   $language, 
                                   $orderDescription,
                                   $amount, $currency,
                                   $customerStatement,
                                   $fundTransferType,
                                   $sourceOrderNumber);
    }
  }
  $requestFingerprint = getRequestFingerprint($requestParameters , $secret );

  
  // sets all request parameters as associative array
  // which are required for all commands
  $request = array(
               "customerId" => $customerId,
               "shopId" => $shopId,
               "toolkitPassword" => $toolkitPassword,
               "command" => $command,
               "language" => $language,
               "requestFingerprint" => $requestFingerprint
             );

  // sets all request parameters which are depending on the selected command
  if ($orderNumber != "") $request = array_merge($request, array("orderNumber" => $orderNumber));
  if ($sourceOrderNumber != "") $request = array_merge($request, array("sourceOrderNumber" => $sourceOrderNumber));
  if ($paymentNumber != "") $request = array_merge($request, array("paymentNumber" => $paymentNumber));
  if ($creditNumber != "") $request = array_merge($request, array("creditNumber" => $creditNumber));
  if ($orderDescription != "") $request = array_merge($request, array("orderDescription" => $orderDescription));
  if ($amount != "") $request = array_merge($request, array("amount" => $amount));
  if ($currency != "") $request = array_merge($request, array("currency" => $currency));
  if ($customerStatement != "") $request = array_merge($request, array("customerStatement" => $customerStatement));
  if ($fundTransferType != "") $request = array_merge($request, array("fundTransferType" => $fundTransferType));
  if ($consumerEmail != "") $request = array_merge($request, array("consumerEmail" => $consumerEmail));
  if ($basketItems != "") $request = array_merge($request, array("basketItems" => $basketItems));
  if ($basketItem1ArticleNumber != "") $request = array_merge($request, array("basketItem1ArticleNumber" => $basketItem1ArticleNumber));
  if ($basketItem1Quantity != "") $request = array_merge($request, array("basketItem1Quantity" => $basketItem1Quantity));
  if ($basketItem1Name != "") $request = array_merge($request, array("basketItem1Name" => $basketItem1Name));
  if ($basketItem1Description != "") $request = array_merge($request, array("basketItem1Description" => $basketItem1Description));
  if ($basketItem1UnitGrossAmount != "") $request = array_merge($request, array("basketItem1UnitGrossAmount" => $basketItem1UnitGrossAmount));
  if ($basketItem1UnitNetAmount != "") $request = array_merge($request, array("basketItem1UnitNetAmount" => $basketItem1UnitNetAmount));
  if ($basketItem1UnitTaxAmount != "") $request = array_merge($request, array("basketItem1UnitTaxAmount" => $basketItem1UnitTaxAmount));
  if ($basketItem1UnitTaxRate != "") $request = array_merge($request, array("basketItem1UnitTaxRate" => $basketItem1UnitTaxRate));

  $response = serverToServerRequest($URL_QENTA_CHECKOUT_TOOLKIT_LIGHT, $request);
?>
<html>
  <head>
    <title>QPay Checkout Toolkit light</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
  </head>
  <body>
    <h1>QPay Checkout Toolkit light</h1>
    <p>This is a very simple example of the QPay Checkout Toolkit light for demonstration purposes only.</p>
   <?php
      printRequestParameters($request);
      printResponseParameters($response);
    ?>
    <p><center><a href="index.php">Back to list of available commands</a></center></p>
  </body>
</html>
