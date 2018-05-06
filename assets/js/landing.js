windowSize();
showArticle(1);

function showArticle(articleID) {
    for (var i = 1; i <= 12; i++) {
        var x = document.getElementById(i);
        if (i === articleID) {
            x.style.display = 'block';
            if (document.body.clientWidth < 1024) {
                document.getElementById('sideNavigation').style.visibility = 'hidden';
            }
        } else {
            x.style.display = 'none';
        }
    }
    var rows = document.getElementById('smallTable').getElementsByTagName('tr').length;
    for (var i = 1; i <= rows; i++) {
        var x = document.getElementById("displayMoreData" + i);
        var y = document.getElementById("imgClickAndChange" + i);
        x.style.display = "none";
        y.src = "images/show-more-button.png";
        y.title = "Rodyti daugiau";
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
    }
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
    var x = document.getElementById("displayMoreData" + i);
    var y = document.getElementById("imgClickAndChange" + i);
    if (x.style.display === "none" || x.style.display === '') {
        x.style.display = "table-row";
        y.src = "images/show-less-button.png";
        y.title = "Rodyti mažiau";
    } else {
        x.style.display = "none";
        y.src = "images/show-more-button.png";
        y.title = "Rodyti daugiau";
    }
}