                </div>
            </div>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; ZieBukuTamu 2024</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#sidebarToggleTop').on('click', function() {
            $('.sidebar').toggleClass('show');
        });
        $('#sidebarToggle').on('click', function() {
            $('body').toggleClass('sidebar-toggled');
            $('.sidebar').toggleClass('toggled');
        });
        $(document).on('click', function(e) {
            if ($(window).width() < 768) {
                if (!$(e.target).closest('.sidebar, #sidebarToggleTop').length) {
                    $('.sidebar').removeClass('show');
                }
            }
        });
        $(window).scroll(function() {
            if ($(this).scrollTop() > 100) {
                $('.scroll-to-top').fadeIn();
            } else {
                $('.scroll-to-top').fadeOut();
            }
        });
        $('.scroll-to-top').click(function() {
            $('html, body').animate({scrollTop: 0}, 800);
            return false;
        });
    });
    function konfirmasi_hapus() {
        return confirm('Apakah Anda yakin ingin menghapus data ini?');
    }
    function setIdPassword(id) {
        $('#id_user_password').val(id);
    }
    setTimeout(function() {
        $('.alert').fadeOut('slow');
    }, 3000);
    </script>
</body>
</html>
