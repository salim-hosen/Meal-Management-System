<?php include "inc/header.php";?>
				<section>
					<article>
						<div class="bazzar_tbl">
						<h2>Deposits</h2>
							<table>
								<tbody>
									<tr>
										<td>Name</td>
										<td>Date</td>
										<td>Amount</td>
									</tr>
									<?php
										$res = $dep->getDeposit();
										$tot = 0;
										if($res){
											while($value = $res->fetch_assoc()){
									?>
									<tr>
										<td><?php echo $value['uName'];?></td>
										<td><?php echo $fm->formatDate($value['depDate']);?></td>
										<td><?php echo $value['amount'];?></td>
									</tr>
									<?php
										$tot += (float)$value['amount'];
										}
									}
									?>
									<tr class="tot">
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