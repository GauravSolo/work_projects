<link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />

<style>
  /* Google Font Link */
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");
.sidebar * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
  color: #000;
}
.sidebar {
  position: fixed;
  left: 0;
  top: 0;
  height: 100%;
  width: 82px;
  background: #fff;
  padding: 6px 0px;
  z-index: 99;
  transition: all 0.5s ease;
  overflow-y: scroll;
  overflow-x: hidden;
}
.sidebar::-webkit-scrollbar {
  width: 4px;
}
/* Track */
.sidebar::-webkit-scrollbar-track {
  background: #f1f1f1;
}
/* Handle */
.sidebar::-webkit-scrollbar-thumb {
  background: #888;
}
/* Handle on hover */
.sidebar::-webkit-scrollbar-thumb:hover {
  background: #555;
}

.sidebar.open {
  width: 275px;
}
.sidebar .logo-details {
  height: 50px;
  display: flex;
  align-items: center;
  position: relative;
}
.sidebar .logo-details .logo_name {
  color: #000;
  font-size: 20px;
  font-weight: 600;
  opacity: 0;
  transition: all 0.5s ease;
}
.sidebar .main_logo {
  display: block;
  margin-left: auto;
  margin-right: auto;
  /* height: 10%; */
  width: 60%;
  margin-top: 30px;
  margin-bottom: 30px;
}
.sidebar.open .logo-details .logo_name {
  opacity: 1;
}
.sidebar .logo-details #btn {
  position: absolute;
  top: 50%;
  right: 0;
  transform: translateY(-50%);
  font-size: 22px;
  transition: all 0.4s ease;
  font-size: 23px;
  text-align: center;
  cursor: pointer;
  transition: all 0.5s ease;
  padding-right: 28px;
}
.sidebar.open .logo-details #btn {
  text-align: right;
  padding-right: 14px;
}
.sidebar i {
  color: #000;
  height: 60px;
  min-width: 50px;
  font-size: 28px;
  text-align: center;
  line-height: 60px;
}
.sidebar .nav-list {
  margin-top: 10px;
  height: 100%;
}
.sidebar li {
  position: relative;
  margin: 5px 0;
  list-style: none;
  border-bottom: 1px solid rgba(44, 9, 9, 0.05);
  border-top: 1px solid rgba(255, 255, 255, 0.05);
  padding-left: 14px;
}
.sidebar li .tooltip {
  position: absolute;
  top: -20px;
  left: calc(100% + 15px);
  z-index: 3;
  background: #000;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
  padding: 6px 12px;
  border-radius: 4px;
  font-size: 15px;
  font-weight: 400;
  opacity: 0;
  white-space: nowrap;
  pointer-events: none;
  transition: 0s;
}
.sidebar li:hover .tooltip {
  opacity: 1;
  pointer-events: auto;
  transition: all 0.4s ease;
  top: 50%;
  transform: translateY(-50%);
}
.sidebar.open li .tooltip {
  display: none;
}

.sidebar li a {
  display: flex;
  /* height: 100%; */
  width: 100%;
  align-items: center;
  text-decoration: none;
  transition: all 0.4s ease;
}
/*
.sidebar li:hover {
  background: beige;
}*/
.sidebar li a .links_name {
  font-size: 16px;
  font-weight: 400;
  white-space: nowrap;
  opacity: 0;
  pointer-events: none;
  transition: 0.4s;
}
.sidebar.open li a .links_name {
  opacity: 1;
  pointer-events: auto;
}
.sidebar li a:hover .links_name,
.sidebar li a:hover i {
  transition: all 0.5s ease;
  color: #11101d;
}
.sidebar li i {
  height: 50px;
  line-height: 50px;
  font-size: 18px;
  border-radius: 12px;
}
.sidebar li img {
  height: 45px;
  width: 45px;
  object-fit: cover;
  border-radius: 6px;
  margin-right: 10px;
}

.home-section {
  position: relative !important;
  top: 0 !important;
  left: 82px !important;
  width: calc(100% - 82px) !important;
  transition: all 0.5s ease;
}

.sidebar.open ~ .home-section {
  top:0;
  left: 275px !important;
  width: 100%;
  width: calc(100% - 275px) !important;
}

