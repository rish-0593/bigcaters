$(document).ready(function () {
  "use strict";

  // makes sure the whole site is loaded
  $(window).on("load", function () {
    // will first fade out the loading animation
    $(".loader-inner").fadeOut();
    // will fade out the whole DIV that covers the website.
    $(".loader").fadeOut("slow");
  });

  $(window).on("scroll", function () {
    var b = $(window).scrollTop();
    if (b > 60) {
      $(".navbar").addClass("top-nav-collapse");
    } else {
      $(".navbar").removeClass("top-nav-collapse");
    }
  });

  $("a.smooth-scroll").on("click", function (event) {
    var $anchor = $(this);
    $("html, body")
      .stop()
      .animate(
        {
          scrollTop: $($anchor.attr("href")).offset().top + 20,
        },
        1500,
        "easeInOutExpo"
      );
    event.preventDefault();
  });

  var offset = 300,
    //browser window scroll (in pixels) after which the "back to top" link opacity is reduced
    offset_opacity = 1200,
    //duration of the top scrolling animation (in ms)
    scroll_top_duration = 700,
    //grab the "back to top" link
    $back_to_top = $(".top");

  //hide or show the "back to top" link
  $(window).on("scroll", function () {
    $(this).scrollTop() > offset
      ? $back_to_top.addClass("is-visible")
      : $back_to_top.removeClass("is-visible fade-out");
    if ($(this).scrollTop() > offset_opacity) {
      $back_to_top.addClass("fade-out");
    }
  });

  //smooth scroll to top
  $back_to_top.on("click", function (event) {
    event.preventDefault();
    $("body,html").animate(
      {
        scrollTop: 0,
      },
      scroll_top_duration
    );
  });

  $(".navbar-nav>li>a:not(#dLabel)").on("click", function () {
    $("#navbar-collapse").removeClass("in").addClass("collapse");
  });

  function isValidEmail(emailAddress) {
    var pattern = new RegExp(
      /^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i
    );
    return pattern.test(emailAddress);
  }

  function isValidPhoneNumber(phoneNumber) {
    return phoneNumber.match(/[0-9-()+]{3,20}/);
  }

  $("#contactForm").on("submit", function (e) {
    e.preventDefault();
    var data = {
      name: $("#cName").val(),
      email: $("#cEmail").val(),
      phone: $("#cPhone").val(),
      event_type: $("#cChoose").val(),
      event_size: $("#cEventSize").val(),
      message: $("#cMessage").val(),
    };

    if (
      isValidEmail(data["email"]) &&
      data["name"].length > 1 &&
      data["message"].length > 1 &&
      isValidPhoneNumber(data["phone"])
    ) {
      $('[type="submit"]').prop("disabled", true);

      $.ajax({
        type: "POST",
        url: "php/quote.php",
        data: data,
        success: function () {
          $(".success.cf").delay(500).fadeIn(1000);
          $(".failed.cf").fadeOut(500);
          document.getElementById("contactForm").reset();
          $('[type="submit"]').prop("disabled", false);
          window.location.href = './thank-you.html';
        },
      });
    } else {
      $(".failed.cf").delay(500).fadeIn(1000);
      $(".success.cf").fadeOut(500);
    }

    return false;
  });

  $("#quoteForm").on("submit", function (e) {
    e.preventDefault();
    let searchParams = new URLSearchParams(window.location.search);

    var data = {
      _r: searchParams.get('_r'),
      name: $("#qName").val(),
      email: $("#qEmail").val(),
      phone: $("#qPhone").val(),
      event_type: $("#inputGroupSelect02").val(),
      event_size: $("#inputGroupSelect03").val(),
      message: $("#qMessage").val(),
    };

    if (
      isValidEmail(data["email"]) &&
      data["name"].length > 1 &&
      data["message"].length > 1 &&
      isValidPhoneNumber(data["phone"])
    ) {
      $('[type="submit"]').prop("disabled", true);

      $.ajax({
        type: "POST",
        url: "php/quote.php",
        data: data,
        success: function () {
          $(".success.qf").delay(500).fadeIn(1000);
          $(".failed.qf").fadeOut(500);
          document.getElementById("quoteForm").reset();
          $('[type="submit"]').prop("disabled", false);
          window.location.href = './thank-you.html';
        },
      });
    } else {
      $(".failed.qf").delay(500).fadeIn(1000);
      $(".success.qf").fadeOut(500);
    }

    return false;
  });

  $("[data-scroll]").on("click", function (e) {
    let elm = $(this).data("scroll");

    const element = document.getElementById(elm);
    $("html, body").animate(
      {
        scrollTop: $(`#${elm}`).offset().top - $("#main-navbar").height(),
      },
      1000
    );
  });

  /* ===========================================================
   BOOTSTRAP FIX FOR IE10 in Windows 8 and Windows Phone 8  
============================================================== */
  if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
    var msViewportStyle = document.createElement("style");
    msViewportStyle.appendChild(
      document.createTextNode("@-ms-viewport{width:auto!important}")
    );
    document.querySelector("head").appendChild(msViewportStyle);
  }
}); // End $(document).ready Function
