    <script src="/admin_iot/public/vendor/jquery/jquery.min.js"></script>
    <script src="/admin_iot/public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/admin_iot/public/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/admin_iot/public/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="/admin_iot/public/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="/admin_iot/public/js/demo/chart-area-demo.js"></script>
    <script src="/admin_iot/public/js/demo/chart-pie-demo.js"></script>

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <!-- <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Your Website 2021</span>
            </div>
        </div> -->
    </footer>
    <!-- End of Footer -->

    </div>
    </div>
    <script>
        const toggleButton = document.querySelector('#sidebarToggle');

        toggleButton.click();

        // get a reference to the element
        var element = document.getElementById('message');

        // set a timer to hide the element after 5 seconds (5000 milliseconds)
        setTimeout(function() {
            element.style.display = 'none';
        }, 4000);
    </script>
    </body>

    </html>