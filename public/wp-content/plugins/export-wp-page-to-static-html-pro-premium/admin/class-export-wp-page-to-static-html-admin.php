<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.upwork.com/fl/rayhan1
 * @since      1.0.0
 *
 * @package    Export_Wp_Page_To_Static_Html
 * @subpackage Export_Wp_Page_To_Static_Html/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Export_Wp_Page_To_Static_Html
 * @subpackage Export_Wp_Page_To_Static_Html/admin
 * @author     ReCorp <rayhankabir1000@gmail.com>
 */

namespace ExportHtmlAdmin;
use voku\helper\HtmlDomParser;

ini_set('max_execution_time', 60*60*240);
ini_set('memory_limit','302400M');
/*ini_set('display_errors','Off');
ini_set('error_reporting', E_ALL );*/
ini_set('xdebug.max_nesting_level', 2000);

class Export_Wp_Page_To_Static_Html_Admin {

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

    public $upload_dir;
    public $upload_url;
    public $export_dir;
    public $export_temp_dir;
    public $css_path;
    public $fonts_path;
    public $js_path;
    public $img_path;
    public $video_path;
    public $audio_path;
    public $docs_path;

    public $site_data = "";
    public $site_data_html = "";
    protected $site_url = "";
    public $queue_event_key = "";
    private $image_extensions;
    private $video_extensions;
    private $audio_extensions;
    private $docs_extensions;
    private $html_extensions;
    private $saveAllAssetsToSpecificDir;
    private $keepSameName;
    private $rcExportHtmlAddContentsToTheHeader;
    private $rcExportHtmlAddContentsToTheFooter;
    public $settingsKey = "rc_export_page_to_html__";

    /*Extract methods*/
    private $extract_stylesheets;
    private $extract_scripts;
    private $extract_images;
    private $inline_css;
    private $extract_meta_images;
    private $extract_videos;
    private $extract_audios;
    private $extract_docs;

    /*Ftp functions*/
    public $ftpFunctions;


    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string    $plugin_name       The name of this plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct( $plugin_name, $version ) {

        $this->plugin_name = $plugin_name;
        $this->version = $version;



        $this->upload_dir = wp_upload_dir()['basedir'];
        $this->upload_url = wp_upload_dir()['baseurl'];
        $this->export_dir = $this->upload_dir . '/exported_html_files';
        $this->export_url = $this->upload_url . '/exported_html_files';
        $this->export_temp_dir = $this->upload_dir . '/exported_html_files/tmp_files';
        $this->export_temp_url = $this->upload_url . '/exported_html_files/tmp_files';

        $this->css_path = $this->export_temp_dir . '/css/';
        $this->fonts_path = $this->export_temp_dir . '/fonts/';
        $this->js_path = $this->export_temp_dir . '/js/';
        $this->img_path = $this->export_temp_dir . '/images/';
        $this->video_path = $this->export_temp_dir . '/videos/';
        $this->audio_path = $this->export_temp_dir . '/audios/';
        $this->docs_path = $this->export_temp_dir . '/documents/';

        $this->image_extensions = array("gif", "jpg", "jpeg", "png", "tiff", "tif", "bmp", "svg", "ico");
        $this->video_extensions = array("flv", "3gp", "mp4", "m3u8", "ts", "gp", "mov", "avi", "wmv", "webm", "mpg", "mpv", "ogg", "mpv", "m4p", "m4v", "swf", "avchd");
        $this->audio_extensions = array("m4a", "aa", "aac", "aax", "amr", "m4b", "mp3", "mpc", "ogg", "tta", "wav", "wv", "webm", "cda");
        $this->docs_extensions = array("doc", "docx", "odt", "pdf", "xls", "xlsx", "ods", "ppt", "pptx", "txt");
        $this->html_extensions = array("html", "htm");

        $this->saveAllAssetsToSpecificDir = get_option('rcExportHtmlSaveAllAssetsToSpecificDir', true);
        $this->keepSameName = get_option('rcExportHtmlKeepSameName', false);
        $this->rcExportHtmlAddContentsToTheHeader = get_option('rcExportHtmlAddContentsToTheHeader', "");
        $this->rcExportHtmlAddContentsToTheFooter = get_option('rcExportHtmlAddContentsToTheFooter', "");
        $this->require_dirs();

        /**
         * The class responsible for defining all zip functionalities
         */

        /*Adding admin menu on the admin sidebar*/
        add_action('admin_menu', array($this, 'register_export_wp_pages_menu') );

        /*Adding inline scripts for cdata*/
        add_action('admin_print_scripts', array( $this, 'rc_cdata_inlice_Script_for_export_html' ));


        add_action('template_redirect', array ( $this, 'rc_redirect_for_export_page_as_html') );

        /*Main tasks*/
        add_action( 'start_export_internal_wp_page_to_html_event', array( $this, 'start_export_wp_pages_to_html_cron_task'), 10, 2 );
        add_action( 'start_export_custom_url_to_html_event', array( $this, 'start_export_custom_url_to_html_cron_task'), 10, 2 );
        /*End main task*/

        /*Export next queue page*/
        add_action("next_page_export_from_queue", [$this, 'next_page_export_from_queue'], 10, 1);

        /*creating_html_files_completed_action*/
        add_action('creating_html_files_completed', [$this, 'creating_html_files_completed_action']);


        add_action('admin_notices', array ( $this, 'rc_export_html_general_admin_notice') );

        //add_filter("before_basename_change", array($this, "before_basename_change2"), 10, 2);

        //add_filter( 'cron_schedules', array( $this, 'rc_add_cron_interval_five_minutes') );

        /*Exclude urls*/
        add_filter( 'wp_page_to_html_exclude_urls', array( $this, 'exclude_urls'), 10, 2 );

        /*Exclude urls settings only*/
        add_filter( 'wp_page_to_html_exclude_urls_settings_only', array( $this, 'exclude_urls_settings_only'), 10, 2 );

        /*Include urls*/
        add_filter( 'wp_page_to_html_urls_to_export', array( $this, 'include_urls'), 10, 2 );

        $this->extract_stylesheets = new extract_stylesheets\extract_stylesheets($this);
        $this->extract_scripts = new extract_scripts\extract_scripts($this);
        $this->extract_images = new extract_images\extract_images($this);
        $this->inline_css = new inline_css\inline_css($this);
        $this->extract_meta_images = new extract_meta_images\extract_meta_images($this);
        $this->extract_videos = new extract_videos\extract_videos($this);
        $this->extract_audios = new extract_audios\extract_audios($this);
        $this->extract_docs = new extract_documents\extract_documents($this);
        $this->extract_html = new extract_html\extract_html($this);

        /*Add user*/
        add_action('init', array( $this, 'add_user') );

        add_action('html_export_task_completed', [$this, 'remove_user']);
        add_action('html_export_task_failed', [$this, 'remove_user']);


        add_action('html_export_html_process_start', [$this, 'login']);

        add_action( 'http_api_curl', [$this, '__set_curl_to_follow'] );

    }

    function __set_curl_to_follow( &$handle ) {
        curl_setopt( $handle, CURLOPT_FOLLOWLOCATION, true );
    }

    private function require_dirs()
    {
        /**
         * The class responsible for defining all ajax requests
         */
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/includes/ajax_requests.php';


        //require 'simple_html_dom.php';
        if (PHP_VERSION_ID >= 70205) {
            if (!class_exists('HtmlDomParser')){
                include 'vendor/autoload.php';
            }
        }
        else{
            if (!function_exists('str_get_html')){
                require_once 'includes/simple_html_dom.php';
            }
        }

        if (!function_exists('url_to_absolute')){
            require 'includes/url_to_absolute/url_to_absolute.php';
        }

        require 'includes/extractors.php';

        /**
         * The class responsible for defining all ftp functions and methods
         */
        require 'includes/ftp_functions.php';
    }
    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_styles() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Export_Wp_Page_To_Static_Html_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Export_Wp_Page_To_Static_Html_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/export-wp-page-to-static-html-admin.css', array(), $this->version, 'all' );
        wp_enqueue_style( 'ewppth_select2', plugin_dir_url( __FILE__ ) . 'css/select2.min.css', array(), '4.0.5', 'all' );

    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Export_Wp_Page_To_Static_Html_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Export_Wp_Page_To_Static_Html_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/export-wp-page-to-static-html-admin.js', array( 'jquery' ), $this->version, false );
        wp_enqueue_script( 'rc_export_logs', plugin_dir_url( __FILE__ ) . 'js/export-logs.js', array( $this->plugin_name ), $this->version, false );
        wp_enqueue_script( 'rc_extract_internal_page', plugin_dir_url( __FILE__ ) . 'js/extract-internal-pages.js', array( $this->plugin_name ), $this->version, false );
        wp_enqueue_script( 'rc_extract_external_urls', plugin_dir_url( __FILE__ ) . 'js/extract-external-urls.js', array( $this->plugin_name ), $this->version, false );
        wp_enqueue_script( 'rc_extract_pause_and_resume', plugin_dir_url( __FILE__ ) . 'js/pause_and_resume.js', array( $this->plugin_name ), $this->version, false );

