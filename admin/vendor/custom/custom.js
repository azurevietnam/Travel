/**
 * Created by HAILONG on 8/1/2015.
 */
var postForm = function() {

    var content_vi = $('textarea[name="content_vi"]').html($('#summernote').code());
    var content_en = $('textarea[name="content_en"]').html($('#summernote').code());
    var price_cnt_vi = $('textarea[name="price_cnt_vi"]').html($('#summernote').code());
    var price_cnt_en = $('textarea[name="price_cnt_en"]').html($('#summernote').code());
    var note_vi = $('textarea[name="note_vi"]').html($('#summernote').code());
    var note_en = $('textarea[name="note_en"]').html($('#summernote').code());
};
$(document).ready(function() {
    console.log('--Start--');
    $(document.body).on("change","#drb_national",function(){
        console.log('--end--');
        $.ajax({
            url:"<?php echo base_url('admin_tours/getLocation'); ?>",
            data: {national: $(this).val()},
            type: "POST",
            success: function(data){

                $("#drb_province").html(data);
            }
        });
    });
    $(document.body).on("change","#str_arv_national",function(){
        $.ajax({
            url:"<?php echo base_url('admin_tours/getLocation'); ?>",
            data: {national: $(this).val()},
            type: "POST",
            success: function(data){

                $("#str_arv_province").html(data);
            }
        });
    });
    $(document.body).on("change","#str_dpt_national",function(){
        $.ajax({
            url:"<?php echo base_url('admin_tours/getLocation'); ?>",
            data: {national: $(this).val()},
            type: "POST",
            success: function(data){

                $("#str_dpt_province").html(data);
            }
        });
    });
    $(document.body).on("change","#end_arv_national",function(){
        $.ajax({
            url:"<?php echo base_url('admin_tours/getLocation'); ?>",
            data: {national: $(this).val()},
            type: "POST",
            success: function(data){

                $("#end_arv_province").html(data);
            }
        });
    });
    $(document.body).on("change","#end_dpt_national",function(){
        $.ajax({
            url:"<?php echo base_url('admin_tours/getLocation'); ?>",
            data: {national: $(this).val()},
            type: "POST",
            success: function(data){

                $("#end_dpt_province").html(data);
            }
        });
    });
    //summernote upload images
    $('#summernote').summernote({
        onImageUpload: function(files, editor, welEditable) {
            sendFile(files[0], editor, welEditable);
        }
    });
});