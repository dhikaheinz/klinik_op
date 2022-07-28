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
    <!-- Style Temp -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
    <!-- Style Temp -->
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
					<a href="#" class="text-xl text-white font-semibold hover:text-black"
						>Login</a
					>
				</li>
			</ul>
		</nav>
    <!-- close nav -->

    <div id="content" class="mt-0">
		<div class="flex items-center justify-center min-h-screen transition-all">
        <!-- Login Form -->
			<div class="logo flex items-center justify-center flex-col">
				<div class="h-10 mb-14">
					<img class="w-56" src="<?= base_url('assets/img/bigdata_polkesjasa.png'); ?>" alt="">
					<p class="text-center">Poltekkes Kemenkes Jakarta I</p>
				</div>
				<div class="lg:px-8 px-2 py-6 text-left bg-white shadow-lg">
					<h3 class="text-2xl font-bold text-center text-sky-700">Kritik dan Saran</h3>
					<p class="text-center text-slate-600">Berikan Penilaian dari Layanan yang Kami Berikan</p>
					<?php
					echo $this->session->flashdata('success'); 
					?>
					<form action="<?php echo site_url('User/input_feedback'); ?>" method="post">
                    <div class="flex items-center justify-center flex-col my-5">
                        <div class="emote grid grid-cols-5 lg:gap-5 gap-1 text-center">
                            <div>
                                <label for="emot1">
                                <img class="lg:w-32 w-20" src="<?= base_url('assets/img/emote/1.png'); ?>" alt="">
                                </label>
                            </div>
                            <div>
                                <label for="emot2">
                                <img class="lg:w-32 w-20" src="<?= base_url('assets/img/emote/2.png'); ?>" alt="">
                                </label>
                            </div>
                            <div>
                                <label for="emot3">
                                <img class="lg:w-32 w-20" src="<?= base_url('assets/img/emote/3.png'); ?>" alt="">
                                </label>
                            </div>
                            <div>
                                <label for="emot4">
                                <img class="lg:w-32 w-20" src="<?= base_url('assets/img/emote/4.png'); ?>" alt="">
                                </label>
                            </div>
                            <div>
                                <label for="emot5">
                                <img class="lg:w-32 w-20" src="<?= base_url('assets/img/emote/5.png'); ?>" alt="">
                                </label>
                            </div>
                            <div>
                                <div class="form-check">
                                    <input class="sr-only peer" type="radio" name="rate_fb" id="emot1" value="1">
                                    <label class="lg:p-2 w-full p-1 text-xs md:text-sm bg-white border border-gray-300 rounded-lg cursor-pointer focus:outline-none hover:bg-gray-50 peer-checked:ring-red-500 peer-checked:ring-2 peer-checked:border-transparent" for="emot1">
                                        Tidak Senang
                                    </label>
                                </div>
                            </div>
                            <div>
                                <div class="form-check">
                                    <input class="sr-only peer" type="radio" name="rate_fb" id="emot2" value="2">
                                    <label class="lg:p-2 w-full p-1 text-xs md:text-sm bg-white border border-gray-300 rounded-lg cursor-pointer focus:outline-none hover:bg-gray-50 peer-checked:ring-orange-500 peer-checked:ring-2 peer-checked:border-transparent" for="emot2">
                                        Lumayan
                                    </label>
                                </div>
                            </div>
                            <div>
                                <div class="form-check">
                                    <input class="sr-only peer" type="radio" name="rate_fb" id="emot3" value="3">
                                    <label class="lg:p-2 w-full p-1 text-xs md:text-sm bg-white border border-gray-300 rounded-lg cursor-pointer focus:outline-none hover:bg-gray-50 peer-checked:ring-yellow-500 peer-checked:ring-2 peer-checked:border-transparent" for="emot3">
                                        Netral
                                    </label>
                                </div>
                            </div>
                            <div>
                                <div class="form-check">
                                    <input class="sr-only peer" type="radio" name="rate_fb" id="emot4" value="4">
                                    <label class="lg:p-2 w-full p-1 text-xs md:text-sm bg-white border border-gray-300 rounded-lg cursor-pointer focus:outline-none hover:bg-gray-50 peer-checked:ring-green-500 peer-checked:ring-2 peer-checked:border-transparent" for="emot4">
                                        Baik
                                    </label>
                                </div>
                            </div>
                            <div>
                                <div class="form-check">
                                    <input class="sr-only peer" type="radio" name="rate_fb" id="emot5" value="5">
                                    <label class="lg:p-2 p-1 text-xs md:text-sm bg-white border border-gray-300 rounded-lg cursor-pointer focus:outline-none hover:bg-gray-50 peer-checked:ring-green-500 peer-checked:ring-2 peer-checked:border-transparent" for="emot5">
                                        Suka Sekali
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="saran-kritik mt-5 w-full">
                            <label class="block text-slate-600" for="username">Masukkan Nama Pengirim<label>
                                            <input name="nm_fb" type="text" placeholder="Nama Anda"
                                                class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 shadow-sm">
                        </div>
                        <div class="saran-kritik mt-2 w-full">
                            <label class="block text-slate-600" for="username">Masukkan Kritik Dan Saran<label>
                                            <input name="isi_fb" type="text" placeholder="Kritik dan Saran Anda"
                                                class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 shadow-sm">
                        </div>
                        <div>
							<button type="submit" class="md:w-60 p-2 mt-4 text-white bg-blue-600 rounded-md hover:bg-blue-900 shadow-md">Kirim Masukkan</button>
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
			class="bottom-0 left-0 transition-all mt-0 flex justify-center items-center h-14 w-full bg-gradient-to-r from-[#3BACB6] to-[#82DBD8] shadow"
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
