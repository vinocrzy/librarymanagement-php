// JavaScript Document
function dashboard()
{
	document.getElementById("addPanel").style.display='none';
	document.getElementById("allRegisteredStudent").style.display='none';
	document.getElementById("damage").style.display='none';
	document.getElementById("dashboard").style.display='block';
	document.getElementById("search").style.display='none';
	document.getElementById("returnBooksHisory").style.display='none';
	document.getElementById("issueBooks").style.display='none';
	document.getElementById("settings").style.display='none';
	document.getElementById("listAllBooks").style.display='none';
	document.getElementById("ser").style.display='none';
	document.getElementById("rBooks").style.display='none';
	
	
	
}

function listAllBooks()
{
	document.getElementById("addPanel").style.display='none';
	document.getElementById("allRegisteredStudent").style.display='none';
	document.getElementById("damage").style.display='none';
	document.getElementById("dashboard").style.display='none';
	document.getElementById("search").style.display='none';
	document.getElementById("returnBooksHisory").style.display='none';
	document.getElementById("issueBooks").style.display='none';
	document.getElementById("settings").style.display='none';
	document.getElementById("listAllBooks").style.display='block';
	document.getElementById("ser").style.display='none';
	document.getElementById("rBooks").style.display='none';
	
}

function search()
{
	document.getElementById("addPanel").style.display='none';
	document.getElementById("allRegisteredStudent").style.display='none';
	document.getElementById("damage").style.display='none';
	document.getElementById("dashboard").style.display='none';
	document.getElementById("search").style.display='block';
	document.getElementById("returnBooksHisory").style.display='none';
	document.getElementById("issueBooks").style.display='none';
	document.getElementById("settings").style.display='none';
	document.getElementById("listAllBooks").style.display='none';
	document.getElementById("ser").style.display='none';
	document.getElementById("rBooks").style.display='none';
	
}

function issueBooks()
{
	document.getElementById("addPanel").style.display='none';
	document.getElementById("allRegisteredStudent").style.display='none';
	document.getElementById("damage").style.display='none';
	document.getElementById("dashboard").style.display='none';
	document.getElementById("search").style.display='none';
	document.getElementById("returnBooksHisory").style.display='none';
	document.getElementById("issueBooks").style.display='block';
	document.getElementById("settings").style.display='none';
	document.getElementById("listAllBooks").style.display='none';
	document.getElementById("ser").style.display='none';
	document.getElementById("rBooks").style.display='none';
	
}

function returnBooksHisory()
{
	document.getElementById("addPanel").style.display='none';
	document.getElementById("allRegisteredStudent").style.display='none';
	document.getElementById("damage").style.display='none';
	document.getElementById("dashboard").style.display='none';
	document.getElementById("search").style.display='none';
	document.getElementById("returnBooksHisory").style.display='block';
	document.getElementById("issueBooks").style.display='none';
	document.getElementById("settings").style.display='none';
	document.getElementById("listAllBooks").style.display='none';
	document.getElementById("ser").style.display='none';
	document.getElementById("rBooks").style.display='none';
	
}

function addPanel()
{
	document.getElementById("addPanel").style.display='block';
	document.getElementById("allRegisteredStudent").style.display='none';
	document.getElementById("damage").style.display='none';
	document.getElementById("dashboard").style.display='none';
	document.getElementById("search").style.display='none';
	document.getElementById("returnBooksHisory").style.display='none';
	document.getElementById("issueBooks").style.display='none';
	document.getElementById("settings").style.display='none';
	document.getElementById("listAllBooks").style.display='none';
	document.getElementById("ser").style.display='none';
	document.getElementById("rBooks").style.display='none';
	
}

function allRegisteredStudent()
{
	document.getElementById("addPanel").style.display='none';
	document.getElementById("allRegisteredStudent").style.display='block';
	document.getElementById("damage").style.display='none';
	document.getElementById("dashboard").style.display='none';
	document.getElementById("search").style.display='none';
	document.getElementById("returnBooksHisory").style.display='none';
	document.getElementById("issueBooks").style.display='none';
	document.getElementById("settings").style.display='none';
	document.getElementById("listAllBooks").style.display='none';
	document.getElementById("ser").style.display='none';
	document.getElementById("rBooks").style.display='none';
	
}

function damage()
{
	document.getElementById("addPanel").style.display='none';
	document.getElementById("allRegisteredStudent").style.display='none';
	document.getElementById("damage").style.display='block';
	document.getElementById("dashboard").style.display='none';
	document.getElementById("search").style.display='none';
	document.getElementById("returnBooksHisory").style.display='none';
	document.getElementById("issueBooks").style.display='none';
	document.getElementById("settings").style.display='none';
	document.getElementById("listAllBooks").style.display='none';
	document.getElementById("ser").style.display='none';
	document.getElementById("rBooks").style.display='none';
	
}
function settings()
{
	document.getElementById("addPanel").style.display='none';
	document.getElementById("allRegisteredStudent").style.display='none';
	document.getElementById("damage").style.display='none';
	document.getElementById("dashboard").style.display='none';
	document.getElementById("search").style.display='none';
	document.getElementById("returnBooksHisory").style.display='none';
	document.getElementById("issueBooks").style.display='none';
	document.getElementById("settings").style.display='block';
	document.getElementById("listAllBooks").style.display='none';
	document.getElementById("ser").style.display='none';
	document.getElementById("rBooks").style.display='none';
	
}


	
	


/*---------------------for Ajax-------------------------------*/

function showdept(str) {
	var str1 = document.getElementById("deptb").value;
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","getdept.php?q="+str1,true);
        xmlhttp.send();

    }
}
function showisu(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","getisu.php?q="+str,true);
        xmlhttp.send();
    }
}

function showid(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","getid.php?q="+str,true);
        xmlhttp.send();
    }
}

function memdept(str) {
	var str1 = document.getElementById("dept").value;
    if (str == "") {
        document.getElementById("vwd1").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("vwd1").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","memdept.php?q="+str1,true);
        xmlhttp.send();
    }
}


function memuser(str) {
    if (str == "") {
        document.getElementById("vwd1").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("vwd1").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","memuser.php?q="+str,true);
        xmlhttp.send();
    }
}



