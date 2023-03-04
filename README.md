# docker vpn checker

The purpose of this projects is to check if one container is accessing the internet via a vpn.

The vpn-container uses 'network_mode: vpn' and the nonvpn-container does not. The non-vpn-container asks the vpn-container about its public IP and compares it to its own. If they are different one can assume that the traffic of one of them is routed through a vpn and the service returns 'safe' otherwise 'risky'.

The example inside docker-compose.yml uses [Nordvpn](https://nordvpn.com).
``` bash
curl localhost:8082/index.php/check?peer=vpn
```
should return 'safe'.
