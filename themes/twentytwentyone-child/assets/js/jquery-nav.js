"use strict";

(function ($) { 
//Untermenü in der Nav als Toggle Button bei Mouseover/click öffnen oder schließen
$(document).ready(function () {
    if (window.matchMedia('(min-width: 950px)').matches) {
    $(".menu-item-has-children")
      .mouseover(function () {
        $(".sub-menu").show(300);
      });
  }else {
    $(".menu-item-has-children")
    .click(function () {
      $(".sub-menu").toggle(300);
    });
  }
  });
  
  //Untermenü in der Nav bei Mouseleave schließen
  $(document).ready(function () {
    if (window.matchMedia('(min-width: 950px)').matches) {
    $(".menu-item-has-children")
      .mouseleave(function () {
        $(".sub-menu").hide(300);
      });
  }});

  //Pfeil zu Menüpunkt mit Untermenüs hinzufügen
  $(document).ready(function () {
    if (window.matchMedia('(min-width: 950px)').matches) {
    $(".sub-menu")
    .before('<i class="arrow"></i>');
  }});

 }(jQuery)); 