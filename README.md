# DEI 2021 OIDC PHP Demo

PHP app to demonstrate OIDC authN in AAI@EduHr federation using 
[cicnavi/oidc-client-php](https://github.com/cicnavi/oidc-client-php).

App was made for Srce DEI 2021 conference, for AAI@EduHr workshop.

## To run this app...

Register your OIDC resource at https://registar.aaiedu.hr.

Clone this repo locally, cd into it and use composer to install dependencies:
```shell
git clone git@github.com:cicnavi/dei-2021-oidc-php-demo.git
cd dei-2021-oidc-php-demo
composer install
```

Copy example config file 'app/config.php.example' to 'app/config.php'.
```shell
cp app/config.php.example app/config.php
```
Edit newly created app/config.php file and choose the environment (production or test),
and enter client ID, client secret, redirect URI and scopes. For example:

```
// ...
Config::CONFIG_KEY_OIDC_CONFIGURATION_URL => 'https://fed-lab.aaiedu.hr/.well-known/openid-configuration',
Config::CONFIG_KEY_OIDC_CLIENT_ID => 'some-client-id',
Config::CONFIG_KEY_OIDC_CLIENT_SECRET => 'some-client-secret',
Config::CONFIG_KEY_OIDC_REDIRECT_URI => 'http://localhost:8000/callback.php',
Config::CONFIG_KEY_OIDC_SCOPE => 'openid profile hrEduPersonUniqueID',
Config::CONFIG_KEY_OIDC_ID_TOKEN_VALIDATION_EXP_LEEWAY => 60,
Config::CONFIG_KEY_OIDC_ID_TOKEN_VALIDATION_IAT_LEEWAY => 60,
Config::CONFIG_KEY_OIDC_ID_TOKEN_VALIDATION_NBF_LEEWAY => 60,
// ...
```

To quickly test things out, we can run a PHP built in web server:
```shell
php -S 0.0.0.0:8000 -t app/public
```

In your browser, navigate to http://localhost:8000/index.php. You should be redirected
to login.aaiedu.hr where will enter your credentials (real or test credentials,
depending on the environment). After that, you will be redirected to /callback.php
where user data will be dumped.
