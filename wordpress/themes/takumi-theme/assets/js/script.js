// jQuery を使用した処理
jQuery(function () {
    // スクロール判定
    jQuery(window).on("scroll", function () {
        if (100 < jQuery(this).scrollTop()) {
            jQuery("body").attr("data-scroll", "true");
        } else {
            jQuery("body").attr("data-scroll", "false");
        }
    });

    // ドロワーの開閉処理
    jQuery(".js-drawer").on("click", function (e) {
        e.preventDefault();
        let targetClass = jQuery(this).attr("data-target");
        jQuery("." + targetClass).toggleClass("is-checked");

        // スクロールを無効化するために body にクラスを追加/削除
        if (jQuery("." + targetClass).hasClass("is-checked")) {
            jQuery("body").addClass("no-scroll");
        } else {
            jQuery("body").removeClass("no-scroll");
        }
        return false;
    });

    // ビューポートの幅が768px以上になったらクラスを削除
    jQuery(window).on("resize", function () {
        if (window.innerWidth >= 768) {
            jQuery(".is-checked").removeClass("is-checked");
            jQuery("body").removeClass("no-scroll");
        }
    });

    // スムーススクロール
    jQuery('a[href^="#"]').click(function () {
        let header = jQuery("#header").height();
        let speed = 300;
        let id = jQuery(this).attr("href");
        let target = jQuery("#" == id ? "html" : id);
        let position = jQuery(target).offset().top - header;
        if ("fixed" !== jQuery("#header").css("position")) {
            position = jQuery(target).offset().top;
        }
        if (0 > position) {
            position = 0;
        }
        jQuery("html, body").animate(
            {
                scrollTop: position
            },
            speed
        );
        return false;
    });

    // 電話リンクの無効化（PCのみ）
    let ua = navigator.userAgent;
    if (ua.indexOf("iPhone") < 0 && ua.indexOf("Android") < 0) {
        jQuery('a[href^="tel:"]')
            .css("cursor", "default")
            .on("click", function (e) {
                e.preventDefault();
            });
    }
});

// フェードインアニメーション
document.addEventListener('DOMContentLoaded', function () {
    const fadeInElements = document.querySelectorAll('.js-fade-in');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
            }
        });
    });

    fadeInElements.forEach((el) => observer.observe(el));
});