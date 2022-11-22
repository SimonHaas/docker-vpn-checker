# docker vpn checker

The purpose of these two services is to check if traffic of a docker-container really is routed through a vpn.

The vpn-container uses 'network_mode: vpn' and the nonvpn-container does not. The non-vpn-container asks the vpn-container about its public IP and compares it to its own. If they are different one can assume that the traffic of one of them is routed through a vpn and the service returns 'safe' otherwise 'risky'.

docker run --rm -it -p 8080:80 -v ${PWD}/vpn/index.php:/var/www/html/index.php php:8.1-apache
docker run --rm -it -p 8080:80 -v ${PWD}/nonvpn/index.php:/var/www/html/index.php php:8.1-apache

docker build . -t registry.simon-haas.eu/docker-vpn-checker-vpn
docker build . -t registry.simon-haas.eu/docker-vpn-checker-nonvpn