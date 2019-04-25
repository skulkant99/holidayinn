@extends('Admin.layouts.layout')
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
                            {{$title_page or '' }}
                            <button class="btn btn-success btn-add pull-right" >
                                + Create data
                            </button>
                        </h4>
                        <div class="toolbar">
                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                        </div>
                        <div class="material-datatables">
                            <div class="table-responsive">
                                <table id="TableUser" class="table table-striped table-no-bordered table-hover" style="width:100%;cellspacing:0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Username</th>
                                            <th>Name</th>
                                            <th>Firstname</th>
                                            <th>Lastname</th>
                                            <th>Mobile</th>
                                            <th>Email</th>
                                            <th>Actions</th>
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
<div class="modal" id="ModalPermission" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="FormChangePermssion">
                <input type="hidden" name="id" id="permssion_user_id" >
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Permission manage</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th rowspan="2" class="text-center">Menu id</th>
                            <th rowspan="2" class="text-center">Menu name</th>
                            <th colspan="4" class="text-center">Permission write</th>
                        </tr>
                        <tr>
                            <th class="text-center">Access</th>
                            <th class="text-center">Create</th>
                            <th class="text-center">Edit</th>
                            <th class="text-center">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($menu_all as $key=>$menu)
                            <tr class="main">
                                <td class="text-center">{{$menu->id}}</td>
                                <td>{{$menu->name}}</td>
                                <td class="text-center">
                                    <label class="block">
                                        <input name="read[{{$menu->id}}]" value="{{$menu->id}}" type="checkbox" class="ace input read_{{$menu->id}}" />
                                        <span class="lbl bigger-120"></span>
                                    </label>
                                </td>
                                <td class="text-center">
                                    <label class="block">
                                        <input name="create[{{$menu->id}}]" value="{{$menu->id}}" type="checkbox" class="ace input create_{{$menu->id}}" />
                                        <span class="lbl bigger-120"></span>
                                    </label>
                                </td>
                                <td class="text-center">
                                    <label class="block">
                                        <input name="edit[{{$menu->id}}]" value="{{$menu->id}}" type="checkbox" class="ace input update_{{$menu->id}}" />
                                        <span class="lbl bigger-120"></span>
                                    </label>
                                </td>
                                <td class="text-center">
                                    <label class="block">
                                        <input name="delete[{{$menu->id}}]" value="{{$menu->id}}" type="checkbox" class="ace input delete_{{$menu->id}}" />
                                        <span class="lbl bigger-120"></span>
                                    </label>
                                </td>
                            </tr>
                            @if($menu->SubMenu)
                                @foreach($menu->SubMenu as $key=>$sub_menu)
                                    <tr class="sub">
                                        <td class="text-center">{{$sub_menu->id}}</td>
                                        <td>{{$menu->name}} > {{$sub_menu->name}}</td>
                                        <td class="text-center">
                                            <label class="block">
                                                <input name="read[{{$sub_menu->id}}]" value="{{$sub_menu->id}}" type="checkbox" class="ace input read_{{$sub_menu->id}}" />
                                                <span class="lbl bigger-120"></span>
                                            </label>
                                        </td>
                                        <td class="text-center">
                                            <label class="block">
                                                <input name="create[{{$sub_menu->id}}]" value="{{$sub_menu->id}}" type="checkbox" class="ace input create_{{$sub_menu->id}}" />
                                                <span class="lbl bigger-120"></span>
                                            </label>
                                        </td>
                                        <td class="text-center">
                                            <label class="block">
                                                <input name="edit[{{$sub_menu->id}}]" value="{{$sub_menu->id}}" type="checkbox" class="ace input update_{{$sub_menu->id}}" />
                                                <span class="lbl bigger-120"></span>
                                            </label>
                                        </td>
                                        <td class="text-center">
                                            <label class="block">
                                                <input name="delete[{{$sub_menu->id}}]" value="{{$sub_menu->id}}" type="checkbox" class="ace input delete_{{$sub_menu->id}}" />
                                                <span class="lbl bigger-120"></span>
                                            </label>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        @endforeach
                    </tbody>
                </table>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Save</button>
                    <button type="button" class="btn btn-warning text-left" data-dismiss="modal" aria-label="Close">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="FormAdd">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"> {{$title_page}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="add_username">Username</label>
                    <input type="text" class="form-control" name="username" id="add_username" placeholder="Username">
                </div>
                <div class="form-group">
                    <label for="add_pass">Password</label>
                    <input type="password" class="form-control" name="password" id="add_pass" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="add_firstname">Firstname</label>
                    <input type="text" class="form-control " name="firstname" id="add_firstname" placeholder="Firstname">
                </div>
                <div class="form-group">
                    <label for="add_lastname">Lastname</label>
                    <input type="text" class="form-control" name="lastname" id="add_lastname" placeholder="Lastname">
                </div>
                <div class="form-group">
                    <label for="add_mobile">Mobile</label>
                    <input type="phone" class="form-control" name="mobile" id="add_mobile" placeholder="">
                </div>
                <div class="form-group">
                    <label for="add_email">Email</label>
                    <input type="email" class="form-control" name="email" id="add_email" placeholder="example@email.com">
                </div>
                <div class="form-group">
                    <label for="add_photo_profile">photo_profile</label>
                    <div id="orak_add_photo_profile">
                        <div id="add_photo_profile" orakuploader="on"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-warning text-left" data-dismiss="modal" aria-label="Close">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="FormEdit">
            <input type="hidden" name="id" id="edit_user_id">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"> {{$title_page}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="edit_username">Username</label>
                    <input type="text" class="form-control" readonly id="edit_username" placeholder="Username">
                </div>
                <div class="form-group">
                    <label for="edit_firstname">Firstname</label>
                    <input type="text" class="form-control " name="firstname" id="edit_firstname" placeholder="Firstname">
                </div>
                <div class="form-group">
                    <label for="edit_lastname">Lastname</label>
                    <input type="text" class="form-control" name="lastname" id="edit_lastname" placeholder="Lastname">
                </div>
                <div class="form-group">
                    <label for="edit_mobile">Mobile</label>
                    <input type="phone" class="form-control" name="mobile" id="edit_mobile" placeholder="08XXXXXXX">
                </div>
                <div class="form-group">
                    <label for="edit_email">Email</label>
                    <input type="email" class="form-control" name="email" id="edit_email" placeholder="example@email.com">
                </div>
                <input type="hidden" name="org_photo_profile" id="org_photo_profile">
                <div class="form-group">
                    <label for="edit_photo_profile">photo_profile</label>
                    <div id="orak_edit_photo_profile">
                        <div id="edit_photo_profile" orakuploader="on"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                <button type="button" class="btn btn-warning text-left" data-dismiss="modal" aria-label="Close">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal" id="ModalChangePassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="FormChangePassword">
            <input type="hidden" name="id" id="user_id">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Change password</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="password">New password</label>
                    <input type="password" class="form-control bg-gray-lighter" name="password" id="password" placeholder="New password">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                <button type="button" class="btn btn-warning text-left" data-dismiss="modal" aria-label="Close">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection
