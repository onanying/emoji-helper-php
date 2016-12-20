# emoji_helper.php

去除过滤emoji表情、判断是否包含emoji表情，输出emoji表情的16进制字符串；对于没有使用utf8mb4编码数据库的项目，如果存入4字节的emoji表情，数据库会报错，只能选择将4字节的字符剔除。

## 使用说明

### 剔除字符串中的emoji表情 

> 3个字节的emoji无法剔除, 比如讯飞输入法的emoji表情，正常的emoji表情都为4个字节，比如iOS的emoji表情

```php
$text = emoji_reject($text);
```

### 判断字符串是否包含emoji表情

```php
if(emoji_test($text)){
	
}
```

### 将emoji表情的16进制输出为字符串

```php
echo emoji_print($emoji);
```

## 武林秘籍 (正则)

PHP与js的正则不同，是因为js使用的是ucs-2编码

PHP Sample
```php
function emoji_test($text)
{
	$emoji = "/[\u010000-\u10FFFF]/g";  // 4字节utf-16 = emoji
	return preg_match($emoji, $text);
}
```

JavaScript Sample
```javascript
function emoji_test(text)
{
	var emoji = /[\uD800-\uDBFF][\uDC00-\uDFFF]/g;  // 4字节utf-16 = emoji
	return emoji.test(text);
}
```