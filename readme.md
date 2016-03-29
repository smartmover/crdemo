# CR Demo App
[ ![Codeship Status for satchin65/crdemo](https://codeship.com/projects/48ff1060-d6cd-0133-eec8-7650d5eddd71/status?branch=master)](https://codeship.com/projects/142797)

#### Installation
```
$ cd /path/to/the/root/of/application
$ npm install
$ bower install
$ composer install
$ cp .env.example.env .env
$ php artisan key:generate
```
> Make sure composer, npm, gulp and bower is installed in the system
and change the value for APP_LOGENTRIES_TOKEN in .env to see application log in logentries

#### Frontend Packages
- [angularjs](https://github.com/angular/angular) (full stack client side framework)
- [ui-router](https://github.com/angular-ui/ui-router) (best angular router)
- [bootstrap](https://github.com/twbs/bootstrap) (css framework)
- [jpkleemans-angular-validate](https://github.com/jpkleemans/angular-validate) (client side validation library)
- [bootstrap-datepicker](https://github.com/eternicode/bootstrap-datepicker) (nice little package for date selector)

#### PHP Packages
- [league/csv](https://github.com/thephpleague/csv)
    - very powerful library
    - long term support as it will not be abandoned, if the main developer is gone another one will take over the project
    - it is my default package for handling CSV and does the job very well
- [league/fractal](https://github.com/thephpleague/fractal)
    - this package helps the data serialization for creating maintainable API
    - it was little tricky to integrate this with csv data due to lack of key vlaue pair which I hacked around
    - if in future I have to switch the storage layer from csv to any other form of storage my API endpoint will not change as fractal creates the abstraction layer
- [phpunit/phpunit-selenium](https://github.com/giorgiosironi/phpunit-selenium)
    - this package integrate selenium with [phpunit](https://github.com/sebastianbergmann/phpunit)
    - it help to do a real browser testing
    - it is impossible to do a integration test with full client side frontend framework like angularjs without the tool like selenium

#### Tools
- [php-cs-fixer](https://github.com/FriendsOfPHP/PHP-CS-Fixer) (for fixing coding standard to psr-2)

#### Mixing Assets
```
$ gulp && gulp watch
```

#### Running the apps
- 1st Method (using php built in server)
```
$ php artisan serve
```
- 2nd Method (using docker)
```
$ docker-compose up
```
> In both cases hit http://localhost:8000 in your browser or anywhere

#### Adding Dummy Data (Seeder)
```
$ php artisan db:seed
```

#### Running Integration Test
```
$ ./vendor/bin/phpunit --testsuite=app
```
```
$ ./vendor/bin/phpunit --testsuite=selenium
```
>Run selenium standalone server and the app in localhost:8000 to test with selenium

### API Endpoints

**URL:** /api/v1/info?limit=number&page=number

**METHOD: ** GET

**Success Response**

200 OK

```
{
  "data": [
    {
      "name": "Luella Monahan",
      "gender": "female",
      "phone": "08275448002",
      "email": "Gilberto76@hotmail.com",
      "address": "612 Rodrigo Rue\nMayertborough, OK 25915",
      "nationality": "Czech Republic",
      "dob": "1957-11-01",
      "edu_background": "Bachelor",
      "prefer_moc": "Email"
    }
  ],
  "meta": {
    "cursor": {
      "current": 1,
      "prev": 0,
      "next": 0,
      "count": 1
    }
  }
}
```
-----
**URL:** /api/v1/info

**METHOD: ** POST

**Success Response**

201 OK
```
{
  "message": "Successfully Saved"
}
```


## Building App
The path I choosed to build this app is by using a backend which throws JSON with AngularJs powered frontend. I like this method of development as it gives more flexibility than using full stack framework for build everything.

#### Repository
The repository pattern is for data access. With this pattern we can switch storage and read from csv to any other without changing lot of code.

#### Continuous Integration (CI)
When any changes are pushed to master branch the code is tested and deployed through [codeship](https://codeship.com). The code is deployed to https://crdemo.sachinjoshi.com.np

#### Event
When data is stored event is fired which is current only used for logging the info to https://logentries.com.
