const checkbox1 = document.querySelector('#checkbox1');
const checkbox2 = document.querySelector('#checkbox2');
const tab1 = document.querySelector('#tab1');
const tab2 = document.querySelector('#tab2');
const Adjustment_Submit = document.querySelector('#Adjustment_Submit');
const Adjustment_Status = document.querySelectorAll('input[name="status"]');
const fetchBtn = document.querySelector('#button-addon2');
const fetch_transaction = document.querySelector('.fetchtransaction');
const ledgerreport = document.querySelector('#ledgerreport');
var startdate = document.querySelector('.startdate');
var enddate = document.querySelector('.enddate');
var checkbox = document.querySelector('#checkbox1');
const btnClose = document.querySelector('.btn-close');
const fetchcustomerdata = document.querySelector('.fetchcustomerdata');
const sortdate = document.querySelector('.sortdate');

var res,net,originalres;


function addSuffix(value){
  if(value < 0)
    value = (-value) + " Db";
  else if(value > 0)
    value = (value) + " Cr";
  return value;
}
function removeSuffix(value){
  [val, sign] = value.split(' ');

  if(sign == undefined){
    return Number(val);
  }else if(sign.toLowerCase() == 'db')
  {
    return -Number(val);
  }else if(sign.toLowerCase() == 'cr')
  {
      return Number(val);
  }
}


checkbox.addEventListener('click',()=>{
    if(startdate.disabled == false && enddate.disabled == false)
    {
      startdate.disabled = true;
      enddate.disabled = true;
    }else
    {
      startdate.disabled = false;
      enddate.disabled = false;
    }
});


