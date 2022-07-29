<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="icon" type="image/x-icon" href="<?= base_url('assets/img/logo.png') ?>" />
		<title>Klinik Ortotik Prostetik | Poltekkes Jakarta I</title>
    <!-- font -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
			<script src="https://cdn.tailwindcss.com"></script>
		<script
				type="module"
				src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
			></script>
			<script
				nomodule
				src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"
			></script>

		<style>
			body{
				font-family: 'Rubik', sans-serif;
			}
		</style>
	</head>
	<body class="bg-[#f4fdff]">
    <!-- nav -->
  <nav
			class="fixed left-0 top-0 w-full p-3 bg-gradient-to-r from-[#3BACB6] to-[#82DBD8] shadow md:shadow-md md:flex md:items-center md:justify-between md:px-[100px] transition-all"
		>
			<div class="flex justify-between items-center">
				<span class="text-lg md:text-2xl uppercase font-bold text-white">
					<img
						class="w-10 inline mr-3 hover:scale-110"
						src="http://bigdata.poltekkesjakarta1.ac.id/assets/img/logo.png"
					/>
					<span>Poltekkes Jakarta I</span>
				</span>

				<span class="text-3xl cursor-pointer md:hidden block mx-2">
					<ion-icon
						class="text-white"
						name="menu"
						onclick="Menu(this)"
					></ion-icon>
				</span>
			</div>

			<ul
				class="md:flex md:items-center md:bg-transparent bg-[#3BACB6] z-[10] md:z-auto md:static absolute w-full left-0 md:w-auto md:py-0 py-2 px-2 md:pl-0 md:opacity-100 opacity-0 top-[-400px] transition-all"
			>
			<a href="<?= base_url() ?>" class="text-xl text-white font-semibold hover:text-black">
				<li class="px-4 py-3 md:my-0 hover:bg-[#32929b] h-full rounded-md">
				Home
				</li>
			</a>
			<a href="<?= base_url('user/kritiksaran') ?>" class="text-xl text-white font-semibold hover:text-black">
				<li class="px-4 py-3 md:my-0 hover:bg-[#32929b] h-full rounded-md">
				Kritik Dan Saran
				</li>
			</a>
			<a href="<?= base_url() ?>" class="text-xl text-white font-semibold hover:text-black">
				<li class="px-4 py-3 md:my-0 hover:bg-[#32929b] h-full rounded-md">
				Login
				</li>
			</a>
			</ul>
		</nav>
    <!-- close nav -->

    <div id="content" class="">
		<div class="flex items-center justify-center min-h-screen transition-all">
        <!-- Login Form -->
			<div class="logo flex items-center justify-center flex-col">
				<div class="h-10 mb-14">
					<img class="w-56" src="<?= base_url('assets/img/bigdata_polkesjasa.png'); ?>" alt="">
					<p class="text-center">Poltekkes Kemenkes Jakarta I</p>
				</div>
				<div class="px-8 py-6 text-left bg-white shadow-lg">
					<h3 class="text-2xl font-bold text-center text-sky-700">Klinik Ortotik Prostetik</h3>
					<p class="text-center text-slate-600">Masukkan Username dan Password</p>
					<?php
					echo $this->session->flashdata('success'); 
					?>
					<form action="<?php echo site_url('User/aksi_login_admin'); ?>" method="post">
						<div class="mt-4">
							<div>
								<label class="block text-slate-600" for="username">Username<label>
										<input name="username" type="text" placeholder="Masukkan Username"
											class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 shadow-sm">
							</div>
							<div class="mt-4">
								<label class="block text-slate-600">Password<label>
                                        <input name="password" type="text" placeholder="Masukkan Username"
											class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 shadow-sm">
							</div>
							<div>
								<button type="submit" class="w-full py-1 mt-4 text-white bg-blue-600 rounded-md hover:bg-blue-900 shadow-md">Login</button>
							</div>
						</div>
					</form>
				</div>
			</div>
        <!-- Login Form -->
     	</div>
    </div>

    <!-- Footer -->
		<footer
			class="bottom-0 left-0 transition-all mt-20 lg:mt-40 flex justify-center items-center h-14 absolute w-full bg-gradient-to-r from-[#3BACB6] to-[#82DBD8] shadow"
		>
			<div class="container mx-auto flex justify-center items-center">
				<div>
					<p class="text-white">
						Copyright © 2022
						<span class="font-semibold sm:inline-block hidden"
							>POLTEKKES KEMENKES JAKARTA I</span
						>
					</p>
					<p class="text-white">
						<span class="font-semibold block sm:hidden"
							>POLTEKKES KEMENKES JAKARTA I</span
						>
					</p>
				</div>
			</div>
		</footer>
		<!-- Footer Close -->

      <script>
			function Menu(e) {
				let list = document.querySelector("ul");
				e.name === "menu"
					? ((e.name = "close"),
					  list.classList.add("top-[70px]"),
					  list.classList.add("opacity-100"))
					: ((e.name = "menu"),
					  list.classList.remove("top-[70px]"),
					  list.classList.remove("opacity-100"));
			}
		</script>
	</body>
</html>
