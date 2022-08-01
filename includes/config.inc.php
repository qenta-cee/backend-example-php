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

  // customer id
  // e.g. D200001 for demonstration purposes only
  // for production mode, please use your personal customer id obtained by Qenta
  $customerId = getenv('QCP_BACKEND_CUSTOMER_ID') ?: "D200001";
  $shopId = getenv('QCP_BACKEND_SHOP_ID') ?: '';

  // password for accessing Toolkit light
  $toolkitPassword = getenv('QCP_BACKEND_CUSTOMER_PASSWORD') ?: "jcv45z";

  // secret
  // pre-shared key, used to sign the transmitted data
  // e.g. B8AKTPWBRMNBV455FG6M2DANE99WU2 for testing purposes
  // for production mode, please use your personal secret obtained by Qenta
  $secret = getenv('QCP_BACKEND_CUSTOMER_SECRET') ?: "B8AKTPWBRMNBV455FG6M2DANE99WU2";

  // shortcut for selected language for all texts returned by a command
  $language = "en";

    //--------------------------------------------------------------------------------//

  // URLs for accessing  QPay Checkout Toolkit light
  $URL_QENTA_CHECKOUT_TOOLKIT_LIGHT = getenv('QCP_BACKEND_ENDPOINT') ?: "https://api.qenta.com/page/toolkit.php";

    //--------------------------------------------------------------------------------//
