// require('bootstrap');

windowSize();
showArticle(1);

function showArticle(articleID)
{
    for(i = 1; i <= 12; i++)
    {
        if(i === articleID)
        {
            document.getElementById(i).style.display = 'block';
        }
        else
        {
            document.getElementById(i).style.display = 'none';
        }
    }
}

function windowSize() {
    var x1 = document.body.clientWidth;
    var x2;
    if (document.getElementById('sideNavigation').style.width === '250px' || document.getElementById('sideNavigation').style.width === '') {
        x2 = 250;
    }
    else {
        x2 = 0;
    }
    var x3 = (x1-x2)+'px';
    document.getElementById('main').style.width = x3;
}

function openNav() {
    var x1 = document.body.clientWidth;
    var x2;
    if (document.getElementById('sideNavigation').style.width === '250px' || document.getElementById('sideNavigation').style.width === '') {
        document.getElementById('sideNavigation').style.width = '0px';
        document.getElementById('main').style.marginLeft = '0px';
        x2 = 0;
    }
    else {
        document.getElementById('sideNavigation').style.width = '250px';
        document.getElementById('main').style.marginLeft = '250px';
        x2 = 250;
    }
    var x3 = (x1-x2)+'px';
    document.getElementById('main').style.width = x3;
}

function AddDocument() {
    var x = document.getElementById('newDocumentWindow');
    x.style.display = 'block';
}

function Display() {
    var x = document.getElementById('newDocumentWindow');
    x.style.display = 'block';
}
function GoBack() {
    var x = document.getElementById('newDocumentWindow');
    x.style.display = 'none';
}

// function ShowMore() {
//     var x = document.getElementById('options');
//     x.style.display = 'block';
//     document.getElementById('newDocumentWindow').style.height = "700px";
//     document.getElementById('newDocumentWindow').style.width = "500px";
// }