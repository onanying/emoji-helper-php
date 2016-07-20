# 项目简介

剔除、判断emoji表情，输出emoji表情的16进制字符串，对没有使用utf8mb4编码数据库的项目，你懂的，这个少不了。

> 请使用 emoji_helper.php, 这个方案更好

## 提供了以下功能

	1. 判断字符串是否包含emoji表情
	2. 清除字符串中的emoji表情
	3. 将emoji表情的16进制输出为字符串

## Emoji.php文件内emoji unicode编码数组来源

	英文部分：取自开源项目 https://github.com/iamcal/php-emoji
	空白部分：工作中发现Bug后增加

## 武林秘籍 (javascript版本emoji表情的正则表达式)
请叫我雷锋！
```javascript
var emoji = /[\uD800-\uDBFF][\uDC00-\uDFFF]/g;  // 4字节utf-16 = emoji
var cont = $("#cont").val();
if (emoji.test(cont)) {
	$(".alert-text").text("留言不能包含表情");
	$(".alert-box").show();
	return false;
}
```