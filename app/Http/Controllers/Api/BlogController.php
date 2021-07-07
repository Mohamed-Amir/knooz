<?php

namespace App\Http\Controllers\Api;


use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Resources\BlogResource;
use App\Http\Controllers\Controller;
use Validator,Auth,Artisan,Hash,File,Crypt;

class BlogController extends Controller
{
    use \App\Traits\ApiResponseTrait;

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function allBlogs()
    {
        $blog=Blog::all();
        $msg = 'تم تنفيذ الطلب بنجاح';
        return $this->apiResponseData(BlogResource::collection($blog),$msg,200);
    }

    /**
     * @param $blog_id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function singleBlog($blog_id)
    {
        $blog=Blog::find($blog_id);
        if(is_null($blog))
        {
            return $this->apiResponseMessage(0, 'المدونه غير موجوده', 200);

        }
        return $this->apiResponseData(new BlogResource($blog),'تمت العملية بنجاح',200);
    }

}
