<?php

namespace ExportHtmlAdmin\EWPPTH_AjaxRequests;
/**
 * Class name: EWPPTH_AjaxRequests
 */
class EWPPTH_AjaxRequests
{

    public function __construct()
    {
        $this->initAjaxRequestsFiles();
        $this->initAjaxRequestsClass();
    }

    public function initAjaxRequestsFiles()
    {
        include 'AjaxRequests/requestForWpPageToStaticHtml.php';
        include 'AjaxRequests/requestForCustomUrlToStaticHtml.php';
        include 'AjaxRequests/seeLogsInDetails.php';
        include 'AjaxRequests/exportLogPercentage.php';
        include 'AjaxRequests/searchPosts.php';
        include 'AjaxRequests/checkExportingProcessOnSettingsPageLoad.php';
        include 'AjaxRequests/deleteExportedZipFile.php';
        include 'AjaxRequests/exploreFtpDirectory.php';
        include 'AjaxRequests/getFtpDirFileList.php';
        include 'AjaxRequests/checkFtpConnectionStatus.php';
        include 'AjaxRequests/cancelRcExportProcess.php';
        include 'AjaxRequests/saveAdvancedSettings.php';
        include 'AjaxRequests/dismiss_export_html_notice.php';
        include 'AjaxRequests/rc_html_export_files_action.php';
        include 'AjaxRequests/pause_and_resume.php';

        include 'Zip.php';

    }

    public function initAjaxRequestsClass()
    {
        new seeLogsInDetails\initAjax;
        new exportLogPercentage\initAjax;
        new searchPosts\initAjax;
        new requestForWpPageToStaticHtml\initAjax;
        new requestForCustomUrlToStaticHtml\initAjax;
        new checkExportingProcessOnSettingsPageLoad\initAjax;
        new deleteExportedZipFile\initAjax;
        new getFtpDirFileList\initAjax;
        new exploreFtpDirectory\initAjax;
        new checkFtpConnectionStatus\initAjax;
        new cancelRcExportProcess\initAjax;
        new saveAdvancedSettings\initAjax;
        new dismissExportHtmlNotice\initAjax;
        new rcHtmlExportFilesAction\initAjax;
        new rcExportSetPause\initAjax;

    }

}

new EWPPTH_AjaxRequests;


