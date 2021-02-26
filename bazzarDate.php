<?php include "inc/header.php";?>
				<section>
					<article>
						<div class="bazzar_tbl">
						<h2>Bazzar Date</h2>
							<table>
								<tbody>
									<tr>
										<td>Name</td>
										<td>Date</td>
										<td>Status</td>
									</tr>
									<?php
										$bdRes = $baz->getBazarDate();
										if($bdRes){
											while($vlu = $bdRes->fetch_assoc()){
									?>
									<tr>
										<td><?php 
										if($vlu['bdName'] == "")echo "-";
										else
											echo $vlu['bdName'];?></td>
										<td><?php echo $fm->formatDate($vlu['bDate']);?></td>
										<td><?php
											if($vlu['bdStatus'] == 1)echo "Done";
											else if($vlu['bdStatus'] == 2)echo "Pending";
											else echo "-";
										?></td>
									</tr>
									<?php
										}
									}
									?>
								</tbody>
							</table>
						</div>
					</article>
				</section>
				<?php include "inc/footer.php";?>