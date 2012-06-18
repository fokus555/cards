<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <link href="style.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="jquery-1.7.2.js"></script>
        <script type="text/javascript">
    $(document).ready(function(){       // по окончанию загрузки страницы
        
    $('#xml').click(function(){
        $('#results').load('getcardxml.php')// вешаем на клик по элементу xml
        $.post('getcardxml.php', {}, function(xml){  // загрузку XML из файла getcardxml.php   
            for (i=0;i<4;i++){
            $(xml).find('card'+i).each(function(){
                
                $('#card'+i).html('');
                $('#card'+i).unbind( "click" );
                $('#card'+i).click(function (){var a = $(this).html();var b = $('#card3').html();
                  $('#card3').html(a);$(this).html(b);$('#card3').prevAll().css('opacity','0.8')});
                $('#card'+i).append('<b> '   + $(this).find('name').text() + '</b><br/>')
                               .append('Tel: ' + $(this).find('tel').text() + '<br/>')
                               .append('<a href='    + $(this).find('website').text() + '>' + $(this).find('website').text() + '</a><br/>');
                               
                });}
        }, 'xml');                                     // указываем явно тип данных
    })




    $('#json').click(function(){
    $('#results').load('getcardjson.php')
            $.getJSON('getcardjson.php',  function(json){  
            
              
            $.each(json, function(i,item){
               $('#card'+i).html('');
               $('#card'+i).unbind( "click" );
//              $('#card'+i).click(function (){$(this).css('z-index','5');alert('click')});
              $('#card'+i).click(function (){var a = $(this).html();var b = $('#card3').html();
                  $('#card3').html(a);$(this).html(b);$('#card3').prevAll().css('opacity','0.8')});
            $('#card'+i).append('<b> '      + item['name'] + '</b><br/>')
                        .append('tel: '    + item['tel'] + '<br/>')
                        .append('<a href=' + item['website'] + '>' + item['website'] + '</a><br/>')

        }); 
    });               
    
   }); 
});
        </script>
    </head>
    <body>
    <h1>My cards</h1>

       
         <div id="card0"></div>
         <div id="card1"></div>
         <div id="card2"></div>
         <div id="card3"></div>
         
                 
        <div class="empty"></div>
        <div id="xml"><input type="radio" name="rb" value="XML" />XML</div>
        <div id="json"><input type="radio" name="rb" value="JSON" />JSON</div>
            
         
        <div id="results">div results</div>
    </body>
</html>
