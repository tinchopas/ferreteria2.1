$(document).ready(function() {
    var rex = new RegExp("\\/[^\\/]+\\.\\w+($|\\?)");
    var match = rex.exec(location.pathname);
    if (match != null) {
        var anchor = 'a[href$="' + match[0].substring(1) + '"]';
        if ($('.menuinterno3').children().children(anchor).length > 0) {
            $('.menuinterno').show("slow");
            $('.menuinterno2').show("slow");
            $(anchor).parent().parent().show("slow");
            $(anchor).addClass("selectedMenuEntry");
            $("title").html($("title").html() + " | Cat&aacute;logo (" + $(anchor).parent().parent().siblings("a").html() + "/" + $(anchor).html() + ")");
        }
        if ($('.menuright').children().children(anchor).length > 0) {
            $(anchor).addClass("selectedMenuEntry");
            $("title").html($("title").html() + " | " + $(anchor).html());
        }
    }

    if (txtUserNameLogin != "" && txtPasswordLogin != "") {
        $(txtUserNameLogin).DefaultValue("usuario");
        $(txtPasswordLogin).DefaultValue("contrase\361a");
    }
    $("#txtNombreNewsletter").DefaultValue("nombre");
    $("#txtEmailNewsletter").DefaultValue("e-mail");


    $("#cajanews").find(".btnnews").find("a").find("img").click(function() {
        var nombre = $("#txtNombreNewsletter").attr("value");
        var email = $("#txtEmailNewsletter").attr("value");
        $.ajax({
            type: "POST",
            url: "Services/ServiciosPublicos.asmx/NewsletterSignUp",
            data: "{'nombre':'" + nombre + "','email':'" + email + "'}",
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(msg) {
                alert(msg.d);
            },
            error: function(xhr, status, error) {
                alert("Ha ocurrido un error al intentar inscribirlo a nuestro newsletter.");
            }
        });
    });

    /*******************************************
    *BEGINNING OF:                             *
    *Sección que maneja el menu de la izquierda*
    *******************************************/

//    $(".menuright, .menuinterno").find("a").click(function() {
//        prompt("erw", "efg");
//        if ($(this).siblings("ul").length > 0) {
//            $(this).parent().siblings().children("ul").each(function() {
//                $(this).hide("slow");
//            });
//            $(this).siblings("ul").slideToggle(600);
//            return false;
//        }
//    });
});

function odioIe6(obj) {
    if ($(obj).siblings("ul").length > 0) {
        $(obj).parent().siblings().children("ul").each(function() {
            $(this).hide("slow");
        });
        $(obj).siblings("ul").slideToggle(600);
        return false;
    }
}