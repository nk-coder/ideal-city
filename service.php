<?php include_once("db_config/config.php"); ?>
<?php include_once("includes/session.php") ?>
<?php include_once("includes/function.php") ?>
<?php include_once 'template/header.php' ?>
    <?php include_once 'template/nav.php' ?>


    <div class="container emp-profile">
        <form method="post">
            <div class="row">

                <div class="col-md-10">
                    <div class="profile-head">
                        <h5>Ideal City Comporation</h5>

                        <p class="a-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro velit laboriosam eius amet nobis repellat fugiat eum adipisci, minus dolore hic autem ut accusantium dolores suscipit sed saepe est tenetur.</p>

                    </div>


                    <div class="profile-tab">
                        <ul class="tab_button">
                            <li class="ta_button_Bg1 active" role="presentation">
                                <a aria-controls="Upwork" aria-expanded="true" data-toggle="tab" href="#Complete" role="tab">Complete</a>
                            </li>


                            <li class="ta_button_Bg2" role="presentation">
                                <a aria-controls="Freelancer" aria-expanded="false" data-toggle="tab" href="#Processing" role="tab">Processing</a>
                            </li>

                            <li class="ta_button_Bg2" role="presentation">
                                <a aria-controls="Freelancer" aria-expanded="false" data-toggle="tab" href="#New" role="tab">New</a>
                            </li>
                        </ul>


                        <div class="tab-content">
                           <div class="tab-pane fade active in" id="Complete" role="tabpanel">
                              <div class="table-wrapper-scroll-y">
                                <table class="data-table table table-hover">
                                  <thead>
                                    <tr>
                                       <th>Title</th>
                     										<th>Date</th>
                     										<th>Status</th>
                     										<th></th>
                                    </tr>
                                  </thead>


                                  <?php
                                     // collect post data processing
                                     $post_data = mysqli_query($con,"SELECT * FROM post WHERE current_status_of_work='Complete' ORDER BY date_time DESC");
                                     while ($pd=mysqli_fetch_array($post_data)) {
                                       $postId = $pd["id"];
                                       $problem_title = $pd["problem_title"];
                                       $date_time = $pd["date_time"];
                                       $status = $pd["current_status_of_work"];

                                 ?>
                                 <tbody>
                                   <tr>
                                      <td><?php echo $problem_title ?></td>
                                      <td><?php echo $date_time ?></td>
                                      <td><?php echo $status ?></td>
                                      <td>
                                          <!-- <input class="btn btn-info" name="" type="button" value="Details"> -->
                                          <a href="full-post.php?id=<?php echo $postId; ?>"><span class="btn btn-info">Details</span></a>
                                       </td>
                                   </tr>
                                </tbody>
                                <?php } ?>
                                </table>
                              </div>
                           </div>

                           <div class="tab-pane fade" id="Processing" role="tabpanel">
                              <table class="data-table table table-hover">
                                 <tr>
                                    <th>Title</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th></th>
                                 </tr>
                                 <?php
                                 //post data collect
                                 $post_data = mysqli_query($con,"SELECT * FROM post WHERE current_status_of_work='Processing' ORDER BY date_time DESC");
                                    while ($pd=mysqli_fetch_array($post_data)) {
                                       $postId = $pd["id"];
                                       $problem_title = $pd["problem_title"];
                                       $date_time = $pd["date_time"];
                                       $status = $pd["current_status_of_work"];

                                 ?>
                                 <tr>
                                    <td><?php echo $problem_title ?></td>
                                    <td><?php echo $date_time ?></td>
                                    <td><?php echo $status ?></td>
                                    <td>
                                       <!-- <input class="btn btn-info" name="" type="button" value="Details"> -->
                                       <a href="full-post.php?id=<?php echo $postId; ?>"><span class="btn btn-info">Details</span></a>
                                    </td>
                                 </tr>
                                 <?php } ?>
                              </table>
                           </div>



                           <div class="tab-pane fade" id="New" role="tabpanel">
                              <table class="data-table table table-hover">
                                 <tr>
                                    <th>Title</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th></th>
                                 </tr>
                                 <?php
                                 //post data collect
                                 $post_data = mysqli_query($con,"SELECT * FROM post WHERE current_status_of_work='New' ORDER BY date_time DESC");
                                    while ($pd=mysqli_fetch_array($post_data)) {
                                       $postId = $pd["id"];
                                       $problem_title = $pd["problem_title"];
                                       $date_time = $pd["date_time"];
                                       $status = $pd["current_status_of_work"];

                                 ?>
                                 <tr>
                                    <td><?php echo $problem_title ?></td>
                                    <td><?php echo $date_time ?></td>
                                    <td><?php echo $status ?></td>
                                    <td>
                                       <!-- <input class="btn btn-info" name="" type="button" value="Details"> -->
                                       <a href="full-post.php?id=<?php echo $postId; ?>"><span class="btn btn-info">Details</span></a>
                                    </td>
                                 </tr>
                                 <?php } ?>
                              </table>
                           </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

<?php include_once 'template/footer.php'?>
