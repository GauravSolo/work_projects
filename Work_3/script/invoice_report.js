let year = document.querySelector('.year');
const backwardmonths = document.querySelector('.backwardmonths');
const forwardmonths = document.querySelector('.forwardmonths');
const startdate = document.querySelector('.startdate');
const enddate = document.querySelector('.enddate');
const monthlinks = document.querySelectorAll('.monthlink');

var date = new Date();
year.innerText = date.getFullYear();


function activeLink(element){
    monthlinks.forEach(element=>element.classList.remove('activeLink'));
    element.classList.add('activeLink');
    setMinMaxDate();
}

backwardmonths.addEventListener('click',(e)=>{
    var currYear = date.getFullYear();
    var getYear =  Number(year.innerText);
    year.innerText = getYear-1;
    activeLink(monthlinks[0]);
    
});
forwardmonths.addEventListener('click',(e)=>{
    var currYear = date.getFullYear();
    var getYear =  Number(year.innerText);
    year.innerText = (getYear+1) > currYear ? getYear: getYear+1;
    activeLink(monthlinks[0]);
});

monthlinks.forEach(element => {
    element.addEventListener('click',(e)=>{
        activeLink(e.target);
    });
});


function setMinMaxDate(){
    var derivedYear = Number(year.innerText);
    var derivedMonth = Number(document.querySelector('.activeLink').getAttribute('data-month'));

    var startDateMonth = new Date(derivedYear, derivedMonth,01);
    startDateMonth = startDateMonth.toLocaleDateString("en-GB", { // you can use undefined as first argument
                year: "numeric",
                month: "2-digit",
                day: "2-digit", 
                });

    var endDateMonth = new Date(derivedYear, derivedMonth + 1,0);
    endDateMonth = endDateMonth.toLocaleDateString("en-GB", { // you can use undefined as first argument
                year: "numeric",
                month: "2-digit",
                day: "2-digit", 
                });
    startdate.setAttribute('min', startDateMonth.split('/').reverse().join('-'));
    enddate.setAttribute('min', startDateMonth.split('/').reverse().join('-'));
    startdate.setAttribute('max', endDateMonth.split('/').reverse().join('-'));
    enddate.setAttribute('max', endDateMonth.split('/').reverse().join('-'));
}
setMinMaxDate();


var searchbox = document.querySelector('.searchbox');
var tr = [...document.querySelectorAll('.tablereportbody>tr')];
var originaltdtext = [...document.querySelectorAll('.searchtext')];
var tablebody = document.querySelector('.tablereportbody');

searchbox.addEventListener('input',(e)=>{
    insert_fetched_customers();
  });


// inserting fetched customers
function insert_fetched_customers(){
    
    var tdtext = originaltdtext;
    var searchvalue = searchbox.value;
    var rows = "";   
    if(searchvalue != '')
    {
        var regex = new RegExp(`${searchvalue}`,'i');
        tdtext = tdtext.filter(element=>element.innerText.search(regex) !== -1);
    
        var trelements =  tdtext.map(element =>{
            var dataid = element.getAttribute('data-id');
            return tr.filter(trelement=>{
                return trelement.getAttribute('data-id') == `${dataid}`;
            })[0];
        });
          var i = 0;
        
        trelements.forEach(element=>rows += element.outerHTML);
    
    }else{
        [...tr].forEach(element=>rows += element.outerHTML);
    }
    
    if(rows == "")
    {

      rows = "<tr> <td colspan='9'><h4 class='text-info text-center'> No Data </h4>  </td> <tr>";
    }
    
    tablebody.innerHTML = rows;
}