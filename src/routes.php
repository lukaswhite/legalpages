<?php

if (Config::get('legalpages::pages.terms.active')) {
	Route::get(Config::get('legalpages::pages.terms.url'), 'Lukaswhite\Legalpages\LegalpagesController@terms');
}

if (Config::get('legalpages::pages.privacy.active')) {
	Route::get(Config::get('legalpages::pages.privacy.url'), 'Lukaswhite\Legalpages\LegalpagesController@privacy');
}

if (Config::get('legalpages::pages.cookies.active')) {
	Route::get(Config::get('legalpages::pages.cookies.url'), 'Lukaswhite\Legalpages\LegalpagesController@cookies');
}

