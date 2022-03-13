function AJAXCommunicate(method="POST", dest="process.php", query=null, handle=function(argu){console.log(argu);}){
    var sock;

    try{
        sock = new XMLHttpRequest();
    }
	catch(e){
		console.log(e.message);

        try{
            sock = new ActiveXObject("Microsoft.XMLHttp");
        }
        catch(e){
			console.log(e.message);
		}
    }

	if( sock ){
		sock.open(method, (dest.concat(query)), true);

        sock.onreadystatechange = function(){
		    if(sock.readyState==4 && sock.status==200){
		        handle(sock.responseText);
	        }
	    }
	    sock.send(null);
	}
	else{
	    console.log("ERROR : Something went wrong with the Asyncronize connection");
	}
 }



function makeitCenter(){
    var tab2 = document.getElementById("tab2");
    var temp = 50 - ((tab2.offsetWidth / window.innerWidth)*100)/2;
    tab2.style.left = temp + "%";

    tab2 = document.getElementById("tab3");
    temp = 50 - ((tab2.offsetWidth / window.innerWidth)*100)/2;
    tab2.style.left = temp + "%";

    var logo = document.getElementById("main_logo");
    logo.style.left = (50 - ((logo.offsetWidth/window.innerWidth)*100)/2) + "%";

    disablesomedate();
}



function manageTab(id){
    for(x=1; x<4; x++){
        if(x==id) continue;
        document.getElementById("tab"+x).style.visibility = "hidden";
    }
    document.getElementById("tab"+id).style.visibility = "visible";

}


function assignTab(id){
  // this function only change the element (tab) color
  for(x=1; x<4; x++){
    if(x==id) continue;

    var obj = document.getElementById( "tav_nav_selected"+x );
    obj.style.background = "rgb(240,143,43)";
    obj.style.color = "#000";
  }

  var sel = document.getElementById( "tav_nav_selected"+id );
  sel.style.background = "rgb(220,123,23)";
  sel.style.color = "#fff";
  manageTab(id);

}


document.getElementById("input_promotion_type").onkeyup = function(){
  countSMS();
}

function countSMS(){
  var ctx = document.getElementById("promotion_count_label");
  var str = document.getElementById("input_promotion_type").value;

  var size = str.split("").length;

  if( size==0 ){
    ctx.innerHTML = "SMS Count 0";
  }
  else if( size<=132 ){
    ctx.innerHTML = "SMS Count 1";
  }
  else if( size<=232 ){
    ctx.innerHTML = "SMS Count 2";
  }
  else if( size<=342 ){
    ctx.innerHTML = "SMS Count 3";
  }
  else{
    ctx.innerHTML = "Char reached limit";
  }
}


function addFetchedTemplate(slno, type, str){
   var ctx = document.getElementById("tab2_container");

   var obj = document.createElement("div");
   var obj1 = document.createElement("div");
   var obj2 = document.createElement("div");
   var obj3 = document.createElement("div");

   var button = document.createElement("button");

   obj.className = "templateRowEach";
   obj1.className = "templateRowAttrib1";
   obj2.className = "templateRowAttrib2";
   obj3.className = "templateRowAttrib3";

   obj1.innerHTML = slno;
   obj2.innerHTML = str;
   button.innerHTML = "Use";
   obj3.appendChild(button);

    button.onclick = function(){
        document.getElementById("input_promotion_type").value = str;
 	      document.getElementById("input_hiddenType").value = type;
        assignTab(1);
        countSMS()
    }


   obj.appendChild(obj1);
   obj.appendChild(obj2);
   obj.appendChild(obj3);

   ctx.appendChild(obj);
}


function removeAllTemplate(){
  var parent = document.getElementById("tab2_container");

  while( parent.firstChild ){
      parent.removeChild( parent.firstChild );
  }
}

function fetchTemplate(){

    removeAllTemplate();

    var arg = document.getElementById("tab2_dropdown").value;

    AJAXCommunicate("GET", "getTemplate.php", "?type="+arg+"(SMS)", function(argu){

	    var obj = JSON.parse(argu);

	    for(i=0; i<obj.length; i++){
            var str = "";
            var obj2 = obj[i];

            for(j=0; j<obj2.length; j++){
				       str += obj2[j];
			      }
		 	      addFetchedTemplate(i+1,arg+"(SMS)", str);
	    }

    });
}

