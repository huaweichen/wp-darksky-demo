<?php
if(!class_exists('WP_List_Table')){
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

class DarkSkyAboutUs extends WP_List_Table {
    function display() {
        ?>
        <fieldset class="options">
            <table class="widefat" cellspacing="0">
                <thead>
                    <tr>
                        <th>
                            <h2>
                                <img src="<?php echo plugins_url('./darksky/images/logo.svg'); ?>"
                                     style="float:left;
                                            height:18px;
                                            vertical-align:middle;" />
                                <?php _e('&nbsp;About Us'); ?>
                            </h2>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="alternate">
                        <td colspan="3"><h1>What is Dark Sky?</h1></td>
                    </tr>
                    <tr class="alternate">
                        <td colspan="3"><h3>The easiest, most advanced, weather API on the web.</h3></td>
                    </tr>
                    <tr class="alternate">
                        <td>
                            <h4>Easy to Use:</h4>
                            <ul>
                                <li>Get setup in minutes</li>
                                <li>Developer friendly</li>
                                <li>Clear and concise documentation</li>
                                <li>Pay-as-you-go pricing</li>
                            </ul>
                        </td>
                        <td>
                            <h4>Weather Conditions:</h4>
                            <ul>
                                <li>Forecasts and current conditions</li>
                                <li>Global coverage</li>
                                <li>Historical data</li>
                                <li>Severe weather alerts</li>
                            </ul>
                        </td>
                        <td>
                            <h4>Advanced Data:</h4>
                            <ul>
                                <li>Cutting-edge forecast modeling techniques</li>
                                <li>Minute-by-minute hyperlocal forecasts</li>
                                <li>Backed by a wide range of data sources</li>
                            </ul>
                        </td>
                    </tr>
                </tbody>
            </table>
        </fieldset>
        <?php
    }
}
