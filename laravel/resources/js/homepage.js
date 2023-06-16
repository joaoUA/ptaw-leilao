const licitarBtns = Array.from(
    document.querySelectorAll(".my-card-sub > button")
);

const auctionCards = Array.from(document.querySelectorAll(".my-card"));

auctionCards?.forEach(card => {
    const auctionId = card.getAttribute('data-auction-id');
    console.log(`Subscribed to channel: auction.${auctionId}`);

    const bidPlacedChannel = window.Echo.channel(`auction.${auctionId}`);
    bidPlacedChannel.listen('.bid-placed', (event) => {
        const bidElement = card.querySelector('.my-card-value');
        bidElement.innerText = `${event.bid}€`;
    });
})