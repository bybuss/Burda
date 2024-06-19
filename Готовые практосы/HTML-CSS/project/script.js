// Получаем элементы
const modal = document.getElementById("purchase-modal");
const closeButton = document.querySelector(".close-button");
const buyButtons = document.querySelectorAll(".buy-button");
const productNameSelect = document.getElementById("product-name");

// Функция для открытия модального окна
function openModal(productName) {
    productNameSelect.value = productName;
    modal.style.display = "block";
}

// Функция для закрытия модального окна
function closeModal() {
    modal.style.display = "none";
}

// Добавляем обработчики событий для кнопок "Купить"
buyButtons.forEach(button => {
    button.addEventListener("click", (event) => {
        const productName = event.target.getAttribute("data-product");
        openModal(productName);
    });
});

// Добавляем обработчик события для кнопки закрытия модального окна
closeButton.addEventListener("click", closeModal);

// Закрываем модальное окно при клике вне его области
window.addEventListener("click", (event) => {
    if (event.target == modal) {
        closeModal();
    }
});
