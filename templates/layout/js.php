<!-- Js Config -->
<script type="text/javascript">
    var NN_FRAMEWORK = NN_FRAMEWORK || {};
    var CONFIG_BASE = '<?= $configBase ?>';
    var ASSET = '<?= ASSET ?>';
    var WEBSITE_NAME = '<?= (!empty($setting['name' . $lang])) ? addslashes($setting['name' . $lang]) : '' ?>';
    var TIMENOW = '<?= date("d/m/Y", time()) ?>';
    var SHIP_CART = <?= (!empty($config['order']['ship'])) ? 'true' : 'false' ?>;
    var RECAPTCHA_ACTIVE = <?= (!empty($config['googleAPI']['recaptcha']['active'])) ? 'true' : 'false' ?>;
    var RECAPTCHA_SITEKEY = '<?= $config['googleAPI']['recaptcha']['sitekey'] ?>';
    var GOTOP = ASSET + 'assets/images/top.png';
    var LANG = {
        'no_keywords': '<?= chuanhaptukhoatimkiem ?>',
        'delete_product_from_cart': '<?= banmuonxoasanphamnay ?>',
        'no_products_in_cart': '<?= khongtontaisanphamtronggiohang ?>',
        'ward': '<?= phuongxa ?>',
        'back_to_home': '<?= vetrangchu ?>',
    };
</script>

<!-- Js Files -->
<?php
$js->set("js/jquery.min.js");
$js->set("js/lazyload.min.js");
$js->set("bootstrap/bootstrap.js");
//$js->set("js/wow.min.js");
$js->set("confirm/confirm.js");
$js->set("holdon/HoldOn.js");
$js->set("mmenu/mmenu.js");
//$js->set("easyticker/easy-ticker.js");
$js->set("fotorama/fotorama.js");
$js->set("owlcarousel2/owl.carousel.js");
$js->set("magiczoomplus/magiczoomplus.js");
$js->set("slick/slick.js");
$js->set("fancybox3/jquery.fancybox.js");
$js->set("photobox/photobox.js");
$js->set("simplenotify/simple-notify.js");
//$js->set("fileuploader/jquery.fileuploader.min.js");
//$js->set("datetimepicker/php-date-formatter.min.js");
//$js->set("datetimepicker/jquery.mousewheel.js");
//$js->set("datetimepicker/jquery.datetimepicker.js");
$js->set("js/functions.js");
$js->set("js/jquery.lettering.js");
$js->set("js/jquery.textillate.js");
$js->set("js/jquery.pixelentity.shiner.min.js");
$js->set("js/swiper/swiper.min.js");
$js->set("js/placeholderTypewriter.js");
$js->set("comment/comment.js");
$js->set("js/apps.js");
echo $js->get();
?>

<script>
    $(document).ready(function() {
        var randomTime = ['1 phút', '5 phút', '10 phút', '12 phút', '14 phút', '16 phút', '18 phút', '20 phút', '25 phút', '30 phút', '36 phút', '38 phút', '40 phút', '42 phút', '45 phút', '50 phút', '1 giờ', '2 giờ', '3 giờ'];
        let randomTimeAgo = Math.floor(Math.random() * randomTime.length);
        $('.product-buying-item:nth-child(1)').find('i span').text(randomTime[randomTimeAgo]);
        function cycleItems() {
            const currentItem = $('.product-buying-item.active');
            let nextItem = currentItem.next('.product-buying-item');
            
            if (nextItem.length === 0) {
                nextItem = $('.product-buying-item').first();
            }
            
            currentItem.removeClass('active');
            setTimeout(function() {
                nextItem.addClass('active');
                nextItem.find('i span').text(randomTime[randomTimeAgo]);
            }, 5000);
        }

        setTimeout(function() {
            $('.product-buying .product-buying-item:nth-child(1)').addClass('active');
            setInterval(cycleItems, 20000); // 10 seconds
        }, 10000);
    });
</script>

<!-- $js->set("js/jquery.textillate.js"); -->
<?php if (!empty($config['googleAPI']['recaptcha']['active'])) { ?>
    <!-- Js Google Recaptcha V3 -->
    <script src="https://www.google.com/recaptcha/api.js?render=<?= $config['googleAPI']['recaptcha']['sitekey'] ?>"></script>
    <script type="text/javascript">
        grecaptcha.ready(function() {
            /* Newsletter */
            generateCaptcha('Newsletter', 'recaptchaResponseNewsletter');

            <?php if ($source == 'contact') { ?>
                /* Contact */
                generateCaptcha('contact', 'recaptchaResponseContact');
            <?php } ?>
        });
    </script>
<?php } ?>

