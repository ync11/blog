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
`php artisan make:controller Admin/PostController --resource` (创建资源路由)
8. 创建视图
## laravel目录结构
1. config目录下的文件为配置文件， 可通过辅助函数`config()`来访问
2. routes目录用于存放路由， 一般应用的路由放在web.php中
3. resources/views 目录下用来存放Blade模板
4. database/migrations 目录下用于存放迁移文件
5. app/Http/Requests 用于存放表单请求类
## 参数传递
1. 在routes/web.php中添加路由， 如 `Route::get('/blog/{slug}', 'BlogController@showPost')->name('blog.detail');` (name() 用于添加路由的别名， 该别名可在前端模板中使用)
2. 在`BlogController.php`中的showPost方法中编写此方法， 并且通过`showPost($slug)`将前端的slug传入控制器
## Eloquent ORM
## 前端布局
1. `layout.blade.php`为基本视图， laravel中需要加csrf`<meta name="csrf-token" content="{{ csrf_token() }}">`
2. `@yield()`将输出继承自该布局的子视图块的内容
3. `@include()`引入另一个Blade模板
4. `navbar.blade.php`为侧边导航栏， 一般放在partials目录下
5. `@auth @endauth`为登录认证成功所能看到的侧边栏， `@guest @endguest`为游客看到的侧边栏， 其中`@else`为认证成功后显示的内容
6. `@extends()` 用于继承模板
7. `@section() @endsection` 写对应的 `@yield()`中的内容
8. form 标签内需要加入csrf `<input type="hidden" name="_token" value="{{ csrf_token() }}">`
## Blade模板
1. `{{}}`渲染PHP变量; `{!! !!}`渲染原生HTML代码(富文本数据渲染); `{{-- --}}`用于注释php代码
    - `{{}}`渲染的PHP变量会使用`htmlentities()`进行HTML字符转义，来避免类似XSS的攻击
    - `@{{}}`编译时会移除@， 保留`{{}}`结构
2. 一般以`_form.blade.php`带有下划线命名的局部视图为该模型共享的视图
## 表单请求类
1. 用于对表单字段进行验证
2. 表单请求类的`authorize()`方法默认`return false;`， 使用表单请求类需改为true
3. `rules()`方法中用于验证字段， 返回一个数组， 数组内为验证字段
4. 使用时将对应controller中的需要验证的表单方法的`(Request $request)`改为对应的表单请求类名称如`(XxxRequest $request)`