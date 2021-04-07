<?php


namespace App\API\Helpers;
/**
 *  status         状态信息「成功或失败」
 *  code           http状态码
 *  message        提示信息
 *  data           返回数据信息
 *
 *  返回正确信息
 *  return $this->success('用户登录成功...');
 *
 *  返回正确资源信息
 *  return $this->success($user);
 *
 *  返回自定义 http 状态码的正确信息
 *  return $this->success('用户登录成功...',401);
 *
 *  返回错误信息
 *  return $this->error('用户注册失败');
 *
 *  返回自定义 http 状态码的错误信息
 *  return $this->error('用户登录失败',401);
 *
 *  返回自定义 http 状态码的错误信息，同时也想返回自己内部定义的错误码
 *  return $this->error('用户登录失败',401,10001);
 *
 *  返回 404
 *  return $this->notFound();
 *
 *  默认 success 返回的状态码是 200，error 返回的状态码是 400
 */
trait ApiResponse
{
    /**
     * 拦截http状态码
     * @var int
     */
    protected $statusCode = CodeResponse::SUCCESS[0];

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function setStatusCode($statusCode, $httpCode = null): ApiResponse
    {
        $httpCode = $httpCode ?? $statusCode;
        $this->statusCode = $httpCode;
        return $this;
    }

    public function status($status, array $data, $code = null): \Illuminate\Http\JsonResponse
    {
        if ($code) {
            $this->setStatusCode($code);
        }
        $status = [
            'status' => $status,
            'code' => $this->statusCode,
        ];
        $data = array_merge($status, $data);
        return response()->json($data);
    }

    public function message($message, $status = CodeResponse::SUCCESS[1]): \Illuminate\Http\JsonResponse
    {
        return $this->status($status, [
            'message' => $message,
        ]);
    }

    public function success($data, $code = null, $status = CodeResponse::SUCCESS[1]): \Illuminate\Http\JsonResponse
    {
        return $this->status($status, compact('data'), $code);
    }

    public function error(string $message, $code = CodeResponse::FAIL[0], $status = CodeResponse::FAIL[1]): \Illuminate\Http\JsonResponse
    {
        return $this->setStatusCode($code)->message($message, $status);
    }

    public function notFount($message = CodeResponse::NOT_FOUND[1]): \Illuminate\Http\JsonResponse
    {
        return $this->error($message, CodeResponse::NOT_FOUND[0]);
    }
}
