let year = document.querySelector('.year');
const backwardmonths = document.querySelector('.backwardmonths');
const forwardmonths = document.querySelector('.forwardmonths');
const startdate = document.querySelector('.startdate');
const enddate = document.querySelector('.enddate');
const monthlinks = document.querySelectorAll('.monthlink');
const submitbtn = document.querySelector('.submitbtn');
const sortdate = document.querySelector('.sortdate');
let txn_count = document.querySelector('.txn_count');
let txn_sum = document.querySelector('.txn_sum');
let txn_paid = document.querySelector('.txn_paid');
let txn_cash = document.querySelector('.txn_cash');
let txn_card = document.querySelector('.txn_card');
let txn_other = document.querySelector('.txn_other');
var ledgerreport = document.querySelector('#ledgerreport');
let clickonsubmit = 0, clickonmonth=1;
var originalinvres;
var startFullDate,endFullDate;
var totalSales=0, totalPaid=0, totalCash = 0,totalCard = 0,totalOther = 0;

// months names
const monthnames = ["January","February","March","April","May","June","July","August","September","October","November","December"];


// current Year 
var date = new Date();
year.innerText = date.getFullYear();


// active months 
function activeLink(element){
    monthlinks.forEach(element=>{
        element.classList.remove('activeLink');
    });
    element.classList.add('activeLink');
}



// check current year for navigation
function checkCurrentYear()
{
    var currYear = date.getFullYear();
    var getYear =  Number(year.innerText);
    var startYear = 2014;
    if(getYear == currYear)
    {
        forwardmonths.style.display = "none";
    }else{
        forwardmonths.style.display = "block";
    }
    if(getYear == startYear)
    {
        backwardmonths.style.display = "none";
    }else{
        backwardmonths.style.display = "block";
    }
}


// tranverse through year 
backwardmonths.addEventListener('click',(e)=>{
    var currYear = date.getFullYear();
    var getYear =  Number(year.innerText);
    year.innerText = getYear-1;
    activeLink(monthlinks[0]);
    checkCurrentYear();
    insert_fetched_customers_transaction_summary();
    fetch_transaction_table();
});
forwardmonths.addEventListener('click',(e)=>{
    var currYear = date.getFullYear();
    var getYear =  Number(year.innerText);
    year.innerText = (getYear+1) > currYear ? getYear: getYear+1;
    activeLink(monthlinks[0]);
    checkCurrentYear();
    insert_fetched_customers_transaction_summary();
    fetch_transaction_table();
});



// click event on months 
monthlinks.forEach(element => {
    element.addEventListener('click',(e)=>{
        activeLink(e.target);
        clickonmonth = 1;
        fetch_transaction_table();
    });
});


// function setMinMaxDate(){
//     var derivedYear = Number(year.innerText);
//     var derivedMonth = Number(document.querySelector('.activeLink').getAttribute('data-month'));

//     var startDateMonth = new Date(derivedYear, derivedMonth,01);
//     startDateMonth = startDateMonth.toLocaleDateString("en-GB", { // you can use undefined as first argument
//                 year: "numeric",
//                 month: "2-digit",
//                 day: "2-digit", 
//                 });
//                 console.log(startDateMonth);

//     var endDateMonth = new Date(derivedYear, derivedMonth + 1,0);
//     endDateMonth = endDateMonth.toLocaleDateString("en-GB", { // you can use undefined as first argument
//                 year: "numeric",
//                 month: "2-digit",
//                 day: "2-digit", 
//                 });
//                 console.log(endDateMonth.split('/').reverse().join('-'));
//     startdate.setAttribute('min', startDateMonth.split('/').reverse().join('-'));
//     enddate.setAttribute('min', startDateMonth.split('/').reverse().join('-'));
//     startdate.setAttribute('max', endDateMonth.split('/').reverse().join('-'));
//     enddate.setAttribute('max', endDateMonth.split('/').reverse().join('-'));
// }
// setMinMaxDate();


// search box
var searchbox = document.querySelector('.searchbox');

var originaltdtext = [...document.querySelectorAll('.searchtext')];
var tablebody = document.querySelector('.tablereportbody');

// add input event on search box 
searchbox.addEventListener('input',(e)=>{
    insert_fetch_customer_data();
  });





