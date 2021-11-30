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

require_once("includes/config.inc.php");
?>
<html>
  <head>
    <title>QPay Checkout Toolkit light</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
  </head>
  <body>
    <h1>QPay Checkout Toolkit light</h1>
    <p>This is a very simple example of the QPay Checkout Toolkit light for demonstration purposes only.</p>
    <!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
    <button onclick="toggleConfigData()">Toggle Configuration Data</button>
    <table id="config-data" border="1" bordercolor="lightgray" cellpadding="10" cellspacing="0" >
      <tr>
          <th colspan="2" align="left">Configuration</th>
      </tr>
      <tr>
        <td align="right">Customer id:</td>
        <td><?= $customerId ?></td>
      </tr>
      <tr>
        <td align="right">Shop id:</td>
        <td><?= $shopId ?></td>
      </tr>
      <tr>
        <td align="right">Toolkit password:</td>
        <td><?= $toolkitPassword ?></td>
      </tr>
      <tr>
        <td align="right">Secret:</td>
        <td><?= $secret ?></td>
      </tr>
      <tr>
        <td align="right">Endpoint:</td>
        <td><?= $URL_QENTA_CHECKOUT_TOOLKIT_LIGHT ?></td>
      </tr>
    </table>
    <form action="command.php" method="post"">
      <table border="1" bordercolor="lightgray" cellpadding="10" cellspacing="0">
        <tr>
          <th colspan="2" align="left">Command: approveReversal</th>
          <input type="hidden" name="command" value="approveReversal">
        </tr>
        <tr>
          <td align="right">Order number:</td>
          <td><input type="text" name="orderNumber" size="20" value="23473341"></td>
        </tr>
        <tr>
          <td colspan="2" align="right"><input type="submit" value="approveReversal"></td>
        </tr>
      </table>
    </form>
    <!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
    <form action="command.php" method="post"">
      <table border="1" bordercolor="lightgray" cellpadding="10" cellspacing="0">
        <tr>
          <th colspan="2" align="left">Command: deposit</th>
          <input type="hidden" name="command" value="deposit">
        </tr>
        <tr>
          <td align="right">Order number:</td>
          <td><input type="text" name="orderNumber" size="20" value="23473341"></td>
        </tr>
        <tr>
          <td align="right">Amount:</td>
          <td><input type="text" name="amount" size="20" value="1"></td>
        </tr>
        <tr>
          <td align="right">Currency:</td>
          <td><input type="text" name="currency" size="20" value="EUR"></td>
        </tr>
        <tr>
          <td align="right">Basket items:</td>
          <td><input type="text" name="basketItems" size="20" value="1"></td>
        </tr>
        <tr>
          <td align="right">Basket item 1 article number:</td>
          <td><input type="text" name="basketItem1ArticleNumber" size="20" value="42"></td>
        </tr>
        <tr>
          <td align="right">Basket item 1 quantity:</td>
          <td><input type="text" name="basketItem1Quantity" size="20" value="1"></td>
        </tr>
        <tr>
          <td align="right">Basket item 1 description:</td>
          <td><input type="text" name="basketItem1Description" size="20" value="TestBasketItem1"></td>
        </tr>
        <tr>
          <td align="right">Basket item 1 name:</td>
          <td><input type="text" name="basketItem1Name" size="20" value="BasketItem1"></td>
        </tr>
        <tr>
          <td align="right">Basket item 1 unit gross amount:</td>
          <td><input type="text" name="basketItem1UnitGrossAmount" size="20" value="0.8"></td>
        </tr>
        <tr>
          <td align="right">Basket item 1 unit net amount:</td>
          <td><input type="text" name="basketItem1UnitNetAmount" size="20" value="0.64"></td>
        </tr>
        <tr>
          <td align="right">Basket item 1 unit tax amount:</td>
          <td><input type="text" name="basketItem1UnitTaxAmount" size="20" value="0.16"></td>
        </tr>
        <tr>
          <td align="right">Basket item 1 unit tax rate:</td>
          <td><input type="text" name="basketItem1UnitTaxRate" size="20" value="20"></td>
        </tr>
        <tr>
          <td colspan="2" align="right"><input type="submit" value="deposit"></td>
        </tr>
      </table>
    </form>
    <!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
    <form action="command.php" method="post"">
      <table border="1" bordercolor="lightgray" cellpadding="10" cellspacing="0">
        <tr>
          <th colspan="2" align="left">Command: depositReversal</th>
          <input type="hidden" name="command" value="depositReversal">
        </tr>
        <tr>
          <td align="right">Order number:</td>
          <td><input type="text" name="orderNumber" size="20" value="23473341"></td>
        </tr>
        <tr>
          <td align="right">Payment number:</td>
          <td><input type="text" name="paymentNumber" size="20" value="23473341"></td>
        </tr>
        <tr>
          <td colspan="2" align="right"><input type="submit" value="depositReversal"></td>
        </tr>
      </table>
    </form>
    <!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
    <form action="command.php" method="post"">
      <table border="1" bordercolor="lightgray" cellpadding="10" cellspacing="0">
        <tr>
          <th colspan="2" align="left">Command: getOrderDetails</th>
          <input type="hidden" name="command" value="getOrderDetails">
        </tr>
        <tr>
          <td align="right">Order number:</td>
          <td><input type="text" name="orderNumber" size="20" value="23473341"></td>
        </tr>
        <tr>
          <td colspan="2" align="right"><input type="submit" value="getOrderDetails"></td>
        </tr>
      </table>
    </form>
    <!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
    <form action="command.php" method="post"">
      <table border="1" bordercolor="lightgray" cellpadding="10" cellspacing="0">
        <tr>
          <th colspan="2" align="left">Command: recurPayment</th>
          <input type="hidden" name="command" value="recurPayment">
        </tr>
        <tr>
          <td align="right">Source order number:</td>
          <td><input type="text" name="sourceOrderNumber" size="20" value="23473341"></td>
        </tr>
        <tr>
          <td align="right">Amount:</td>
          <td><input type="text" name="amount" size="20" value="1"></td>
        </tr>
        <tr>
          <td align="right">Currency:</td>
          <td><input type="text" name="currency" size="20" value="EUR"></td>
        </tr>
        <tr>
          <td align="right">Order description:</td>
          <td><input type="text" name="orderDescription" size="20" value="a description of the order"></td>
        </tr>
        <tr>
          <td colspan="2" align="right"><input type="submit" value="recurPayment"></td>
        </tr>
      </table>
    </form>
    <!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
    <form action="command.php" method="post"">
      <table border="1" bordercolor="lightgray" cellpadding="10" cellspacing="0">
        <tr>
          <th colspan="2" align="left">Command: refund</th>
          <input type="hidden" name="command" value="refund">
        </tr>
        <tr>
          <td align="right">Order number:</td>
          <td><input type="text" name="orderNumber" size="20" value="23473341"></td>
        </tr>
        <tr>
          <td align="right">Amount:</td>
          <td><input type="text" name="amount" size="20" value="1"></td>
        </tr>
        <tr>
          <td align="right">Currency:</td>
          <td><input type="text" name="currency" size="20" value="EUR"></td>
        </tr>
        <tr>
          <td align="right">Basket items:</td>
          <td><input type="text" name="basketItems" size="20" value="1"></td>
        </tr>
        <tr>
          <td align="right">Basket item 1 article number:</td>
          <td><input type="text" name="basketItem1ArticleNumber" size="20" value="42"></td>
        </tr>
        <tr>
          <td align="right">Basket item 1 quantity:</td>
          <td><input type="text" name="basketItem1Quantity" size="20" value="1"></td>
        </tr>
        <tr>
          <td align="right">Basket item 1 description:</td>
          <td><input type="text" name="basketItem1Description" size="20" value="TestBasketItem1"></td>
        </tr>
        <tr>
          <td align="right">Basket item 1 name:</td>
          <td><input type="text" name="basketItem1Name" size="20" value="BasketItem1"></td>
        </tr>
        <tr>
          <td align="right">Basket item 1 unit gross amount:</td>
          <td><input type="text" name="basketItem1UnitGrossAmount" size="20" value="0.8"></td>
        </tr>
        <tr>
          <td align="right">Basket item 1 unit net amount:</td>
          <td><input type="text" name="basketItem1UnitNetAmount" size="20" value="0.64"></td>
        </tr>
        <tr>
          <td align="right">Basket item 1 unit tax amount:</td>
          <td><input type="text" name="basketItem1UnitTaxAmount" size="20" value="0.16"></td>
        </tr>
        <tr>
          <td align="right">Basket item 1 unit tax rate:</td>
          <td><input type="text" name="basketItem1UnitTaxRate" size="20" value="20"></td>
        </tr>
        <tr>
          <td colspan="2" align="right"><input type="submit" value="refund"></td>
        </tr>
      </table>
    </form>
    <!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
    <form action="command.php" method="post"">
      <table border="1" bordercolor="lightgray" cellpadding="10" cellspacing="0">
        <tr>
          <th colspan="2" align="left">Command: refundReversal</th>
          <input type="hidden" name="command" value="refundReversal">
        </tr>
        <tr>
          <td align="right">Order number:</td>
          <td><input type="text" name="orderNumber" size="20" value="23473341"></td>
        </tr>
        <tr>
          <td align="right">Credit number:</td>
          <td><input type="text" name="creditNumber" size="20" value="7427819"></td>
        </tr>
        <tr>
          <td colspan="2" align="right"><input type="submit" value="refundReversal"></td>
        </tr>
      </table>
    </form>
    <!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
    <form action="command.php" method="post"">
      <table border="1" bordercolor="lightgray" cellpadding="10" cellspacing="0">
        <tr>
          <th colspan="2" align="left">Command: transferFund with type SKRILLWALLET</th>
          <input type="hidden" name="command" value="transferFund">
        </tr>
        <tr>
          <td align="right">Amount:</td>
          <td><input type="text" name="amount" size="20" value="1"></td>
        </tr>
        <tr>
          <td align="right">Currency:</td>
          <td><input type="text" name="currency" size="20" value="EUR"></td>
        </tr>
        <tr>
          <td align="right">Consumer email:</td>
          <td><input type="text" name="consumerEmail" size="20" value="consumer@email.com"></td>
        </tr>
        <tr>
          <td align="right">Customer statement:</td>
          <td><input type="text" name="customerStatement" size="20" value="the customers statement..."></td>
        </tr>
        <tr>
          <td align="right">Fund transfer type:</td>
          <td><input type="text" name="fundTransferType" size="20" value="SKRILLWALLET"></td>
        </tr>
        <tr>
          <td align="right">Order description:</td>
          <td><input type="text" name="orderDescription" size="20" value="a description of the order"></td>
        </tr>
        <tr>
          <td colspan="2" align="right"><input type="submit" value="transferFund"></td>
        </tr>
      </table>
    </form>
    <!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
    <form action="command.php" method="post"">
      <table border="1" bordercolor="lightgray" cellpadding="10" cellspacing="0">
        <tr>
          <th colspan="2" align="left">Command: transferFund with type EXISTINGORDER</th>
          <input type="hidden" name="command" value="transferFund">
        </tr>
        <tr>
          <td align="right">Amount:</td>
          <td><input type="text" name="amount" size="20" value="1"></td>
        </tr>
        <tr>
          <td align="right">Currency:</td>
          <td><input type="text" name="currency" size="20" value="EUR"></td>
        </tr>
        <tr>
          <td align="right">Fund transfer type:</td>
          <td><input type="text" name="fundTransferType" size="20" value="EXISTINGORDER"></td>
        </tr>
        <tr>
          <td align="right">Order description:</td>
          <td><input type="text" name="orderDescription" size="20" value="a description of the order"></td>
        </tr>
        <tr>
          <td align="right">Source order number:</td>
          <td><input type="text" name="sourceOrderNumber" size="20" value="23473341"></td>
        </tr>
        <tr>
          <td colspan="2" align="right"><input type="submit" value="transferFund"></td>
        </tr>
      </table>
    </form>
    <!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
  </body>
  <script>
    function toggleConfigData(){
      var configTable = document.getElementById('config-data');
      if(window.getComputedStyle(configTable).display == 'table'){
        configTable.style.display = 'none';
      }else{
        configTable.style.display = 'table';
      }
    }
  </script>
</html>
