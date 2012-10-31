<?php

/**
	Theme functions for articles
*/
function article_id() {
	if($itm = Registry::get('article')) {
		return $itm->id;
	}

	return '';
}

function article_title() {
	if($itm = Registry::get('article')) {
		return $itm->title;
	}

	return '';
}

function article_slug() {
	if($itm = Registry::get('article')) {
		return $itm->slug;
	}

	return '';
}

function article_url() {
	if($itm = Registry::get('article')) {
		$page = Registry::get('posts_page');
		return base_url($page->slug . '/' . $itm->slug);
	}

	return '';
}

function article_description() {
	if($itm = Registry::get('article')) {
		return $itm->description;
	}

	return '';
}

function article_html() {
	if($itm = Registry::get('article')) {
		return Post::parse($itm->html);
	}

	return '';
}

function article_css() {
	if($itm = Registry::get('article')) {
		return $itm->css;
	}

	return '';
}

function article_js() {
	if($itm = Registry::get('article')) {
		return $itm->js;
	}

	return '';
}

function article_time() {
	if($itm = Registry::get('article')) {
		return strtotime($itm->created);
	}

	return '';
}

function article_date() {
	if($itm = Registry::get('article')) {
		return Date::format($itm->created);
	}

	return '';
}

function article_status() {
	if($itm = Registry::get('article')) {
		return $itm->status;
	}

	return '';
}

function article_category() {
	if($itm = Registry::get('article')) {
		$categories = Registry::get('all_categories');
		return $categories[$itm->category]->title;
	}

	return '';
}

function article_category_url() {
	if($itm = Registry::get('article')) {
		$categories = Registry::get('all_categories');
		return base_url('category/' . $categories[$itm->category]->slug);
	}

	return '';
}

function article_total_comments() {
	if($itm = Registry::get('article')) {
		return $itm->total_comments;
	}

	return 0;
}

function article_author() {
	if($itm = Registry::get('article')) {
		return $itm->author;
	}

	return '';
}

function article_author_bio() {
	if($itm = Registry::get('article')) {
		return $itm->bio;
	}

	return '';
}

function article_custom_field($key, $default = '') {
	$itm = Registry::get('article');

	if($extend = Extend::field('post', $key, $itm->id)) {
		switch($extend->field) {
			case 'text':
				return isset($extend->value->text) ? $extend->value->text : '';
			case 'html':
				return isset($extend->value->html) ? $extend->value->html : '';
			case 'image':
				return isset($extend->value->filename) ? Html::asset('content/' . $extend->value->filename) : '';
			case 'file':
				return isset($extend->value->filename) ? Html::asset('content/' . $extend->value->filename) : '';
		}
	}

	return '';
}

function customised() {
	if($itm = Registry::get('article')) {
		return $itm->js or $itm->css;
	}

	return false;
}
