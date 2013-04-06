<?php
// echo $userJson;
require_once "topBar.php";

$profilePic = "noprofile";
?>

<script type="text/javascript">
$(document).ready(function(){
	// grab our profile data from DB
	var query = <? echo BASEDIR; ?>+"User/?getProfile=true&output=json";
	$.getJSON(query, function(data) {
		// set our inputs full of data from the DB
		if(data['fldAboutMe']!= ""){
			$('.about_me').val(data['fldAboutMe']);
		}
		if(data['fldFirstname']!= ""){
			$("input[name='first_name']").val(data['fldFirstName']);
		}
		if(data['fldLastname']!= ""){
			$("input[name='last_name']").val(data['fldLastName']);
		}
		if(data['fldPersonalURL']!= ""){
			$("input[name='personal_url']").val(data['fldPersonalURL']);
		}
		if(data['fldProfileImage']!= ""){
			var basedir = <? echo "'".BASEDIR."'"; ?>;
			var imgStr = "<img src='"+basedir+"Views/images/profile_images/"+data['fldProfileImage']+"'>"
			$('.imageDialog').html(imgStr);
		}
		// social shit
		if(data['fldGitURL']!= ""){
			$("input[name='git']").val(data['fldGitURL']);
			$("input[name='git']").parent().parent().find('.socialUrl').slideDown().addClass('active');
			$("input[name='git']").parent().parent().find('.socialCheckbox').prop('checked', true);
		}
		if(data['fldTwitterURL']!= ""){
			$("input[name='twitter']").val(data['fldTwitterURL']);
			$("input[name='twitter']").parent().parent().find('.socialUrl').slideDown().addClass('active');
			$("input[name='twitter']").parent().parent().find('.socialCheckbox').prop('checked', true);
		}
		if(data['fldFacebookURL']!= ""){
			$("input[name='facebook']").val(data['fldFacebookURL']);
			$("input[name='facebook']").parent().parent().find('.socialUrl').slideDown().addClass('active');
			$("input[name='facebook']").parent().parent().find('.socialCheckbox').prop('checked', true);
		}
		if(data['fldLinkedinURL']!= ""){
			$("input[name='linkedin']").val(data['fldLinkedinURL']);
			$("input[name='linkedin']").parent().parent().find('.socialUrl').slideDown().addClass('active');
			$("input[name='linkedin']").parent().parent().find('.socialCheckbox').prop('checked', true);
		}
		if(data['fldGoogleURL']!= ""){
			$("input[name='google']").val(data['fldGoogleURL']);
			$("input[name='google']").parent().parent().find('.socialUrl').slideDown().addClass('active');
			$("input[name='google']").parent().parent().find('.socialCheckbox').prop('checked', true);
		}

		// slidedowns for social checkboxes
		$('.socialCheckbox').click(function(){
			if($(this).parent().find('.socialUrl').hasClass('active')){
				$(this).parent().find('.socialUrl').slideUp().removeClass('active');
			}else{
				$(this).parent().find('.socialUrl').slideDown().addClass('active');
			}
		});

 	});
	$('#submitButt').click(function(){
		$('#editProf').submit();
	});
});
</script>

<div class="editProfileContain">
	<div class="contentHeader">Edit My Profile
	</div> 
	<ul>
		<li class="containRow">
			<form method="post" action="<? echo BASEDIR; ?>User/?updateProfile=profile" id="editProf" name="form1" enctype="multipart/form-data">
				<div class="leftCell containCell">
					<ul>
						<li><span class="inputTitle">First Name</span></li>
						<li><input type="text" name="first_name" value=""></li>
						<li><span>Last Name</span></li>
						<li><input type="text" name="last_name" value=""></li>
						<li><span>Personal Website URL</span></li>
						<li><input type="text" name="personal_url" value=""></li>
						<li><span>About Me</span></li>
						<li><textarea name="about_me" class="about_me" rows="6"></textarea></li>
					</ul>
				</div>


				<div class="rightCell containCell">
					<div class="leftNest nest">
						<div class="inputTitle">Social Networks</div>
						<ul>
							<li>
								<input type="checkbox" class="socialCheckbox" id="git">
								<img alt="img" class="icon" src="<? echo BASEDIR; ?>Views/css/fonts/icons/elegantmediaicons/PNG/git.png">
								GIT
								<div class="socialUrl">Username: <input type="text" name="git"></div>
							</li>
							<li>
								<input type="checkbox" class="socialCheckbox" id="twitter">
								<img alt="img" class="icon" src="<? echo BASEDIR; ?>Views/css/fonts/icons/elegantmediaicons/PNG/twitter.png">
								Twitter
								<div class="socialUrl">Username: <input type="text" name="twitter"></div>
							</li>
							<li>
								<input type="checkbox" class="socialCheckbox" id="facebook">
								<img alt="img" class="icon" src="<? echo BASEDIR; ?>Views/css/fonts/icons/elegantmediaicons/PNG/facebook.png">
								Facebook
								<div class="socialUrl">URL: <input type="text" name="facebook"></div>
							</li>
							<li>
								<input type="checkbox" class="socialCheckbox" id="tumblr">
								<img alt="img" class="icon" src="<? echo BASEDIR; ?>Views/css/fonts/icons/elegantmediaicons/PNG/tumblr.png">
								Tumblr
								<div class="socialUrl">URL: <input type="text" name="tumblr"></div>
							</li>
							<li>
								<input type="checkbox" class="socialCheckbox" id="blogger">
								<img alt="img" class="icon" src="<? echo BASEDIR; ?>Views/css/fonts/icons/elegantmediaicons/PNG/blogger.png">
								Blogger
								<div class="socialUrl">URL: <input type="text" name="blogger"></div>
							</li>
							<li>
								<input type="checkbox" class="socialCheckbox" id="linkedin">
								<img alt="img" class="icon" src="<? echo BASEDIR; ?>Views/css/fonts/icons/elegantmediaicons/PNG/linkedin.png">
								Linkedin
								<div class="socialUrl">URL: <input type="text" name="linkedin"></div>
							</li>
							<li>
								<input type="checkbox" class="socialCheckbox" id="google">
								<img alt="img" class="icon" src="<? echo BASEDIR; ?>Views/css/fonts/icons/elegantmediaicons/PNG/google.png">
								Google +
								<div class="socialUrl">URL: <input type="text" name="google"></div>
							</li>
							<li>
								<input type="checkbox" class="socialCheckbox" id="rss">
								<img alt="img" class="icon" src="<? echo BASEDIR; ?>Views/css/fonts/icons/elegantmediaicons/PNG/rss.png">
								RSS Feed
								<div class="socialUrl">URL: <input type="text" name="rss"></div>
							</li>
						</ul>
					</div>
				

					<div class="rightNest nest">
						<div class="inputTitle">Profile image</div>
						<div class="imageDialog" id="PhotoPrevs">
						</div>
						<input type="file" name="userIMG">
					</div>

				</div>
			</form>
		</li>

		<li class="buttonRow">
			<input type="button" id="submitButt" value="submit" class="button">
			<input type="button" value="clear" id="clear" class="button">
			<input type="button" value="test" id="test" style="display:none;">
		</li>

		<? // include "Views/profilePics/example-advanced/index.php"; ?>
		

		

	</ul>
</div>
</form>
