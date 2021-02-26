<?php include "inc/header.php";?>
				<section>
					<article>
						<div class="bazzar_tbl">
						<h2>Bazzar List</h2>
							<table>
								<tbody>
									<tr>
										<td>Date</td>
										<td>Name</td>
										<td>List</td>
										<td>Amount</td>
									</tr>
									<?php
										$res = $baz->getBazDetails();
										$tot = 0;
										if($res){
											while($value = $res->fetch_assoc()){
									?>
									<tr>
										<td><?php echo $fm->formatDate($value['bDate']);?></td>
										<td><?php echo $value['bName'];?></td>
										<td>
											<a href="blist.php">See List</a>
										</td>
										<td><?php echo $value['amount'];?></td>
									</tr>
									<?php
									$tot += (float) $value['amount'];
										}
									}
									?>
									<tr class="tot">
										<td></td>
										<td></td>
										<td>Total:</td>
										<td><?php echo $tot;?></td>
									</tr>
								</tbody>
							</table>
						</div>
					</article>
				</section>
				<?php include "inc/footer.php";?>