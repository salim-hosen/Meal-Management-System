<?php include "inc/header.php";?>
				<section>
					<?php include "inc/sidebar.php";?>
					<article>
						<?php
							if(isset($_GET['bDelId'])){
								$bDelId = $_GET['bDelId'];
								$delRes = $baz->delBazList($bDelId);
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
										<td>List</td>
									</tr>
									<?php
										$res = $baz->getBazDetails();
										if($res){
											while($value = $res->fetch_assoc()){
									?>
									<tr>
										<td><?php echo $value['bName'];?></td>
										<td><?php echo $fm->formatDate($value['bDate']);?></td>
										<td><?php echo $value['amount'];?></td>
										<td>
											<a href="seeList.php?seeId=<?php echo $value['image'];?>">See List</a>||
											<a href="editBaz.php?bEditId=<?php echo $value['bazId'];?>">Edit</a>||
											<a onclick="return confirm('Are you sure you want to Delete?');" href="?bDelId=<?php echo $value['bazId'];?>">Delete</a>
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