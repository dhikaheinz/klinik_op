<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
						src="https://akupintar.id/documents/20143/0/Poltekkes+Jakarta+I.jpg"
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
				<li class="px-4 py-3 md:my-0 hover:bg-[#32929b] h-full rounded-md">
					<a href="<?= base_url() ?>" class="text-xl text-white font-semibold"
						>Home</a
					>
				</li>
				<li class="px-4 py-3 md:my-0 hover:bg-[#32929b] h-full rounded-md">
					<a href="<?= base_url('user/kritiksaran') ?>" class="text-xl text-white font-semibold"
						>Kritik & Saran</a
					>
				</li>
				<li class="px-4 py-3 md:my-0 hover:bg-[#32929b] h-full rounded-md">
					<a href="#" class="text-xl text-white font-semibold"
						>Login</a
					>
				</li>
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
					<p class="text-center text-slate-600">Masukkan Data Rekam Medik dan Tanggal Lahir</p>
					<?php
					echo $this->session->flashdata('success'); 
					?>
					<form action="<?php echo site_url('User/aksi_login'); ?>" method="post">
						<div class="mt-4">
							<div>
								<label class="block text-slate-600" for="username">Nomor Rekam Medis<label>
										<input name="no_rm" type="text" placeholder="Nomor Rekam Medis"
											class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 shadow-sm">
							</div>
							<div class="mt-4">
								<label class="block text-slate-600">Tanggal Lahir<label>
										<input name="tanggal_lahir" type="date" placeholder="Tanggal Lahir"
											class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 shadow-sm">
							</div>
							<div>
								<button type="submit" class="w-full py-1 mt-4 text-white bg-blue-600 rounded-md hover:bg-blue-900 shadow-md">Login</button>
							</div>
							<div class="mt-2">
								<p class="text-slate-600">Belum punya Akun? <a href="<?= base_url('user/create') ?>" class="text-sm text-blue-600 hover:underline">Daftar Sekarang</a></p>
							</div>
							<div class="">
								<p class="text-slate-600">Login Sebagai Admin? <a href="<?= base_url('user/login_admin') ?>" class="text-sm text-blue-600 hover:underline">Login</a></p>
							</div>
						</div>
					</form>
				</div>
			</div>
        <!-- Login Form -->
     	</div>
    </div>

	<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-modal="true" role="dialog">
		<div class="modal-dialog modal-dialog-centered relative w-auto pointer-events-none">
			<div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
			<div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
				<h5 class="text-xl font-bold leading-normal text-gray-800" id="exampleModalScrollableLabel">
				Akun Berhasil Dibuat
				</h5>
				<button type="button"
				class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
				data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body relative p-4">
				<div class="w-full">
				<ion-icon name="checkmark-circle-outline" class="font-bold text-5xl animate-pulse"></ion-icon>
				</div>
				<p>Silahkan Cek Email yang di daftarkan pada form ini, akan di berikan <span class="font-semibold">Nomor Rekap Pasien dan Tanggal Lahir untuk login</span>. Terima Kasih</p><br>
				<p>Poltekkes Kemenkes Jakarta I</p>
			</div>
			<div
				class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
				<button type="button"
				class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"
				data-bs-dismiss="modal">
				Close
				</button>
			</div>
			</div>
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

<script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
	</body>
</html>
