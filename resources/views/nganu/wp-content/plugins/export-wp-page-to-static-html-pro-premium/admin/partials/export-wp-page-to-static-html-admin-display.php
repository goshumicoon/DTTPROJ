<?php

    /**
     * Provide a admin area view for the plugin
     *
     * This file is used to markup the admin-facing aspects of the plugin.
     *
     * @link       https://www.upwork.com/fl/rayhan1
     * @since      1.0.0
     *
     * @package    Export_Wp_Page_To_Static_Html
     * @subpackage Export_Wp_Page_To_Static_Html/admin/partials
     */


    $args = array(
        'post_type' => 'page',
        'post_status' => ['publish', 'private'],
        'posts_per_page' => '-1'
    );

    $query = new WP_Query( $args );

    $ftp_status = get_option('rc_export_html_ftp_connection_status');


    $ftp_data = get_option('rc_export_html_ftp_data');

    $host = isset($ftp_data->host) ? $ftp_data->host : "";
    $user = isset($ftp_data->user) ? $ftp_data->user : "";
    $pass = isset($ftp_data->pass) ? $ftp_data->pass : "";
    $path = isset($ftp_data->path) ? $ftp_data->path : "";

    $createIndexOnSinglePage = get_option('rcExportHtmlCreateIndexOnSinglePage', true);
    $saveAllAssetsToSpecificDir = get_option('rcExportHtmlSaveAllAssetsToSpecificDir', true);
    $keepSameName = get_option('rcExportHtmlKeepSameName', false);
    $addContentsToTheHeader = get_option('rcExportHtmlAddContentsToTheHeader');
    $addContentsToTheFooter = get_option('rcExportHtmlAddContentsToTheFooter');
    $excludeUrls = get_option('rcExportHtmlExcludeUrls', "%/wp-login.php\n%/wp-admin");


$versionIssue = sprintf('If the plugin does not work perfectly then it\'s require a PHP version ">= 7.2.5. You are running %s.', PHP_VERSION);
$versionIssue = __('<div class="danger" style="color: white;margin-bottom: 46px;background-color: #f21212d6;padding: 10px;">'.$versionIssue.'</div>', 'export-wp-page-to-static-html');

$upload_dir = wp_upload_dir()['basedir'] . '/exported_html_files/';
$upload_url = wp_upload_dir()['baseurl'] . '/exported_html_files/';

$d = dir($upload_dir);


function rcwpth_hidden_class($filename){
        $rcwph_files_hide = get_option('rcwph_hidden_files');
        if (!empty($rcwph_files_hide)){
            foreach ($rcwph_files_hide as $key => $item) {
                if ($item == $filename){
                    return "hidden";
                    break;
                }
            }
        }

        return "";
    }
?>