function addPreRecord(slno, date, type, msg){
  var ctx = document.getElementById("preRecordContainer");

  var obj = document.createElement("div");
  var obj1 = document.createElement("div");
  var obj2 = document.createElement("div");
  var obj3 = document.createElement("div");
  var obj4 = document.createElement("div");
  var obj5 = document.createElement("div");
  var button = document.createElement("button");

  obj.className = "prev_record";
  obj1.className = "prev_record1";
  obj2.className = "prev_record2";
  obj3.className = "prev_record3";
  obj4.className = "prev_record4";
  obj5.className = "prev_record5";

  obj1.innerHTML = slno;
  obj2.innerHTML = date;
  obj3.innerHTML = type;
  obj4.innerHTML = msg;
  button.innerHTML = "Use";
  obj5.appendChild(button);

  obj5.onclick = function(){
    document.getElementById("input_promotion_type").value = msg;
	  document.getElementById("input_hiddenType").value = type;
    assignTab(1);
    countSMS()
  }


  obj.appendChild(obj1);
  obj.appendChild(obj2);
  obj.appendChild(obj3);
  obj.appendChild(obj4);
  obj.appendChild(obj5);

  ctx.appendChild(obj);
}

function removeAllRecord(){
  var parent = document.getElementById("preRecordContainer");

  while( parent.firstChild ){
      parent.removeChild( parent.firstChild );
  }
}


function fetchRecord(){
  removeAllRecord();

  var slNo = 1;

  AJAXCommunicate("GET", "getPreRecord.php", "", function(argu){

	    var obj = JSON.parse(argu);

	    for(i=0; i<obj.length; i++){
            var str = "";
            var obj2 = obj[i];

            for(j=0; j<obj2[2].length; j++){
				str += obj2[2][j];
			}

			addPreRecord( slNo++, obj2[0], obj2[1] ,str)
	    }

    });

}


function manageRadio(x){
  if(x==0 || x==2){
     document.getElementById("checkbox1").disabled = true;
     document.getElementById("checkbox2").disabled = true;
  }
  else{
    document.getElementById("checkbox1").disabled = false;
    document.getElementById("checkbox2").disabled = false;
  }
}


function checkSubmit(){

	  var type = document.forms['promotion_form']['type'].value;
	  var date = document.forms['promotion_form']['date'].value;
	  var str = document.getElementById("input_promotion_type").value;
	  var customer = document.forms['promotion_form']['customer'].value;
	  var remark = document.getElementById("input_promtion_remark").value;
	  
	  
	if( customer == "seg" ){
		var premium = document.getElementById("checkbox1").checked;
		var regular = document.getElementById("checkbox2").checked;
		
		if(premium){
			customer += "1";
		}
		else{
			customer += "0";
		}
		
		if(regular){
			customer += "1";
		}
		else{
			customer += "0";
		}
		
	}
	  

    if(createValidDT()){

        AJAXCommunicate("GET", "submitSMS.php", "?type="+type+"&date="+date+"&string="+str+"&customer="+customer+"&remark="+remark, function(argu){
		    toast();
			console.log(argu);
        });

	}
}


function createValidDT(){
    var ctx = document.getElementById("input_date");

    var D = new Date(ctx.value);
    var day   = D.getDay();

    if(day==0){
      D.setDate(D.getDate()+1);

      var year  = D.getFullYear();
      var month = D.getMonth()+1;
      var date  = D.getDate();
      //var time  = D.getTime();

      if(month<10){
        month = "0"+month;
      }

      if(date<10){
        date = "0"+date;
      }

      ctx.value = year+"-"+month+"-"+date+"T11:30";
      alert("'Sunday' not a working day");
	  return false;
    }
	else{
		return true;
	}
}


function disablesomedate(){
  var ctx = document.getElementById("input_date");

  var D = new Date();
  D.setDate(D.getDate()+1);

  var day   = D.getDay();
  if(day==0){
    D.setDate(D.getDate()+1);
  }

  var year  = D.getFullYear();
  var month = D.getMonth()+1;
  var date  = D.getDate();
  var time  = D.getTime();

  if(month<10){
    month = "0"+month;
  }

  if(date<10){
    date = "0"+date;
  }

  ctx.value = year+"-"+month+"-"+date+"T11:30";
}

function toast(){
  var hold = document.getElementById("toast");

  hold.style.visibility = "visible";

  setTimeout( function(){
    hold.style.visibility = "hidden";
  }, 2000);

}
