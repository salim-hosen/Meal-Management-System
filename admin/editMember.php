<?php include "inc/header.php";?>
				<section>
				<?php
					if(isset($_GET['memEditId'])){
						$memEditId = $_GET['memEditId'];
					}
				?>
					<?php include "inc/sidebar.php";?>
					<article>
					<?php
						if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])){
							$upRes = $mem->updateMember($_POST,$memEditId);
							if($upRes)echo $upRes;
						}
					?>
						<h2>Add Bazzar</h2>
						<form action="" method="post">
							<table class="baz">
								<?php
								$edRes = $mem->getMemberbyId($memEditId);
								if($edRes){
									while($vlu = $edRes->fetch_assoc()){
								?>
								<tr>
									<td>Name</td>
									<td><input onfocus type="text" name="name" value="<?php echo $vlu['memName'];?>"/></td>
								</tr>
								<?php
									}
								}
								?>
								<tr>
									<td></td>
									<td><input type="submit" name="submit" value="Submit"/></td>
								</tr>
							</table>
						</form>
					</article>
				</section>
				<?php include "inc/footer.php";?>