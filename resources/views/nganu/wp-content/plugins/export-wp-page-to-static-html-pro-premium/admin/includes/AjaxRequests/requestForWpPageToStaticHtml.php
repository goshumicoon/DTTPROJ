<?php


namespace ExportHtmlAdmin\EWPPTH_AjaxRequests\requestForWpPageToStaticHtml;

use function ExportHtmlAdmin\EWPPTH_AjaxRequests\rcCheckNonce;

class initAjax extends \ExportHtmlAdmin\Export_Wp_Page_To_Static_Html_Admin
{

    public function __construct()
    {
        /*Initialize Ajax rc_export_wp_page_to_static_html*/
        add_action('wp_ajax_rc_export_wp_page_to_static_html', array( $this, 'rc_export_wp_page_to_static_html' ));

    }


    /**
     * Ajax action name: rc_export_wp_page_to_static_html
     * @since    1.0.0
     * @access   public
     * @return json
     */

    public function rc_export_wp_page_to_static_html(){
        //$post = $_POST['post'];
        $pages = isset($_POST['pages']) ? $_POST['pages'] : "";
        $pages = array_map('sanitize_key', $pages);

        $replace_urls = isset($_POST['replace_urls']) && sanitize_key($_POST['replace_urls']) == "true" ? true : false;
        $image_to_webp = isset($_POST['image_to_webp']) ? sanitize_key($_POST['image_to_webp']) == "true" : false;
        $image_quality = isset($_POST['image_quality']) ? (int) sanitize_key($_POST['image_quality']) : 80;

        $skip_assets_data = isset($_POST['skip_assets']) ? (array) $_POST['skip_assets'] : array();
        $skip_assets_data = array_map('sanitize_key', $skip_assets_data);

        $receive_email = isset($_POST['receive_email']) && sanitize_key($_POST['receive_email']) == "true" ? true : false;
        $email_lists = isset($_POST['email_lists'] ) ? sanitize_textarea_field($_POST['email_lists']) : "";
        $ftp = isset($_POST['ftp']) ? sanitize_key($_POST['ftp']) : 'no';
        $full_site = isset($_POST['full_site']) && sanitize_key($_POST['full_site']) == "yes" ? true : false;
        $ftpPath = isset($_POST['path']) ? sanitize_text_field($_POST['path']) : '';
        $login_as = isset($_POST['login_as']) ? sanitize_text_field($_POST['login_as']) : '';
        $alt_export = isset($_POST['alt_export']) ? sanitize_key($_POST['alt_export']) == "true" : false;

        \rcCheckNonce();
        //$this->removeAllSettings();

        $this->removeAllSettings();

        $singlePage = false;
        if(count($pages)==1 && !$full_site){
            $singlePage = true;
        }

        $settings = array(
            'skipAssetsFiles' => $skip_assets_data,
            'replaceUrlsToHash' => $replace_urls,
            'full_site' => $full_site,
            'login_as' => $login_as,
            'login_pass' => rand(111111, 9999999999),
            'receive_email' => $receive_email,
            'email_lists' => $email_lists,
            'ftp_upload_enabled' => $ftp,
            'image_to_webp' => $image_to_webp,
            'image_quality' => $image_quality,
            'ftp_path' => $ftpPath,
            '$alt_export' => $alt_export,
            'singlePage' => $singlePage
        );

        /*Clearing previous files and tables data*/
        //$this->clear_tables_and_files();

        /*Creating required direcories*/
        //$this->create_required_directories();

        if($this->clear_tables_and_files()){
            wp_schedule_single_event( time() , 'start_export_internal_wp_page_to_html_event', array( $pages, $settings ) );
        }

        echo json_encode(array('success' => 'true', 'status' => 'success', 'response' => $image_to_webp));

        die();

    }



}