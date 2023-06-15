const btnConfirmProfileChanges = document.getElementById("btn-confirm-profile-changes");
const btnRequestSellerStatus = document.getElementById("btn-request-seller-status");
const btnRequestAdminStatus = document.getElementById("btn-request-admin-status");

btnConfirmProfileChanges?.addEventListener('click', () => {

});


btnRequestSellerStatus?.addEventListener('click', async () => {
    const userId = btnRequestSellerStatus.getAttribute('data-user-id')

    try {
        const response = await fetch(`/api/role-change/${userId}/seller`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({}),
        });

        if (response.ok)
            window.location.reload();
        else
            throw new Error(`Erro: ${response.status}`);

    } catch (error) {
        console.error(error)
    }
});

btnRequestAdminStatus?.addEventListener('click', async () => {
    const userId = btnRequestAdminStatus.getAttribute('data-user-id');

    try {
        const response = await fetch(`/api/role-change/${userId}/admin`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({}),
        });

        if (!response.ok)
            throw new Error(`Erro: ${response.status}`);

    } catch (error) {
        console.log(error);
    }
})