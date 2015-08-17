/*jshint bitwise:true, curly:true, forin:false, noarg:true, noempty:true, nonew:true, undef:true, strict:false, browser:true, jquery:true */

function activate_mass_remover ( image_link ) {
    $(".shm-thumb").each(
        function ( index, block ) {
            add_mass_remove_button( $(block), image_link );
        }
    );
    $('#mass_remover_controls').show();
    $('#mass_remover_activate').hide();
}

function add_mass_remove_button($block, image_link) {
	
    var c = function() { toggle_remove(this, $block.data("post-id")); return false; };

    $block.find("A").click(c);
    $block.click(c); // sometimes the thumbs *is* the A
}

function toggle_remove( button, id ) {
    id += ":";
    var list = $('#mass_remover_ids');
    var string = list.val();
    
    if( (string.indexOf(id) == 0) || (string.indexOf(":"+id) > -1) ) {
		$(button).css('border', 'none');
		string = string.replace(id, '');
		list.val(string);
	}
	else {
		$(button).css('border', '3px solid blue');
		string += id;
		list.val(string);
	}
}
