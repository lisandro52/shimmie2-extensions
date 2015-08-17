<?php

class MassRemoverTheme extends Themelet {
	/*
	 * Show $text on the $page
	 */
	public function display_mass_remover( Page $page, Event $event, $config ) {
		$data_href = get_base_href();  
		$body = "
			<form action='".make_link("mass_remover/ids")."' method='POST'>
				<input id='mass_remover_activate' type='button' onclick='activate_mass_remover(\"$data_href\");' value='Activate'/>
				<div id='mass_remover_controls' style='display: none;'>
					Click on images to mark them. Use the 'Index Options' in the Board Config to increase the amount of shown images.
					<br />
					<input type='hidden' name='ids' id='mass_remover_ids' />
					Check the box to confirm: <input type='checkbox' name='confirm' value='set' />
					<!--<label>Tags: <input type='text' name='tag' class='autocomplete_tags' autocomplete='off' /></label>-->

					<input type='submit' value='Remove marked images' />
				</div>
			</form>
		";
		$block = new Block("Mass Remover", $body, "left", 50);
		$page->add_block( $block );
	}
	
	/*
	 * Show a standard page for results to be put into
	 */
	public function display_remove_results(Page $page) {
		$page->set_title("Removing images");
		$page->set_heading("Removing images");
		$page->add_block(new NavBlock());
		foreach($this->messages as $block) {
			$page->add_block($block);
		}
	}
	
	public function add_status($title, $body) {
		$this->messages[] = new Block($title, $body);
	}
}

