/* Sidebar js*/
let sidebar = document.querySelector(".sidebar");
let closeBtn = document.querySelector("#btn");

closeBtn.addEventListener("click", ()=>{
  sidebar.classList.toggle("open");
  menuBtnChange();//calling the function to change sidebar button(optional)
});

// following are the code to change sidebar button(optional)
function menuBtnChange() {
 if(sidebar.classList.contains("open")){
   closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the icons class
 }else {
   closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the icons class
 }
}

function subBusinessInsight(){
  var x = document.getElementById("subBusinessInsight");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}

function subGrowthEngine(){
  var x = document.getElementById("subGrowthEngine");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
function subBrandPromotion(){
  var x = document.getElementById("subBrandPromotion");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
function subAppointment(){
  var x = document.getElementById("subAppointment");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
function subStaffManagement(){
  var x = document.getElementById("subStaffManagement");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
function subSubUpdateRecords(){
  var x = document.getElementById("subSubUpdateRecords");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
function subSubStaffRecords(){
  var x = document.getElementById("subSubStaffRecords");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
function subSubAttendanceTracker(){
  var x = document.getElementById("subSubAttendanceTracker");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
function subStockManagement(){
  var x = document.getElementById("subStockManagement");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
function subAdmin(){
  var x = document.getElementById("subAdmin");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}

/*-------------- Loyalty page js ---------------------------*/

function change_text1() {
  var x = document.getElementById("remarksDemo");
  if (x.innerHTML === "Remarks +") {
    x.innerHTML = "Remarks -";
  } else {
    x.innerHTML = "Remarks +";
  }
}
function enforceNumberValidation(ele) {
  if ($(ele).data('decimal') != null) {
      var decimal = parseInt($(ele).data('decimal')) || 0;
      var val = $(ele).val();
      if (decimal > 0) {
          var splitVal = val.split('.');
          if (splitVal.length == 2 && splitVal[1].length > decimal) {
              $(ele).val(splitVal[0] + '.' + splitVal[1].substr(0, decimal));
          }
      } else if (decimal == 0) {
          var splitVal = val.split('.');
          if (splitVal.length > 1) {
              $(ele).val(splitVal[0]); // always trim everything after '.'
          }
      }
  }
}
function netAmt() {
  var bill = document.getElementById("billAmt").value;
  var loyalty = $('#loyaltyReward').text();
  var total = +bill + +loyalty;
  document.getElementById("NetAmount").innerHTML = total;
}

function bypass() {
  document.getElementById("loyaltyReward").innerHTML = "0";
  netAmt();
}

function balance() {
  var paid = document.getElementById("paidAmt").value;
  var netAmt = $('#NetAmount').text();
  if (+paid > +netAmt) {
    alert("Paid amount cannot be greater than net amount!");
    var balance = 0;
  }
  else
    var balance = +netAmt - +paid;
  document.getElementById("balAmt").innerHTML = balance;
}
function check() {
  var checkBox = document.getElementById("checkbox");
  if (checkBox.checked == true){
    document.getElementById("paidAmt").value = $('#NetAmount').text();
    document.getElementById("balAmt").innerHTML = "0";

  }
}
function paymentMode() {
  selectElement = document.querySelector('#selectPayment');
  var ref = document.getElementById("refNo");
  var payMode = document.getElementById("payMode");
  if (selectElement.value == "cash"){
    ref.style.display = "none";
    payMode.classList.add('col-md-6');
  } else if(selectElement.value != "cash"){
    payMode.classList.remove('col-md-6');
    payMode.classList.add('col-md-2');
    ref.style.display = "block";
  }
}

function yesToNo() {
  yes = document.getElementById("yes");
  no = document.getElementById("no");
  yes.style.backgroundColor = "#fff";
  yes.style.color = "#000";
  no.style.backgroundColor = "#28a745";
  no.style.color = "#fff";
}
function noToYes() {
  yes = document.getElementById("yes");
  no = document.getElementById("no");
  yes.style.backgroundColor = "#28a745";
  yes.style.color = "#fff";
  no.style.backgroundColor = "#fff";
  no.style.color = "#000";
}
function sidemenu() {
  x = document.getElementById("fixedSidebar")
  y = document.getElementsByClassName("container")
  if (x.style.display === "none") {
    x.style.display = "block"
  }
  else
    x.style.display = "none"
}
/* If the referral tyoe is existing cust then show other input fields */
function referralType() {
  selectElement = document.querySelector('#selectReferral');
  var ref1 = document.getElementById("refMob");
  var ref2 = document.getElementById("refName");
  var ref3 = document.getElementById("refRemarks");
  if (selectElement.value == "existCust"){
    ref1.style.display = "block";
    ref2.style.display = "block";
    ref3.style.display = "block";
  }
  else if (selectElement.value == "vendor" || selectElement.value == "agent") {
    ref1.style.display = "none";
    ref2.style.display = "none";
    ref3.style.display = "block";
  }
  else {
    ref1.style.display = "none";
    ref2.style.display = "none";
    ref3.style.display = "none";
  }
}

/* Validations for mobile number and name*/

function validMob() {
  var form = document.getElementById("form");
  var mob = document.getElementById("mob").value;
  var text = document.getElementById("warning1");

  var pattern = /^[789]\d{9}$/;
  if (mob.match(pattern)) {
    form.classList.add("Valid");
    form.classList.remove("Invalid");
    text.innerHTML = "Mobile Number valid";
    text.style.color = "#00ff00"
  }
  else {
    form.classList.remove("Valid");
    form.classList.add("Invalid");
    text.innerHTML = "Please enter valid mobile number!";
    text.style.color = "#ff0000"
  }

}

function validName() {
  var form = document.getElementById("form");
  var name = document.getElementById("name").value;
  var text = document.getElementById("warning2");

  var pattern = /^[a-zA-Z ]*$/;
  if (name.match(pattern)) {
    form.classList.add("Valid");
    form.classList.remove("Invalid");
    text.innerHTML = "Name is valid";
    text.style.color = "#00ff00"
  }
  else {
    form.classList.remove("Valid");
    form.classList.add("Invalid");
    text.innerHTML = "Name can only contain alphabets!";
    text.style.color = "#ff0000"
  }

}
function openNav() {
  if(window.matchMedia("(max-width: 700px)").matches)
    document.getElementById("mySidenav").style.width = "30%";
  else
    document.getElementById("mySidenav").style.width = "25%"; 
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}