<?php include "inc/header.php";?>
				<section>
					<?php include "inc/sidebar.php";?>
					<article>
					<?php
						if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])){
							$bazRes = $baz->addBazar($_POST,$_FILES);
							if($bazRes)echo $bazRes;
						}
					?>
						<h2>Add Bazzar</h2>
						<form action="" method="post" enctype="multipart/form-data">
							<table class="baz">
								<tr>
									<td>Name</td>
									<td>
										<select style="width:83%;" name="name">
											<?php
												$memRes = $mem->getMemberList();
												if($memRes){
													while($vlu = $memRes->fetch_assoc()){
											?>
											<option value="<?php echo $vlu['memName'];?>"><?php echo $vlu['memName'];?></option>
											<?php
												}
											}
											?>
										</select>
									</td>
								</tr>
								<tr>
									<td>Date</td>
									<td><input type="date" min="2018-01-01" value="<?php echo date("Y-m-d");?>" name="date"/></td>
								</tr>
								<tr>
									<td>Upload List</td>
									<td><input type="file" name="img"/></td>
								</tr>
								<tr>
									<td>Amount</td>
									<td><input placeholder="Enter Amount in Tk..." type="text" name="amount"/></td>
								</tr>
								<tr>
									<td></td>
									<td><input type="submit" name="submit" value="Submit"/></td>
								</tr>
							</table>
						</form>
					</article>
				</section>
				<?php include "inc/footer.php";?>