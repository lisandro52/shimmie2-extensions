<?php
/*
 * Name: Mass Remover
 * Author: Christian Walde <walde.christian@googlemail.com>, contributions by Shish and Agasa
 * License: WTFPL
 * Description: Remove a bunch of images at once
 * Documentation:
 *  Once enabled, a new "Mass Remover" box will appear on the left hand side of
 *  post listings, with a button to enable the mass remover. Once clicked JS will
 *  add buttons to each image to mark them for tagging, and a field for
 *  inputting tags will appear. Once the "Tag" button is clicked, the tags in
 *  the text field will be added to marked images.
 */

class MassRemover extends Extension {
	public function onPostListBuilding(PostListBuildingEvent $event) {
		global $config, $page, $user;
		
		if( !$user->is_admin() ) return;
		
		$this->theme->display_mass_remover( $page, $event, $config );
	}

	public function onPageRequest(PageRequestEvent $event) {
		global $config, $page, $user;
		if( !$event->page_matches("mass_remover") ) return;
		if( !$user->is_admin() ) return;
		
		if($event->get_arg(0) == "ids") $this->_apply_mass_remove( $config, $page, $user, $event );
	}
	
	private function _apply_mass_remove( $config, Page $page, $user, $event ) {
		if(!isset($_POST['ids']) or !isset($_POST['confirm'])) return;
		
		$ids = explode( ':', $_POST['ids'] );
		$ids = array_filter ( $ids , 'is_numeric' );
		
		//Get the images
		$images = array_map( "Image::by_id", $ids );
		if($_POST['confirm'] == 'set') 
		{
			$this->theme->add_status("Removing images", print_r($images, true));
			foreach($images as $image) {
				send_event(new ImageDeletionEvent($image));
			}
		}
		
		/*$page->set_mode("redirect");
		$page->set_redirect(make_link("post/list"));*/
		$this->theme->display_remove_results($page);
	}
}

