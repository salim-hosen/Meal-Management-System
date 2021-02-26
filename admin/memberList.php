<?php include "inc/header.php";?>
				<section>
					<?php include "inc/sidebar.php";?>
					<article>
						<?php
							if(isset($_GET['memDelId'])){
								$memDelId = $_GET['memDelId'];
								$delRes = $mem->delMembers($memDelId);
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
											<a href="editMember.php?memEditId=<?php echo $value['memId'];?>">Edit</a> ||
											<a onclick="return confirm('Are you sure you want to Delete?');" href="?memDelId=<?php echo $value['memId'];?>">Delete</a>
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