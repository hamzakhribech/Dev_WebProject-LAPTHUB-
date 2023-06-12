var dropdown = document.querySelectorAll(".dropdown");
// var dropdowni = document.querySelectorAll(".nav3 ul i");
var drp= document.querySelector(".drp");
var dropdowncontent = document.querySelector(".dropdown-content");
var inputcheckbox=document.querySelectorAll("input[type='checkbox']")


//----------------
document.addEventListener("click", function (event) {
dropdown.forEach((e) => {
  if (
    event.target.closest(".dropdown") === e |
    event.target.closest(".nav3  .fa-caret-down") === e
  ) {
    if (dropdowncontent.style.display == "none") {
      dropdowncontent.style.display = "block";
      document.querySelector(".nav3 ul i").className =
        "fa-solid fa-caret-up dropdwon";
    } else {
      dropdowncontent.style.display = "none";
      document.querySelector(".nav3 ul i").className =
        "fa-solid fa-caret-down dropdwon";
    }
  } else {
    dropdowncontent.style.display = "none";
    document.querySelector(".nav3 ul i").className =
      "fa-solid fa-caret-down dropdwon";
  }
});
});

 

//-------------------------------------------------------
const items = document.querySelectorAll(".searchbox ul li");
const itemsi = document.querySelectorAll(".searchbox ul li i");
const menus = document.querySelectorAll(".menu");
const menuoptions = document.querySelectorAll(".menu ul li");

const arrow = document.querySelectorAll(".menu ul li i");
checkfonctionality(menuoptions);
items.forEach((item) => {
  let lis = item.querySelector("i");
  lis.className = "fa fa-caret-down";

  item.addEventListener("click", (event) => {
    window.scrollTo({
      top: section.offsetTop - 100,
      behavior: "smooth",
    });
    let lisev = event.target.querySelector("i");
    if ((event.target.id = "selected")) {
      // event.innerHTML = ` ${item.textContent} <i  class="fa fa-caret-up"></i>`;
      arrowdown();
      lisev.className = "fa fa-caret-up";
      // event.target.classList.add("selecteditem");
    }
    // event.target.innerHTML = ` ${event.target.textContent} <i  class="fa fa-caret-up"></i>`;
    const selecteditem = item.className;
    console.log(selecteditem);
    let selectedmenu = document.getElementById(selecteditem);

    console.log(selectedmenu);
    const rect = event.target.getBoundingClientRect();
    console.log(rect);
    const left = rect.left;
    const top = rect.top + rect.height;
    itemsfunction(selecteditem, selectedmenu, left, top);
  });
});
document.addEventListener("click", (event) => {
  // Check if clicked element is inside the menu area
  if (
    event.target.closest(".menu") === null &&
    event.target.closest(".search") === null
  ) {
    menus.forEach((e) => {
      e.style.display = "none";
      arrowdown();
    });
  }
});
// let checking = (opitem) => {
//    let iteminner = opitem.innerHTML;
//   if (opitem.classList.contains("clickeditem")) {
//     opitem.innerHTML = iteminner;
//     opitem.classList.remove("clickeditem");
//   } else {
//     opitem.innerHTML = `${opitem.innerHTML}<i style=" position:absolute;   color: rgb(1, 25, 47);margin-top:28px;margin-left:30%;" class="fa-solid fa-check"></i>`;
//   }
// }
function arrowdown() {
  itemsi.forEach((item) => {
    nonselecting();
    item.className = "fa fa-caret-down";
    item.classList.remove("selecteditem");
  });
}
function nonselecting() {
  items.forEach((item) => {
    item.addEventListener("click", (ev) => {
      item.id = "nonselected";
      ev.target.id = "selected";
    });
  });
}
function itemsfunction(selecteditem, selectedmenu, left, top) {
  menus.forEach((option) => {
    if (option.id == selecteditem) {
      if (selectedmenu.style.display == "none") {
        selectedmenu.style.display = "block";
      } else {
        selectedmenu.style.display = "none";
        arrowdown();
      }
      selectedmenu.style.left = `${left - 50}px`;
      selectedmenu.style.top = `${-58}px`;
      selectedmenu.querySelectorAll(".menu ul li").forEach((opitem) => {
        // let iteminner = opitem.innerHTML;

        opitem.addEventListener("click", (e) => {
          checkiconoptions(e.target);
        });
      });
    } else {
      option.style.display = "none";
    }
  });
}