// fetching custoemrs details using ajax
  fetchBtn.addEventListener('click',()=>{

          startdate.value = "";
          enddate.value = "";


          // after fetched customer detail inserting into table
          fetchcustomerdata.innerHTML = `
          <tr>
              <td class="text-center nowrap pt-3">Gaurav Sharma</td>
              <td class="text-center pt-3 ">784489433</td>
              <td class="text-center pt-3 nowrap">24-10-1999</td>
              <td class="text-center pt-3 nowrap">12-02-2021</td>
              <td class="text-center pt-3 nowrap longtd"><div class="longword">Krishna Vihar Pala Road Gali no. 8 Aligarh</div></td>
              <td class="text-center pt-3 nowrap">202090</td>
              <td class="text-center pt-3 nowrap longtd" ><div class="longword">gauravsharma@gmail.com</div></td>
              <td class="text-center pt-3"> 10-10-2021</td>
              <td class="text-center pt-3 netBal"></td>
              <td class="text-center"><button data-bs-toggle="modal" data-bs-target="#AdjustmentModal" class="btn btn-warning mx-auto text-white d-flex justify-content-center align-items-center"><img style="width:20px;margin-right:5px;" src="https://img.icons8.com/external-becris-lineal-becris/64/000000/external-edit-mintab-for-ios-becris-lineal-becris.png"/>Adjustment</button></td>
          </tr>
          `;



        fetch_netBal();
        fetch_transaction_table();
        fetch_transaction.disabled = false;


  });

  // fetching net Balance .........
            function fetch_netBal(){
              var customer_id = Number(document.querySelector(".customer_id").value);
              const xhr = new XMLHttpRequest();

              xhr.open('POST','fetch_netBal.php',true);
              xhr.responseType = 'json';

              xhr.onload = ()=>{
                  if(xhr.status === 200)
                  {
                      var response = xhr.response;
                      netBal = response.res;
                      document.querySelector('.netBal').innerText = netBal;
                      document.querySelector('.balance').innerText = netBal;
                      document.querySelector('.balance').setAttribute('data-balance', netBal);
                  }
              };
              
              const formdata = new FormData();
              formdata.append('cid',customer_id);
              
              xhr.send(formdata); 
          }

          // show alert
          var alertPlaceholder = document.getElementById('liveAlertPlaceholder');
          
          function alert(message, type) {
            var wrapper = document.createElement('div');
            wrapper.innerHTML = '<div class="alert alert-' + type + ' alert-dismissible" role="alert">' + message + '<button type="button" id="btnclose" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'
          
            alertPlaceholder.append(wrapper);
          }



          // fetching transactions .........
          function fetch_transaction_table(){
            var customer_id = Number(document.querySelector(".customer_id").value);
            const xhr = new XMLHttpRequest();

            xhr.open('POST','fetch_transaction.php',true);
            xhr.responseType = 'json';

            xhr.onload = ()=>{
                if(xhr.status === 200)
                {
                    var response = xhr.response;
                    if(response.error === '1')
                    {
                      alert('NO Customer Data Found!', 'danger');

                      setTimeout(() => {
                        document.querySelector('#btnclose').click();
                      }, 3000);
                    }else if(response.error === '2'){
                      alert('No Data', 'warning');
                      setTimeout(() => {
                        document.querySelector('#btnclose').click();
                      }, 3000);
                    }else{
                      res = response.res;
                      originalres = res;
                    }
                    
                }
            };
            
            const formdata = new FormData();
            formdata.append('cid',customer_id);
            
            xhr.send(formdata); 
        }

        sortdate.addEventListener("click",()=>{
          if(sortdate.classList.contains('fa-caret-down'))
          {
            sortdate.classList.remove('fa-caret-down');
            sortdate.classList.add('fa-caret-up');
            fetch_transaction_function();
          }else{
            sortdate.classList.add('fa-caret-down');
            sortdate.classList.remove('fa-caret-up');
            fetch_transaction_function();
          }
          

        });

      // inserting feched transaction details into table
      fetch_transaction.addEventListener('click',fetch_transaction_function);

              function fetch_transaction_function(){

                var startdateval = startdate.value;
                var enddateval = enddate.value;
                var check = checkbox.checked;
                var i = 0;
                if(check == false && (startdateval == "" || enddateval == ""))
                {
                  return;
                }
                res = originalres;
                res = Object.entries(res);

                if(sortdate.classList.contains('fa-caret-up'))
                {
                  res.sort((a,b) => new Date(a[1]['date']).getTime()-new Date(b[1]['date']).getTime());
                }else{
                  res.sort((a,b) => new Date(b[1]['date']).getTime()-new Date(a[1]['date']).getTime());
                } 

                if(check == true)
                {
                  var rows = "";     
                  while(i < Object.keys(res).length)
                  {
                    rows += `
                            <tr>
                                <td class="text-center" style="width:100px;">${(i+1)}</td>
                                <td class="text-center  nowrap" style="width:120px;">${res[i][1]['date']}</td>
                                <td class="text-center nowrap">${res[i][1]['narr']}</td>
                                <td class="text-center" style="width:120px;">${res[i][1]['Db'] > 0 ? res[i][1]['Db']+ " Db": 0}</td>
                                <td class="text-center" style="width:120px;">${res[i][1]['Cr'] > 0 ? res[i][1]['Cr']+ " Cr": 0}</td>
                                <td class="text-center" style="width:120px;">${res[i][1]['net']}</td>
                            </tr>`;
                  i++;
                  }
                }else{
                  res = res.filter(element => new Date(element[1]['date'].split(" ")[0]).getTime() >= new Date(startdateval.split(" ")[0]).getTime() && new Date(element[1]['date'].split(" ")[0]).getTime() <= new Date(enddateval.split(" ")[0]).getTime());
                  var rows = "";     
                  while(i < Object.keys(res).length)
                  {
                    rows += `
                            <tr>
                                <td class="text-center" style="width:100px;">${(i+1)}</td>
                                <td class="text-center  nowrap" style="width:120px;">${res[i][1]['date'].split(' ')[0].split('-').reverse().join('-')}</td>
                                <td class="text-center nowrap">${res[i][1]['narr']}</td>
                                <td class="text-center" style="width:120px;">${res[i][1]['Db'] > 0 ? res[i][1]['Db']+ " Db": 0}</td>
                                <td class="text-center" style="width:120px;">${res[i][1]['Cr'] > 0 ? res[i][1]['Cr']+ " Cr": 0}</td>
                                <td class="text-center" style="width:120px;">${res[i][1]['net']}</td>
                            </tr>`;
                  i++;
                }
              }
                if(rows == "")
                {

                  rows = "<tr> <td colspan='6'><h4 class='text-info text-center'> No Data </h4>  </td> <tr>";
                }
                ledgerreport.innerHTML = rows;
        }
        
        



