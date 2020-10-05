== PREREQUISITES ==
php5
currently mysql, should optionally be sqlite

== SETUP ==
Set up your paths in:
config/config.php

Your data will be in:
$CONFIG_DATADIRECTORY = '/www/testy';
Apache needs to have write permissions to this directory.

And the CloudShare is:
$CONFIG_DOCUMENTROOT = '/www/cloudshare/htdocs';
The CloudShare checkout should be in the root of "htdocs".

Both are absolute paths, so if your server is in /var/www, you need to add the /var


== Database ==
The database should by default be sqlite. No configuration there.

But until then you need some setup with mysql:

Create a table "cloudshare":
mysqladmin create cloudshare -u root -p

Dump the default database schema:
mysql cloudshare -u root -p < cloudshare.sql

TODO: you also need to create a mysql user that is configured in config/config.php


Please help improving this documentation.
Create merge requests at github.com/vincenzofehring/cloudshare-server .