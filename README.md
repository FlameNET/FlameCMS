# ![logo](http://i.imgur.com/Tignp9F.png) FlameNET

[![Coverity Scan Build Status](https://scan.coverity.com/projects/3899/badge.svg)](https://scan.coverity.com/projects/3899/) 
[![Bountysource](https://www.bountysource.com/badge/team?team_id=56506&style=bounties_received)](https://www.bountysource.com/badge/team?team_id=56506&style=bounties_received)  

## Introduction

FlameCMS is a *MMORPG* Framework based in PHP & HTML.

It is a newly made from scratch Content Management System so that the members
can register and manage their accounts and so that they Administrator can
administer his Site with ease.
It is based on the code of the previous project with extensive changes over time 
to optimize, improve and cleanup the codebase at the same time as improving the 
CMS mechanics and functionality.

It is completely open source; community involvement is highly encouraged.

If you wish to contribute ideas or code please visit our site linked below or
make pull requests to our [Github repository](https://github.com/FlameNET/FlameCMS).

For further information on the FlameCMS project, please visit our project
website at [FlameCMS](http://flamenet.github.io/FlameCMS).

## Requirements

+ Platform: Linux, Windows (Have not tested on MAC)
+ Processor with SSE2 support
+ PHP ≥ 5.5.1
+ MySQL ≥ 5.1.0
+ Apache HTTP server


## Install

You can install the CMS super easily as you access it. Remember to delete the "install" folder after installing everything successfully.
###if you are having trouble with the admin account, try the install_test (3.3.5a only) it creates the admin account too.

## * IIS 8.0:
http://www.iis.net/downloads/microsoft/url-rewrite

## * NGINX:
http://winginx.com/en/htaccess

example
```
# nginx configuration
error_page 404 http://localhost/404;
location / {
if (!-e $request_filename){
rewrite ^(.*)$ /$1.php break;
}
}
location /blog {
rewrite ^/blog/(.+)/(.+)$ /article.php?id=$1&title=$2;
}
```
## Developers CMS

To develop the "CMS" we recommend to activate the option [DEVELOPMENT_ENVIRONMENT](https://github.com/FlameNET/FlameCMS/blob/master/system/config.php#L129)

## Reporting issues

Issues can be reported via the [Github issue tracker](https://github.com/FlameNET/FlameCMS/issues).

Please take the time to review existing issues before submitting your own to
prevent duplicates.

In addition, thoroughly read through the [issue tracker guide](https://github.com/FlameNET/FlameCMS/issues/1) to ensure
your report contains the required information. Incorrect or poorly formed
reports are wasteful and are subject to deletion.


## Submitting fixes

Fixes are submitted as pull requests via Github.

## Copyright

License: GPL 2.0

Read file [COPYING](COPYING)


## Authors &amp; Contributors

Read file [THANKS](THANKS)


## Links

[Site](http://flamenet.github.io/FlameCMS)

Wiki: NOT YET DETERMINED

Documentation: NOT YET DETERMINED

Forums: NOT YET DETERMINED
