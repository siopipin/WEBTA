<nav class="navbar navbar-transparent navbar-absolute">
	<div class="container-fluid">
		<div class="navbar-minimize">
			<button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
				<i class="material-icons visible-on-sidebar-regular">more_vert</i>
				<i class="material-icons visible-on-sidebar-mini">view_list</i>
			</button>
		</div>
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo base_url('controller_auth') ?>"> Homepage </a>
		</div>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li>
					<a href="<?php echo base_url('controller_auth') ?>" class="dropdown-toggle" data-toggle="dropdown">
						<i class="material-icons">dashboard</i>
						<p class="hidden-lg hidden-md">Dashboard</p>
					</a>
				</li>

				<?php if ($this->session->userdata('akses') == '1') : ?>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="material-icons">notifications</i>
							<span class="notification"><?php echo $hitungpesan['jumlah'] ?></span>
							<p class="hidden-lg hidden-md">
								Notifications
								<b class="caret"></b>
							</p>
						</a>
						<ul class="dropdown-menu">
							<?php 
								foreach ($pesan as $row) {
							?>		
								<li>
									<a href="<?php echo base_url('controller_dashboard/pesanPengunjung') ?>"><?php echo $row->pe_judul ?> </a>
								</li>
							<?php } ?>
						</ul>
					</li>
				<?php elseif ( $this->session->userdata('akses') == '3') : ?>
				<li>
					<a href="<?php echo base_url('controller_profile/editprofile') ?>">
						<i class="material-icons">person</i>
						<p class="hidden-lg hidden-md">Profile</p>
					</a>
				</li>
				<li class="separator hidden-lg hidden-md"></li>
				<?php else : ?>

				<?php endif; ?>

				
				
			</ul>
			<!-- <form class="navbar-form navbar-right" role="search">
				<div class="form-group form-search is-empty">
					<input type="text" class="form-control" placeholder="Search">
					<span class="material-input"></span>
				</div>
				<button type="submit" class="btn btn-white btn-round btn-just-icon">
					<i class="material-icons">search</i>
					<div class="ripple-container"></div>
				</button>
			</form> -->
		</div>
	</div>
</nav>
