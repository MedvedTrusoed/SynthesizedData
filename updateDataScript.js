let bankAccaunt = '';
let bankAccauntText = '';
let statusOption = '';
let options = document.querySelectorAll('select');
let idValue=0;
let newStatus = '';
changeDataOnclick();

function changeDataOnclick(){
    options.forEach(function(item, i, options) {
 
 item.onclick = function(e) { 

   newStatus = e.target.value;
   idValue = (e.target.id).slice(12); 

       changeData();
    
 };
});
}

//Получение новых значений статуса
function changeData(){
    
    bankAccaunt = document.querySelectorAll('.bank_accaunt');

    bankAccauntText = bankAccaunt[idValue].innerText;

    sendNewData();

}

// создание XMLHttpRequest для ajax 
function getXmlHttp(){
    var xmlhttp;
    try {
      xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
      try {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      } catch (E) {
        xmlhttp = false;
      }
    }
    if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
      xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
  }

//Отправление новых значений статуса в базу данных
  function sendNewData() {
	
	let req = getXmlHttp()  
            
	req.onreadystatechange = function() {  
       
		if (req.readyState == 4) { 

			if(req.status == 200) { 
                 
			}
			
		}

	}

	req.open('GET', `updateData.php?bankAccauntText=${bankAccauntText}&newStatus=${newStatus}`, true);  

	req.send();  
  
}