        wp_enqueue_script( 'ewppth_select2', plugin_dir_url( __FILE__ ) . 'js/select2.min.js', array( 'jquery' ), '4.0.5', false );

    }


    public function register_export_wp_pages_menu(){

        add_menu_page(
            __('Export WP Page to Static HTML/CSS', 'export-wp-page-to-static-html'),
            'Export WP Page to Static HTML/CSS',
            'manage_options',
            'export-wp-page-to-html',
            array(
                $this,
                'load_admin_dependencies'
            ),
            plugin_dir_url( dirname( __FILE__ ) ) . 'admin/images/html-icon.png',
            89
        );

        add_action('admin_init', array( $this,'register_export_wp_pages_settings') );
    }

    public function load_admin_dependencies(){
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/export-wp-page-to-static-html-admin-display.php';

    }

    public function register_export_wp_pages_settings(){
        register_setting('export_wp_pages_settings', 'recorp_ewpp_settings');
    }

    public function rc_cdata_inlice_Script_for_export_html() {
        ?>
        <script>
            /* <![CDATA[ */
            var rcewpp = {
                "ajax_url":"<?php echo admin_url('admin-ajax.php'); ?>",
                "nonce": "<?php echo wp_create_nonce( 'rc-nonce' ); ?>",
                'close_nonce': "<?php echo wp_create_nonce('wp_plugin_close_notice'); ?>",
                "home_url": "<?php echo home_url('/'); ?>",
                "settings_icon": '<?php echo plugin_dir_url( __FILE__ ) . 'images/settings.png' ?>',
                "settings_hover_icon": '<?php echo plugin_dir_url( __FILE__ ) . 'images/settings_hover.png' ?>'
            };
            /* ]]\> */
        </script>
        <?php
    }

    public function get_string_between($string, $start, $end){
        $string = ' ' . $string;
        $ini = strpos($string, $start);
        if ($ini == 0) return '';
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len);
    }

    public function rmdir_recursive($dir) {
        if(file_exists($dir)){
            foreach(scandir($dir) as $file) {
                if ('.' === $file || '..' === $file) continue;
                if (is_dir("$dir/$file")) $this->rmdir_recursive("$dir/$file");
                else @unlink("$dir/$file");
            }
            @rmdir($dir);
        }
    }

    public function get_site_data_by_url($url='')
    {
        $url = urldecode($url);
        if (!empty($url)) {
            //$data = $this->xcurl($url);

            // Path to the cookies file
            $cookies_file_path = $this->getExportDir() . '/cookie.txt';

            $cookies = $this->getCookiesIntoArray($cookies_file_path);


            $response = wp_remote_get( $url , array(
                'timeout'     => 300,
                'httpversion' => '1.1',
                'sslverify' => false,
                'cookies' => $cookies,
            ));

            $data = "";

            if (( !is_wp_error($response)) && (200 === wp_remote_retrieve_response_code( $response ) )){
                $data = wp_remote_retrieve_body( $response );
            }


            if (PHP_VERSION_ID >= 70205 && !$this->getSettings('alt_export')) {
                if (!empty($data)) {
                    $this->site_data = HtmlDomParser::str_get_html($data);
                } else {
                    $this->site_data = HtmlDomParser::str_get_html("<h1>404 not found!</h1>");
                }
            }
            else{
                if (!empty($data)) {
                    $this->site_data = \str_get_html($data);
                } else {
                    $this->site_data = \str_get_html("<h1>404 not found!</h1>");
                }
            }
        }
    }

    /**
     * @return string
     */
    public function get_url_data($url="")
    {
        $url = $this->url_basename_space_to_percent20($url);
        $response = wp_remote_get( $url , array(
            'timeout'     => 300,
            'httpversion' => '1.1',
            'sslverify' => false,
        ));

        if (( !is_wp_error($response)) && (200 === wp_remote_retrieve_response_code( $response ) )){
            return wp_remote_retrieve_body( $response );
        }
        else{
            return '';
        }
    }

    public function url_basename_space_to_percent20($url="")
    {
        $pos = strrpos($url, '/') + 1;
        return substr($url, 0, $pos) . str_replace(' ', '%20', substr($url, $pos));
    }

    public function escape_quotations($content='')
    {
        return str_replace(array("'", '"'), '', $content);
    }

    public function add_urls_log($url="", $found_on="", $type="", $exported=0, $new_url="")
    {
        if (strpos($url, 'data:') == false && strpos($url, 'svg+xml') == false && strpos($url, 'base64') == false) {

            //$url = $this->url_without_hash($url);
            global $wpdb;
            $table_name = $wpdb->prefix . 'export_urls_logs';

            $url = $this->escape_quotations($this->ltrim_and_rtrim($url));

            $found = $wpdb->get_var("SELECT COUNT(*) FROM {$table_name} WHERE url='$url'");
            if (!$found) {
                $res = $wpdb->insert(
                    $table_name,
                    array(
                        'url' => $url,
                        'new_file_name' => $new_url,
                        'found_on' => $found_on,
                        'type' => $type,
                        'exported' => $exported,
                    ),
                    array(
                        '%s',
                        '%s',
                        '%s',
                        '%s',
                        '%d',
                    )
                );
                return $res;
            }
        }
        return 0;
    }

    public function update_urls_log($url="", $value="", $by='exported', $type = "url")
    {
        //$url = $this->url_without_hash($url);
        global $wpdb;
        $table_name = $wpdb->prefix . 'export_urls_logs';
        $url = $this->escape_quotations($this->ltrim_and_rtrim($url));

        $found = $wpdb->get_var("SELECT COUNT(*) FROM {$table_name} WHERE url='$url'");
        if ($found){
            if($by=='exported'){
                $res = $wpdb->update(
                    $table_name,
                    array(
                        'exported' => $value,
                    ),
                    array( 'url' => $url ),
                    array(
                        '%d'    // value2
                    ),
                    array( '%s' )
                );
            }
            if($by=='new_file_name'){
                $res = $wpdb->update(
                    $table_name,
                    array(
                        'new_file_name' => $value,
                    ),
                    array( 'url' => $url ),
                    array(
                        '%s'    // value2
                    ),
                    array( '%s' )
                );
            }


            return $res;
        }
        else{
            if($by=='exported'){
                $res = $wpdb->insert(
                    $table_name,
                    array(
                        'url' => $url,
                        'found_on' => $url,
                        'type' => $type,
                        'exported' => $value,
                    ),
                    array(
                        '%s',
                        '%s',
                        '%s',
                        '%d'
                    )
                );
            }

            if($by=='new_file_name'){
                $res = $wpdb->insert(
                    $table_name,
                    array(
                        'url' => $url,
                        'found_on' => $url,
                        'type' => $type,
                        'new_file_name' => $value,
                    ),
                    array(
                        '%s',
                        '%s',
                        '%s',
                        '%s'
                    )
                );
            }

            return $res;
        }

        return 0;
    }

    public function get_newly_created_basename_by_url($url){
        global $wpdb;
        $table_name = $wpdb->prefix . 'export_urls_logs';
        $url = $this->escape_quotations($this->ltrim_and_rtrim($url));

        $found = $wpdb->get_var("SELECT COUNT(*) FROM {$table_name} WHERE url='$url'");

        if ($found){
            $basename = $wpdb->get_results("SELECT new_file_name FROM {$table_name} WHERE url='$url'");
            if (!empty($basename)){
                return $basename[0]->new_file_name;
            }
        }
        return 0;
    }

    public function add_exportable_url($url="", $found_on="", $exported=0)
    {
        if (strpos($url, 'data:') == false && strpos($url, 'svg+xml') == false && strpos($url, 'base64') == false) {

            //$url = $this->url_without_hash($url);
            global $wpdb;
            $table_name = $wpdb->prefix . 'exportable_urls';

            $url = $this->escape_quotations($this->ltrim_and_rtrim($url));

            $found = $wpdb->get_var("SELECT COUNT(*) FROM {$table_name} WHERE url='$url'");
            if (!$found) {
                $res = $wpdb->insert(
                    $table_name,
                    array(
                        'url' => $url,
                        'found_on' => $found_on,
                        'exported' => $exported,
                    ),
                    array(
                        '%s',
                        '%s',
                        '%d',
                    )
                );
                return $res;
            }
        }
        return 0;
    }

    public function url_without_hash($url="")
    {
        $url = explode('#', $url)[0];

        return $url;
    }

    public function is_link_exists($url="", $found_on = false, $found_on_url = "")
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'export_urls_logs';

        $url = $this->escape_quotations($this->ltrim_and_rtrim($url));

        if(!$found_on){
            $found = $wpdb->get_var("SELECT COUNT(*) FROM {$table_name} WHERE url LIKE '$url'");
        }else{
            $found = $wpdb->get_var("SELECT COUNT(*) FROM {$table_name} WHERE url LIKE '$url' AND found_on LIKE '$found_on_url' ");
        }
        if ($found){
            return true;
        }

        return false;
    }

    public function get_all_links($url="")
    {
        $src = $this->site_data;
        $findLinks = $src->find('a');
        if(!empty($findLinks)){

            foreach ($findLinks as $link) {
                if (!empty($url)){
                    $imgExts = $this->getImageExtensions();
                    $audioExts = $this->getAudioExtensions();
                    $videoExts = $this->getVideoExtensions();
                    $docsExts = $this->getDocsExtensions();
                    $link_href = url_to_absolute($url, $link->href);
                    $urlExt = pathinfo($link_href, PATHINFO_EXTENSION);
                    $exclude_url = apply_filters('wp_page_to_html_exclude_urls', false, $link_href);
                    if ((
                        $this->get_host($link_href) == $this->get_host($url) ) &&
                        !in_array($urlExt, $imgExts) &&
                        !in_array($urlExt, $audioExts) &&
                        !in_array($urlExt, $videoExts) &&
                        !in_array($urlExt, $docsExts) &&
                        /*!in_array($urlExt, ["html"]) &&*/
                        strpos($link_href, 'data:') == false /*&&
                        !$exclude_url*/
                    ){
                        $link_href = url_to_absolute($url, $link_href);
                        $link_href = $this->url_without_hash($link_href);

                        $this->add_urls_log($link_href, $url, 'url');
                        $this->add_exportable_url($link_href, $url);

                    }
                }
            }
        }

    }

    public function create_required_directories($value='')
    {

        if (!file_exists($this->export_dir)) {
            mkdir($this->export_dir);
        }

        if (!file_exists($this->export_temp_dir)) {
            mkdir($this->export_temp_dir);
        }

        if (!file_exists($this->css_path)) {

            if ($this->update_export_log('', 'creating', 'CSS Directory')) {
                mkdir($this->css_path);
            }
        }
        if (!file_exists($this->fonts_path)) {
            if ($this->update_export_log('', 'creating', 'Fonts Directory')) {
                mkdir($this->fonts_path);
            }
        }
        if (!file_exists($this->js_path)) {
            if ($this->update_export_log('', 'creating', 'JS Directory')) {
                mkdir($this->js_path);
            }
        }
        if (!file_exists($this->img_path)) {
            if ($this->update_export_log('', 'creating', 'Images Directory')) {
                mkdir($this->img_path);
            }
        }
    }

    public function clear_tables_and_files()
    {
        global $wpdb;
        $wpdb->query("TRUNCATE TABLE {$wpdb->prefix}export_page_to_html_logs");
        $wpdb->query("TRUNCATE TABLE {$wpdb->prefix}export_urls_logs ");
        $wpdb->query("TRUNCATE TABLE {$wpdb->prefix}exportable_urls ");
        $this->rmdir_recursive($this->upload_dir . '/exported_html_files/tmp_files');

        return true;
    }

    public function  export_wp_page_as_static_html_by_page_id($main_url = '', $html_filename = 'index.html', $next_url_id = 2)
    {
        if ($this->is_cancel_command_found()&&!$this->is_paused()) {
            return false;
            exit;
        }

        if (!ewptshp_fs()->is_plan('pro', true)) {
            return false;
        }

        if ($this->getSettings('alt_export')){
            if (!function_exists('str_get_html')){
                require_once 'includes/simple_html_dom.php';
            }
        }

        //$replace_urls_to_hash = $this->getSettings('replaceUrlsToHash');

        $prev_main_url = $main_url;
        $this->update_urls_log($prev_main_url, 1);

        $main_url = explode('#', $main_url)[0];

        $middle_path = $this->rc_get_url_middle_path($main_url);
        $full_site = $this->getSettings('full_site');

        if (!$this->rc_is_link_already_generated($main_url)) {

            if (!empty($middle_path) && !file_exists($this->upload_dir . '/exported_html_files/tmp_files/' . $middle_path)) {
                $path = $this->upload_dir . '/exported_html_files/tmp_files/' . $middle_path;
                @mkdir($path, 0777, true);
            }
            $this->update_export_log($main_url, 'reading', '');
            //$this->add_urls_log($link->href, $url, 'url');

            $this->get_site_data_by_url($main_url);

            if(!empty($this->site_data)){

                $skip = (array) $this->getSettings('skipAssetsFiles', array());

                /*Get stylesheet urls*/
                if(!array_key_exists('stylesheets', $skip)){
                    $this->ExtractStylesheets()->get_stylesheets($main_url);

                    /*Working with inline css*/
                    $this->InlineCss()->get_inline_css($main_url);

                    /*Working with div inline css*/
                    $this->InlineCss()->get_div_inline_css($main_url);
                }

                /*Get scripts*/
                if(!array_key_exists('scripts', $skip)){
                    $this->ExtractScripts()->get_scripts($main_url);

                }

                /*Get images*/
                if(!array_key_exists('images', $skip)){
                    $this->ExtractImages()->get_images($main_url);

                    /*Extract meta images*/
                    $this->ExtractMetaImages()->get_meta_images($main_url);
                }

                /*Extract videos*/
                if(!array_key_exists('videos', $skip)){
                    $this->ExtractVideos()->get_videos($main_url);
                }

                /*Extract audios*/
                if(!array_key_exists('audios', $skip)){
                    $this->ExtractAudios()->get_audios($main_url);
                }

                /*Extract documents*/
                if(!array_key_exists('docs', $skip)){
                    $this->ExtractDocs()->get_documents($main_url);
                }

                if ($full_site) {
                    $this->get_all_links($main_url);
                } /*End condition full_site*/


                /*Save the html*/
                $this->saveHtmlFile($main_url, $full_site, $middle_path, $html_filename);


                $this->update_urls_log($prev_main_url, 1);
                $this->update_urls_log($main_url, 1);

                if (!$this->is_cancel_command_found()&&!$this->is_paused()){
                    if($full_site){
                        //do_action('next_page_export_from_queue', $next_url_id);
                        /*if (true){
                            $this->next_page_export_from_queue($next_url_id);
                        }*/
                        //$this->generateQueueEventKey();
                        //$this->setSettings('pageNow', $next_url_id-1);

                        if($next_url_id % 3 == 0){
                            wp_schedule_single_event( time() , "next_page_export_from_queue", array( $next_url_id ) );
                        }else{
                            //$this->next_page_export_from_queue($next_url_id);
                            do_action('next_page_export_from_queue', $next_url_id);
                        }

                        file_get_contents(home_url('/') . 'wp-load.php');

                    }
                    else{
                        $this->update_export_log('', 'all_pages_exported');
                        $this->setSettings('creating_html_process', 'completed');

                        do_action('creating_html_files_completed', $main_url);
                    }
                } else {
                    $this->setTaskFailed();
                }

            }

        }
        else{
            if($next_url_id % 10 == 0){
                wp_schedule_single_event( time() , "next_page_export_from_queue", array( $next_url_id ) );
            }else{
                //$this->next_page_export_from_queue($next_url_id);
                do_action('next_page_export_from_queue', $next_url_id);
            }

            sleep(1);
            file_get_contents(home_url('/') . 'wp-load.php');
        }

        return true;

    }

    public function url_to_basename($url="", $parm=false, $type="")
    {
        if($this->getSettings('customUrl') && $this->getSettings('full_site')){
            $url = str_replace( $this->getSettings('customUrlAddress'), '', $url);
        }

        $url = str_replace( array(home_url(), $this->get_host($url)), array('', ''), $url);


        $url = $this->ltrim_and_rtrim($url, '/');

        if(!$parm){
            $urlPart = explode('?', $url);
            $urlPart = explode('#', $urlPart[0]);
            $url = $urlPart[0];

            if (!empty($url)) {
                $basename = basename($url);
                /*if (strpos($url, 'html') !==false ){
                    return $basename;
                }*/
                return $basename.$type;
            }
            else{
                return "index".$type;
            }
        }
        else{
            //$urlPart = explode('?', $url);
            $urlPart = explode('#', $url);
            $url = $urlPart[0];

            $parm = isset($urlPart[1]) ? '#' . $urlPart[1] : "";

            //$basename = "";

            if (!empty($url)) {
                return basename($url).$type.$parm;
            }
            else{
                return "index".$type.$parm;
            }
        }
    }

    public function update_export_log($path="", $type = "copying", $comment = ""){
        global $wpdb;

        $wpdb->insert(
            $wpdb->prefix . 'export_page_to_html_logs',
            array(
                'path' => $path,
                'type' => $type,
                'comment' => $comment,
            ),
            array(
                '%s',
                '%s',
                '%s',
            )
        );

        return true;
    }


    public function get_all_files_as_array($all_files){


        ob_start();
        $this->rc_get_sub_dir1($all_files);
        $files = ob_get_clean();
        $files = rtrim($files, ',');
        $files = explode(',', $files);

        return $files;
    }
    public function rc_get_sub_dir1($dir) {
        if(file_exists($dir)){
            foreach(scandir($dir) as $file) {
                if ('.' === $file || '..' === $file) continue;
                if (is_dir("$dir/$file")) $this->rc_get_sub_dir1("$dir/$file");
                echo "$dir/$file" . ',';
            }
        }
    }


    public function get_all_files_as_array2($all_files){

        ob_start();
        $this->rc_get_sub_dir($all_files);
        $files = ob_get_clean();
        $files = rtrim($files, ',');
        $files = explode(',', $files);
        return $files;

    }
    public function rc_get_sub_dir($dir) {
        if(file_exists($dir)) {
            foreach (scandir($dir) as $file) {
                if ('.' === $file || '..' === $file) continue;
                if (is_dir("$dir/$file")) $this->rc_get_sub_dir("$dir/$file");
                if (is_file("$dir/$file")) echo "$dir/$file" . ',';
            }
        }
    }


    public function start_export_wp_pages_to_html_cron_task( $datas, $settigs ) {
        if(empty($datas)){
            return;
        }

        if(!empty($settigs)){
            foreach ($settigs as $key => $setting){
                $this->setSettings($key, $setting);
            }
        }

        $this->setSettings('task', 'running');
        $this->setSettings('pages_data', $datas);
        $this->clearQueue();

        do_action('html_export_task_running', "");

        $this->create_html_files($datas);
    }

    public function setTaskFailed()
    {
        $this->setSettings('task', 'failed');
        do_action('html_export_task_failed', "");

        if ($this->getSettings('receive_email')) {
            /*Sent emails*/
            $this->sent_email(true);
        }

    }

    /**
     * @param $url
     * @param $replace_urls
     * @param $receive_email
     * @param $full_site
     * @param $path2
     */
    public function start_export_custom_url_to_html_cron_task($url, $settings ) {
        if(empty($url)){
            return false;
        }
        if(!empty($settings)){
            foreach ($settings as $key => $setting){
                $this->setSettings($key, $setting);
            }
        }
        //$this->removeAllSettings();
        $this->setSettings('task', 'running');
        do_action('html_export_task_running', "");

        $this->clearQueue();

        //update_option('ttt32', var_dump($full_site));
        $ok = $this->create_html_files($url, true);

        /*if(!$this->getSettings('full_site')){
            if ($ok && !$this->is_cancel_command_found()) {
                do_action('creating_html_files_completed', $url);
            } else {
                $this->setTaskFailed();
            }
        } else {
            $this->setTaskFailed();
        }*/
    }


    public function get_host($url='', $isScheme=true)
    {
        $url = parse_url($url);
        $scheme = isset($url['scheme']) ? $url['scheme'] : '';

        if($isScheme){
            $host = isset($url['host']) ? $scheme.'://'.$url['host'] : '';
        }else{
            $host = isset($url['host']) ? $url['host'] : '';
        }
        return $host;
    }

    public function sent_email($error = false)
    {
        $emails = $this->getSettings('email_lists');
        $zipLink = $this->getSettings('zipDownloadLink');
        if (!empty($emails)) {

            $emails = explode(',', $emails);

            foreach ($emails as $key => $email) {
                $to = $email;

                if(!$error){
                    $subject = 'HTML export has been completed!';
                    $body = "Your last html export request has been completed. Please download the file from here: <a href='{$zipLink}'>{$zipLink}</a>";
                }
                else{
                    $subject = 'HTML export has been failed!';
                    $body = "Your last html export request has been failed. Please check the logs";
                }
                $headers = array('Content-Type: text/html; charset=UTF-8');

                $mailed = wp_mail( $to, $subject, $body, $headers );
                if($mailed){
                    $this->setSettings('mail_send', true);
                    $this->update_export_log('mail_send_successfully' );
                }
            }

        }
        else {
            $to = get_bloginfo('admin_email');
            if(!$error){
                $subject = 'HTML export has been completed!';
                $body = "Your last html export request has been completed. Please download the file from here: <a href='{$zipLink}'>{$zipLink}</a>";
            }
            else{
                $subject = 'HTML export has been failed!';
                $body = "Your last html export request has been failed. Please check the logs";
            }
            $headers = array('Content-Type: text/html; charset=UTF-8');

            $mailed = wp_mail( $to, $subject, $body, $headers );
            if($mailed){
                $this->setSettings('mail_send', true);
                $this->update_export_log('mail_send_successfully' );
            }
        }
    }

    public function create_html_files($datas, $custom_url = false){
        if (!empty($datas)) {

            $this->clear_tables_and_files();
            /*Creating required direcories*/
            if($this->getSaveAllAssetsToSpecificDir()){
                $this->create_required_directories();
            }

            $this->setSettings('creating_html_process', 'running');

            do_action('html_export_html_process_start', "");

            if (!$custom_url) {

                if ($this->getSettings('full_site')) {
                    $url = home_url();
                    $html_filename = 'index.html';

                    $this->export_wp_page_as_static_html_by_page_id($url, $html_filename);
                } else {
                    foreach ($datas as $key => $page) {
                        $page_id = $page;
                        if($page_id=='home_page'){
                            $html_filename = 'index.html';
                            $url = home_url('/');
                        }
                        else{
                            $post = get_post($page_id);
                            $html_filename = $post->post_name . '.html';
                            $url = get_permalink($page_id);
                        }

                        if($this->getSettings('singlePage') && get_option('rcExportHtmlCreateIndexOnSinglePage', true)){
                            $html_filename = 'index.html';
                        }

                        $ok = $this->export_wp_page_as_static_html_by_page_id($url, $html_filename);

                        if (!$ok) {
                            return  false;
                            break;
                        }
                    }
                }

            }
            else {
                $url = rtrim($datas, '/');
                //$host = $this->get_host($url);
                if($this->getSettings('singlePage') && get_option('rcExportHtmlCreateIndexOnSinglePage', true)){
                    $html_filename = 'index.html';
                }
                elseif ($this->getSettings('full_site')){
                    $html_filename = 'index.html';
                }
                else{
                    $html_filename = $this->filter_filename(basename($url)) . '.html';
                }

                if (!$this->export_wp_page_as_static_html_by_page_id($url, $html_filename)) {
                    return  false;
                }
            }

            $main_url = explode('#', $url)[0];
            $full_site = $this->getSettings('full_site');
            if ($full_site) {
                $this->get_all_links($main_url);
                //$this->readAllLinks($all_links_href, $full_site);
            }

            //$this->update_export_log('', 'all_pages_exported');
            //$this->setSettings('creating_html_process', 'completed');
            //do_action('html_export_html_process_completed', "");

            /*update_option('rc_expoting_errors_appear', false);
            update_option('rc_previous_logs_count', '0');*/

        }

        return true;
    }

    public function setSettings( $settings_name="", $value ="")
    {
        if(!empty($settings_name)){
            $settings_name = $this->settingsKey . $settings_name;
            update_option($settings_name, $value);
        }
        return true;
    }

    public function getSettings( $settings_name="", $default = "")
    {
        $settings_name = $this->settingsKey . $settings_name;
        $rc_ewppth_settings = get_option($settings_name);

        if(empty($rc_ewppth_settings) && !empty($default)){
            return $default;
        }

        return $rc_ewppth_settings;
    }

    public function removeSettings( $settings_name="")
    {
        $settings_name = $this->settingsKey . $settings_name;
        $rc_ewppth_settings = delete_option($settings_name);

        if ($rc_ewppth_settings) {
            return true;
        }
        return false;
    }

    public function removeAllSettings()
    {
        global $wpdb;
        $removefromdb = $wpdb->query("UPDATE {$wpdb->prefix}options SET option_value = '' WHERE option_name LIKE '{$this->settingsKey}%'");
        //$removefromdb = $wpdb->query("DELETE FROM {$wpdb->prefix}options WHERE option_name LIKE '{$this->settingsKey}%'");

        if ($removefromdb) {
            return true;
        }
        return false;
    }


    public function get_zip_name($datas='')
    {
        $name = "";
        $x = 0;
        if (!empty($datas)) {
            foreach ($datas as $page) {
                if ($x <= 2) {

                    if($page == "home_page"){
                        $zipFileName = $this->get_host(home_url(), false) . '-homepage';
                    }
                    else{
                        $post = get_post($page);
                        $zipFileName = isset($post->post_name) ? $post->post_name : "";
                    }
                }
                $name .= $zipFileName . '&';

                $x++;
            }
        }

        if ($x>2) {
            $more = ($this->get_exported_html_files_count()-3);

            if($more !== 0){
                if ($more < 2) {
                    $name .= $more . '-more-page';
                }
                else{
                    $name .= $more . '-more-pages';
                }
            }

        }

        return rtrim($name, '&');
    }

    public function get_exported_html_files_count()
    {
        global $wpdb;
        $count = $wpdb->get_var("SELECT COUNT(*) FROM {$wpdb->prefix}export_page_to_html_logs WHERE type = 'created_html_file' ");

        return $count;
    }

    public function if_fullsite_export_command_found($datas, $return_data = false){
        if (!empty($datas)) {
            foreach ($datas as $key => $page) {
                if ($page->page_id == 'home_page') {
                    if ($page->is_full_site == true) {
                        if ($return_data) {
                            return $page;
                        }
                        else {
                            return true;
                        }

                        break;
                    }
                }
            }
        }
        return false;
    }

    public function add_rc_url_to_replace_data($find_data = "", $replace_data = ""){

        $gop = get_option('rc_url_to_replace');

        $find = $replace = array();
        if (!empty($gop)) {
            $find = $gop['find'];
            $replace = $gop['replace'];
        }

        if (!empty($find_data)&&!in_array($find_data, $find)) {
            $find[] = $find_data;
            $replace[] = $replace_data;

            $u = array();
            $u['find'] = $find;
            $u['replace'] = $replace;

            update_option('rc_url_to_replace', $u);

            return $u;
        } else {
            return $gop;
        }

    }

    public function get_find_as_key_replace_as_value($f_link = "", $middle_path = false){
        $values = $this->add_rc_url_to_replace_data();

        $fr = array();
        if (isset($values['find'])&&isset($values['replace'])&&!empty($values['find'])&&!empty($values['replace'])) {
            foreach ($values['find'] as $key => $value) {

                if ($middle_path && !empty($f_link)) {
                    if ($fr[$value] == $f_link) {
                        return $values['replace'][$key];
                        break;
                    }
                } else {
                    $fr[$value] = $values['replace'][$key];
                }
            }
        }


        return $fr;
    }

    public function get_replace_data_by_url($url='')
    {
        $values = $this->add_rc_url_to_replace_data();

        $fr = array();
        if (isset($values['find'])&&isset($values['replace'])&&!empty($values['find'])&&!empty($values['replace'])) {
            foreach ($values['find'] as $key => $value) {
                /*$arr = array();
                $arr['find'] = $value;
                $arr['replace'] = $values['replace'][$key];
                $fr[] = $arr;*/

                if ($url == $value) {
                    return $values['replace'][$key];
                    break;
                }
            }
        }
        return false;
    }

    public function get_find_data_by_slug($slug='')
    {
        $values = $this->add_rc_url_to_replace_data();

        $fr = array();
        if (isset($values['find'])&&isset($values['replace'])&&!empty($values['find'])&&!empty($values['replace'])) {
            foreach ($values['replace'] as $key => $value) {

                if ($slug == $value) {
                    return $values['find'][$key];
                    break;
                }
            }
        }
        return false;
    }

    public function rc_path_to_dot($url){
        if($this->getSettings('customUrl') && $this->getSettings('full_site')){
            $url = str_replace( array($this->getSettings('customUrlAddress')), array(''), $url);
        }
        $middle_path = str_replace( array(home_url(), $this->get_host($url)), array('', ''), $url);
        $middle_path = $this->ltrim_and_rtrim($middle_path, '/');

        if($this->getSettings('customUrl') && $this->getSettings('singlePage')){
            $middle_path = "";
        }

        $p = './';
        if (!empty($middle_path)) {
            $middle_path = explode('/', $middle_path);
            for ($i=1; $i < count($middle_path); $i++) {
                $p .= '../';
            }
        }

        return $p;
    }
    public function host($url) {
        $url = parse_url($url);
        //$scheme = isset($url['scheme']) ? $url['scheme'] : '';
        $host = isset($url['host']) ? $url['host'] : '';
        return $host;
    }
    public function rc_get_url_middle_path($url, $custom_url = false, $full_site = false){
        $url = explode('?', $url)[0];
        $url = explode('#', $url)[0];
        if($this->getSettings('customUrl') && $this->getSettings('full_site')){
            $url = str_replace( array($this->getSettings('customUrlAddress')), array(''), $url);
        }
        $middle_path = str_replace( array(home_url(), $this->get_host($url)), array('', ''), $url);
        $middle_path = $this->ltrim_and_rtrim($middle_path, '/');
        //$middle_path = explode($middle_path);


        $middle_path = str_replace( basename($url), '', $middle_path);

        if($this->getSettings('customUrl') && !$this->getSettings('full_site')){
            $middle_path = "";
        }


        return $middle_path;
    }

    public function middle_path_for_filename($url='')
    {
        $middle_path = $this->rc_get_url_middle_path($url);
        $middle_path_slash_cut = rtrim($middle_path, '/') ;

        $path_dir = explode( '/', $middle_path_slash_cut);

        $path_dir_dash = '';

        if (strpos($url, '-child') !== false) {
            if (count($path_dir) > 2) {
                for ($i=1; $i < count($path_dir); $i++) {
                    $path_dir_dash .= $path_dir[$i] . '-';
                }
            }
        } else {
            if (count($path_dir) > 2) {
                for ($i=2; $i < count($path_dir); $i++) {
                    $path_dir_dash .= $path_dir[$i] . '-';
                }
            }
        }

        /*if(empty($path_dir_dash)){
            $path_dir_dash = $this->generate_string(3) . '-';
        }*/

        //$path_dir_dash = rtrim($path_dir_dash, '-');

        return $path_dir_dash;
    }


    /**
     * @since 2.0.4
     * @param int $strength
     * @return string
     */
    public function generate_string($strength = 16) {
        $input = '0123456789abcdefghijklmnopqrstuvwxyz';
        $input_length = strlen($input);
        $random_string = '';
        for($i = 0; $i < $strength; $i++) {
            $random_character = $input[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }

        return $random_string;
    }

    public function rc_is_link_already_generated($url='')
    {
        global $wpdb;

        $url = str_replace(array('http:', 'https:'), array('', ''), $url);
        $url = $this->removeParam(urldecode($url), 'ver');

        $results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}export_page_to_html_logs WHERE path LIKE '%{$url}%'");

        if (!empty($results)) {
            return true;
        }

        return false;
    }

    public function abs_url_to_path( $path = '' ) {
        return str_replace(
            site_url(),
            wp_normalize_path( untrailingslashit( ABSPATH ) ),
            wp_normalize_path( $path )
        );
    }


    public function rc_redirect_for_export_page_as_html() {
        if (isset($_GET['rc_exported_zip_file'])) {
            $url = urldecode($_GET['rc_exported_zip_file']);
            //$this->setSettings('rc_is_export_pages_zip_downloaded', 'yes');
            wp_redirect($url);
            exit;
        }
    }

    public function ltrim_and_rtrim($backend_file_url_full='', $sym = "")
    {
        if (empty($sym)) {
            $backend_file_url_full = urldecode($backend_file_url_full);
            $backend_file_url_full = ltrim($backend_file_url_full, "'");
            $backend_file_url_full = rtrim($backend_file_url_full, "'");
            $backend_file_url_full = ltrim($backend_file_url_full, '"');
            $backend_file_url_full = rtrim($backend_file_url_full, '"');
            $backend_file_url_full = ltrim($backend_file_url_full, ' ');
            $backend_file_url_full = rtrim($backend_file_url_full, ' ');

        }
        else {
            $backend_file_url_full = ltrim($backend_file_url_full, $sym);
            $backend_file_url_full = rtrim($backend_file_url_full, $sym);
        }
        return $backend_file_url_full;
    }



    public function rc_export_html_general_admin_notice(){

        $html_export_process = $this->getSettings('task');
        $is_zip_downloaded = $this->getSettings('is_export_pages_zip_downloaded', false);
        $is_dismiss_notice = $this->getSettings('dismiss_notice', false);

        if ($html_export_process == 'running' && !$is_zip_downloaded && !$is_dismiss_notice) {
            echo '<div class="notice notice-warning is-dismissible export-html-notice">
	             <p>HTML exporting task has been running... <a href="options-general.php?page=export-wp-page-to-html&notice=true">View details</a></p>
	         </div>';
        }
        elseif ($html_export_process == 'completed' && !$is_dismiss_notice) {
            echo '<div class="notice notice-success is-dismissible export-html-notice">
	             <p>HTML exporting task has been completed. <a href="options-general.php?page=export-wp-page-to-html&notice=true">View results</a></p>
	         </div>';
        }
    }
    

    public function xcurl($url,$print=false,$ref=null,$post=array(),$ua="Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:66.0) Gecko/20100101 Firefox/66.0") {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_AUTOREFERER, true);
        if(!empty($ref)) {
            curl_setopt($ch, CURLOPT_REFERER, $ref);
        }
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        if(!empty($ua)) {
            curl_setopt($ch, CURLOPT_USERAGENT, $ua);
        }
        if(!empty($post)){
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        }
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);


        $output = curl_exec($ch);
        curl_close($ch);
        if($print) {
            print($output);
        } else {
            return $output;
        }
    }


    public function is_url_already_read($url='')
    {
        global $wpdb;
        $result = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}export_page_to_html_logs WHERE path = '{$url}'");

        if (count($result) >= 1) {
            return true;
        }

        return false;
    }



    public function normalizePath($path)
    {
        $parts = array();// Array to build a new path from the good parts
        $path = str_replace('\\', '/', $path);// Replace backslashes with forwardslashes
        $path = preg_replace('/\/+/', '/', $path);// Combine multiple slashes into a single slash
        $segments = explode('/', $path);// Collect path segments
        $test = '';// Initialize testing variable
        foreach($segments as $segment)
        {
            if($segment != '.')
            {
                $test = array_pop($parts);
                if(is_null($test))
                    $parts[] = $segment;
                else if($segment == '..')
                {
                    if($test == '..')
                        $parts[] = $test;

                    if($test == '..' || $test == '')
                        $parts[] = $segment;
                }
                else
                {
                    $parts[] = $test;
                    $parts[] = $segment;
                }
            }
        }
        return implode('/', $parts);
    }
    public function get_absolute_path($path) {
        $path = str_replace(array('/', '\\'), DIRECTORY_SEPARATOR, $path);
        $parts = array_filter(explode(DIRECTORY_SEPARATOR, $path), 'strlen');
        $absolutes = array();
        foreach ($parts as $part) {
            if ('.' == $part) continue;
            if ('..' == $part) {
                array_pop($absolutes);
            } else {
                $absolutes[] = $part;
            }
        }
        return implode('/', $absolutes);
    }



    public function is_cancel_command_found()
    {
        $result = $this->getSettings('cancel_command');
        if ($result) {
            return true;
        }
        return false;
    }

    public function is_paused()
    {
        $result = $this->getSettings('paused');
        if ($result) {
            return true;
        }
        return false;
    }

    public function get_total_exported_file()
    {
        global $wpdb;
        $result = $wpdb->get_var("SELECT COUNT(*) FROM {$wpdb->prefix}export_page_to_html_logs WHERE type = 'copying' OR type = 'creating_html_file' ");

        return $result;
    }

    public function get_total_uploaded_file()
    {
        global $wpdb;
        $result = $wpdb->get_var("SELECT COUNT(*) FROM {$wpdb->prefix}export_page_to_html_logs WHERE type = 'file_uploaded_to_ftp' ");

        return $result;
    }


    public function before_basename_change2($basename, $url){

        $gop = get_option('rc_url_to_replace');
        return str_replace($gop['find'], $gop['replace'], $basename);
    }

    public function get_site_scheme($url="")
    {
        $parse_url = parse_url($url);
        if(isset($parse_url['scheme'])){
            return $parse_url['scheme'];
        }

        return false;
    }

    /**
     * @return string
     */
    public function getFontsPath()
    {
        return $this->fonts_path;
    }

    /**
     * @return string
     */
    public function getCssPath()
    {
        return $this->css_path;
    }

    /**
     * @return string
     */
    public function getImgPath()
    {
        return $this->img_path;
    }

    /**
     * @return string
     */
    public function getVideosPath()
    {
        return $this->video_path;
    }

    /**
     * @return string
     */
    public function getAudiosPath()
    {
        return $this->audio_path;
    }

    /**
     * @return string
     */
    public function getDocsPath()
    {
        return $this->docs_path;
    }

    /**
     * @return string[]
     */
    public function getImageExtensions()
    {
        return $this->image_extensions;
    }

    /**
     * @return string[]
     */
    public function getVideoExtensions()
    {
        return $this->video_extensions;
    }
    /**
     * @return string[]
     */
    public function getAudioExtensions()
    {
        return $this->audio_extensions;
    }

    /**
     * @return string[]
     */
    public function getDocsExtensions()
    {
        return $this->docs_extensions;
    }
    /**
     * @return string[]
     */
    public function getHtmlExtensions()
    {
        return $this->html_extensions;
    }
    /**
     * @return string[]
     */
    public function getSiteData()
    {
        return $this->site_data;
    }
    /**
     * @return string[]
     */
    public function getSiteDataObject()
    {
        return $this->getSiteData();
        //return HtmlDomParser::str_get_html($this->site_data);
    }

    /**
     * @return string
     */
    public function getJsPath()
    {
        return $this->js_path;
    }

    /**
     * @return mixed
     */
    public function getUploadDir()
    {
        return $this->upload_dir;
    }

    /**
     * @return extract_stylesheets
     */
    public function ExtractStylesheets()
    {
        return $this->extract_stylesheets;
    }

    /**
     * @return extract_scripts
     */
    public function ExtractScripts()
    {
        return $this->extract_scripts;
    }

    /**
     * @return extract_images
     */
    public function ExtractImages()
    {
        return $this->extract_images;
    }

    /**
     * @return inline_css
     */
    public function InlineCss()
    {
        return $this->inline_css;
    }

    /**
     * @return extract_meta_images
     */
    public function ExtractMetaImages()
    {
        return $this->extract_meta_images;
    }

    /**
     * @return extract_videos
     */
    public function ExtractVideos()
    {
        return $this->extract_videos;
    }
    /**
     * @return extract_audios
     */
    public function ExtractAudios()
    {
        return $this->extract_audios;
    }
    /**
     * @return extract_docs
     */
    public function ExtractDocs()
    {
        return $this->extract_docs;
    }

    /**
     * @return extract_videos
     */
    public function getExportDir()
    {
        return $this->export_dir;
    }
    /**
     * @return export_temp_dir
     */
    public function getExportTempDir()
    {
        return $this->export_temp_dir;
    }

    public function getSaveAllAssetsToSpecificDir()
    {
        return $this->saveAllAssetsToSpecificDir;
    }
    public function getKeepSameName()
    {
        return $this->keepSameName;
    }

    public function getExportHtmlAddContentsToTheHeader()
    {
        return $this->rcExportHtmlAddContentsToTheHeader;
    }

    public function getExportHtmlAddContentsToTheFooter()
    {
        return $this->rcExportHtmlAddContentsToTheFooter;
    }

    public function exclude_urls($exclude_bool, $url)
    {


            $settingsExcludeUrls = str_replace('%', '', get_option('rcExportHtmlExcludeUrls'));
            $settingsExcludeUrls = explode("\n", $settingsExcludeUrls);
            if (!empty($settingsExcludeUrls)){
                foreach ($settingsExcludeUrls as $exclude_url){
                    if( !empty($exclude_url) && strpos($url, $exclude_url) !== false  ){
                        return true;
                        break;
                    }
                }
            }

            $urlBasename = $this->filter_filename($url);
            $urlExt = pathinfo($urlBasename, PATHINFO_EXTENSION);

            if(strpos(
                    $url, 'wp-admin') !== false
                || strpos($url, 'action=lostpassword') !== false
                || strpos($url, 'wp-login.php') !== false
                || strpos($url, 'data:') !== false
                || in_array($urlExt, $this->getAudioExtensions())
                || in_array($urlExt, $this->getVideoExtensions())
                || in_array($urlExt, $this->getImageExtensions())
                || in_array($urlExt, $this->getDocsExtensions())
                /*|| in_array($urlExt, $this->getHtmlExtensions())*/
            ){
                return true;
            }

        return $exclude_bool;
    }

    public function exclude_urls_settings_only($exclude_bool, $url)
    {
        $settingsExcludeUrls = str_replace('%', '', get_option('rcExportHtmlExcludeUrls'));
        $settingsExcludeUrls = explode("\n", $settingsExcludeUrls);
        if (!empty($settingsExcludeUrls)){
            foreach ($settingsExcludeUrls as $exclude_url){
                if(!empty($exclude_url) && strpos($url, $exclude_url) !== false  ){
                    return true;
                    break;
                }
            }
        }

        if(strpos(
                $url, 'wp-admin') !== false
            || strpos($url, 'action=lostpassword') !== false
            || strpos($url, 'wp-login.php') !== false
            || strpos($url, 'data:') !== false
        ){
            return true;
        }

        return $exclude_bool;
    }
    public function include_urls($include_bool, $url)
    {
        $datas = $this->getSettings('pages_data');
//        $datas = stripslashes($datas);
//        $datas = @json_decode($datas);
        $url = rtrim($url, '/');
        if(!empty($datas)){
            foreach ($datas as $data) {
                if($data == 'home_page'){
                    $permalink = home_url();
                }
                else{
                    $permalink = @get_permalink($data);
                }
                $permalink = rtrim($permalink, '/');

                if($url==$permalink){
                    return true;
                    break;
                }
            }
        }
        return $include_bool;
    }

    /**
     * @param $main_url
     * @param $full_site
     * @param $middle_path
     * @param $html_filename
     */
    public function saveHtmlFile($main_url, $full_site, $middle_path, $html_filename)
    {
        $path_to_dot = $this->rc_path_to_dot($main_url);


        $html_filename = $this->filter_filename($html_filename);
        if (strpos($html_filename, '.html.html')!==false){
            $html_filename = str_replace('.html.html', '.html', $html_filename);
        }
        $my_file = $this->getUploadDir() . '/exported_html_files/tmp_files/' . $middle_path . $html_filename;
        if (!file_exists($my_file)/* && $this->update_export_log('', 'creating_html_file', $html_filename)*/) {

            $src = $this->site_data;

            /*Replace urls to html path*/
            //$this->replaceUrlsToLocalHtmlPath($main_url, $full_site, $path_to_dot, $middle_path)
            /*$src = preg_replace_callback("/(?<=href=\").*?(?=\")/",
            function ($matches) use ($main_url, $full_site, $path_to_dot, $middle_path) {
                return call_user_func(array( $this, 'rc_replaceUrlsToLocalHtmlPath'), $matches[0], $main_url, $full_site, $path_to_dot, $middle_path);
            }
            , $src);*/


            $anchors = $src->find('a');
            if(!empty($anchors)){
                foreach ($anchors as $anchor) {
                    $a = url_to_absolute($main_url, $anchor->href);

                    $url = apply_filters('before_url_change_to_html', $a);
                    $url_middle_path = $this->rc_get_url_middle_path($url, true, true);

                    $exclude_url = apply_filters('wp_page_to_html_exclude_urls', false, $url);
                    $urlsToExport = apply_filters('wp_page_to_html_urls_to_export', false, $url);

                    if (!$full_site) {
                        if ( $this->getSettings('replaceUrlsToHash', false) && !$urlsToExport) {
                            $anchor->href = "#";
                            continue;
                        }
                    }
                    if(!$exclude_url){
                        if ($this->get_host($url, false) == $this->get_host($main_url, false) /*strpos($url, $main_url) !== false*/ && ($full_site||$urlsToExport) ) {
                            //$basename = apply_filters('before_basename_change', $basename);

                            /*$imgExts = $this->getImageExtensions();
                            $urlExt = pathinfo($url, PATHINFO_EXTENSION);
                            //echo $urlExt;
                            if (in_array($urlExt, $imgExts)) {
                                $basename = $this->url_to_basename($url);
                                $basename = $this->filter_filename($basename);
                                $anchor->href =  $path_to_dot . $url_middle_path . $basename;
                            } else {*/
                            if (strpos($url, '.html')==false){
                                $basename = $this->url_to_basename($url, true, '.html');
                            }
                            else{
                                $basename = $this->url_to_basename($url);
                            }

                                $basename = $this->filter_filename($basename);
                                $anchor->href =  $path_to_dot . $url_middle_path . $basename;
                            //}


                        }
                    }
                }
            }

            if( !empty($this->getExportHtmlAddContentsToTheHeader()) || !empty($this->getExportHtmlAddContentsToTheHeader()) ){
                $e = $src->find("body", 0);

                if(!empty($e)){
                    $e->outertext = $this->getExportHtmlAddContentsToTheHeader() . $e->outertext . $this->getExportHtmlAddContentsToTheFooter();
                }
            }
            $adminbar = $src->find('#wpadminbar');
            if (!empty($adminbar)){
                $styles = $src->find('style');

                foreach( $styles as $item) {
                    if (strpos($item, "html { margin-top: 32px !important; }
	@media screen and ( max-width: 782px ) {
		html { margin-top: 46px !important; }
	}") !==false){

                        $item->outertext = '';
                    }
                }


                foreach( $adminbar as $item) {
                    $item->outertext = '';
                }
            }


            //$data = $this->replaceOtherSiteUrls($src->save(), $main_url);
            $data = $this->replaceOtherSiteUrls($src->save(), $main_url);


            $src->clear();

            $handle = fopen($my_file, 'w') or die('Cannot open file:  ' . $my_file);
            $t = fwrite($handle, $data);
            if ($t) {
                $this->update_export_log('', 'created_html_file', $middle_path . $html_filename);
            }
            fclose($handle);
            //$this->site_data = null;

        }
        $this->update_urls_log($main_url, 1);

    }

    public function makeUrlWithoutProtocol($url)
    {
        $parsedUrl = parse_url($url);
        $host = $parsedUrl['host'];
        $path = $parsedUrl['path'];

        return $host . $path;
    }

    function addBackSlash($url){
        return str_replace('/', '\/', $url);
    }

    public function replaceOtherSiteUrls($contents, $main_url)
    {

        if (strpos($this->makeUrlWithoutProtocol($main_url), $this->makeUrlWithoutProtocol(home_url()))!==false){
            $main_url = home_url('/');
        }
        else{
            $main_url = $this->getFirstUrl();
        }
            // URLs to replace
        $urlsToReplace = array(
            'https:\/\/'.$this->addBackSlash($this->makeUrlWithoutProtocol($main_url)),
            'http:\/\/'.$this->addBackSlash($this->makeUrlWithoutProtocol($main_url)),
            '\/\/'.$this->addBackSlash($this->makeUrlWithoutProtocol($main_url)),
        );

// Escape the URLs for use in the regular expression
        $escapedUrls = array_map('preg_quote', $urlsToReplace, array('/','/','/'));

// Pattern to match the specific URLs
        $pattern = '/'. implode('|', $escapedUrls) .'/i';

// Replace the specific URLs with a desired string, e.g., 'REPLACED_URL'
        $replacement = '.\\/';
        $processedText = preg_replace($pattern, $replacement, $contents);

        // Pattern to match URLs starting with http:// or https://
        $pattern = array(
            'https://'.$this->makeUrlWithoutProtocol($main_url),
            'http://'.$this->makeUrlWithoutProtocol($main_url),
            '//'.$this->makeUrlWithoutProtocol($main_url),
        );

// Replace URLs with a desired string, e.g., 'REPLACED_URL'
        $replacement = './';
        $processedText = str_replace($pattern, $replacement, $processedText);

        return $processedText;
    }

    /*
     * @since 2.0.4
     * @parm $name
     * @returns filename.
     */
    public function filter_filename($name) {
        // remove illegal file system characters https://en.wikipedia.org/wiki/Filename#Reserved_characters_and_words

        //$is_encoded = preg_match('~%[0-9A-F]{2}~i', $name);
        $name = str_replace(array_merge(
            array_map('chr', range(0, 31)),
            array('<', '>', ':', '"', '/', '\\', '|', '?', '*')
        ), '', $name);
        // maximise filename length to 255 bytes http://serverfault.com/a/9548/44086
        $ext = pathinfo($name, PATHINFO_EXTENSION);
        $name= mb_strcut(pathinfo($name, PATHINFO_FILENAME), 0, 255 - ($ext ? strlen($ext) + 1 : 0), mb_detect_encoding($name)) . ($ext ? '.' . $ext : '');

        return str_replace('=', '', urldecode($name));
    }

    /**
     * @param array $all_links_href
     * @param $custom_url_host
     * @param $full_site
     * @param $replace_urls_to_hash
     * @param $all_links
     */
    public function readAllLinks(array $all_links_href, $full_site)
    {
        if (!empty($all_links_href)) {
            foreach ($all_links_href as $key => $link) {

                $url = $link;
                $slug = basename($url);
                $html_filename = $slug . '.html';

                if (!$this->rc_is_link_already_generated($url)) {

                    $home_url = home_url();

                    $url = explode('#', $url)[0];
                    //$url = explode('?', $url)[0];

                    if ($slug !== 0 && !$this->is_url_already_read($url)) {

                        if ($full_site) {
                           $this->export_wp_page_as_static_html_by_page_id($url, $html_filename);
                        }

                    }

                }
            }
        }
    }


    /**
     * @param array $files
     * @param string $destination
     * @param string $middle_patheplace_path
     * @param bool $overwrite
     * @return false|string
     */
    public function create_zip($files = array(), $destination = '', $middle_patheplace_path = "", $overwrite = true) {
        if ($this->is_cancel_command_found()) {
            return false;
        }
        //if the zip file already exists and overwrite is false, return false
        if(file_exists($destination) && !$overwrite) { return false; }
        //vars
        $valid_files = array();
        //if files were passed in...
        if(is_array($files)) {
            //cycle through each file
            foreach($files as $file) {
                //make sure the file exists
                if(file_exists($file)) {
                    if (is_file($file)) {
                        $valid_files[] = $file;
                    }

                }
            }
        }
        //if we have good files...
        if(count($valid_files)) {

            //create the archive
            $overwrite = file_exists($destination) ? true : false ;
            $zip = new \ZipArchive();
            if($zip->open($destination, $overwrite ? \ZIPARCHIVE::OVERWRITE : \ZIPARCHIVE::CREATE) !== true) {
                return false;
            }

            //add the files
            foreach($valid_files as $file) {
                $filename = str_replace( $middle_patheplace_path, '', $file);
                $zip->addFile($file, $filename);
                $this->update_export_log($filename, 'added_into_zip_file');
            }
            //debug
            //echo 'The zip archive contains ',$zip->numFiles,' files with a status of ',$zip->status;

            //close the zip -- done!
            @$zip->close();

            //check to make sure the file exists
            return file_exists($destination) ? 'created' : 'not' ;
        }
        else
        {
            return false;
        }
    }


    /**
     * @param $datas
     * @param false $customUrl
     * @return bool
     */
    public function zipWorkers($datas, $customUrl = false)
    {

        if($this->getSettings('full_site')){
            if(!$customUrl){
                $site_name = $this->get_host(home_url(), false);
            }
            else{
                $site_name = $this->get_host($datas, false);
            }
            $zipFileName = $site_name . "-fullsite";

        }else{

//            if(!$customUrl){
//                if (/*count($datas) == 1*/ true) {
//                    $postId = isset($datas[0]) ? $datas[0] : 0;
//                    $post = get_post($postId);
//                    $permalink = isset($post->permalink) ? $post->permalink : "";
//                    if($permalink == home_url() || $postId == "home_page"){
//                        $zipFileName = $this->get_host(home_url(), false) . '-homepage';
//                    }
//                    else{
//                        $zipFileName = !empty($post) ? $post->post_name: "";
//                    }
//                }
//                elseif (count($datas) > 1) {
//
//                    $zipFileName = $this->get_zip_name($datas);
//                }
//            }else{
//                if (/*$this->get_host($datas) == $datas && */ !$this->getSettings('full_site')) {
//                    $zipFileName = $this->get_host($datas, false);
//                }
//                else {
//                    $zipFileName = $this->url_to_basename($datas);
//                }
//            }

            $zipFileName = $this->url_to_basename($this->getFirstUrl());

        }

        $zipFileName .= "-" . date("j-m-y h_i_s A");


        $zipFileName = $this->filter_filename($zipFileName);

        $this->update_export_log('', 'creating_zip_file', $zipFileName.'-html.zip');
        $this->setSettings('creating_zip_process', 'running');
        //sleep(1.1);

        $upload_path = $this->export_dir;
        $all_files = $this->export_temp_dir;
        $files = $this->get_all_files_as_array($all_files);
        $totalFiles = $this->totalExtractedFiles($files);
        $this->setSettings('total_zip_files', $totalFiles);


        $zip_file_name = $upload_path.'/'.$zipFileName.'-html.zip';

        ob_start();
        echo $this->create_zip($files, $zip_file_name, $all_files . '/');
        $create_zip = ob_get_clean();

        global $wpdb;
        if ($create_zip == 'created') {
            $uploadPath = $upload_path . '/'.$zipFileName.'-html.zip';
            $downloadUrl = $this->export_url . '/'.$zipFileName.'-html.zip';

            $this->update_export_log($uploadPath, 'created_zip_file', $downloadUrl);
            $this->setSettings('zipDownloadLink', $downloadUrl);
            $this->setSettings('rc_is_export_pages_zip_downloaded', 'no');
            $this->setSettings('creating_zip_process', 'completed');

            return true;
        }
        else{
            return false;
        }
    }

    /**
     * @param array $files
     * @return int
     */
    public function totalExtractedFiles($files = array())
    {
        $total = 0;
        if(!empty($files)){
            foreach ($files as $file) {
                if(is_file($file)){
                    $total++;
                }
            }
        }
        return $total;
    }

    /**
     * @param $main_url
     * @param $full_site
     * @param string $path_to_dot
     * @param $middle_path
     * @return \Closure
     */
    public function replaceUrlsToLocalHtmlPath($main_url, $full_site, string $path_to_dot, $middle_path)
    {
        return function ($matches) use ($main_url, $full_site, $path_to_dot, $middle_path) {

            $url = apply_filters('before_url_change_to_html', $matches[0]);
            $url_middle_path = $this->rc_get_url_middle_path($url, true, true);

            $exclude_url = apply_filters('wp_page_to_html_exclude_urls', false, $url);

            if (!$full_site) {
                if (!$this->is_link_exists($url)) {
                    return "#";
                }
            }
            if ($this->get_host($url, false) == $this->get_host($main_url, false) && !$exclude_url) {
                //$basename = apply_filters('before_basename_change', $basename);

                $imgExts = $this->getImageExtensions();
                $urlExt = pathinfo($url, PATHINFO_EXTENSION);
                //echo $urlExt;
                if (in_array($urlExt, $imgExts)) {
                    $basename = $this->url_to_basename($url);
                    return $path_to_dot . 'images/' . $basename;
                } else {
                    $basename = $this->url_to_basename($url, true, '.html');
                    return $path_to_dot . $url_middle_path . $basename;
                }
            } else {
                if (strpos($url, '../') !== false) {
                    return "";
                }
                return $url;
            }

            return $url;

        };
    }


    public function rc_replaceUrlsToLocalHtmlPath($match, $main_url, $full_site, $path_to_dot, $middle_path){

        $url = apply_filters('before_url_change_to_html', $match);
        $url_middle_path = $this->rc_get_url_middle_path($url, true, true);

        $urlsToExport = apply_filters('wp_page_to_html_urls_to_export', false, $url);

        if (!$full_site) {
            if ( !$this->is_link_exists($url) && $this->getSettings('replaceUrlsToHash', false) && !$urlsToExport ) {
                return "#";
            }
        }
        if ($this->get_host($url, false) == $this->get_host($main_url, false) && ($full_site||$urlsToExport)) {
            //$basename = apply_filters('before_basename_change', $basename);

            $imgExts = $this->getImageExtensions();
            $audioExts = $this->getAudioExtensions();
            $urlExt = pathinfo($url, PATHINFO_EXTENSION);
            //echo $urlExt;
            if (in_array($urlExt, $imgExts)) {
                $basename = $this->url_to_basename($url);
                return $path_to_dot . 'images/' . $basename;
            }
            elseif (in_array($urlExt, $audioExts)){
                $basename = $this->url_to_basename($url);
                return $path_to_dot . 'audios/' . $basename;
            }
            else {
                $basename = $this->url_to_basename($url, true, '.html');
                return $path_to_dot . $url_middle_path . $basename;
            }
        } else {
            if (strpos($url, '../') !== false) {
                return "";
            }
            return $url;
        }

        return $url;
    }


    public function rc_get_url_middle_path_for_assets($url){
        $url = explode('?', $url)[0];
        $url = explode('#', $url)[0];
        if($this->getSettings('customUrl') && $this->getSettings('full_site')){
            $url = str_replace( array($this->getSettings('customUrlAddress')), array(''), $url);
        }
        $middle_path = str_replace( array(home_url(), $this->get_host($url)), array('', ''), $url);
        $middle_path = $this->ltrim_and_rtrim($middle_path, '/');
        //$middle_path = explode($middle_path);


        $middle_path = str_replace( basename($url), '', $middle_path);

        return $middle_path;
    }


    public function add_user() {

        if($this->getSettings('task') == "running" && $this->getSettings('login_as') !== ""){
            $username = 'html_export';
            $password = $this->getSettings('login_pass');
            $email = 'drew@example.com';

            if (username_exists($username) == null && email_exists($email) == false) {

                // Create the new user
                $user_id = wp_create_user($username, $password, $email);
                $user = get_user_by('id', $user_id);
                // Add role
                $user->add_role($this->getSettings('login_as'));


/*                $user = array();
                $user['user'] = $username;
                $user['password'] = $password;

                $user_info = json_encode($user);

                $this->setSettings('user_info', $user_info);*/
            }
        }
    }

    public function remove_user(){

        require_once(ABSPATH.'wp-admin/includes/user.php' );

        $user = get_user_by('login', 'html_export');
        if($user){
            wp_delete_user($user->ID);
        }

        if (file_exists($this->getExportDir() . '/cookie.txt')){
            @unlink($this->getExportDir() . '/cookie.txt');
        }
    }

    public function login(){
        $login_url = wp_login_url();
        //These are the post data username and password
        $post_data = 'log=html_export&pwd=' . $this->getSettings('login_pass');

        //Create a curl object
        $ch = curl_init();

        //Set the URL
        curl_setopt($ch, CURLOPT_URL, $login_url );

        //This is a POST query
        curl_setopt($ch, CURLOPT_POST, 1 );

        //Set the post data
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);

        //We want the content after the query
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        //Follow Location redirects
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

        /*
        Set the cookie storing files
        Cookie files are necessary since we are logging and session data needs to be saved
        */

        curl_setopt($ch, CURLOPT_COOKIEJAR, $this->getExportDir() . '/cookie.txt');
        curl_setopt($ch, CURLOPT_COOKIEFILE, $this->getExportDir() . '/cookie.txt');

        //Execute the action to login
        $postResult = curl_exec($ch);
        curl_close($ch);
    }

    public function next_page_export_from_queue($page_id){
        $url = $this->get_url_by_id($page_id);

        //update_option('test-333', $page_id);

        if ($url !== false){
            $url = urldecode($url);
            $slug = basename($url);
            $html_filename = $slug . '.html';

            $pageNowArray = array();
            $pageNowArray['id'] = $page_id;
            $pageNowArray['url'] = $url;
            $pageNowArray['html_filename'] = $html_filename;

            $this->setSettings('pageNow', $pageNowArray);

            $this->export_wp_page_as_static_html_by_page_id($url, $html_filename, $page_id+1);
        }
        else{


            $this->update_export_log('', 'all_pages_exported');
            $this->setSettings('creating_html_process', 'completed');

            do_action('creating_html_files_completed', $this->get_url_by_id(1));
        }
    }

    public function get_url_by_id($url_id=2)
    {
        global $wpdb;

        $results = $wpdb->get_results("SELECT url FROM {$wpdb->prefix}exportable_urls WHERE id = '{$url_id}'");

        if (!empty($results)) {
            return $results[0]->url;
        }

        return false;
    }

    public function generateQueueEventKey(){
        $this->queue_event_key = "queue_key_" . rand(1000, 9999999);
    }

    public function osfia_event_cron_task($next_url_id){
        $this->next_page_export_from_queue($next_url_id);
    }

    public function creating_html_files_completed_action($datas){

        $zipCreated = $this->zipWorkers($datas, $this->getSettings('customUrl'));


        /*ftpFunctions*/
        $this->ftpFunctions = new FtpFunctions\FtpFunctions($this);

        if($zipCreated){
            if ($this->getSettings('receive_email')) {
                /*Sent emails*/
                $this->sent_email();

            }

            if ($this->getSettings('ftp_upload_enabled') == 'yes') {
                /*Upload to ftp*/
                $this->ftpFunctions->uploadToFtp();
            }

            $this->setSettings('task', 'completed');
            \do_action('html_export_task_completed', "");


        }else{
            $this->setTaskFailed();
        }
    }

    public function getFirstUrl(){
        global $wpdb;
        $theUrl = $wpdb->get_results("SELECT url FROM {$wpdb->prefix}export_urls_logs WHERE id = '1'");
        if(!empty($theUrl)){
            return rtrim($theUrl[0]->url, '/') . '/';
        }
        return false;
    }

    public function getCustomPosts(){
        global $wpdb;
        $posts = $wpdb->get_results("SELECT id, post_title FROM {$wpdb->prefix}posts WHERE post_status = 'publish' AND WHERE ping_status = 'open'");
        return $posts;
    }

    function removeParam($url, $param) {
        $url = preg_replace('/(&|\?)'.preg_quote($param).'=[^&]*$/', '', $url);
        $url = preg_replace('/(&|\?)'.preg_quote($param).'=[^&]*&/', '$1', $url);
        return $url;
    }


    public function saveFile($url, $savePath)
    {
        $abs_url_to_path = $this->abs_url_to_path($url);
        if (strpos($url, home_url()) !== false && file_exists($abs_url_to_path)){
            @copy($abs_url_to_path, $savePath);
        }
        else{
            $handle = @fopen($savePath, 'w') or die('Cannot open file:  ' . $savePath);
            $data = $this->get_url_data($url);
            @fwrite($handle, $data);
            @fclose($handle);
        }

    }

    public function setDownloadTotalQueue()
    {
        $option = intval(get_option('RcDownloadTotalQueue', 0));
        $option +=1;
        update_option('RcDownloadTotalQueue', $option);
    }

    public function setTotalDownloaded()
    {
        $option = intval(get_option('SetTotalDownloaded', 0));
        $option +=1;
        update_option('SetTotalDownloaded', $option);
    }

    public function clearQueue()
    {
        delete_option('RcDownloadTotalQueue');
        delete_option('SetTotalDownloaded');
    }


    public function saveImageToWebp($imagePath, $img_path_src)
    {
        if (strpos($imagePath, 'http')!==false){
            $abs_url_to_path = $this->abs_url_to_path($imagePath);
            if (strpos($imagePath, home_url()) !== false && file_exists($abs_url_to_path)){
                @copy($abs_url_to_path, $img_path_src);
            }
            else{
                $handle = @fopen($img_path_src, 'w') or die('Cannot open file:  ' . $img_path_src);
                $data = $this->get_url_data($imagePath);
                @fwrite($handle, $data);
                @fclose($handle);
            }
        }
        $im = false;
        if (strpos($img_path_src, 'jpg')!==false){
            $im = imagecreatefromjpeg($img_path_src);
        }
        elseif (strpos($img_path_src, 'png')!==false){
            $im = imagecreatefrompng($img_path_src);
            imagepalettetotruecolor($im);
        }
        elseif (strpos($img_path_src, 'gif')!==false){
            $im = imagecreatefromgif($img_path_src);
        }
        elseif (strpos($img_path_src, 'wbmp')!==false){
            $im = imagecreatefromwbmp($img_path_src);
        }
        //Create an image object.

        //if (!$im) return;
        //The path that we want to save our webp file to.
        $newImagePath = str_replace( array("jpg","jpeg", "png"), "webp", $img_path_src);

        //Quality of the new webp image. 1-100.
        //Reduce this to decrease the file size.

        $quality = 80;
        $settingQuality = $this->getSettings('image_quality');

        if ($settingQuality!==0){
            $quality = intval($settingQuality);
        }

        //$this->admin->update_export_log('webp>>>'.$img_path_src);
        //Create the webp image.
        if( $im !== false && imagewebp($im, $newImagePath, $quality)){
            $this->update_export_log(basename($newImagePath), 'created');
            @unlink($img_path_src);
        }
    }

    public function file_exists($url)
    {
        $abs_url_to_path = $this->abs_url_to_path($url);
        if (file_exists($abs_url_to_path)){
            return true;
        }
        return false;
    }

    public function getCookiesIntoArray($cookieFilePath){
        $cookieData = [];

        if (file_exists($cookieFilePath)) {
            $lines = file($cookieFilePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

            foreach ($lines as $line) {
                $line = trim($line);
                $parts = explode("\t", $line);

                if (count($parts) >= 7) {
                    $cookieName = $parts[5];
                    $cookieValue = $parts[6];
                    $cookieData[$cookieName] = $cookieValue;
                }
            }
        }
        return $cookieData;
    }

}



