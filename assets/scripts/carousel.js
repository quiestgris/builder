let leftItem = document.querySelector(".carousel-item.left-item");
let rightItem = document.querySelector(".carousel-item.right-item");
let middleItem = document.querySelector(".carousel-item.active");
let positionOfActiveItem;

document.querySelector(".previous-page-btn").addEventListener("click", function() {
    requestAnimationFrame(function () {
        
        leftItem.childNodes[1].childNodes[3].style.opacity = "0";
        leftItem.style.zIndex = 2;
        // leftItem.innerHTML = middleItem.innerHTML;
        // middleItem.innerHTML = leftItemInnerHTML;
    })
})
let nextPageBtn = document.querySelector(".next-page-btn");