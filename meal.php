<?php include "inc/header.php";?>
				<section>
					<article>
					<?php
						if(isset($_GET['chkId'])){
								$chkId = $_GET['chkId'];
						}
					?>
						<div class="bazzar_tbl">
						<h2>Your Meals (<span>
							<?php
							
							if(isset($chkId)){
								$getMember = $mem->getMemberbyId($chkId);
								$getMember = $getMember->fetch_assoc();
								echo $getMember['memName'];
							}
							
							?>
						</span>)</h2>
							<table>
								<tbody>
									<tr>
										<td>Date</td>
										<td>Meal Amount</td>
									</tr>
									<?php
										$res = $meal->getMealbyId($chkId);
										$tot = 0;
										if($res){
											while($value = $res->fetch_assoc()){
									?>
									<tr>
										<td><?php echo $fm->formatDate($value['date']);?></td>
										<td><?php 
											if($value['memID_'.$chkId] == "")echo 0;
											else
											echo $value['memID_'.$chkId];?></td>
									</tr>
										<?php 
											$tot += (float)$value['memID_'.$chkId];
											}
										}
										?>
									<tr class="tot">
										<td>Total Meal:</td>
										<td><?php echo $tot;?></td>
									</tr>
								</tbody>
							</table>
						</div>
					</article>
				</section>
				<?php include "inc/footer.php";?>