// sticky footer
if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
  var sumedges = window.innerWidth + window.innerHeight;
  window.onresize = function () {
    if (window.innerWidth + window.innerHeight < sumedges) {
      const footerArr = document.getElementsByClassName("footer1");
      for (let i = 0; i < footerArr.length; i++) {
        footerArr[i].style.bottom = "auto";
      }
    } else {
      const footerArr = document.getElementsByClassName("footer1");
      for (let i = 0; i < footerArr.length; i++) {
        footerArr[i].style.bottom = "0";
      }
    }
  };
}

// password show

function showPass() {
  var x = document.getElementById("sandi");
  var y = document.getElementById("hide1");
  var z = document.getElementById("hide2");

  if (x.type === "password") {
    x.type = "text";
    y.style.display = "block";
    z.style.display = "none";
  } else {
    x.type = "password";
    y.style.display = "none";
    z.style.display = "block";
  }
}

// sidebar
const sidebar = document.getElementById("navbarNav");
const toggle = document.getElementById("tujuan");
const hitam = document.getElementById("backdrop");
const scrolling = document.getElementById("body");

toggle.onclick = function () {
  toggle.classList.toggle("active");
  sidebar.classList.toggle("active");
  hitam.classList.toggle("active");
  scrolling.classList.toggle("active");
};

hitam.onclick = function () {
  toggle.classList.remove("active");
  sidebar.classList.remove("active");
  hitam.classList.remove("active");
  scrolling.classList.remove("active");
};


const selected = document.querySelector(".gender");
const optionsContainer = document.querySelector(".options-container");

const optionsList = document.querySelectorAll(".options");

optionsList.forEach((o) => {
  o.addEventListener("click", () => {
    selected.innerHTML = o.querySelector("a").innerHTML;
  });
});
