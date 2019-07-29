# 细读blog源码
## 基础命令：
1. 创建模型类 `Post`: `php artisan make:model -m Models/Post`
    - 此命令会在 `app/Models` 目录下创建模型类
    - 会在 `database/migrations` 目录下生成迁移文件
        - 其中CreatePostsTable类便为此次命令创建，其中的up()方法是创建数据库中的posts表
2. 创建模型类完成后运行迁移命令 `php artisan migrate`
*12用于创建模型*
3. 创建模型工厂文件 `php artisan make:factory PostFactory --model=Models/Post`
    - 模型工厂文件目前是用来定义填充假数据到posts表中的哪个字段
4. 创建填充类文件 `php artisan make:seeder PostsTableSeeder`
    - PostsTableSeeder用来填充数据 (`truncate()` 用于清理数据表， `factory(Post::class, 20)->create();` 用来一次性填充20篇文章)
5. 修改DatabaseSeeder.php 文件， 填充数据到posts表
6. 运行`php artisan db:seede`  来填充初始化数据
*3456三个步骤用于填充数据，也可以直接使用Seeder来填充数据*
7. 创建控制器 `php artisan make:controller BlogController` (在`app/Http/Controllers`目录下生成)
8. 创建视图
## laravel目录结构
1. config目录下的文件为配置文件， 可通过辅助函数`config()`来访问
2. routes目录用于存放路由， 一般应用的路由放在web.php中
3. resources/views 目录下用来存放Blade模板
## 参数传递
1. 在routes/web.php中添加路由， 如 `Route::get('/blog/{slug}', 'BlogController@showPost')->name('blog.detail');` (name() 用于添加路由的别名， 该别名可在前端模板中使用)
2. 在`BlogController.php`中的showPost方法中编写此方法， 并且通过`showPost($slug)`将前端的slug传入控制器
## Eloquent ORM