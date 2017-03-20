$('#profile_menu').hide();
var visible = false;
var firstTime = false;
var cantPhoto = 1;

$('#profile-icon-menu').click(function () {
    $("#profile_menu").slideToggle();
});

function uploadLogo() {
    $('#logoInput').click();
}


function nombreLogo() {
    $('#nombreLogo').html($("#logoInput")[0].files[0].name);
}


function initDatepicker() {
    $('#startDate').datepicker();
    $('#endDate').datepicker();
}


function clearPost() {
    $("#iconFb a").removeClass('iconFbHover');
    $("#iconTw a").removeClass('iconTwHover');
    $("#iconIn a").removeClass('iconInHover');
    $('img#iconHub').removeClass('iconHubHover');
}


function signup() {
    document.getElementById("login-form").action = "signup";
    document.getElementById("login-form").submit();
}

function loadForm(id, form) {
    if (!firstTime) {
        image = document.getElementById(id);
        testAnim('fadeOut', image.id);
        testAnim('fadeOut', 'show_front');
        setTimeout(function () {
            a = 9;
        }, 5000);

        padre = image.parentNode;
        padre2 = padre.parentNode;
        padre2.removeChild(padre);
        testAnim('fadeIn', 'show_front');
        document.getElementById('form_' + form).style.display = 'inline';
        testAnim('fadeInRight col-md-6', 'form_' + form);
        //document.getElementById('main_logo').style.visibility = 'visible';
        testAnim('main col-md-12 fadeInRight', 'main_logo');
        firstTime = true;
    } else {
        document.getElementById('form_professional').style.display = 'none';
        document.getElementById('form_business').style.display = 'none';
        document.getElementById('form_user').style.display = 'none';
        document.getElementById('form_' + form).style.display = 'inline';
        testAnim('fadeInRight col-md-6', 'form_' + form);
    }
    //$('.fullscreen-bg').removeClass().addClass('fullscreen-bg-' + form);
    //$('.fullscreen-bg-professional').removeClass().addClass('fullscreen-bg-' + form);
    //$('.fullscreen-bg-business').removeClass().addClass('fullscreen-bg-' + form);
    //$('.fullscreen-bg-user').removeClass().addClass('fullscreen-bg-' + form);

    $('#div_professional').removeClass().addClass(' col-md-3');
    $('#div_business').removeClass().addClass(' col-md-3');
    $('#div_user').removeClass().addClass(' col-md-3');
    $('#div_' + form).removeClass().addClass(' col-md-4');
}

function addSkill() {
    var val = document.getElementById('inputAddSkill').value;
    document.getElementById('inputAddSkill').value = "";
    if (!val) {

    } else {
        var tr = document.createElement("tr");
        var td1 = document.createElement("td");
        var td2 = document.createElement("td");
        var texto = document.createTextNode(val);
        var texto2 = document.createTextNode("Delete");
        var count = document.getElementById('tbody').childElementCount;
        td2.setAttribute("onclick", "deleteSkill(" + count + ")");
        tr.setAttribute("id", "row_" + count);
        td1.appendChild(texto);
        td2.appendChild(texto2);
        tr.appendChild(td1);
        tr.appendChild(td2);
        document.getElementById('tbody').appendChild(tr);

        var input = document.createElement("input");
        input.setAttribute("type", "text");
        input.setAttribute("style", "display: none");

        input.setAttribute("name", "skill" + count);
        input.setAttribute("id", "skill" + count);
        input.setAttribute("value", val);

        document.getElementById('formSkill').appendChild(input);
    }
}
function deleteSkill(x) {
    var p = document.getElementById('row_' + x);
    document.getElementById('tbody').removeChild(p);
    //var padre = p.parentNode();
    //padre.removeChild(p);

    var s = document.getElementById('skill' + x);
    document.getElementById('formSkill').removeChild(s);
}
function addPhoto() {
    document.getElementById('inputPhoto').value;
    var p = document.getElementById('inputPhoto');
    var padrep = p.parentNode();
    var p1 = document.getElementById('inputPhoto' + cantPhoto);
    var padrep1 = p1.parentNode();

    // padrep.app
}

