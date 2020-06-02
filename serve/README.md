## 安装说明

>推荐使用宝塔面板进行配置

* 通过Git克隆本项目

```$xslt
git clone https://github.com/pijunkuan/minishop-multi.git
```

* 进入文件夹然后安装依赖
```php
cd minishop-serve/serve
composer install
```

* 复制.env.example文件到.env并进行配置
```shell script
cp .env.example .env
```

* 生成app key和jwt-secret
```php
php artisan key:generate
php artisan jwt:secret
```

* 数据库初始化
```php
php artisan migrate
```

 * 系统初始化
 ```php
php artisan system:init
```

## License

MINISHOP 框架遵循 [MIT license](https://opensource.org/licenses/MIT).
