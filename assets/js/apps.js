/* Validation form */
validateForm("validation-newsletter");
validateForm("validation-cart");
validateForm("validation-user");
validateForm("validation-contact");
setTimeout(function () {
  $(".index6 .slidenews").show();
  $(".index6 .slidenews").css({
    height: 'auto',
    overflow: 'unset'
  });
}, 1000);
/* Lazys */
NN_FRAMEWORK.Lazys = function () {
  if (isExist($(".lazy"))) {
    var lazyLoadInstance = new LazyLoad({
      elements_selector: ".lazy",
    });
  }
};
/* Load name input file */
NN_FRAMEWORK.loadNameInputFile = function () {
  if (isExist($(".custom-file input[type=file]"))) {
    $("body").on("change", ".custom-file input[type=file]", function () {
      var fileName = $(this).val();
      fileName = fileName.substr(
        fileName.lastIndexOf("\\") + 1,
        fileName.length
      );
      $(this).siblings("label").html(fileName);
    });
  }
};
/* Back to top */
NN_FRAMEWORK.GoTop = function () {
  $(window).scroll(function () {
    if (!$(".scrollToTop").length)
      $("body").append(
        '<div class="scrollToTop"><img src="' + GOTOP + '" alt="Go Top"/></div>'
      );
    if ($(this).scrollTop() > 100) $(".scrollToTop").fadeIn();
    else $(".scrollToTop").fadeOut();
  });
  $("body").on("click", ".scrollToTop", function () {
    $("html, body").animate({ scrollTop: 0 }, 800);
    return false;
  });
  // click video con laylink
  $('.index5 .right select').click(function (event) {
    var getlink = $(this).val();
    $('.index5 .right iframe').attr('src', 'https://www.youtube.com/embed/' + getlink);
  });

  /* Loader */
  if($(".loader-wrapper").length)
  {
    setTimeout(function(){
      $(".loader-wrapper").fadeOut("medium");
    },800);
  }

  // placeholderTypewriter
  let placeholderText =$('#keyword').data('placeholder') ? $('#keyword').data('placeholder').split(';').filter(Boolean) :[]
  placeholderText.length && $('#keyword').placeholderTypewriter({text: placeholderText});

  let placeholderText2 =$('#keyword-res').data('placeholder') ? $('#keyword-res').data('placeholder').split(';').filter(Boolean) :[]
  placeholderText2.length && $('#keyword-res').placeholderTypewriter({text: placeholderText2});
};

