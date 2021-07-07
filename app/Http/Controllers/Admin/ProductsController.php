<?php


namespace App\Http\Controllers\Admin;

use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Products;
use Yajra\DataTables\DataTables;
use Auth, File;
use Illuminate\Support\Facades\Storage;


class ProductsController extends Controller
{
    use \App\Traits\ApiResponseTrait;

    /**
     * @return mixed
     * @throws \Exception
     */
    public function allData(Request $request)
    {
        $data = Products::get();
        return $this->mainFunction($data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $cat = Categories::all();
        return view('Admin.Products.index',compact('cat'));
    }

    /**
     * @param Request $request
     * @return int
     * @throws \Illuminate\Validation\ValidationException
     */
    public function create(Request $request)
    {
        $this->validate(
            $request,
            [
                'image' => 'required|image|max:2000',
            ],
            [
                'image.required' =>'من فضلك ادخل صوره ',
                'image.image' =>'من فضلك ادخل صورة صالحة'
            ]
        );
        $this->save_Products($request,new Products);
        return $this->apiResponseMessage(1,'تم اضافة المنتج بنجاح',200);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        $Products = Products::find($id);
        return $Products;
    }

    /**
     * @param Request $request
     * @return int
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {

        $Products = Products::find($request->id);
        $this->save_Products($request,$Products);
        return $this->apiResponseMessage(1,'تم تعديل المنتج بنجاح',200);
    }

    /**
     * @param $request
     * @param $brand
     */
    public function save_Products($request,$Products){
        $Products->reference_num = $request->reference_num;
        $Products->name_ar = $request->name_ar;
        $Products->name_en = $request->name_en;
        $Products->price = $request->price;
        $Products->desc_ar = $request->desc_ar;
        $Products->desc_en = $request->desc_en;
        $Products->cat_id = $request->cat_id;
        if($request->image) {
            deleteFile('Products',$Products->image);
            $Products->image=saveImage('Products',$request->image);
        }
        $Products->save();
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|int
     */
    public function destroy($id,Request $request)
    {
        if ($request->type == 2) {
            $ids = explode(',', $id);
            $Products = Products::whereIn('id', $ids)->get();
            foreach($Products as $row){
                $this->deleteRow($row);
            }
        } else {
            $Products = Products::find($id);
            $this->deleteRow($Products);
        }
        return response()->json(['errors' => false]);
    }

    /**
     * @param $cat
     */
    private function deleteRow($Products){
        deleteFile('Productss',$Products->image);
        $Products->delete();
    }

    /**
     * @param $data
     * @return mixed
     * @throws \Exception
     */
    private function mainFunction($data)
    {
        return Datatables::of($data)->addColumn('action', function ($data) {
            $options = '<td class="sorting_1"><button  class="btn btn-info waves-effect btn-circle waves-light" onclick="editFunction(' . $data->id . ')" type="button" ><i class="fa fa-spinner fa-spin" id="loadEdit_' . $data->id . '" style="display:none"></i><i class="sl-icon-wrench"></i></button>';
            $options .= ' <button type="button" onclick="deleteFunction(' . $data->id . ',1)" class="btn btn-dribbble waves-effect btn-circle waves-light"><i class="sl-icon-trash"></i> </button></td>';
            return $options;
        })->addColumn('checkBox', function ($data) {
            $checkBox = '<td class="sorting_1">' .
                '<div class="custom-control custom-checkbox">' .
                '<input type="checkbox" class="mybox" id="checkBox_' . $data->id . '" onclick="check(' . $data->id . ')">' .
                '</div></td>';
            return $checkBox;
        })->editColumn('image', function ($data) {
            $image = '<a href="'. getImageUrl('Products',$data->image).'" target="_blank">'
                .'<img  src="'. getImageUrl('Products',$data->image) . '" width="50px" height="50px"></a>';
            return $image;
        })->rawColumns(['action' => 'action','image' => 'image','checkBox'=>'checkBox'])->make(true);
    }
}