// fetch customers transactions
  function fetch_transaction_table(){

    startFullDate = startdate.value;
    endFullDate = enddate.value;
    // activemonth = document.querySelector('.monthlink.activeLink').innerText.trim();
    // activeyear = year.innerText.trim();
    if(startFullDate == '' && endFullDate == '' && clickonsubmit == 1)
    {
        return;
    }


    var rows = "<tr> <td colspan='15'><h4 style='color:rgb(240 143 43);' class='text-center'> Loading... </h4>  </td> <tr>";
    tablebody.innerHTML = rows;


    if(startFullDate == '' && endFullDate == '' && clickonmonth == 1)
    {
        var derivedYear = Number(year.innerText);
    var derivedMonth = Number(document.querySelector('.activeLink').getAttribute('data-month'));

    startFullDate = new Date(derivedYear, derivedMonth,01);
    startFullDate = startFullDate.toLocaleDateString("en-GB", { // you can use undefined as first argument
                year: "numeric",
                month: "2-digit",
                day: "2-digit", 
                });
    endFullDate = new Date(derivedYear, derivedMonth + 1,0);
    endFullDate = endFullDate.toLocaleDateString("en-GB", { // you can use undefined as first argument
                year: "numeric",
                month: "2-digit",
                day: "2-digit", 
                });

    startFullDate = startFullDate.split('/').reverse().join('-');
    endFullDate = endFullDate.split('/').reverse().join('-');
    }
    
    // console.log(startFullDate,endFullDate);
    const xhr = new XMLHttpRequest();

    xhr.open('POST','fetch_customer_transaction.php',true);
    xhr.responseType = 'json';

    xhr.onload = ()=>{
        if(xhr.status === 200)
        {
            var response = xhr.response;
            // console.log(response.error, response.res);
            if(response.error === '1')
            {
                rows = "<tr> <td colspan='15'><h4 style='color:rgb(240 143 43);' class='text-center'> Something went wrong--> couldnt fetch data </h4>  </td> <tr>";
                tablebody.innerHTML = rows;
            }else if(response.error === '2'){
                txn_sum.innerText = 0;
                txn_paid.innerText = 0;
                txn_count.innerText = 0;
                txn_card.innerText = 0;
                txn_cash.innerText = 0;
                txn_other.innerText = 0;
                rows = "<tr> <td colspan='15'><h4 style='color:rgb(240 143 43);' class='text-center'> No Data </h4>  </td> <tr>";
                tablebody.innerHTML = rows;
            }else if(response.error === '3'){
                rows = "<tr> <td colspan='15'><h4 style='color:rgb(240 143 43);' class='text-center'> Something went Wrong </h4>  </td> <tr>";
                tablebody.innerHTML = rows;
            }else{
              res = response.res;
              originalres = res;
              insert_fetch_customer_data();
            } 
        }
    };
    
    const formdata = new FormData();
    formdata.append('startDate', startFullDate);
    formdata.append('endDate', endFullDate);

    xhr.send(formdata); 
    clickonsubmit = 0;
    clickonmonth = 1;
}


submitbtn.addEventListener('click',()=>{
    clickonsubmit = 1;
    clickonmonth = 0;
    fetch_transaction_table();
});


// sorting transactions 
sortdate.addEventListener("click",()=>{
    if(sortdate.classList.contains('fa-caret-down'))
    {
      sortdate.classList.remove('fa-caret-down');
      sortdate.classList.add('fa-caret-up');
      insert_fetch_customer_data();
    }else{
      sortdate.classList.add('fa-caret-down');
      sortdate.classList.remove('fa-caret-up');
      insert_fetch_customer_data();
    }
  });


