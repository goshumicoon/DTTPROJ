<?php


namespace ExportHtmlAdmin\EWPPTH_AjaxRequests\saveAdvancedSettings;

class initAjax extends \ExportHtmlAdmin\Export_Wp_Page_To_Static_Html_Admin
{

    public function __construct()
    {
        /*Initialize Ajax saveAdvancedSettings*/
        add_action('wp_ajax_saveAdvancedSettings', array( $this, 'saveAdvancedSettings' ));

    }

    /**
     * Ajax action name: saveAdvancedSettings
     * @since    2.0.0
     * @access   public
     * @return json
     */
    public function saveAdvancedSettings(){
        $createIndexOnSinglePage = isset($_POST['createIndexOnSinglePage']) && sanitize_key($_POST['createIndexOnSinglePage']) == 'true';
        $saveAllAssetsToSpecificDir = isset($_POST['saveAllAssetsToSpecificDir']) && sanitize_key($_POST['saveAllAssetsToSpecificDir']) == 'true';
        $keepSameName = isset($_POST['keepSameName']) && sanitize_key($_POST['keepSameName']) == '1';
        $addContentsToTheHeader = isset($_POST['addContentsToTheHeader']) ? sanitize_textarea_field($_POST['addContentsToTheHeader']) : "";
        $addContentsToTheFooter = isset($_POST['addContentsToTheFooter']) ? sanitize_textarea_field($_POST['addContentsToTheFooter']) : "";
        $excludeUrls = isset($_POST['excludeUrls']) ? sanitize_textarea_field($_POST['excludeUrls']) : "";

        \rcCheckNonce();
        update_option('rcExportHtmlCreateIndexOnSinglePage', $createIndexOnSinglePage);
        update_option('rcExportHtmlSaveAllAssetsToSpecificDir', $saveAllAssetsToSpecificDir);
        update_option('rcExportHtmlKeepSameName', $keepSameName);
        update_option('rcExportHtmlExcludeUrls', $excludeUrls);
        update_option('rcExportHtmlAddContentsToTheHeader', $addContentsToTheHeader);
        update_option('rcExportHtmlAddContentsToTheFooter', $addContentsToTheFooter);

        echo json_encode(array('success' => true, 'status' => 'success', 'response' => true));

        die();
    }


}