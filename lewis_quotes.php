<?php
/*
Plugin Name: C S Lewis Quotes
Plugin URI: http://wordpress.org/#
Description: Not a plugin, but a quote from C S Lewis in the upper right of your admin screen on every page.
Author: Ørjan Hoyd Vøllestad (Hello Dolly: Matt Mullenweg)
Version: 1.0
Author URI: http://42users.com
*/

// These are some quotes of C S Lewis
$quotes = "Failures are finger posts on the road to achievement.
How incessant and great are the ills with which a prolonged old age is replete.
I gave in, and admitted that God was God. 
I sometimes wander whether all pleasures are not substitutes for joy. 
It's so much easier to pray for a bore than to go and see one. 
Let's pray that the human race never escapes from Earth to spread its iniquity elsewhere. 
Miracles do not, in fact, break the laws of nature. 
No one ever told me that grief felt so like fear. 
Nothing that you have not given away will ever be really yours. 
Reason is the natural order of truth; but imagination is the organ of meaning. 
The real problem is not why some pious, humble, believing people suffer, but why some do not. 
We are what we believe we are. 
What saves a man is to take a step. Then another step. 
With the possible exception of the equator, everything begins somewhere. 
You are never too old to set another goal or to dream a new dream. 
You can't get a cup of tea big enough or a book long enough to suit me. 
You don't have a soul. You are a Soul. You have a body.";

// Here we split it into lines
$quotes = explode("\n", $quotes);
// And then randomly choose a line
$chosen = wptexturize( $quotes[ mt_rand(0, count($quotes) - 1) ] );

// This just echoes the chosen line, we'll position it later
function lewis_quotes() {
	global $chosen;
	echo "<p id='lewis'>$chosen</p>";
}

// Now we set that function up to execute when the admin_footer action is called
add_action('admin_footer', 'lewis_quotes');

// We need some CSS to position the paragraph
function lewis_css() {
	echo "
	<style type='text/css'>
	#lewis {
		position: absolute;
		top: 2.3em;
		margin: 0;
		padding: 0;
		right: 10px;
		font-size: 16px;
		color: #d54e21;
	}
	</style>
	";
}

add_action('admin_head', 'lewis_css');

?>