<nav class="navbar navbar-primary navbar-transparent navbar-absolute">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">EPERPUS | Perpustakaan Digital</a>
		</div>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li>
					<a href="<?php echo site_url('controller_dashboard/index') ?>">
						<i class="material-icons">dashboard</i> Beranda
					</a>
				</li>

				<li>
					<a href="<?php echo site_url('controller_auth/registration/') ?>">
						<i class="material-icons">person_add</i> Daftar Baru
					</a>
				</li>

				<li>
					<a href="<?php echo site_url('controller_auth/login/') ?>">
						<i class="material-icons">fingerprint</i> Masuk
					</a>
				</li>
			</ul>
		</div>
	</div>
</nav>
