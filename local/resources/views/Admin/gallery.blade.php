﻿@extends('Admin.layouts.layout')
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
                                <table id="TableList" class="table table-striped table-no-bordered table-hover" style="width:100%;cellspacing:0">
                                    <thead>
                                        <tr>
                                        <th>#</th>
                                        <th>photo</th>
                                        <th>name</th>
                                        <th>gallery_type_id</th>
                                        <th>link_video</th>
                                        <th>type</th>
                                        <th>sort_id</th>
                                        <th>status</th>                                       
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
    <div class="modal-dialog" role="document" style="max-width:50%;max-height:50%;">
        <div class="modal-content">
            <form id="FormAdd">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">เพิ่ม {{$title_page}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    
                <div class="form-check">
                        <input type="radio" name="type" id="add_type"  value="P" checked="checked"> photo
                        <input type="radio" name="type" id="add_type"  value="V" > video
                </div>

                <div class="form-group">
                    <label for="add_photo">photo</label>
                    <div id="orak_add_photo">
                        <div id="add_photo" orakuploader="on"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="add_name">name</label>
                    <input type="text" class="form-control" name="name" id="add_name" required="" placeholder="name" style="border-color: #844fd9;">
                </div>
        
                <div class="form-group">
                    <label for="add_link_video">link_video</label>
                    <input type="text" class="form-control" name="link_video" id="add_link_video"  placeholder="link_video">
                </div>
        
                <div class="form-group">
                    <label for="add_sort_id">sort_id</label>
                    <input type="text" class="form-control number-only" name="sort_id" id="add_sort_id"  placeholder="sort_id">
                </div>
        
                <div class="form-group">
                    <label for="add_gallery_type_id">gallery_type_id</label>
                    <select name="gallery_type_id" class="select2 form-control" tabindex="-1" data-placeholder="Select gallery_type_id" id="add_gallery_type_id"  >
                        <option value="">Select gallery_type_id</option>
                        @foreach($GalleryTypes as $GalleryType)
                        <option value="{{$GalleryType->id}}">{{$GalleryType->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-check">
                    <label for="add_status" class="checkbox form-check-label">
                        <input type="checkbox" class="form-check-input" data-toggle="checkbox" name="status" id="add_status"  value="1" checked="checked"> status
                    </label>
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
    <div class="modal-dialog" role="document" style="max-width:50%;max-height:50%;">
        <div class="modal-content">
            <input type="hidden" name="edit_id" id="edit_id">
            <form id="FormEdit">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">แก้ไขข้อมูล {{$title_page}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                
                <div class="form-check">
                        <input type="radio" name="type" id="edit_typeP"  value="P" > photo
                        <input type="radio" name="type" id="edit_typeV"  value="V" > video
                </div>
        
                <input type="hidden" name="org_photo" id="org_photo">
                <div class="form-group">
                    <label for="edit_photo">photo</label>
                    <div id="orak_edit_photo">
                        <div id="edit_photo" orakuploader="on"></div>
                    </div>
                </div>

                 <div class="form-group">
                    <label for="edit_name">name</label>
                    <input type="text" class="form-control" name="name" id="edit_name" required="" placeholder="name" style="border-color: #844fd9;">
                </div>

                <div class="form-group">
                    <label for="edit_link_video">link_video</label>
                    <input type="text" class="form-control" name="link_video" id="edit_link_video"  placeholder="link_video">
                </div>
        
                <div class="form-group">
                    <label for="edit_sort_id">sort_id</label>
                    <input type="text" class="form-control number-only" name="sort_id" id="edit_sort_id"  placeholder="sort_id">
                </div>

                <div class="form-group">
                    <label for="edit_gallery_type_id">gallery_type_id</label>
                    <select name="gallery_type_id" data-placeholder="Select gallery_type_id" tabindex="-1" class="select2 form-control" id="edit_gallery_type_id"  >
                        <option value="">Select gallery_type_id</option>
                        @foreach($GalleryTypes as $GalleryType)
                        <option value="{{$GalleryType->id}}">{{$GalleryType->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-check">
                    <label for="edit_status" class="checkbox form-check-label">
                        <input type="checkbox" class="form-check-input" data-toggle="checkbox" name="status" id="edit_status"  value="1"> status
                    </label>
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
@section('js_bottom')
<script src="{{asset('assets/global/plugins/orakuploader/orakuploader.js')}}"></script>
<script>

     var TableList = $('#TableList').dataTable({
        "ajax": {
            "url": url_gb+"/admin/Gallery/Lists",
            "data": function ( d ) {
                //d.myKey = "myValue";
                // d.custom = $('#myInput').val();
                // etc
            }
        },
        "columns": [
            {"data" : "DT_RowIndex" , "className": "text-center", "searchable": false, "orderable": false},
            {"data" : "photo","width" : "20%"},
            {"data" : "name"},
            {"data" : "gallery_types_name", name:"gallery_types.name"},
            {"data" : "link_video","width" : "20%"},
            {"data" : "type"},
            {"data" : "sort_id"},
            {"data" : "status"},
            { "data": "action","className":"action text-center","searchable" : false , "orderable" : false }
        ]
    });
    $('body').on('click','.btn-add',function(data){
        ShowModal('ModalAdd');
    });
    $('body').on('click','.btn-edit',function(data){
        var btn = $(this);
        btn.button('loading');
        var id = $(this).data('id');
        $('#edit_id').val(id);
        $.ajax({
            method : "GET",
            url : url_gb+"/admin/Gallery/"+id,
            dataType : 'json'
        }).done(function(rec){
            $('#edit_name').val(rec.name);
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
        $('#edit_link_video').val(rec.link_video);
            $('#edit_sort_id').val(rec.sort_id);
            if(rec.status=='1'){
                $('#edit_status').prop('checked','checked').closest('label').addClass('checked');
            }else{
                $('#edit_status').removeAttr('checked').closest('label').removeClass('checked');
            }
            if(rec.type=='P'){
                $('#edit_typeP').prop("checked", true);
                $('#edit_typeV').prop("checked", false);
            }else{
                $('#edit_typeV').prop("checked", true);
                $('#edit_typeP').prop("checked", false);
            }
            $('#edit_gallery_type_id').val(rec.gallery_type_id).trigger('change');
            
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
        
        },
        messages: {
            
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
            /*
            if(CKEDITOR!==undefined){
                for ( instance in CKEDITOR.instances ){
                    CKEDITOR.instances[instance].updateElement();
                }
            }
            */
            var btn = $(form).find('[type="submit"]');
            var data_ar = removePriceFormat(form,$(form).serializeArray());
            btn.button("loading");
            $.ajax({
                method : "POST",
                url : url_gb+"/admin/Gallery",
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
            /*
            if(CKEDITOR!==undefined){
                for ( instance in CKEDITOR.instances ){
                    CKEDITOR.instances[instance].updateElement();
                }
            }
            */
            var btn = $(form).find('[type="submit"]');
            var id = $('#edit_id').val();
            btn.button("loading");
            $.ajax({
                method : "POST",
                url : url_gb+"/admin/Gallery/"+id,
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
                url : url_gb+"/admin/Gallery/Delete/"+id,
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
        $('#add_gallery_type_id').select2();
$('#edit_gallery_type_id').select2();

</script>
@endsection