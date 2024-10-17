<!-- bundle -->
<script src="{{ asset('assets/js/vendor.min.js')}}"></script>
<script src="{{ asset('assets/js/app.min.js')}}"></script>
<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

<script>
window.onscroll = function() {
    var navbar = document.getElementById("navbar");
    var scrollPosition = window.pageYOffset;
    
    if (scrollPosition > 300) {
        // Tambahkan background putih dan shadow ketika scroll lebih dari 300px
        navbar.classList.add("bg-white", "navbar-light", "shadow-sm");
        navbar.classList.remove("navbar-dark");
    } else {
        // Kembalikan ke style navbar gelap saat scroll di bawah 300px
        navbar.classList.remove("bg-white", "navbar-light", "shadow-sm");
        navbar.classList.add("navbar-dark");
    }
};

</script>
<script>
        document.addEventListener("DOMContentLoaded", function () {
            const sections = document.querySelectorAll("section");
            const navLinks = document.querySelectorAll(".nav-link");
    
            // Fungsi untuk menambahkan class 'active' ke link yang sesuai
            function updateActiveLink() {
                let currentSection = "";
    
                sections.forEach((section) => {
                    const sectionTop = section.offsetTop - 100; // Adjust according to your navbar height
                    if (scrollY >= sectionTop) {
                        currentSection = section.getAttribute("id");
                    }
                });
    
                navLinks.forEach((link) => {
                    link.classList.remove("active");
                    if (link.getAttribute("href") === `#${currentSection}`) {
                        link.classList.add("active");
                    }
                });
            }
    
            // Panggil updateActiveLink saat halaman digulir
            window.addEventListener("scroll", updateActiveLink);
        });
</script>