<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- font -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <!-- font -->
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
				<li class="px-4 py-3 md:my-0 hover:bg-[#32929b] h-full">
					<a href="#" class="text-xl text-white font-semibold hover:text-black"
						>Home</a
					>
				</li>
				<li class="px-4 py-3 md:my-0 hover:bg-[#32929b] h-full">
					<a href="#" class="text-xl text-white font-semibold hover:text-black"
						>About</a
					>
				</li>
				<li class="px-4 py-3 md:my-0 hover:bg-[#32929b] h-full">
					<a href="<?= base_url('user/logout') ?>" class="text-xl text-white font-semibold hover:text-black"
						>Logout</a
					>
				</li>
			</ul>
		</nav>
    <!-- close nav -->

    <div id="content" class="mt-36 md:mt-0">
		<div class="flex justify-center min-h-screen transition-all flex-col">
        <!-- Login Form -->
			<div class="dashboard flex items-center justify-center rounded-lg flex-col md:flex-row gap-3 transition-all ">
			<h3 class="md:-mt-[266px] md:-mr-36 font-bold text-2xl text-slate-700">Profil Pasien</h3>
				<div class="profil-detail flex items-center justify-center flex-col w-96 md:w-96 p-6 shadow-lg rounded-lg bg-white">
					<div class="foto-profil h-30 w-30 rounded-full bg-slate-100">
						<img src="https://icon-library.com/images/person-image-icon/person-image-icon-2.jpg" alt="" class="rounded-full w-28 h-28">
					</div>
	  				<div class="nama-profil mt-2">
						  <p class="font-bold"><?= $data_pasien->nama_pasien ?></p>
					</div>
	  				<div class="nomor-profil">
						  No. RM. <?= $data_pasien->no_rm ?>
					</div>
					<div class="social-media">
						<a href="#" class="hover:text-slate-500"><span><ion-icon name="logo-twitter" class="-z-50"></ion-icon></span></a>
						<a href="#" class="hover:text-slate-500"><span><ion-icon name="logo-facebook"></ion-icon></span></a>
						<a href="#" class="hover:text-slate-500"><span><ion-icon name="logo-instagram"></ion-icon></span></a>
						<a href="#" class="hover:text-slate-500"><span><ion-icon name="logo-linkedin"></ion-icon></span></a>
					</div>
				</div>
				<div class="detail flex md:items-start md:justify-start flex-col w-96 lg:w-[784px] md:w-[384px] p-6 shadow-lg rounded-lg bg-white transition-all">
					<div class="flex md:justify-start flex-col w-full transition-all">
	  					<div class="title border-b-2 border-sky-300 font-bold shadow-md text-slate-700 transition-all">
							Pendaftaran Kunjungan
						</div>
						<div class="konten flex items-center justify-center md:items-start md:justify-start flex-col mt-5 shadow-md w-full p-3 transition-all">
                            <p class="font-bold">Pasien Umum</p>
							<form action="<?php echo site_url('kunjungan/create_kunjungan'); ?>" method="post">
                            <div class="grid grid-cols-2 gap-4 w-full my-3">
                                <div>No RM</div>
                                <div><input type="text" name="" value="<?= $data_pasien->no_rm ?>" class="w-full px-1 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 shadow-sm" disabled>
                                <input type="hidden" name="no_rm" value="<?= $data_pasien->no_rm ?>" class="w-full px-1 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 shadow-sm"></div>
                                <div>Nama</div>
                                <div><input type="text" name="nama_pasien2" value="<?= $data_pasien->nama_pasien ?>" class="w-full px-1 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 shadow-sm" disabled>
								<input type="text" name="nama_pasien" value="<?= $data_pasien->nama_pasien ?>" class="w-full px-1 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 shadow-sm" hidden>
								</div>
                                <div>No KTP</div>
                                <div><input type="text" name="nik" value="<?= $data_pasien->nik ?>" class="w-full px-1 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 shadow-sm" disabled></div>
                                <div>No HP</div>
                                <div><input type="text" name="no_hp" value="<?= $data_pasien->no_hp ?>" class="w-full px-1 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 shadow-sm" disabled></div>
                                <div>Tgl Kunjungan</div>
                                <div><input type="date" name="tgl_kunjungan" required></div>
                                <div>Waktu Kunjungan</div>
                                <div><select name="waktu_kunjungan" id="">
                                    <option value="Siang">Siang</option>
                                    <option value="Malam">Malam</option>
                                </select></div>
                            </div>
                            <p class="font-bold">Pasien Umum</p>
                            <div class="grid grid-cols-2 gap-4 w-full mt-3">
                                <div>Nama Saksi</div>
                                <div><input type="text" name="nama_saksi" class="w-full px-1 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 shadow-sm"></div>
                                <div>Hubungan</div>
                                <div><input type="text" name="hubungan" class="w-full px-1 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 shadow-sm"></div>
                            </div>
						</div>
					</div>
					<div class="flex items-center justify-center flex-row mt-14 gap-1 transition-all">
						<a href="<?= base_url('home') ?>" class="bg-sky-400 text-white p-2 rounded-md hover:bg-slate-400 transition-all">Kembali</a>
                        <button type="submit" class="bg-blue-500 text-white p-2 rounded-md hover:bg-slate-400 transition-all">Daftar Sekarang</a>
					</div>
					</form>
				</div>
			</div>
        <!-- Login Form -->
     	</div>
    </div>

    <!-- Footer -->
		<footer
			class="bottom-0 left-0 transition-all mt-20 lg:mt-40 flex justify-center items-center h-14 w-full md:absolute bg-gradient-to-r from-[#3BACB6] to-[#82DBD8] shadow"
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
