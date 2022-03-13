var searchbox = document.querySelector('#searchbox');
var tr = [...document.querySelectorAll('tbody>tr')];
var originaltdtext = [...document.querySelectorAll('.searchtext')];
var tablebody = document.querySelector('.tablebody');

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