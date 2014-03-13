<?php namespace Lukaswhite\Legalpages;

use dflydev\markdown\MarkdownExtraParser;

class LegalpagesController extends \Illuminate\Routing\Controller {

	/**
	 * Get the terms page.
	 *
	 * @return string
	 */
	public function terms()
	{
		return $this->page('terms', \Config::get('legalpages::pages.terms.title'));
	}

	/**
	 * Get the privacy page.
	 *
	 * @return string
	 */
	public function privacy()
	{
		return $this->page('privacy', \Config::get('legalpages::pages.privacy.title'));
	}

	/**
	 * Get the cookies page.
	 *
	 * @return string
	 */
	public function cookies()
	{
		return $this->page('cookies', \Config::get('legalpages::pages.cookies.title'));
	}

	/**
	 * Returns a particular page.
	 *
	 * @param string $page
	 * @param string $title
	 * @return string
	 */
	private function page($page, $title)
	{				
		$files = new \Illuminate\Filesystem\Filesystem();

		if (!$files->exists(storage_path() . '/legalpages/content/' . $page . '.md')) {			
			if (!$files->exists(storage_path() . '/legalpages/content')) {				
				$files->makeDirectory(storage_path() . '/legalpages/content', 0777, true, true);
			}			
			$files->copy(__DIR__ . '/../../../content/' . $page . '.md', storage_path() . '/legalpages/content/' . $page . '.md');
		}

		// Set up the template engine
		\RainTPL::$tpl_dir = storage_path() . '/legalpages/content/';
		\RainTPL::$tpl_ext = 'md';
		\RainTPL::$cache_dir = storage_path() . '/legalpages/cache';

		// Inject the variables into the page, to produce Markdown
		$tpl = new \RainTPL();
		$tpl->assign(\Config::get('legalpages::info'));		
		//$tpl->assign($params);
		$markdown = $tpl->draw($page, true);

		// Now convert the markdown to HTML
		$markdownParser = new MarkdownExtraParser();
		$body = $markdownParser->transformMarkdown($markdown);

		// Inject the text into the page template, and return
		return \View::make('legalpages::page', compact('title', 'body'));

	}


}
