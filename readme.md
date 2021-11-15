[comment]: <> (# Human Resource Package For User Management Microservice)
#  پکیج منابع انسانی برای میکروسرویس مدیریت کاربران

## نصب

برای نصب پکیج ابتدا کد زیر را در فایل composer.json و در بخش repositories قرار دهید.

```json
"repositories": [
    {
        "type": "vcs",
        "url":  "https://gitlab.aanplatform.com/comma/bpms-human-resource-package.git"
    }
],
```


در نهایت پس از اعمال تغییرات در فایل composer.json ، از دستور زیر برای نصب پکیج استفاده کنید.

```bash
composer require comma/human-resource:dev-master
```
###  ایجاد ارتباط مدل کاربران و مدل های منابع انسانی
برای اضافه کردن ارتباط میان مدل های پکیج منابع انسانی به مدل کاربران تریت HasHumanResource را مانند کد زیر به مدل کاربران اضافه کنید.



```php
<?php

use Raahin\HumanResource\Traits\HasHumanResource;

class User extends Authenticatable
{
    use ... , HasFactory, HasHumanResource;
```

###  انتشار فایل تنظیمات
به صورت پیش فرض نام جدول کاربران users و نیم اسپیس مدل کاربران App\Http\Models\Userتعیین شده است

در صورتی که تمایل به تغییر تنظیمات پیش فرض دارید پس از نصب کامل پکیج با استفاده از دستور زیر فایل  config پکیج را نصب کنید.

```bash
php artisan vendor:publish
```
این دستور فایل human-resource.php را به مسیر configs اضافه میکند که شامل کد های زیر است.

```php
<?php

use App\Models\User;

return [
    "users_table" => "users",
    "users_model_namespace" => User::class,
];
```