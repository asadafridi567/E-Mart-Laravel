function openSearch() {
    var searchCard = document.getElementById("searchCard");
    searchCard.style.display = "block";
    var navbar = document.getElementById("navbar");
    navbar.style.display = "none";
    var line = document.getElementById("line");
    line.style.display = "none";

    sessionStorage.setItem('searchState', 'open');
}

function closeSearch() {
    var searchCard = document.getElementById("searchCard");
    searchCard.style.display = "none";
    var navbar = document.getElementById("navbar");
    navbar.style.display = "flex";
    var line = document.getElementById("line");
    line.style.display = "block";

    sessionStorage.setItem('searchState', 'closed');
}
