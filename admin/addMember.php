<?php include "inc/header.php";?>
				<section>
					<?php include "inc/sidebar.php";?>
					<article>
					<?php
						if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])){
							$memRes = $mem->addMember($_POST);
							if($memRes){
								echo $memRes;
							}
						}
					?>
						<h2>Add Bazzar</h2>
						<form action="" method="post">
							<table class="baz">
								<tr>
									<td>Name</td>
									<td><input onfocus type="text" name="name" placeholder="Enter Your Name..."/></td>
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