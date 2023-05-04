(function (window, document, $, undefined) {
  const axilInit = {
    i: function (e) {
      axilInit.s();
      axilInit.methods();
    },

    s: function (e) {
      (this._window = $(window)),
        (this._document = $(document)),
        (this._body = $("body")),
        (this._html = $("html"));
    },

    methods: function (e) {
      axilInit.w();
      axilInit.contactForm();
      axilInit.axilBackToTop();
      axilInit.shopFilterWidget();
      axilInit.mobileMenuActivation();
      axilInit.menuLinkActive();
      axilInit.headerIconToggle();
      axilInit.priceRangeSlider();
      axilInit.quantityRanger();
      axilInit.axilSlickActivation();
      axilInit.countdownInit(".coming-countdown", "2023/10/01");
      axilInit.campaignCountdown(".campaign-countdown", "2023/10/01");
      axilInit.countdownInit(".poster-countdown", "2023/10/01");
      axilInit.countdownInit(".sale-countdown", "2023/10/31");
      axilInit.sideOffcanvasToggle(".cart-dropdown-btn", "#cart-dropdown");
      axilInit.sideOffcanvasToggle(".mobile-nav-toggler", ".header-main-nav");
      axilInit.sideOffcanvasToggle(
        ".department-side-menu",
        ".department-nav-menu"
      );
      axilInit.sideOffcanvasToggle(".filter-toggle", ".axil-shop-sidebar");
      axilInit.sideOffcanvasToggle(".axil-search", "#header-search-modal");
      axilInit.sideOffcanvasToggle(
        ".popup-close, .closeMask",
        "#offer-popup-modal"
      );
      axilInit.stickyHeaderMenu();
      axilInit.salActivation();
      axilInit.magnificPopupActivation();
      axilInit.colorVariantActive();
      axilInit.headerCampaignRemove();
      axilInit.offerPopupActivation();
      axilInit.axilMasonary();
      axilInit.counterUpActivation();
      axilInit.scrollSmoth();
    },

    w: function (e) {
      this._window.on("load", axilInit.l).on("scroll", axilInit.res);
    },

    contactForm: function () {
      $(".axil-contact-form").on("submit", function (e) {
        e.preventDefault();
        var _self = $(this);
        var _selector = _self.closest("input,textarea");
        _self.closest("div").find("input,textarea").removeAttr("style");
        _self.find(".error-msg").remove();
        _self
          .closest("div")
          .find('button[type="submit"]')
          .attr("disabled", "disabled");
        var data = $(this).serialize();
        $.ajax({
          url: "mail.php",
          type: "post",
          dataType: "json",
          data: data,
          success: function (data) {
            _self
              .closest("div")
              .find('button[type="submit"]')
              .removeAttr("disabled");
            if (data.code == false) {
              _self.closest("div").find('[name="' + data.field + '"]');
              _self
                .find(".axil-btn")
                .after('<div class="error-msg"><p>*' + data.err + "</p></div>");
            } else {
              $(".error-msg").hide();
              $(".form-group").removeClass("focused");
              _self
                .find(".axil-btn")
                .after(
                  '<div class="success-msg"><p>' + data.success + "</p></div>"
                );
              _self.closest("div").find("input,textarea").val("");

              setTimeout(function () {
                $(".success-msg").fadeOut("slow");
              }, 5000);
            }
          },
        });
      });
    },

    counterUpActivation: function () {
      var _counter = $(".count");
      if (_counter.length) {
        _counter.counterUp({
          delay: 10,
          time: 1000,
          triggerOnce: true,
        });
      }
    },

    scrollSmoth: function (e) {
      $(document).on("click", ".smoth-animation", function (event) {
        event.preventDefault();
        $("html, body").animate(
          {
            scrollTop: $($.attr(this, "href")).offset().top,
          },
          200
        );
      });
    },

    axilBackToTop: function () {
      var btn = $("#backto-top");
      $(window).scroll(function () {
        if ($(window).scrollTop() > 300) {
          btn.addClass("show");
        } else {
          btn.removeClass("show");
        }
      });
      btn.on("click", function (e) {
        e.preventDefault();
        $("html, body").animate(
          {
            scrollTop: 0,
          },
          "300"
        );
      });
    },

    shopFilterWidget: function () {
      $(".toggle-list > .title").on("click", function (e) {
        var target = $(this).parent().children(".shop-submenu");
        var target2 = $(this).parent();
        $(target).slideToggle();
        $(target2).toggleClass("active");
      });

      $(".toggle-btn").on("click", function (e) {
        var target = $(this).parent().siblings(".toggle-open");
        var target2 = $(this).parent();
        $(target).slideToggle();
        $(target2).toggleClass("active");
      });
    },

    mobileMenuActivation: function (e) {
      $(".menu-item-has-children > a").on("click", function (e) {
        var targetParent = $(this).parents(".header-main-nav");
        var target = $(this).siblings(".axil-submenu");

        if (targetParent.hasClass("open")) {
          $(target).slideToggle(400);
          $(this).parent(".menu-item-has-children").toggleClass("open");
        }
      });

      $(".nav-link.has-megamenu").on("click", function (e) {
        var $this = $(this),
          targetElm = $this.siblings(".megamenu-mobile-toggle");
        targetElm.slideToggle(500);
      });

      // Mobile Sidemenu Class Add
      function resizeClassAdd() {
        if (window.matchMedia("(max-width: 1199px)").matches) {
          $(".department-title").addClass("department-side-menu");
          $(".department-megamenu").addClass("megamenu-mobile-toggle");
        } else {
          $(".department-title").removeClass("department-side-menuu");
          $(".department-megamenu")
            .removeClass("megamenu-mobile-toggle")
            .removeAttr("style");

        }
      }

      $(window).resize(function () {
        resizeClassAdd();
      });

      resizeClassAdd();
    },

    menuLinkActive: function () {
      var currentPage = location.pathname.split("/"),
        current = currentPage[currentPage.length - 1];
      $(".mainmenu li a, .main-navigation li a").each(function () {
        var $this = $(this);
        if ($this.attr("href") === current) {
          $this.addClass("active");
          $this.parents(".menu-item-has-children").addClass("menu-item-open");
        }
      });
    },

    headerIconToggle: function () {
      $(".my-account > a").on("click", function (e) {
        $(this).toggleClass("open").siblings().toggleClass("open");
      });
    },

    priceRangeSlider: function (e) {
      $("#slider-range").slider({
        range: true,
        min: 0,
        max: 5000,
        values: [0, 3000],
        slide: function (event, ui) {
          $("#amount").val("$" + ui.values[0] + "  $" + ui.values[1]);
        },
      });
      $("#amount").val(
        "$" +
          $("#slider-range").slider("values", 0) +
          "  $" +
          $("#slider-range").slider("values", 1)
      );
    },

    quantityRanger: function () {
      $(".pro-qty").prepend('<span class="dec qtybtn">-</span>');
      $(".pro-qty").append('<span class="inc qtybtn">+</span>');
      $(".qtybtn").on("click", function () {
        var $button = $(this);
        var oldValue = $button.parent().find("input").val();
        if ($button.hasClass("inc")) {
          var newVal = parseFloat(oldValue) + 1;
        } else {
          // Don't allow decrementing below zero
          if (oldValue > 0) {
            var newVal = parseFloat(oldValue) - 1;
          } else {
            newVal = 0;
          }
        }
        $button.parent().find("input").val(newVal);
      });
    },

    axilSlickActivation: function (e) {
      $(".owl-carousel").owlCarousel({
        loop: true,
        autoplay: true,
        margin: 15,
        autoplayTimeout: 3000,
        nav: false,
        dots: false,
        navText: [
          '<button class="slide-arrow prev-arrow"><i class="fas fa-long-arrow-left"></i></button>',
          '<button class="slide-arrow next-arrow"><i class="fas fa-long-arrow-right"></i></button>',
        ],
        responsive: {
          0: {
            items: 1,
          },
          600: {
            items: 3,
          },
          1000: {
            items: 5,
          },
        },
      });

      $("#quick-view-modal").on("shown.bs.modal", function (event) {
        $(".slick-slider").slick("setPosition");
      });
    },

    countdownInit: function (countdownSelector, countdownTime) {
      var eventCounter = $(countdownSelector);
      if (eventCounter.length) {
        eventCounter.countdown(countdownTime, function (e) {
          $(this).html(
            e.strftime(
              "<div class='countdown-section'><div><div class='countdown-number'>%-D</div> <div class='countdown-unit'>Day</div> </div></div><div class='countdown-section'><div><div class='countdown-number'>%H</div> <div class='countdown-unit'>Hrs</div> </div></div><div class='countdown-section'><div><div class='countdown-number'>%M</div> <div class='countdown-unit'>Min</div> </div></div><div class='countdown-section'><div><div class='countdown-number'>%S</div> <div class='countdown-unit'>Sec</div> </div></div>"
            )
          );
        });
      }
    },

    campaignCountdown: function (countdownSelector, countdownTime) {
      var eventCounter = $(countdownSelector);
      if (eventCounter.length) {
        eventCounter.countdown(countdownTime, function (e) {
          $(this).html(
            e.strftime(
              "<div class='countdown-section'><div><div class='countdown-number'>%-D</div> <div class='countdown-unit'>D</div> </div></div><div class='countdown-section'><div><div class='countdown-number'>%H</div> <div class='countdown-unit'>H</div> </div></div><div class='countdown-section'><div><div class='countdown-number'>%M</div> <div class='countdown-unit'>M</div> </div></div><div class='countdown-section'><div><div class='countdown-number'>%S</div> <div class='countdown-unit'>S</div> </div></div>"
            )
          );
        });
      }
    },

    sideOffcanvasToggle: function (selectbtn, openElement) {
      $("body").on("click", selectbtn, function (e) {
        e.preventDefault();

        var $this = $(this),
          wrapp = $this.parents("body"),
          wrapMask = $("<div / >").addClass("closeMask"),
          cartDropdown = $(openElement);

        if (!cartDropdown.hasClass("open")) {
          wrapp.addClass("open");
          cartDropdown.addClass("open");
          cartDropdown.parent().append(wrapMask);
          wrapp.css({
            overflow: "hidden",
          });
        } else {
          removeSideMenu();
        }

        function removeSideMenu() {
          wrapp.removeAttr("style");
          wrapp.removeClass("open").find(".closeMask").remove();
          cartDropdown.removeClass("open");
        }

        $(".sidebar-close, .closeMask").on("click", function () {
          removeSideMenu();
        });
      });
    },

    stickyHeaderMenu: function () {
      $(window).on("scroll", function () {
        // Sticky Class Add
        if ($("body").hasClass("sticky-header")) {
          var stickyPlaceHolder = $("#axil-sticky-placeholder"),
            menu = $(".axil-mainmenu"),
            menuH = menu.outerHeight(),
            topHeaderH = $(".axil-header-top").outerHeight() || 0,
            headerCampaign = $(".header-top-campaign").outerHeight() || 0,
            targrtScroll = topHeaderH + headerCampaign;
          if ($(window).scrollTop() > targrtScroll) {
            menu.addClass("axil-sticky");
            stickyPlaceHolder.height(menuH);
          } else {
            menu.removeClass("axil-sticky");
            stickyPlaceHolder.height(0);
          }
        }
      });
    },

    salActivation: function () {
      sal({
        threshold: 0.3,
        once: true,
      });
    },

    magnificPopupActivation: function () {
      var yPopup = $(".popup-youtube");
      if (yPopup.length) {
        yPopup.magnificPopup({
          disableOn: 300,
          type: "iframe",
          mainClass: "mfp-fade",
          removalDelay: 160,
          preloader: false,
          fixedContentPos: false,
        });
      }

      if ($(".zoom-gallery").length) {
        $(".zoom-gallery").each(function () {
          $(this).magnificPopup({
            delegate: "a.popup-zoom",
            type: "image",
            gallery: {
              enabled: true,
            },
          });
        });
      }
    },

    colorVariantActive: function () {
      $(".color-variant > li").on("click", function (e) {
        $(this).addClass("active").siblings().removeClass("active");
      });
    },

    headerCampaignRemove: function () {
      $(".remove-campaign").on("click", function () {
        var targetElem = $(".header-top-campaign");
        targetElem.slideUp(function () {
          $(this).remove();
        });
      });
    },

    offerPopupActivation: function () {
      if ($("body").hasClass("newsletter-popup-modal")) {
        setTimeout(function () {
          $("body").addClass("open");
          $("#offer-popup-modal").addClass("open");
        }, 1000);
      }
    },

    axilMasonary: function () {
      $(".axil-isotope-wrapper").imagesLoaded(function () {
        // filter items on button click
        $(".isotope-button").on("click", "button", function () {
          var filterValue = $(this).attr("data-filter");
          $grid.isotope({
            filter: filterValue,
          });
        });

        // init Isotope
        var $grid = $(".isotope-list").isotope({
          itemSelector: ".product",
          percentPosition: true,
          transitionDuration: "0.7s",
          layoutMode: "fitRows",
          masonry: {
            // use outer width of grid-sizer for columnWidth
            columnWidth: 1,
          },
        });
      });

      $(".isotope-button button").on("click", function (event) {
        $(this).siblings(".is-checked").removeClass("is-checked");
        $(this).addClass("is-checked");
        event.preventDefault();
      });
    },
  };
  axilInit.i();
})(window, document, jQuery);
