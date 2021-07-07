@include('Admin.includes.scripts.dataTableHelper')

<script type="text/javascript">

    var table = $('#datatable').DataTable({
        bLengthChange: false,
        searching: true,
        responsive: true,
        'processing': true,
        'language': {
            'loadingRecords': '&nbsp;',
            'processing': '<div class="spinner"></div>',
            'sSearch' : 'بحث :',
            "paginate": {
                "next": "التالي",
                "previous": "السابق"
            },
            "sInfo": "عرض صفحة _PAGE_ من _PAGES_",
        },
        serverSide: true,

        order: [[0, 'desc']],

        buttons: ['copy', 'excel', 'pdf'],

        ajax: "{{ route('Products.allData')}}",

        columns: [
            {data: 'checkBox', name: 'checkBox'},
            {data: 'id', name: 'id'},
            {data: 'image', name: 'image'},
            {data: 'reference_num', name: 'reference_num'},
            {data: 'name_ar', name: 'name_ar'},
            {data: 'name_en', name: 'name_en'},
            {data: 'price', name: 'price'},
            {data: 'cat_id', name: 'cat_id'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    $('#formSubmit').submit(function (e) {
        e.preventDefault();
        saveOrUpdate( save_method == 'add' ?"{{ route('Products.create') }}" : "{{ route('Products.update') }}");
    });


    function editFunction(id) {

        save_method = 'edit';

        $('#err').slideUp(200);

        $('#loadEdit_' + id).css({'display': ''});

        $.ajax({
            url: "/Admin/Products/edit/" + id,
            type: "GET",
            dataType: "JSON",

            success: function (data) {

                $('#loadEdit_' + id).css({'display': 'none'});

                $('#save').text('تعديل');

                $('#titleOfModel').text('تعديل المنتج');

                $('#formSubmit')[0].reset();

                $('#formModel').modal();

                $('#reference_num').val(data.reference_num);
                $('#name_ar').val(data.name_ar);
                $('#name_en').val(data.name_en);
                $('#price').val(data.price);
                $('#desc_ar').val(data.desc_ar);
                $('#desc_en').val(data.desc_en);
                $('#cat_id').val(data.cat_id);
                $('#id').val(data.id);
            }
        });
    }


    function deleteFunction(id,type) {
        if (type == 2 && checkArray.length == 0) {
            alert('لم تقم بتحديد اي عناصر للحذف');
        } else if (type == 1){
            url =  "/Admin/Products/destroy/" + id;
            deleteProccess(url);
        }else{
            url= "/Admin/Products/destroy/" + checkArray + '?type=2';
            deleteProccess(url);
            checkArray=[];
        }
    }


</script>

