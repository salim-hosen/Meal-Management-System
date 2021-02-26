<?php include "inc/header.php";?>
				<section>
					<?php include "inc/sidebar.php";?>
					<article>
					<?php
						if(isset($_GET['mDelId'])){
							$delId = $_GET['mDelId'];
							$delMeal = $meal->delMeal($delId);
							if($delMeal){
								echo $delMeal;
							}
						}
					?>
						<div class="bazzar_tbl admin_meal">
						<h2>Meal List</h2>
						<form action="" method="post">
							<table>
								<tbody>
									<tr>
										<td>Name</td>
										<td>Action</td>
									</tr>
									<?php
										$res = $mem->getMemberList();
										if($res){
											while($value = $res->fetch_assoc()){
									?>
									<tr>
										<td><?php echo $value['memName'];?></td>
										<td>
											<a href="checkMeal.php?chkId=<?php echo $value['memId'];?>">Check</a>
										</td>
									</tr>
									<?php
										}
									}
									?>
								</tbody>
							</table>
							<input type="submit" name="submit" value="Submit"/>
							</form>
						</div>
					</article>
				</section>
				<?php include "inc/footer.php";?>