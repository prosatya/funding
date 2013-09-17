<div class="rightdivsite">
  <div class="clear" style="height:14px"></div>
 <div class="videodiv">

       <div class="fucher_cont">
      <div class="box"> 
      <div class="box-heading">News List </div></div>
       <?php foreach($news as $row) { ?>
             <div class="description01">
                <div class="name">
				<b> <a href="<?php echo base_url(); ?>meeting/viewpage/<?php  echo $row->id; ?>"><?php  echo $row->page_title; ?> </a></b>
			 </div>
              <div class="rating"><?php echo $row->page_keywords; ?> </div>
			   <div class="description"><?php  echo $row->page_desc; ?></div>
             </div>
             <?php }  ?>
            
             
      </div>
 
 </div>
 
 </div>
</div>
<div class="clear"></div>