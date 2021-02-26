<?php include "inc/header.php";?>
				<section>
					<?php include "inc/sidebar.php";?>
					<article>
						<?php
							if(isset($_GET['dpDelId'])){
								$dpDelId = $_GET['dpDelId'];
								$delRes = $dep->delDeposit($dpDelId);
								if($delRes){
									echo $delRes;
								}else{
									echo "<script>window.location='404.php'</script>";
								}
							}
						?>
						<div class="bazzar_tbl admin_meal">
						<h2>Deposit List</h2>
						<form>
							<table>
								<tbody>
									<tr>
										<td>Name</td>
										<td>Date</td>
										<td>Amount</td>
										<td>Action</td>
									</tr>
									<?php
										$res = $dep->getDeposit();
										if($res){
											while($value = $res->fetch_assoc()){
									?>
									<tr>
										<td><?php echo $value['uName'];?></td>
										<td><?php echo $fm->formatDate($value['depDate']);?></td>
										<td><?php echo $value['amount'];?></td>
										<td>
											<a href="editDep.php?dpEditId=<?php echo $value['depId'];?>">Edit</a> ||
											<a onclick="return confirm('Are you sure you want to Delete?');" href="?dpDelId=<?php echo $value['depId'];?>">Delete</a>
										</td>
									</tr>
									<?php
										}
									}
									?>
								</tbody>
							</table>
							</form>
						</div>
					</article>
				</section>
				<?php include "inc/footer.php";?>