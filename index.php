<?php
   $isIndex = true;
   require_once('inc/functions.php');
   require_once('language.php');

   require_once('template/_header.php');
   require_once('template/_ProjectSection.php');
   echo get_button($language['All Projects'][$i],$ext,'Project.php');

   require_once('template/_WorkExperience.php');
   echo get_button($language['All Work Experience'][$i],$ext,'WorkExperience.php');

   require_once('template/_AboutSection.php');
  //  require_once('template/_Contact.php');
   require_once('template/_newcontact.php');
   echo get_button($language['Send Email'][$i],$ext,'Contact.php');
   require_once('template/_footer.php');

 ?>
