# Yii Backend start kit
yii 1.x backend theme Admin LTE 2.0.4

![screen shot 2558-05-13 at 14 36 25](https://cloud.githubusercontent.com/assets/1927531/7605915/816a0812-f97e-11e4-9736-4f408fc25453.png "yii backend start kit")

### Features
* [defining-identity-class](http://www.yiiframework.com/doc/guide/1.1/en/topics.auth#defining-identity-class) Authentication
* [access-control-filter](http://www.yiiframework.com/doc/guide/1.1/en/topics.auth#access-control-filter) Authorization
* [CGridView](http://www.yiiframework.com/doc/api/1.1/CGridView) Advanced customize guide
* [CDetailView](http://www.yiiframework.com/doc/api/1.1/CDetailView) Customize guide

### Dependencies
* [PHP](http://php.net/) 5.2 or above
* [jQuery](https://github.com/jquery/jquery) (1.7 or above)

### Usage
* create database and execute [sql file](https://github.com/fogza/yii-backend-start-kit/tree/master/sql)
* edit database name and username password in [skeleton/config/main.php](https://github.com/fogza/yii-backend-start-kit/blob/master/protected/config/main.php)

```php
...
'db'=>array(
	'connectionString' => 'mysql:host=localhost;dbname=xxxxx',
	'emulatePrepare' => true,
	'username' => 'root',
	'password' => 'root',
	'charset' => 'utf8',
),
...
```
