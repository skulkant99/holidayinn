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
                                {{-- <button class="btn btn-success btn-add pull-right" >
                                    + เพิ่มข้อมูล
                                </button> --}}
                            </h4>
                            <div class="toolbar">
                                <!--        Here you can write extra buttons/actions for the toolbar              -->
                            </div>
                            {{-- <div class="material-datatables">
                                <div class="table-responsive">
                                    <table id="TableList" class="table" style="width:100%">
                                        <thead>
                                            <tr>
                                            <th>#</th>
                                            <th>ชื่อ</th>
                                            <th>รูปภาพ</th>
                                            <th>ลำดับ</th>
                                            <th>สถานะ</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div> --}}
                            <?php
                                $service = \App\Models\Contact::where('id',1)->get();
                                $reservation = \App\Models\Contact::where('id',2)->get();
                                $marketing = \App\Models\Contact::where('id',3)->get();
                                $sales = \App\Models\Contact::where('id',4)->get();
                                $location = \App\Models\Contact::where('id',5)->get();
                            ?>
                             <div class="row">
                                <div class="col-md-6">
                                  
                                    <form id="add_service">
                                            <div class="form-group">
                                                <label for="add_name">Guest Service assistance</label>
                                                @foreach ($service as $_service)
                                                    <input type="hidden" name="id" id="id" value="{{$_service->id}}">
                                                    <input id="add_name" name="name" class="form-control" placeholder="Guest Service assistance" value="{{$_service->name}}">
                                                @endforeach
                                                <br>
                                                <button type="submit" class="btn btn-primary">submit</button>
                                            </div>
                                    </form>
                                </div>
                                <div class="col-md-6">
                                        <form id="add_reservation">
                                                <div class="form-group">
                                                    <label for="add_name">Reservation assistance</label>
                                                    @foreach ($reservation as $_reservation)
                                                        <input type="hidden" name="id" id="id_reservation" value="{{$_reservation->id}}">
                                                        <input id="add_name" name="name" class="form-control" placeholder="Reservation assistance" value="{{$_reservation->name}}">
                                                    @endforeach
                                                    <br>
                                                    <button type="submit" class="btn btn-primary">submit</button>
                                                </div>
                                        </form>
                                </div>
                            </div>

                            <div class="row">
                                    <div class="col-md-6">
                                        <form id="add_marketing">
                                                <div class="form-group">
                                                    <label for="add_name">Marketing assistance</label>
                                                    @foreach ($marketing as $_marketing)
                                                        <input type="hidden" name="id" id="id_marketing" value="{{$_marketing->id}}">
                                                        <input id="add_name" name="name" class="form-control" placeholder="Marketing assistance" value="{{$_marketing->name}}">
                                                    @endforeach
                                                    <br>
                                                    <button type="submit" class="btn btn-primary">submit</button>
                                                </div>
                                        </form>
                                    </div>
                                    <div class="col-md-6">
                                            <form id="add_sales">
                                                    <div class="form-group mb-3">
                                                        <label for="add_name">Sales assistance</label>
                                                        @foreach ($sales as $_sales)
                                                            <input type="hidden" name="id" id="id_sales" value="{{$_sales->id}}">
                                                            <input id="add_name" name="name" class="form-control" placeholder="Sales assistance" value="{{$_sales->name}}">
                                                        @endforeach
                                                        <br>
                                                        <button type="submit" class="btn btn-primary">submit</button>
                                                    </div>
                                            </form>
                                    </div>
                                </div>

                                <form id="location">
                                        <label for="add_name">Location</label>
                                        <div class="input-group mb-3">
                                                @foreach ($location as $_location)
                                                    <input type="hidden" name="id" id="id_location" value="{{$_location->id}}">
                                                    <input type="text" class="form-control" placeholder="Location" name="name" id="location" value="{{$_location->name}}">
                                                    <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary" type="submit">submit</button>
                                                    </div>
                                                @endforeach
                                        </div>
                                </form> 
                                <div class="row">
                                        <div class="col-md-2">
                                        </div>
                                        <div class="col-md-8">
                                            @foreach ($location as $_location)
                                             <iframe src="{{$_location->name}}" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
                                                
                                            @endforeach
                                        </div>
                                        <div class="col-md-2">
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
        <div class="modal-dialog" role="document"  style="max-width:40%;max-height:40%;">
            <div class="modal-content">
                <form id="FormAdd">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">เพิ่ม {{$title_page}}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                    
                    <div class="form-group">
                        <label for="add_name">ชื่อ</label>
                        <input id="add_name" name="name" class="form-control" placeholder="ชื่อ">
                    </div>

                    <div class="form-group">
                        <label for="add_photo">รูปภาพ</label>
                        <div id="orak_add_photo">
                            <div id="add_photo" orakuploader="on"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="add_link">ลิงค์</label>
                        <input id="add_link" name="link" class="form-control" placeholder="ลิงค์">
                    </div>

                    <div class="form-group">
                        <label for="add_sort_id">ลำดับ</label>
                        <input type="text" class="form-control number-only" name="sort_id" id="add_sort_id"  placeholder="ลำดับ">
                    </div>
                
                    <div class="form-group">
                        <label for="add_status">สถานะ</label>
                        <select  class="form-control number-only select2" name="status" id="add_status" tabindex="-1" data-placeholder="เลือก สถานะ">
                            <option value="">เลือก</option>
                            <option value="1">ใช้งาน</option>
                            <option value="2">ไม่ใช้งาน</option>
                        </select>
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
            <div class="modal-dialog" role="document"  style="max-width:40%;max-height:40%;">
                <div class="modal-content">
                    <input type="hidden" name="edit_id" id="edit_id">
                    <form id="FormEdit">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">แก้ไข {{$title_page}}</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                        
                        <div class="form-group">
                            <label for="edit_name">ชื่อ</label>
                            <input id="edit_name" name="name" class="form-control" placeholder="ชื่อ">
                        </div>

                        <input type="hidden" name="org_photo" id="org_photo">
                        <div class="form-group">
                            <label for="edit_photo">รูปภาพ</label>
                            <div id="orak_edit_photo">
                                <div id="edit_photo" orakuploader="on"></div>
                            </div>
                        </div>  
                        
                        <div class="form-group">
                            <label for="edit_link">ลิงค์</label>
                            <input id="edit_link" name="link" class="form-control" placeholder="ลิงค์">
                        </div>
 
                        <div class="form-group">
                            <label for="add_sort_id">ลำดับ</label>
                            <input type="text" class="form-control number-only" name="sort_id" id="edit_sort_id"  placeholder="ลำดับ">
                        </div>

                        <div class="form-group">
                            <label for="add_status">สถานะ</label>
                            <select  class="form-control number-only select2" name="status" id="edit_status" tabindex="-1" data-placeholder="เลือก สถานะ">
                                <option value="">เลือก</option>
                                <option value="1">ใช้งาน</option>
                                <option value="2">ไม่ใช้งาน</option>
                            </select>
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
                "url": url_gb+"/admin/contact/Lists",
                "data": function ( d ) {
                    //d.myKey = "myValue";
                    // d.custom = $('#myInput').val();
                    // etc
                }
            },
            "columns": [
                {"data" : "DT_RowIndex" , "className": "text-center", "searchable": false, "orderable": false},
                {"data" : "name"},
                {"data" : "photo"},
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
                url : url_gb+"/admin/contact/show/"+id,
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

                $('#edit_name').val(rec.name);
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

                // if(CKEDITOR!==undefined){
                //     for ( instance in CKEDITOR.instances ){
                //         CKEDITOR.instances[instance].updateElement();
                //     }
                // }

                var btn = $(form).find('[type="submit"]');
                var data_ar = removePriceFormat(form,$(form).serializeArray());
                btn.button("loading");
                $.ajax({
                    method : "POST",
                    url : url_gb+"/admin/contact",
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
        $('#add_service').validate({
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

                // if(CKEDITOR!==undefined){
                //     for ( instance in CKEDITOR.instances ){
                //         CKEDITOR.instances[instance].updateElement();
                //     }
                // }

                var btn = $(form).find('[type="submit"]');
                var id = $('#id').val();
                btn.button("loading");
                $.ajax({
                    method : "POST",
                    url : url_gb+"/admin/contact/"+id,
                    dataType : 'json',
                    data : $(form).serialize()
                }).done(function(rec){
                    btn.button("reset");
                    if(rec.status==1){
                        // TableList.api().ajax.reload();
                        resetFormCustom(form);
                        swal(rec.title,rec.content,"success");
                        $('#ModalEdit').modal('hide');
                        location.reload();
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
        $('#add_reservation').validate({
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

                // if(CKEDITOR!==undefined){
                //     for ( instance in CKEDITOR.instances ){
                //         CKEDITOR.instances[instance].updateElement();
                //     }
                // }

                var btn = $(form).find('[type="submit"]');
                var id = $('#id_reservation').val();
                btn.button("loading");
                $.ajax({
                    method : "POST",
                    url : url_gb+"/admin/contact/"+id,
                    dataType : 'json',
                    data : $(form).serialize()
                }).done(function(rec){
                    btn.button("reset");
                    if(rec.status==1){
                        // TableList.api().ajax.reload();
                        resetFormCustom(form);
                        swal(rec.title,rec.content,"success");
                        $('#ModalEdit').modal('hide');
                        location.reload();
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
        $('#add_marketing').validate({
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

                // if(CKEDITOR!==undefined){
                //     for ( instance in CKEDITOR.instances ){
                //         CKEDITOR.instances[instance].updateElement();
                //     }
                // }

                var btn = $(form).find('[type="submit"]');
                var id = $('#id_marketing').val();
                btn.button("loading");
                $.ajax({
                    method : "POST",
                    url : url_gb+"/admin/contact/"+id,
                    dataType : 'json',
                    data : $(form).serialize()
                }).done(function(rec){
                    btn.button("reset");
                    if(rec.status==1){
                        // TableList.api().ajax.reload();
                        resetFormCustom(form);
                        swal(rec.title,rec.content,"success");
                        $('#ModalEdit').modal('hide');
                        location.reload();
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

        $('#add_sales').validate({
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

                // if(CKEDITOR!==undefined){
                //     for ( instance in CKEDITOR.instances ){
                //         CKEDITOR.instances[instance].updateElement();
                //     }
                // }

                var btn = $(form).find('[type="submit"]');
                var id = $('#id_sales').val();
                btn.button("loading");
                $.ajax({
                    method : "POST",
                    url : url_gb+"/admin/contact/"+id,
                    dataType : 'json',
                    data : $(form).serialize()
                }).done(function(rec){
                    btn.button("reset");
                    if(rec.status==1){
                        // TableList.api().ajax.reload();
                        resetFormCustom(form);
                        swal(rec.title,rec.content,"success");
                        $('#ModalEdit').modal('hide');
                        location.reload();
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

        
        $('#location').validate({
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

                // if(CKEDITOR!==undefined){
                //     for ( instance in CKEDITOR.instances ){
                //         CKEDITOR.instances[instance].updateElement();
                //     }
                // }

                var btn = $(form).find('[type="submit"]');
                var id = $('#id_location').val();
                btn.button("loading");
                $.ajax({
                    method : "POST",
                    url : url_gb+"/admin/contact/"+id,
                    dataType : 'json',
                    data : $(form).serialize()
                }).done(function(rec){
                    btn.button("reset");
                    if(rec.status==1){
                        // TableList.api().ajax.reload();
                        resetFormCustom(form);
                        swal(rec.title,rec.content,"success");
                        $('#ModalEdit').modal('hide');
                        location.reload();
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
                    url : url_gb+"/admin/contact/Delete/"+id,
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
        $('#add_status').select2();
        $('#edit_status').select2();
    </script>
@endsection
