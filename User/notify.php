<?php
   
$sql="Select * From notify WHERE memberid = $user_checkm";
$result = mysqli_query($db,$sql);
$num1 = mysqli_num_rows($result);
   
?>
 
 <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret hidden-sm hidden-xs"></b>
                                    <span class="notification hidden-sm hidden-xs"><?php echo $num1; ?></span>
									<p class="hidden-lg hidden-md">
										<?php echo $num1; ?> Notifications
										<b class="caret"></b>
									</p>
                              </a>
                              <ul class="dropdown-menu"> 
						<?php for($i=0;$i<$num1;$i++)
								{
								$row = mysqli_fetch_array($result);?>
                                <li><a href="#"><?php echo ucfirst($row['ncontent']); ?></a></li>
                          <?php } ?>
                                <li><a href="clear.php">Clear Notifications</a></li>
                              </ul>
                        </li>