# emoji_helper.php

去除过滤emoji表情、判断是否包含emoji表情，输出emoji表情的16进制字符串，对于没有使用utf8mb4编码数据库的项目，这个必不可少

> 请使用 emoji_helper.php, 这个方案更好

## 提供了以下功能

	1. 判断字符串是否包含emoji表情               emoji_reject($text)
	2. 清除字符串中的emoji表情                   emoji_test($text) 
	3. 将emoji表情的16进制输出为字符串           emoji_print($emoji) 

## Emoji.php文件内emoji unicode编码数组来源

	英文部分：取自开源项目 https://github.com/iamcal/php-emoji
	空白部分：工作中发现Bug后增加

## 武林秘籍 (正则表达式)
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