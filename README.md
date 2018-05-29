# Authentication System using Slim 3

#### Project Description
- Authentication System using Slim 3
- YouTube [Link](https://www.youtube.com/playlist?list=PLfdtiltiRHWGc_yY90XRdq6mRww042aEC)

#### Purpose:
- To learn basic php framework (slim 3)

#### Timeline:
- Start: May 29, 2018
- End: ?

#### For redirect to work:
- For 500 internal error, see: https://stackoverflow.com/a/31451383/6353682
- Make sure to run: sudo a2enmod rewrite
- Then add these lines on apache2.conf or sites-available/xxx.conf if enabled:

```
<Directory directory>
    Options Indexes FollowSymLinks
    AllowOverride All
    Require all granted
</Directory>
```
- where directory could be /var/www/ or the directory in your sites-available/xxx.conf

#### Create .htaccess (where index.php is located) and add these lines:

```
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^ index.php [QSA,L]
```

#### Credit:
- [Codecourse YouTube Channel](https://www.youtube.com/user/phpacademy/about)
