<?php
/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/

/**
 * XOOPS User
 *
 * See the enclosed file license.txt for licensing information.
 * If you did not receive this file, get it at http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @copyright       (c) 2000-2016 XOOPS Project (www.xoops.org)
 * @license             GNU GPL 2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 * @package             core
 * @since               2.0.0
 * @author              Kazumi Ono <webmaster@myweb.ne.jp>
 */
//include __DIR__ . '/mainfile.php';
require_once("../mainfile.php");

xoops_loadLanguage('user');

XoopsLoad::load('XoopsFilterInput');
$op = 'main';
if (isset($_POST['op'])) {
    // from $_POST we use keys: op, ok
    $op       = trim(XoopsFilterInput::clean($_POST['op']));
    $clean_ok = false;
    if (isset($_POST['ok'])) {
        $clean_ok = XoopsFilterInput::clean($_POST['ok'], 'BOOLEAN');
    }
} elseif (isset($_GET['op'])) {
    // from $_GET we may use keys: op, xoops_redirect, id, actkey
    $op             = trim(XoopsFilterInput::clean($_GET['op']));
    $clean_redirect = '';
    if (isset($_GET['xoops_redirect'])) {
        $clean_redirect = XoopsFilterInput::clean($_GET['xoops_redirect'], 'WEBURL');
    }
}

if ($op === 'login') {
    include_once $GLOBALS['xoops']->path('/mobile/checklogin.php');
    exit();
}

if ($op === 'logout') {
    $message = '';
    // Regenerate a new session id and destroy old session
    $GLOBALS['sess_handler']->regenerate_id(true);
    $_SESSION = array();
    setcookie($GLOBALS['xoopsConfig']['usercookie'], null, time() - 3600, '/', XOOPS_COOKIE_DOMAIN, 0);
    setcookie($GLOBALS['xoopsConfig']['usercookie'], null, time() - 3600);
    // clear entry from online users table
    if (is_object($xoopsUser)) {
        /* @var XoopsOnlineHandler $online_handler */
        $online_handler = xoops_getHandler('online');
        $online_handler->destroy($xoopsUser->getVar('uid'));
    }
    $message = _US_LOGGEDOUT . '<br>' . _US_THANKYOUFORVISIT;
	 redirect_header(XOOPS_URL . '/mobile/index.php', 1, $message);
}

