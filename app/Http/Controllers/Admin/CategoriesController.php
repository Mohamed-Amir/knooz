<?php


namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use Yajra\DataTables\DataTables;
use Auth, File;
use Illuminate\Support\Facades\Storage;


class CategoriesController extends Controller
{
    use \App\Traits\ApiResponseTrait;

    /**
     * @return mixed
     * @throws \Exception
     */
    public function allData(Request $request)
    {
        $data = Categories::get();
        return $this->mainFunction($data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {

        return view('Admin.Categories.index');
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
        $this->save_Categories($request,new Categories);
        return $this->apiResponseMessage(1,'تم اضافة القسم بنجاح',200);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        $Categories = Categories::find($id);
        return $Categories;
    }

    /**
     * @param Request $request
     * @return int
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {

        $Categories = Categories::find($request->id);
        $this->save_Categories($request,$Categories);
        return $this->apiResponseMessage(1,'تم تعديل القسم بنجاح',200);
    }

    /**
     * @param $request
     * @param $brand
     */
    public function save_Categories($request,$Categories){
        $Categories->cat_ar = $request->cat_ar;
        $Categories->cat_en = $request->cat_en;
        if($request->image) {
            deleteFile('Categories',$Categories->image);
            $Categories->image=saveImage('Categories',$request->image);
        }
        $Categories->save();
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
            $Categories = Categories::whereIn('id', $ids)->get();
            foreach($Categories as $row){
                $this->deleteRow($row);
            }
        } else {
            $Categories = Categories::find($id);
            $this->deleteRow($Categories);
        }
        return response()->json(['errors' => false]);
    }

    /**
     * @param $cat
     */
    private function deleteRow($Categories){
        deleteFile('Categoriess',$Categories->image);
        $Categories->delete();
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
            $image = '<a href="'. getImageUrl('Categories',$data->image).'" target="_blank">'
                .'<img  src="'. getImageUrl('Categories',$data->image) . '" width="50px" height="50px"></a>';
            return $image;
        })->rawColumns(['action' => 'action','image' => 'image','checkBox'=>'checkBox'])->make(true);
    }
}
