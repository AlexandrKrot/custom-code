<?php


$message = (get_option('no_login_message')) ? get_option('no_login_message') : '';
?>
    <div class="wrap">
        <h2>Script head/footer</h2>
        <p style="background: #3A75C4;
                        background: -webkit-linear-gradient(to bottom, #3A75C4 54%, #F9DD16 50%, #F9DD16 100%);
                        background: -moz-linear-gradient(to bottom, #3A75C4 54%, #F9DD16 50%, #F9DD16 100%);
                        background: linear-gradient(to bottom, #3A75C4 60%, #F9DD16 50%, #F9DD16 100%);
                        -webkit-background-clip: text;
                        -webkit-text-fill-color: transparent;
                        font-size: 1.8em;
                        font-weight: 900;
                        display: initial;
                        margin: 0 auto;
                        width: 100%;">
            Made in Ukraine
        </p>

        <form method="post" action="options.php">
            <?php wp_nonce_field('update-options'); ?>

            <table class="form-table">
                <tr>
                    <th scope="row">Add Header Code<br />

                    </th>
                    <td><textarea name="pc_header" id="customheader" cols="50" rows="10"><?php echo htmlspecialchars_decode($header); ?></textarea>
                     </td>
                </tr>
                <tr>
                    <td>Add Footer Code</td>
                    <td><textarea name="pc_footer" id="customfooter" cols="50" rows="10"><?php echo htmlspecialchars_decode($footer); ?></textarea>

                </tr>

            </table>

            <input type="hidden" name="action" value="update" />
            <input type="hidden" name="page_options" value="pc_header,pc_footer" />
            <p class="submit">
                <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
            </p>

        </form>
    </div>
<?php
global $pagenow;

if ( ( 'options-general.php' === $pagenow ) && ( 'pechenki-custom-code' === $_GET['page'] ) ) {

    $custom_css = wp_enqueue_code_editor( array( 'type' => 'text/html' ) );
    $header_js  = wp_enqueue_code_editor( array( 'type' => 'application/javascript' ) );
    $footer_js  = wp_enqueue_code_editor( array( 'type' => 'application/javascript' ) );

    wp_add_inline_script(
        'code-editor',
        sprintf(
            'jQuery( function() {
//                    wp.codeEditor.initialize( jQuery( "#customheader" ), %1$s );
//                    wp.codeEditor.initialize( jQuery( "#customheader" ), %2$s );
                    wp.codeEditor.initialize( jQuery( "#customheader" ), %3$s );
                });',
            wp_json_encode( $custom_css ),
            wp_json_encode( $header_js ),
            wp_json_encode( $footer_js )
        )
    );

    wp_add_inline_script(
        'code-editor',
        sprintf(
            'jQuery( function() {
//                    wp.codeEditor.initialize( jQuery( "#customfooter" ), %1$s );
//                    wp.codeEditor.initialize( jQuery( "#customfooter" ), %2$s );
                    wp.codeEditor.initialize( jQuery( "#customfooter" ), %3$s );
                });',
            wp_json_encode( $custom_css ),
            wp_json_encode( $header_js ),
            wp_json_encode( $footer_js )
        )
    );
}