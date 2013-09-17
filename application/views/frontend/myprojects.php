    <!--Middle Part Start-->
    <div id="content">

      <!--Featured Product Part Start-->
      <div class="box">
        <div class="box-heading">My Projects</div>
        <div class="box-content">
         	
         
         <?php if(count($allprojects)!=0) : ?> 

          <div class="cart-info">
            <table>
              <thead>
                <tr>
                <td class="name">Project Name</td>
                <td class="model">Submit Date</td>
                <td>Status</td>
                <td class="price">Action</td>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($allprojects as $project) { ?>

                  <?php $project_status = ""  ;
                    if($project['status'] == 0){
                      $project_status = "Waiting for Approval";
                    } else{
                       $project_status = "Approved";
                    }

                  ?>
                   <tr>
                    <td class="name"> <?php echo $project['title']; ?> </td>
                    <td class="model"><?php echo $project['date']; ?> </td>
                    <td class="model"> <?php echo $project_status ; ?> </td>
                    <td class="total"> 
                       <span> <a href="#" class="button">Edit </a></span>
                        <span> | </span>
                        <span> <a href="#" class="button">Delete </a></span></td>
                  </tr>
               <?php } ?>
               
               </tbody>
            </table>
         </div>
       <?php else: ?>
         <h3>You have no Project till now.</h3>
      <?php endif;  ?>

        </div>
      </div>
      <!--Featured Product Part End-->
	
	
	
	</div> 
    <!--Middle Part End-->