function checkfonctionality(e) {
  let box = e.querySelector("input[type='checkbox']");

  e.forEach((item) => {
    item.addEventListener("click", (ev) => {
      // console.log("---start---" + ev.target.id);
      if (ev.target.id == "checked") {
        // console.log("---in if---" + ev.target.id);
        box.checked = "checked";
        ev.target.id = "nonchecked";
        // console.log("---out if---" + ev.target.id);
      } else if (ev.target.id == "nonchecked") {
        // console.log("---in else---" + ev.target.id);
        ev.target.id = "checked";
        box.checked = "checked";
       console.log(box);

        // console.log("---out else---" + ev.target.id);
      } else {
        ev.target.id = "checked";
        box.checked = "checked";

      }

      console.log("---end22222---" + ev.target.id);
    });
  });
}

let checkiconoptions = function (e) {
  let i = e.querySelector("i");

  if (e.id == "nonchecked") {
    e.classList.remove("clickeditem");
    i.style.visibility = "hidden";
    console.log(box);
  } else {
    e.classList.add("clickeditem");
    i.style.visibility = "visible";
    box.checked = !checkbox.checked;
    console.log(box);

     
 
    //  e.target.innerHTML = `${iteminner}<i style=" position:absolute;   color: rgb(1, 25, 47);margin-top:28px;margin-left:30%;" class="fa-solid fa-check"></i>`;
  }
};
//-------------------session storage for menuoptions------------------------
window.addEventListener("load", () => {
  for (let i = 0; i < menus.length; i++) {
    let lis = menus[i].querySelectorAll("li");
    for (let j = 0; j < lis.length; j++) {
      if (lis[j].id == "checked") {
        sessionStorage.setItem(`menuop${i}-${j}`, lis[j].id);
      } else {
        sessionStorage.setItem(`menuop${i}-${j}`, "nonchecked");
      }
    }
  }
});
window.addEventListener("load", () => {
  for (let i = 0; i < menus.length; i++) {
    let lis = menus[i].querySelectorAll("li");
    let box = menus[i].querySelectorAll("input[type='checkbox']");
    for (let j = 0; j < lis.length; j++) {
      let id = sessionStorage.getItem(`menuop${i}-${j}`);
        lis[j].id = id;
      if (lis[j].id == "checked") {
        lis[j].classList.add("clickeditem");
        lis[j].querySelector("i").style.visibility = "visible";
        // // box[j].checked = true;
        // box[j].id = "checked";
        // box[j].className = "clickeditem";
        
        
        //  e.target.innerHTML = `${iteminner}<i style=" position:absolute;   color: rgb(1, 25, 47);margin-top:28px;margin-left:30%;" class="fa-solid fa-check"></i>`;
      } else {
        lis[j].classList.remove("clickeditem");
        lis[j].querySelector("i").style.visibility = "hidden";
        // box[j].checked = false;
        //  box[j].id = "nonchecked";
        

      }
    }
  }
});
//----------------------------------------------------------
// document.addEventListener("click", (event) => {
//   const isClickInsideMenu =
//     menus.contains(event.target) && items.contains(event.target); ;
//   if (!isClickInsideMenu) {
//     // Hide the menu options
//     menus.forEach((option) => {
//       option.style.display = "none";
//     });
//   }
// });
//-------------------------------------------------------------------

let result = document.querySelector(".result");
let filterbox = document.querySelector(".filter");
let section = document.querySelector("section");

//for make visibility motion you now
let GO = document.querySelector(".searchbox button");
GO.addEventListener("click", (event) => {
  menus.forEach((e) => {
    e.style.display = "none";
  });
  result.classList.add("visible");
  filterbox.classList.add("visible");
  document.querySelector(".resultnumber").classList.add("visible");
  window.scrollTo({
    top: section.offsetTop,
    behavior: "smooth",
  });
  console.log("hi");
});
let GOid = document.querySelector("#GO");
GOid.addEventListener("click", (event) => {
  menus.forEach((e) => {
    e.style.display = "none";
  });
  result.classList.add("visible");
  filterbox.classList.add("visible");
  document.querySelector(".resultnumber").classList.add("visible");
  window.scrollTo({
    top: section.offsetTop,
    behavior: "smooth",
  });
  console.log("hi");
});

