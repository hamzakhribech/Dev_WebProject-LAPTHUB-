
let nameinput = document.querySelector(".form1 .nameinpt");
let emailinput = document.querySelector(".mailinpt");
let paswrdinput = document.querySelector(".passwordinpt");


let validateEmail=()=>{
  const emailRegex = /^[a-z-A-Z]+[a-z-A-Z0-9_\.]+@[^\s@]+\.[^\s@]+$/;
  if (!emailRegex.test(emailinput.value)) {
    let msg=("  Please enter a valid email address");
      console.log("emailpassed");
       
         console.log("namenotpassed");
      document.querySelector(".eml p").textContent = msg;
      document.querySelector(".eml p").style.color = "green";

      
      return false;
      
    }
  console.log("emailpassed");
     document.querySelector(".eml p").textContent = "  It Sound good!";
     document.querySelector(".eml p").style.color = "green";
  return true;
}
let  validateName=()=>{
  const nameRegex = /^[a-zA-Z]+([\s]|[a-zA-Z]){3,50}$/;
  if (!nameRegex.test(nameinput.value)) {
      let msg="  Please enter ur full name";
       console.log("namenotpassed");
     document.querySelector(".naml p").textContent=msg;
     document.querySelector(".naml p").style.color = "red";
      
      return false;
     
    }
    
  console.log("namepassed");
    
    document.querySelector(".naml p").textContent = "  It Sound good!";
    document.querySelector(".naml p").style.color = "green";

      
  return true;
}

nameinput.addEventListener("input", () => {
    validateName();
});
emailinput.addEventListener("input", () => {
    validateEmail();
});
paswrdinput.addEventListener("input", () => {
    validatepassword();
    });
let  validatepassword=()=> {
  const paswrdRegex = /^.{8,50}$/;
  if (!paswrdRegex.test(paswrdinput.value)) {
     let msg="  Please enter a valid password";
      
         console.log("namenotpassed");
      document.querySelector(".psl p").textContent = msg;
     document.querySelector(".psl p").style.color = "red";
      

      
    return false;
    }
     document.querySelector(".psl p").textContent = "  It Sound good!";
     document.querySelector(".psl p").style.color = "green";
  console.log("passwordpassed");
    
    return true;
}


document.querySelector(".form1").addEventListener("submit", (event) => {
  let namev = validateName();
  let mailv = validateEmail();
  let passwordv = validatepassword();

  if (!mailv || !namev || !passwordv) {
    event.preventDefault();
  }
//   else {
//       localStorage.setItem("login", "1");
    
// }
  console.log(
    "mail: " + mailv + ", name: " + namev + ", password: " + passwordv
  );
});

//---------------------------------------
fetch("sending.php")
  .then((response) => response.json())
  .then((data) => {
    console.log(data.login);
    console.log(data.img);
    console.log(data.name);
    console.log(data.email);
  })
  .catch((error) => console.error(error));

