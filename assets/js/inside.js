document.addEventListener('DOMContentLoaded', () => {
    windowSize();
    showArticle(1);
});

function showArticle(articleID) {
    for (var i = 1; i <= 12; i++) {
        var x = document.getElementById(i);
        if (i === articleID) {
            x.style.display = 'block';
            if (document.body.clientWidth < 1024) {
                document.getElementById('sideNavigation').style.visibility = 'hidden';
            }
            document.getElementById('sideNavigation').scrollTop = 0;
        } else {
            x.style.display = 'none';
        }
    }
    var rows = document.getElementById('smallTable').getElementsByTagName('tr').length;
    for (var i = 1; i <= rows; i++) {
        var x = document.getElementById('displayMoreData' + i);
        var y = document.getElementById('imgClickAndChange' + i);
        x.style.display = 'none';
        y.src = 'images/show-more-button.png';
        y.title = 'Rodyti daugiau';
    }
}

function windowSize() {
    var x1 = document.body.clientWidth;
    var x2;
    if (x1 >= 1024) {
        if (document.getElementById('sideNavigation').style.width === '250px' || document.getElementById('sideNavigation').style.width === '') {
            x2 = 250;
        } else {
            x2 = 0;
        }
        var x3 = x1 - x2;
        document.getElementById('main').style.marginLeft = x2 + 'px';
        document.getElementById('main').style.width = x3 + 'px';
        document.getElementById('sideNavigation').style.visibility = 'visible';
    } else {
        document.getElementById('main').style.marginLeft = '0px';
        document.getElementById('main').style.width = x1 + 'px';
        document.getElementById('sideNavigation').style.visibility = 'hidden';
        document.getElementById('sideNavigation').scrollTop = 0;
    }
    if (document.body.clientWidth >= 992) {
        document.getElementById('searchForm').style.display = "inline-block";
        document.getElementById('searchForm').style.marginLeft = '-4px';
        document.getElementById('searchForm').style.width = '520px';
        document.getElementById('searchInput').style.width = '500px';
    } else if (document.body.clientWidth < 992) {
        document.getElementById('searchForm').style.display = 'none';
    }
}

function openNav() {
    var x1 = document.body.clientWidth;
    var x2;
    if (x1 >= 1024) {
        if (document.getElementById('sideNavigation').style.width === '250px' || document.getElementById('sideNavigation').style.width === '') {
            x2 = 0;
        } else {
            x2 = 250;
        }
        var x3 = x1 - x2;
        document.getElementById('main').style.marginLeft = x2 + 'px';
        document.getElementById('main').style.width = x3 + 'px';
        document.getElementById('sideNavigation').style.width = x2 + 'px';
    } else {
        document.getElementById('main').style.marginLeft = '0px';
        document.getElementById('main').style.width = x1 + 'px';
        document.getElementById('sideNavigation').style.width = '250px';
        document.getElementById('sideNavigation').style.visibility = 'visible';

        var sideNavigation = document.getElementById('sideNavigation');

        window.onclick = function(event) {
            if (event.pageX > 250 && document.body.clientWidth < 1024) {

                sideNavigation.style.visibility = 'hidden';
            }
        }
    }
    document.getElementById('sideNavigation').scrollTop = 0;
}

function addDocument() {
    var x = document.getElementById('newDocumentWindow');
    x.style.display = 'block';
}

function display() {
    var x = document.getElementById('newDocumentWindow');
    x.style.display = 'block';
}

function goBack() {
    var x = document.getElementById('newDocumentWindow');
    x.style.display = 'none';
}

function toggle(i) {
    var x = document.getElementById('displayMoreData' + i);
    var y = document.getElementById('imgClickAndChange' + i);
    if (x.style.display === 'none' || x.style.display === '') {
        x.style.display = 'table-row';
        y.src = 'images/show-less-button.png';
        y.title = 'Rodyti mažiau';
    } else {
        x.style.display = 'none';
        y.src = 'images/show-more-button.png';
        y.title = 'Rodyti daugiau';
    }
}

function displaySearchInput() {
    var x = document.getElementById('searchForm');
    x.style.display = 'inline-block';
    var y = document.getElementById('searchInput');
    var count = 0;
    if (document.body.clientWidth < 600) {
        x.style.marginLeft = '-130px';
        x.style.width = '230px';
        y.style.width = '200px';
    } else if (document.body.clientWidth >= 600 && document.body.clientWidth < 992) {
        x.style.marginLeft = '-260px';
        x.style.width = '400px';
        y.style.width = '370px';
    } else if (document.body.clientWidth >= 992) {
        x.style.marginLeft = '-4px';
        x.style.width = '520px';
        y.style.width = '500px';
    }
    window.onresize = function () {
        windowSize();
    }
}