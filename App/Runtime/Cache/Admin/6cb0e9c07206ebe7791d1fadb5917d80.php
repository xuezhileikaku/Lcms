<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>jquery ui 测试</title>
<link rel="stylesheet" type="text/css" href="/manage/Public/css/jquery-ui.css" />


  </head>
  <body>
    <div id="tabs" class="ui-tabs ui-widget ui-widget-content ui-corner-all">
      <ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all" role="tablist">
        <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="tabs-1" aria-labelledby="ui-id-8" aria-selected="false" aria-expanded="false"><a href="#tabs-1" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-8">First</a></li>
        <li class="ui-state-default ui-corner-top ui-tabs-active ui-state-active" role="tab" tabindex="0" aria-controls="tabs-2" aria-labelledby="ui-id-9" aria-selected="true" aria-expanded="true"><a href="#tabs-2" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-9">Second</a></li>
        <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="tabs-3" aria-labelledby="ui-id-10" aria-selected="false" aria-expanded="false"><a href="#tabs-3" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-10">Third</a></li>
      </ul>
      <div id="tabs-1" aria-labelledby="ui-id-8" class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel" aria-hidden="true" style="display: none;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
      <div id="tabs-2" aria-labelledby="ui-id-9" class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel" aria-hidden="false" style="display: block;">Phasellus mattis tincidunt nibh. Cras orci urna, blandit id, pretium vel, aliquet ornare, felis. Maecenas scelerisque sem non nisl. Fusce sed lorem in enim dictum bibendum.</div>
      <div id="tabs-3" aria-labelledby="ui-id-10" class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel" aria-hidden="true" style="display: none;">Nam dui erat, auctor a, dignissim quis, sollicitudin eu, felis. Pellentesque nisi urna, interdum eget, sagittis et, consequat vestibulum, lacus. Mauris porttitor ullamcorper augue.</div>
    </div>
    <script type="text/javascript" src="/manage/Public/js/jquery.js"></script>
    <script type="text/javascript" src="/manage/Public/js/jquery-ui.min.js"></script>
    <script type="text/javascript">


$( "#accordion" ).accordion();



var availableTags = [
"ActionScript",
"AppleScript",
"Asp",
"BASIC",
"C",
"C++",
"Clojure",
"COBOL",
"ColdFusion",
"Erlang",
"Fortran",
"Groovy",
"Haskell",
"Java",
"JavaScript",
"Lisp",
"Perl",
"PHP",
"Python",
"Ruby",
"Scala",
"Scheme"
];
$( "#autocomplete" ).autocomplete({
source: availableTags
});



$( "#button" ).button();
$( "#radioset" ).buttonset();



$( "#tabs" ).tabs();



$( "#dialog" ).dialog({
autoOpen: false,
width: 400,
buttons: [
  {
    text: "Ok",
    click: function() {
      $( this ).dialog( "close" );
    }
  },
  {
    text: "Cancel",
    click: function() {
      $( this ).dialog( "close" );
    }
  }
]
});

// Link to open the dialog
$( "#dialog-link" ).click(function( event ) {
$( "#dialog" ).dialog( "open" );
event.preventDefault();
});



$( "#datepicker" ).datepicker({
inline: true
});



$( "#slider" ).slider({
range: true,
values: [ 17, 67 ]
});



$( "#progressbar" ).progressbar({
value: 20
});



$( "#spinner" ).spinner();



$( "#menu" ).menu();



$( "#tooltip" ).tooltip();




// Hover states on the static widgets
$( "#dialog-link, #icons li" ).hover(
function() {
  $( this ).addClass( "ui-state-hover" );
},
function() {
  $( this ).removeClass( "ui-state-hover" );
}
);

    </script>
  </body>
</html>