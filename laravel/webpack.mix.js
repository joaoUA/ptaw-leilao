const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/auctionpage.js', 'public/js')
    .js('resources/js/historypage.js', 'public/js')
    .js('resources/js/homepage.js', 'public/js')
    .js('resources/js/main.js', 'public/js')
    .js('resources/js/newauctionpage.js', 'public/js')
    .js('resources/js/profilepage.js', 'public/js')
    .js('resources/js/verificationpage.js', 'public/js')
    .js('resources/js/navbar.js', 'public/js')
    .js('resources/js/walletpage.js', 'public/js');
