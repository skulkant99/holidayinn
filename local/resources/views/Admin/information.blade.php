@extends('Admin.layouts.layout')
@section('css_top')
@endsection
@section('css_bottom')

@endsection
@section('body')
<div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="content">
                            <h4 class="title">
                                {{$title_page}}
                                <button class="btn btn-success btn-add pull-right" >
                                    + เพิ่มข้อมูล
                                </button>
                            </h4>
                            <div class="toolbar">
                                <!--        Here you can write extra buttons/actions for the toolbar              -->
                            </div>
                            <div class="material-datatables">
                                <div class="table-responsive">
                                    <table id="TableList" class="table" style="width:100%">
                                        <thead>
                                            <tr>
                                            <th>#</th>
                                            <th>รูปภาพ</th>
                                            <th>หัวเรื่อง</th>
                                            <th>รายละเอียด</th>
                                            <th>ลำดับ</th>
                                            <th>สถานะ</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
@endsection
@section('modal')
<div class="modal" id="ModalAdd"  role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document"  style="max-width:70%;max-height:70%;">
            <div class="modal-content">
                <form id="FormAdd">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">เพิ่ม {{$title_page}}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">

                    <div class="form-group">
                        <label for="add_photo">รูปภาพ</label>
                        <div id="orak_add_photo">
                            <div id="add_photo" orakuploader="on"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="add_title">หัวเรื่อง</label>
                        <input id="add_title" name="title" class="form-control" placeholder="หัวเรื่อง">
                    </div>
                    
                    <div class="form-group">
                            <label for="add_detail">รายละเอียด</label>
                            <textarea id="add_detail" name="detail" class="form-control"></textarea>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="add_sort_id">ลำดับ</label>
                            <input type="text" class="form-control number-only" name="sort_id" id="add_sort_id"  placeholder="ลำดับ">
                        </div>
                    
                        <div class="form-group col-md-6">
                            <label for="add_status">สถานะ</label>
                            <select  class="form-control number-only select2" name="status" id="add_status" tabindex="-1" data-placeholder="เลือก สถานะ">
                                <option value="">เลือก</option>
                                <option value="1">ใช้งาน</option>
                                <option value="2">ไม่ใช้งาน</option>
                            </select>
                        </div>
                    </div>
                 
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">บันทึก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal" id="ModalEdit"  role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document"  style="max-width:70%;max-height:70%;">
                <div class="modal-content">
                    <input type="hidden" name="edit_id" id="edit_id">
                    <form id="FormEdit">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">แก้ไข {{$title_page}}</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                        
                        <input type="hidden" name="org_photo" id="org_photo">
                        <div class="form-group">
                            <label for="edit_photo">รูปภาพ</label>
                            <div id="orak_edit_photo">
                                <div id="edit_photo" orakuploader="on"></div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="edit_title">หัวเรื่อง</label>
                            <input id="edit_title" name="title" class="form-control" placeholder="หัวเรื่อง">
                        </div>
                        
                        <div class="form-group">
                                <label for="edit_detail">รายละเอียด</label>
                                <textarea id="edit_detail" name="detail" class="form-control"></textarea>
                        </div>
                        
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="add_sort_id">ลำดับ</label>
                                <input type="text" class="form-control number-only" name="sort_id" id="edit_sort_id"  placeholder="ลำดับ">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="add_status">สถานะ</label>
                                <select  class="form-control number-only select2" name="status" id="edit_status" tabindex="-1" data-placeholder="เลือก สถานะ">
                                    <option value="">เลือก</option>
                                    <option value="1">ใช้งาน</option>
                                    <option value="2">ไม่ใช้งาน</option>
                                </select>
                            </div>
                        </div>   
                      
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">บันทึก</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
@section('js_top')
@endsection
@section('js_bottom')
    <script src="{{asset('assets/global/plugins/orakuploader/orakuploader.js')}}"></script>
    <script>
         var TableList = $('#TableList').dataTable({
            "ajax": {
                "url": url_gb+"/admin/information/Lists",
                "data": function ( d ) {
                    //d.myKey = "myValue";
                    // d.custom = $('#myInput').val();
                    // etc
                }
            },
            "columns": [
                {"data" : "DT_RowIndex" , "className": "text-center", "searchable": false, "orderable": false},
                {"data" : "photo"},
                {"data" : "title"},
                {"data" : "detail"},
                {"data" : "sort_id","className": "text-center"},
                {"data" : "status"},
                { "data": "action","className":"action text-center","searchable" : false , "orderable" : false }
            ]
         });
         $('body').on('click','.btn-add',function(data){
             $('.select2').select2();
            ShowModal('ModalAdd');
        });
        $('body').on('click','.btn-edit',function(data){
            var btn = $(this);
            btn.button('loading');
            var id = $(this).data('id');
            $('#edit_id').val(id);
            $.ajax({
                method : "GET",
                url : url_gb+"/admin/information/show/"+id,
                dataType : 'json'
            }).done(function(rec){
                console.log(rec);
                
                $('#edit_photo').closest('#orak_edit_photo').html('<div id="edit_photo" orakuploader="on"></div>');
                $('#org_photo').val(rec.photo);
                if(rec.photo){
                    var max_file = 0;
                    var file = [];
                        file[0] = rec.photo;
                    var photo = rec.photo;
                }else{
                    var max_file = 1;
                    var file = [];
                    var photo = rec.photo;
                }       
                $('#edit_photo').orakuploader({
                    orakuploader_path               : url_gb+'/',
                    orakuploader_ckeditor           : false,
                    orakuploader_use_dragndrop      : true,
                    orakuploader_main_path          : 'uploads/temp/',
                    orakuploader_thumbnail_path     : 'uploads/temp/',
                    orakuploader_thumbnail_real_path: asset_gb+'uploads/temp/',
                    orakuploader_add_image          : asset_gb+'images/add.png',
                    orakuploader_loader_image       : asset_gb+'images/loader.gif',
                    orakuploader_no_image           : asset_gb+'images/no-image.jpg',
                    orakuploader_add_label          : 'เลือกรูปภาพ',
                    orakuploader_use_rotation       : false,
                    orakuploader_maximum_uploads    : max_file,
                    orakuploader_hide_on_exceed     : true,
                    orakuploader_attach_images      : file,
                    orakuploader_field_name         : 'photo',
                    orakuploader_finished           : function(){

                    }
                });

                $('#edit_title').val(rec.title);
                CKEDITOR.instances['edit_detail'].setData(rec.detail);
                $('#edit_status').val(rec.status);
                $('#edit_sort_id').val(rec.sort_id);
                $('.select2').select2();
                btn.button("reset");
                ShowModal('ModalEdit');
            }).fail(function(){
                swal("system.system_alert","system.system_error","error");
                btn.button("reset");
            });
        });
        $('#FormAdd').validate({
            errorElement: 'div',
            errorClass: 'invalid-feedback',
            focusInvalid: false,
            rules: {

                name: {
                    required: true,
                },
            },
            messages: {

                name: {
                    required: "กรุณาระบุ",
                },
            },
            highlight: function (e) {
                validate_highlight(e);
            },
            success: function (e) {
                validate_success(e);
            },

            errorPlacement: function (error, element) {
                validate_errorplacement(error, element);
            },
            submitHandler: function (form) {

                if(CKEDITOR!==undefined){
                    for ( instance in CKEDITOR.instances ){
                        CKEDITOR.instances[instance].updateElement();
                    }
                }

                var btn = $(form).find('[type="submit"]');
                var data_ar = removePriceFormat(form,$(form).serializeArray());
                btn.button("loading");
                $.ajax({
                    method : "POST",
                    url : url_gb+"/admin/information",
                    dataType : 'json',
                    data : $(form).serialize()
                }).done(function(rec){
                    btn.button("reset");
                    if(rec.status==1){
                        TableList.api().ajax.reload();
                        resetFormCustom(form);
                        swal(rec.title,rec.content,"success");
                        $('#ModalAdd').modal('hide');
                    }else{
                        swal(rec.title,rec.content,"error");
                    }
                }).fail(function(){
                    swal("system.system_alert","system.system_error","error");
                    btn.button("reset");
                });
            },
            invalidHandler: function (form) {

            }
        });
        $('#FormEdit').validate({
            errorElement: 'div',
            errorClass: 'invalid-feedback',
            focusInvalid: false,
            rules: {

                name: {
                    required: true,
                },
            },
            messages: {

                name: {
                    required: "กรุณาระบุ",
                },
            },
            highlight: function (e) {
                validate_highlight(e);
            },
            success: function (e) {
                validate_success(e);
            },

            errorPlacement: function (error, element) {
                validate_errorplacement(error, element);
            },
            submitHandler: function (form) {

                if(CKEDITOR!==undefined){
                    for ( instance in CKEDITOR.instances ){
                        CKEDITOR.instances[instance].updateElement();
                    }
                }

                var btn = $(form).find('[type="submit"]');
                var id = $('#edit_id').val();
                btn.button("loading");
                $.ajax({
                    method : "POST",
                    url : url_gb+"/admin/information/"+id,
                    dataType : 'json',
                    data : $(form).serialize()
                }).done(function(rec){
                    btn.button("reset");
                    if(rec.status==1){
                        TableList.api().ajax.reload();
                        resetFormCustom(form);
                        swal(rec.title,rec.content,"success");
                        $('#ModalEdit').modal('hide');
                    }else{
                        swal(rec.title,rec.content,"error");
                    }
                }).fail(function(){
                    swal("system.system_alert","system.system_error","error");
                    btn.button("reset");
                });
            },
            invalidHandler: function (form) {

            }
        });
        $('body').on('click','.btn-delete',function(e){
            e.preventDefault();
            var btn = $(this);
            var id = btn.data('id');
            swal({
                title: "คุณต้องการลบใช่หรือไม่",
                text: "หากคุณลบจะไม่สามารถเรียกคืนข้อมูลกลับมาได้",
                type: 'warning',
                showCancelButton: true,
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonText: "ใช่ ฉันต้องการลบ",
                cancelButtonText: "ยกเลิก",
                showLoaderOnConfirm: true,
                buttonsStyling: false
            }).then(function() {
                $.ajax({
                    method : "POST",
                    url : url_gb+"/admin/information/Delete/"+id,
                    data : {ID : id}
                }).done(function(rec){
                    if(rec.status==1){
                        swal(rec.title,rec.content,"success");
                        TableList.api().ajax.reload();
                    }else{
                        swal("ระบบมีปัญหา","กรุณาติดต่อผู้ดูแล","error");
                    }
                }).fail(function(data){
                    swal("ระบบมีปัญหา","กรุณาติดต่อผู้ดูแล","error");
                });
            }).catch(function(e){
                //console.log(e);
            });
        });
        $('#add_photo').orakuploader({
            orakuploader_path               : url_gb+'/',
            orakuploader_ckeditor           : false,
            orakuploader_use_dragndrop      : true,
            orakuploader_main_path          : 'uploads/temp/',
            orakuploader_thumbnail_path     : 'uploads/temp/',
            orakuploader_thumbnail_real_path: asset_gb+'uploads/temp/',
            orakuploader_add_image          : asset_gb+'images/add.png',
            orakuploader_loader_image       : asset_gb+'images/loader.gif',
            orakuploader_no_image           : asset_gb+'images/no-image.jpg',
            orakuploader_add_label          : 'เลือกรูปภาพ',
            orakuploader_use_rotation       : false,
            orakuploader_maximum_uploads    : 1,
            orakuploader_hide_on_exceed     : true,
            orakuploader_field_name         : 'photo',
            orakuploader_finished           : function(){

            }
        });
        CKEDITOR.replace('add_detail');
        CKEDITOR.replace('edit_detail');
        $('#add_status').select2();
        $('#edit_status').select2();
    </script>
@endsection
