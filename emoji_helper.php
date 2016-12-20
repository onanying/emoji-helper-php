<?php

/**
 * ----------------------------------------------------
 * emoji表情 辅助函数
 * @author 刘健 <59208859@qq.com>
 * ----------------------------------------------------
 *
 * utf8编码的数据库最多只能存储三个字节, emoji表情大部分都为4个字节(utf8mb4), 所以存储时会出错,
 * 为了在不修改数据库类型的情况下不出现错误, 需将4个字节的数据剔除.
 *
 */

// 剔除emoji表情 (3个字节的emoji无法剔除, 比如讯飞输入法的emoji表情)
if (!function_exists('emoji_reject')) {
    function emoji_reject($text)
    {
        $len = mb_strlen($text);
        $new_text = '';
        for ($i = 0; $i < $len; $i++) {
            $word = mb_substr($text, $i, 1);
            if (strlen($word) <= 3) {
                $new_text .= $word;
            }
        }
        return $new_text;
    }
}

// 是否包含emoji表情
if (!function_exists('emoji_test')) {
    function emoji_test($text)
    {
        $len = mb_strlen($text);
        for ($i = 0; $i < $len; $i++) {
            $word = mb_substr($text, $i, 1);
            if (strlen($word) > 3) {
                return true;
            }
        }
        return false;
    }
}

// 输出emoji表情的16进制字符串
if (!function_exists('emoji_print')) {
    function emoji_print($emoji)
    {
        $len = mb_strlen($emoji);
        $txt = '';
        for ($i = 0; $i < $len; $i++) {
            $hex = mb_substr($emoji, $i, 1);
            $txt .= strtolower(str_replace('%', '\x', urlencode($hex))) . "\r\n";
        }
        echo $txt;
    }
}
