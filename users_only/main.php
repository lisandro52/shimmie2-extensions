<?php
/*
 * Name: Users Only
 * Author: Drudex Software <support@drudexsoftware.com>
 * Link: http://www.drudexsoftware.com
 * License: GPLv2
 * Description: Allow only users to view the site.
 * Documentation: The extension will check for every page if the user is logged in and if
 * the page isn't the registration page, to allow visitors to be able to create a new user.
 */

class UsersOnly extends Extension {
	public function onPageRequest(PageRequestEvent $event) {
		global $config, $page, $user;
		
		if(!$user->is_logged_in() && 
				(!$event->page_matches("user_admin/create") || !$event->page_matches("user_admin/login"))) {
			$page->set_mode("redirect");
			$page->set_redirect(make_link("user_admin/login"));
		}
		
		/*if($event->page_matches("random")) {
			// set vars
			$page->title = "Random Images";
			$images_per_page = $config->get_int("random_images_list_count", 12);
			$random_images = array();
			$random_html = "<b>Refresh the page to view more images</b>
			<div class='shm-image-list'>";

			// generate random images
			for ($i = 0; $i < $images_per_page; $i++)
				array_push($random_images, Image::by_random());

			// create html to display images
			foreach ($random_images as $image)
				$random_html .= $this->theme->build_thumb_html($image);

			// display it
			$random_html .= "</div>";
			$page->add_block(new Block("Random Images", $random_html));
		}*/
		
		
		
	}
}


