<?php
/**
 * This file is part of OpenClinic
 *
 * Copyright (c) 2002-2004 jact
 * Licensed under the GNU GPL. For full terms see the file LICENSE.
 *
 * $Id: home.php,v 1.1 2004/04/04 22:09:22 jact Exp $
 */

/**
 * home.php
 ********************************************************************
 * Navbar to the Home tab
 ********************************************************************
 * Author: jact <jachavar@terra.es>
 * Last modified: 05/04/2004 0:09
 */

  if (str_replace("\\", "/", __FILE__) == $_SERVER['SCRIPT_FILENAME'])
  {
    header("Location: ../index.php");
    exit();
  }

  if (defined("OPEN_DEMO") && !OPEN_DEMO)
  {
    @$sessLogin = $_SESSION["loginSession"];
    echo '<div class="sideBarLogin">';
    if ( !isset($sessLogin) || (isset($sessLogin) && $sessLogin == "") )
    {
      echo '<a href="../shared/login_form.php?ret=../home/index.php">';
      echo '<img src="../images/login.png" width="96" height="22" alt="login" title="login" />';
      echo '</a>';
    }
    else
    {
      echo '<a href="../shared/logout.php"><img src="../images/logout.png" width="96" height="22" alt="logout" title="logout" /></a>';
      echo '<br />';
      echo '[ <a href="../admin/user_edit_form.php?key=' . $_SESSION["userId"] . '&amp;reset=Y&amp;all=Y" title="' . _("manage your user account") . '">' . $sessLogin . '</a> ]';
    }
    echo "</div>\n";
  }

  echo '<div class="linkList">';

  echo ($nav == "home")
    ? '<span class="selected">' . _("Summary") . '</span>'
    : '<a href="../home/index.php">' . _("Summary") . '</a>';
  echo "<span class='noPrint'> | </span>\n";

  echo '';
  echo ($nav == "license")
    ? '<span class="selected">' . _("License") . '</span>'
    : '<a href="../home/license.php">' . _("License") . '</a>';
  echo "<span class='noPrint'> | </span>\n";
?>

  <a href="../doc/index.php?tab=<?php echo $tab; ?>&amp;nav=<?php echo $nav; ?>" title="<?php echo _("Opens a new window"); ?>" onclick="return popSecondary('../doc/index.php?tab=<?php echo $tab; ?>&amp;nav=<?php echo $nav; ?>')" onkeypress="return popSecondary('../doc/index.php?tab=<?php echo $tab; ?>&amp;nav=<?php echo $nav; ?>')"><?php echo _("Help"); ?></a>
</div><!-- End .linkList -->