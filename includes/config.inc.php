<?php
  //--------------------------------------------------------------------------------//
  //                                                                                //
  // Wirecard Checkout Toolkit light                                                //
  //                                                                                //
  // Copyright (c) 2013                                                             //
  // Wirecard Central Eastern Europe GmbH                                           //
  // www.wirecard.at                                                                //
  //                                                                                //
  // THIS CODE AND INFORMATION ARE PROVIDED "AS IS" WITHOUT WARRANTY OF ANY         //
  // KIND, EITHER EXPRESSED OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE            //
  // IMPLIED WARRANTIES OF MERCHANTABILITY AND/OR FITNESS FOR A                     //
  // PARTICULAR PURPOSE.                                                            //
  //                                                                                //
  //--------------------------------------------------------------------------------//
  // THIS EXAMPLE IS FOR DEMONSTRATION PURPOSES ONLY!                               //
  //--------------------------------------------------------------------------------//
  // Please read the integration documentation before modifying this file.          //
  //--------------------------------------------------------------------------------//

  // customer id
  // e.g. D200001 for demonstration purposes only
  // for production mode, please use your personal customer id obtained by Wirecard
  $customerId = "D200001";

  // password for accessing Toolkit light
  $toolkitPassword = "jcv45z";

  // secret
  // pre-shared key, used to sign the transmitted data
  // e.g. B8AKTPWBRMNBV455FG6M2DANE99WU2 for testing purposes
  // for production mode, please use your personal secret obtained by Wirecard
  $secret = "B8AKTPWBRMNBV455FG6M2DANE99WU2";

  // shortcut for selected language for all texts returned by a command
  $language = "en";

	//--------------------------------------------------------------------------------//

  // URLs for accessing  Wirecard Checkout Toolkit light
  $URL_WIRECARD_CHECKOUT_TOOLKIT_LIGHT = "https://checkout.wirecard.com/page/toolkit.php";

	//--------------------------------------------------------------------------------//

?>
