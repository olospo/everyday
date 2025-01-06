<?php 

/**
* Core Theme Functions 
*/

// Theme Setup: Configures theme support, menus, widgets, etc.
require_once 'functions/theme-setup.php'; 

// Enqueue Styles and Scripts: Handles the inclusion of CSS and JavaScript files.
require_once 'functions/enqueue-scripts.php'; 

// Pagination: Custom pagination functionality for post lists.
require_once 'functions/pagination.php';

// Breadcrumbs: Adds breadcrumb navigation to help users navigate the site.
require_once 'functions/breadcrumbs.php';

// Custom Post Types
require_once 'functions/custom-post.php';

// Upload SVG: Allow SVG uploads to WordPress
require_once 'functions/upload-svg.php';

// Auto Update: Disable automatic update email notifications
require_once 'functions/auto-update.php';

/**
* Optional Theme Functions
*/

// Custom Login: Custom styling for the login page.
require_once 'functions/custom-login.php'; 

// Custom Colour Scheme: Custom admin styling
require_once 'functions/custom-admin.php';

// Dashboard Widget: Custom to widget to explain who to contact for support.
require_once 'functions/dashboard.php';

// Custom Navigation: Manages customisations to navigation menus.
require_once 'functions/custom-nav.php';    
 
// Number to Word Conversion: Converts numeric values to their word equivalents.
require_once 'functions/number-to-word.php'; 

// Limit Post Revisions: avoid bloating the database with limiting post revisions.
require_once 'functions/limit-revisions.php';