$(document).on("click", ".export_external_page_to_html", function(e){
    e.preventDefault();

    var custom_link = $('.custom_link_section input').val();
    var replace_all_url = false;
    var full_site = false;
    var receive_email = $('#email_notification2').is(':checked') ? true : false;
    var email_lists = $('#receive_notification_email2').val();

    var custom_image_to_webp = $('#custom_image_to_webp').is(':checked') ? true : false;

    var skip_assets = $('#custom_url_skip_assets').is(':checked') ? true : false;
    var skip_stylesheets = $('#custom_url_skip_stylesheets').is(':checked') ? true : false;
    var skip_scripts = $('#custom_url_skip_scripts').is(':checked') ? true : false;
    var skip_images = $('#custom_url_skip_images').is(':checked') ? true : false;
    var skip_videos = $('#custom_url_skip_videos').is(':checked') ? true : false;
    var skip_audios = $('#custom_url_skip_audios').is(':checked') ? true : false;
    var skip_docs = $('#custom_url_skip_docs').is(':checked') ? true : false;

    var alt_export = $('#custom_alt_export').is(':checked') ? true : false;

    if ($('#full_site2').is(":checked")) {
        full_site = true;
    }

    if (custom_link.length > 0) {
        ClearExportLogsData();
        $('.logs_list').html('');
        $('.progress').removeClass('completed');
        $('.see_logs_in_details').show();
        $('.htmlExportLogs').show();

        $(this).find('.spinner_x').removeClass('hide_spin');
        $('.download-btn').addClass('hide');
        $('.export_failed.error').hide();
        $('.cancel_rc_html_export_process').show()
        $('#cancel_ftp_process').val('false');

        $(this).attr('disabled', 'disabled');


        var ftp = 'no';
        var path = '';
        var ftp_data = {};
        if ($('#upload_to_ftp2').is(":checked")) {
            ftp = 'yes';

            if ($('#ftp_path2').val() !== "") {
                path = $('#ftp_path2').val();
            }
        }


        var skip_assets_data = {};
        if(skip_assets){
            if(skip_stylesheets){
                skip_assets_data['stylesheets'] = true;
            }
            if(skip_scripts){
                skip_assets_data['scripts'] = true;
            }
            if(skip_images){
                skip_assets_data['images'] = true;
            }
            if(skip_videos){
                skip_assets_data['videos'] = true;
            }
            if(skip_audios){
                skip_assets_data['audios'] = true;
            }
            if(skip_docs){
                skip_assets_data['docs'] = true;
            }
        }

        var datas = {
            'action': 'rc_export_custom_url_to_static_html',
            'rc_nonce': rcewpp.nonce,
            'custom_link': custom_link,
            'replace_all_url': replace_all_url,
            'skip_assets': skip_assets_data,
            'image_to_webp': custom_image_to_webp,
            'image_quality': $('#custom_image_quality').val(),
            'full_site': full_site,
            'ftp': ftp,
            'path': path,
            'receive_email': receive_email,
            'email_lists': email_lists,
            'alt_export': alt_export,
        };

        $.ajax({
            url: rcewpp.ajax_url,
            data: datas,
            type: 'post',
            dataType: 'json',

            beforeSend: function(){

            },
            success: function(r){
                if(r.success == 'true'){
                    $('.flat-button.pause').show();
                    get_export_log_percentage(1000);

                } else {
                    console.log('Something went wrong, please try again!');
                }

            }, error: function(){

            }
        });
    }
    else{
        alert('Please Enter an url');
    }
});