let checking = function (
  lielm,
  checkclas,
  noncheckclass,
  checkcolor,
  noncheckcolor
) {
  lielm.forEach((option) => {
    if (option.id != "checked" && option.id != "nonchecked") {
      option.className = noncheckclass;
      option.id = "nonchecked";
    }
    option.addEventListener("click", (event) => {
      console.log("before if" + event.target.id);
      if (event.target.id == "nonchecked") {
        event.target.className = checkclas;
        event.target.id = "checked";
        console.log("in if" + event.target.id);
        event.target.style.color = checkcolor;
      } else if (event.target.id == "checked") {
        event.target.className = noncheckclass;
        event.target.id = "nonchecked";
        event.target.style.color = noncheckcolor;
      }
    });
  });
};

//-----------------------session storage for filteroptions----------------------
let filteroption = document.querySelectorAll(".filterbox ul li i");
window.addEventListener("load", () => {
  for (let i = 0; i < filteroption.length; i++) {
    let id = sessionStorage.getItem(`filterop${i}`);
    if (id == "checked") {
      filteroption[i].className = "fa-solid fa-square-check";
      filteroption[i].id = "checked";
    } else {
      filteroption[i].className = " fa-regular fa-square";
      filteroption[i].id = "nonchecked";
    }
  }
});

//-----------------------filtercheck----------------------
checking(filteroption, "fa-solid fa-square-check", " fa-regular fa-square");
filteroption.forEach((element) => {
  element.addEventListener("click", () => {
    for (let i = 0; i < filteroption.length; i++) {
      sessionStorage.setItem(`filterop${i}`, `${filteroption[i].id}`);
    }
  });
});

//-----------------------favoris-check----------------------
let favorisoption = document.querySelectorAll(".resultbox .imgcontainer>p i");
checking(
  favorisoption,
  "fa-classic fa-solid fa-heart",
  "fa-classic fa-regular fa-heart",
  "red",
  "white"
);

//humbergermenue
let humbergermenue = document.querySelector("#hamburger-menu .fa-bars ");
let sidbar = document.querySelector("#sidebar-menu");
let sidbaroff = document.querySelector("#sidbaroff");

let elements = document.querySelector(".backblur");

humbergermenue.addEventListener("click", () => {
  sidbar.style.display = "block";
  sidbar.classList.remove("slidingoff");
  sidbar.classList.add("sliding");
  // elements.style.display = "block";
  // document.querySelector(
  //   "nav").style.cssText = `filter: blur(5px);`;
});
document.addEventListener("click", (event) => {
  // Check if clicked element is inside the menu area
  if (
    event.target.closest("#sidebar-menu i") != null ||
    event.target.closest("#hamburger-menu") === null
  ) {
    menus.forEach((e) => {
      sidbar.classList.remove("sliding");
      sidbar.classList.add("slidingoff");
      // sidbar.style.display = "none";
      // elements.style.display = "none";
    });
  }
});

// var brand = [];
// var cpu = [];
// var ram = [];
// var memory = [];
// var display = [];
// var resolution = [];
// var xhr = new XMLHttpRequest();

//------------ data base connect -------
// let getselectedoptions = function (i, k) {
//   switch (i) {
//     case 0:
//       if (k.id == "checked" && !brand.includes(k.innerText)) {
//         brand.push(k.innerText);
//       }
//       if (brand.indexOf(k.innerText) !== -1 && k.id == "nonchecked") {
//         brand.splice(brand.indexOf(k.innerText), 1);
//       }

//       break;
//     case 1:
//       if (k.id == "checked" && !cpu.includes(k.innerText)) {
//         cpu.push(k.innerText);
//       }
//       if (cpu.indexOf(k.innerText) !== -1 && k.id == "nonchecked") {
//         cpu.splice(cpu.indexOf(k.innerText), 1);
//       }
//       break;
//     case 2:
//       if (k.id == "checked" && !ram.includes(k.innerText)) {
//         ram.push(k.innerText);
//       }
//       if (ram.indexOf(k.innerText) !== -1 && k.id == "nonchecked") {
//         ram.splice(ram.indexOf(k.innerText), 1);
//       }