function loadForm1(p) {

    if (p === 'professional') {


        document.getElementById("img_form").attributes[visible] = false;
        delete(document.getElementById("img_front"))
        ;
        document.getElementById("img_front").class = "otro " + "object-non-visible";
        alert(document.getElementById("img_front").class);

    } else {

    }
}
;
function ShowPhoto(fileUrl) {
    console.log(fileUrl);
    var reader = new FileReader();
    reader.readAsDataURL(fileUrl);
    reader.onload = function (e) {
        //$('photoPerfil').attr('display','block');
        //$('photoPerfil').attr('src',e.target.result);
        document.getElementById('photoPerfil').src = e.target.result;//'photoPerfil'
        document.getElementById('photoPerfil').style.display = 'block';//'photoPerfil'
    };
}

function cargarNotificaciones(r) {

    var datos = new FormData();
    datos.append('user', r);
    var solicitud;

    if (window.XMLHttpRequest) {
        solicitud = new XMLHttpRequest();
    } else {
        solicitud = new ActiveXObject("Microsoft.XMLHTTP");
    }

    solicitud.onreadystatechange = function () {
        if (solicitud.readyState === 4) {
            if (solicitud.status === 200) {
                //document.getElementById('div').innerHTML(solicitud.responseXML);
                alert(solicitud.responseText);
            }
        }
    };

    var url = "/Proyecto/web/app_dev.php/nn";
    solicitud.open("POST", url, true);
    solicitud.send(datos);
}
;
// window.onload(cargarNotificaciones('balmarales'));

//window.onload(newNotificationInterval);
$(function () {
    newNotificationInterval();
});

function newNotificationInterval() {
    newNotification();
    setInterval(newNotification, 60000);
}

function newNotification() {

//    var datos = new FormData();
//    datos.append('user', 'balmarales');
    var solicitud;

    if (window.XMLHttpRequest) {
        solicitud = new XMLHttpRequest();
    } else {
        solicitud = new ActiveXObject("Microsoft.XMLHTTP");
    }

    solicitud.onreadystatechange = function () {

        if (solicitud.readyState === 4) {

            if (solicitud.status === 200) {

                var documento_xml = solicitud.responseXML;
                var root = documento_xml.getElementsByTagName("answer")[0];
                var count = root.getElementsByTagName("count")[0];
                var m = count.firstChild.nodeValue;
                document.getElementById('bottonNotifications').textContent = "";
                var i = document.createElement("i");
                
                i.className = "fa fa-bell fa-fw";
                document.getElementById('bottonNotifications').appendChild(i);
                var btext = document.createTextNode("Notifications (" + m + ")");
                document.getElementById('bottonNotifications').appendChild(btext);
                 //$("#bottonNotifications").text("Notifications (" + m + ")");
                //document.getElementById('bottonNotifications').textContent = "Notifications (" + m + ")";
               
                var n = root.getElementsByTagName("notification");
                var t = document.getElementById('tbodyNotification');
                var table = document.getElementById('tableNotification');
                table.removeChild(t);
                var tt = document.createElement("tbody");
                tt.id = "tbodyNotification";
                table.appendChild(tt);

                for (var i = 0; i < m; i++) {

                    var tr = document.createElement("tr");
                    var td1 = document.createElement("td");
                    td1.className = "quantity";
                    var td2 = document.createElement("td");
                    td2.className = "product";
                    var td3 = document.createElement("td");
                    td3.className = "amount";
                    var a = document.createElement("a");
                    a.href = "";// ir a notificaciones.
                    a.style.display = "block";

//                    var img = document.createElement("img");
                    var img = new Image;
                    img.className = "img-notification";

                    img.src = BaseUrl + "../bundles/hub/perfil/" + n[i].getElementsByTagName("perfil")[0].firstChild.nodeValue;

                    var span = document.createElement("span");
                    span.class = "small";

                    var texto1 = document.createTextNode(n[i].getElementsByTagName("date")[0].firstChild.nodeValue);
                    var texto2 = document.createTextNode(n[i].getElementsByTagName("emitter")[0].firstChild.nodeValue);
                    var texto3 = document.createTextNode(n[i].getElementsByTagName("message")[0].firstChild.nodeValue);

                    td1.appendChild(img);
                    a.appendChild(texto2);
                    td2.appendChild(a);
                    span.appendChild(texto3);
                    td2.appendChild(span);
                    td3.appendChild(texto1);
                    tr.appendChild(td1);
                    tr.appendChild(td2);
                    tr.appendChild(td3);

                    document.getElementById('tbodyNotification').appendChild(tr);
                }

                //var mensaje = mensajes.firstChild.nodeValue;
                //alert(mensaje);
                //document.getElementById('div').innerHTML(solicitud.responseXML);
                //alert(solicitud.responseText);
            } else {

            }
        }
    };

    var url = "/Proyecto/web/app_dev.php/new_notification";
    //var url = BaseUrl;
    solicitud.open("GET", url, true);
    solicitud.send(null);
}

