<div class="modal fade bd-example-modal-lg" id="formModel" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="formSubmit">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="titleOfModel"><i class="ti-marker-alt m-r-10"></i> Add new </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-email">الصوره</label>
                                <input type="file" id="image" name="image"  class="form-control"   >
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-email">الاسم بالعربيه</label>
                                <input type="text" id="name_ar" name="name_ar"  class="form-control"   >
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-email">الاسم بالانجليزيه</label>
                                <input type="text" id="name_en" name="name_en"  class="form-control"   >
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-email">تاريخ الانتهاء</label>
                                <input type="date" id="finishing_date" name="finishing_date"  class="form-control"   >
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-email">مده العمل </label>
                                <input type="text" id="duration" name="duration"  class="form-control"   >
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-email">الموقع </label>
                                <input type="text" id="location" name="location"  class="form-control"   >
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-email">عرض في الرئيسية</label>
                                <select  id="status" name="status"  class="form-control"   >
                                    <option value="1">نعم</option>
                                    <option value="2">لا</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>القسم بالعربيه</label>
                                <select class="custom-select col-12" id="cat_id" onchange="getCat()" name="cat_id" >
                                    <option value="">choose </option>
                                    @foreach($cat as $row)
                                        <option value="{{$row->id}}"> {{$row->cat_ar}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>القسم بالانجليزيه</label>
                                <select class="custom-select col-12" id="cat_id" onchange="getCat()" name="cat_id" >
                                    <option value="">choose </option>
                                    @foreach($cat as $row)
                                        <option value="{{$row->id}}"> {{$row->cat_en}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-email">الوصف بالعربيه</label>
                                <textarea type="text" id="desc_ar" name="desc_ar"  class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-email">الوصف بالانجليزيه</label>
                                <textarea type="text" id="desc_en" name="desc_en"  class="form-control"></textarea>
                            </div>
                        </div>

                    </div>
                </div>
                <div id="err"></div>
                <input type="hidden" name="id" id="id">
                <input type="hidden" name="project_id" id="project_id" value="{{$project_id}}">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"  data-dismiss="modal">اغلاق</button>
                    <button type="submit" id="save" class="btn btn-success"><i class="ti-save"></i> حفظ</button>
                </div>
            </form>
        </div>
    </div>
</div>
