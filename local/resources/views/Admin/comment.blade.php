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
                            <div class="material-datatables">
                                <div class="table-responsive">
                                    <table id="TableList" class="table" style="width:100%">
                                        <thead>
                                            <tr>
                                            <th>#</th>
                                            <th>comment</th>
                                            <th>comment_by</th>
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
                            <label for="add_detail">comment</label>
                            <textarea id="add_detail" name="comment" class="form-control"></textarea>
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
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">บันทึก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal" id="ModalEdit"  role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document"  style="max-width:50%;max-height:50%;">
                <div class="modal-content">
                    <input type="hidden" name="edit_id" id="edit_id">
                    <form id="FormEdit">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">แก้ไข {{$title_page}}</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                                                                     
                        <div class="form-group">
                                <label for="edit_comment">comment</label>
                                <textarea id="edit_comment" name="comment" class="form-control"></textarea>
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
                "url": url_gb+"/admin/information/ListsComment",
                "data": function ( d ) {
                    d.information_id = {{$id}};
                    // d.custom = $('#myInput').val();
                    // etc
                }
            },
            "columns": [
                {"data" : "DT_RowIndex" , "className": "text-center", "searchable": false, "orderable": false},
                {"data" : "comment"},
                {"data" : "comment_by"},
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
                url : url_gb+"/admin/Comment/show/"+id,
                dataType : 'json'
            }).done(function(rec){
                console.log(rec);

                // CKEDITOR.instances['edit_comment'].setData(rec.comment);
                $('#edit_comment').val(rec.comment);
                $('#edit_status').val(rec.status);
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
                    url : url_gb+"/admin/Comment",
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
                    url : url_gb+"/admin/Comment/"+id,
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
                    url : url_gb+"/admin/Comment/Delete/"+id,
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
       
        CKEDITOR.replace('add_comment');
        CKEDITOR.replace('edit_comment');
        $('#add_status').select2();
        $('#edit_status').select2();
    </script>
@endsection