<div class="page-wrapper p-b-100 font-poppins static_html_settings">
    <div class="wrapper">
        <div class="card card-4">
            <div class="card-body">
                <h2 class="title"><?php _e('Export WP Pages to Static HTML/CSS', 'export-wp-page-to-static-html'); ?><span class="badge badge-dark version">v<?php echo EXPORT_WP_PAGE_TO_STATIC_HTML_VERSION; ?></span></h2>


                <?php
                if (isset($_GET['welcome'])&&!(PHP_VERSION_ID >= 70205)) {
                    echo $versionIssue;
                }
                ;?>

                <div class="row">
                    <div class="col-7">

                        <?php if (!ewptshp_fs()->is_plan('pro', true)): ?>

                            <div class="eh_premium">This option available for premium version only <div class="go_pro2">
                                    <select id="licenses">
                                        <option value="1" selected="selected">Single Site License</option>
                                        <option value="3">3-Site License</option>


                                        <option value="unlimited">Unlimited Site License</option>
                                    </select>
                                    <button id="purchase" class="location">Upgrade Now</button>

                                    <script>
                                        var $ = jQuery;
                                    </script>
                                    <script src="https://checkout.freemius.com/checkout.min.js"></script>
                                    <script>
                                        var handler = FS.Checkout.configure({
                                            plugin_id:  '8170',
                                            plan_id:    '13516',
                                            public_key: 'pk_6dc0a25d3672a637db3b8c45379ab',
                                            image:      'https://s3-us-west-2.amazonaws.com/freemius/plugins/8170/icons/6ea0f8afeeaf904d8258b7ebb40e4cd3.png',
                                            //trial: true,
                                        });

                                        $('#purchase.location').on('click', function (e) {
                                            handler.open({
                                                name     : 'Export wp page to static html pro',
                                                licenses : $('#licenses').val(),
                                                // You can consume the response for after purchase logic.
                                                success  : function (response) {
                                                    // alert(response.user.email);
                                                },

                                                purchaseCompleted : function(r){
                                                    console.log(r);
                                                }
                                            });
                                            e.preventDefault();
                                        });
                                    </script></div></div>

                        <?php endif ?>

                        <div class=" export_html main_settings_page <?php echo !ewptshp_fs()->is_plan('pro', true) ? 'blur' : ''; ?> ">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-id="tab1" data-toggle="tab" href="#tabs-1" role="tab">WP Pages</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-id="tab2" data-toggle="tab" href="#tabs-2" role="tab">Custom urls</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-id="tab3" data-toggle="tab" href="#tabs-3" role="tab">All Exported Files</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-id="tab4" data-toggle="tab" href="#tabs-4" role="tab">FTP Settings <span class="tab_ftp_status <?php echo $ftp_status; ?>"></span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-id="tab5" data-toggle="tab" href="#tabs-5" role="tab">Advanced Settings</a>
                                </li>
                            </ul><!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="tabs-1" role="tabpanel">

                                    <form method="POST" class="pt-3">
                                        <div class="input-group select-a-page-input-group">
                                            <label class="label" for="export_pages"><?php _e('Select a page', 'export-wp-page-to-static-html'); ?></label>

                                            <span class="select_multi_pages">Select one or more pages</span>
                                            <div class="rs-select2 js-select-simple select--no-search">
                                                <select id="export_pages" name="export_pages" multiple>
                                                    <option value="home_page" permalink="<?php echo home_url('/'); ?>" filename="homepage"><?php _e('Homepage', 'export-wp-page-to-static-html');?> (<?php echo home_url(); ?>)</option>

                                                    <?php

                                                        if (!empty($query->posts)) {
                                                            foreach ($query->posts as $key => $post) {
                                                                $post_id = $post->ID;
                                                                $post_title = $post->post_title;
                                                                $permalink = get_the_permalink($post_id);
                                                                $parts = parse_url($permalink);

                                                                if(isset($parts['query'])){
                                                                    parse_str($parts['query'], $query);
                                                                }
                                                                else{
                                                                    $query = "";
                                                                }

                                                                if (!empty($query)) {
                                                                    $permalink = strtolower(str_replace(" ", "-", $post_title));
                                                                }

                                                                $private = '';
                                                                if ($post->post_status == "private"){
                                                                    $private = __(' (private)', 'export-wp-page-to-static-html');
                                                                }

                                                                if(!empty($post_title)){
                                                                    if ($post->post_status == "private"){
                                                                        ?>
                                                                        <option value="<?php echo $post_id; ?>" permalink="<?php echo basename($permalink); ?>"><?php echo $post_title . $private; ?> </option>
                                                                        <?php
                                                                    }
                                                                    else{
                                                                        ?>
                                                                        <option value="<?php echo $post_id; ?>" permalink="<?php echo basename($permalink); ?>"><?php echo $post_title; ?></option>
                                                                        <?php
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                                <div class="select-dropdown"></div>
                                            </div>

                                            <div class="seach_posts">
                                                <div class="p-t-10">
                                                    <label class="checkbox-container m-r-45"><?php _e('Search posts only', 'export-wp-page-to-static-html'); ?>

                                                        <input type="checkbox" id="search_posts_to_select2" name="search_posts_to_select2">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="select_all_pages">
                                                <div class="p-t-10">
                                                    <label class="checkbox-container m-r-45"><?php _e('Select all pages', 'export-wp-page-to-static-html'); ?>

                                                        <input type="checkbox" id="selectAllPages" name="selectAllPages">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <!-- <div class="select_pages_to_export">
                                                <ul class="pages_list">
                                                </ul>
                                            </div> -->
                                        </div>


                                        <div class="col-8">

                                            <div class="p-t-10">
                                                    <div class="input-group">
                                                        <label class="label label_login_as " style="font-weight: bold" for="login_as"><?php _e('Login as (optional)', 'export-wp-page-to-static-html'); ?></label>

                                                        <select id="login_as" name="login_as">
                                                            <option value="" selected=""><?php _e('Select a user role', 'export-wp-page-to-static-html'); ?></option>
                                                               <?php
                                                                    global $wp_roles;

                                                                    $all_roles = $wp_roles->roles;

                                                                    if(!empty($all_roles)){
                                                                        foreach($all_roles as $key => $role){
                                                                            echo '<option value="'.$key.'">' . $role['name'] . '</option>';
                                                                        }
                                                                    }
                                                                ?>
                                                            </select>

                                                    </div>

                                                <div class="p-t-10">
                                                    <label class="checkbox-container full_site m-r-45" for="full_site"><?php _e('Full Site', 'export-wp-page-to-static-html'); ?>
                                                        <input type="checkbox" id="full_site" name="full_site">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>

                                                <div class="p-t-10">
                                                    <label class="checkbox-container m-r-45"><?php _e('Replace all url to #', 'export-wp-page-to-static-html'); ?>
                                                        <input type="checkbox" id="replace_all_url" name="replace_all_url">
                                                        <span class="checkmark"></span>
                                                    </label>

                                                </div>

                                                <div class="p-t-10">
                                                    <label class="checkbox-container m-r-45" for="skip_assets"><?php _e('Skip Assets (Css, Js, Images or Videos)', 'export-wp-page-to-static-html'); ?>
                                                        <input type="checkbox" id="skip_assets" name="skip_assets">
                                                        <span class="checkmark"></span>
                                                    </label>

                                                    <div class="skip_assets_subsection export_html_sub_settings">
                                                        <label class="checkbox-container m-r-45" for="skip_stylesheets"><?php _e('Skip Stylesheets (.css)', 'export-wp-page-to-static-html'); ?>
                                                            <input type="checkbox" id="skip_stylesheets" name="skip_stylesheets" checked>
                                                            <span class="checkmark"></span>
                                                        </label>

                                                        <label class="checkbox-container m-r-45" for="skip_scripts"><?php _e('Skip Scripts (.js)', 'export-wp-page-to-static-html'); ?>
                                                            <input type="checkbox" id="skip_scripts" name="skip_scripts" checked>
                                                            <span class="checkmark"></span>
                                                        </label>

                                                        <label class="checkbox-container m-r-45" for="skip_images"><?php _e('Skip Images', 'export-wp-page-to-static-html'); ?>
                                                            <input type="checkbox" id="skip_images" name="skip_images" checked>
                                                            <span class="checkmark"></span>
                                                        </label>

                                                        <label class="checkbox-container m-r-45" for="skip_videos"><?php _e('Skip Videos', 'export-wp-page-to-static-html'); ?>
                                                            <input type="checkbox" id="skip_videos" name="skip_videos" checked>
                                                            <span class="checkmark"></span>
                                                        </label>

                                                        <label class="checkbox-container m-r-45" for="skip_audios"><?php _e('Skip Audios', 'export-wp-page-to-static-html'); ?>
                                                            <input type="checkbox" id="skip_audios" name="skip_audios" checked>
                                                            <span class="checkmark"></span>
                                                        </label>

                                                        <label class="checkbox-container m-r-45" for="skip_docs"><?php _e('Skip Documnets', 'export-wp-page-to-static-html'); ?>
                                                            <input type="checkbox" id="skip_docs" name="skip_docs" checked>
                                                            <span class="checkmark"></span>
                                                        </label>

                                                    </div>

                                                </div>

                                                <div class="p-t-10">
                                                    <label class="checkbox-container m-r-45" for="image_to_webp"><?php _e('Compress images size (image to webp)', 'export-wp-page-to-static-html'); ?>
                                                        <input type="checkbox" id="image_to_webp" name="image_to_webp">
                                                        <span class="checkmark"></span>
                                                    </label>

                                                    <div class="image_to_webp_subsection export_html_sub_settings">
                                                        <div class="brightness-box">
                                                            <input type="range" id="image_quality" min="10" max="100" value="80">
                                                        </div>
                                                        <input type="text" id="image_quality_input" value="80" style="width: 45px;" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
                                                    </div>
                                                </div>

                                                <div class="p-t-10">
                                                    <label class="checkbox-container ftp_upload_checkbox m-r-45 <?php
                                                        if ($ftp_status !== 'connected') {
                                                            echo 'ftp_disabled';
                                                        }
                                                    ?>"><?php _e('Upload to ftp', 'export-wp-page-to-static-html'); ?>
                                                        <input type="checkbox" id="upload_to_ftp" name="upload_to_ftp"

                                                            <?php
                                                                if ($ftp_status !== 'connected') {
                                                                    echo 'disabled=""';
                                                                }
                                                            ?>
                                                        >
                                                        <span class="checkmark"></span>
                                                    </label>

                                                    <div class="ftp_Settings_section export_html_sub_settings">

                                                        <div class="ftp_settings_item">
                                                            <label for="ftp_path"><?php _e('FTP upload path', 'export-wp-page-to-static-html'); ?></label>
                                                            <input type="text" id="ftp_path" name="ftp_path" placeholder="Upload path" value="<?php echo $path; ?>">
                                                            <div class="ftp_path_browse1"><a href="#"><?php _e('Browse', 'export-wp-page-to-static-html'); ?></a></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="p-t-10">
                                                    <div class="email_settings_section">
                                                        <div class="email_settings_item">
                                                            <label class="checkbox-container m-r-45"><?php _e('Receive notification when complete', 'export-wp-page-to-static-html'); ?>
                                                                <input type="checkbox" id="email_notification" name="email_notification">
                                                                <span class="checkmark"></span>
                                                            </label>

                                                            <div class="email_settings_item export_html_sub_settings">
                                                                <input type="text" id="receive_notification_email" name="notification_email" placeholder="Enter emails (optional)">
                                                                <span><?php _e('Enter emails seperated by comma (,) (optional)', 'export-wp-page-to-static-html'); ?></span>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>

                                                <div class="p-t-10">
                                                    <div class="util_settings_section">
                                                        <div class="util_settings_item">
                                                            <label class="checkbox-container m-r-45"><?php _e('Alternative Export (if any issues appear previously)', 'export-wp-page-to-static-html'); ?>
                                                                <input type="checkbox" id="alt_export" name="alt_export">
                                                                <span class="checkmark"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="p-t-15">
                                            <button class="btn btn--radius-2 btn--blue export_internal_page_to_html" type="submit"><?php _e('Export HTML', 'export-wp-page-to-static-html'); ?> <span class="spinner_x hide_spin"></span></button>
                                            <a class="cancel_rc_html_export_process" href="#">
                                                Cancel
                                            </a>
                                            <a href="" class="btn btn--radius-2 btn--green download-btn hide" type="submit" btn-text="<?php _e('Download the file', 'export-wp-page-to-static-html'); ?>"><?php _e('Download the file', 'export-wp-page-to-static-html'); ?></a>
                                            <a href="" class="view_exported_file hide" type="submit" target="_blank"><?php _e('View Exported File', 'export-wp-page-to-static-html'); ?></a>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane custom_links" id="tabs-2" role="tabpanel">

                                    <div class="custom_link_section">
                                        <input type="text" name="custom_link" placeholder="Enter a url">
                                    </div>


                                    <div class="p-t-10">
                                        <label class="checkbox-container m-r-45"><?php _e('Full site (must use homepage url)', 'export-wp-page-to-static-html'); ?>
                                            <input type="checkbox" id="full_site2" name="full_site">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>

                                    <div class="p-t-10">
                                        <label class="checkbox-container m-r-45"><?php _e('Replace all url to #', 'export-wp-page-to-static-html'); ?>
                                            <input type="checkbox" id="replace_all_url2" name="replace_all_url">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>


                                    <div class="p-t-10">
                                        <label class="checkbox-container m-r-45" for="custom_url_skip_assets"><?php _e('Skip Assets (Css, Js, Images or Videos)', 'export-wp-page-to-static-html'); ?>
                                            <input type="checkbox" id="custom_url_skip_assets" name="custom_url_skip_assets">
                                            <span class="checkmark"></span>
                                        </label>

                                        <div class="skip_assets_subsection export_html_sub_settings">
                                            <label class="checkbox-container m-r-45" for="custom_url_skip_stylesheets"><?php _e('Skip Stylesheets (.css)', 'export-wp-page-to-static-html'); ?>
                                                <input type="checkbox" id="custom_url_skip_stylesheets" name="custom_url_skip_stylesheets" checked>
                                                <span class="checkmark"></span>
                                            </label>

                                            <label class="checkbox-container m-r-45" for="custom_url_skip_scripts"><?php _e('Skip Scripts (.js)', 'export-wp-page-to-static-html'); ?>
                                                <input type="checkbox" id="custom_url_skip_scripts" name="custom_url_skip_scripts" checked>
                                                <span class="checkmark"></span>
                                            </label>

                                            <label class="checkbox-container m-r-45" for="custom_url_skip_images"><?php _e('Skip Images', 'export-wp-page-to-static-html'); ?>
                                                <input type="checkbox" id="custom_url_skip_images" name="custom_url_skip_images" checked>
                                                <span class="checkmark"></span>
                                            </label>

                                            <label class="checkbox-container m-r-45" for="custom_url_skip_videos"><?php _e('Skip Videos', 'export-wp-page-to-static-html'); ?>
                                                <input type="checkbox" id="custom_url_skip_videos" name="custom_url_skip_videos" checked>
                                                <span class="checkmark"></span>
                                            </label>

                                            <label class="checkbox-container m-r-45" for="custom_url_skip_audios"><?php _e('Skip Audios', 'export-wp-page-to-static-html'); ?>
                                                <input type="checkbox" id="custom_url_skip_audios" name="custom_url_skip_audios" checked>
                                                <span class="checkmark"></span>
                                            </label>

                                            <label class="checkbox-container m-r-45" for="custom_url_skip_docs"><?php _e('Skip Documents', 'export-wp-page-to-static-html'); ?>
                                                <input type="checkbox" id="custom_url_skip_docs" name="custom_url_skip_docs" checked>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>

                                    </div>


                                    <div class="p-t-10">
                                        <label class="checkbox-container m-r-45" for="custom_image_to_webp"><?php _e('Compress images size (image to webp)', 'export-wp-page-to-static-html'); ?>
                                            <input type="checkbox" id="custom_image_to_webp" name="custom_image_to_webp">
                                            <span class="checkmark"></span>
                                        </label>


                                        <div class="image_to_webp_subsection export_html_sub_settings">
                                            <div class="brightness-box">
                                                <input type="range" id="custom_image_quality" min="10" max="100" value="80">
                                            </div>
                                            <input type="text" id="custom_image_quality_input" value="80" style="width: 45px;" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
                                        </div>

                                    </div>

                                    <div class="p-t-10">
                                        <label class="checkbox-container ftp_upload_checkbox m-r-45 <?php
                                            if ($ftp_status !== 'connected') {
                                                echo 'ftp_disabled';
                                            }
                                        ?>"><?php _e('Upload to ftp', 'export-wp-page-to-static-html'); ?>
                                            <input type="checkbox" id="upload_to_ftp2" name="upload_to_ftp"

                                                <?php
                                                    if ($ftp_status !== 'connected') {
                                                        echo 'disabled=""';
                                                    }
                                                ?>
                                            >
                                            <span class="checkmark"></span>
                                        </label>

                                        <div class="ftp_Settings_section2 export_html_sub_settings">


                                            <!--  <div class="ftp_settings_item">
                                                <input type="text" id="ftp_host2" name="ftp_host" placeholder="Host" value="<?php echo $host; ?>">
                                            </div>
                                            <div class="ftp_settings_item">
                                                <input type="text" id="ftp_user2" name="ftp_user" placeholder="User" value="<?php echo $user; ?>">
                                            </div>
                                            <div class="ftp_settings_item">
                                                <input type="password" id="ftp_pass2" name="ftp_pass" placeholder="Password" value="<?php echo $pass; ?>">
                                            </div> -->
                                            <div class="ftp_settings_item">
                                                <label for="ftp_path2"><?php _e('FTP upload path', 'export-wp-page-to-static-html'); ?></label>
                                                <input type="text" id="ftp_path2" name="ftp_path" placeholder="Upload path" value="<?php echo $path; ?>">
                                                <div class="ftp_path_browse1"><a href="#"><?php _e('Browse', 'export-wp-page-to-static-html'); ?></a></div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="p-t-10">
                                        <div class="email_settings_section">
                                            <div class="email_settings_item2">
                                                <label class="checkbox-container m-r-45"><?php _e('Receive notification when complete', 'export-wp-page-to-static-html'); ?>
                                                    <input type="checkbox" id="email_notification2" name="email_notification">
                                                    <span class="checkmark"></span>
                                                </label>

                                                <div class="email_settings_item2 export_html_sub_settings">
                                                    <input type="text" id="receive_notification_email2" name="notification_email" placeholder="Enter emails (optional)">
                                                    <span><?php _e('Enter emails seperated by comma (,) (optional)', 'export-wp-page-to-static-html'); ?></span>
                                                </div>
                                            </div>


                                        </div>
                                    </div>


                                    <div class="p-t-10">
                                        <div class="custom_util_settings_section">
                                            <div class="custom_util_settings_item">
                                                <label class="checkbox-container m-r-45"><?php _e('Alternative Export (if any issues appear previously)', 'export-wp-page-to-static-html'); ?>
                                                    <input type="checkbox" id="custom_alt_export" name="custom_alt_export">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="p-t-20"></div>
                                    <button class="btn btn--radius-2 btn--blue export_external_page_to_html" type="submit"><?php _e('Export HTML', 'export-wp-page-to-static-html'); ?> <span class="spinner_x hide_spin"></span></button>
                                    <a class="cancel_rc_html_export_process" href="#">
                                        Cancel
                                    </a>
                                    <a href="" class="btn btn--radius-2 btn--green download-btn hide" type="submit"><?php _e('Download the file', 'export-wp-page-to-static-html'); ?></a>
                                    <a href="" class="view_exported_file hide" type="submit" target="_blank"><?php _e('View Exported File', 'export-wp-page-to-static-html'); ?></a>
                                </div>
                                <div class="tab-pane" id="tabs-3" role="tabpanel">

                                    <div class="files_action_select_section">

                                        <div class="all_zip_files">
                                            <?php ob_start(); ?>
                                            <div class="files_action_select_section" style="padding-bottom: 10px;border-bottom: 1px solid #dddddd;margin-bottom: 4px;">
                                                <input type="checkbox" value="check_all_files" id="check_all_files" style="vertical-align: middle">
                                                <select name="files_action" id="files_action">
                                                    <option value=""><?php _e('Select an action', 'export-wp-page-to-static-html'); ?></option>
                                                    <option value="remove"><?php _e('Remove', 'export-wp-page-to-static-html'); ?></option>
                                                    <option value="hide"><?php _e('Hide', 'export-wp-page-to-static-html'); ?></option>
                                                    <option value="visible"><?php _e('Visible', 'export-wp-page-to-static-html'); ?></option>
                                                </select>
                                                <button class="btn submit_files_action btn--blue" style="padding: 15px 12px;line-height: 0;vertical-align: middle;border-radius: 4px;font-size: 14px;"><?php _e('Submit', 'export-wp-page-to-static-html'); ?></button>

                                                <a href="#" class="show_hidden_files" style="float: right;position: relative;top: 6px;"><?php _e('Show hidden files', 'export-wp-page-to-static-html'); ?></a>
                                            </div>
                                            <?php

                                            $c = 0;

                                            if (!empty($d)) {
                                                while($file = $d->read()) {
                                                    if (strpos($file, '.zip')!== false) {
                                                        $c++;
                                                        echo '<div class="exported_zip_file '.rcwpth_hidden_class($file).'"><input type="checkbox" value="'.$file.'">'.$c.'. <a class="file_name" href="'.$upload_url.$file.'">'.$file.'</a><span class="delete_zip_file" file_name="'.$file.'"></span></div>';
                                                    }
                                                }
                                            }

                                            $filesHtml = ob_get_clean();

                                            if ($c == 0) {
                                                echo '<div class="files-not-found">Files not found!</div>';
                                            }
                                            else{
                                                echo $filesHtml;
                                            }
                                            echo '</div>';
                                            ?>
                                        </div>
                                    </div>


                                <div class="tab-pane" id="tabs-4" role="tabpanel">
                                    <div class="ftp_Settings_section3">

                                        <div class="ftp_settings_item">
                                            <label for="ftp_host3"><?php _e('FTP host', 'export-wp-page-to-static-html'); ?></label>
                                            <input type="text" id="ftp_host3" name="ftp_host" placeholder="Host" value="<?php echo $host; ?>">
                                        </div>
                                        <div class="ftp_settings_item">
                                            <label for="ftp_user3"><?php _e('FTP user', 'export-wp-page-to-static-html'); ?></label>
                                            <input type="text" id="ftp_user3" name="ftp_user" placeholder="User" value="<?php echo $user; ?>">
                                        </div>
                                        <div class="ftp_settings_item">
                                            <label for="ftp_pass3"><?php _e('FTP password', 'export-wp-page-to-static-html'); ?></label>
                                            <input type="password" id="ftp_pass3" name="ftp_pass" placeholder="Password" value="<?php echo $pass; ?>">
                                        </div>
                                        <div class="ftp_settings_item">
                                            <label for="ftp_path3"><?php _e('FTP upload path (deafult)', 'export-wp-page-to-static-html'); ?></label>
                                            <input type="text" id="ftp_path3" name="ftp_path" placeholder="Upload path" value="<?php echo $path; ?>">
                                        </div>


                                        <div class="ftp_status_section"><span class="ftp_status_text"><?php _e('FTP connection status: ', 'export-wp-page-to-static-html'); ?></span><span class="ftp_status">
                                            <?php
                                                if ( $ftp_status == 'connected' ): ?>
                                                    <span class="ftp_connected">Connected</span>
                                                    <span class="ftp_not_connected" style="display: none;"><?php _e('Not Connected', 'export-wp-page-to-static-html'); ?></span>

                                                <?php else: ?>
                                                    <span class="ftp_connected" style="display: none;"><?php _e('Connected', 'export-wp-page-to-static-html'); ?></span>
                                                    <span class="ftp_not_connected"><?php _e('Not Connected', 'export-wp-page-to-static-html'); ?></span>
                                                <?php endif ?>
                                        </span>

                                        </div>
                                        <div class="ftp_authentication_failed" style="<?php if ( $ftp_status == 'connected' ): ?>
                                                display: none;
                                        <?php endif ?>">
                                            <?php _e('<span style="font-weight: bold;">Error: </span>Host name or username or password is wrong. Please check and try again!', 'export-wp-page-to-static-html'); ?>
                                        </div>

                                        <button id="test_ftp_connection" class="btn btn--radius-2 btn--green" style="margin-top: 15px;"><?php _e('Test Connection', 'export-wp-page-to-static-html'); ?></button>
                                    </div>
                                </div>

                                <div class="tab-pane" id="tabs-5" role="tabpanel">
                                    <div class="p-t-20">
                                        <label class="checkbox-container full_site m-r-45" for="createIndexOnSinglePage"><?php _e('Create <b>index.html</b> on single page exporting', 'export-wp-page-to-static-html'); ?>
                                            <input type="checkbox" id="createIndexOnSinglePage" name="createIndexOnSinglePage" <?php echo $createIndexOnSinglePage ? 'checked' : ''; ?> >
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="p-t-20">
                                        <label class="checkbox-container m-r-45" for="saveAllAssetsToSpecificDir"><?php _e('Save all assets files to the specific directory (css, js, images, fonts, audios etc).', 'export-wp-page-to-static-html'); ?>
                                            <input type="checkbox" id="saveAllAssetsToSpecificDir" name="saveAllAssetsToSpecificDir" <?php echo $saveAllAssetsToSpecificDir ? 'checked' : ''; ?>>
                                            <span class="checkmark"></span>
                                        </label>

                                        <div class="saveAllAssetsToSpecificDir_assets_subsection export_html_sub_settings mt-4"  style="display: <?php echo $saveAllAssetsToSpecificDir ? 'block' : 'none'; ?>">
                                            <label class="radio-container m-r-45" for="keepSameName"><?php _e('Keep the same name (file will save into year and date directory. Example: 2022/06/filename.png)', 'export-wp-page-to-static-html'); ?>
                                                <input type="radio" id="keepSameName" name="keepSameName" value="1" <?php echo $keepSameName ? 'checked' : ''; ?>>
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="radio-container m-r-45 mt-3" for="saveAllInOneDir"><?php _e('Save all files into the related directory (it will add year and month before the file. Example: 2022-06-filename.png)(<strong>Recommended</strong>)', 'export-wp-page-to-static-html'); ?>
                                                <input type="radio" id="saveAllInOneDir" name="keepSameName" value="0" <?php echo !$keepSameName ? 'checked' : ''; ?>>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="p-t-20">
                                        <label class="label m-r-45" for="excludeUrls"><?php _e('<b>Exclude Urls</b>', 'export-wp-page-to-static-html'); ?>
                                            <br>
                                            <textarea id="excludeUrls" name="excludeUrls" style="height: 80px; width: 100%"><?php echo $excludeUrls; ?></textarea>
                                        </label>
                                    </div>

                                    <div class="p-t-20">
                                        <label class="label m-r-45" for="addContentsToTheHeader"><?php _e('<b>Add contents to the header</b>', 'export-wp-page-to-static-html'); ?>
                                            <br>
                                            <textarea id="addContentsToTheHeader" name="addContentsToTheHeader" style="height: 80px; width: 100%"><?php echo $addContentsToTheHeader; ?></textarea>
                                        </label>
                                    </div>
                                    <div class="p-t-20">
                                        <label class="label m-r-45" for="addContentsToTheFooter"><?php _e('<b>Add contents to the footer</b>', 'export-wp-page-to-static-html'); ?>
                                            <br>
                                            <textarea id="addContentsToTheFooter" name="addContentsToTheFooter" style="height: 80px; width: 100%"><?php echo $addContentsToTheFooter; ?></textarea>
                                        </label>
                                    </div>

                                    <button class="btn btn--radius-2 btn--blue m-t-20 btn_save_settings" type="submit"><?php _e('Save Settings', 'export-wp-page-to-static-html'); ?> <span class="spinner_x hide_spin"></button>
                                    <span class="badge badge-success badge_save_settings" style="display: none; padding: 5px"><?php _e('Successfully Saved!', 'export-wp-page-to-static-html'); ?></span>
                                </div>
                            </div>

                        </div>


                        <div class="htmlExportLogs" style="display: none; margin-top: 15px;margin-bottom: 15px;">
                            <h4 class="progress-title p-t-15"><?php _e('Html export log', 'export-wp-page-to-static-html'); ?></h4>
                            <span class="totalExported" style="margin-right: 10px"><?php _e('Exported:', 'export-wp-page-to-static-html'); ?> <span class="total_exported_files progress_">0</span></span>
                            <span class="totalLogs"><?php _e('Fetched files:', 'export-wp-page-to-static-html'); ?> <span class="total_fetched_files total_">0</span></span>
                            <div class="progress orange" style="margin-top: 20px">
                                <div class="progress-bar" style="width:0%; background:#fe3b3b;">
                                    <div class="progress-value">0%</div>
                                </div>
                            </div>
                            <div class="export_failed error" style="display: none;"><?php _e('Error, failed to export files!', 'export-wp-page-to-static-html'); ?> </div>

                            <button class="flat-button pause" role="button" style="display: none;"><?php _e('Pause', 'export-wp-page-to-static-html'); ?></button>
                            <button class="flat-button resume" role="button" style="display: none;"><?php _e('Resume', 'export-wp-page-to-static-html'); ?></button>
                        </div>

                        <div class="creatingZipFileLogs" style="display: none;">
                            <h4 class="progress-title p-t-15"><?php _e('Creating Zip File', 'export-wp-page-to-static-html'); ?></h4>

                            <span class="totalPushedFilesToZip" style="margin-right: 10px"><?php _e('Created:', 'export-wp-page-to-static-html'); ?> <span class="total_pushed_files_to_zip progress_">0</span></span>
                            <span class="totalFilesToPush"><?php _e('Total files:', 'export-wp-page-to-static-html'); ?> <span class="total_files_to_push total_">0</span></span>

                            <div class="progress blue" style="margin-top: 20px">
                                <div class="progress-bar" style="width:90%; background:#1a4966;">
                                    <div class="progress-value">0%</div>
                                </div>
                            </div>
                            <div class="export_failed error" style="display: none;"><?php _e('Error, failed to create zip file!', 'export-wp-page-to-static-html'); ?> </div>
                        </div>

                        <div class="uploadingFilesToFtpLogs" style="display: none;">
                            <h4 class="progress-title p-t-15"><?php _e('Uploading Files to Ftp', 'export-wp-page-to-static-html'); ?></h4>

                            <span class="totalUploadedFilesToFtp" style="margin-right: 10px"><?php _e('Uploaded:', 'export-wp-page-to-static-html'); ?> <span class="total_uploaded_files_to_ftp progress_">0</span></span>
                            <span class="totalFilesToUpload"><?php _e('Total files:', 'export-wp-page-to-static-html'); ?> <span class="total_files_to_upload total_">0</span></span>

                            <div class="progress green" style="margin-top: 20px">
                                <div class="progress-bar" style="width:90%; background:#4daf7c;">
                                    <div class="progress-value">0%</div>
                                </div>
                            </div>
                            <div class="export_failed error" style="display: none;"><?php _e('Upload failed! Check your network connection!', 'export-wp-page-to-static-html'); ?></div>
                        </div>

                        <a class="see_logs_in_details" style="display: none;" href="#"><?php _e('See logs in details', 'export-wp-page-to-static-html'); ?></a>

                        <div class="logs p-t-15 col-10">
                            <h4 class="p-t-15"><?php _e('Export log', 'export-wp-page-to-static-html'); ?></h4>
                            <div class="logs_list">
                            </div>
                        </div>

                    </div>

                    <div class="col-3 p-10 dev_section" >

                        <div class="created_by py-2 mt-1 border-bottom"> <?php _e('Created by', 'export-wp-page-to-static-html'); ?> <a href="https://myrecorp.com"><img src="<?php echo EWPPTSH_PLUGIN_DIR_URL . '/admin/images/recorp-logo.png'; ?>" alt="ReCorp" width="100"></a></div>


                        <div class="documentation my-2">
                            <span><?php _e('See the documentation', 'export-wp-page-to-static-html'); ?> </span> <a href="https://myrecorp.com/documentation/export-wp-page-to-html"><?php _e('here', 'export-wp-page-to-static-html'); ?></a>
                        </div>
                        <div class="support my-2">
                            <span><?php _e('Need support ? Then do not waste your time. Just', 'export-wp-page-to-static-html'); ?> </span> <a href="https://myrecorp.com/support"><?php _e('click here', 'export-wp-page-to-static-html'); ?></a>
                        </div>

                        <?php
                        if (!isset($_GET['welcome'])&&!(PHP_VERSION_ID >= 70205)) {
                            echo $versionIssue;
                        }
                        ?>


                        <div class="right_side_notice mt-4">
                            <?php echo do_action('wpptsh_right_side_notice'); ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- This templates was made by Colorlib (https://colorlib.com) -->

<div class="ftp_path_select">
    <div class="loading_section">
        <span class="spinner_x"></span>
    </div>
    <h2><?php _e('Select a directory to upload files', 'export-wp-page-to-static-html'); ?></h2>

    <div class="ftp_dir_lists">

    </div>

    <button class="ftp_select_path"><?php _e('Select', 'export-wp-page-to-static-html'); ?></button>


</div>

<div class="ftp_dark_blur">
    <div class="close ftp_path_selection"></div>
</div>
<div id="cancel_ftp_process" type="hidden" value="false"></div>
<input id="is_paused" type="hidden" value="false">

<script>

    var $ = jQuery;

    <?php

    if (!empty($query->posts)) {
    foreach ($query->posts as $key => $post) {
    $post_id = $post->ID;
    $post_title = $post->post_title;
    ?>

    <?php
    }
    }
    ?>

    function rc_select2_is_not_ajax(){

        var selectSimple = $('.js-select-simple');

        selectSimple.each(function () {
            var that = $(this);
            var selectBox = that.find('select');
            var selectDropdown = that.find('.select-dropdown');
            selectBox.select2({
                placeholder: "Choose a page",
                dropdownParent: selectDropdown,
                matcher: function(params, option) {
                    // If there are no search terms, return all of the option
                    var searchTerm = $.trim(params.term);
                    if (searchTerm === '') { return option; }

                    // Do not display the item if there is no 'text' property
                    if (typeof option.text === 'undefined') { return null; }

                    var searchTermLower = searchTerm.toLowerCase(); // `params.term` is the user's search term

                    // `option.id` should be checked against
                    // `option.text` should be checked against
                    var searchFunction = function(thisOption, searchTerm) {
                        return thisOption.text.toLowerCase().indexOf(searchTerm) > -1 ||
                            (thisOption.id && thisOption.id.toLowerCase().indexOf(searchTerm) > -1);
                    };

                    if (!option.children) {
                        //we only need to check this option
                        return searchFunction(option, searchTermLower) ? option : null;
                    }

                    //need to search all the children
                    option.children = option
                        .children
                        .filter(function (childOption) {
                            return searchFunction(childOption, searchTermLower);
                        });
                    return option;
                },
                templateResult: function (idioma) {
                    var permalink = $(idioma.element).attr('permalink');
                    var $span = $("<span permalink='"+permalink+"'>" + idioma.text + "</span>");
                    return $span;
                }
            });
        });

    }

    $(document).ready(function(){
        rc_select2_is_not_ajax();
    });
</script>

<?php if($this->getSettings('timestampError', false)||$this->getSettings('cancel_command', false)||$this->getSettings('task')=='completed'){
    $this->removeAllSettings();
}
else if($this->getSettings('task')=='running'):  ?>
    <script>
        $(document).ready(function(){
            <?php if($this->getSettings('creating_html_process')=='running'||$this->getSettings('creating_html_process')=='completed'): ?>
            $('.htmlExportLogs').show();
            <?php endif; ?>
            <?php if($this->getSettings('creating_zip_process')=='running'||$this->getSettings('creating_zip_process')=='completed'): ?>
            $('.creatingZipFileLogs').show();
            <?php endif; ?>
            <?php if($this->getSettings('ftp_status')=='running'||$this->getSettings('ftp_status')=='completed'): ?>
            $('.uploadingFilesToFtpLogs').show();
            <?php endif; ?>
            $('.see_logs_in_details').show();
            get_export_log_percentage(1000);
        });
    </script>
<?php endif; ?>


<?php if($this->getSettings('task')=='completed' && !empty($this->getSettings('zipDownloadLink')) && $this->getSettings('zipDownloadLink')): ?>
    <?php
    $createdLastHtmlFile = "";
    if($this->getSettings('creating_html_process')=="completed"){
        global $wpdb;
        $tempUrl = wp_upload_dir()['baseurl'].'/exported_html_files/tmp_files';
        $created_html_file = $wpdb->get_results("SELECT comment FROM {$wpdb->prefix}export_page_to_html_logs WHERE type='created_html_file' ORDER BY ID ASC LIMIT 1");
        $createdLastHtmlFile = isset($created_html_file[0]) ? $created_html_file[0]->comment : '';
        if(!empty($createdLastHtmlFile)){
            $createdLastHtmlFile = $tempUrl .'/'. $createdLastHtmlFile;
        }
    }
    ?>


    <script>$(document).ready(function(){$('.download-btn').attr('href', '<?php echo $this->getSettings('zipDownloadLink'); ?>').text('Download The Last Exported File').removeClass('hide'); $('.view_exported_file').attr('href', '<?php echo $createdLastHtmlFile; ?>').removeClass('hide').text('View Last Exported File');});</script>
<?php endif; ?>



