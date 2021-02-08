<nav>
    <!-- Logo och meny finns i nav -->
    <ul>
        <a href="home/">Home (Don't Click)</a>
        <a href="projekt1/">Projekt 1 (Don't Click)</a>
        <a href="projekt2/">Projekt 2 (Don't Click)</a>
    </ul>
</nav>
<script>
// Ifall man behöver en current page styling
if (location.href == "/projekt1") {
    document.getElementByTagName("nav")[0].children[2].style = "text-decoration:underline";
}
</script>

