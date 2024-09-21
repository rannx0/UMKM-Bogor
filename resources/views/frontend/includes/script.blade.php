<!-- bundle -->
<script src="{{ asset('assets/js/vendor.min.js')}}"></script>
<script src="{{ asset('assets/js/app.min.js')}}"></script>
<script>
        window.onscroll = function() {
                var navbar = document.getElementById("navbar");
                if (window.pageYOffset > 300) {  // Ubah background saat scroll lebih dari 50px
                navbar.classList.add("bg-white", "navbar-light", "shadow-sm");
                navbar.classList.remove("navbar-dark");
                } else {
                navbar.classList.remove("bg-white", "navbar-light", "shadow-sm");
                navbar.classList.add("navbar-dark");
                }
        };
</script>