<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_advertenties
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Include the advertenties functions only once
JLoader::register('ModAdvertentiesHelper', __DIR__ . '/helper.php');

$headerText = trim($params->get('header_text'));
$footerText = trim($params->get('footer_text'));

$title = $module->title;


JLoader::register('BannersHelper', JPATH_ADMINISTRATOR . '/components/com_banners/helpers/banners.php');
BannersHelper::updateReset();
$list = &ModAdvertentiesHelper::getList($params);
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'), ENT_COMPAT, 'UTF-8');

// Add CSS
$document = JFactory::getDocument();
$document->addStyleSheet(JUri::base().'modules/mod_advertenties/tmpl/style.css');

require JModuleHelper::getLayoutPath('mod_advertenties', $params->get('layout', 'default'));