@media (max-width: 420px) {
  .sidebar li .tooltip {
    display: none;
  }
}
.submenu span {
  font-size: 14px !important;
}
.bx-chevron-down {
  position: absolute;
  top: 0;
  right: 0;
  font-size: 22px;
}

#subBusinessInsight,
#subGrowthEngine,
#subBrandPromotion,
#subAppointment,
#subStaffManagement,
#subStockManagement,
#subAdmin,
#subSubUpdateRecords,
#subSubStaffRecords,
#subSubAttendanceTracker {
  display: none;
}

</style>


<div class="sidebar">
      <div class="logo-details">
        <div class="logo_name">
          <img src="assets/mainlogo.png" class="main_logo" />
        </div>
        <i class="bx bx-menu" id="btn"></i>
      </div>
      <ul class="nav-list">
        <!-- Home-->
        <li>
          <a href="#">
          <i class='bx bx-home bx-tada-hover'></i>
            <span class="links_name">Home</span>
          </a>
          <span class="tooltip">Home</span>
        </li>
        <!-- Invoice-->
        <li>
          <a href="#">
            <i class="bx bx-notepad bx-tada-hover"></i>
            <span class="links_name">Invoice</span>
          </a>
          <span class="tooltip">Invoice</span>
        </li>
        <!-- Loyalty Bill-->
        <li>
          <a href="#">
            <i class="bx bx-rupee bx-tada-hover"></i>
            <span class="links_name">Loyalty Bill</span>
          </a>
          <span class="tooltip">Loyalty Bill</span>
        </li>

        <!-- Business Insight-->
        <li>
          <a href="#" onclick="subBusinessInsight()">
            <i class="bx bx-bar-chart-alt bx-tada-hover"></i>
            <span class="links_name"
              >Business Insight<i class="bx bx-chevron-down"></i
            ></span>
          </a>
          <span class="tooltip">Business Insight</span>
          <ul id="subBusinessInsight">
            <li class="submenu">
              <a href="#">
                <i class="bx bx-chevron-right bx-tada-hover"></i>
                <span class="links_name">Transaction Report</span>
              </a>
              <span class="tooltip">Transaction Report</span>
            </li>
            <li class="submenu">
              <a href="#">
                <i class="bx bx-chevron-right bx-tada-hover"></i>
                <span class="links_name">Itemized Report</span>
              </a>
              <span class="tooltip">Itemized Report</span>
            </li>
            <li class="submenu">
              <a href="#">
                <i class="bx bx-chevron-right bx-tada-hover"></i>
                <span class="links_name">Update Transactions</span>
              </a>
              <span class="tooltip">Update Transactions</span>
            </li>
            <li class="submenu">
              <a href="#">
                <i class="bx bx-chevron-right bx-tada-hover"></i>
                <span class="links_name">Customer Data</span>
              </a>
              <span class="tooltip">Customer Data</span>
            </li>
            <li class="submenu">
              <a href="#">
                <i class="bx bx-chevron-right bx-tada-hover"></i>
                <span class="links_name">Customer Spends</span>
              </a>
              <span class="tooltip">Customer Spends</span>
            </li>
          </ul>
        </li>

        <!--Growth Engine-->
        <li>
          <a href="#" onclick="subGrowthEngine()">
            <i class="bx bx-trending-up bx-tada-hover"></i>
            <span class="links_name"
              >Growth Engine <i class="bx bx-chevron-down"></i
            ></span>
          </a>
          <span class="tooltip">Growth Engine</span>
          <ul id="subGrowthEngine">
            <li class="submenu">
              <a href="#">
                <i class="bx bx-chevron-right bx-tada-hover"></i>
                <span class="links_name">Customer Registration</span>
              </a>
              <span class="tooltip">Customer Registration</span>
            </li>
            <li class="submenu">
              <a href="#">
                <i class="bx bx-chevron-right bx-tada-hover"></i>
                <span class="links_name">Lost Customers</span>
              </a>
              <span class="tooltip">Lost Customers</span>
            </li>
            <li class="submenu">
              <a href="#">
                <i class="bx bx-chevron-right bx-tada-hover"></i>
                <span class="links_name">Customer Referrals</span>
              </a>
              <span class="tooltip">Customer Referrals</span>
            </li>
            <li class="submenu">
              <a href="#">
                <i class="bx bx-chevron-right bx-tada-hover"></i>
                <span class="links_name">Enquiry</span>
              </a>
              <span class="tooltip">Enquiry</span>
            </li>
            <li class="submenu">
              <a href="#">
                <i class="bx bx-chevron-right bx-tada-hover"></i>
                <span class="links_name">Loyalty</span>
              </a>
              <span class="tooltip">Loyalty</span>
            </li>
            <li class="submenu">
              <a href="#">
                <i class="bx bx-chevron-right bx-tada-hover"></i>
                <span class="links_name">Reminder Data</span>
              </a>
              <span class="tooltip">Reminder Data</span>
            </li>
            <li class="submenu">
              <a href="#">
                <i class="bx bx-chevron-right bx-tada-hover"></i>
                <span class="links_name">Wishes</span>
              </a>
              <span class="tooltip">Wishes</span>
            </li>
          </ul>
        </li>

        <!-- Brand Promotion-->
        <li>
          <a href="#" onclick="subBrandPromotion()">
            <i class="bx bx-broadcast bx-tada-hover"></i>
            <span class="links_name"
              >Brand Promotion<i class="bx bx-chevron-down"></i
            ></span>
          </a>
          <span class="tooltip">Brand Promotion</span>
          <ul id="subBrandPromotion">
            <li class="submenu">
              <a href="#">
                <i class="bx bx-chevron-right bx-tada-hover"></i>
                <span class="links_name">SMS Based Promotion</span>
              </a>
              <span class="tooltip">SMS Based Promotion</span>
            </li>
            <li class="submenu">
              <a href="#">
                <i class="bx bx-chevron-right bx-tada-hover"></i>
                <span class="links_name">Email Based Promotion</span>
              </a>
              <span class="tooltip">Email Based Promotion</span>
            </li>
            <li class="submenu">
              <a href="#">
                <i class="bx bx-chevron-right bx-tada-hover"></i>
                <span class="links_name">Reports for promotion</span>
              </a>
              <span class="tooltip">Reports for promotion</span>
            </li>
          </ul>
        </li>
        <!--Appointment-->
        <li>
          <a href="#" onclick="subAppointment()">
            <i class="bx bx-calendar bx-tada-hover"></i>
            <span class="links_name"
              >Appointment<i class="bx bx-chevron-down"></i
            ></span>
          </a>
          <span class="tooltip">Appointment</span>
          <ul id="subAppointment">
            <li class="submenu">
              <a href="#">
                <i class="bx bx-chevron-right bx-tada-hover"></i>
                <span class="links_name">Appointment Spreadsheet</span>
              </a>
              <span class="tooltip">Appointment Spreadsheet</span>
            </li>
            <li class="submenu">
              <a href="#">
                <i class="bx bx-chevron-right bx-tada-hover"></i>
                <span class="links_name">Make Appointment</span>
              </a>
              <span class="tooltip">Make Appointment</span>
            </li>
            <li class="submenu">
              <a href="#">
                <i class="bx bx-chevron-right bx-tada-hover"></i>
                <span class="links_name">Appointment Reports</span>
              </a>
              <span class="tooltip">Appointment Reports</span>
            </li>
          </ul>
        </li>

        <!--Staff Management-->
        <li>
          <a href="#" onclick="subStaffManagement()">
            <i class="bx bx-group bx-tada-hover"></i>
            <span class="links_name"
              >Staff Management<i class="bx bx-chevron-down"></i
            ></span>
          </a>
          <span class="tooltip">Staff Management</span>
          <ul id="subStaffManagement">
            <li class="submenu">
              <a href="#" onclick="subSubUpdateRecords()">
                <i class="bx bx-chevron-right bx-tada-hover"></i>
                <span class="links_name"
                  >Update Records<i class="bx bx-chevron-down"></i
                ></span>
              </a>
              <span class="tooltip">Update Records</span>
              <ul id="subSubUpdateRecords">
                <li class="submenu">
                  <a href="#">
                    <i class="bx bx-chevron-right bx-tada-hover"></i>
                    <span class="links_name">Update Staff Member</span>
                  </a>
                  <span class="tooltip">Update Staff Member</span>
                </li>
                <li class="submenu">
                  <a href="#">
                    <i class="bx bx-chevron-right bx-tada-hover"></i>
                    <span class="links_name">Update Service</span>
                  </a>
                  <span class="tooltip">Update Service</span>
                </li>
                <li class="submenu">
                  <a href="#">
                    <i class="bx bx-chevron-right bx-tada-hover"></i>
                    <div class="column">
                      <span class="links_name">Update Service</span>
                      <span class="links_name">Commission</span>
                    </div>
                  </a>
                  <span class="tooltip">Update Service Commission</span>
                </li>
                <li class="submenu">
                  <a href="#">
                    <i class="bx bx-chevron-right bx-tada-hover"></i>
                    <span class="links_name">Update Service Price</span>
                  </a>
                  <span class="tooltip">Update Service Price</span>
                </li>
              </ul>
            </li>

            <li class="submenu">
              <a href="#" onclick="subSubStaffRecords()">
                <i class="bx bx-chevron-right bx-tada-hover"></i>
                <span class="links_name"
                  >Staff Records<i class="bx bx-chevron-down"></i
                ></span>
              </a>
              <span class="tooltip">Staff Records</span>
              <ul id="subSubStaffRecords">
                <li class="submenu">
                  <a href="#">
                    <i class="bx bx-chevron-right bx-tada-hover"></i>
                    <span class="links_name">Summary Report</span>
                  </a>
                  <span class="tooltip">Summary Report</span>
                </li>
                <li class="submenu">
                  <a href="#">
                    <i class="bx bx-chevron-right bx-tada-hover"></i>
                    <span class="links_name">Detailed Report</span>
                  </a>
                  <span class="tooltip">Detailed Report</span>
                </li>
              </ul>
            </li>
            <li class="submenu">
              <a href="#" onclick="subSubAttendanceTracker()">
                <i class="bx bx-chevron-right bx-tada-hover"></i>
                <span class="links_name"
                  >Attendance Tracker<i class="bx bx-chevron-down"></i
                ></span>
              </a>
              <span class="tooltip">Attendance Tracker</span>
              <ul id="subSubAttendanceTracker">
                <li class="submenu">
                  <a href="#">
                    <i class="bx bx-chevron-right bx-tada-hover"></i>
                    <span class="links_name">Daily Attendance</span>
                  </a>
                  <span class="tooltip">Daily Attendance</span>
                </li>
                <li class="submenu">
                  <a href="#">
                    <i class="bx bx-chevron-right bx-tada-hover"></i>
                    <span class="links_name">Report</span>
                  </a>
                  <span class="tooltip">Report</span>
                </li>
              </ul>
            </li>
          </ul>
        </li>
        <!-- Vendor Management-->
        <li>
          <a href="#">
            <i class="bx bx-store-alt bx-tada-hover"></i>
            <span class="links_name">Vendor Management</span>
          </a>
          <span class="tooltip">Vendor Management</span>
        </li>
        <!-- Subscription -->
        <li>
          <a href="#">
            <i class="bx bx-message-square-check bx-tada-hover"></i>
            <span class="links_name">Subscription</span>
          </a>
          <span class="tooltip">Subscription</span>
        </li>
        <!-- Stock Management-->
        <li>
          <a href="#" onclick="subStockManagement()">
            <i class="bx bx-package bx-tada-hover"></i>
            <span class="links_name"
              >Stock Management<i class="bx bx-chevron-down"></i
            ></span>
          </a>
          <span class="tooltip">Stock Management</span>
          <ul id="subStockManagement">
            <li class="submenu">
              <a href="#">
                <i class="bx bx-chevron-right bx-tada-hover"></i>
                <span class="links_name">Update Stock</span>
              </a>
              <span class="tooltip">Update Stock</span>
            </li>
            <li class="submenu">
              <a href="#">
                <i class="bx bx-chevron-right bx-tada-hover"></i>
                <span class="links_name">Live Stock</span>
              </a>
              <span class="tooltip">Live Stock</span>
            </li>
            <li class="submenu">
              <a href="#">
                <i class="bx bx-chevron-right bx-tada-hover"></i>
                <span class="links_name">Add Multiple Stock</span>
              </a>
              <span class="tooltip">Add Multiple Stock</span>
            </li>
            <li class="submenu">
              <a href="#">
                <i class="bx bx-chevron-right bx-tada-hover"></i>
                <span class="links_name">Stock Change Reports</span>
              </a>
              <span class="tooltip">Stock Change Reports</span>
            </li>
          </ul>
        </li>
        <!-- Expense Management-->
        <li>
          <a href="#">
            <i class="bx bx-wallet bx-tada-hover"></i>
            <span class="links_name">Expense Management</span>
          </a>
          <span class="tooltip">Expense Management</span>
        </li>

        <!-- ADMIN-->
        <li>
          <a href="#" onclick="subAdmin()">
            <i class="bx bx-user-circle bx-tada-hover"></i>
            <span class="links_name"
              >Admin<i class="bx bx-chevron-down"></i
            ></span>
          </a>
          <span class="tooltip">Admin</span>
          <ul id="subAdmin">
            <li class="submenu">
              <a href="#">
                <i class="bx bx-chevron-right bx-tada-hover"></i>
                <span class="links_name">Profile</span>
              </a>
              <span class="tooltip">Profile</span>
            </li>
            <li class="submenu">
              <a href="#">
                <i class="bx bx-chevron-right bx-tada-hover"></i>
                <span class="links_name">Update Staff Member</span>
              </a>
              <span class="tooltip">Update Staff Member</span>
            </li>
            <li class="submenu">
              <a href="#">
                <i class="bx bx-chevron-right bx-tada-hover"></i>
                <span class="links_name">Update Service</span>
              </a>
              <span class="tooltip">Update Service</span>
            </li>
            <li class="submenu">
              <a href="#">
                <i class="bx bx-chevron-right bx-tada-hover"></i>
                <div class="column">
                  <span class="links_name">Update Service</span>
                  <span class="links_name">Commission</span>
                </div>
              </a>
              <span class="tooltip">Update Service Commission</span>
            </li>
            <li class="submenu">
              <a href="#">
                <i class="bx bx-chevron-right bx-tada-hover"></i>
                <span class="links_name">Update Service Price</span>
              </a>
              <span class="tooltip">Update Service Price</span>
            </li>
            <li class="submenu">
              <a href="#">
                <i class="bx bx-chevron-right bx-tada-hover"></i>
                <span class="links_name">Update Product List</span>
              </a>
              <span class="tooltip">Update Product List</span>
            </li>
            <li class="submenu">
              <a href="#">
                <i class="bx bx-chevron-right bx-tada-hover"></i>
                <span class="links_name">Update Product Price</span>
              </a>
              <span class="tooltip">Update Product Price</span>
            </li>
            <li class="submenu">
              <a href="#">
                <i class="bx bx-chevron-right bx-tada-hover"></i>
                <div class="column">
                  <span class="links_name">Update Product</span>
                  <span class="links_name">Commission</span>
                </div>
              </a>
              <span class="tooltip">Update Product Commission</span>
            </li>
          </ul>
        </li>
        <!-- Customer Care-->
        <li>
          <a href="#">
            <i class="bx bx-help-circle bx-tada-hover"></i>
            <span class="links_name">Customer Care</span>
          </a>
          <span class="tooltip">Customer Care</span>
        </li>
        <!-- Log Out -->
        <li>
          <a href="#">
            <i class="bx bx-log-out bx-tada-hover"></i>
            <span class="links_name">Log Out</span>
          </a>
          <span class="tooltip">Log Out</span>
        </li>
      </ul>
    </div>

    <script>
      let sidebar = document.querySelector(".sidebar");
let closeBtn = document.querySelector("#btn");

closeBtn.addEventListener("click", ()=>{
  sidebar.classList.toggle("open");
  menuBtnChange();//calling the function(optional)
});


// following are the code to change sidebar button(optional)
function menuBtnChange() {
 if(sidebar.classList.contains("open")){
   closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
 }else {
   closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
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

    </script>