<?php include "inc/header.php";?>
				<section>
					<article>
						<div class="meal_tab">
						<h2>Meal List</h2>
							<table>
								<tbody>
									<tr><td>SL</td>
										<td>Name</td>
										<td>Action</td>
									</tr>
									<?php
										$res = $mem->getMemberList();
										if($res){
											$i = 1;
											while($value = $res->fetch_assoc()){
									?>
									<tr>
										<td><?php echo $i++;?></td>
										<td><?php echo $value['memName'];?></td>
										<td>
											<a href="meal.php?chkId=<?php echo $value['memId'];?>">Check Meal</a>
											<?php
												if(Session::get("usrLogin")==true && $value['memId'] == Session::get("userId")){
											?>
											<a href="offmeal.php">Off Meal</a>
											<?php } ?>
										</td>
									</tr>
										<?php 
											}
										}
										?>
								</tbody>
							</table>
						</div>
					</article>
				</section>
				<?php include "inc/footer.php";?>