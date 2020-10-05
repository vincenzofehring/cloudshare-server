== PREREQUISITES ==
php5
currently mysql, should optionally be sqlite

== SETUP ==
Set up your paths in:
config/config.php

Your data will be in:
$CONFIG_DATADIRECTORY = '/www/testy';

And the CloudShare is:
$CONFIG_DOCUMENTROOT = '/www/cloudshare/htdocs';

Both are absolute paths, so if your server is in /var/www, you need to add the /var