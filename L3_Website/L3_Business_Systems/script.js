const sideMENU = document.querySelector("aside");
const menuBtn = document.querySelector("#menu-btn");
const closeBtn = document.querySelector("#close-btn");
const themeToggler = document.querySelector(".theme-toggler");

menuBtn.addEventListener('click', () => {
    sideMENU.style.display = 'block';
});

closeBtn.addEventListener('click', () => {
    sideMENU.style.display = 'none';
}); 
themeToggler.addEventListener('click', () => {
    document.body.classList.toggle('dark-theme-variables');

    themeToggler.querySelector('span:nth-child(1)').classList.toggle('active');
    themeToggler.querySelector('span:nth-child(2)').classList.toggle('active');
});

Orders.forEach(order => {
    const tr = document.createElement('tr');
    const trContent = `
        <td>${order.productName}</td>
        <td>${order.productNumber}</td>
        <td class="${order.paymentStatus === 'Paid' ? 'success' : order.paymentStatus === 'Pending' ? 'warning' : 'danger'}">${order.paymentStatus}</td>
        <td class="${order.shipping === 'Delivered' ? 'success' : order.shipping === 'Pending' ? 'warning' : 'danger'}">${order.shipping}</td>
        <td class="primary">Details</td>
    `;
    tr.innerHTML = trContent;
    document.querySelector('table tbody').appendChild(tr);
})

