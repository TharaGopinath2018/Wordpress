<?php get_header(); ?>
<?php
echo "Welcome PMI";


?>
<!--<a href="<?php echo HOME;?>/events"> Events </a>-->

<?php echo do_shortcode('[unitegallery PMIGallery1]'); ?>

 
<script type="text/javascript">
var scrollspeed=cache=2
var initialdelay=500
function initializeScroller(){
dataobj=document.all? document.all.datacontainer : document.getElementById("datacontainer")
dataobj.style.top="5px"
setTimeout("getdataheight()", initialdelay)
}
function getdataheight(){
thelength=dataobj.offsetHeight
if (thelength==0)
setTimeout("getdataheight()",10)
else
scrollDiv()
}
function scrollDiv(){
dataobj.style.top=parseInt(dataobj.style.top)-scrollspeed+"px"
if (parseInt(dataobj.style.top)<thelength*(-1))
dataobj.style.top="5px"
setTimeout("scrollDiv()",40)
}
if (window.addEventListener)
window.addEventListener("load", initializeScroller, false)
else if (window.attachEvent)
window.attachEvent("onload", initializeScroller)
else
window.onload=initializeScroller
</script>
<div class="">
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
      <img src="<?php echo get_template_directory_uri();?>/images/local_chap_icon.png" />  <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
         Local & Regional Chapters
        </a></img>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
      <p><img src="<?php echo get_template_directory_uri();?>/images/tacc_bullet.png" />
      <a href="http://www.pmi.org.in" target="_blank">PMI India</a></p>
      
      <p><img src="<?php echo get_template_directory_uri();?>/images/tacc_bullet.png" />
      <a href="http://www.pmibangalorechapter.in" target="_blank">PMI Bangalore Chapter</a></p>
      
      <p><img src="<?php echo get_template_directory_uri();?>/images/tacc_bullet.png" />
      <a href="http://www.mypmsite.info/PMIWeb01/default.aspx?compid=1026" target="_blank">PMI Mumbai Chapter</a></p>
      
      <p><img src="<?php echo get_template_directory_uri();?>/images/tacc_bullet.png" />
      <a href="http://www.pminorthindia.org/" target="_blank">PMI North India Chapter</a></p>
      
      <p><img src="<?php echo get_template_directory_uri();?>/images/tacc_bullet.png" />
      <a href="http://www.pmi-pcc.org/" target="_blank">PMI Pearl City Chapter</a></p>
      
      <p><img src="<?php echo get_template_directory_uri();?>/images/tacc_bullet.png" />
      <a href="http://www.pmipunechapter.org/" target="_blank">PMI Pune-Deccan India Chapter</a></p>
      
      <p><img src="<?php echo get_template_directory_uri();?>/images/tacc_bullet.png" />
      <a href="http://www.pmikerala.org/" target="_blank">PMI Kerala Chapter</a></p>
      
      <p><img src="<?php echo get_template_directory_uri();?>/images/tacc_bullet.png" />
      <a href="http://www.pmiwbc.org/" target="_blank">PMI West Bengal Chapter</a></p>
      
      <p><img src="<?php echo get_template_directory_uri();?>/images/tacc_bullet.png" />
      <a href="http://www.pmicolombo.org/" target="_blank">PMI Colombo Chapter</a></p>
      
      <p><img src="<?php echo get_template_directory_uri();?>/images/tacc_bullet.png" />
      <a href="http://www.pmibd.org/" target="_blank">PMI Bangladesh Chapter</a></p>
      
      <p><img src="<?php echo get_template_directory_uri();?>/images/tacc_bullet.png" />
      <a href="http://www.pmiislamabad.org/home/" target="_blank">PMI Islamabad Chapter</a></p>
      
      <p><img src="<?php echo get_template_directory_uri();?>/images/tacc_bullet.png" />
      <a href="http://www.pmikarachi.org/" target="_blank">PMI Karachi Chapter</a></p>
      
      <p><img src="<?php echo get_template_directory_uri();?>/images/tacc_bullet.png" />
      <a href="http://pmilhr.org.pk/" target="_blank">PMI Lahore Chapter</a></p>
      
    </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
     <img src="<?php echo get_template_directory_uri();?>/images/aspirants_icon.png" /><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          PMPs/PMP aspirants
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
      <p><img src="<?php echo get_template_directory_uri();?>/images/tacc_bullet.png" />
      <a href="http://www.pmi.org/Membership/Membership-Types-of-Memberships.aspx" target="_blank">PMI - Online Membership Application</a></p>
      
      <p><img src="<?php echo get_template_directory_uri();?>/images/tacc_bullet.png" />
      <a href="http://marketplace.pmi.org/Pages/ProductDetail.aspx" target="_blank">PMI - Membership Renewal</a></p>
      
      <p><img src="<?php echo get_template_directory_uri();?>/images/tacc_bullet.png" />
      <a href="http://www.pmi.org/Certification/Project-Management-Professional-PMP.aspx" target="_blank">PMP - Requirements to qualify</a></p>
      
      <p><img src="<?php echo get_template_directory_uri();?>/images/tacc_bullet.png" />
     <a target="_blank" href="http://www.pmi.org/en/Certification/Project-Management-Professional-PMP.aspx">PMP Credential Details</a></p>
      
      <p><img src="<?php echo get_template_directory_uri();?>/images/tacc_bullet.png" />
      <a target="_blank" href="https://certification.pmi.org/">PMP - Online application</a></p>
      
      <p><img src="<?php echo get_template_directory_uri();?>/images/tacc_bullet.png" />
      <a target="_blank" href="https://certification.pmi.org/registry.aspx">PMI - Online Credential Registry</a></p>
      
      <p><img src="<?php echo get_template_directory_uri();?>/images/tacc_bullet.png" />
      <a target="_blank" href="http://www.pmi.org/Help/ccrs_user/default.htm">Continuing Certification Requirements Handbook</a></p>
      
      <p><img src="<?php echo get_template_directory_uri();?>/images/tacc_bullet.png" />
      <a target="_blank" href="https://ccrs.pmi.org/Certificants/Transcript.aspx">PDU Online - Reporting Tool</a></p>
      
      <p><img src="<?php echo get_template_directory_uri();?>/images/tacc_bullet.png" />
      <a target="_blank" href="https://ccrs.pmi.org/Certificants/Transcript.aspx">PDU Online Transcripts</a></p>
      
      <p><img src="<?php echo get_template_directory_uri();?>/images/tacc_bullet.png" />
     <a target="_blank" href="http://www.pmi.org/PMBOK-Guide-and-Standards/Standards-Library-of-PMI-Global-Standards.aspx">PMI - Download Global Standards</a></p>
      
      <p><img src="<?php echo get_template_directory_uri();?>/images/tacc_bullet.png" />
     <a target="_blank" href="http://www.pmi.org/Knowledge-Center.aspx">PMI - Knowledge Center</a></p>
      
      <p><img src="<?php echo get_template_directory_uri();?>/images/tacc_bullet.png" />
      <a target="_blank" href="http://www.pmi.org/Knowledge-Center/Virtual-Library-eReads-and-Reference.aspx">PMI Library - eReads &amp; Reference</a></p>
      
      <p><img src="<?php echo get_template_directory_uri();?>/images/tacc_bullet.png" />
      <a target="_blank" href="https://certification.pmi.org/default.aspx">PMP Certification Renewal</a></p>
      
      <p><img src="<?php echo get_template_directory_uri();?>/images/tacc_bullet.png" />
     <a target="_blank" href="http://www.pmi.org/Get-Involved/Chapters-PMI-Chapters.aspx">PMI Chapters worldwide</a></p>
     
      
      
      
   
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title">
     <img src="<?php echo get_template_directory_uri();?>/images/volunteer_icon.png" /><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Volunteers
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">
      <p><img src="<?php echo get_template_directory_uri();?>/images/tacc_bullet.png" />
     <a target="_blank" href="#">Benefits of Volunteering</a></p>
      
      <p><img src="<?php echo get_template_directory_uri();?>/images/tacc_bullet.png" />
      <a target="_blank" href="#">Enroll to be a Volunteer</a></p>
      
      <p><img src="<?php echo get_template_directory_uri();?>/images/tacc_bullet.png" />
      <a target="_blank" href="#">Current Openings</a></p>
      
      <p><img src="<?php echo get_template_directory_uri();?>/images/tacc_bullet.png" />
     <a target="_blank" href="#">PMI Chapters worldwide</a></p>
      </div>
    </div>
  </div>
</div>
</div>

<?php get_footer(); ?>