<?php include "inc/header.php";?>
				<section>
					<?php include "inc/sidebar.php";?>
					<article>
					<?php
						if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])){
							$res = $meal->addMeal($_POST);
							if($res)echo $res;
						}
					?>
						<div class="bazzar_tbl admin_meal">
						<h2>Add Meals</h2>
						<form action="" method="post">
							<table class="selectDate">
								<tr>
									<td>Select Date</td>
									<td><input type="date" min="2018-01-01" value="<?php echo date("Y-m-d");?>" name="date"/></td>
								</tr>
							</table>
							<table>
								<tbody>
									<tr>
										<td>Name</td>
										<td>Meal Amount</td>
									</tr>
									<?php
										$res = $mem->getMemberList();
										if($res){
											while($value = $res->fetch_assoc()){
									?>
									<tr>
										<td><?php echo $value['memName'];?></td>
										<td><input type="text" value="2.5" name="<?php echo $value['memId'];?>" /></td>
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