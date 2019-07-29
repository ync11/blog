<?php
/**
 * 返回可读性更好的文件尺寸
 */
use Illuminate\Support\Str;

function human_filesize($bytes, $decimals = 2) {
    $size = ['B', 'kB', 'MB', 'GB', 'TB', 'PB'];
    $factor = floor((strlen($bytes) - 1) / 3);

    return printf("%.{$decimals}f", $bytes / pow(1024, $factor)) .@$size[$factor];
}

/**
 * 判断文件的MIME类型是否为图片
 */
function is_image($mimeType)
{
    return Str::startsWith($mimeType, 'image/');
}

/**
 * 在视图的复选框和单选框中设置checked属性
 */
function checked($value)
{
    return $value ? 'checked' : '';
}

/**
 * 返回上传图片的完整路径
 */
function page_image($value = null)
{
    if (empty($value)) {
        $value = config('blog.page_image');
    }
    if (! Str::startsWith($value, 'http') && $value[0] !== '/') {
        $value = config('blog.uploads.webpath') . '/' . $value;
    }

    return $value;
}
