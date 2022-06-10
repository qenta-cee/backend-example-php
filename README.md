# QENTA Backend Operations Example

[![License](https://img.shields.io/badge/license-GPLv2-blue.svg)](https://raw.githubusercontent.com/qenta-cee/qcp-back-end-example-php/master/LICENSE)
[![PHP v7.4](https://img.shields.io/badge/php-v7.4-green.svg)](http://www.php.net)

This example demonstrates the usage of the backend operations and provides a basis for integration into PHP-based systems.

Our [Online Guides](https://guides.qenta.com/ "Online Guides") provide an in depth description of the [backend operations](https://guides.qenta.com/backend-operations/ "backend operations") for Qenta.

## Installation

Copy the example code to a web server which supports PHP. Ensure that the web server is accessible from the Internet via port 80 (for http communication) or port 443 (for https communication). The web server needs a fully qualified domain name for receiving data from Qenta e.g. payment confirmations.

### Docker

Fill in your data in `.env` and run `docker-compose up`. You can then access the webserver at `http://localhost:8000`

To receive a payment confirmation you need a FQDN. We recommend to use [ngrok](https://ngrok.com).

Run `ngrok http http://localhost:8000` to get an externally reachable URL.

## Support and additional information

If you have any questions or troubles to get this example up and running in your web server environment, please do not hesitate to contact our [support teams](https://guides.qenta.com/support "support teams").
