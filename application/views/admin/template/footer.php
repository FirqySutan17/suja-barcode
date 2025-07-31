          </div>
        </main>
    </div>


    <script src="<?= asset('vendor/js/bootstrap.bundle.min.js') ?>">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"
        integrity="sha512-GWzVrcGlo0TxTRvz9ttioyYJ+Wwk9Ck0G81D+eO63BaqHaJ3YZX9wuqjwgfcV/MrB2PhaVX9DkYVhbFpStnqpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="<?= asset('vendor/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
    <script src="<?= asset('vendor/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>"></script>
    <script src="<?= asset('vendor/select2/js/select2.min.js') ?>"></script>
    <script src="<?= asset('js/main.js') ?>"></script>

    <script src="<?= asset('vendor/sweetalert2/sweetalert2.all.min.js') ?>"></script>
    <script>
        // toggle sidebar
        $nav = $('.main-nav');
        $header = $('.page-main-header');
        $toggle_nav_top = $('#sidebar-toggle');
        $toggle_nav_top.click(function() {
        $this = $(this);
        $nav = $('.main-nav');
        $nav.toggleClass('close_icon');
        $header.toggleClass('close_icon');
        });

        $( window ).resize(function() {
        $nav = $('.main-nav');
        $header = $('.page-main-header');
        $toggle_nav_top = $('#sidebar-toggle');
        $toggle_nav_top.click(function() {
            $this = $(this);
            $nav = $('.main-nav');
            $nav.toggleClass('close_icon');
            $header.toggleClass('close_icon');
        });
        });
    </script>

    <script>
        /* When the user clicks on the button, 
        toggle between hiding and showing the dropdown content */
        function newCusto() {
        document.getElementById("myDropdownNew").classList.toggle("show");
        }
        
        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
        if (!event.target.matches('.dropbtn-new')) {
            var dropdownsNew = document.getElementsByClassName("dropdown-content-new");
            var i;
            for (i = 0; i < dropdownsNew.length; i++) {
            var openDropdownNew = dropdownsNew[i];
            if (openDropdownNew.classList.contains('show')) {
                openDropdownNew.classList.remove('show');
            }
            }
        }
        }
    </script>
    <script>
        /* When the user clicks on the button, 
        toggle between hiding and showing the dropdown content */
        function ddNotification() {
        document.getElementById("myddNotification").classList.toggle("show");
        }
        
        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
        if (!event.target.matches('.dropbtn-notification')) {
            var dropdownsNotification = document.getElementsByClassName("dropdown-content-notification");
            var i;
            for (i = 0; i < dropdownsNotification.length; i++) {
            var openddNotification = dropdownsNotification[i];
            if (openddNotification.classList.contains('show')) {
                openddNotification.classList.remove('show');
            }
            }
        }
        }
    </script>

    <script>
        /* When the user clicks on the button, 
        toggle between hiding and showing the dropdown content */
        function ddProfile() {
        document.getElementById("myddProfile").classList.toggle("show");
        }
            
            // Close the dropdown if the user clicks outside of it
            window.onclick = function(event) {
            if (!event.target.matches('.dd-profile')) {
                var dropdownsProfile = document.getElementsByClassName("dropdown-content-profile");
                var i;
                for (i = 0; i < dropdownsProfile.length; i++) {
                var openddProfile = dropdownsProfile[i];
                if (openddProfile.classList.contains('show')) {
                    openddProfile.classList.remove('show');
                }
                }
            }
        }
    </script>

    <script>
        function sidebar_open() {
            var sideNav = document.getElementById("myNav");
            var mainNav = document.getElementById("main");
            document.getElementById("sidebarClose").style.display = "block";
            document.getElementById("sidebarOpen").style.display = "none";
            mainNav.classList.remove("close-main");
            mainNav.classList.add("open-main");
            sideNav.classList.remove("close-nav");
            sideNav.classList.add("open-nav");
            console.log('In Open');
        }
        function sidebar_close() {
            var sideNav = document.getElementById("myNav");
            var mainNav = document.getElementById("main");
            document.getElementById("sidebarOpen").style.display = "block";
            document.getElementById("sidebarClose").style.display = "none";
            mainNav.classList.remove("open-main");
            mainNav.classList.add("close-main");
            sideNav.classList.remove("open-nav");
            sideNav.classList.add("close-nav");
            console.log('In Close');
        }
    </script>
    <script>
        var dropdown = document.getElementsByClassName("dropdown-btn");
        var i;

        for (i = 0; i < dropdown.length; i++) {
            dropdown[i].addEventListener("click", function() {
                this.classList.toggle("active-dropdown");
                var dropdownContent = this.nextElementSibling;
                if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
                } else {
                dropdownContent.style.display = "block";
                }
            });
        }

        $(function () {
            $(".dropdown-btn").click(function (e) {
                e.preventDefault();
                $(".bx.bx-chevron-right").toggleClass("active-arrow");
            });
        });
    </script>

    <script>
         $(function() {
            $('#menu_access').select2({
                theme: 'bootstrap4',
                language: "en",
                // ajax: {
                //     url: "{{ route('roles.select') }}",
                //     dataType: 'json',
                //     delay: 250,
                //     processResults: function(data) {
                //         return {
                //             results: $.map(data, function(item) {
                //                 return {
                //                     text: item.name,
                //                     id: item.id
                //                 }
                //             })
                //         };
                //     }
                // }
            });
            $('#close_type').select2({
                theme: 'bootstrap4',
                language: "en",
                // ajax: {
                //     url: "{{ route('roles.select') }}",
                //     dataType: 'json',
                //     delay: 250,
                //     processResults: function(data) {
                //         return {
                //             results: $.map(data, function(item) {
                //                 return {
                //                     text: item.name,
                //                     id: item.id
                //                 }
                //             })
                //         };
                //     }
                // }
            });
            $('#collection_type').select2({
                theme: 'bootstrap4',
                language: "en",
                // ajax: {
                //     url: "{{ route('roles.select') }}",
                //     dataType: 'json',
                //     delay: 250,
                //     processResults: function(data) {
                //         return {
                //             results: $.map(data, function(item) {
                //                 return {
                //                     text: item.name,
                //                     id: item.id
                //                 }
                //             })
                //         };
                //     }
                // }
            });
        });
    </script>
</body>

</html>