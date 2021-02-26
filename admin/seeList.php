<?php include "inc/header.php";?>
				<section>
					<?php include "inc/sidebar.php";?>
					<article>
						<div class="listImg">
							<?php
								if(isset($_GET['seeId'])){
									$imageName = $_GET['seeId'];
								}
							?>
							<img src="uploads/<?php echo $imageName;?>" alt="List Image"/>
						</div>
					</article>
				</section>
				<?php include "inc/footer.php";?>