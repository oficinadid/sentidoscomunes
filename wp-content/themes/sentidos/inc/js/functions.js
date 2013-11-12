(function ($) {
  "use strict";

  if ($('#single').hasClass('category-reportajes-graficos')) {
    $('body').addClass('category-reportajes-graficos');
  }

  $('.search-toggle a').on('click', function () {
    $('#search_form').toggleClass('hidden');
    $('body').toggleClass('searching');
    $(this).toggleClass('pressed');
    return false;
  });

  $('.edition article').on('click', function () {
    var link = $(this).find('.img').attr('href');
    location.href = link;
    return false;

  });

  function expandirMenu() {
    $(this).parent().addClass('open');
    $(this).parent().find('ul').addClass('open');
    $(this).addClass('open');
    return false;
  }

  function contraerMenu() {
    $(this).parent().removeClass('open');
    $(this).parent().find('ul').removeClass('open');
    $(this).removeClass('open');
    return false;
  }

  $(".this_week").hoverIntent(expandirMenu, contraerMenu);

  function getUrlVars() {
    var vars, hash, hashes;
    vars = [], hash;
    hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++) {
      hash = hashes[i].split('=');
      vars.push(hash[0]);
      vars[hash[0]] = hash[1];
    }
    return vars;
  }

  var search = getUrlVars()["s"];
  var btn = getUrlVars()["submit"];
  if ( search != '' && btn == 'Buscar') {
    $('#search_form').removeClass('hidden');
  };

  $('.menu.mobile .menu-main-menu-container').hide();
  $('.menu.mobile a.trigger').click(function () {
    $('.menu.mobile .menu-main-menu-container').fadeToggle('fast');
  });

  /*
    sticky sidebar entrevistas
  */
  $('.side').waypoint('sticky', {
    offset: 80
  });

  $('.siguenos').waypoint(function(direction) {
    if (direction == 'down') {
      $('.side').addClass('stuck-bottom');
    }
    else if (direction == 'up') {
      $('.side').removeClass('stuck-bottom');
    };
    // $('.side').toggleClass('unstuck');
  }, { offset: 200 })



}(jQuery));