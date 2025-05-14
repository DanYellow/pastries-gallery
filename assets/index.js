const listItems = document.querySelectorAll("[data-gallery-item-link]");
listItems.forEach(($item) => {
    $item.addEventListener("click", (e) => {
        e.preventDefault();
        listItems.forEach(($el) => {
            $el.querySelector("img").style = "";
        });

        window.location.href = e.currentTarget.href;
        e.currentTarget
            .querySelector("img")
            .style.setProperty("view-transition-name", "image");
    });
});


// const listNavigationLinks = document.querySelectorAll("[data-navigation-link]");
// listNavigationLinks.forEach(($item) => {
//     $item.addEventListener("click", (e) => {
//         e.preventDefault();
//         document.documentElement.style.setProperty(
//             '--direction',
//             Number(e.currentTarget.dataset.navigationLink)
//         );

//         const currentColor = getComputedStyle(document.documentElement).getPropertyValue('--direction');

//         window.location.href = e.currentTarget.href;
//     })
// })
