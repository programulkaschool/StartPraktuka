jQuery( document ).ready(function() {
    console.log( "ready!" );

    jQuery('article').append('<p>Тестовий текст - jQuery append</p>');
    jQuery('article p').append('<b> b - jQuery append </b>');
    jQuery('article h1').append('<b> jQuery 3</b>');
    jQuery('p').remove();
    jQuery('article > p.clone-txt').append(jQuery('h1').clone());

    //Перемінні
    var p1 = 7;
    var p2 = 8;
    var p3, p4;
    //alert(Math.sqrt(p1)+'\nMath.floor() '+Math.floor(Math.sqrt(p1))+'\nMath.ceil() '+ Math.ceil(Math.sqrt(p1))+'\n Math.round() '+ Math.round(Math.sqrt(p1)));
/*
    $( "#button_click" ).on( "click", function() {
        console.log( $( this ).text() );
    });
*/
    //$( "body" ).on( "click", "#button_click", function() {
    $( "body" ).on( "keyup", "input", function() {
        console.log( $( this ).text() );

        var f1, f2, f3, f4, f5;

        f1 = jQuery('#inp1').val();
        f2 = jQuery('#inp2').val();

        f3 = f1 + f2;
        f4 = parseInt(f1) + parseInt(f2);
        console.log('No parseInt - inp1 '+f1 + ' inp2 ' + f2);
        console.log('parseInt - '+f4);
        txt_html(f1, f2, f4);
    });
    function txt_html(f1, f2, f4) {
        jQuery('#txt_calculator').html('No parseInt - inp1 '+ f1 + ' inp2 ' + f2 + '<br>parseInt - '+f4);
    }
    /*
    confirm("Press a button!");
    var person = prompt("Please enter your name", "Harry Potter");
    if (person != null) {
            jQuery('#txt_calculator').html("Hello " + person + "! How are you today?");
    }
*/











});