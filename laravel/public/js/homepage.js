/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**********************************!*\
  !*** ./resources/js/homepage.js ***!
  \**********************************/
var licitarBtns = Array.from(document.querySelectorAll(".my-card-sub > button"));
var auctionCards = Array.from(document.querySelectorAll(".my-card"));
auctionCards === null || auctionCards === void 0 ? void 0 : auctionCards.forEach(function (card) {
  var auctionId = card.getAttribute('data-auction-id');
  console.log("Subscribed to channel: auction.".concat(auctionId));
  var bidPlacedChannel = window.Echo.channel("auction.".concat(auctionId));
  bidPlacedChannel.listen('.bid-placed', function (event) {
    var bidElement = card.querySelector('.my-card-value');
    bidElement.innerText = "".concat(event.bid, "\u20AC");
  });
});
/******/ })()
;