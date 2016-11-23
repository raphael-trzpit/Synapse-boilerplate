# Synapse boilerplate

## Install

To start :
`make vm-up`

Add this host :
`127.0.0.1    site.local`
(if you use docker throw virtualbox replace 127.0.0.1 with your virtualbox ip)

**Execute command in the php container :**
use `make ssh` to connect to the php container

**Setup symfony and synapse**
 - Setup theses parameters :
```
    database_host:     mysql
    database_port:     ~
    database_name:     pssgen
    database_user:     root
    database_password: root

    synapse_database_host:     mysql-synapse
    synapse_database_port:     ~
    synapse_database_name:     synapse
    synapse_database_user:     user
    synapse_database_password: user
```
 - Init synapse
`make init-synapse`

go to http://site.local/app_dev.php/en/admin/pages/ to check if it works