//       break;
//     case 3:
//       if (k.id == "checked" && !memory.includes(k.innerText)) {
//         memory.push(k.innerText);
//       }
//       if (memory.indexOf(k.innerText) !== -1 && k.id == "nonchecked") {
//         memory.splice(memory.indexOf(k.innerText), 1);
//       }

//       break;
//     case 4:
//       if (k.id == "checked" && !display.includes(k.innerText)) {
//         display.push(k.innerText);
//       }
//       if (display.indexOf(k.innerText) !== -1 && k.id == "nonchecked") {
//         display.splice(display.indexOf(k.innerText), 1);
//       }

//       break;
//     case 5:
//       if (k.id == "checked" && !resolution.includes(k.innerText)) {
//         resolution.push(k.innerText);
//       }
//       if (resolution.indexOf(k.innerText) !== -1 && k.id == "nonchecked") {
//         resolution.splice(resolution.indexOf(k.innerText), 1);
//       }

//       break;
//     default:
//     // code to execute when none of the above conditions are met
//   }
// };




//----solution not workin  to send data to php
// xhr.onreadystatechange = function () {
//   if (this.readyState == 4 && this.status == 200) {
//     // Handle the response from the server
//     console.log(this.responseText);
//   }
// };

// // Set up a connection to the PHP script on the server
// xhr.open("POST", "../index.php", true);

// // Set the content type of the request
// xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");

// // Send data to the PHP script on the server
// 
///////////////////////////////////////////////////
menuoptions.forEach((e) => {
  e.addEventListener("click", () => {
    for (let i = 0; i < menus.length; i++) {
      let lis = menus[i].querySelectorAll("li");
      for (let j = 0; j < lis.length; j++) {
        getselectedoptions(i, lis[j]);

        console.log("emmm dakornid");
      }
    }
    console.log("brand:" + brand);
    console.log("cpu:" + cpu);
    console.log("ram:" + ram);
    console.log("memory:" + memory);
    console.log("display:" + display);
    console.log("resolution:" + resolution);
    // Define the callback function;;
  });
});

// XHR SEND DATA
// const xhr_send_data = (data = {}) => {
//   // Instantiate a new XHR
//   const xhr = new XMLHttpRequest();

//   xhr.addEventListener("readystatechange", () => {
//     if (xhr.readyState === 4 && xhr.status === 200)
//       check_data(xhr.responseText);
//   });

//   xhr.open("POST", "../index.php", true);
//   xhr.setRequestHeader("Content-Type", "application/json");

//   const payload = {
//     brand: data.brand.map((value) => encodeURIComponent(value)),
//     cpu: data.cpu.map((value) => encodeURIComponent(value)),
//     ram: data.ram.map((value) => encodeURIComponent(value)),
//     memory: data.memory.map((value) => encodeURIComponent(value)),
//     display: data.display.map((value) => encodeURIComponent(value)),
//     resolution: data.resolution.map((value) => encodeURIComponent(value)),
//   };

//   xhr.send(JSON.stringify(payload));
// };

// var message = "I'm here";

// $.ajax({
//   type: "POST",
//   url: "../index.php",
//   data: { message: message },
//   success: function (response) {
//     console.log(response);
//   },
// });



//--------------sign in and out function--------
let signb = document.querySelector(".nav3 ul .active");
let contus = document.querySelector(".nav3 ul .contus");
let prfimg = document.querySelector(".nav3 ul .profilrcontr ");
let prfimgi = document.querySelector(".nav3 ul i");
let signb2 = document.querySelector("#s");
let creataccb = document.querySelector(" #cr");
let sideprfimg = document.querySelector(".containerprfside .profilrcontrside");
let sideinfos = document.querySelector(".containerprfside .infospside");
let sidbarlis = document.querySelector( ".dropdown-contentside .containerprfliside");