function sendMessage(e, r, url) {
    var m = document.getElementById('message').value;
    var datos = new FormData();
    datos.append('message', m);
    datos.append('emitter', e);
    datos.append('receiver', r);
    var solicitud = new XMLHttpRequest();
    solicitud.onreadystatechange = function () {
        if (solicitud.readyState === 4) {
            if (solicitud.status === 200) {
                alert(solicitud.responseText);
            }
        }
    };

//    console.log(url);
    // var url = "/Proyecto/web/app_dev.php/ajax";
    solicitud.open("POST", url, true);
    solicitud.send(datos);
    document.getElementById('message').value = "";
}
;

function testAnim(x, id) {
    $('#' + id).removeClass().addClass(x + ' animated');
}
;



function MM_preloadImages() { //v3.0
    var d = document;
    if (d.images) {
        if (!d.MM_p)
            d.MM_p = new Array();
        var i, j = d.MM_p.length, a = MM_preloadImages.arguments;
        for (i = 0; i < a.length; i++)
            if (a[i].indexOf("#") !== 0) {
                d.MM_p[j] = new Image;
                d.MM_p[j++].src = a[i];
            }
    }
}

function MM_swapImgRestore() { //v3.0
    var i, x, a = document.MM_sr;
    for (i = 0; a && i < a.length && (x = a[i]) && x.oSrc; i++)
        x.src = x.oSrc;
}

function MM_findObj(n, d) { //v4.01
    var p, i, x;
    if (!d)
        d = document;
    if ((p = n.indexOf("?")) > 0 && parent.frames.length) {
        d = parent.frames[n.substring(p + 1)].document;
        n = n.substring(0, p);
    }
    if (!(x = d[n]) && d.all)
        x = d.all[n];
    for (i = 0; !x && i < d.forms.length; i++)
        x = d.forms[i][n];
    for (i = 0; !x && d.layers && i < d.layers.length; i++)
        x = MM_findObj(n, d.layers[i].document);
    if (!x && d.getElementById)
        x = d.getElementById(n);
    return x;
}

function MM_swapImage() { //v3.0
    var i, j = 0, x, a = MM_swapImage.arguments;
    document.MM_sr = new Array;
    for (i = 0; i < (a.length - 2); i += 3)
        if ((x = MM_findObj(a[i])) !== null) {
            document.MM_sr[j++] = x;
            if (!x.oSrc)
                x.oSrc = x.src;
            x.src = a[i + 2];
            x.o;
        }
}



