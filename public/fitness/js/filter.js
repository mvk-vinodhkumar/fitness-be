const coachData = [...document.querySelectorAll('.coachData')];
const input = document.getElementById("inputSearch");
const coachBoxes = [...document.querySelectorAll('.coachBox')];

input.onkeyup = function () {
    displayAll();
    coachBoxes.forEach(function (item) {
        if (!item.textContent.replace(/ /g, "").slice(0, 12).toLowerCase().includes(input.value.toLowerCase())) {
            item.style.display = "none"
        }
    })
}

function displayAll() {
    coachBoxes.forEach(function (item) {
        item.style.display = "flex"
    })
}

function textSlice(e) {
    if (e.matches) {
        coachData.forEach(function (item) {
            item.textContent = item.textContent.slice(0, 170) + "..."
        })
    }
}

const media = window.matchMedia("(max-width: 768px)")
textSlice(media)
media.addListener(textSlice) 