var signedout = function () {
  prfimg.style.display = "none"
  prfimgi.style.display = "none";
  sideprfimg.style.display = "none";
  sideinfos.style.display = "none";
  sidbarlis.style.display = "none";
  signb.style.display = "block";
  signb2.style.display = "block";
  contus.style.display = "block";
  creataccb.style.display = "block";
  
}
var signedin = function () {
  prfimg.style.display = "block"
  prfimgi.style.display = "block";
  sideprfimg.style.display = "block";
  sideinfos.style.display = "block";
  sidbarlis.style.display = "block";
  signb.style.display = "none";
  signb2.style.display = "none";
  contus.style.display = "none";
  creataccb.style.display = "none";
}
// signedin();


// JavaScript code
var data = {
  name: "John",
  age: 25,
};

fetch('../index.php', {
  method: 'POST',
  headers: {
    'Content-Type': 'application/json',
  },
  body: JSON.stringify(data),
})
  .then(response => response.text())
  .then(result => {
    // Handle the response from PHP
    console.log(result);
  })
  .catch(error => {
    // Handle any errors
    console.error('Error:', error);
  });
// var statust = document.getElementById("status").getAttribute("data-status");
// if (statust == "true") {
// localStorage.setItem("online", "yes");
// }
// else {
// localStorage.setItem("online", "yes");
// }

// window.addEventListener("load", () => {
//   if (localStorage.getItem("online")== "yes") {
//     signedin();
// }
// else {
//     signedout();
// }
// })















//menuoptions.forEach(() => {
//   window.addEventListener("load", () => {
//     for (let i = 0; i < menus.length; i++) {
//       let lis = menus[i].querySelectorAll("li");
//       for (let j = 0; j < lis.length; j++) {
//         getselectedoptions(i, lis[j]);
//         console.log("emmm dakornid");
//       }
//     }
//      console.log("brand:" + brand);
//      console.log("cpu:" + cpu);
//      console.log("ram:" + ram);
//      console.log("memory:" + memory);
//      console.log("display:" + display);
//      console.log("resolution:" + resolution);
//   });

//   });
// });
// Create an XMLHTTPRequest object

