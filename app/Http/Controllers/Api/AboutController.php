<?php

namespace App\Http\Controllers\Api;


use App\Http\Resources\AboutResource;
use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Resources\BlogResource;
use App\Http\Controllers\Controller;
use Validator,Auth,Artisan,Hash,File,Crypt;

class AboutController extends Controller
{
    use \App\Traits\ApiResponseTrait;

    /**
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function About_us()
    {
        $info=About::get();
        return $this->apiResponseData(AboutResource::collection($info),'',200);
    }


}
