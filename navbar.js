window.addEventListener("scroll", function() {
    if (window.scrollY > 150) {
      // Ketika pengguna telah menggulir ke bawah sejauh 100px, latar belakang akan berubah.
      document.querySelector(".sticky-navbar").style.background = "rgba(9, 64, 103, 1)";
    } else {
      // Kembali ke latar belakang awal jika scroll ke atas.
      document.querySelector(".sticky-navbar").style.background = "rgba(0, 0, 0, 0.0)";
    }
  });