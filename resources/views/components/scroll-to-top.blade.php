<!-- Floating Scroll-to-Top Button -->
<button id="scrollToTopBtn" onclick="scrollToTop()" class="fixed bottom-4 left-4 bg-secondary-500 text-white rounded-full p-3 shadow-lg" style="display: none;">
    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" class="fill-text-950"><path d="M440-160v-487L216-423l-56-57 320-320 320 320-56 57-224-224v487h-80Z"/></svg>
</button>

<!-- JavaScript to show/hide scroll-to-top button -->
<script>
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
        var scrollToTopBtn = document.getElementById("scrollToTopBtn");

        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            scrollToTopBtn.style.display = "block";
        } else {
            scrollToTopBtn.style.display = "none";
        }
    }

    function scrollToTop() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }
</script>