const navitems = document.querySelectorAll('.nav-item');
const navlinks = document.querySelectorAll('.nav-link');
let navdiv = document.querySelector('.navdiv');
const createlink = document.querySelector('.createlink');
const uploadfile = document.querySelector('.uploadfile');
const createlinkbtn = document.querySelector('.createlinkbtn');
const createlinkbtn1 = document.querySelector('.createlinkbtn1');
const copybtn = document.querySelector('.copybtn');
let copytext = document.querySelector('.copytext');
const copytoast = document.querySelector('.copytoast');
const uploadimagediv = document.querySelector('#uploadimagediv');
const uploadimagediv1 = document.querySelector('#uploadimagediv1');
const linkbox = document.querySelector('#linkbox');
const checkboxdatabase = document.querySelector('#checkboxdatabase');
const formFile = document.querySelector('#formFile');
const formFile1 = document.querySelector('#formFile1');
const createlinkdiv = document.querySelector('.createlinkdiv');
const createlinkdiv1 = document.querySelector('.createlinkdiv1');
const messagebox =  document.querySelector('#input_promotion_type');
const remarksbox = document.querySelector('#input_promtion_remark');
const submitbtn = document.querySelector('#submit_data');
const charcountdiv = document.querySelector('.promotion__char_count');
const smscountdiv = document.querySelector('#promotion_count_label');
const tab1_container = document.querySelector('#tab1_container');
const tab2_container = document.querySelector('#tab2_container');
const tab3_container  = document.querySelector('#tab3_container');
var normalchar = document.querySelector('.normalchar');
var unicodechar = document.querySelector('.unicodechar');
var smsalert  = document.querySelector('.smsalert');
const inputdate = document.querySelector('#input_date');
const smsinfo = document.querySelector('#smsinfo');
// const imagebtn = document.querySelector('#imagebtn');
const paxis = document.querySelectorAll('.paxis');
const imagename = document.querySelector('#imageeditor');
const warnsms = document.querySelector('.warnsms');
const save_image = document.querySelector('#save_image');
save_image.disabled = true;

inputdate.addEventListener('input',(e)=>{
    var inputtime = inputdate.value; 

    if(inputtime !== '')
    {
        var timedigit = Number(inputtime.split('T')[1].split(':')[0]);
        if(timedigit < 11 || timedigit >18 )
        {
            alert('Select Time between 11 AM to 18 PM');
            inputdate.value = `${inputtime.split('T')[0]}T11:00`;
        }
        setTimeout(()=>{try{inputdate.showPicker()}catch(error){console.log(error)}},100);
    }
});

document.getElementById("input_promotion_type").oninput = function(e){
  countSMS();
}

function countSMS(){
  var ctx = document.getElementById("promotion_count_label");
  var str = document.getElementById("input_promotion_type").value;
  

  if(normalchar.checked === true){
    var size = str.split("").length;

    // if(str.match(/^[ -~\n]*$/))
    if(str.match(/^[ -~\n\u003f-\u00ff]*$/))
    {
        // console.log('yes');
        
        if(size == 0)
        {
          ctx.innerText = 0;
        }else if(size <= 160)
        {
          ctx.innerText = 1;
        }else{
          ctx.innerText = Math.ceil(size/153);
        }
        
        document.querySelector('.promotion__char_count').innerText =  size;
    }else{
      document.querySelector('.promotion__char_count').innerText =  size;

      var tempstr = str.split('').filter((a)=>{ if(!a.match(/^[ -~\n\u003f-\u00ff]*$/)) return 1;}).join('');
      smsalert.innerHTML = `This character &nbsp<span class='text-danger'> ${tempstr} </span>&nbsp is unicode!`;
      str = str.split('').filter((a)=>{ if(a.match(/^[ -~\n\u003f-\u00ff]*$/)) return 1;}).join('');     

      setTimeout(()=>{
        smsalert.innerHTML = ``;
        messagebox.value = str;
        document.querySelector('.promotion__char_count').innerText =  str.length;
      },4000);
      
    }
  }else if(unicodechar.checked == true){
    var size = str.split("").length;
    if(size == 0)
    {
      ctx.innerText = 0;
    }else  if(size <= 70)
    {
      ctx.innerText = 1;
    }else{
      ctx.innerText = Math.ceil(size/67);
    }
    document.querySelector('.promotion__char_count').innerText =  size;
  }
//   console.log(size);

  
}










