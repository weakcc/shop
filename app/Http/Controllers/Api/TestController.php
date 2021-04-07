<?php


namespace App\Http\Controllers\Api;


use App\Http\Requests\Api\TestRequest;

class TestController extends Controller
{
    public function test()
    {
        return $this->notFount();
        return $this->success("123");
        return $this->notFount("123");
    }

//    public function test(TestRequest $request)
//    {
//        return $this->notFount("123");
//    }
}
