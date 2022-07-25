laravel-admin displayer extension
=======

## 安装

```bash
composer require huo-zi/laravel-admin-ext-displayer
```

## 使用

### 列固定宽度超出隐藏

```php
$grid->column('field_name', 'field_label')->ellipsis('100px');
```

### 显示增量

可以支持传入增量值字段：

```php
$grid->column('field_name', 'field_label')->increase('field_name2');
```

或使用闭包计算增量：

```php
$grid->column('field_name', 'field_label')->increase(function($row){
    return $this->field_name - $this->field_name2;
});
```

### 显示多行

```php
$filter->column('field_label')->multiline('field_name1','field_name2','relation.field_name3');
```

### 进度条刷新

第一个参数ProgressRefresh::class是一个实现了`Renderable`的类，需要实现`render($id = null)`并返回对应记录的进度

第二个参数为刷新的频率，单位秒

```php
$grid->column('field_name', 'field_label')->progressBar()->progressRefresh(ProgressRefresh::class, 3);
```

### 显示单位

```php
$filter->column('field_name', 'field_label')->unit('￥');
```

如果单位需要显示在右边：

```php
$filter->column('field_name', 'field_label')->unit('%', false);
```


License
------------
Licensed under [The MIT License (MIT)](LICENSE).