<?php if (!empty($config['oneSignal']['active'])) { ?>
    <!-- Js OneSignal -->
    <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
    <script type="text/javascript">
        var OneSignal = window.OneSignal || [];
        OneSignal.push(function() {
            OneSignal.init({
                appId: "<?= $config['oneSignal']['id'] ?>"
            });
        });
    </script>
<?php } ?>
<script type="text/javascript">
    var times = 0;
    $('.btn-xemthem').click(function (e) { 
        $('.btn-xemthem').html('Loading...');
        setTimeout(() => {
            times = times + 1;
            var maxload = $('.btn-xemthem').data('maxload');
            $.ajax({
                type: "post",
                url: "api/loadmore.php",
                data: {
                    times: times
                },
                dataType: "html",
                success: function (res) {
                    $('.producthot-inner').append(res);
                    if(times == maxload) {
                        $('.btn-xemthem').hide();
                    }
                    $('.btn-xemthem').html('Xem thêm');
                }
            });
        }, 2000);
        
    });

    $(window).scroll(function() {
        if ($(window).scrollTop() >= $(".header-menu-d").height()) {
            $(".header-menu-d").addClass("menu_fix");
            // $(".left_dm").addClass("left_dm_fix");

        } else {
            $(".header-menu-d").removeClass("menu_fix");
            // $(".left_dm").removeClass("left_dm_fix");

        }
    });
</script>
<script type="text/javascript">
   $(window).scroll(function(){
       if($(window).scrollTop() >= $(".menu-res").height())
       {
           $(".menu-res").addClass("menu_fix_res");
           // $(".left_dm").addClass("left_dm_fix");
 
       }
       else
       {
           $(".menu-res").removeClass("menu_fix_res");
           // $(".left_dm").removeClass("left_dm_fix");
         
       }
   });
</script> 
<script src="//sp.zalo.me/plugins/sdk.js"></script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-55e11040eb7c994c"></script>

<script>
    function sosanhgia(idsp) {
        var idsp = idsp;
        $.ajax({
            type: "post",
            url: "api/sosanhgia.php",
            data: {
                idsp
            },
            dataType: "html",
            success: function (res) {
                // Mở popup FancyBox
                $.fancybox.open({
                    src: res,
                    type: 'html', 
                    opts: {
                        
                    }
                });
            }
        }); 
    }
</script>

<!-- SDK Facebook -->
<div id="fb-root"></div>
<script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.async = true;
        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.6";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<script>
    $().ready(function() {
        /* Chat Facebook */
        $(".js-facebook-messenger-box").on("click", function() {
                $(
                        ".js-facebook-messenger-box, .js-facebook-messenger-container"
                    ).toggleClass("open"),
                    $(".js-facebook-messenger-tooltip").length &&
                    $(".js-facebook-messenger-tooltip").toggle();
            }),
            $(".js-facebook-messenger-box").hasClass("cfm") &&
            setTimeout(function() {
                $(".js-facebook-messenger-box").addClass("rubberBand animated");
            }, 3500),
            $(".js-facebook-messenger-tooltip").length &&
            ($(".js-facebook-messenger-tooltip").hasClass("fixed") ?
                $(".js-facebook-messenger-tooltip").show() :
                $(".js-facebook-messenger-box").on("hover", function() {
                    $(".js-facebook-messenger-tooltip").show();
                }),
                $(".js-facebook-messenger-close-tooltip").on("click", function() {
                    $(".js-facebook-messenger-tooltip").addClass("closed");
                }));
        $(".search_open").click(function() {
            $(".search_box_hide").toggleClass("opening");
        });
    });
</script>


<!-- Js Structdata -->
<?php include TEMPLATE . LAYOUT . "strucdata.php"; ?>

<!-- Js Addons -->
<?= $addons->set('script-main', 'script-main', 2); ?>
<?= $addons->get(); ?>

<!-- Js Body -->
<?= htmlspecialchars_decode($setting['bodyjs']) ?>