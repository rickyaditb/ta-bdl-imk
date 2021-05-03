<!--
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
            document.getElementById("sidenav-logo").style.opacity = "1";
            document.getElementById("sidenav-textx").style.opacity = "0";
        } else {
            var i;
            xs = document.querySelectorAll(".sidenav-text");
            for (i = 0; i < xs.length; i++) {
                xs[i].style.opacity = '0';
            }
            x.style.width = "70px";
            document.getElementById("wrapper").style.gridTemplateColumns = "70px 1fr";
            document.getElementById("sidenav-logo").style.opacity = "0";
            document.getElementById("sidenav-textx").style.opacity = "1";
        }
    }
</script>
-->
<script>
    var button = document.querySelector("#tombol");
    var x = document.getElementById("sidenav");
    button.addEventListener("click", function() {
        var content = document.querySelector(".right-content");
        if (content.classList.contains("animate")) {
            content.classList.remove("animate");
            x.style.width = "220px";
            
            var i;
            xs = document.querySelectorAll(".sidenav-text");
            for (i = 0; i < xs.length; i++) {
                xs[i].style.opacity = '1';
            }
            document.getElementById("sidenav-logo").style.opacity = "1";
            document.getElementById("sidenav-textx").style.opacity = "0";
            document.getElementById("wrapper").style.gridTemplateColumns = "220px 1fr";
        }

        else{
            content.classList.add("animate");
            xs = document.querySelectorAll(".sidenav-text");
            for (i = 0; i < xs.length; i++) {
                xs[i].style.opacity = '0';
            }
            
            x.style.width = "70px";
            document.getElementById("wrapper").style.gridTemplateColumns = "70px 1fr";
            document.getElementById("sidenav-logo").style.opacity = "0";
            document.getElementById("sidenav-textx").style.opacity = "1";
        }
    });
</script>