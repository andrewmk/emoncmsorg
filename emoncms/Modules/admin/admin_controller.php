<?php
/*
    All Emoncms code is released under the GNU Affero General Public License.
    See COPYRIGHT.txt and LICENSE.txt.

    ---------------------------------------------------------------------
    Emoncms - open source energy visualisation
    Part of the OpenEnergyMonitor project:
    http://openenergymonitor.org
*/

// no direct access
defined('EMONCMS_EXEC') or die('Restricted access');

function admin_controller()
{
    global $mysqli,$session,$route,$redis,$feed_settings;

    $result = false;
    $sessionadmin = false;
    // Allow for special admin session if updatelogin property is set to true in settings.php
    // Its important to use this with care and set updatelogin to false or remove from settings
    // after the update is complete.
    if (isset($session['admin'])) {
        if ($session['admin']) $sessionadmin = true;
    }
        
    if ($sessionadmin)
    {
        if ($route->action == 'view') $result = view("Modules/admin/admin_main_view.php", array());

        if ($route->action == 'db')
        {
            $applychanges = get('apply');
            if (!$applychanges) $applychanges = false;
            else $applychanges = true;

            require_once "Lib/dbschemasetup.php";
            $updates = array();
            $updates[] = array(
                'title'=>"Database schema",
                'description'=>"",
                'operations'=>db_schema_setup($mysqli,load_db_schema(),$applychanges)
            );

            $result = view("Modules/admin/update_view.php", array('applychanges'=>$applychanges, 'updates'=>$updates));
        }

        if ($route->action == 'users' && $session['write'] && $session['admin'])
        {
            $result = view("Modules/admin/userlist_view.php", array());
        }
        
        if ($route->action == 'userlist' && $session['write'] && $session['admin'])
        {
            $data = array();
            $result = $mysqli->query("SELECT id,username,email FROM users");
            
            while ($row = $result->fetch_object()) {
                $userid = $row->id;
                $data[] = $row;
            }
            $result = $data;
        }

        if ($route->action == 'setuser' && $session['write'] && $session['admin'])
        {
            $_SESSION['userid'] = intval(get('id'));
            header("Location: ../user/view");
        }
        
        if ($route->action == 'setuserfeed' && $session['write'] && $session['admin'])
        {
            $feedid = (int) get("id");
            $result = $mysqli->query("SELECT userid FROM feeds WHERE id=$feedid");
            $row = $result->fetch_object();
            $userid = $row->userid;
            $_SESSION['userid'] = $userid;
            header("Location: ../user/view");
        }

    }

    return array('content'=>$result);
}
