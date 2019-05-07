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
                            {{$title_page  }}
                            {{-- <button class="btn btn-success btn-add pull-right" >
                                + เพิ่มข้อมูล
                            </button> --}}
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
                                        <th>first_name</th>
                                        <th>last_name</th>
                                        <th>email</th>
                                        <th>help_id</th>
                                        <th>detail</th>
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
                    
                <div class="form-group">
                    <label for="add_first_name">first_name</label>
                    <input type="text" class="form-control" name="first_name" id="add_first_name"  placeholder="first_name">
                </div>
        
                <div class="form-group">
                    <label for="add_last_name">last_name</label>
                    <input type="text" class="form-control" name="last_name" id="add_last_name"  placeholder="last_name">
                </div>
        
                <div class="form-group">
                    <label for="add_email">email</label>
                    <input type="text" class="form-control" name="email" id="add_email"  placeholder="email">
                </div>
        
                <div class="form-group">
                    <label for="add_help_id">help_id</label>
                    <select name="help_id" class="select2 form-control" tabindex="-1" data-placeholder="Select help_id" id="add_help_id"  >
                        <option value="">Select help_id</option>
                        @foreach($HelpTypes as $HelpType)
                        <option value="{{$HelpType->id}}">{{$HelpType->name}}</option>
                        @endforeach
                    </select>
                </div>
        
                <div class="form-group">
                    <label for="add_detail">detail</label>
                    <textarea id="add_detail" name="detail" class="form-control"></textarea>
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
                    
                <div class="form-group">
                    <label for="edit_first_name">first_name</label>
                    <input type="text" class="form-control" name="first_name" id="edit_first_name"  placeholder="first_name">
                </div>
        
                <div class="form-group">
                    <label for="edit_last_name">last_name</label>
                    <input type="text" class="form-control" name="last_name" id="edit_last_name"  placeholder="last_name">
                </div>
        
                <div class="form-group">
                    <label for="edit_email">email</label>
                    <input type="text" class="form-control" name="email" id="edit_email"  placeholder="email">
                </div>
        
                <div class="form-group">
                    <label for="edit_help_id">help_id</label>
                    <select name="help_id" data-placeholder="Select help_id" tabindex="-1" class="select2 form-control" id="edit_help_id"  >
                        <option value="">Select help_id</option>
                        @foreach($HelpTypes as $HelpType)
                        <option value="{{$HelpType->id}}">{{$HelpType->name}}</option>
                        @endforeach
                    </select>
                </div>
        
                <div class="form-group">
                    <label for="edit_detail">detail</label>
                    <textarea id="edit_detail" name="detail" class="form-control"></textarea>
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
            "url": url_gb+"/admin/ContactHelp/Lists",
            "data": function ( d ) {
                //d.myKey = "myValue";
                // d.custom = $('#myInput').val();
                // etc
            }
        },
        "columns": [
            {"data" : "DT_RowIndex" , "className": "text-center", "searchable": false, "orderable": false},
            {"data" : "first_name"},
            {"data" : "last_name"},
            {"data" : "email"},
            {"data" : "help_type_name", name: "help_types.name"},
            {"data" : "detail"},
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
            url : url_gb+"/admin/ContactHelp/"+id,
            dataType : 'json'
        }).done(function(rec){
            $('#edit_first_name').val(rec.first_name);
            $('#edit_last_name').val(rec.last_name);
            $('#edit_email').val(rec.email);
            $('#edit_help_id').val(rec.help_id).trigger('change');
            CKEDITOR.instances['edit_detail'].setData(rec.detail);
            
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
                url : url_gb+"/admin/ContactHelp",
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
            var id = $('#edit_id').val();
            btn.button("loading");
            $.ajax({
                method : "POST",
                url : url_gb+"/admin/ContactHelp/"+id,
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
                url : url_gb+"/admin/ContactHelp/Delete/"+id,
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

    $('#add_help_id').select2();
$('#edit_help_id').select2();
CKEDITOR.replace('add_detail');
    CKEDITOR.replace('edit_detail');

</script>
@endsection