/* Alt images */
NN_FRAMEWORK.AltImg = function () {
  $("img").each(function (index, element) {
    if (!$(this).attr("alt") || $(this).attr("alt") == "") {
      $(this).attr("alt", WEBSITE_NAME);
    }
  });
};
/* Menu */
NN_FRAMEWORK.Menu = function () {
  /* Menu remove empty ul */
  if (isExist($(".menu"))) {
    $(".menu ul li a").each(function () {
      $this = $(this);
      if (!isExist($this.next("ul").find("li"))) {
        $this.next("ul").remove();
        $this.removeClass("has-child");
      }
    });
  }
  /* Menu fixed */
  // if(isExist($(".header")))
  // {
  //     $(window).scroll(function(){
  //         if($(window).scrollTop() >= $(".header").height())
  //         {
  //             $(".menu").css({position:"fixed",left:'0px',right:'0px',top:'0px',zIndex:'100'});
  //         }
  //         else
  //         {
  //             $(".menu").css({position:"relative"});
  //         }
  //     });
  // }
  /* Mmenu */
  if (isExist($("nav#menu"))) {
    $("nav#menu").mmenu({
      extensions: ["border-full", "position-left", "position-front"],
    });
  }
};
/* Tools */
NN_FRAMEWORK.Tools = function () {
  if (isExist($(".toolbar"))) {
    $(".footer").css({ marginBottom: $(".toolbar").innerHeight() });
  }
};
/* Popup */
NN_FRAMEWORK.Popup = function () {
  if (isExist($("#popup"))) {
    $("#popup").modal("show");
  }
};
/* Wow */
// NN_FRAMEWORK.Wows = function () {
//   new WOW().init();
// };
/* Pagings */
NN_FRAMEWORK.Pagings = function () {
  /* Products */
  if (isExist($(".paging-product"))) {
    loadPaging("api/product.php?perpage=8", ".paging-product");
  }
  if (isExist($(".paging_service"))) {
    var perpage_ser = $(".paging_service").attr("perpage_ser");
    loadPaging("api/service.php?perpage=" + perpage_ser, ".paging_service");
  }
  //Phan theo chieu doc
  // if(isExist($(".paging-product-list")))
  // {
  //     var id_one=$('.click_list:first-child').attr('data-list');
  //     loadPaging("api/product.php?perpage=8&idList="+id_one,'.paging-product-list');
  //     $('.click_list').click(function(){
  //         var list = $(this).data("list");
  //         $('.click_list').removeClass('act');
  //         $(this).addClass('act');
  //         loadPaging("api/product.php?perpage=8&idList="+list,'.paging-product-list');
  //     });
  // }
  if (isExist($(".paging-product-list"))) {
    var id_one = $(".click_list:first-child").attr("data-list");
    loadPaging(
      "api/product.php?perpage=4&idList=" + id_one,
      ".paging-product-list"
    );
    $(".click_list").click(function () {
      var list = $(this).data("list");
      $(".click_list").removeClass("act");
      $(this).addClass("act");
      loadPaging(
        "api/product.php?perpage=4&idList=" + list,
        ".paging-product-list"
      );
    });
  }
  if (isExist($(".paging-product-duan"))) {
    var id_one = $(".click_list:first-child").attr("data-list");
    loadPaging(
      "api/duan.php?perpage=6&idList=" + id_one,
      ".paging-product-duan"
    );
    $(".click_list2").click(function () {
      var list = $(this).data("list");
      $(".click_list2").removeClass("act");
      $(this).addClass("act");
      loadPaging(
        "api/duan.php?perpage=6&idList=" + list,
        ".paging-product-duan"
      );
    });
  }
  /* Categories */
  if (isExist($(".paging-product-category"))) {
    $(".paging-product-category").each(function () {
      var list = $(this).data("list");
      loadPaging(
        "api/product.php?perpage=4&idList=" + list,
        ".paging-product-category-" + list
      );
    });
  }
};
/* Ticker scroll */
NN_FRAMEWORK.TickerScroll = function () {
  if (isExist($(".news-scroll"))) {
    $(".news-scroll")
      .easyTicker({
        direction: "up",
        easing: "swing",
        speed: "slow",
        interval: 3500,
        height: "auto",
        visible: 3,
        mousePause: true,
        autoplay: true,
        controls: {
          up: ".news-control#up",
          down: ".news-control#down",
          // toggle: '.toggle',
          // stopText: 'Stop'
        },
        callbacks: {
          before: function (ul, li) {
            // console.log(this, ul, li);
            // $(li).css('color', 'red');
          },
          after: function (ul, li) {
            // console.log(this, ul, li);
          },
        },
      })
      .data("easyTicker");
  }
};
/* Photobox */
NN_FRAMEWORK.Photobox = function () {
  if (isExist($(".album-gallery"))) {
    $(".album-gallery").photobox("a", { thumbs: true, loop: false });
  }
};
/* Comment */
NN_FRAMEWORK.Comment = function () {
  if (isExist($(".comment-page"))) {
    $(".comment-page").comments({
      url: "api/comment.php",
    });
  }
};
/* DatePicker */
NN_FRAMEWORK.DatePicker = function () {
  if (isExist($("#birthday"))) {
    $("#birthday").datetimepicker({
      timepicker: false,
      format: "d/m/Y",
      formatDate: "d/m/Y",
      minDate: "01/01/1950",
      maxDate: TIMENOW,
    });
  }
};
/* Search */
NN_FRAMEWORK.Search = function () {
  if (isExist($(".icon-search"))) {
    $(".icon-search").click(function () {
      if ($(this).hasClass("active")) {
        $(this).removeClass("active");
        $(".search-grid")
          .stop(true, true)
          .animate({ opacity: "0", width: "0px" }, 200);
      } else {
        $(this).addClass("active");
        $(".search-grid")
          .stop(true, true)
          .animate({ opacity: "1", width: "230px" }, 200);
      }
      document.getElementById($(this).next().find("input").attr("id")).focus();
      $(".icon-search i").toggleClass("fa fa-search fa fa-times");
    });
  }
};
/* Videos */
NN_FRAMEWORK.Videos = function () {
  /* Fancybox */
  $('[data-fancybox="something"]').fancybox({
    // transitionEffect: "fade",
    // transitionEffect: "slide",
    // transitionEffect: "circular",
    // transitionEffect: "tube",
    // transitionEffect: "zoom-in-out",
    // transitionEffect: "rotate",
    transitionEffect: "fade",
    transitionDuration: 800,
    animationEffect: "fade",
    animationDuration: 800,
    slideShow: {
      autoStart: true,
      speed: 3000
    },
    arrows: true,
    infobar: false,
    toolbar: false,
    hash: false
  });
  if (isExist($('[data-fancybox="video"]'))) {
    $('[data-fancybox="video"]').fancybox({
      transitionEffect: "fade",
      transitionDuration: 800,
      animationEffect: "fade",
      animationDuration: 800,
      arrows: true,
      infobar: false,
      toolbar: true,
      hash: false,
    });
  }
};
/* Owl Data */
NN_FRAMEWORK.OwlData = function (obj) {
  if (!isExist(obj)) return false;
  var xsm_items = obj.attr("data-xsm-items");
  var sm_items = obj.attr("data-sm-items");
  var md_items = obj.attr("data-md-items");
  var lg_items = obj.attr("data-lg-items");
  var xlg_items = obj.attr("data-xlg-items");
  var rewind = obj.attr("data-rewind");
  var autoplay = obj.attr("data-autoplay");
  var loop = obj.attr("data-loop");
  var lazyLoad = obj.attr("data-lazyload");
  var mouseDrag = obj.attr("data-mousedrag");
  var touchDrag = obj.attr("data-touchdrag");
  var animations = obj.attr("data-animations");
  var smartSpeed = obj.attr("data-smartspeed");
  var autoplaySpeed = obj.attr("data-autoplayspeed");
  var autoplayTimeout = obj.attr("data-autoplaytimeout");
  var dots = obj.attr("data-dots");
  var nav = obj.attr("data-nav");
  var navText = false;
  var navContainer = false;
  var responsive = {};
  var responsiveClass = true;
  var responsiveRefreshRate = 200;
  if (xsm_items != "") {
    xsm_items = xsm_items.split(":");
  }
  if (sm_items != "") {
    sm_items = sm_items.split(":");
  }
  if (md_items != "") {
    md_items = md_items.split(":");
  }
  if (lg_items != "") {
    lg_items = lg_items.split(":");
  }
  if (xlg_items != "") {
    xlg_items = xlg_items.split(":");
  }
  if (rewind == 1) {
    rewind = true;
  } else {
    rewind = false;
  }
  if (autoplay == 1) {
    autoplay = true;
  } else {
    autoplay = false;
  }
  if (loop == 1) {
    loop = true;
  } else {
    loop = false;
  }
  if (lazyLoad == 1) {
    lazyLoad = true;
  } else {
    lazyLoad = false;
  }
  if (mouseDrag == 1) {
    mouseDrag = true;
  } else {
    mouseDrag = false;
  }
  if (animations != "") {
    animations = animations;
  } else {
    animations = false;
  }
  if (smartSpeed > 0) {
    smartSpeed = Number(smartSpeed);
  } else {
    smartSpeed = 800;
  }
  if (autoplaySpeed > 0) {
    autoplaySpeed = Number(autoplaySpeed);
  } else {
    autoplaySpeed = 800;
  }
  if (autoplayTimeout > 0) {
    autoplayTimeout = Number(autoplayTimeout);
  } else {
    autoplayTimeout = 5000;
  }
  if (dots == 1) {
    dots = true;
  } else {
    dots = false;
  }
  if (nav == 1) {
    nav = true;
    navText = obj.attr("data-navtext");
    navContainer = obj.attr("data-navcontainer");
    if (navText != "") {
      navText =
        navText.indexOf("|") > 0 ? navText.split("|") : navText.split(":");
      navText = [navText[0], navText[1]];
    }
    if (navContainer != "") {
      navContainer = navContainer;
    }
  } else {
    nav = false;
  }
  responsive = {
    0: {
      items: Number(xsm_items[0]),
      margin: Number(xsm_items[1]),
    },
    576: {
      items: Number(sm_items[0]),
      margin: Number(sm_items[1]),
    },
    768: {
      items: Number(md_items[0]),
      margin: Number(md_items[1]),
    },
    992: {
      items: Number(lg_items[0]),
      margin: Number(lg_items[1]),
    },
    1200: {
      items: Number(xlg_items[0]),
      margin: Number(xlg_items[1]),
    },
  };
  obj.owlCarousel({
    rewind: rewind,
    autoplay: autoplay,
    loop: loop,
    lazyLoad: lazyLoad,
    mouseDrag: mouseDrag,
    touchDrag: touchDrag,
    smartSpeed: smartSpeed,
    autoplaySpeed: autoplaySpeed,
    autoplayTimeout: autoplayTimeout,
    dots: dots,
    nav: nav,
    navText: navText,
    navContainer: navContainer,
    responsiveClass: responsiveClass,
    responsiveRefreshRate: responsiveRefreshRate,
    responsive: responsive,
  });
  if (autoplay) {
    obj.on("translate.owl.carousel", function (event) {
      obj.trigger("stop.owl.autoplay");
    });
    obj.on("translated.owl.carousel", function (event) {
      obj.trigger("play.owl.autoplay", [autoplayTimeout]);
    });
  }
  if (animations && isExist(obj.find("[owl-item-animation]"))) {
    var animation_now = "";
    var animation_count = 0;
    var animations_excuted = [];
    var animations_list = animations.indexOf(",")
      ? animations.split(",")
      : animations;
    obj.on("changed.owl.carousel", function (event) {
      $(this)
        .find(".owl-item.active")
        .find("[owl-item-animation]")
        .removeClass(animation_now);
    });
    obj.on("translate.owl.carousel", function (event) {
      var item = event.item.index;
      if (Array.isArray(animations_list)) {
        var animation_trim = animations_list[animation_count].trim();
        if (!animations_excuted.includes(animation_trim)) {
          animation_now = "animate__animated " + animation_trim;
          animations_excuted.push(animation_trim);
          animation_count++;
        }
        if (animations_excuted.length == animations_list.length) {
          animation_count = 0;
          animations_excuted = [];
        }
      } else {
        animation_now = "animate__animated " + animations_list.trim();
      }
      $(this)
        .find(".owl-item")
        .eq(item)
        .find("[owl-item-animation]")
        .addClass(animation_now);
    });
  }
};
/* Owl Page */
NN_FRAMEWORK.OwlPage = function () {
  if (isExist($(".owl-page"))) {
    $(".owl-page").each(function () {
      NN_FRAMEWORK.OwlData($(this));
    });
  }
};
/* Dom Change */
NN_FRAMEWORK.DomChange = function () {
  /* Video Fotorama */
  $("#video-fotorama").one("DOMSubtreeModified", function () {
    $("#fotorama-videos").fotorama();
  });
  /* Video Select */
  $("#video-select").one("DOMSubtreeModified", function () {
    $(".listvideos").change(function () {
      var id = $(this).val();
      $.ajax({
        url: "api/video.php",
        type: "POST",
        dataType: "html",
        data: {
          id: id,
        },
        beforeSend: function () {
          holdonOpen();
        },
        success: function (result) {
          $(".video-main").html(result);
          holdonClose();
        },
      });
    });
  });
};
/* Cart */
NN_FRAMEWORK.Cart = function () {
  /* Add */
  $("body").on("click", ".addcart", function () {
    $this = $(this);
    $parents = $this.parents(".right-pro-detail");
    var id = $this.data("id");
    var action = $this.data("action");
    var quantity = $parents.find(".quantity-pro-detail").find(".qty-pro").val();
    quantity = quantity ? quantity : 1;
    var color = $parents
      .find(".color-block-pro-detail")
      .find(".color-pro-detail input:checked")
      .val();
    color = color ? color : 0;
    var size = $parents
      .find(".size-block-pro-detail")
      .find(".size-pro-detail input:checked")
      .val();
    size = size ? size : 0;
    if (id) {
      $.ajax({
        url: "api/cart.php",
        type: "POST",
        dataType: "json",
        async: false,
        data: {
          cmd: "add-cart",
          id: id,
          color: color,
          size: size,
          quantity: quantity,
        },
        beforeSend: function () {
          holdonOpen();
        },
        success: function (result) {
          if (action == "addnow") {
            $(".count-cart").html(result.max);
            $.ajax({
              url: "api/cart.php",
              type: "POST",
              dataType: "html",
              async: false,
              data: {
                cmd: "popup-cart",
              },
              success: function (result) {
                $("#popup-cart .modal-body").html(result);
                $("#popup-cart").modal("show");
                NN_FRAMEWORK.Lazys();
                holdonClose();
              },
            });
          } else if (action == "tuvan") {
            $.ajax({
              url: "api/cart.php",
              type: "POST",
              dataType: "html",
              async: false,
              data: {
                cmd: "popup-tuvan",
                id: id,
              },
              success: function (result) {
                $("#popup-tuvan .modal-body").html(result);
                $("#popup-tuvan").modal("show");
                holdonClose();
                
              },
            });
          } else if(action == "buynow") {
            window.location = CONFIG_BASE + "gio-hang";
          }
        },
      });
    }
  });
  /* Delete */
  $("body").on("click", ".del-procart", function () {
    confirmDialog("delete-procart", LANG["delete_product_from_cart"], $(this));
  });
  /* Counter */
  $("body").on("click", ".counter-procart", function () {
    var $button = $(this);
    var quantity = 1;
    var input = $button.parent().find("input");
    var id = input.data("pid");
    var code = input.data("code");
    var oldValue = $button.parent().find("input").val();
    if ($button.text() == "+") quantity = parseFloat(oldValue) + 1;
    else if (oldValue > 1) quantity = parseFloat(oldValue) - 1;
    $button.parent().find("input").val(quantity);
    updateCart(id, code, quantity);
  });
  /* Quantity */
  $("body").on("change", "input.quantity-procart", function () {
    var quantity = $(this).val() < 1 ? 1 : $(this).val();
    $(this).val(quantity);
    var id = $(this).data("pid");
    var code = $(this).data("code");
    updateCart(id, code, quantity);
  });
  /* City */
  if (isExist($(".select-city-cart"))) {
    $(".select-city-cart").change(function () {
      var id = $(this).val();
      loadDistrict(id);
      loadShip();
    });
  }
  /* District */
  if (isExist($(".select-district-cart"))) {
    $(".select-district-cart").change(function () {
      var id = $(this).val();
      loadWard(id);
      loadShip();
    });
  }
  /* Ward */
  if (isExist($(".select-ward-cart"))) {
    $(".select-ward-cart").change(function () {
      var id = $(this).val();
      loadShip(id);
    });
  }
  /* Payments */
  if (isExist($(".payments-label"))) {
    $(".payments-label").click(function () {
      var payments = $(this).data("payments");
      $(".payments-cart .payments-label, .payments-info").removeClass("active");
      $(this).addClass("active");
      $(".payments-info-" + payments).addClass("active");
    });
  }
  /* Colors */
  if (isExist($(".color-pro-detail"))) {
    $(".color-pro-detail input").click(function () {
      $this = $(this).parents("label.color-pro-detail");
      $parents = $this.parents(".attr-pro-detail");
      $parents_detail = $this.parents(".grid-pro-detail");
      $parents
        .find(".color-block-pro-detail")
        .find(".color-pro-detail")
        .removeClass("active");
      $parents
        .find(".color-block-pro-detail")
        .find(".color-pro-detail input")
        .prop("checked", false);
      $this.addClass("active");
      $this.find("input").prop("checked", true);
      var id_color = $parents
        .find(".color-block-pro-detail")
        .find(".color-pro-detail input:checked")
        .val();
      var id_pro = $this.data("idproduct");
      $.ajax({
        url: "api/color.php",
        type: "POST",
        dataType: "html",
        data: {
          id_color: id_color,
          id_pro: id_pro,
        },
        beforeSend: function () {
          holdonOpen();
        },
        success: function (result) {
          if (result) {
            $parents_detail.find(".left-pro-detail").html(result);
            MagicZoom.refresh("Zoom-1");
            NN_FRAMEWORK.OwlData($(".owl-pro-detail"));
            NN_FRAMEWORK.Lazys();
          }
          holdonClose();
        },
      });
    });
  }
  /* Sizes */
  if (isExist($(".size-pro-detail"))) {
    $(".size-pro-detail input").click(function () {
      $this = $(this).parents("label.size-pro-detail");
      $parents = $this.parents(".attr-pro-detail");
      $parents
        .find(".size-block-pro-detail")
        .find(".size-pro-detail")
        .removeClass("active");
      $parents
        .find(".size-block-pro-detail")
        .find(".size-pro-detail input")
        .prop("checked", false);
      $this.addClass("active");
      $this.find("input").prop("checked", true);
    });
  }
  /* Quantity detail page */
  if (isExist($(".quantity-pro-detail span"))) {
    $(".quantity-pro-detail span").click(function () {
      var $button = $(this);
      var oldValue = $button.parent().find("input").val();
      if ($button.text() == "+") {
        var newVal = parseFloat(oldValue) + 1;
      } else {
        if (oldValue > 1) var newVal = parseFloat(oldValue) - 1;
        else var newVal = 1;
      }
      $button.parent().find("input").val(newVal);
    });
  }
};
/* All */
NN_FRAMEWORK.All = function () {
  if (isExist($(".slick-kn"))) {
    $(".slick-kn").slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true,
      vertical: true,
      arrows: false,
      centerMode: false,
      speed: 2000,
      responsive: [
        {
          breakpoint: 1008,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
          },
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
          },
        },
      ]
    });
  }

  // if (isExist($(".slidespnb"))) {
  //     $(".slidespnb").slick({
  //       slidesToShow: 4,
  //       slidesToScroll: 1,
  //       autoplay: true,
  //       centerMode: false,
  //       speed: 2000,
  //       responsive: [
  //         {
  //           breakpoint: 1008,
  //           settings: {
  //             slidesToShow: 4,
  //             slidesToScroll: 1,
  //             centerMode: false,
  //           },
  //         },
  //         {
  //           breakpoint: 601,
  //           settings: {
  //             slidesToShow: 2,
  //             slidesToScroll: 1,
  //             centerMode: false,
  //           },
  //         },
  //       ]
  //     });
  // }
  // if (isExist($(".slidespbanchay"))) {
  //   $(".slidespbanchay").slick({
  //     slidesToShow: 4,
  //     slidesToScroll: 1,
  //     autoplay: true,
  //     centerMode: false,
  //     speed: 2000,
  //     responsive: [
  //       {
  //         breakpoint: 1008,
  //         settings: {
  //           slidesToShow: 4,
  //           slidesToScroll: 1,
  //           centerMode: false,
  //         },
  //       },
  //       {
  //         breakpoint: 601,
  //         settings: {
  //           slidesToShow: 2,
  //           slidesToScroll: 1,
  //           centerMode: false,
  //         },
  //       },
  //     ]
  //   });
  // }
  if (isExist($(".slidebanner"))) {
    $(".slidebanner").slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true,
      vertical: false,
      arrows: false,
      centerMode: false,
      speed: 2000,
    });
  }
  if (isExist($(".slidenews"))) {
    $(".slidenews").slick({
      slidesToShow: 3,
      // rows: 2,
      slidesToScroll: 1,
      autoplay: true,
      speed: 2000,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
          },
        },
        {
          breakpoint: 801,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
          },
        },
        {
          breakpoint: 601,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
          },
        },
      ]
    });
  }

  $("#tit_gt1 , #tit_gt2").textillate({
    in: {
      effect: "fadeInLeft",
    },
    out: {
      effect: "fadeInRight",
    },
    loop: true,
  });
  var swiper = new Swiper(".swiper-container", {
    direction: "horizontal",
    effect: "coverflow",
    grabCursor: true,
    centeredSlides: true,
    autoplay: 3000,
    slidesPerView: "auto",
    direction: "horizontal",
    loop: true,
    pagination: ".swiper-pagination",
    paginationClickable: ".swiper-pagination",
    nextButton: ".swiper-button-next",
    prevButton: ".swiper-button-prev",
    coverflowEffect: {
      rotate: 55,
      stretch: 0,
      depth: 170,
      modifier: 1,
      slideShadows: true,
    },
    initialSlide: 1,
  });
  // $(window).bind("load", function () {
  //   var api = $(".peShiner").peShiner({
  //     api: true,
  //     paused: true,
  //     reverse: true,
  //     repeat: 2,
  //     color: "fireHL",
  //   });
  //   api.resume();
  // });
  // $( document ).ready( function () {
  //     $( ".goidien" ).click( function () {
  //         if ( $( ".goidienthoai .content" ).hasClass( "active" ) )
  //             $( ".goidienthoai .content" ).removeClass( "active" );
  //         else $( ".goidienthoai .content" ).addClass( "active" );
  //     } );
  // } );

  $(".spdm1 .danhmuc1").each(function () {
    var id_list = $(this).attr("id-list");
    var perpage = 8;
    var eshow = $(this).attr('link');
    //loadtrangcap12(id_list, 0, 0);
    //loadtrangcap12(id_list);
    $.ajax({
      url: "api/product.php",
      type: "GET",
      dataType: "html",
      data: { id_list: id_list, perpage: perpage, eshow: eshow },
      success: function (result) {
        $('.spdm1 .' + eshow).html(result);
      },
    });
  });

  $(document).on("click", ".spdm1 .pagination-ajax a", function () {
    p = $(this).attr("vitri");
    id_list = $(this).attr("id-list");
    eshow = $(this).attr("link");
    perpage = 8;
    $.ajax({
      url: "api/product.php",
      type: "GET",
      dataType: "html",
      data: { id_list: id_list, perpage: perpage, eshow: eshow, p: p },
      success: function (result) {
        $('.spdm1 .' + eshow).html(result);
      },
    });
  });

  $(document).on("click", ".producthot .pagination-ajax a", function () {
    p = $(this).attr("vitri");
    id_list = $(this).attr("id-list");
    eshow = $(this).attr("link");
    perpage = 8;
    $.ajax({
      url: "api/product.php",
      type: "GET",
      dataType: "html",
      data: { id_list: id_list, perpage: perpage, eshow: eshow, p: p },
      success: function (result) {
        $('.producthot .' + eshow).html(result);
      },
    });
  });

  // n
  $(".tabs_proslide_ajax_s").slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    dots: false,
    arrows: true,
    infinite: false,
    centerMode: false,
    autoplay: true,
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 4,
        },
      },
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 3,
        },
      },
      {
        breakpoint: 576,
        settings: {
          slidesToShow: 2,
        },
      },
    ],
  });
  // sp2cap_tab_slide
  if (isExist($(".tabs_proslide_ajax"))) {
    $(".tab-link-ajax:first-child").addClass("current");
    $("body").on("click", ".tab-link-ajax", function () {
      var Pa = $(this).parents(".bd_spcap1");
      Pa.find(".tab-link-ajax").removeClass("current");
      $(this).addClass("current");
      var tab = $(this).data("tab");
      $.ajax({
        url: "api/ajax_pro.php",
        type: "POST",
        dataType: "html",
        data: { tab: tab },
        success: function (result) {
          if (result != "") {
            Pa.find(".tabs-content-sp").html(result);
            $(".slider-nav")
              .not(".slick-initialized")
              .slick({
                slidesToShow: 5,
                slidesToScroll: 1,
                dots: false,
                arrows: false,
                infinite: true,
                centerMode: false,
                autoplay: true,
                responsive: [
                  {
                    breakpoint: 1200,
                    settings: {
                      slidesToShow: 4,
                    },
                  },
                  {
                    breakpoint: 992,
                    settings: {
                      slidesToShow: 3,
                    },
                  },
                  {
                    breakpoint: 576,
                    settings: {
                      slidesToShow: 2,
                    },
                  },
                ],
              });
          }
        },
      });
    });
  }
  if (isExist($(".slider-nav"))) {
    $(".slider-nav").slick({
      slidesToShow: 5,
      slidesToScroll: 1,
      dots: false,
      arrows: false,
      infinite: false,
      centerMode: false,
      autoplay: true,
      responsive: [
        {
          breakpoint: 1200,
          settings: {
            slidesToShow: 4,
          },
        },
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 3,
          },
        },
        {
          breakpoint: 576,
          settings: {
            slidesToShow: 2,
          },
        },
      ],
    });
  }
};
/* Ready */
$(document).ready(function () {
  NN_FRAMEWORK.Lazys();
  NN_FRAMEWORK.Tools();
  NN_FRAMEWORK.Popup();
  // NN_FRAMEWORK.Wows();
  NN_FRAMEWORK.AltImg();
  NN_FRAMEWORK.GoTop();
  NN_FRAMEWORK.Menu();
  NN_FRAMEWORK.OwlPage();
  NN_FRAMEWORK.Pagings();
  NN_FRAMEWORK.Cart();
  NN_FRAMEWORK.Videos();
  NN_FRAMEWORK.Photobox();
  NN_FRAMEWORK.Comment();
  NN_FRAMEWORK.Search();
  NN_FRAMEWORK.DomChange();
  NN_FRAMEWORK.TickerScroll();
  NN_FRAMEWORK.DatePicker();
  NN_FRAMEWORK.loadNameInputFile();
  NN_FRAMEWORK.All();
});
