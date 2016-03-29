# CR Demo App
[ ![Codeship Status for satchin65/crdemo](https://codeship.com/projects/48ff1060-d6cd-0133-eec8-7650d5eddd71/status?branch=master)](https://codeship.com/projects/142797)

#### Installing
```
$ cd /path/to/the/root/of/application
$ npm install
$ bower install
$ composer install
$ cp .env.example.env .env
$ php artisan key:generate
```
> Make sure composer, npm and bower is installed in the system

#### Frontend Packages
- [angularjs](https://github.com/angular/angular) (full stack client side framework)
- [ui-router](https://github.com/angular-ui/ui-router) (best angular router)
- [bootstrap](https://github.com/twbs/bootstrap) (css framework)
- [jpkleemans-angular-validate](https://github.com/jpkleemans/angular-validate) (client side validation library)

#### PHP Packages
- [league/csv](https://github.com/thephpleague/csv)
- [league/fractal](https://github.com/thephpleague/fractal)

#### Mixing Assets
```
$ gulp && gulp watch
```
> Make sure you run 'npm install' and 'npm install -g gulp'
