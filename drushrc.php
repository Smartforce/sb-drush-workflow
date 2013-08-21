<?php
/**
 * @file drushrc.php
 * See http://drush.ws/examples/example.drushrc.php for more info
 */

/**
 * Useful shell aliases:
 *
 * Drush shell aliases act similar to git aliases.  For best results, define
 * aliases in one of the drushrc file locations between #3 through #6 above.
 * More information on shell aliases can be found via:
 * `drush topic docs-shell-aliases` on the command line.
 *
 * @see https://git.wiki.kernel.org/articles/a/l/i/Aliases.html#Advanced.
 */
#$options['shell-aliases']['pull'] = '!git pull'; // We've all done it.
#$options['shell-aliases']['pulldb'] = '!git pull && drush updatedb';
$options['shell-aliases']['hist'] = '!git log --pretty=format:"%h %ad | %s%d [%an]" --graph --date=short';
$options['shell-aliases']['nc'] = 'pm-list --no-core';
$options['shell-aliases']['nc-on'] = '!drush pml --no-core --type=module --status=enabled --pipe';
$options['shell-aliases']['nc-dis'] = '!drush -y dis $(drush pml --status=enabled --type=module --no-core --pipe)';
$options['shell-aliases']['wipe'] = 'cache-clear all';
$options['shell-aliases']['offline'] = 'variable-set -y --always-set maintenance_mode 1';
$options['shell-aliases']['online'] = 'variable-delete -y --exact maintenance_mode';
$options['shell-aliases']['get-db'] = 'sql-dump --structure-tables-key=common+springboard';

/**
 * Structure tables array for clearing database tables when exporting
 */
$options['structure-tables']['common'] = array(
  // Cache tables
  'cache',
  'cache_block',
  'cache_content',
  'cache_filter',
  'cache_form',
  'cache_locaton',
  'cache_menu',
  'cache_mollom',
  'cache_page',
  'cache_rules',
  'cache_update',
  'cache_views',
  'cache_views_data',
  'ctools_css_cache',
  'ctools_object_cache',

  // Other core tables
  'history',
  'sessions',
  'watchdog',

  // Devel query log
  'devel_queries',
  'devel_times',

   // Search tables
  'search_dataset',
  'search_index',
  'search_node_links',
  'search_total',
);

$options['structure-tables']['springboard'] = array(
  // Springboard
  'salesforce_management_object_map',
  'fundraiser_recurring',
  'fundraiser_webform_order',
  'sf_batch_item',
  'sf_batch_error',
  'sf_batch',
  'sf_donation_log',
  'sf_donation_opportunity_contact_role',
  'sf_permanent_failure',
  'sf_retry_queue',
  'sf_heap',
  'sf_queue',

  // Ubercart
  'uc_orders',
  'uc_order_comments',
  'uc_order_admin_comments',
  'uc_order_products',
  'uc_order_line_items',
  'uc_payment_receipts',

  // Webform
  'webform_submissions',
  'webform_submitted_data',
);

$options['structure-tables']['common+springboard'] = array_merge(
  $options['structure-tables']['common'],
  $options['structure-tables']['springboard']
);