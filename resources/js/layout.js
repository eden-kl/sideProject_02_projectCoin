$(function () {
    let body = $('body');
    calculatePage();
    if ($(window).width() < 1052) {
        body.addClass('sidebar-close');
        body.removeClass('sidebar-open');
    }else {
        body.addClass('sidebar-open');
        body.removeClass('sidebar-close');
    }

    if (body.hasClass('login-page') || body.hasClass('register-page')) {
        $('.content-wrapper').addClass('flex flex-col justify-center items-center');
    }else {
        $('.content-wrapper').addClass('ml-72');
        $('footer').addClass('ml-72');
    }

    $(window).on('resize', function () {
        calculateSideBar();
        calculatePage();
    });

    $('#menuBtn').on('click', function (e) {
        e.preventDefault();
        let aside = $('aside');
        let footer = $('footer');
        let header = $('.wrapper > nav');
        let content = $('.wrapper > .content-wrapper');
        let overlay = $('.sidebar-overlay');
        if (body.hasClass('sidebar-close')) {
            body.addClass('sidebar-expend');
            aside.addClass('animate-sidebar-open');
            overlay.css('display', 'block');
        }else {
            if (body.hasClass('sidebar-unexpended')) {
                body.removeClass('sidebar-unexpended');
                aside.removeClass('animate-sidebar-close');
                footer.removeClass('animate-navbar-close');
                header.removeClass('animate-navbar-close');
                content.removeClass('animate-navbar-close');
                aside.addClass('animate-sidebar-open');
                footer.addClass('animate-navbar-open');
                header.addClass('animate-navbar-open');
                content.addClass('animate-navbar-open');
            }else {
                body.addClass('sidebar-unexpended');
                aside.removeClass('animate-sidebar-open');
                footer.removeClass('animate-navbar-open');
                header.removeClass('animate-navbar-open');
                content.removeClass('animate-navbar-open');
                aside.addClass('animate-sidebar-close');
                footer.addClass('animate-navbar-close');
                header.addClass('animate-navbar-close');
                content.addClass('animate-navbar-close');
            }
        }
    });

    $('.sidebar-overlay').on('click', function () {
        let aside = $('aside');
        let overlay = $('.sidebar-overlay');
        body.removeClass('sidebar-expend');
        aside.removeClass('animate-sidebar-open');
        aside.addClass('animate-sidebar-close');
        overlay.css('display', 'none');
    });

    function calculateSideBar() {
        let aside = $('aside');
        let footer = $('footer');
        let header = $('.wrapper > nav');
        if ($(window).width() < 1052) {
            body.addClass('sidebar-close');
            body.removeClass('sidebar-open');
            aside.addClass('animate-sidebar-close');
            aside.removeClass('animate-sidebar-open');
            footer.addClass('animate-navbar-close');
            footer.removeClass('animate-navbar-open');
            header.addClass('animate-navbar-close');
            header.removeClass('animate-navbar-open');
        }else {
            body.addClass('sidebar-open');
            body.removeClass('sidebar-close');
            aside.addClass('animate-sidebar-open');
            aside.removeClass('animate-sidebar-close');
            footer.addClass('animate-navbar-open');
            footer.removeClass('animate-navbar-close');
            header.addClass('animate-navbar-open');
            header.removeClass('animate-navbar-close');
        }
    }

    function calculatePage() {
        let windowHeight = $(window).height();
        let footerHeight = $('footer').height();
        let headerHeight = $('.nav-head').height();
        let contentWrapper = $('.content-wrapper');
        $('aside').css('min-height', windowHeight + 'px');
        if (!body.hasClass('login-page') && !body.hasClass('register-page')) {
            let wrapperHeight = windowHeight - footerHeight - headerHeight;
            contentWrapper.css('min-height', (wrapperHeight - 24) + 'px');  //24:header 的 py-2
            contentWrapper.css('margin-top', (headerHeight + 24) + 'px');   //24:py-2
        }else {
            let wrapperHeight = windowHeight - footerHeight;
            contentWrapper.css('min-height', (wrapperHeight) + 'px');  //24:header 的 py-2
        }
    }
});
