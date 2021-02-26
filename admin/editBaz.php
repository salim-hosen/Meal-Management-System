<?php include "inc/header.php";?>
				<section>
					<?php include "inc/sidebar.php";?>
					<article>
					<?php
						if(isset($_GET['bEditId'])){
							$bEditId = $_GET['bEditId'];
						}
					
						if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['edit'])){
							$bazRes = $baz->editBazar($_POST,$_FILES,$bEditId);
							if($bazRes)echo $bazRes;
						}
					?>
						<h2>Edit Bazzar</h2>
						<form action="" method="post" enctype="multipart/form-data">
							<table class="baz">
							<?php
								$edRes = $baz->getBazbyId($bEditId);
								if($edRes){
									while($vlu = $edRes->fetch_assoc()){
							?>
								<tr>
									<td>Name</td>
									<td><input autofocus type="text" name="name" value="<?php echo $vlu['bName'];?>"/></td>
								</tr>
								<tr>
									<td>Date</td>
									<td><input type="date" min="2018-01-01" value="<?php echo $vlu['bDate'];?>" name="date"/></td>
								</tr>
								<tr>
									<td>Current Image</td>
									<td><img width="90" height="90" src="uploads/<?php echo $vlu['image'];?>" alt="image"/></td>
								</tr>
								<tr>
									<td>Upload new Image</td>
									<td><input type="file" name="img"/></td>
								</tr>
								<tr>
									<td>Amount</td>
									<td><input value="<?php echo $vlu['amount'];?>" type="text" name="amount"/></td>
								</tr>
								<tr>
									<td></td>
									<td><input type="submit" name="edit" value="Submit"/></td>
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