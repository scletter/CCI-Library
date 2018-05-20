<?php
/**
 * Template Name: members
 *  Displays the Member's page that allows access to organizational and clown resources when member is logged in.
 *
 * @package WordPress
 * @subpackage farceur
 * @since farceur 1.0.0
 */
?>

<?php get_header(); ?><a href="<?php echo esc_url( home_url( '/peru/') ); ?>"><img src="<?php $key="PageTitleImage"; echo get_post_meta($post->ID, $key, true); ?>" class="pagetitle" /></a>


<?php
// Get the last president's message and save in $presmsg to print later.
if (have_posts() ) : while (have_posts() ) : the_post();
	$presmsg = get_the_content('&raquo;&raquo; Read More');
endwhile; else:
     $presmsg = 'Error: No message';
endif; 	
?>

<div id="memberwrap">
	<div id="memberpage">
		<?php if ( is_user_logged_in() ) { ?>
			<h3>President's Message</h3>
				<div class="president-message">
					<p><?php echo ($presmsg); ?></p>
				</div>
				<br/>
				<!-- Print date of Presidents Message -->
				<div class="postinfo" style="margin-left: 25px;">
						<span class="posthighlight"><img src="/Images/heartbullet.png" class="postheart"/> POSTED </span><?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?> <br />
				</div>

			<h3>Member Resources</h3>
				<ul>
					<li><a href="#!" class="pdfopener" data-record-id="1">Vision Statement <img src="/Images/pdf-icon.png" alt="pdf-icon" /></a><?php farceur_pdf_popup("Vision-Statement.pdf","id1"); ?></li>
					<li><a href="#!" class="pdfopener" data-record-id="2">Members List <img src="/Images/pdf-icon.png" alt="pdf-icon" /></a><?php farceur_pdf_popup("ccimembers.pdf","id2"); ?></li>
					<li><a href="#!" class="pdfopener" data-record-id="3">Expectations and Responsibilites of Members <img src="/Images/pdf-icon.png" alt="pdf-icon" /></a><?php farceur_pdf_popup("Member-Expectations-Commitments-25Sept16.pdf","id3"); ?></li>
				</ul>
			<h3>Clown Resources</h3>		
				<ul>
					<li>Clown Orientation and Training Videos</li>
						<ul>
							<li>Introduction</li>
							<ul>
								<li><a href="#!" class="pdfopener" data-record-id="10">A Unique Organization <img src="/Images/pdf-icon.png" alt="pdf-icon" /></a><?php farceur_pdf_popup("CCI-A-Brief-Description.pdf","id10"); ?></li>
								<li><a href="#!" class="pdfopener" data-record-id="11">Pause for Thought <img src="/Images/pdf-icon.png" alt="pdf-icon" /></a><?php farceur_pdf_popup("CCI-A-Clowns-Pause-for-Thought.pdf","id11"); ?></li>
								<li><a href="#!" class="pdfopener" data-record-id="12">Member Value Statement <img src="/Images/pdf-icon.png" alt="pdf-icon" /></a><?php farceur_pdf_popup("CCI-Member-Value-Statement.pdf","id12"); ?></li>
								
							</ul>
							<li><a href="#!" class="pdfopener" data-record-id="20">Your Clown Persona <img src="/Images/pdf-icon.png" alt="pdf-icon" /></a><?php farceur_pdf_popup("CCI-Your-Clown-Pesona.pdf","id20"); ?></li>
							<li><a href="#!" class="pdfopener" data-record-id="21">Some Clowns of Caring Clowns International - Examples of Clown Faces <img src="/Images/pdf-icon.png" alt="pdf-icon" /></a><?php farceur_pdf_popup("CCI-Clown-Faces-1.pdf","id21"); ?></li>
							<li><a href="#!" class="pdfopener" data-record-id="22">Facial Imagination <img src="/Images/pdf-icon.png" alt="pdf-icon" /></a><?php farceur_pdf_popup("CCI-Clown-Faces-2.pdf","id22"); ?></li>
							<li><a href="#!" class="pdfopener" data-record-id="23">Clown Types <img src="/Images/pdf-icon.png" alt="pdf-icon" /></a><?php farceur_pdf_popup("CCI-Clown-Types.pdf","id23"); ?></li>
							<li><a href="#!" class="pdfopener" data-record-id="24">Basic Steps to Applying / Removing Grease Paint <img src="/Images/pdf-icon.png" alt="pdf-icon" /></a><?php farceur_pdf_popup("CCI-Grease-Paint.pdf","id24"); ?></li>
							<li><a href="#!" class="pdfopener" data-record-id="25">Clown Demeanor <img src="/Images/pdf-icon.png" alt="pdf-icon" /></a><?php farceur_pdf_popup("CCI-Clown-Demeanor.pdf","id25"); ?></li>
							<li><a href="#!" class="pdfopener" data-record-id="26">Working with Children <img src="/Images/pdf-icon.png" alt="pdf-icon" /></a><?php farceur_pdf_popup("CCI-Clowning-With-Children.pdf","id26"); ?></li>
							<li><a href="#!" class="pdfopener" data-record-id="27">Working with Other Clowns <img src="/Images/pdf-icon.png" alt="pdf-icon" /></a><?php farceur_pdf_popup("CCI-Working-With-Other-Clowns.pdf","id27"); ?></li>
							<li>Elements of Clowning</li>
							<ul>
								<li><a href="#!" class="pdfopener" data-record-id="30">Comic Movement <img src="/Images/pdf-icon.png" alt="pdf-icon" /></a><?php farceur_pdf_popup("CCI-Comic-Movement.pdf","id30"); ?></li>
								<li><a href="#!" class="pdfopener" data-record-id="31">The Gag <img src="/Images/pdf-icon.png" alt="pdf-icon" /></a><?php farceur_pdf_popup("CCI-The-Gag.pdf","id31"); ?></li>
								<li><a href="#!" class="pdfopener" data-record-id="32">Ballon Twisting <img src="/Images/pdf-icon.png" alt="pdf-icon" /></a><?php farceur_pdf_popup("CCI-Balloon-Twisting.pdf","id32"); ?></li>
								<li><a href="#!" class="pdfopener" data-record-id="33">Props <img src="/Images/pdf-icon.png" alt="pdf-icon" /></a><?php farceur_pdf_popup("CCI-Props.pdf","id33"); ?></li>
							</ul>
						</ul>
						<li>Organizations and Other</li>
							<ul>
								<li><a href="http://www.worldclown.com">World Clown Association</a></li>
								<li><a href="http://www.coai.org">Clowns of America International</a> - One of the several large clown organizations</li>
								<li><a href="http://www.clownkevin.com">Clown Kevin</a> - Basic instructions, skits, tricks and more</li>
							</ul>	
					<li>Resources and Helpful Websites</li>
					<p>Here are some web sites and other resources for you to browse. In addition to gags and
supplies, etc, there are some good clown faces to see for make-up ideas in some of them.  Click on Organization Link</p>

						<table class="clownresources">
							 <colgroup>
								<col style="width:35%">
								<col style="width:65%">
							</colgroup> 
							<th colspan="2">General - Multi Supplies</th>
								<tr>
									<td><a href="http://www.allaboutclowns.com">All About Clowns</a></td>
									<td>Books, make-up, music, skits, balloons</td>
								</tr>
								<tr>
									<td><a href="http://www.Art4clowns.com">Art 4 Clowns</a></td>
									<td>Angel Contreras illustrator, cool stickers</td>
								</tr>
								<tr>
									<td><a href="http://www.bubbasclownsupplies.com">Bubba's Clown Supplies</a></td>
									<td>Make-up, balloon, stickers, puppets, music and more</td>
								</tr>
								<tr>
									<td><a href="http://www.clownantics.com">Clownantics</a></td>
									<td>Make-up, noses, magic, face paint, props</td>
								</tr>
								<tr>
									<td><a href="http://www.clowncostumes.com">Clown Costumes</a></td>
									<td>Costumes</td>
								</tr>
								<tr>
									<td><a href="http://www.clownshop.com">Clownshop</a></td>
									<td>Balloons, books, noses, costume accessories, face paint, hats, props, puppets, wigs</td>
								</tr>
								<tr>
									<td><a href="http://www.clownsupplies.com">ClownSupplies.com</a></td>
									<td>Balloons, face painting, hats, gloves, fabric</td>
								</tr>
								<tr>
									<td><a href="http://www.displaycostume.com">Display & Costume</a></td>
									<td>Part supplies, rentals, 3 Washington State locations</td>
								</tr>
								<tr>
									<td><a href="http://www.dreamlandmagic.com">Dreamland Magic</a></td>
									<td>Magic trips and Roco's Dlite thumb tips</td>
								</tr>
								<tr>
									<td><a href="http://www.graftobian.com">Graftobian</a></td>
									<td>Clown make-up and theatrical make up. Site includes great clown pix insection on clown make-up</td>
								</tr>
								<tr>
									<td><a href="http://www.internationalwigs.com">International Wigs</a></td>
									<td>Look under costume wigs for large selection</td>
								</tr>
								<tr>
									<td><a href="http://www.justforclowns.com">Just For Clowns</a></td>
									<td>Balloons, make-up, juggling, magic</td>
								</tr>
								<tr>
									<td><a href="http://www.magiclegends.com">Magiclegends</a></td>
									<td>Books, magic trick videos</td>
								</tr>						
								<tr>
									<td><a href="http://www.mooseburgeronline.com">Pricilla Mooseburger Originals</a></td>
									<td>Clown supplies, costumes and info on workshops</td>
								</tr>
								<tr>
									<td><a href="http://www.orientaltrading.com">Oriental Trading</a></td>
									<td>Cheap give aways, party supplies</td>
								</tr>
								<tr>
									<td><a href="http://www.peacheykeene.com">Peachey Keene</a></td>
									<td>Props</td>
								</tr>							
								<tr>
									<td><a href="http://www.penguinmagic.com">Penguinmagic.com</a></td>
									<td>Magic trick videos</td>
								</tr>	
								<tr>
									<td><a href="http://www.rednosedesign.net">Red Nose Design</a></td>
									<td>Custom logos, business cards</td>
								</tr>	
								<tr>
									<td><a href="http://www.sillyfarm.com">SillyFarm Supplies</a></td>
									<td>ProKnows professional clown noses, face painting supplies</td>
								</tr>
								<tr>
									<td><a href="http://www.sunshineandcompany.com">Sunshine & Co.</a></td>
									<td>Clown costumes</td>
								</tr>						
								<tr>
									<td><a href="http://www.theclownnetwork.com">The Clown Network</a></td>
									<td>Clown supplies, magic, face painting, puppets, juggling; dated info from 2013</td>
								</tr>		
								<tr>
									<td><a href="http://www.tmyers.com">T. Myers Magic</a></td>
									<td>Balloons, face painting, magic, juggling</td>
								</tr>										
						</table>
						<table class="clownresources">
							 <colgroup>
								<col style="width:35%">
								<col style="width:65%">
							</colgroup> 
							<th colspan="2">Clown Shoes</th>
								<tr>
									<td><a href="http://www.spearshoes.com">Spear Specialty Shoes</a></td>
									<td>High quality, custom made clown shoes- expensive- some of the best in
the business</td>
								</tr>
						</table>
						<table class="clownresources">
							 <colgroup>
								<col style="width:35%">
								<col style="width:65%">
							</colgroup>
							<th colspan="2">Ballons and Pumps</th>
								<tr>
									<td><a href="http://www.btydirect.com">Ballons To You</a></td>
									<td>View supplies on the site, then call 1-800-636-4887 to order</td>
								</tr>
								<tr>
									<td><a href="http://www.larocksmagic.com">La Rock's Fun & Magic</a></td>
									<td></td>
								</tr>
						</table>
				
				</ul>		
		<?php
		}			
		else {
		?>	
			<h3>Members' Page</h3>
			<p>
				To access this page, you must be logged in.
			</p>
			<p>
				Membership benefits include exclusive communication from the volunteers and the board as well as bringing joy and laughter to children and their families and helping those in need.
			</p>
			<p>
				If you are not a member and are interested in becoming one or would like to know more about our organization, please <a href="<?php echo esc_url( home_url( '/contact/') ); ?>">contact </a>us. We would love to hear from you.
			</p>
			<div class="center">
				<?php
				$url = home_url( '/contact/');
				$anchor = "Contact Us";
				$button = '<a href="'.$url.'" class="ContactUs-button">'.$anchor.'</a>';
				echo $button;
				?>
			</div>
		<?php
		};
		?>

	</div>

<?php get_template_part('loginsidebar'); ?>

</div>
<?php get_footer(); ?>