//=-------
/*


const items = document.querySelectorAll(".searchbox ul li");
const itemsi = document.querySelectorAll(".searchbox ul li i");
const menus = document.querySelectorAll(".menu");
const menuoptions = document.querySelectorAll(".menu ul li");
const arrow = document.querySelectorAll(".menu ul li i");
checkfonctionality(menuoptions);

items.forEach((item) => {
    item.innerHTML = ` ${item.textContent} <i  class="fa fa-caret-down"></i>`;
  item.addEventListener("click", (event) => {
        window.scrollTo({
          top: section.offsetTop-100,
          behavior: "smooth",
        });
      arrowdown();
      if ((event.target.id = "selected")) {
        event.innerHTML = ` ${item.textContent} <i  class="fa fa-caret-up"></i>`;
        // event.target.classList.add("selecteditem");

      }
      event.target.innerHTML = ` ${event.target.textContent} <i  class="fa fa-caret-up"></i>`;
      const selecteditem = item.className;
      console.log(selecteditem);
       let selectedmenu = document.getElementById(selecteditem);
    
    
      console.log(selectedmenu);
      const rect = event.target.getBoundingClientRect();
      console.log(rect);
      const left = rect.left;
      const top = rect.top + rect.height;
      console.log(item.innerHTML);
      console.log(item.innerHTML);
      itemsfunction(selecteditem,selectedmenu,left,top);

    });
});
  document.addEventListener("click", (event) => {
    // Check if clicked element is inside the menu area
    if (
      event.target.closest(".menu") === null &&
      event.target.closest(".search") === null
    ) {
      menus.forEach((e) => {
        e.style.display = "none";
        arrowdown();
      });
    }
  });
// let checking = (opitem) => {
//    let iteminner = opitem.innerHTML;
//   if (opitem.classList.contains("clickeditem")) {
//     opitem.innerHTML = iteminner;
//     opitem.classList.remove("clickeditem");
//   } else {
//     opitem.innerHTML = `${opitem.innerHTML}<i style=" position:absolute;   color: rgb(1, 25, 47);margin-top:28px;margin-left:30%;" class="fa-solid fa-check"></i>`;
//   }
// }
function arrowdown(){
  itemsi.forEach((item) => {
    nonselecting();
    item.innerHTML = ` ${item.textContent} <i  class="fa fa-caret-down"></i>`;
    item.classList.remove("selecteditem");
  });
}
function nonselecting() {
  items.forEach((item) => {
    item.addEventListener("click", (ev) => {
      item.id = "nonselected";
      ev.target.id = "selected";
    });
  });
}
function itemsfunction(selecteditem, selectedmenu,left,top){
  menus.forEach((option) => {
    if (option.id == selecteditem) {
      if (selectedmenu.style.display == "none") {
        selectedmenu.style.display = "block";
      } else {
        selectedmenu.style.display = "none";
        arrowdown();
      }
       selectedmenu.style.left = `${left - 50}px`;
       selectedmenu.style.top = `${-58}px`;

      selectedmenu.querySelectorAll(".menu ul li").forEach((opitem) => {
        // let iteminner = opitem.innerHTML;
        opitem.addEventListener("click", (e) => {
         checkiconoptions(e.target);
        });
      });
    } else {
      option.style.display = "none";
    }
  });
};


function checkfonctionality(e){
  e.forEach((item) => {
    item.addEventListener("click", (ev) => {
      // console.log("---start---" + ev.target.id);
      if (ev.target.id == "checked") {
        // console.log("---in if---" + ev.target.id);
        ev.target.id = "nonchecked";
        // console.log("---out if---" + ev.target.id);
      } else if (ev.target.id == "nonchecked") {
        // console.log("---in else---" + ev.target.id);
        ev.target.id = "checked";
        // console.log("---out else---" + ev.target.id);
      } else {
        ev.target.id = "checked";
      }

      console.log("---end---" + ev.target.id);
    });
  });

}

// let checkiconoptions = (e) => {
//     let i = e.querySelector("i");
//    if (e.id == "nonchecked") {
//      e.classList.remove("clickeditem");
//      i.style.visibility= "hidden";
//      } else {
//      e.classList.add("clickeditem");
//      i.style.visibility = "visible";
//     //  e.target.innerHTML = `${iteminner}<i style=" position:absolute;   color: rgb(1, 25, 47);margin-top:28px;margin-left:30%;" class="fa-solid fa-check"></i>`;
//      }
// }

// document.addEventListener("click", (event) => {
//   const isClickInsideMenu =
//     menus.contains(event.target) && items.contains(event.target); ;
//   if (!isClickInsideMenu) {
//     // Hide the menu options
//     menus.forEach((option) => {
//       option.style.display = "none";
//     });
//   }
// });
//-------------------------------------------------------------------

let result = document.querySelector(".result");
let filterbox = document.querySelector(".filter");
let section = document.querySelector("section");

//for make visibility motion you now
let GO = document.querySelector(".searchbox button");
GO.addEventListener("click", (event) => {
  menus.forEach((e) => {
     e.style.display = "none";
  })
  result.classList.add("visible");
  filterbox.classList.add("visible");
  document.querySelector(".resultnumber").classList.add("visible");
   window.scrollTo({
     top:section.offsetTop,
     behavior: "smooth",
   });
  console.log("hi");
});


let checking = function (lielm,checkclas,noncheckclass,checkcolor,noncheckcolor) {

  lielm.forEach((option) => {
    if (option.id != "checked" && option.id != "nonchecked") {
      option.className = noncheckclass;
      option.id = "nonchecked";
    }
    option.addEventListener("click", (event) => {
      console.log("before if" + event.target.id);
      if (event.target.id == "nonchecked") {
        event.target.className = checkclas;
        event.target.id = "checked";
        console.log("in if" + event.target.id);
      event.target.style.color = checkcolor;
      } else if (event.target.id == "checked") {
        event.target.className = noncheckclass;
        event.target.id = "nonchecked";
        event.target.style.color = noncheckcolor;
      }
     
    });
  });
}

//-----------------------session storage for filteroptions----------------------
let filteroption = document.querySelectorAll(".filterbox ul li i");
filteroption.forEach(element => {
  element.addEventListener("click", () => {
    for (let i = 0; i < filteroption.length ; i++) {
      sessionStorage.setItem(`filterop${i}`, `${filteroption[i].id}`);
    }
  });
});

window.addEventListener("load", () => {
  for (let i = 0; i < filteroption.length; i++) {
    let id = sessionStorage.getItem(`filterop${i}`);
    filteroption[i].id = id;
  }
  filteroption.forEach((event) => {
    if (event.id == "checked") {
      event.className = "fa-solid fa-square-check";
    } else if (event.id == "nonchecked") {
      event.className = " fa-regular fa-square";
    
    }
     
  })

});
//-----------------------filtercheck----------------------
checking(filteroption, "fa-solid fa-square-check", " fa-regular fa-square");
filteroption.forEach((element) => {
  element.addEventListener("click", () => {
    for (let i = 0; i < filteroption.length; i++) {
      sessionStorage.setItem(`filterop${i}`, `${filteroption[i].id}`);
    }
  });
});
// filteroption.forEach((option) => {
//   if (option.id != "checked" && option.id != "nonchecked") {
//      option.className = "fa-regular fa-square";
//      option.id = "nonchecked";
   
//   }
//   option.addEventListener("click", (event) => {
//     console.log("before if" + event.target.id);
//     if (event.target.id == "nonchecked") {
//       // event.target.className = "fa-solid fa-square-check";
//       console.log("in if" + event.target.id);
//       event.target.id = "checked";
//       // event.target.style.color = "red";
//     } else if (event.target.id == "checked") {
    
//       event.target.id = "nonchecked";
//       // event.target.style.color = "";
//       console.log("in else" + event.target.id);
//     }
//     if (event.target.id == "checked") {
//        event.target.className = "fa-regular fa-square";
//     }
//     if (event.target.id == "nonchecked") {
//       event.target.className = "fa-solid fa-square-check";
//     } 
//     console.log("im out" + event.target.id);
//   });
// });
// let filteroption = document.querySelectorAll(".filterbox ul li");
// // let filteri = document.querySelectorAll(".filterbox ul li i");
//   checkfonctionality(filteroption); 
// filteroption.forEach((option) => {
//   let fi = option.querySelector("i");
//   fi.className = "fa-regular fa-square";
//   option.addEventListener("click", (event) => {

//     console.log("before if");
//     if (event.target.id == "checked") {
//        console.log("in if");
//       fi.className = "fa-solid fa-square-check";
//     }
//     else {
//        console.log("in else");
//       fi.className = "fa-regular fa-square";

//     }
//     console.log("im out");
//   });
// });
//-----------------------favoris-check----------------------
let favorisoption = document.querySelectorAll(".resultbox .imgcontainer>p i");
  checking( favorisoption,"fa-classic fa-solid fa-heart",  "fa-classic fa-regular fa-heart","red","white");
// favorisoption.forEach((option) => {
//   if (option.id !="checked"&& option.id !="nonchecked") {
//     option.id = "nonchecked";
//     option.className = "fa-classic fa-regular fa-heart";
//   }
//   option.addEventListener("click", (event) => {
 
//     console.log("before if" + event.target.id);
//     if (event.target.id == "nonchecked") {
//       console.log("in if" + event.target.id);
//       event.target.id = "checked";
//       event.target.className = "fa-classic fa-solid fa-heart";
//       event.target.style.color = "red";
//     }
//     else {
//       event.target.id = "nonchecked";
//       event.target.className = "fa-classic fa-regular fa-heart";
//       event.target.style.color = "";
//       console.log("in else" + event.target.id);
     
//     }
   
//     console.log("im out" + event.target.id);
//   });
// });
//humbergermenue
let humbergermenue = document.querySelector("#hamburger-menu i");
let sidbar = document.querySelector("#sidebar-menu");
let sidbaroff = document.querySelector("#sidbaroff");

 let elements = document.querySelector(".backblur");

humbergermenue.addEventListener("click", () => {
  sidbar.style.display = "block";
  sidbar.classList.remove("slidingoff");
  sidbar.classList.add("sliding");
  // elements.style.display = "block";
  // document.querySelector(
  //   "nav").style.cssText = `filter: blur(5px);`;
})
  document.addEventListener("click", (event) => {
    // Check if clicked element is inside the menu area
    if (
      event.target.closest("#sidebar-menu i") != null ||
      event.target.closest("#hamburger-menu") === null
    ) {
      menus.forEach((e) => {
        sidbar.classList.remove("sliding");
        sidbar.classList.add("slidingoff");
        // sidbar.style.display = "none";
        // elements.style.display = "none";
      });
    }
  });
 

 */