// toggle status
  Adjustment_Status.forEach(element => {
    element.addEventListener('click',(e)=>{

      var tab = e.target.getAttribute('data-tab');
      var tabcheck = document.querySelector('.tab-pane.active').getAttribute('id');

      if(tab != tabcheck)
      {
        tab1.classList.toggle('active');
        tab2.classList.toggle('active');
      }
    })
  }); 
  




  // Submitting Adjustment Data
  Adjustment_Submit.addEventListener('click',(e)=>{
      e.preventDefault();

      Adjustment_Submit.innerHTML = "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span><span style='margin-left:5px;'>Loading... </span>";
  
  
      let customer_name =  document.querySelector(".customer_name").innerText;
      var customer_id = Number(document.querySelector(".customer_id").value);
      let customer_number =  document.querySelector(".customer_number").innerText;
      let balance =  document.querySelector(".balance").getAttribute('data-balance');
      let prev_balance =  balance;
      let status = document.querySelector('input[name="status"]:checked').value;
      let Db, Cr;
      Db = Cr = 0;
      
      if(status == "received")
      {
        var amount = Number(document.querySelector('input[name="received_amount"]').value);
        var selectValue = document.querySelector("select[name='received_status']");
        var paidby = selectValue.options[selectValue.selectedIndex].text;
        var reference = document.querySelector('input[name="received_reference"]').value;
        var remarks = document.querySelector('input[name="received_remarks"]').value;
        
        Db = 0;
        Cr = amount;

        balance = removeSuffix(balance)+amount;

      }else{
        var amount = Number(document.querySelector('input[name="paid_amount"]').value);
        var selectValue = document.querySelector("select[name='paid_status']");
        var paidby = selectValue.options[selectValue.selectedIndex].text;
        var reference = document.querySelector('input[name="paid_reference"]').value;
        var remarks = document.querySelector('input[name="paid_remarks"]').value;
        
        balance = removeSuffix(balance)-amount;

        Db = amount;
        Cr = 0;
      }


      const xhr = new XMLHttpRequest();
  
      xhr.open('POST','submit_ledger.php',true);

      xhr.responseType = 'json';
      xhr.onload = ()=>{
          if(xhr.status === 200)
          {
              var res = xhr.response;
              Adjustment_Submit.innerHTML = "SUBMIT"; 
              if(res.res == '1')
              {
                document.querySelector('.indicate').innerHTML = "<h5 class='text-success'> Adjustment Data Successfully.</h5>";
                console.log(customer_id);
                fetch_netBal();
                fetch_transaction_table();

                setTimeout(()=>{fetch_transaction.click();},100);
                setTimeout(() => {
                  document.querySelector('.indicate').innerText = "";

                  btnClose.click();

                }, 2000);  
              }
              else{
                document.querySelector('.indicate').innerHTML = "<h5 class='text-danger'> Something Went Wrong.</h5>";
              }
                 
          }
      };
      
      const formdata = new FormData();
      formdata.append('customer_name',customer_name);
      formdata.append('customer_id',customer_id);
      formdata.append('customer_number',customer_number);
      formdata.append('balance',balance);
      formdata.append('prev_balance',prev_balance);
      formdata.append('status',status);
      formdata.append('amount',amount);
      formdata.append('paidby',paidby);
      formdata.append('reference',reference);
      formdata.append('remarks',remarks);
      formdata.append('db',Db);
      formdata.append('cr',Cr);
      
      xhr.send(formdata); 
  });
  
