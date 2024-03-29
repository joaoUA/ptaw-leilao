const btnBid = document.getElementById('btn-bid');
const bidInputField = document.getElementById('bid-input-field');

btnBid?.addEventListener('click', async () => {
    const auctionId = btnBid.getAttribute('data-auction-id');
    const auctionItemId = btnBid.getAttribute('data-auction-item-id');
    const userId = btnBid.getAttribute('data-user-id');

    let bid = bidInputField.value;
    if (bid == '')
        return;
    bid = parseInt(bid);

    bidInputField.value = null;

    try {
        const response = await fetch('/api/bid', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            }, body: JSON.stringify({
                auctionId: auctionId,
                auctionItemId: auctionItemId,
                bid: bid,
                userId: userId
            })
        });
        const data = await response.json();
        if (!response.ok) {
            const errorMessage = data['message'];
            throw new Error(`${response.status}: ${errorMessage}`);
        }
        const successMessage = data['message'];
        console.log(successMessage);

    } catch (error) {
        console.error(error);
    }
});

const auctionId = btnBid.getAttribute('data-auction-id');

const bidPlacedChannel = window.Echo.channel(`auction.${auctionId}`);
console.log(`Subscribed to channel: auction.${auctionId}`);
bidPlacedChannel.listen('.bid-placed', (event) => {
    const bidElement = document.getElementById('highest-bid');
    console.log(event);
    bidElement.innerText = `${event.bid}€`;
});