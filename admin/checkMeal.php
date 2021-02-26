<?php include "inc/header.php";?>
				<section>
					<?php include "inc/sidebar.php";?>
					<article>
			<?php
				$chkId = $_GET['chkId'];
					if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])){
					$res = $meal->updateMeal($_POST,$chkId);
					if($res)echo $res;
				}
			?>
						<div class="bazzar_tbl admin_meal">
						<h2>Meals of (<span><?php
							
							if(isset($chkId)){
								$getMember = $mem->getMemberbyId($chkId);
								$getMember = $getMember->fetch_assoc();
								echo $getMember['memName'];
							}
							
						?></span>)</h2>
						<form action="" method="post">
							<table>
								<tbody>
									<tr>
										<td>Date</td>
										<td>Meal Amount</td>
									</tr>
									<?php
										$res = $meal->getMealbyId($chkId);
										$tot = 0;
										$i = 1;
										if($res){
											while($value = $res->fetch_assoc()){
									?>
									<tr>
										<td><?php echo $value['date'];?></td>
										<td><input type="text" value="<?php echo $value['memID_'.$chkId];?>" name="<?php echo "name".$i;?>" />
										<input type="hidden" value="<?php echo $value['mealId'];?>" name="<?php echo $i++;?>"/>
										</td>
									</tr>
									<?php
										$tot += $value['memID_'.$chkId];
										}
									}
									?>
									<input type="hidden" value="<?php echo $i;?>" name="i"/>
									<tr class="tot">
										<td>Total Meal:</td>
										<td><?php echo $tot;?></td>
										<td></td>
									</tr>
								</tbody>
							</table>
							<input onclick="return confirm('Are you sure to Update?');" type="submit" name="submit" value="Submit"/>
							</form>
						</div>
					</article>
				</section>
				<?php include "inc/footer.php";?>