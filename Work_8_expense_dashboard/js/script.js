$("#fir").dataTable({
    "bProcessing": true,

    "sAjaxSource": "paid.php",
    "sDom": "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
    "sPaginationType": "full_numbers",
    "aoColumns": [

        {"mData": "Sr_no"},
        {"mData": "Category_Name"},
        {"mData": "Vendor_Name"},
        {"mData": "date"},
        {"mData": "Price"},
        {"mData": "Payment_Mode"},
        {"mData": "remark"},
        {"mData": "edit"},
        {"mData": "cancel"}
    ],
    'columnDefs': [
         {
            'targets': 3,
            'createdCell':  function (td, cellData, rowData, row, col) {
               $(td).attr('data-id', rowData.e_id ); 
            }
         },
         {
            'targets': 4,
            'createdCell':  function (td, cellData, rowData, row, col) {
               $(td).attr('data-id', rowData.e_id ); 
            }
         },
         {
             'targets': 5,
             'createdCell':  function (td, cellData, rowData, row, col) {
                $(td).attr('data-id', rowData.e_id ); 
             }
          }
     ]

});



const search =  document.querySelector('#fir_filter  input');
search.classList.add('searchbox');
search.setAttribute('placeholder','Search Transaction');

const searchsec =  document.querySelector('#sec_filter  input');
searchsec.classList.add('searchbox');
searchsec.setAttribute('placeholder','Search Transaction');

function edititem(curr,id){
    document.querySelectorAll(`td[data-id='${id}']`).forEach((element,num)=>{element.contentEditable="true";if(num==0)element.focus();});
    curr.classList.add('dispicon');
    curr.nextElementSibling.classList.add('dispbtn');

    
}
function deleteitem(id){
    $.ajax({
        type: "POST",    
        dataType: "json",
        url: "expense_delete.php",
        data: { 'id': id
        },
        success: function (response) {
            if(response.error == '0')
            {
                document.querySelector('#msg').innerHTML = response.res;

            }else if(response.error == '1')
            {
                document.querySelector('#msg').innerHTML = response.res;
            }
            setTimeout(()=>{document.querySelector('#msg').innerHTML = ''},4000);
            $('#fir').DataTable().ajax.reload();
        }

    });
}

function updateitem(curr,id){

var [date, Price, payment_type] = document.querySelectorAll(`td[data-id='${id}']`);

console.log(date, Price, payment_type,document.querySelectorAll(`td[data-id='${id}']`));
    $.ajax({
        type: "POST",    
        dataType: "json",
        url: "expense_edit.php",
        data: { 'id': id,
                'date_of_expense': (date.innerText).trim(),
                'Price': (Price.innerText).trim(),
                'payment_type': (payment_type.innerText).trim()
        },
        success: function (response) {
            if(response.error == '0')
            {
                document.querySelector('#msg').innerHTML = response.res;

            }else if(response.error == '1')
            {
                document.querySelector('#msg').innerHTML = response.res;
            }
            setTimeout(()=>{document.querySelector('#msg').innerHTML = ''},4000);
            document.querySelectorAll(`td[data-id='${id}']`).forEach((element,num)=>{element.contentEditable="false";});
            curr.previousElementSibling.classList.remove('dispicon');
            curr.classList.remove('dispbtn');
        }

    });
}






$("#sec").dataTable({
    "bProcessing": true,

    "sAjaxSource": "due.php",
    "sDom": "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
    "sPaginationType": "full_numbers",
    "aoColumns": [
                {"mData": "Sr_no"},
                {"mData": "Category_Name"},
                {"mData": "Vendor_Name"},
                {"mData": "date"},
                {"mData": "Price"},
                {"mData": "Status"},
                {"mData": "Payment_Mode"},
                {"mData": "remark"}
    ]
    
});


function updateStatus(e_id, test, retailer_id) {

    var id = e_id;
    var status = test;

    var retailer_id = retailer_id;


    $.ajax({//create an ajax request to load_page.php
        type: "POST",       
        dataType: "html",
        url: "webservice/change-payment.php",
        data: {'Status': status,
                'Enquiry_Id': id,
                'Test': status,
                'Retailer_id': retailer_id
        },
        success: function (response) {
            //alert(response);

            alert("status updated.");
            window.location.href = 'expense_dashboard.php';
        }

    });

}



let year = document.querySelector('.year');
const backwardmonths = document.querySelector('.backwardmonths');
const forwardmonths = document.querySelector('.forwardmonths');
const startdate = document.querySelector('.startdate');
const enddate = document.querySelector('.enddate');
const monthlinks = document.querySelectorAll('.monthlink');
const ledgerreport = document.querySelector('#ledgerreport');
let clickonsubmit = 0, clickonmonth=1;
var originalinvres;
var startFullDate,endFullDate;

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
    insert_fetched_customers_invoice_summary();
});
forwardmonths.addEventListener('click',(e)=>{
    var currYear = date.getFullYear();
    var getYear =  Number(year.innerText);
    year.innerText = (getYear+1) > currYear ? getYear: getYear+1;
    activeLink(monthlinks[0]);
    checkCurrentYear();
    insert_fetched_customers_invoice_summary();
});



// click event on months 
monthlinks.forEach(element => {
    element.addEventListener('click',(e)=>{
        activeLink(e.target);
        clickonmonth = 1;
        // fetch_transaction_table();
    });
});

checkCurrentYear();


// fetch invoice summary 
        function fetch_summary() {
            var postTo = 'get_expense_summary_report_detail.php';
            var data = JSON.stringify({

            });
            /* $('#loaderd').show();
             $('#gif').css('visibility', 'visible');					 */
            jQuery.post(postTo, data,
                    function (data) {
                        console.log(data);
                        if (data.error == '1') {
                            inverror = `<tr>
                                <th  class='label col nowrap'>Expense Count</th>
                                <td colspan='12'>Something Went Wrong</td>
                                </tr>
                                <tr>
                                        <th  class='label col nowrap'>Expense Amount</th>
                                        <td colspan='12'>Couldnt fetch Data</td>
                                </tr>`;
                            ledgerreport.innerHTML = inverror;
                            return false;
                        } else {
                            originalinvres = data.res;
                            insert_fetched_customers_invoice_summary();
                        }
                        return false;
                    }, 'JSON');
        }
        fetch_summary();



// insert fetched customer invoice summary 
        function insert_fetched_customers_invoice_summary() {

            var invres = originalinvres;
            var invyear = Number(year.innerText.trim());

            var i = 0;
            // invoice_count
            var invrowtd = '';
            invrowtd += `<tr>
                        <th  class="label col nowrap">Expense Count</th>`;

            while (i < 12)
            {
                invrowtd += `
                <td>${invres[invyear][monthnames[i]]['Expense_Count']}</td>         
            `;

                i++;
            }
            invrowtd += `</tr>`;

            // invoice amount
            i = 0;
            invrowtd += `<tr>
                        <th  class="label col nowrap">Expense Amount</th>`;
            while (i < 12)
            {
                invrowtd += `
                <td>${parseFloat(invres[invyear][monthnames[i]]['Expense_Amount']).toFixed(2)}</td>         
            `;

                i++;
            }
            invrowtd += `</tr>`;
            ledgerreport.innerHTML = invrowtd;
        }