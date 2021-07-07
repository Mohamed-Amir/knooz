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

        ajax: "{{ route('Projects.allData',['project_id'=>$project_id])}}",

        columns: [
            {data: 'checkBox', name: 'checkBox'},
            {data: 'id', name: 'id'},
            {data: 'image', name: 'image'},
            {data: 'name_ar', name: 'name_ar'},
            {data: 'name_en', name: 'name_en'},
            {data: 'finishing_date', name: 'finishing_date'},
            {data: 'duration', name: 'duration'},
            {data: 'location', name: 'location'},
            {data: 'status', name: 'status'},
            {data: 'cat_id', name: 'cat_id'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    $('#formSubmit').submit(function (e) {
        e.preventDefault();
        saveOrUpdate( save_method == 'add' ?"{{ route('Projects.create') }}" : "{{ route('Projects.update') }}");
    });


    function editFunction(id) {

        save_method = 'edit';

        $('#err').slideUp(200);

        $('#loadEdit_' + id).css({'display': ''});

        $.ajax({
            url: "/Admin/Projects/edit/" + id,
            type: "GET",
            dataType: "JSON",

            success: function (data) {

                $('#loadEdit_' + id).css({'display': 'none'});

                $('#save').text('تعديل');

                $('#titleOfModel').text('تعديل المشروع');

                $('#formSubmit')[0].reset();

                $('#formModel').modal();

                $('#location').val(data.location);
                $('#name_ar').val(data.name_ar);
                $('#name_en').val(data.name_en);
                $('#finishing_date').val(data.finishing_date);
                $('#duration').val(data.duration);
                $('#desc_ar').val(data.desc_ar);
                $('#desc_en').val(data.desc_en);
                $('#cat_id').val(data.cat_id);
                $('#status').val(data.status);
                $('#project_id').val(data.project_id);
                $('#id').val(data.id);
            }
        });
    }


    function deleteFunction(id,type) {
        if (type == 2 && checkArray.length == 0) {
            alert('لم تقم بتحديد اي عناصر للحذف');
        } else if (type == 1){
            url =  "/Admin/Projects/destroy/" + id;
            deleteProccess(url);
        }else{
            url= "/Admin/Projects/destroy/" + checkArray + '?type=2';
            deleteProccess(url);
            checkArray=[];
        }
    }


</script>

