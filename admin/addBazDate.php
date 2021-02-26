<?php include "inc/header.php";?>
				<section>
					<?php include "inc/sidebar.php";?>
					<article>
					<?php
						$insMonth = $baz->insertMonth();
						
						if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['update'])){
							$upRes = $baz->updateBazDate($_POST);
							if($upRes)echo $upRes;
						}
					?>
						
						<div class="bazzar_tbl admin_meal baz_date">
						<h2>Add Bazar Date</h2>
						<form action="" method="post">
							<table>
								<tbody>
									<tr>
										<td>Date</td>
										<td>Name</td>
										<td>Status</td>
									</tr>
									<?php
										$bdRes = $baz->getBazarDate();
										if($bdRes){
											$i = 1;
											while($vlu = $bdRes->fetch_assoc()){
									?>
									<tr>
										<td><?php echo $vlu['bDate'];?></td>
										<td>
											<select style="width:63%;" name="<?php echo "name".$i;?>">
												<option value="">Select</option>
												<?php
													$memRes = $mem->getMemberList();
													if($memRes){
														while($data = $memRes->fetch_assoc()){
												?>
												<option <?php
													if($vlu['bdName'] == $data['memName'])echo "selected";
												?> value="<?php echo $data['memName'];?>"><?php echo $data['memName'];?></option>
												<?php
													}
												}
												?>
											</select>
										</td>
										<td>
											<select name="<?php echo "status".$i;?>">
												<option value="0">Select</option>
												<option <?php
													if($vlu['bdStatus'] == '1')echo "selected";?> value="1">Done</option>
												<option <?php
													if($vlu['bdStatus'] == '2')echo "selected";?> value="2">Pending</option>
											</select>
										</td>
									</tr>
									<?php
										$i++;}
									}
									?>
								</tbody>
							</table>
							<input type="submit" name="update" value="Update"/>
							</form>
						</div>
					</article>
				</section>
				<?php include "inc/footer.php";?>