@section('js_bottom')
<script src="{{asset('assets/global/plugins/orakuploader/orakuploader.js')}}"></script>
<script>

    var TableUser = $('#TableUser').dataTable({
        "ajax": {
            "url": url_gb+"/admin/AdminUser/Lists",
            "data": function ( d ) {

            }
        },
        "columns": [
            { "data": "DT_Row_Index" , "className": "text-center", "searchable": false, "orderable": false  },
            { "data": "username" },
            {"data" : "name", "name": "firstname", "searchable" : false},
            { "data": "firstname","visible": false },
            { "data": "lastname","visible": false },
            { "data": "mobile" },
            { "data": "email" },
            { "data": "action","className":"action text-center" , "searchable" : false, "orderable": false}
        ]
    });
    $('body').on('click','.btn-add',function(data){
        resetFormCustom('#FormAdd');
        ShowModal('ModalAdd');
    });

    $('body').on('click','.btn-edit',function(data){
        var btn = $(this);
        btn.button('loading');
        var id = $(this).data('id');
        $('#edit_user_id').val(id);
        $.ajax({
            method : "GET",
            url : url_gb+"/admin/AdminUser/"+id,
            dataType : 'json'
        }).done(function(rec){
            $('#edit_firstname').val(rec.firstname);
            $('#edit_lastname').val(rec.lastname);
            $('#edit_mobile').val(rec.mobile);
            $('#edit_email').val(rec.email);
            $('#edit_username').val(rec.username);
            $('#edit_photo_profile').closest('#orak_edit_photo_profile').html('<div id="edit_photo_profile" orakuploader="on"></div>');
            if(rec.photo_profile){
                var max_file = 0;
                var file = [];
                    file[0] = rec.photo_profile;
                var photo_profile = rec.photo_profile;
            }else{
                var max_file = 1;
                var file = [];
                var photo_profile = rec.photo_profile;
            }
            $('#edit_photo_profile').orakuploader({
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
                orakuploader_field_name         : 'photo_profile',
                orakuploader_finished           : function(){

                }
            });
            $('#org_photo_profile').val(photo_profile);
            
            btn.button("reset");
            ShowModal('ModalEdit');
        }).fail(function(){
            swal("system.system_alert","system.system_error","error");
            btn.button("reset");
        });
    });
    $('body').on('click','.btn-change-password',function(data){
        var id = $(this).data('id');
        $('#user_id').val(id);
        ShowModal('ModalChangePassword');
    });

    $('#FormAdd').validate({
        errorElement: 'div',
        errorClass: 'invalid-feedback',
        focusInvalid: false,
        rules: {
            firstname : {
                required : true,
            },
            lastname : {
                required : true,
            },
            username : {
                required : true,
            },
            password : {
                required : true,
                minlength: 4,
                maxlength: 16
            },
        },
        messages: {
            firstname : {
                required : 'Please insert.',
            },
            lastname : {
                required : 'Please insert.',
            },
            username : {
                required : 'Please insert.',
            },
            password : {
                required : 'Please insert.',
                minlength: 'Please insert min 4 character',
                maxlength: 'Please insert max 16 character'
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
            var btn = $(form).find('[type="submit"]');
            btn.button("loading");
            $.ajax({
                method : "POST",
                url : url_gb+"/admin/AdminUser",
                dataType : 'json',
                data : $(form).serialize()
            }).done(function(rec){
                btn.button("reset");
                if(rec.status==1){
                    TableUser.api().ajax.reload();
                    resetFormCustom(form);
                    swal(rec.title,rec.content,"success");
                    $('#ModalAdd').modal('hide');
                }else if(rec.status==2){
                    swal(rec.title,rec.content,"warning");
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
            firstname : {
                required : true,
            },
            lastname : {
                required : true,
            },
        },
        messages: {
            firstname : {
                required : 'Please insert.',
            },
            lastname : {
                required : 'Please insert.',
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
            var btn = $(form).find('[type="submit"]');
            var id = $('#edit_user_id').val();
            btn.button("loading");
            $.ajax({
                method : "POST",
                url : url_gb+"/admin/AdminUser/"+id,
                dataType : 'json',
                data : $(form).serialize()
            }).done(function(rec){
                btn.button("reset");
                if(rec.status==1){
                    TableUser.api().ajax.reload();
                    resetFormCustom(form);
                    swal(rec.title,rec.content,"success");
                    $('#ModalEdit').modal('hide');
                }else if(rec.status==2){
                    swal(rec.title,rec.content,"warning");
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

    $('#FormChangePassword').validate({
        errorElement: 'span',
        errorClass: 'help-block',
        focusInvalid: false,
        rules: {
            password: {
                required: true,
                minlength: 4,
                maxlength: 16
            }
        },
        messages: {
            password : {
                required : 'Please insert.',
                minlength: 'Please insert min 4 character',
                maxlength: 'Please insert max 16 character'
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
            var btn = $(form).find('[type="submit"]');
            var id = $(this).data('id');
            // $('#user_id').val(id);
            btn.button("loading");
            $.ajax({
                method : "POST",
                url : url_gb+"/admin/AdminUser/change_password",
                dataType : 'json',
                data : $(form).serialize()
            }).done(function(rec){
                btn.button("reset");
                if(rec.status==1){
                    resetFormCustom(form);
                    swal(rec.title,rec.content,"success");
                    $('#ModalChangePassword').modal('hide');
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

    $('body').on('click','.btn-change-permission',function(){
        var id = $(this).data('id');
        var btn = $(this);
        btn.button("loading");
        $('#permssion_user_id').val(id);
        $('#FormChangePermssion')[0].reset();
        $.ajax({
            method : "POST",
            url : url_gb+"/admin/GetPermission/"+id,
            dataType : 'json'
        }).done(function(rec){
            $.each(rec , function(){
                var menu_id = this.menu_id;
                var read = this.readed;
                var create = this.created;
                var update = this.updated;
                var deleted = this.deleted;
                if(create=='T'){
                    $('.create_'+menu_id).prop('checked','checked');
                }
                if(update=='T'){
                    $('.update_'+menu_id).prop('checked','checked');
                }
                if(deleted=='T'){
                    $('.delete_'+menu_id).prop('checked','checked');
                }
                if(read=='T'){
                    $('.read_'+menu_id).prop('checked','checked');
                }
            });
            btn.button("reset");
            ShowModal('ModalPermission');
        }).fail(function(){
            swal("system.system_alert","system.system_error","error");
            btn.button("reset");
        });
    });

    $('body').on('submit','#FormChangePermssion',function(e){
        e.preventDefault();
        var form = this;
        var btn = $(form).find('[type="submit"]');
        btn.button("loading");
        $.ajax({
            method : "POST",
            url : url_gb+"/admin/SetPermission",
            dataType : 'json',
            data : $(form).serialize()
        }).done(function(rec){
            btn.button("reset");
            if(rec.status==1){
                resetFormCustom(form);
                swal(rec.title,rec.content,"success");
                $('#ModalPermission').modal('hide');
            }else{
                swal(rec.title,rec.content,"error");
            }
        }).fail(function(){
            swal("system.system_alert","system.system_error","error");
            btn.button("reset");
        });
    });
    $('body').on('click','.btn-delete',function(e){
        e.preventDefault();
        var btn = $(this);
        var id = btn.data('id');
        swal({
            title: "Do you want to delete the data?",
            text: "If you delete, you will not be able to restore it.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, I want to delete",
            cancelButtonText: "Cancel",
            showLoaderOnConfirm: true,
        }).then(function() {
            $.ajax({
                method : "get",
                url : url_gb+"/admin/AdminUser/Delete/"+id,
                // data : {ID : id}
            }).done(function(rec){
                if(rec.status==1){
                    TableUser.api().ajax.reload();
                    swal(rec.title,rec.content,"success");
                }else{
                    swal("System error","Please contact the administrator.","error");
                }
            }).fail(function(data){
                swal("System error","Please contact the administrator.","error");
            });
        }).catch(function(e){
            //console.log(e);
        });
    });
    
    $('#add_photo_profile').orakuploader({
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
        orakuploader_field_name         : 'photo_profile',
        orakuploader_finished           : function(){

        }
    });
</script>
@endsection
