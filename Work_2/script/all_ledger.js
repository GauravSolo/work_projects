const checkbox = document.querySelector('#checkbox1');
const checkbox3 = document.querySelector('#checkbox3');
const checkbox2 = document.querySelector('#checkbox2');
let allledgers = document.querySelector('.allledgers');
let sortdate =  document.querySelector('.sortdate');
let searchbox = document.querySelector('#searchbox');
var originalres=0,res=0,checkdb,checkcr;



checkbox.addEventListener('click',()=>{
    var checkboxes = document.querySelectorAll('.tab1_input_radio:not(#checkbox1)');
    checkboxes.forEach((element)=>{element.checked = checkbox.checked;});
});
checkbox3.addEventListener('click',insert_fetched_customers);
checkbox2.addEventListener('click',insert_fetched_customers);

// sorting by date
sortdate.addEventListener("click",()=>{
  if(sortdate.classList.contains('fa-caret-down'))
  {
    sortdate.classList.remove('fa-caret-down');
    sortdate.classList.add('fa-caret-up');
    insert_fetched_customers();
  }else{
    sortdate.classList.add('fa-caret-down');
    sortdate.classList.remove('fa-caret-up');
    insert_fetched_customers();
  }
  

});


// fetching customers summary
function fetch_customers_summary(){

        const xhr = new XMLHttpRequest();

        xhr.open('GET','fetch_customer_summary.php');
        xhr.responseType = 'json';

        xhr.onload = ()=>{
            if(xhr.status === 200)
            {
                var response = xhr.response;
                if(response.error === '1')
                {
                  res = "something went wrong";
                }else if(response.error === '2'){
                  res = response.res;
                  originalres = res;
                }else
                {
                  res = response.res;
                  originalres = res;
                }
                insert_fetched_customers();
                
            }
        };
        xhr.send();     
}


// searching customers
searchbox.addEventListener('input',(e)=>{
  insert_fetched_customers();
});



// inserting fetched customers
function insert_fetched_customers(){

                checkdb = checkbox3.checked;
                checkcr = checkbox2.checked;
                var searchvalue = searchbox.value;
                res = originalres;
                res = Object.entries(res);

                if(checkdb == true && checkcr == false)
                {
                  res = res.filter(element => element[1]['balance'].split(' ')[1].toLowerCase() === 'db');
                }else if(checkcr == true && checkdb == false)
                {
                  res = res.filter(element => element[1]['balance'].split(' ')[1].toLowerCase() === 'cr');
                }
                

                if(sortdate.classList.contains('fa-caret-up'))
                {
                  res.sort((a,b) => Number(a[1]['balance'].split(' ')[0]) - Number(b[1]['balance'].split(' ')[0]));
                }else{
                  res.sort((a,b) => Number(b[1]['balance'].split(' ')[0]) - Number(a[1]['balance'].split(' ')[0]));
                } 

                const regex = new RegExp(`${searchvalue}`,'i');
                res = res.filter(element => String(element[1]['customer_name']).search(regex) !== -1 || String(element[1]['customer_phone']).search(regex) !== -1);
                
                  var rows = "";     
                  var i = 0;
                  
                  while(i < Object.keys(res).length)
                  {
                    rows += `
                          <tr>
                            <td class="text-center">${(i+1)}</td>
                            <td class="text-center ">${res[i][1]['customer_name']}</td>
                            <td class="text-center ">${res[i][1]['customer_phone']}</td>
                            <td class="text-center">${res[i][1]['balance']}</td>
                          
                              <td class="text-center" style="width:100px !important;">
                                  <input type="checkbox" class="tab1_input_radio  form-check-input" name="fetch" style="margin-right:20px;"/>
                              </td>
                        </tr>`;
                                                                          
                  i++;
                  }
                  if(i > 0 )
                  {
                    rows += `
                            <tr>
                                <td colspan="4"></td>
                                <td class="text-center">
                                <button data-bs-toggle="modal" data-bs-target="#exampleModal"  style="white-space:nowrap;" class="btn btnicon mx-auto text-white d-flex justify-content-center align-items-center"><i class="fas fa-envelope me-1" style="color:antiquewhite;"></i>Send Message</td>
                            </tr>
                        `;
                  }

                
                if(rows == "")
                {

                  rows = "<tr> <td colspan='6'><h4 class='text-info text-center'> No Data </h4>  </td> <tr>";
                }
                
                allledgers.innerHTML = rows;
}
fetch_customers_summary();
