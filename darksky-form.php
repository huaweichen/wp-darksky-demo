<?php
if (!class_exists('WP_List_Table')) {
    require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
}

class DarkSkyForm extends WP_List_Table
{
    function display()
    {
        ?>
        <h1 class="wp-heading-inline">
            <?php
            echo 'Setup Location Form';
            ?>
        </h1>
        <fieldset>
            <legend>
                You can put go to <a href="https://www.latlong.net/">Get Latitude and Longitude</a>. e.g.: Brisbane, Latitude -27.469771, Longitude 153.025124.
            </legend>
            <table class="form-table">
                <tbody>
                <tr>
                    <th scope="row">
                        <label for="darksky-latitude">Latitude</label>
                    </th>
                    <td>
                        <input type="text" id="darksky-latitude" name="darksky-latitude" class="large-text code">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="darksky-longitude">Longitude</label>
                    </th>
                    <td>
                        <input type="text" id="darksky-longitude" name="darksky-longitude" class="large-text code">
                    </td>
                </tr>
                </tbody>
            </table>
            <p class="submit">
                <input type="submit" class="button-primary" name="darksky-save" value="Save">
            </p>
        </fieldset>
        <?php
    }
}
