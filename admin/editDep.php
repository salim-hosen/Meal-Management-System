<?php include "inc/header.php";?>
				<section>
					<?php include "inc/sidebar.php";?>
					<article>
						<?php
							if(isset($_GET['dpEditId'])){
								$dpEditId = $_GET['dpEditId'];
							}
							
							if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['update'])){
								$upRes = $dep->updateDep($dpEditId,$_POST);
								if($upRes)echo $upRes;
							}
						?>
						<h2>Edit Deposit</h2>
						<form action="" method="post">
							<table class="dep">
							<?php
								$edRes = $dep->getDepositbyId($dpEditId);
								if($edRes){
									while($vlu = $edRes->fetch_assoc()){
							?>
								<tr>
									<td>Name</td>
									<td><input autofocus type="text" name="name" value="<?php echo $vlu['uName'];?>"/></td>
								</tr>
								<tr>
									<td>Date</td>
									<td><input type="date" min="2018-01-01" value="<?php echo $vlu['depDate'];?>" name="date"/></td>
								</tr>
								<tr>
									<td>Amount</td>
									<td><input value="<?php echo $vlu['amount'];?>" type="text" name="amount"/></td>
								</tr>
								<tr>
									<td></td>
									<td><input type="submit" name="update" value="Update"/></td>
								</tr>
								<?php
									}
								}
								?>
							</table>
						</form>
					</article>
				</section>
				<?php include "inc/footer.php";?>