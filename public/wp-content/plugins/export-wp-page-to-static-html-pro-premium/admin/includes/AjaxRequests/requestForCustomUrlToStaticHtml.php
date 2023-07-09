<?php


namespace ExportHtmlAdmin\EWPPTH_AjaxRequests\requestForCustomUrlToStaticHtml;

use ExportHtmlAdmin\Export_Wp_Page_To_Static_Html_Admin;
use function ExportHtmlAdmin\EWPPTH_AjaxRequests\rcCheckNonce;

class initAjax extends Export_Wp_Page_To_Static_Html_Admin
{

    public function __construct()
    {
        /*Initialize Ajax rc_export_custom_url_to_static_html*/
        add_action('wp_ajax_rc_export_custom_url_to_static_html', array( $this, 'rc_export_custom_url_to_static_html' ));

    }


    /**
     * Ajax action name: rc_export_custom_url_to_static_html
     * @since    1.0.0
     * @access   public
     * @echo json
     */

    public function rc_export_custom_url_to_static_html(){
        //$post = $_POST['post'];
        $custom_link = isset($_POST['custom_link']) ? sanitize_text_field($_POST['custom_link']) : "";
        $replace_all_url = isset($_POST['replace_all_url']) && sanitize_key($_POST['replace_all_url']) == "true" ? true : false;
        $image_to_webp = isset($_POST['image_to_webp']) ? sanitize_key($_POST['image_to_webp']) == "true" : false;
        $image_quality = isset($_POST['image_quality']) ? (int) sanitize_key($_POST['image_quality']) : 80;
        $skip_assets_data = isset($_POST['skip_assets']) ? (array) $_POST['skip_assets'] : array();
        $skip_assets_data = array_map('sanitize_key', $skip_assets_data);
        $full_site = isset($_POST['full_site']) && sanitize_key($_POST['full_site']) == "true" ? true : false;
        $receive_email = isset($_POST['receive_email']) && sanitize_key($_POST['receive_email']) == "true" ? true : false;
        $email_lists = isset($_POST['email_lists'] ) ? sanitize_textarea_field($_POST['email_lists']) : "";
        $ftp = isset($_POST['ftp']) ? sanitize_key($_POST['ftp']) : 'no';
        $ftpPath = isset($_POST['path']) ? sanitize_text_field($_POST['path']) : '';
        $alt_export = isset($_POST['alt_export']) ? sanitize_key($_POST['alt_export']) == "true" : false;

        \rcCheckNonce();

        $this->removeAllSettings();

        $singlePage = false;
        if(!$full_site){
            $singlePage = true;
        }

        $settings = array(
            'full_site' => $full_site,
            'skipAssetsFiles' => $skip_assets_data,
            'replaceUrlsToHash' => $replace_all_url,
            'receive_email' => $receive_email,
            'email_lists' => $email_lists,
            'ftp_upload_enabled' => $ftp,
            'ftp_path' => $ftpPath,
            'singlePage' => $singlePage,
            'image_to_webp' => $image_to_webp,
            'image_quality' => $image_quality,
            'customUrl' => true,
            'customUrlAddress' => $custom_link,
            'alt_export' => $alt_export,
        );

        wp_schedule_single_event( time() , 'start_export_custom_url_to_html_event', array( $custom_link, $settings ) );

        echo json_encode(array('success' => 'true', 'status' => 'success', 'response' => 'task running'));

        die();
    }



}