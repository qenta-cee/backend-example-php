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

// Returns the protocol, servername, port and path for the current page.
function getBaseUrl()
{
    $baseUrl = $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT'] . $_SERVER['REQUEST_URI'];
    $baseUrl = substr($baseUrl, 0, strrpos($baseUrl, "/")) . "/";
    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") {
        $baseUrl = "https://" . $baseUrl;
    } else {
        $baseUrl = "http://" . $baseUrl;
    }
    return $baseUrl;
}

//--------------------------------------------------------------------------------//
// Returns the value for the request parameter "requestFingerprintOrder".
function getRequestFingerprintOrder($theParams)
{
    $ret = "";
    foreach ($theParams as $key => $value) {
        $ret .= "$key,";
    }
    $ret .= "requestFingerprintOrder,secret";
    return $ret;
}

//--------------------------------------------------------------------------------//
// Returns the value for the request parameter "requestFingerprint".
function getRequestFingerprint($theParams, $theSecret)
{
    $ret = "";
    foreach ($theParams as $key => $value) {
        $ret .= "$value";
    }
    return hash_hmac("sha512", $ret, $theSecret);
}


//--------------------------------------------------------------------------------//


function serverToServerRequest($url, $params) {
    $postFields = "";
    foreach ($params as $key => $value) {
        $postFields .= $key . "=" . $value . "&";
    }
    $postFields = substr($postFields, 0, strlen($postFields)-1);
    $curl = curl_init();
  	curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_PORT, 443);
    curl_setopt($curl, CURLOPT_PROTOCOLS, CURLPROTO_HTTPS);
  	curl_setopt($curl, CURLOPT_POST, true);
  	curl_setopt($curl, CURLOPT_POSTFIELDS, $postFields);
  	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
  	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  	curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
  	$response = curl_exec($curl);
  	curl_close($curl);
    return $response;
}

//--------------------------------------------------------------------------------//

function printRequestParameters($params) {
    echo '<p>The request has been initialized with the following values:</p>';
    echo '<table border="1" bordercolor="lightgray" cellpadding="10" cellspacing="0">';
    foreach ($params as $key => $value) {
        echo '  <tr><td align="right"><b>' . $key . '</b></td><td>' . $value . '</td></tr>';
    }
    echo '</table>';
}

//--------------------------------------------------------------------------------//

function printResponseParameters($response) {
    echo "<p>The QPay Checkout Platform returned the following values after executing the command:</p>";
    echo '<table border="1" bordercolor="lightgray" cellpadding="10" cellspacing="0">';
    foreach (explode('&', $response) as $keyvalue) {
        $param = explode('=', $keyvalue);
        if (sizeof($param) == 2) {
            $key = urldecode($param[0]);
            $value = urldecode($param[1]);
            echo "<tr><td align='right'><b>" . $key . "</b></td><td>" . $value . "</td></tr>\n";
        }
    }
    echo '</table>';
}

//--------------------------------------------------------------------------------//

?>
