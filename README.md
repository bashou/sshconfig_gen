SSHConfig Gen
================================

These PHP scripts will allow you to store on MySQL all your hosts that are in your .ssh/config (or /etc/ssh/ssh_config).
You'll be able to generate the same file categorized.

I didn't do web interface but if someone is motivated to develop one, you're welcome !


Configuration
-------------------------

Everything have to be set in connect.php for database connection.
SQL Database structure is included in repository.


Database structure
-------------------------

* sg_hosts
- id_host : auto-increment just to have a unique id
- hostname : IP Address or FQDN
- id_zone : Name Prefix
- id_infra : Name Suffix
- id_srv : Name Extra
- user : User used to connect
- port : SSH Port to connect
- identityfile : Key file to use
- proxycommand : If you have to connect to a SSH Proxy server before connection, add the command like "ssh YOUR_SERVER_PROXY -W %h:22"
