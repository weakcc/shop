<?php


namespace App\API\Helpers;


class CodeResponse
{
    // 0 ~ 1000 业务状态码
    public const SUCCESS = [0, '成功'];
    public const FAIL = [1, '失败'];
    public const PARAM_ILLEGAL = [401, '参数不合法'];
    public const VALIDATION_FAILS = [402, '数据验证错误'];
    public const NOT_FOUND = [404, '数据不存在'];
}
