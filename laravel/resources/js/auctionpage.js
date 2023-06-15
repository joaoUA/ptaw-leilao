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
        //auctionChannel.whisper('.bid-placed', response.data);

    } catch (error) {
        console.error(error);
    }
});

let highestBid = 0;
if (bidInputField != null) {
    setInterval(getHighestBid, 1000);

    const auctionItemId = btnBid.getAttribute('data-auction-item-id');

    async function getHighestBid() {
        try {
            const response = await fetch(`/api/highest-bid/${auctionItemId}`)
            const data = await response.json();

            const highestBid = data['highestBid'];
            const bidElement = document.getElementById('highest-bid');
            bidElement.innerText = `${highestBid}€`;
        } catch (error) {
            console.log(error);
        }
    }
}

const auctionId = btnBid.getAttribute('data-auction-id');
const auctionChannel = window.Echo.channel(`auction.${auctionId}`);
auctionChannel.listen('.bid-placed', (ev) => {
    console.log('NEW BID: DING DING DING!');
});