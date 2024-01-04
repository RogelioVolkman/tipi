<?php

require_once "../lib/common.inc.php";
require_once "../lib/SimpieView.php";
require_once "../models/BookPage.php";

try
{
	$view = new SimpieView('../templates/search/index.php', "../templates/layout/common_page.php");
	$view->render(array(
		'current_page' => 'search',
		'title' => '搜索',
		'query' => isset($_GET['query']) ? $_GET['query'] : '',
	));
}
catch(PageNotFoundException $e)
{
	// TODO Suggest the page like the page name
	$view = new SimpieView("../templates/book_page_404.php", "../templates/layout/book.php");
	$view->render(array(
		'book_page' => $page_name,
		'title' => "Page Not Found",
		'is_detail_view' => true,
		'chapt_list' => $chapt_list,
	));
}
