<?php

if ( !function_exists( 'ewptshp_fs' ) ) {
    // Create a helper function for easy SDK access.
    function ewptshp_fs()
    {
        global  $ewptshp_fs ;
        
        if ( !isset( $ewptshp_fs ) ) {
            // Include Freemius SDK.
            require_once dirname( __FILE__ ) . '/freemius/start.php';
            $ewptshp_fs = fs_dynamic_init( array(
                'id'               => '8170',
                'slug'             => 'export-wp-page-to-static-html-pro',
                'type'             => 'plugin',
                'public_key'       => 'pk_6dc0a25d3672a637db3b8c45379ab',
                'is_premium'       => true,
                'is_org_compliant' => false,
                'is_premium_only'  => false,
                'has_addons'       => false,
                'has_paid_plans'   => true,
                'menu'             => array(
                'slug'       => 'export-wp-page-to-html',
                'support'    => false,
                'first-path' => 'admin.php?page=export-wp-page-to-html&welcome=true',
            ),
                'is_live'          => true,
            ) );
        }
        
        return $ewptshp_fs;
    }
    
    // Init Freemius.
    ewptshp_fs();
    // Signal that SDK was initiated.
    do_action( 'ewptshp_fs_loaded' );
}
