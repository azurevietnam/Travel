//var currUrl = 'http://localhost/Travel/';
var currUrl = 'http://'+window.location.hostname+'/';
//post form setting
var postForm = function() {
    var content_vi = $('textarea[name="content_vi"]').html($('#summernote').code());
    var content_en = $('textarea[name="content_en"]').html($('#summernote').code());
    var price_cnt_vi = $('textarea[name="price_cnt_vi"]').html($('#summernote').code());
    var price_cnt_en = $('textarea[name="price_cnt_en"]').html($('#summernote').code());
    var note_vi = $('textarea[name="note_vi"]').html($('#summernote').code());
    var note_en = $('textarea[name="note_en"]').html($('#summernote').code());
};
//dropbox change function

$(document).ready(function() {
    $(document.body).on("change","#drb_national",function(){
        $.ajax({
            //url:"<?php echo base_url('admin_tours/getLocation'); ?>",
            url:currUrl+"admin_tours/getLocation",
            data: {national: $(this).val()},
            type: "POST",
            success: function(data){

                $("#drb_province").html(data);
            }
        });
    });
    $(document.body).on("change","#str_arv_national",function(){
        $.ajax({
            url:currUrl+"admin_tours/getLocation",
            data: {national: $(this).val()},
            type: "POST",
            success: function(data){

                $("#str_arv_province").html(data);
            }
        });
    });
    $(document.body).on("change","#str_dpt_national",function(){
        $.ajax({
            url:currUrl+"admin_tours/getLocation",
            data: {national: $(this).val()},
            type: "POST",
            success: function(data){

                $("#str_dpt_province").html(data);
            }
        });
    });
    $(document.body).on("change","#end_arv_national",function(){
        $.ajax({
            url:currUrl+"admin_tours/getLocation",
            data: {national: $(this).val()},
            type: "POST",
            success: function(data){

                $("#end_arv_province").html(data);
            }
        });
    });
    $(document.body).on("change","#end_dpt_national",function(){
        $.ajax({
            url:currUrl+"admin_tours/getLocation",
            data: {national: $(this).val()},
            type: "POST",
            success: function(data){

                $("#end_dpt_province").html(data);
            }
        });
    });
});

//image management script
$(document).ready(function(){
    var img_var = 1;
    var strImgApp = '<div class="form-group"><label class="col-md-3 control-label">Thêm Ảnh</label>';
    strImgApp +='<div class="col-md-5"><div class="fileupload fileupload-new" data-provides="fileupload"><div class="input-append">';
    strImgApp +='<div class="uneditable-input"><i class="fa fa-file fileupload-exists"></i><span class="fileupload-preview"></span></div>';
    strImgApp +='<span class="btn btn-default btn-file"><span class="fileupload-exists">Change</span>';
    strImgApp +='<span class="fileupload-new">Select file</span><input type="file" name="tour_img'+img_var+'" required/></span>';
    strImgApp +='<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a></div></div></div>';
    strImgApp +='<div class="col-md-3"><input name="image_n0'+img_var+'" id="image_n0'+img_var+'" data-role="tagsinput" data-tag-class="label label-primary" class="form-control" value="" placeholder="Mô tả" required="required"/>';
    strImgApp +='</div></div>.';
    $("#add_images").click(function(){
        $("#images_upload").append(strImgApp);
        img_var ++;
        strImgApp = '<div class="form-group"><label class="col-md-3 control-label">Thêm Ảnh</label>';
        strImgApp +='<div class="col-md-5"><div class="fileupload fileupload-new" data-provides="fileupload"><div class="input-append">';
        strImgApp +='<div class="uneditable-input"><i class="fa fa-file fileupload-exists"></i><span class="fileupload-preview"></span></div>';
        strImgApp +='<span class="btn btn-default btn-file"><span class="fileupload-exists">Change</span>';
        strImgApp +='<span class="fileupload-new">Select file</span><input type="file" name="tour_img'+img_var+'" required/></span>';
        strImgApp +='<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a></div></div></div>';
        strImgApp +='<div class="col-md-3"><input name="image_n0'+img_var+'" id="image_n0'+img_var+'" data-role="tagsinput" data-tag-class="label label-primary" class="form-control" value="" placeholder="Mô tả" required="required"/>';
        strImgApp +='</div></div>.';
    });
});
// schedule change status
function changeStatus(divID, cbxID, cntID){
    var e = document.getElementById(cbxID);
    var cbxValue = e.options[e.selectedIndex].value;
    if(cbxValue == 'D'){
        $( "#"+divID ).removeClass().addClass( "form-group has-error" );
        $( "#"+cntID ).removeClass().addClass( "form-group has-error" );
    }else{
        $( "#"+divID ).removeClass().addClass( "form-group has-success" );
        $( "#"+cntID ).removeClass().addClass( "form-group has-success" );
    }
}
//schedule management script
$(document).ready(function(){
    var scd_var = 0;
    var strscdApp = '';
    $("#add_schedule").click(function(){
        scd_var ++;

        strscdApp = '<div class="form-group"><div class="col-md-1"></div><div class="col-md-2">';
        strscdApp +='<input type="text" class="form-control" name="txt_day_'+scd_var+'" id="txt_day_'+scd_var+'"';
        strscdApp +='placeholder="Ngày thứ (Số)" value="" required="required"></div>';
        strscdApp +='<div class="col-md-3"><input type="text" class="form-control" name="start_time_'+scd_var+'"';
        strscdApp +='id="start_time_'+scd_var+'" placeholder="Thời gian bắt đầu. (06:30 AM)" ';
        strscdApp +='value="" required="required"></div><div class="col-md-4">';
        strscdApp +='<input type="text" class="form-control" name="end_time_'+scd_var+'" id="end_time_'+scd_var+'"';
        strscdApp +='placeholder="Thời gian kết thúc. (06:30 PM)" value="" required="required">';
        strscdApp +='</div><div class="col-md-2"></div></div>';
        strscdApp +='<div class="form-group">';
        strscdApp +='<div class="col-md-1"></div><div class="col-md-5">';
        strscdApp +='<textarea class="form-control" rows="5" id="cnt_vi_'+scd_var+'" name="cnt_vi_'+scd_var+'"';
        strscdApp +='placeholder="Nội dung kế hoạch - Tiếng Việt"required="required"></textarea>';
        strscdApp +='</div><div class="col-md-5">';
        strscdApp +='<textarea class="form-control" rows="5" id="cnt_en_'+scd_var+'" name="cnt_en_'+scd_var+'"';
        strscdApp +='placeholder="Nội dung kế hoạch - Tiếng Anh" required="required"></textarea>';
        strscdApp +='</div></div></div><hr/>';

        $("#schedule_upload").append(strscdApp);
    });
});