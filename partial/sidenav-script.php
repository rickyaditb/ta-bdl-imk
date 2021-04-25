<script>
    document.getElementById("tombol").onclick = function() {
        resizeNav();
    };

    function resizeNav() {
        var x = document.getElementById("sidenav");
        if (x.style.width === "70px") {
            x.style.width = "220px";
            document.getElementById("wrapper").style.gridTemplateColumns = "220px 1fr";
            var i;
            xs = document.querySelectorAll(".sidenav-text");
            for (i = 0; i < xs.length; i++) {
                xs[i].style.opacity = '1';
            }
        } else {
            var i;
            xs = document.querySelectorAll(".sidenav-text");
            for (i = 0; i < xs.length; i++) {
                xs[i].style.opacity = '0';
            }
            x.style.width = "70px";
            document.getElementById("wrapper").style.gridTemplateColumns = "70px 1fr";
        }
    }
</script>