submitbtn.addEventListener('click',submit_sms_promotion);

function submit_sms_promotion()
{
    sms_promotion_id = submitbtn.getAttribute('data-sms_id');
    // console.log(sms_promotion_id);
    var sms = messagebox.value;
    if(sms == '')
    return;

    submitbtn.innerHTML = "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span><span style='margin-left:5px;'>Sending... </span>";

    var relailer_id = 1010101;    
    var sms_type = document.querySelector("input[name='charcode']:checked").value;
    var remarks = remarksbox.value;
    var date_of_promotion = document.querySelector('#input_date').value.split('T').join(' ');
    // console.log(date_of_promotion);
    var char_count = Number(charcountdiv.innerText);
    var sms_count = Number(smscountdiv.innerText);
    var customer_segment;
    var customer_data;
    var customer_data_status;

    if(document.querySelector("input[name='uploadfile']").checked)
    {
        customer_data = 'input file value ';
        customer_data_status = document.querySelector('#filecheckbox').checked ? 'Add file to existing customer database': 'Not add file to existing customer database';
    }else{
        customer_data = 'no file uploaded';
        customer_data_status = 'no file uploaded';
    }
    
    var customer_segments =  document.querySelector("input[name='customer']:checked").getAttribute('id');
    switch(customer_segments)
    {
        case 'flexRadioDefault1':
            customer_segment = document.querySelector("input[name='customer']:checked").value;
            break;

            case 'flexRadioDefault2':
                customer_segment = document.querySelector("input[name='customer']:checked").value;
                break;
            
                case 'flexRadioDefault3':
                    customer_segment = document.querySelector("input[name='customer']:checked").value;
                    break;
                
                    case 'flexRadioDefault4':
                        var selectvalue = document.querySelector("#lastmonths");
                        customer_segment = `Lost customers in last ${selectvalue.options[selectvalue.selectedIndex].text} months`;
                        break;

                        case 'flexRadioDefault5':
                            customer_segment = `Customers with average purchase ${document.querySelector('#averagepurchasevalue').value == ''? '0' : document.querySelector('#averagepurchasevalue').value} Rs.`;
                            break;

                            case 'flexRadioDefault6':
                                customer_segment = `Customers with highest purchase ${document.querySelector('#highestpurchasevalue').value == ''? '0' : document.querySelector('#highestpurchasevalue').value} Rs.`;
                                break;

                                case 'flexRadioDefault7':
                                    customer_segment = `Customers with visit ${document.querySelector('#visitcount').value} counts`;
                                    break;

                                    case 'flexRadioDefault8':
                                        customer_segment = `Buyers Segments : ${[...document.querySelectorAll("input[name='segment[]']:checked")].map(element=>element.value).join(' , ') == ''? 'none selected': [...document.querySelectorAll("input[name='segment[]']:checked")].map(element=>element.value).join(' , ')}`;
                                        break;        
    }

    const xhr = new XMLHttpRequest();

    xhr.open('POST','sms_promotion_submit.php',true);
    xhr.responseType = 'json';

    xhr.onload = ()=>{
        if(xhr.status === 200)
        {
            var response = xhr.response;
            submitbtn.innerHTML = 'Send';
            smsinfo.innerHTML = '<span class="label d-flex justify-content-center align-items-center mt-3"> SMS Sent Successfully!</span>'
            setTimeout(()=>scrollTovView(),1000);
            setTimeout(()=>smsinfo.innerHTML ='',2000);
            // console.log(response.error, response.res);
            fetch_wip_promotion();
            remarksbox.value = '';
            messagebox.value = '';
            countSMS();
            document.querySelector('#input_date').value = '';
        }
    };
    
    const formdata = new FormData();
    formdata.append('relailer_id', relailer_id);
    formdata.append('sms', sms);
    formdata.append('sms_type', sms_type);
    formdata.append('remarks', remarks);
    formdata.append('char_count', char_count);
    formdata.append('sms_count', sms_count);
    formdata.append('customer_segment', customer_segment);
    formdata.append('customer_data', customer_data);
    formdata.append('customer_data_status', customer_data_status);
    formdata.append('date_of_promotion', date_of_promotion);
    formdata.append('sms_promotion_id', sms_promotion_id);
    xhr.send(formdata); 
}