// insert  fetched customers data 
function insert_fetch_customer_data(){

    submitbtn.innerHTML = `<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span><span style='margin-left:5px;'>Loading... </span>`;

    var startdateval = startdate.value;
    var enddateval = enddate.value;

    res = originalres;
    res = Object.entries(res);

    var searchvalue = searchbox.value;
    var regex = new RegExp(`${searchvalue}`,'i');
    res = res.filter(element => String(element[1]['customer_name']).search(regex) !== -1 || String(element[1]['customer_number']).search(regex) !== -1);

    if(sortdate.classList.contains('fa-caret-up'))
    {
      res.sort((a,b) => new Date(a[1]['timestamp']).getTime()-new Date(b[1]['timestamp']).getTime());
    }else{
      res.sort((a,b) => new Date(b[1]['timestamp']).getTime()-new Date(a[1]['timestamp']).getTime());
    } 
    totalSales  = 0;
    totalPaid = 0;
    totalCash = 0;
    totalCard = 0;
    totalOther = 0;
    if(startdateval == '' && enddateval == '' && clickonsubmit == 0)
    {
      var i = 0;
      var rows = "";  
      while(i < Object.keys(res).length)
      {
        rows += `
             <tr data-id='1'>                                                                            
                <td>${i+1}</td>
                <td class="searchtext longtd" data-id='${(i+1)}'><div class="longword">${res[i][1]['customer_name']}</div></td>
                <td class="searchtext" data-id='${(i+1)}'>${res[i][1]['customer_number']}</td>
                <td>${res[i][1]['sub_total']}</td>
                <td>${res[i][1]['item_disc']}</td>
                <td>${res[i][1]['bill_disc']}</td>
                <td>${res[i][1]['loyalty']}</td>
                <td>${res[i][1]['ttl_disc']}</td>
                <td>${res[i][1]['total_tax']}</td>
                <td>${res[i][1]['net_amt']}</td>
                <td>${res[i][1]['paid']}</td>
                <td>${res[i][1]['type']}</td>
                <td>${res[i][1]['timestamp']}</td>
                <td>${res[i][1]['ind']}</td>
                <td class="longtd"><div class="longword">${res[i][1]['note']}</div></td>
            </tr>`;
      totalSales += Number(res[i][1]['net_amt']);
      totalPaid += Number(res[i][1]['paid']);
      totalCash += Number(res[i][1]['cash']);
      totalCard += Number(res[i][1]['card']);
      totalOther += Number(res[i][1]['other']);
      i++;
      }
            
    }else{
      res = res.filter(element => new Date(element[1]['timestamp'].split(" ")[0]).getTime() >= new Date(startdateval.split(" ")[0]).getTime() && new Date(element[1]['timestamp'].split(" ")[0]).getTime() <= new Date(enddateval.split(" ")[0]).getTime());
        var i = 0;
      var rows = "";     
      while(i < Object.keys(res).length)
      {
        rows += `
             <tr data-id='1'>                                                                            
                <td>${i+1}</td>
                <td class="searchtext longtd" data-id='${(i+1)}'><div class="longword">${res[i][1]['customer_name']}</div></td>
                <td class="searchtext" data-id='${(i+1)}'>${res[i][1]['customer_number']}</td>
                <td>${res[i][1]['sub_total']}</td>
                <td>${res[i][1]['item_disc']}</td>
                <td>${res[i][1]['bill_disc']}</td>
                <td>${res[i][1]['loyalty']}</td>
                <td>${res[i][1]['ttl_disc']}</td>
                <td>${res[i][1]['total_tax']}</td>
                <td>${res[i][1]['net_amt']}</td>
                <td>${res[i][1]['paid']}</td>
                <td>${res[i][1]['type']}</td>
                <td>${res[i][1]['timestamp']}</td>
                <td>${res[i][1]['ind']}</td>
                <td class="longtd"><div class="longword">${res[i][1]['note']}</div></td>
            </tr>`;
        totalSales += Number(res[i][1]['net_amt']);
          totalPaid += Number(res[i][1]['paid']);
          totalCash += Number(res[i][1]['cash']);
          totalCard += Number(res[i][1]['card']);
          totalOther += Number(res[i][1]['other']);
        i++;
      }
    }
    txn_sum.innerText = totalSales;
    txn_paid.innerText = totalPaid;
    txn_cash.innerText = totalCash;
    txn_card.innerText = totalCard;
    txn_other.innerText = totalOther;
    txn_count.innerText = i;
    if(rows == "")
    {

      rows = "<tr> <td colspan='15'><h4 style='color:rgb(240 143 43);' class='text-center'> No Data </h4>  </td> <tr>";
    }
    tablebody.innerHTML = rows;
    cilckedonsubmit = 0;
    submitbtn.innerHTML = `Submit`;       
}

fetch_transaction_table();
checkCurrentYear();


// fetch transaction summary 
function fetch_summary(){
    const xhr = new XMLHttpRequest();

    xhr.open('GET','fetch_transaction_Summary_Report.php',true);
    xhr.responseType = 'json';

    xhr.onload = ()=>{
        if(xhr.status === 200)
        {
            var response = xhr.response;
            // console.log(response.error, response.res);
            if(response.error === '1')
            {
                inverror = `<tr>
                <th  class='label col nowrap'>Transaction Count</th>
                <td colspan='12'>Something Went Wrong</td>
                </tr>
                <tr>
                        <th  class='label col nowrap'>Transaction Amount</th>
                        <td colspan='12'>Couldnt fetch Data</td>
                </tr>`;
                ledgerreport.innerHTML = inverror;
            }else{
              originalinvres = response.res;
              insert_fetched_customers_transaction_summary();
            }
            
        }
    };

    xhr.send(); 
}
fetch_summary();



// insert fetched customer transaction summary 
function insert_fetched_customers_transaction_summary(){
    
      var invres = originalinvres;
      var invyear = Number(year.innerText.trim()); 

    var i = 0;
    // Transaction_count
    var invrowtd = '';
    invrowtd += `<tr>
                        <th  class="label col nowrap">Transaction Count</th>`;
    
    while(i < 12)
    {
        invrowtd += `
                <td>${invres[invyear][monthnames[i]]['Transaction_Count']}</td>         
            `;

        i++;
    }
    invrowtd += `</tr>`;

    // Transaction amount
    i = 0;
    invrowtd += `<tr>
                        <th  class="label col nowrap">Transaction Amount</th>`;
    while(i < 12)
    {
        invrowtd += `
                <td>${parseFloat(invres[invyear][monthnames[i]]['Transaction_Amount']).toFixed(2)}</td>         
            `;

        i++;
    }
    invrowtd += `</tr>`;
    ledgerreport.innerHTML = invrowtd;
}
