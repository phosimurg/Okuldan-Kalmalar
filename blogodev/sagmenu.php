
				<div class="card-footer bg-dark" style="width: 100%; ">

					<div class="card-footer	" style="color: red; font-family: 'Raleway'; ">
						KATEGORİLER
					</div>

					<ul class="list-group list-group-flush text-white" >

						<?php 

						$kategori = $db->prepare("SELECT * FROM kategoriler");
						$kategori->execute();

						$kategoricek=$kategori->fetchALL(PDO::FETCH_ASSOC);

						foreach ($kategoricek as $row) { ?>
							

							<li class="list-group-item bg-dark"><?php echo $row["kategoriad"] ?></li>


						<?php  } ?>
											
					</ul>

				</div>
		