copybtn.addEventListener('click',(e)=>{
    e.preventDefault();

    var copytextvalue =  copytext.innerText;
    if(copytextvalue == '')
        return;
    
        // copytext.select();
        // copytext.setSelectionRange(0, 99999);

        var range = document.createRange();
        range.selectNode(copytext); //changed here
        window.getSelection().addRange(range); 

        navigator.clipboard
          .writeText(copytext.innerText)
          .then(() => {
            copytoast.classList.add('text-success');
            copytoast.innerText = 'Copied!';
          })
          .catch(() => {
            copytoast.classList.add('text-danger');
            copytoast.innerText = 'Coudnt copy';
          });
    window.getSelection().removeAllRanges();
    

    setTimeout(()=>{
        copytoast.innerText = '';
        copytoast.classList.remove('text-success');
    },2000);

});


createlink.addEventListener('click',()=>{
    if(createlink.checked === true){
        uploadimagediv.classList.add('uploadimagediv');        
    }else
    {
        uploadimagediv.classList.remove('uploadimagediv');
        linkbox.classList.remove('linkbox');
    }
});

uploadfile.addEventListener('click',()=>{
    if(uploadfile.checked === true){
        uploadimagediv1.classList.add('uploadimagediv');        
        checkboxdatabase.classList.add('checkboxdatabase1');
    }else
    {
        uploadimagediv1.classList.remove('uploadimagediv');
        checkboxdatabase.classList.remove('checkboxdatabase1');
    }
});


createlinkbtn.addEventListener('click',()=>{
if(formFile.value === '')
    return;

    createlinkbtn.innerHTML = `<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span><span style='margin-left:5px;'>Processing... </span>`;

//upload image to database


    setTimeout(()=>{
    createlinkbtn.innerHTML = `Upload`;
    linkbox.classList.add('linkbox');
    copytext.innerText = 'https://riseretail.net/imagefolder/image.png';
    },500);
    

});


navitems.forEach((element)=>{
    element.addEventListener('click', (e)=>{
        var tab = document.querySelector('.active').getAttribute('id');
        if(tab == 'profile-tab')
        {
            navdiv.style.left = document.querySelector('.span1').offsetLeft;
        }else if(tab == 'update-tab')
        {
            navdiv.style.left = document.querySelector('.span2').offsetLeft;
        } if(tab == 'contact-tab')
        {
            navdiv.style.left = document.querySelector('.span3').offsetLeft;
        }
    });
});
document.querySelector('.clickonload').click();

const lostcustomersinputs = document.querySelectorAll('.lostcustomersinput'); 
const custom = document.querySelector('#flexRadioDefault5');
var flag = 0;
lostcustomersinputs.forEach((element)=>{
    element.addEventListener('click',()=>{
        if(custom.checked == true && !flag)
        {
            document.querySelector('.hiddendiv').classList.add('custom');
            flag = 1;
        }else if(custom.checked == false && flag){
            document.querySelector('.hiddendiv').classList.remove('custom');
            flag = 0;
        }
    });
});



/*Dropdown Menu*/
$('.dropdown').click(function () {
    $(this).attr('tabindex', 1).focus();
    $(this).toggleClass('active');
    $(this).find('.dropdown-menu').slideToggle(300);
});
$('.dropdown').focusout(function () {
    $(this).removeClass('active');
    $(this).find('.dropdown-menu').slideUp(300);
});
$('.dropdown .dropdown-menu li').click(function () {
    $(this).parents('.dropdown').find('span').text($(this).text());
    $(this).parents('.dropdown').find('input').attr('value', $(this).attr('id'));
});
/*End Dropdown Menu*/


$('.dropdown-menu li').click(function () {
var input = '<strong>' + $(this).parents('.dropdown').find('input').val() + '</strong>',
  msg = '<span class="msg">Hidden input value: ';
$('.msg').html(msg + input + '</span>');
}); 

navlinks.forEach((element)=>{element.addEventListener('mouseout',(e)=>{
        e.target.style.border = 0;
})});


function fetch_wip_promotion(){
    const xhr = new XMLHttpRequest();

    xhr.open('GET','fetch_wip_promotion.php',true);
    xhr.responseType = 'json';

    xhr.onload = ()=>{
        if(xhr.status === 200)
        {
            var response = xhr.response;
            // console.log(response.error, response.res);
            tab1_container.innerHTML = response.res;
        }
    };

    xhr.send(); 
}
fetch_wip_promotion();

function confirm_sms(id)
{
    const xhr = new XMLHttpRequest();

    xhr.open('POST','confirm_sms_promotion.php',true);
    xhr.responseType = 'json';

    xhr.onload = ()=>{
        if(xhr.status === 200)
        {
            var response = xhr.response;
            // console.log(response.error, response.res);
            fetch_wip_promotion();
        }
    };

    const formdata = new FormData();
    formdata.append('sms_promotion_id', id);
    xhr.send(formdata); 
}
function cancel_sms(id)
{

    const xhr = new XMLHttpRequest();

    xhr.open('POST','delete_sms_promotion.php',true);
    xhr.responseType = 'json';

    xhr.onload = ()=>{
        if(xhr.status === 200)
        {
            var response = xhr.response;
            // console.log(response.error, response.res);
            fetch_wip_promotion();
        }
    };

    const formdata = new FormData();
    formdata.append('sms_promotion_id', id);
    xhr.send(formdata); 
}

var element = document.getElementById("tab1_container");
var rect = element.getBoundingClientRect();
var distance_from_top = rect.top; /* 50px */
// console.log(distance_from_top);

function scrollTovView(){
    window.scrollTo({
      top: distance_from_top,
      behavior: 'smooth'
    });
  }




  function hexTorgb(hex) {
    return ['0x' + hex[1] + hex[2] | 0, '0x' + hex[3] + hex[4] | 0, '0x' + hex[5] + hex[6] | 0];
  }



//   imagebtn.addEventListener('click',imageeditor);

  function imageeditor(){
        var top = document.querySelector('#top').value;
        var left = document.querySelector('#left').value;
        var text = document.querySelector('#textinput').value;
        var imageeditorlen = imagename.files['length'];
        var selectfont = document.querySelector("#fonts");
        var font = selectfont.options[selectfont.selectedIndex].text;

        if(imageeditorlen == 0)
        {
            return;
        }
        function removeExtension(filename){
            var lastDotPosition = filename.lastIndexOf(".");
            if (lastDotPosition === -1) return filename;
            else return filename.substr(0, lastDotPosition);
        }
        var changedname = removeExtension(imagename.files[0]['name'])+'_copy'; 
        var ext = imagename.files[0].type.split('/')[1];
        if(ext === 'png' || ext === 'jpeg' || ext === 'gif')
        {
            // console.log(imagename.files[0].type);
        }else {
            warnsms.classList.add('imageextwarn');
            // console.log(imagename.files[0].type);
            setTimeout(()=>warnsms.classList.remove('imageextwarn'),3000);
            return;
        }

        
        if(top == '' )
            top = 0;
        if(left == '')
            left = 0;

        [R, G, B] = hexTorgb(document.querySelector('.clrpicker').value);
              
    
        // imagebtn.innerText = 'Processing...';
        document.querySelector('#imagediv').innerHTML = `<div class="text-center my-5">
        <div class="spinner-grow text-primary" style="width: 4rem; height: 4rem;" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
      </div>`;
      save_image.disabled = true;
        const xhr = new XMLHttpRequest();
        
        xhr.open('POST','add_text_to_image.php',true);
        xhr.responseType = 'blob';
        xhr.onload = ()=>{
            if(xhr.status === 200)
            {
                // console.log(xhr.response);
                var blb = new Blob([xhr.response]);
                var url = (window.URL || window.webkitURL).createObjectURL(blb);
    
                document.querySelector('#imagediv').innerHTML = `<a href="${url}" download="${changedname}.${ext}"><img src="${url}"  style="width:100%;height:100%;object-fit:content;"></a>`;
                document.querySelector('#aimg').setAttribute('href',url);
                document.querySelector('#aimg').setAttribute('download',`${changedname}.${ext}`);
                // imagebtn.innerText = 'Submit';
                save_image.disabled = false;
            }
        };
        
        const formdata = new FormData(document.querySelector('#imageform'));
        formdata.append('R',R);
        formdata.append('G',G);
        formdata.append('B',B);
        formdata.append('ext',ext);
        formdata.append('font',font);

        console.log([...formdata]);
        xhr.send(formdata); 
  }

  paxis.forEach((element)=>{
    element.addEventListener('input',()=>{
        imageeditor();
        // console.log('input');
        document.querySelector('#textinput').style = `color:${document.querySelector('.clrpicker').value} !important`;
    })
});
document.querySelector('#rotationtext').addEventListener('change',()=>imageeditor());
document.querySelector('#rotationimage').addEventListener('change',()=>imageeditor());